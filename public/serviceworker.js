var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/css/slick.css',
    '/css/slick-theme.css',
    '/css/main.css',
    '/js/jquery-3.4.1.min.js',
    '/js/popper.min.js',
    '/js/bootstrap4.min.js',
    '/js/jquery.countup.js',
    '/js/jQuery.succinct.min.js',
    '/js/notify.min.js',
    '/js/emploi-notify.js',
    '/js/slick.min.js',
    '/js/custom.js',
    '/images/favicon.png',
    '/images/500g.png',
    '/images/icons/icon-512x512.png',

];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// // Clear cache on activate
// self.addEventListener('activate', event => {
//     event.waitUntil(
//         caches.keys().then(cacheNames => {
//             return Promise.all(
//                 cacheNames
//                     .filter(cacheName => (cacheName.startsWith("pwa-")))
//                     .filter(cacheName => (cacheName !== staticCacheName))
//                     .map(cacheName => caches.delete(cacheName))
//             );
//         })
//     );
// });

// // Serve from Cache
// self.addEventListener("fetch", event => {
//     event.respondWith(
//         caches.match(event.request)
//             .then(response => {
//                 return response || fetch(event.request);
//             })
//             .catch(() => {
//                 return caches.match('offline');
//             })
//     )
// });