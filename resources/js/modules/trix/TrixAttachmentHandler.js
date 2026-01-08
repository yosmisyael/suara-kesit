export class TrixAttachmentHandler {
    constructor(config) {
        this.uploadUrl = config.uploadUrl;
        this.deleteUrl = config.deleteUrl;
        this.csrfToken = config.csrfToken;
        this.batchId = config.batchId;
        this.onSuccess = config.onSuccess || (() => { console.log('image uploaded successfully') });
        this.onError = config.onError || (() => { console.error('failed to upload attachment.') });
    }

    upload(attachment) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", this.uploadUrl, true);
        xhr.setRequestHeader("Accept", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", this.csrfToken);

        const formData = new FormData();
        formData.append("image", attachment.file);
        formData.append("batch_id", this.batchId);

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
                    this.onSuccess('Image uploaded successfully.');
                } else if (xhr.status === 422) {
                    attachment.remove();
                    const errMessage = res.errors?.image?.[0] || res.message || 'Invalid file type';
                    this.onError(errMessage);
                } else {
                    attachment.remove();
                    this.onError('We are currently experiencing an unexpected issue. Please try again later.');
                }
            } catch (e) {
                attachment.remove();
                this.onError('Failed to process server response.');
            }
        };

        xhr.onerror = () => {
            attachment.remove();
            this.onError('Network error. Check your connection.');
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
                    this.onSuccess(res.message);
                }
            } catch (e) {
                console.error('Failed to process delete response:', e);
            }
        };

        xhr.send();
    }
}
