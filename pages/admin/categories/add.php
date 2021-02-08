<?php

use App\Table\Category;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Category::create([
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ]);
    if($result){
        header('Location: admin.php?p=categories.index');
        
    }
}

$form = new BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('title', 'Titre de la catégorie'); ?>
    <?= $form->input('description', 'Description', ['type'=>'textarea']); ?>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>