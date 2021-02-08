<?php

use App\Table\Section;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Section::delete($_POST['id']);
    header('Location: admin.php?p=sections.index');
}