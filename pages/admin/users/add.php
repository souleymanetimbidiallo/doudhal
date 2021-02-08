<?php

use App\Table\User;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = User::create([
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'login' => $_POST['login'],
        'password' => md5($_POST['password'])
    ]);
    if($result){
        header('Location: admin.php?p=users.index');
        
    }
}

$form = new BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('first_name', 'Prénom'); ?>
    <?= $form->input('last_name', 'Nom'); ?>
    <?= $form->input('login', 'Nom d\'utilisateur'); ?>
    <?= $form->input('password', 'Mot de passe', ['type'=>'password']); ?>
    <button type="submit" class="btn btn-purple">Enregistrer</button>
</form>