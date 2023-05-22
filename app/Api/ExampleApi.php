<?php

namespace Blax\Plugin\PluginTemplate;

class ExampleApi extends \Blax\Wordpress\Extendables\Api
{
    public static const NAMESPACE = 'blax/v1';
    public static const ROUTE = '/import';

    public static function handle(\WP_REST_Request $request)
    {
    }
}
