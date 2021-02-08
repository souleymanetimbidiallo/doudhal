<?php
namespace Core\Auth;
session_start();
use App\Database;

class DatabaseAuth {

    protected $db;

    public function __construct(Database $db){
        $this->db = $db;
    }


    /**
     * @param login nom d'utilisateur
     * @param password mot de passe
     * @return boolean 
     */
    public function login($login, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE login = ?', [$login], null, true);
        if($user){
            if($user->password === md5($password)){
                $_SESSION['auth'] = $user->id;
                setcookie('user_id', $user->id);
                $_SESSION['login'] = $user->login;
                $_SESSION['user_name'] = ucwords($user->first_name.' '.$user->last_name);
                setcookie('login', $user->login, time()+3600*24, '/', '', true, true);
                return true;
            }
        }
        return false;
    }
    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $key => $value){
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $sql_part = implode(',', $sql_parts);
        $data = $this->db->prepare(
            "INSERT INTO users SET $sql_part", $attributes , true
        );
        return $data;
    }


    public function logged(){
        return isset($_SESSION['auth']);
    }

    public function logout(){
        $_SESSION = array();
        session_destroy();
        header('Location: ../../public/index.php?p=login');
    }
}