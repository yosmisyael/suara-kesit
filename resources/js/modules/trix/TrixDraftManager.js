import { StorageManager } from '../../utils/local-storage-manager.js';
import { getTimeAgo } from '../../utils/time.js';
import {show, hide, setText, setHTML} from '../../utils/dom.js';
import { STORAGE_KEYS, SETTINGS, MESSAGES } from '../../config/constants.js';

export class TrixDraftManager {
    constructor(inputId, options = {}) {
        this.inputId = inputId;
        this.storageKey = `${STORAGE_KEYS.DRAFT_PREFIX}${inputId}`;
        this.titleKey = `${this.storageKey}${STORAGE_KEYS.TITLE_SUFFIX}`;
        this.timestampKey = `${this.storageKey}${STORAGE_KEYS.TIMESTAMP_SUFFIX}`;

        this.trixElement = document.querySelector(`trix-editor[input="${this.inputId}_input"]`);
        this.titleInput = options.titleInput;
        this.form = this.trixElement?.closest('form');

        this.saveDebounceMs = options.saveDebounceMs || SETTINGS.SAVE_DEBOUNCE_MS;
        this.saveTimeout = null;
        this.isRestoring = false;

        this.indicators = {
            draft: document.querySelector('#draft-indicator'),
            autoSave: document.querySelector('#auto-save-indicator'),
            saveStatus: document.querySelector('#save-status'),
        };

        this.callbacks = {
            onSave: options.onSave || (() => {}),
            onRestore: options.onRestore || (() => {}),
            onClear: options.onClear || (() => {}),
        };

        this.init();
    }

    init() {
        this.handleTrixInitialization();
        this.setupEventListeners();
    }

    handleTrixInitialization() {
        if (this.trixElement.editor) {
            this.onTrixReady();
        } else {
            this.trixElement.addEventListener('trix-initialize', () => this.onTrixReady(), { once: true });
        }
    }

    onTrixReady() {
        const isContentEmpty = this.trixElement.editor.getDocument().toString().trim() === "";
        const isTitleEmpty = !this.titleInput.value;

        if (isContentEmpty && isTitleEmpty) {
            this.restoreDraft();
        }

        if (this.hasDraft()) {
            show(this.indicators.autoSave);
        }
    }

    setupEventListeners() {
        this.trixElement.addEventListener('trix-change', () => {
            if (!this.isRestoring) {
                this.debouncedSave();
            }
        });

        if (this.titleInput) {
            this.titleInput.addEventListener('input', () => {
                if (!this.isRestoring) {
                    this.debouncedSave();
                }
            });
        }

        if (this.form) {
            this.form.addEventListener('submit', () => this.clearDraft());
        }

        this.setupDiscardButton();
    }

    setupDiscardButton() {
        const discardBtn = document.querySelector('#discard-draft');
        if (discardBtn) {
            discardBtn.addEventListener('click', () => this.handleDiscard());
        }
    }

    handleDiscard() {
        if (confirm(MESSAGES.DISCARD_CONFIRM)) {
            this.clearDraft();
            this.trixElement.editor.loadHTML('');
            if (this.titleInput) this.titleInput.value = '';
            hide(this.indicators.draft);
            hide(this.indicators.autoSave);
        }
    }

    debouncedSave() {
        clearTimeout(this.saveTimeout);
        this.updateSaveStatus('Saving...', 'loading');

        this.saveTimeout = setTimeout(() => {
            this.saveDraft();
            this.updateSaveStatus('Temporary Saved', 'success');
        }, this.saveDebounceMs);
    }

    saveDraft() {
        if (!this.trixElement.editor) return;

        const content = JSON.stringify(this.trixElement.editor);
        const size = StorageManager.getSize(content);

        if (size > SETTINGS.MAX_STORAGE_SIZE) {
            console.warn('Draft too large for localStorage');
            this.updateSaveStatus(MESSAGES.DRAFT_TOO_LARGE, 'error');
            return;
        }

        const title = this.titleInput?.value || '';
        const timestamp = Date.now();

        const success = StorageManager.set(this.storageKey, content) &&
            StorageManager.set(this.titleKey, title) &&
            StorageManager.set(this.timestampKey, timestamp.toString());

        if (success) {
            this.callbacks.onSave({ size, timestamp });
        } else {
            this.updateSaveStatus(MESSAGES.STORAGE_FULL, 'error');
        }
    }

    restoreDraft() {
        const savedContent = StorageManager.get(this.storageKey);
        const savedTitle = StorageManager.get(this.titleKey);
        const timestamp = parseInt(StorageManager.get(this.timestampKey));

        if (!timestamp || this.isDraftExpired(timestamp)) {
            this.clearDraft();
            return;
        }

        try {
            this.isRestoring = true;

            if (savedContent)
                this.trixElement.editor.loadJSON(JSON.parse(savedContent));

            if (savedTitle) {
                this.titleInput.value = savedTitle;
                this.titleInput.dispatchEvent(new Event('input', { bubbles: true }));
            }

            this.showDraftIndicator(new Date(timestamp));

            show(this.indicators.autoSave);

            this.callbacks.onRestore({ timestamp });

            setTimeout(() => this.isRestoring = false, 100);

        } catch (e) {
            console.error('Failed to restore draft:', e);
            this.clearDraft();
            this.isRestoring = false;
        }
    }

    isDraftExpired(timestamp) {
        if (!timestamp) return false;
        return (Date.now() - timestamp) > SETTINGS.MAX_DRAFT_AGE_MS;
    }

    hasDraft() {
        return StorageManager.get(this.storageKey) !== null;
    }

    clearDraft() {
        StorageManager.remove(this.storageKey);
        StorageManager.remove(this.titleKey);
        StorageManager.remove(this.timestampKey);
        this.callbacks.onClear();
    }

    showDraftIndicator(timestamp) {
        if (!this.indicators.draft) return;

        const timeAgo = getTimeAgo(timestamp);
        this.indicators.draft.innerHTML = `
            ${MESSAGES.DRAFT_RESTORED} (${timeAgo})
            <button type="button" id="discard-draft" class="ml-4 cursor-pointer underline">
                Discard
            </button>
        `;
        show(this.indicators.draft);

        this.setupDiscardButton();
    }

    updateSaveStatus(message, status) {
        const icons = {
            success: `<span class="material-symbols-outlined text-[18px]!">check</span>`,
            error: `<span class="material-symbols-outlined text-[18px]!">close</span>`,
            loading: `<span class="material-symbols-outlined text-[18px]!">refresh</span>`
        }

        setHTML(this.indicators.saveStatus, icons[status] + message);
    }
}
