if (navigator.serviceWorker && !navigator.serviceWorker.controller) {
    navigator.serviceWorker.register('cache-worker.js', { scope: '/' }).then(() => {
        console.log('Cache worker registered successfully. We start caching.');
    }).catch(error => {
        console.log('Cache worker registration failed:', error);
    });
}