<?php

use App\Table\Section;
use App\Table\Course;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Section::create([
        'title' => $_POST['title'],
        'course_id' => $_POST['course']
    ]);
    if($result){
        header('Location: admin.php?p=sections.index');
        
    }
}

$courses = Course::list('id', 'title');

$form = new BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('title', 'Titre de la section'); ?>
    <?= $form->select('course', 'Cours', $courses); ?>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>