<?php

namespace Plugin\PluginTemplate;

use Blax\Wordpress\Services\BuildService as bs;
use Blax\Wordpress\Services\PluginService;

shell_exec('composer dump-autoload');

require_once __DIR__ . '/vendor/autoload.php';

// get current folder name
$folderName = basename(__DIR__);

bs::incrementVersion(null, 'patch');

// compress into plugin.zip
print('Compress folder with all subfolders into blax-ice-configurator.zip' . PHP_EOL);
bs::addFileToZip(PluginService::getPluginFile());
bs::addFileToZip('composer.json');
bs::addFileToZip('composer.lock');
bs::addFolderToZip('app');
bs::addFolderToZip('vendor');
bs::closeZip();

print('Build finished successfully' . PHP_EOL);
