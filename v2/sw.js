importScripts('https://storage.googleapis.com/workbox-cdn/releases/3.5.0/workbox-sw.js');

// This will trigger the importScripts() for workbox.strategies and its dependencies:
workbox.loadModule('workbox-strategies');

const staticAssets = [
    '/',
    '/index.html',
    '/css/style.css'
];

// Revisioned files added via a glob
workbox.precaching.precache(staticAssets);

// Add Precache Route
workbox.precaching.addRoute();