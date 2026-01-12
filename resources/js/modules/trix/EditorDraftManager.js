import { StorageManager } from '../../utils/local-storage-manager.js';
import { SETTINGS, STORAGE_KEYS } from "../../config/constants.js";
import { showToast } from "../../utils/notify.js";

export class EditorDraftManager {
    constructor(options = {}) {
        // storage key config
        this.storageKey = `${STORAGE_KEYS.DRAFT_PREFIX}_${options.draftId}`;
        this.contentKey = `${this.storageKey}_${options.contentInputId}`;
        this.titleKey = `${this.storageKey}_${STORAGE_KEYS.TITLE_SUFFIX}`;
        this.categoryKey = `${this.storageKey}_${STORAGE_KEYS.CATEGORY_SUFFIX}`;
        this.timestampKey = `${this.storageKey}_${STORAGE_KEYS.TIMESTAMP_SUFFIX}`;

        // save config
        this.saveDebounceMs = options.saveDebounceMs || 1000;
        this.hydrateDebounceMs = options.hydrateDebounceMs || this.saveDebounceMs;
        this.saveTimeout = null;
        this.hydrationTimeout = null;
        this.isRestoring = false;
        this.isHydrating = false;
        this.serverTimestamp = options.serverTimestamp;

        this.onContentChange = options.onContentChange;

        this.inputs = {
            categoryInputId: options.categoryInputId,
            titleInputId: options.titleInputId,
            contentInputId: options.contentInputId,
        }

        this.init();

        // expose draft manager to window
        window.App.draftManager = this;
    }

    init(attempts = 0) {
        if (this.validateAndGetElements()) {
            this.restoreEditorFromDraft();
            this.setupEventListeners();
            return;
        }

        if (attempts <= 10) {
            setTimeout(() => {
                this.init(attempts + 1);
            }, 100);
        } else {
            showToast('Post editor didn\'t initialized properly. Check your connection and refresh.');
        }
    }

    /**
     * Ensure post editor elements loaded and save reference to them
     */
    validateAndGetElements() {
        const errors = [];

        const category = document.getElementById(this.inputs.categoryInputId);
        if (!category) errors.push('Category input not found');

        const trix = document.querySelector(`trix-editor[input="${this.inputs.contentInputId}_input"]`);
        if (!trix.editor) errors.push('Trix editor not found');

        const content = document.getElementById(this.inputs.categoryInputId);
        if (!content) errors.push('Content input not found');

        const title = document.getElementById(this.inputs.titleInputId);
        if (!title) errors.push('Title input not found');

        // set html elements
        this.trixEditor = trix;
        this.titleInput = title;
        this.categoryInput = category;

        return errors.length === 0;
    }

    setupEventListeners() {
        // Manage content changes event
        this.trixEditor.addEventListener('trix-change', () => {
            if (!this.isRestoring && !this.isHydrating) {
                // save to local storage
                this.debouncedSave();
                // trigger save by livewire
                this.debouncedHydrateContent();
            }
        });

        // Manage title changes events
        this.titleInput.addEventListener('input', () => {
            if (!this.isRestoring && !this.isHydrating) {
                this.debouncedSave();
            }
        });

        // TODO: listen to navigate action then remove draft from local storage
    }

    debouncedSave() {
        clearTimeout(this.saveTimeout);
        this.saveTimeout = setTimeout(() => this.saveDraft(), this.saveDebounceMs);
    }

    debouncedHydrateContent() {
        clearTimeout(this.hydrationTimeout);
        this.hydrationTimeout = setTimeout(() => this.hydrateLivewireContent(), this.hydrateDebounceMs);
    }

    /**
     * Provide callback for Alpine to notify if category draft changed
     */
    onCategoryChange() {
        if (!this.isRestoring) {
            this.debouncedSave();
        }
    }

    /**
     * Save editor state to local storage as a draft.
     */
    saveDraft() {
        const content = JSON.stringify(this.trixEditor.editor);
        const size = StorageManager.getSize(content);

        if (size > SETTINGS.MAX_STORAGE_SIZE) {
            showToast('Draft too large for local storage. Your progress won\'t be drafted', 'warning');
            return;
        }

        const title = this.titleInput?.value || '';
        const category = this.categoryInput?.value || '';
        const timestamp = Date.now();

        StorageManager.set(this.categoryKey, category);
        StorageManager.set(this.titleKey, title);
        StorageManager.set(this.contentKey, content);
        StorageManager.set(this.timestampKey, timestamp.toString());
    }

    /**
     * Checks for a saved draft in local storage and populates the editor.
     */
    restoreEditorFromDraft() {
        let localDraftTimestamp = StorageManager.get(this.timestampKey);

        // restore only if local draft exists
        if (localDraftTimestamp) {
            localDraftTimestamp = parseInt(localDraftTimestamp, 10)
        } else {
            showToast('No draft has been created yet', 'info');
            return;
        }

        // ensure draft not expired
        const MAX_AGE = SETTINGS.MAX_DRAFT_AGE_MS;
        if (localDraftTimestamp && (Date.now() - localDraftTimestamp) > MAX_AGE) {
            showToast('Draft is expired, ignoring it.', 'info');
            StorageManager.clear(STORAGE_KEYS.DRAFT_PREFIX);
            return;
        }

        const savedCategory = StorageManager.get(this.categoryKey);
        const savedTitle = StorageManager.get(this.titleKey);
        const savedContent = StorageManager.get(this.contentKey);

        try {
            this.isRestoring = true;
            this.isHydrating = true;

            showToast('Restoring draft', 'info');

            // restoring content
            this.trixEditor.editor.loadJSON(JSON.parse(savedContent));

            // restoring title
            this.titleInput.value = savedTitle;
            this.titleInput.dispatchEvent(new Event('input', { bubbles: true }));

            // restoring category
            window.dispatchEvent(new CustomEvent('draft-category-restored', {
                detail: { categoryId: savedCategory }
            }));

            showToast('Draft restored', 'success');

            // give Alpine/Livewire a moment to process the DOM events before syncing
            setTimeout(() => {
                this.isRestoring = false;
                this.isHydrating = false;
                this.hydrateLivewireContent();
            }, 100);
        } catch (e) {
            showToast('Failed to restore draft', 'error');
            // StorageManager.clear(STORAGE_KEYS.DRAFT_PREFIX);
            this.isRestoring = false;
            this.isHydrating = false;
        }
    }

    /**
     * Push content draft from local storage to Livewire to
     * synchronize the value.
     */
    hydrateLivewireContent() {
        const localContentValue = this.trixEditor.value;
        this.onContentChange(localContentValue);
    }
}
