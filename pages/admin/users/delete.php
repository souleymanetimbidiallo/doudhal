<?php

use App\Table\Utilisateur;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Utilisateur::delete($_POST['id']);
    header('Location: admin.php?p=users.index');
}