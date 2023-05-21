<?php


require __DIR__ . '/vendor/autoload.php';

use \Blax\Wordpress\Services\PluginService;
use \Blax\Wordpress\Services\SetupService;

/*
|--------------------------------------------------------------------------
| Sets up the project template to fit individual needs
|--------------------------------------------------------------------------
|
*/

//  change "pluginfile.php" to name of current directory
SetupService::changeNamespaceOfFile(__FILE__, 'xy');

echo PluginService::getVersion();
