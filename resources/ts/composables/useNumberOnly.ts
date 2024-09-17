/**
 * Prevents non-numeric input in an input field
 */
export const numberonly =(e:Event|undefined):boolean|undefined=> {
    e = e || window.event;
    if (e) {
        const key = (e as KeyboardEvent).key;
        if (key && !key.match(/^\d$/)) {
            e.preventDefault();
        } else {
            return true;
        }
    }

    return undefined;
};

export default {
    numberonly
}