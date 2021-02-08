<?php
use App\App;
use App\Autoloader;

require '../app/Autoloader.php';
require '../core/Auth/DatabaseAuth.php';
Autoloader::register();


if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}


ob_start();

switch($p){
    case 'home': 
        require "../pages/home.php";
        break;
    case 'admin': 
        header("Location: admin.php");
        break;
    case 'product':
        require "../pages/products/show.php";
        break;
    case 'contact': 
        require "../pages/single/contact.php";
        break;
    case 'about': 
        require "../pages/single/about.php";
        break;
    case 'courses': 
        require "../pages/courses/all.php";
        break;
    case 'course': 
        require "../pages/courses/show.php";
        break;
    case 'doudhal-login': 
            header("Location: ../pages/auth/login.php");
            break;
    case 'login': 
        require "../pages/users/login.php";
        break;
    case 'register': 
        require "../pages/users/register.php";
        break;
    case 'profile': 
        require "../pages/users/profile.php";
        break;
    case 'logout': 
        header("Location: ../pages/users/logout.php");
        break;
    case 'logout-admin': 
        header("Location: ../pages/auth/logout.php");
        break;
    case '404': 
        header("Location: 404.html");
        break;
    default: header("Location: 404.html");
}

$content = ob_get_clean();

require "../pages/templates/frontend/main.php";