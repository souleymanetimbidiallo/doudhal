<?php
namespace App\Table;

class Order extends Table{

    protected static $table = "orders";

    public static function getAll(){
        return self::query(
            "SELECT ord.id as id, DATE_FORMAT(ord.date, \"%d/%m/%Y\") as date, ord.amount as amount, 
            ord.status as status, crs.title as course , 
            concat(u.first_name, ' ', u.last_name) as student
            FROM orders ord
            LEFT JOIN courses crs 
            ON ord.course_id = crs.id
            LEFT JOIN users u
            ON ord.user_id = u.id
            ORDER BY ord.date DESC"
            );
    }

    
    public static function find($id){
        return self::query(
            "SELECT ord.id as id, ord.date as date, ord.amount as amount, 
            ord.status as status, crs.title as course ,
            concat(u.first_name, ' ', u.last_name) as student
            FROM orders ord
            LEFT JOIN courses crs 
            ON ord.course_id = crs.id
            LEFT JOIN users u
            ON ord.user_id = u.id
            WHERE ord.id = ?", 
            [$id], true);
    }

    public function __get($key){
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl(){
        return "index.php?p=order&id=".$this->id;
    }

    
}