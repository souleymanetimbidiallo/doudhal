<?php

use App\Table\Section;
use App\Table\Lesson;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Lesson::update($_GET['id'], [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'section_id' => $_POST['section']
    ]);
    if($result){
        ?>
        <div class="alert alert-success">
            <p>La leçon a bien été modifiée</p>
        </div>
        <?php
    }
}

$lesson = Lesson::find($_GET['id']);
$sections = Section::list('id', 'title');

$form = new BootstrapForm($lesson);
?>

<form method="POST">
    <?= $form->input('title', 'Titre de la leçon'); ?>
    <?= $form->input('content', 'Contenu', ['type'=>'textarea'] ); ?>
    <?= $form->select('section', 'Section', $sections); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>