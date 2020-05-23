ogma("create", "q4_re_1587111381873");
const hash = window.location.hash.substr(1);
if(hash !== '') {
    ogma("send", "pageview", hash);
}
else {
    ogma("send", "pageview");
}
window.addEventListener("hashchange", function() {
    const newHash = window.location.hash.substr(1);
    if(newHash !== '') {
        ogma("send", "pageview", newHash);
    }
    else {
        ogma("send", "pageview");
    }
});