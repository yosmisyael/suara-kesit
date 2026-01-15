import { EditorDraftManager } from "./EditorDraftManager.js";
import { TrixAttachmentHandler } from "./TrixAttachmentHandler.js";
import {showToast} from "../../utils/notify.js";
export { EditorDraftManager } from './EditorDraftManager.js';
export { TrixAttachmentHandler } from './TrixAttachmentHandler.js';

export function initializePostEditor(config) {
    // config object validations
    const requiredProps = [
        'livewireComponent',
        'hydrationMethod',
        'titleInputId',
        'categoryInputId',
        'contentInputId',
        'draftId',
        'uploadUrl',
        'deleteUrl',
        'csrfToken'
    ];

    if (typeof config !== 'object') {
        showToast('Failed to initialized post editor. Please contact to developer.', 'error');
        return;
    }

    const missingKeys = requiredProps.filter(key => !config[key]);

    if (missingKeys.length !== 0) {
        showToast('Post text editor didn\'t initialized properly. Please contact to developer.', 'error');
        return;
    }

    const livewireComponent = config.livewireComponent;

    // Initialize Draft Manager with Livewire callbacks
    const draftManager = new EditorDraftManager({
        draftId: config.draftId,
        titleInputId: config.titleInputId,
        categoryInputId: config.categoryInputId,
        contentInputId: config.contentInputId,
        saveDebounceMs: 1000,
        hydrateDebounceMs: 1000,
        isEditMode: config.isEditMode ? config.isEditMode : false,

        // Sync content changes to Livewire
        onContentChange: (content) => {
            livewireComponent.call(config.hydrationMethod, null, content);
        },
    });

    // Initialize Attachment Handler
    const attachmentHandler = new TrixAttachmentHandler({
        uploadUrl: config.uploadUrl,
        deleteUrl: config.deleteUrl,
        csrfToken: config.csrfToken,
        draftId: config.draftId,
    });

    // Setup Trix attachment events
    document.addEventListener('trix-attachment-add', (event) => {
        if (event.attachment.file) {
            attachmentHandler.upload(event.attachment);
        }
    });

    document.addEventListener('trix-attachment-remove', (event) => {
        const attachmentId = event.attachment.attachment.attributes.values.attachmentId;
        if (attachmentId) {
            attachmentHandler.delete(attachmentId);
        }
    });

    return { draftManager, attachmentHandler };
}
