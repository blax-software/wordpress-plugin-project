<?php

namespace Plugin\PluginTemplate\Commands;

use Blax\Wordpress\Extendables\Command;
use Blax\Wordpress\Services\ComposerService;
use Blax\Wordpress\Services\SetupService;
use Plugin\PluginTemplate\Services\PluginService;


class SetupCommand extends Command
{
    public static $signature = 'plugin:setup {--name} {--description=} {--namespace}';
    public static $description = 'Sets up the plugin when installing';

    public function handle()
    {
        $this->writeln("Setting up plugin");

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
        // #endregion Plugin Namespace


        $this->writeln("Done setting up plugin");

        return Command::SUCCESS;
    }
}
