<?php
namespace App\Table;

use App\App;

class User extends Table{

    protected static $table = 'users';

    public static function getAll(){
        return self::query(
            "SELECT *
            FROM ".self::$table."");
    }

    public function getUrl(){
        return "index.php?p=user&id=".$this->id;
    }

    public static function userByRole($status){
        return self::query(
            "SELECT * 
            FROM users
            WHERE status = ?
            ORDER BY last_name",[$status]);
    }

    public function getFullname(){
        return $this->first_name." ".$this->last_name;
    }

    public function login($username, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if($user){
            if($user->password === md5($password)){
                $_SESSION['auth'] = $user->id;
                setcookie('user_id', $user->id);
                $_SESSION['username'] = $user->username;
                setcookie('username', $user->username, time()+3600*24, '/', '', true, true);
                return true;
            }
        }
        return false;
    }
}