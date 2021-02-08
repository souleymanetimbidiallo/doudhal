<?php
namespace App;
use \PDO;

/**
 * class Database
 * @package App
 * 
 * Permet  de définir la gestion de la base données et des requêtes SQL
 */
class Database{

    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;
    private $pdo;

    /**
     * Initialise les paramètres de la base de données
     */
    public function __construct($db_name, $db_user='admin', $db_password='admin',  $db_host='localhost'){
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    /**
     * @return object 
     *      l'instance de PDO pour la connexion à la BDD
     */
    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO("mysql:hostname={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;    
        }
        return $this->pdo;
    }
    
    /**
     * @return object 
     *      un ou plusieurs n-uplets d'une requête simple
     */
    public function query($statement, $class_name=null, $one='false'){
        $requete = $this->getPDO()->query($statement);

        if(strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT') === 0 || strpos($statement, 'DELETE') === 0){
            return $requete;
        }

        if($class_name === null){
            $requete->setFetchMode(PDO::FETCH_OBJ);
        }else {
            $requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $data = $requete->fetch();
        }else{
            $data = $requete->fetchAll();
        }
        return $data;
    }

    /**
     * @return object 
     *      un ou plusieurs n-uplets d'une requête préparée
     */
    public function prepare($statement, $attributes, $class_name=null, $one='false'){
        $requete = $this->getPDO()->prepare($statement);
        $res = $requete->execute( $attributes);

        if(strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT') === 0 || strpos($statement, 'DELETE') === 0){
            return $res;
        }

        if($class_name === null){
            $requete->setFetchMode(PDO::FETCH_OBJ);
        }else {
            $requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $data = $requete->fetch();
        }else{
            $data = $requete->fetchAll();
        }
        return $data;
    }
    
    /**
     * @return int
     *      l'identifiant de la dernière requête
     */
    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }

    
}