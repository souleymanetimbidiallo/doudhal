<?php
require '../../app/Autoloader.php';
App\Autoloader::register();

use App\App;
use Core\Auth\DatabaseAuth;
require '../../core/Auth/DatabaseAuth.php';
require '../../app/App.php';


$auth = new DatabaseAuth(App::getDatabase());
$auth->logout();