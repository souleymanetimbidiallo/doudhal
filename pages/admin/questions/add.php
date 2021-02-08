<?php

use App\Table\Question;
use App\Table\Quiz;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Question::create([
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'quiz_id' => $_POST['quiz']
    ]);
    if($result){
        header('Location: admin.php?p=questions.index');
        
    }
}

$quizzes = Quiz::list('id', 'title');

$form = new BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('title', 'Question'); ?>
    <?= $form->input('description', 'Description', ['type'=>'textarea'] ); ?>
    <?= $form->select('quiz', 'Quiz', $quizzes); ?>
    <div class="d-flex justify-content-around">
        <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
        <a href="admin.php?p=questions.index" class="btn btn-lg btn-purple">Retour</a>
    </div>
</form>