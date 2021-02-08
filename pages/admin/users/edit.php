<?php

use App\Table\User;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = User::update($_GET['id'], [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'login' => $_POST['login'],
        'password' => sha1($_POST['password'])
    ]);
    if($result){
        ?>
        
        <div class="alert alert-success">
            <p>L'utilisateur a bien été modifié</p>
        </div>
        <?php
    }
}
$user = User::find($_GET['id']);

$form = new BootstrapForm($user);
?>

<form method="POST">
    <?= $form->input('first_name', 'Prénom'); ?>
    <?= $form->input('last_name', 'Nom'); ?>
    <?= $form->input('login', 'Nom d\'utilisateur'); ?>
    <?= $form->input('password', 'Mot de passe', ['type'=>'password']); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>