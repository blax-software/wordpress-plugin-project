<?php

namespace Plugin\PluginTemplate\Example;

require_once __DIR__ . '/vendor/autoload.php';

/*
 * Plugin Name:         Blax Plugin Template
 * Description:         A lot of potential
 * Version:             0.0.0
 * Author:              Blax Software & Consulting
 * Author URI:          https://www.blax.at
 * Text Domain:         blax-plugin-template
 * Requires at least:   6.x
 * Requires PHP:        7.4
 * License:             MIT
 * License URI:         https://opensource.org/licenses/MIT
 * GitHub Plugin URI:   https://github.com/blax-software/wordpress-plugin-project
 * 
 * 
 *  
 * |--------------------------------------------------------------------------
 * | The pluginfile
 * |--------------------------------------------------------------------------
 * |
 * | This is where most of the magic happens. This file is loaded by
 * | WordPress and from here on the framework takes over. You can
 * | override the default behaviour, but do not forget to call the parent
 * | constructor.
 */
class Plugin extends \Blax\Wordpress\Extendables\Plugin
{
}
new Plugin();
