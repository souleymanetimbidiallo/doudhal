<?php

use App\Table\Section;
use App\Table\Quiz;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Quiz::update($_GET['id'], [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'section_id' => $_POST['section']
    ]);
    if($result){
        ?>
        <div class="alert alert-success">
            <p>Le quiz a bien été modifié</p>
        </div>
        <?php
    }
}

$lesson = Quiz::find($_GET['id']);
$sections = Section::list('id', 'title');

$form = new BootstrapForm($lesson);
?>

<form method="POST">
    <?= $form->input('title', 'Titre du Quiz'); ?>
    <?= $form->input('description', 'Description', ['type'=>'textarea'] ); ?>
    <?= $form->select('section', 'Section', $sections); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>