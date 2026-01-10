import { StorageManager } from '../../utils/local-storage-manager.js';
import {SETTINGS, STORAGE_KEYS} from "../../config/constants.js";
import {showToast} from "../../utils/notify.js";

export class TrixManager {
    constructor(inputId, options = {}) {
        // storage key config
        this.inputId = inputId;
        this.storageKey = `${STORAGE_KEYS.DRAFT_PREFIX}${inputId}`;
        this.titleKey = `${this.storageKey}${STORAGE_KEYS.TITLE_SUFFIX}`;
        this.timestampKey = `${this.storageKey}${STORAGE_KEYS.TIMESTAMP_SUFFIX}`;

        // html element setup
        this.trixElement = document.querySelector(`trix-editor[input="${inputId}_input"]`);
        this.titleInput = options.titleInput || document.querySelector('#post-title');
        this.form = this.trixElement?.closest('form');

        // save config
        this.saveDebounceMs = options.saveDebounceMs || 1000;
        this.syncDebounceMs = options.syncDebounceMs || this.saveDebounceMs;
        this.saveTimeout = null;
        this.syncTimeout = null;
        this.isRestoring = false;
        this.isSyncing = false;

        this.onContentChange = options.onContentChange || null;

        this.init();
    }

    init() {
        if (!this.trixElement) {
            showToast('Post editor didn\'t initialized properly, please refresh.', 'error');
            return;
        }

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
        const hasServerData = this.trixElement.editor.getDocument().toString().trim() !== "";

        if (!hasServerData) {
            this.restoreDraft();
        } else {
            this.syncToLivewire();
        }
    }

    setupEventListeners() {
        // Manage content changes event
        this.trixElement.addEventListener('trix-change', () => {
            if (!this.isRestoring && !this.isSyncing) {
                // save to local storage
                this.debouncedSave();
                // trigger save by livewire
                this.debouncedSync();
            }
        });

        // Manage title changes events
        if (this.titleInput) {
            this.titleInput.addEventListener('input', () => {
                if (!this.isRestoring && !this.isSyncing) {
                    this.debouncedSave();
                }
            });
        }

        // Listen 'post-saved' event from Livewire
        if (window.Livewire && window.Livewire instanceof Object) {
            Livewire.on('post-saved', () => {
                // StorageManager.clear(STORAGE_KEYS.DRAFT_PREFIX);
            });
        }
    }

    debouncedSave() {
        clearTimeout(this.saveTimeout);
        this.saveTimeout = setTimeout(() => this.saveDraft(), this.saveDebounceMs);
    }

    debouncedSync() {
        clearTimeout(this.syncTimeout);
        this.syncTimeout = setTimeout(() => this.syncToLivewire(), this.syncDebounceMs);
    }

    saveDraft() {
        if (!this.trixElement.editor) return;

        const content = JSON.stringify(this.trixElement.editor);
        const size = StorageManager.getSize(content);

        if (size > SETTINGS.MAX_STORAGE_SIZE) {
            console.warn('Draft too large for localStorage');
            return;
        }

        const title = this.titleInput?.value || '';
        const timestamp = Date.now();

        StorageManager.set(this.storageKey, content);
        StorageManager.set(this.titleKey, title);
        StorageManager.set(this.timestampKey, timestamp.toString());

        console.log('created draft on local storage')
    }

    restoreDraft() {
        const savedContent = StorageManager.get(this.storageKey);
        const savedTitle = StorageManager.get(this.titleKey);
        const timestamp = parseInt(StorageManager.get(this.timestampKey));

        if (!savedContent) return;

        const MAX_AGE = SETTINGS.MAX_DRAFT_AGE_MS;
        if (timestamp && (Date.now() - timestamp) > MAX_AGE) {
            StorageManager.clear(STORAGE_KEYS.DRAFT_PREFIX);
            return;
        }

        const currentContent = this.trixElement.editor.getDocument().toString().trim();
        if (currentContent !== "") return;

        try {
            this.isRestoring = true;
            this.isSyncing = true;

            showToast('Restoring draft');
            this.trixElement.editor.loadJSON(JSON.parse(savedContent));

            if (savedTitle && this.titleInput && !this.titleInput.value) {
                this.titleInput.value = savedTitle;

                this.titleInput.dispatchEvent(new Event('input', { bubbles: true }));
            }

            this.syncToLivewire();
            this.isRestoring = false;
            this.isSyncing = false;

        } catch (e) {
            showToast('Failed to restore draft', 'error');
            StorageManager.clear(STORAGE_KEYS.DRAFT_PREFIX);
            this.isRestoring = false;
            this.isSyncing = false;
        }
    }

    syncToLivewire() {
        if (!this.trixElement || !this.trixElement.editor) return;

        const htmlContent = this.trixElement.value;

        // get the value of editor input element
        const inputElement = document.querySelector(`#${this.inputId}_input`);
        if (inputElement) {
            inputElement.value = htmlContent;
        }

        if (this.onContentChange) {
            this.onContentChange(htmlContent);
            console.log('synced to livewire')
        }
    }
}
