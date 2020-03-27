<?php

class Autoloader
{
    /**
    * Ajout de l'autoloader
    */
    public static function register()
    {
        spl_autoload_register(function ($class) {
            include_once '_classes/' . $class . '.php';
        });
    }
}
