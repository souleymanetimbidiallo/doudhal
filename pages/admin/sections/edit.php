<?php

use App\Table\Section;
use App\Table\Course;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Section::update($_GET['id'], [
        'title' => $_POST['title'],
        'course_id' => $_POST['course']
    ]);
    if($result){
        ?>
        <div class="alert alert-success">
            <p>La section a bien été modifiée</p>
        </div>
        <?php
    }
}

$section = Section::find($_GET['id']);
$courses = Course::list('id', 'title');

$form = new BootstrapForm($section);
?>

<form method="POST">
    <?= $form->input('title', 'Titre de la section'); ?>
    <?= $form->select('course', 'Cours', $courses); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>