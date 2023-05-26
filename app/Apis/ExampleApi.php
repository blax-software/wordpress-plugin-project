<?php

namespace Plugin\PluginTemplate\Apis;

class ExampleApi extends \Blax\Wordpress\Extendables\Api
{
    public const NAMESPACE = 'blax/v1';
    public const ROUTE = '/import';

    public static function handle($request = null)
    {
    }
}
