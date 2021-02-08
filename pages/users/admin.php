<?php

use App\App;
use App\Autoloader;
use Core\Auth\AdminAuth;

require '../app/Autoloader.php';
require '../core/Auth/AdminAuth.php';
Autoloader::register();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'index';
}

//Authentification
$auth = new AdminAuth(App::getDatabase());
if(!$auth->logged()){
    header("Location: ../pages/auth/login.php");
}

//Affichage

$list_file = ['index', 'sendmail', 'login', ''];
$list_dir = ['courses', 'lessons', 'medias', 'quizzes', 'users',
             'sections', 'answers', 'orders', 'questions', 'categories', 'auth'];
$list_action = ['index', 'edit', 'add', 'show', 'delete'];

$tab = explode('.', $page);
ob_start();
if(count($tab)==1 && in_array($page, $list_file)){
        require "../pages/admin/".$page.".php";
}else if(count($tab)==2){
    $dir = $tab[0]; $file = $tab[1];
    if(in_array($dir, $list_dir) && in_array($file, $list_action)){
        require "../pages/admin/".$dir."/".$file.".php";
    }else{
        App::notFound();
    }
}else{
    App::notFound();
}


$content = ob_get_clean();
require "../pages/templates/backend/admin.php";
