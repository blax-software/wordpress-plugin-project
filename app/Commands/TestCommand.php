<?php

namespace Plugin\PluginTemplate\Commands;

use Blax\Wordpress\Extendables\Command;
use Blax\Wordpress\Services\Mixedservice;
use Plugin\PluginTemplate\Services\PluginService;

class TestCommand extends Command
{
    public static $signature = 'test {an_argument?} {--an_option}';
    public static $description = 'Test whatever you want';

    public function handle()
    {
        // If you want to test something, just do it here

        return Command::SUCCESS;
    }
}
