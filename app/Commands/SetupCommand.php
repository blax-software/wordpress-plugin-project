<?php

namespace Plugin\PluginTemplate\Commands;

use \Blax\Wordpress\Extendables\Command;
use Plugin\PluginTemplate\Services\PluginService;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class SetupCommand extends Command
{
    public static $signature = 'plugin:setup {--no-interaction} {--update]';
    public static $description = 'Sets up the plugin when installing';

    public function handle()
    {
        $this->writeln("Setting up plugin");

        // if no interaction, assume yes
        // if ($this->input->getOption('no-interaction')) {
        //     $this->input->setOption('update', true);
        // }

        $pluginname = $this->ask("What is the plugin name?", 'Plugin Template');

        $this->writeln("Plugin name: {$pluginname}");

        // dd(dirname(PluginService::getPluginFile()));

        $this->writeln("Done setting up plugin");

        return Command::SUCCESS;
    }
}
