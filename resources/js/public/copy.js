import ClipboardJS from "clipboard";

export const InitCopy = () => {
    var clipboard = new ClipboardJS('.copyBtn')
    clipboard.on('success', (e) => {
        var parent = e.trigger.closest('.copyParent');
        if(parent) {
            parent.classList.add("copyDone");
            setTimeout(() => {
                parent.classList.remove("copyDone");
            }, 500);
        }
    });
}
