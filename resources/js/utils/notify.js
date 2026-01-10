/**
 * Dispatch a notification event on window that listened by Alpine on toast component.
 * @param {string} message
 * @param {string} type - 'success' | 'error'
 */
export function showToast(message, type = 'success') {
    window.dispatchEvent(new CustomEvent('notify', {
        detail: { message: message, type: type }
    }));
}
