<?php

use App\Table\Category;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Category::update($_GET['id'], [
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ]);
    if($result){
        ?>
        
        <div class="alert alert-success">
            <p>La catégorie a bien été modifiée</p>
        </div>
        <?php
    }
}
$category = Category::find($_GET['id']);

$form = new BootstrapForm($category);
?>

<form method="POST">
    <?= $form->input('title', 'Titre de la catégorie'); ?>
    <?= $form->input('description', 'Description', ['type'=>'textarea']); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>