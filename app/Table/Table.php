<?php
namespace App\Table;
use App\App;

/**
 * class Table
 * @package App\Table
 * Permet de définir les informations communes pour toutes les tables de la BDD.
 */
class Table {
    /**
     * @var string $table    Le nom d'une table.
     */
    protected static $table;

    /**
     * @return object
     *      requête SELECT sur une table en selectionnant l'identifiant
     */
    public static function find($id){
        return static::query(
            "SELECT *
            FROM ".static::$table."
            WHERE id = ?", [$id], true
        );
    }

    /**
     * @return object
     *      requête UPDATE sur une table en modifiant 
     *      les informations à travers un identifiant
     */
    public static function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $key => $value){
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $attributes[] = $id;
        $sql_part = implode(',', $sql_parts);
        return static::query(
            "UPDATE ".static::$table." 
            SET $sql_part 
            WHERE id = ?", $attributes , true
        );
    }
    
    /**
     * @return object
     *      requête DELETE sur une table en supprimant 
     *       les informations à travers un idenfiant.
     */
    public static function delete($id){
        return static::query(
            "DELETE FROM ".static::$table." 
            WHERE id = ?", [$id] , true
        );
    }

    /**
     * @return object
     *      requête INSERT sur une table en ajoutant les informations
     */
    public static function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $key => $value){
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $sql_part = implode(',', $sql_parts);
        return static::query(
            "INSERT INTO ".static::$table." 
            SET $sql_part", $attributes , true
        );
    }

    /**
     * @return array
     *      tableau associé avec une clé et valeur sur une table
     */
    public static function list($key, $value){
        $records = static::getAll();
        $return =  [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    /**
     * @return array
     *      la requête à executer simple ou préparée
     */
    public static function query($statement, $attributes=null, $one=false){
        if($attributes){
            return App::getDatabase()->prepare($statement, $attributes, get_called_class(), $one);
        }else{
            return App::getDatabase()->query($statement, get_called_class(), $one);
        }
    }

    /**
     * @return object
     *      une requête SELECT sur tou les attributs de la table
     */
    public static function getAll(){
        return static::query(
            "SELECT *
            FROM ".static::$table ."", get_called_class());
    }


    public function __get($key){
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public static function getNumRows(){
        
        $statement = static::query(
            "SELECT COUNT(*) as number
             FROM ".static::$table ."", null, true
            );
        return $statement->number;
    }


}