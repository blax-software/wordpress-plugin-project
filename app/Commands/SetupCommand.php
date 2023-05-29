<?php

namespace Plugin\PluginTemplate\Commands;

use \Blax\Wordpress\Extendables\Command;
use Blax\Wordpress\Services\SetupService;
use Plugin\PluginTemplate\Services\PluginService;


class SetupCommand extends Command
{
    public static $signature = 'plugin:setup';
    public static $description = 'Sets up the plugin when installing';

    public function handle()
    {
        $this->writeln("Setting up plugin");

        PluginService::setPluginMeta(
            'Plugin Name',
            $name = $this->ask('What is the plugin visible name?', "Blax Plugin Template")
        );

        PluginService::setPluginMeta(
            'Description',
            $description = $this->ask('What is the plugin description?', "A lot of potential")
        );

        // namespace
        $current_namespace = SetupService::getNamespaceOfFile(PluginService::getPluginFile());
        $namespace = $this->ask('What is the plugin namespace?', $current_namespace);





        $this->writeln("Done setting up plugin");

        return Command::SUCCESS;
    }
}
