export function show(element) {
    if (element) element.classList.remove('hidden');
}

export function hide(element) {
    if (element) element.classList.add('hidden');
}

export function toggle(element) {
    if (element) element.classList.toggle('hidden');
}

export function setText(element, text) {
    if (element) element.textContent = text;
}

export function setHTML(element, html) {
    if (element) element.innerHTML = html;
}
