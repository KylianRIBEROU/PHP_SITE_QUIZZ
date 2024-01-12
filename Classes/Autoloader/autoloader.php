<?php 

class Autoloader {

    static function register () {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload ($fcqn) {
        $path = str_replace('\\', '/', $fcqn);
        require '_inc/Classes/' . $path . '.php'; // auto complète le chemin
    }   
}