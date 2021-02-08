<?php

use App\Table\Quiz;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Quiz::delete($_POST['id']);
    header('Location: admin.php?p=quizzes.index');
}