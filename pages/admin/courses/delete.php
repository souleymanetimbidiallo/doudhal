<?php

use App\Table\Course;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Course::delete($_POST['id']);
    header('Location: admin.php?p=courses.index');
}