<?php

use App\Table\Section;
use App\Table\Lesson;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Lesson::create([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'section_id' => $_POST['section']
    ]);
    if($result){
        header('Location: admin.php?p=lessons.index');
        
    }
}

$sections = Section::list('id', 'title');

$form = new BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('title', 'Titre de la leçon'); ?>
    <?= $form->input('content', 'Contenu', ['type'=>'textarea'] ); ?>
    <?= $form->select('section', 'Section', $sections); ?>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>