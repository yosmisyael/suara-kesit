import { TrixDraftManager } from "./TrixDraftManager.js";
import { TrixAttachmentHandler} from "./TrixAttachmentHandler.js";
import { showToast } from "../../utils/notify.js";

export function initializePostEditor(config) {
    // Initialize Draft Manager
    if (!config.trixElementId) {
        console.error('Trix editor element not found.');
        return;
    }
    const draftManager = new TrixDraftManager(config.trixElementId, {
        titleInput: document.querySelector('#post-title'),
        saveDebounceMs: 1000,
        onSave: (data) => {},
        onRestore: (data) => {},
        onClear: () => {},
    });

    // Initialize Attachment Handler
    const attachmentHandler = new TrixAttachmentHandler({
        uploadUrl: config.uploadUrl,
        deleteUrl: config.deleteUrl,
        csrfToken: config.csrfToken,
        batchId: config.batchId,
        onSuccess: (message, data) => showToast(message, 'success'),
        onError: (message) => showToast(message, 'error'),
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
