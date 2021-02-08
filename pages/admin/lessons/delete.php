<?php

use App\Table\Lesson;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Lesson::delete($_POST['id']);
    header('Location: admin.php?p=lessons.index');
}