<?php

namespace App;

class Autoload
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        // On récupère dans $class la totalité du namespace de la class concerné
        // On retire App\
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);

        // On remplace les \ par des /
        $class = str_replace ('\\', '/', $class);

        // On vérifie si le fichier existe
        $fichier = __DIR__ . '/' . $class . '.php';
        if(file_exists($fichier)){
            require_once $fichier;
        }
    }
}