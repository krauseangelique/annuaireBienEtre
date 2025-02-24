import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

import mapboxgl from 'mapbox-gl' // insertion de la carte Map
import './styles/app.css'

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉')
/**
 * Installation
To install the AssetMapper component, run:

composer require symfony/asset-mapper symfony/asset symfony/twig-pack

In addition to symfony/asset-mapper, this also makes sure that you have the Asset Component and Twig available.
 */