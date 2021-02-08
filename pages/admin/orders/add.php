<?php

use App\App;

use App\Table\Course;
use App\Table\Order;
use App\Table\User;

require '../core/HTML/BootstrapForm.php';



if(!empty($_POST)){
    $result = Order::create([
        'date' => $_POST['date'],
        'amount' => $_POST['amount'],
        'status' => $_POST['status'],
        'course_id' => $_POST['course'],
        'user_id' => $_POST['student']
    ]);
    if($result){
        header('Location: admin.php?p=orders.edit&id='.App::getDatabase()->lastInsertId());
        
    }
}

$students = User::list('id', 'fullName');
$courses = Course::list('id', 'title');
$states = array(
    'Terminé' => 'Commande terminé',
    'en cours' => 'Commande en cours'
);

$form = new BootstrapForm($_POST);
?>

<form method="POST" enctype="multipart/form-data">
    <?= $form->input('date', 'Date de commande', ['type'=>'date']); ?>
    <?= $form->input('amount', 'Montant payé', ['type'=>'number']); ?>
    <?= $form->select('status', 'Etat', $states); ?>
    <?= $form->select('course', 'Cours', $courses); ?>
    <?= $form->select('student', 'Etudiant', $students); ?>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>