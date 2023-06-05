<?php

namespace Plugin\PluginTemplate\Pages;

class SettingsPage
{
    const SETTINGS_GROUP = 'blax_plugin_template_settings_group';
    const SETTINGS_PAGE = 'blax_plugin_template_settings_page';

    public function __construct()
    {
        add_action('admin_menu', function () {
            add_submenu_page(
                'options-general.php',
                'Blax Plugin Settings',
                'Blax Plugin Settings',
                'manage_options',
                'blax_plugin_settings',
                [$this, 'render'],
                1
            );
        });

        $this->registerSettings();
    }

    public function render()
    {
?>
        <div class="wrap">
            <h1>Blax Plugin Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields(static::SETTINGS_GROUP);
                do_settings_sections(static::SETTINGS_PAGE);
                submit_button();
                ?>
            </form>
        </div>
<?php
    }

    public function registerSettings()
    {
        add_action('admin_menu', function () {
            add_settings_section(
                ($section = 'blax_settings_section'),
                'Default Product',
                function () {
                    echo '<p>Enter default settings for your new products products.</p>';
                },
                static::SETTINGS_PAGE
            );

            add_settings_field(
                'product_default_settings_description',
                'Description',
                function () {
                    $options = get_option('product_default_settings');
                    $value = isset($options['description']) ? $options['description'] : '';
                    wp_editor($value, 'description', ['textarea_name' => 'product_default_settings[description]']);
                },
                static::SETTINGS_PAGE,
                $section
            );

            // short description
            add_settings_field(
                'product_default_settings_short_description',
                'Short Description',
                function () {
                    $options = get_option('product_default_settings');
                    $value = isset($options['short_description']) ? $options['short_description'] : '';
                    wp_editor($value, 'short_description', ['textarea_name' => 'product_default_settings[short_description]']);
                },
                static::SETTINGS_PAGE,
                $section
            );

            register_setting(
                static::SETTINGS_GROUP,
                'product_default_settings'
            );
        });
    }
}
