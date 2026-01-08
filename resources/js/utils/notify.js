/**
 * Dispatch a notification event that Alpine.js listens for.
 * @param {string} message
 * @param {string} type - 'success' | 'error'
 */
export function showToast(message, type = 'success') {
    window.dispatchEvent(new CustomEvent('notify', {
        detail: { message: message, type: type }
    }));
}
