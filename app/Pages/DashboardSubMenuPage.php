<?php

namespace Plugin\PluginTemplate\Pages;

use \Blax\Wordpress\Extendables\Pages\SubMenu;

class DashboardSubMenuPage extends SubMenu
{
    const PAGE_PARENT = 'index.php';
    const PAGE_TITLE = 'Title Dashboard';   // Title of tab
    const MENU_TITLE = 'Blax Dashboard';    // Title in the menu
    const CAPABILITY = 'manage_options';    // Capability required to view page

    public function render()
    {
?>
        Here could be a lot of potential!
<?php
    }
}
