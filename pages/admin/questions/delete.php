<?php

use App\Table\Question;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Question::delete($_POST['id']);
    header('Location: admin.php?p=questions.index');
}