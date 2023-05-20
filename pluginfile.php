<?php

require_once __DIR__ . '/vendor/autoload.php';

/*
 * Plugin Name: Blax Plugin Template
 * Description: CSV Importer
 * Version: 0.0.0
 * Author:      Blax Software & Consulting
 * Author URI:  https://www.blax.at
 * Text Domain: blax-plugin-template
 * Requires at least: 5.x
 * Requires PHP: 7.4
 */
class Plugin extends Blax\Wordpress\Plugin
{
    public static $name = 'Blax Plugin Template';
    public static $version = '0.0.0';
    public static $textDomain = 'blax-plugin-template';
}
