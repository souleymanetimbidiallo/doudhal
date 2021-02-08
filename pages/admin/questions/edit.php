<?php

use App\Table\Question;
use App\Table\Quiz;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Question::update($_GET['id'], [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'quiz_id' => $_POST['quiz']
    ]);
    if($result){
        ?>
        <div class="alert alert-success">
            <p>La question a bien été modifiée</p>
        </div>
        <?php
    }
}

$question = Question::find($_GET['id']);
$quizzes = Quiz::list('id', 'title');

$form = new BootstrapForm($question);
?>

<form method="POST">
    <?= $form->input('title', 'Question'); ?>
    <?= $form->input('description', 'Description', ['type'=>'textarea'] ); ?>
    <?= $form->select('quiz', 'Quiz', $quizzes); ?>
    <div class="d-flex justify-content-around">
        <button type="submit" class="btn btn-lg btn-primary">Sauvegarder</button>
        <a href="admin.php?p=questions.index" class="btn btn-lg btn-purple">Retour</a>
    </div>
</form>