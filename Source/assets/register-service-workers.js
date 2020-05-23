if (navigator.serviceWorker && !navigator.serviceWorker.controller) {
    navigator.serviceWorker.register('/assets/cache-worker.js', { scope: '/' }).then(() => {
        console.log('Cache worker registered successfully. We start caching.');
    }).catch(error => {
        console.log('Cache worker registration failed:', error);
    });

    navigator.serviceWorker.register('/assets/offline-worker.js', { scope: '/' }).then(() => {
        console.log('Offine worker registered successfully. We work offline now.');
    }).catch(error => {
        console.log('Offline worker registration failed:', error);
    });
}