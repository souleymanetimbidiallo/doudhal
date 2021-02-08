<?php
namespace Core\Auth;
require "DatabaseAuth.php";

use App\Database;

class AdminAuth extends DatabaseAuth {
        /**
     * @param login nom d'utilisateur
     * @param password mot de passe
     * @return boolean 
     */
    public function login($login, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE login = ? AND status = \'admin\'', [$login], null, true);
        if($user){
            if($user->password === md5($password)){
                $_SESSION['auth'] = $user->id;
                $_SESSION['isAdmin'] = true;
                setcookie('user_id', $user->id);
                $_SESSION['login'] = $user->login;
                $_SESSION['user_name'] = ucwords($user->first_name.' '.$user->last_name);
                setcookie('login', $user->login, time()+3600*24, '/', '', true, true);
                return true;
            }
        }
        return false;
    }
    
    public function logged(){
        return isset($_SESSION['auth']) && $_SESSION['isAdmin'];
    }

    public function logout(){
        $_SESSION = array();
        session_destroy();
        header('Location: ../../public/index.php?p=admin');
    }
}