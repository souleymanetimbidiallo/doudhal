<?php
require '../../app/Autoloader.php';
App\Autoloader::register();

use App\App;
use Core\Auth\AdminAuth;
require '../../core/Auth/AdminAuth.php';
require '../../app/App.php';


$auth = new AdminAuth(App::getDatabase());
$auth->logout();