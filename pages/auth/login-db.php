<?php
require '../../app/Autoloader.php';
App\Autoloader::register();

use App\App;
use Core\Auth\AdminAuth;
require '../../core/Auth/AdminAuth.php';
require '../../app/App.php';

if(!empty($_POST)){
    $auth = new AdminAuth(App::getDatabase());
    if($auth->login($_POST['login'], $_POST['password'])){
        echo "success";
    }else{
        echo 'failed';
    }     
}
?>