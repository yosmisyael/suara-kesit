import {showToast} from "../../utils/notify.js";

export class TrixAttachmentHandler {
    static instance = null;
    constructor(config) {
        if (TrixAttachmentHandler.instance) return TrixAttachmentHandler;

        this.uploadUrl = config.uploadUrl;
        this.deleteUrl = config.deleteUrl;
        this.csrfToken = config.csrfToken;
        this.batchId = config.batchId || null;
        this.postId = config.postId || null;

        TrixAttachmentHandler.instance = this;
    }

    upload(attachment) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", this.uploadUrl, true);
        xhr.setRequestHeader("Accept", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", this.csrfToken);

        const formData = new FormData();
        formData.append("image", attachment.file);
        if (this.postId) {
            formData.append("post_id", this.postId);
        } else {
            formData.append("batch_id", this.batchId);
        }

        xhr.upload.onprogress = (event) => {
            const progress = event.loaded / event.total * 100;
            attachment.setUploadProgress(progress);
        };

        xhr.onload = () => {
            try {
                const res = JSON.parse(xhr.responseText);

                if (xhr.status === 200) {
                    attachment.setAttributes({
                        url: res.url,
                        href: res.url,
                        attachmentId: res.attachmentId,
                    });
                    showToast('Attachment uploaded successfully.')
                } else if (xhr.status === 422) {
                    attachment.remove();
                    const errMessage = res.errors?.image?.[0] || res.message || 'Invalid file type';
                    showToast(errMessage, 'error');
                } else {
                    attachment.remove();
                    showToast('We are currently experiencing an unexpected issue. Please try again later.', 'error');
                }
            } catch (e) {
                attachment.remove();
                showToast('Failed to process server response.', 'error');
            }
        };

        xhr.onerror = () => {
            attachment.remove();
            showToast('Network error. Check your connection.', 'error');
        };

        xhr.send(formData);
    }

    delete(attachmentId) {
        const xhr = new XMLHttpRequest();
        const url = this.deleteUrl.replace(':id', attachmentId);
        xhr.open('DELETE', url, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', this.csrfToken);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('Accept', 'application/json');

        xhr.onload = () => {
            try {
                const res = JSON.parse(xhr.responseText);
                if (xhr.status === 200) {
                    showToast(res.message);
                }
            } catch (e) {
                console.error('Failed to process delete response:', e);
            }
        };

        xhr.send();
    }
}
