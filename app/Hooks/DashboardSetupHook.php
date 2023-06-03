<?php

namespace Plugin\PluginTemplate\Hooks;

use Blax\Wordpress\Services\PluginService;

class DashboardSetupHook
{
    public function __construct()
    {
        add_action('wp_dashboard_setup', function () {
            wp_add_dashboard_widget(
                'dashboardwidget_blax_plugin_' . PluginService::getPluginMeta('Plugin Name'), // Unique widget ID
                'Powered by Blax', // Widget title
                function () {
                    $url = get_site_url() . '/' . str_replace(ABSPATH, '', PluginService::getPluginDir()) . "logo_wordpress-plugin-project.png";
?>
                <div style="background:#252f42;padding:1.5rem; color :white;" id="<?= 'dashboardwidget_blax_plugin_image_' . PluginService::getPluginMeta('Plugin Name') ?>">
                    <a href="https://github.com/blax-software/wordpress-plugin-project" style="display:block;"><img style="width:100%;display:block" src="<?= $url ?>"></a>
                </div>

                <script>
                    var div = document.getElementById('dashboardwidget_blax_plugin_image_<?= PluginService::getPluginMeta('Plugin Name') ?>');
                    div.parentElement.style.padding = '0';
                    div.parentElement.style.margin = '0';
                </script>
<?php
                }
            );
        });
    }
}
