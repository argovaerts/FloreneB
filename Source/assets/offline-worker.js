self.addEventListener('install', e => {
    e.waitUntil(
      // after the service worker is installed,
      // open a new cache
      caches.open('q4-re-pwa-cache').then(cache => {
        // add all URLs of resources we want to cache
        return cache.addAll([
          '/',
          '/index.html',
          '/assets/Arne.jpg',
          '//assets/print.css',
          '/assets/terminal.css',
          '/assets/icons/android-chrome-192x192.png',
          '/assets/icons/android-chrome-512x512.png',
          '/assets/icons/apple-touch-icon.png',
          '/assets/icons/favicon-16x16.png',
          '/assets/icons/favicon-32x32.png',
          '/assets/icons/favicon.ico',
          '/assets/icons/mstile-150x150.png',
          '/assets/icons/browserconfig.xml',
          '/assets/icons/site.webmanifest',
        ]);
      })
    );
});