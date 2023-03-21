
export function useFlash() {
    function flash(message) {
        return alert(message);
    }

    return { 
        flash,
    }
;}