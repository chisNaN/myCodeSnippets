async function sha256(str) {
    try {
        const buf = await crypto.subtle.digest("SHA-256", new TextEncoder("utf-8").encode(str));
        return Array.prototype.map.call(new Uint8Array(buf), x => (('00' + x.toString(16)).slice(-2))).join('');
    } catch (e) {
        alert('your browser does not implement crypto library, please use another browser');
        console.warn(e);
        return e;
    }
}
