<br>
<p align="center">
    <a target="_blank"><img src="logo_wordpress-plugin-project.png">
    </a>
</p>

[![Latest Stable Version](http://poser.pugx.org/blax-software/wordpress-plugin-project/v)](https://packagist.org/packages/blax-software/wordpress-plugin-project) [![Total Downloads](http://poser.pugx.org/blax-software/wordpress-plugin-project/downloads)](https://packagist.org/packages/blax-software/wordpress-plugin-project) [![Latest Unstable Version](http://poser.pugx.org/blax-software/wordpress-plugin-project/v/unstable)](https://packagist.org/packages/blax-software/wordpress-plugin-project) [![License](http://poser.pugx.org/blax-software/wordpress-plugin-project/license)](https://packagist.org/packages/blax-software/wordpress-plugin-project)

## About

This is a WordPress-Plugin-Project-Template providing essential tools, classes and interfaces to get started quickly with a new WordPress plugin. This project template provides:

- Tools, extendables and more from [Wordpress Plugin Framework](https://github.com/blax-software/wordpress-plugin-framework)
- A [Eloquent](https://laravel.com/docs/eloquent)-like database abstraction layer with MVC-structure
- A [build-tool](https://github.com/blax-software/wordpress-plugin-project/blob/main/build.php) to build the plugin into a zip-file for the customer

## Installation

1. Set-up with composer (recommended)

    ```shell
    composer create-project blax-software/wordpress-plugin-project my-plugin
    ```
1. Composer automatically executes the setup script. If you want to run it manually, execute:

    ```shell
    php interact plugin:setup
    ```
1. ???
1. Profit