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
        return false;
    }

    const missingKeys = requiredProps.filter(key => !config[key]);

    if (missingKeys.length !== 0) {
        showToast('Post text editor didn\'t initialized properly. Please contact to developer.', 'error');
        return false;
    }

    // const livewireComponent = config.livewireComponent;

    // Initialize Draft Manager with Livewire callbacks
    // const draftManager = new EditorDraftManager({
    //     draftId: config.draftId,
    //     titleInputId: config.titleInputId,
    //     categoryInputId: config.categoryInputId,
    //     contentInputId: config.contentInputId,
    //     saveDebounceMs: 1000,
    //     hydrateDebounceMs: 1000,
    //     isEditMode: config.isEditMode ? config.isEditMode : false,
    //
    //     // Sync content changes to Livewire
    //     onContentChange: (content) => {
    //         livewireComponent.call(config.hydrationMethod, null, content);
    //     },
    // });

    return true;
}

export function initTrixAttachmentHandler(config) {
    // config object validations
    const requiredProps = [
        'batchId',
        'uploadUrl',
        'deleteUrl',
        'csrfToken'
    ];

    if (typeof config !== 'object') {
        showToast('Failed to load attachment feature. Please contact to developer.', 'error');
        return false;
    }

    const missingKeys = requiredProps.filter(key => !config[key]);

    if (missingKeys.length !== 0) {
        showToast('Failed to load attachment feature. Please contact to developer.', 'error');
        return false;
    }

    // initialize attachment handler
    const attachmentHandler = new TrixAttachmentHandler({
        uploadUrl: config.uploadUrl,
        deleteUrl: config.deleteUrl,
        csrfToken: config.csrfToken,
        batchId: config.batchId,
    });

    // listen to Trix attachment events
    document.addEventListener('trix-attachment-add', (event) => {
        showToast('uploaded file')
        if (event.attachment.file) {
            attachmentHandler.upload(event.attachment);
        }
    });

    document.addEventListener('trix-attachment-remove', (event) => {
        if (event.target.dataset.protectAttachments == 'true') {
            return;
        }

        const attachmentId = event.attachment.attachment.attributes.values.attachmentId;
        if (attachmentId) {
            attachmentHandler.delete(attachmentId);
        }
        showToast('attachment ' + attachmentId + ' removed');
    });

    return true;
}
