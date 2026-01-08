import "./libs/trix";
import { initializePostEditor } from "./modules/trix/index.js";
import { showToast } from "./utils/notify.js";

window.App = {
    initEditor: initializePostEditor,
    utils: { showToast },
}
