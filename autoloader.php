<?php
// Déclaration de l'espace de noms pour cette classe (PSR-4)
namespace Src;

// Définition de la classe Autoloader
class Autoloader
{
    /**
     * Enregistre la fonction autoload comme autoloader dans la pile d'autoloading
     */
    static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }
    /**
     * Méthode de chargement automatique des classes
     *
     * @param string $class Le nom complet de la classe à charger
     */
    static function autoload($class)
    {
        // Remplace l'espace de noms de la classe actuelle par rien pour obtenir le chemin relatif
        $class = str_replace(__NAMESPACE__ . '\\', '' , $class);
        
        // Remplace les backslashes des espaces de noms par des slashes pour le chemin du fichier
        $class = str_replace('\\','/', $class);
        $fichier = __DIR__ .'/' . $class . '.php';

        // Vérifie si le fichier existe avant de tenter de l'inclure
        if(file_exists($fichier)) {
            require_once $fichier;
        }
    }
}
