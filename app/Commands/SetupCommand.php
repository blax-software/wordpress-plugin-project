<?php

namespace Plugin\PluginTemplate\Commands;

use Blax\Wordpress\Extendables\Command;
use Blax\Wordpress\Services\ComposerService;
use Blax\Wordpress\Services\MixedService;
use Blax\Wordpress\Services\SetupService;
use Plugin\PluginTemplate\Services\PluginService;


class SetupCommand extends Command
{
    public static $signature = 'plugin:setup {--name} {--description=} {--namespace} {--text_domain}';
    public static $description = 'Sets up the plugin when installing';

    public function handle()
    {
        if (basename(PluginService::getPluginFile()) == "pluginfile.php") {
            $this->writeln("Setting up plugin");
        } else {
            if ($this->confirm("Do you want to set up the plugin again?")) {
                $this->writelnColor("Setting up plugin (again)" . PHP_EOL, 'yellow');
            } else {
                $this->writelnColor("Skipping repeated plugin setup" . PHP_EOL, 'yellow');
                return Command::SUCCESS;
            }
        }

        // #region Plugin Name
        $plugin_name = $this->getOption('name');

        if ($plugin_name && strlen($plugin_name) > 1) {
            $this->write(PHP_EOL . "Plugin name is set: ");
            $this->writelnColor($plugin_name, 'green');
            PluginService::setPluginMeta('Plugin Name', $plugin_name);
        } else {
            PluginService::setPluginMeta(
                'Plugin Name',
                $plugin_name = $this->ask('What is the plugin visible name?', "Blax Plugin Template")
            );
        }
        // #endregion

        // #region Plugin Description
        $plugin_description = $this->getOption('description');

        if ($plugin_description && strlen($plugin_description) > 1) {
            $this->write(PHP_EOL . "Plugin description is set: ");
            $this->writelnColor($plugin_description, 'green');
            PluginService::setPluginMeta('Description', $plugin_description);
        } else {
            PluginService::setPluginMeta(
                'Description',
                $plugin_description = $this->ask('What is the plugin description?', "A lot of potential")
            );
        }
        // #endregion

        // #region Text Domain
        $plugin_text_domain = $this->getOption('text_domain');

        if ($plugin_text_domain && strlen($plugin_text_domain) > 1) {
            $this->write(PHP_EOL . "Plugin text domain is set: ");
            $this->writelnColor($plugin_text_domain, 'green');
            PluginService::setPluginMeta('Text Domain', $plugin_text_domain);
        } else {
            PluginService::setPluginMeta(
                'Text Domain',
                $plugin_text_domain = $this->ask('What is the plugin text domain?', "blax-plugin-template")
            );
        }
        // #endregion



        // #region Plugin Namespace
        $default_namespace = "Plugin\PluginTemplate";
        $current_namespace = ComposerService::getNamespace();
        $to_be_namespace = $this->getOption('namespace');

        if ($to_be_namespace && strlen($to_be_namespace) > 1) {
            $this->write(PHP_EOL . "Plugin namespace is set: ");
            $this->writelnColor($this->getOption('namespace'), 'green');
            $to_be_namespace = $this->getOption('namespace');
        } else {
            $to_be_namespace = $this->ask('What is the plugin namespace?', $default_namespace);
        }

        $to_be_namespace = trim($to_be_namespace);

        // if last char is not a backslash, add it
        if (substr($to_be_namespace, -1) !== '\\') {
            $to_be_namespace .= '\\';
        }

        ComposerService::setNamespace($to_be_namespace);

        // remove last char if backslash
        if (substr($current_namespace, -1) === '\\') {
            $current_namespace = substr($current_namespace, 0, -1);
        }
        if (substr($to_be_namespace, -1) === '\\') {
            $to_be_namespace = substr($to_be_namespace, 0, -1);
        }

        SetupService::replaceNamespaceOfFile(
            PluginService::getPluginFile(),
            $current_namespace,
            $to_be_namespace,
            true
        );

        foreach (MixedService::getAllFiles(PluginService::getPluginDir() . '/app/') as $key => $absolute_file_path) {
            SetupService::replaceNamespaceOfFile(
                $absolute_file_path,
                $current_namespace,
                $to_be_namespace,
                true
            );
        }
        // #endregion Plugin Namespace

        // #region Plugin File
        $new_plugin_file_path = (PluginService::getPluginDir() . '/' . basename(PluginService::getPluginDir()) . '.php');

        if (file_exists($new_plugin_file_path)) {
            $this->writelnColor("Plugin file already exists", 'red');
        } else {
            rename(PluginService::getPluginFile(), $new_plugin_file_path);
            $this->writelnColor("Plugin file renamed to " . basename($new_plugin_file_path), 'green');
        }

        $this->writeln("");
        $this->writelnColor("Done setting up plugin", 'green');
        $this->writeln("");

        return Command::SUCCESS;
    }
}
