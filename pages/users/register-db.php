<?php
require '../../app/Autoloader.php';
App\Autoloader::register();

use App\App;
use Core\Auth\DatabaseAuth;
require '../../core/Auth/DatabaseAuth.php';
require '../../app/App.php';


if(!empty($_POST)){
    $auth = new DatabaseAuth(App::getDatabase());
    $result = $auth->create([
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'mail' => $_POST['mail'],
        'login' => $_POST['login'],
        'tel' => $_POST['tel'],
        'login' => $_POST['login'],
        'password' => md5($_POST['password']),
    ]);
    if($result){
        if($auth->login($_POST['login'], $_POST['password'])){     
            header('Location: ../../public/index.php?p=home');
        }     
    }
    header('Location: ../../public/index.php?p=home');
}
?>