<?php

use App\Table\Section;
use App\Table\Quiz;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Quiz::create([
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'section_id' => $_POST['section']
    ]);
    if($result){
        header('Location: admin.php?p=quizzes.index');
        
    }
}

$sections = Section::list('id', 'title');

$form = new BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('title', 'Titre du Quiz'); ?>
    <?= $form->input('description', 'Description', ['type'=>'textarea'] ); ?>
    <?= $form->select('section', 'Section', $sections); ?>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>