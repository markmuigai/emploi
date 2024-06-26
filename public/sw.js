importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

if (workbox) {

	workbox.setConfig({debug: false});

  	workbox.routing.registerRoute(
	  /\.js$/,
	  new workbox.strategies.StaleWhileRevalidate({
	    // Use a custom cache name.
	      cacheName: 'js-cache',
	      plugins: [
		      new workbox.expiration.Plugin({
		        maxEntries: 200,
		        maxAgeSeconds: 4 * 24 * 60 * 60,
		      })
		    ],
	  })
	);

	workbox.routing.registerRoute(
	  // Cache CSS files.
	  /\.css$/,
	  // Use cache but update in the background.
	  new workbox.strategies.StaleWhileRevalidate({
	    // Use a custom cache name.
	    cacheName: 'css-cache',
	  })
	);

	workbox.routing.registerRoute(
	  // Cache image files.
	  /\.(?:png|jpg|jpeg|svg|gif)$/,
	  // Use the cache if it's available.
	  new workbox.strategies.CacheFirst({
	    // Use a custom cache name.
	    cacheName: 'image-cache',
	    plugins: [
	      new workbox.expiration.Plugin({
	        // Cache only 20 images.
	        maxEntries: 200,
	        // Cache for a maximum of 30 days.
	        maxAgeSeconds: 30 * 24 * 60 * 60,
	      })
	    ],
	  })
	);
	// workbox.routing.registerRoute(
	//   new RegExp('/'),
	//   new workbox.strategies.CacheFirst({
	//     // Use a custom cache name.
	//     cacheName: 'url-cache',
	//   })
	// );


} else {
  console.log(`Workbox didn't load 😬`);
}