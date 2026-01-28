import "./libs/trix";
import { initializePostEditor, initTrixAttachmentHandler } from "./modules/trix/index.js";
import { showToast } from "./utils/notify.js";

window.App = {
    initEditor: initializePostEditor,
    initAttachmentManager: initTrixAttachmentHandler,
    draftManager: null,
    utils: { showToast },
    env: import.meta.env.MODE,
}

if (import.meta.env.PROD) {
    Object.freeze(window.App.utils);
    Object.freeze(window.App.initEditor);
}
