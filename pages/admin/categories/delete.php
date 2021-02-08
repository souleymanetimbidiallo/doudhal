<?php

use App\Table\Category;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Category::delete($_POST['id']);
    header('Location: admin.php?p=categories.index');
}