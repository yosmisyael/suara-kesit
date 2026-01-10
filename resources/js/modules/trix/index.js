import { TrixManager } from "./TrixManager.js";
import { TrixAttachmentHandler } from "./TrixAttachmentHandler.js";
import {showToast} from "../../utils/notify.js";
export { TrixManager } from './TrixManager.js';
export { TrixAttachmentHandler } from './TrixAttachmentHandler.js';

export function initializePostEditor(config) {
    // Get Livewire component reference
    if (!config.livewireComponent || !config.syncingMethodName) {
        showToast('Post text editor didn\'t initialized properly. Please contact to developer.', 'error');
        return;
    }
    const livewireComponent = config.livewireComponent;

    // Initialize Draft Manager with Livewire callbacks
    const draftManager = new TrixManager(config.trixElementId || 'canvas', {
        titleInput: document.querySelector('#post-title'),
        saveDebounceMs: 1000,
        syncDebounceMs: 1000,

        // Sync content changes to Livewire
        onContentChange: (content) => {
            livewireComponent.call(config.syncingMethodName, null, content);
        },
    });

    // Initialize Attachment Handler
    const attachmentHandler = new TrixAttachmentHandler({
        uploadUrl: config.uploadUrl,
        deleteUrl: config.deleteUrl,
        csrfToken: config.csrfToken,
        batchId: config.batchId,
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
