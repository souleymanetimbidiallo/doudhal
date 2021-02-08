<?php
namespace App;
use App\Database;

/**
 * class App
 * @package App
 * Permet  de définir les paramètres principaux du site web.
 */
class App{

  
    const DB_NAME = 'doudhal'; //doudjmpg_database
    const DB_USER = 'admin'; //doudjmpg_user
    const DB_PASSWORD = 'admin'; //Doudhal@224
    const DB_HOST = 'localhost';

    /**
     * @var string $title    Le titre d'une page web.
     * @var object $database L'objet database pour se connecter à la base de données 
     */
    private static $title = 'Doudhal';
    private static $database;

    /**
     * @return object
     *      Base de données du site web
     */
    public static function getDatabase(){
        if(self::$database === null){
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASSWORD, self::DB_HOST);
        }
        return self::$database;
    }

    /**
     * Redirige vers la page 404 (Fchier non trouvé)
     */
    public static function notFound(){
        header('HTTP/1.0 404 Not Found');
        header('Location: index.php?p=404');
    }

    /**
     * Interdit l'accès a certains fichiers du site
     */
    public static function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die("Accès interdit");
    }

    /**
     * @return string 
     *      Nom de page web en cours
     */
    public static function getTitle(){
        return self::$title;
    }

    /**
     * Modifie le titre d'une page web
     * @param int $title 
     *      Le titre de la page à modifier
     */
    public static function setTitle($title){
        self::$title = self::$title.' | '.$title;
    }
}