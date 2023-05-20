<?php

// get current folder name
$folderName = basename(__DIR__);

#region Increment version
// in file pluginfile increase Version number by 0.0.1
$pluginFile = __DIR__ . '/' . $folderName . '.php';
$pluginFileContent = file_get_contents($pluginFile);

#region get part where pattern is "* Version: 0.0.2" and get version number as array
$version = preg_match('/\* Version: \d+\.\d+\.\d+/', $pluginFileContent, $matches);
$version = $matches[0];
$version = explode(' ', $version);
$version = $version[2];
#endregion

// increment version number
$version = explode('.', $version);
if (in_array('--major', $argv)) {
    $version[0] = (int) $version[0] + 1;
    $version[1] = $version[2] = 0;
    $version = implode('.', $version);
} elseif (in_array('--minor', $argv)) {
    $version[1] = (int) $version[1] + 1;
    $version[2] = 0;
    $version = implode('.', $version);
} elseif (in_array('--patch', $argv)) {
    $version[2] = (int) $version[2] + 1;
    $version = implode('.', $version);
} else {
    $version = implode('.', $version);
}

// replace old version with new one
$pluginFileContent = preg_replace('/\* Version: \d+\.\d+\.\d+/', '* Version: ' . $version, $pluginFileContent);

// write new content to file
file_put_contents($pluginFile, $pluginFileContent);
#endregion

// delete plugin.zip if exists
if (file_exists(__DIR__ . '/' . $folderName . '.zip')) {
    print('Deleting ' . $folderName . '.zip' . PHP_EOL);
    unlink(__DIR__ . '/' . $folderName . '.zip');
}

sleep(1);

// compress into plugin.zip
print('Compress folder with all subfolders into blax-ice-configurator.zip' . PHP_EOL);
$zip = new ZipArchive();
$zip->open(__DIR__ . '/' . $folderName . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

#region functions
function addFile($relative_file)
{
    global $zip;
    $zip->addFile(__DIR__ . '/' . $relative_file, $relative_file);
}

// add folder with all subfolders to zip while keeping structure
function addFolder($relative_folder)
{
    global $zip;

    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator(__DIR__ . '/' . $relative_folder),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        // Skip directories (they would be added automatically)
        if (!$file->isDir()) {
            if (strpos($file->getRealPath(), 'node_modules') !== false) continue;

            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen(__DIR__ . '/' . $relative_folder) + 1);
            $zip->addFile($filePath, $relative_folder . '/' . $relativePath);
        }
    }
}
#endregion functions

addFile($folderName . '.php');
addFile('composer.json');
addFile('composer.lock');
addFolder('app');
addFolder('vendor');


$zip->close();

// remove created folder
print('Removing created folder and all subfolders' . PHP_EOL);
exec('rm -rf ' . __DIR__ . '/' . basename(__DIR__));

print('Build finished successfully' . PHP_EOL);
