<?php

use App\Table\Course;
use App\Table\Category;
use App\Table\User;

require '../core/HTML/BootstrapForm.php';


if(isset($_FILES['picture'])){
    $message = Course::uploadPicture($_FILES['picture']);
    if($message->getType()=='success'){
        if(!empty($_POST)){
            $result = Course::update($_GET['id'], [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'creation_date' => $_POST['creation_date'],
                'duration' => $_POST['duration'],
                'category_id' => $_POST['category'],
                'user_id' => $_POST['author'],
                'picture' => $_FILES['picture']['name']
            ]);
            if($result){
                $message->setAlert('success', "Votre cours a été modifié avec succès");
                echo $message->display();
            }
        }
    }else{
        echo $message->display();
    }
}
$course = Course::find($_GET['id']);
$categories = Category::list('id', 'title');
$users = User::list('id', 'fullname');

$form = new BootstrapForm($course);
?>

<form method="POST" enctype="multipart/form-data" class="mb-2">
    <?= $form->input('title', 'Titre du cours'); ?>
    <?= $form->input('description', 'Description', ['type'=>'textarea']); ?>
    <?= $form->input('price', 'Prix Unitaire', ['type'=>'number']); ?>
    <?= $form->input('creation_date', 'Date de création', ['type'=>'date']); ?>
    <?= $form->input('duration', 'Durée', ['type'=>'time']); ?>
    <?= $form->select('category', 'Catégorie', $categories); ?>
    <?= $form->select('author', 'Auteur', $users); ?>
    <div class="custom-file mb-2">
        <input type="file" name="picture"  class="custom-file-input" id="picture">
        <label class="custom-file-label" for="picture">Choisir un fichier</label>
    </div>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
    <a href="admin.php?p=courses.index" class="btn btn-secondary">Retour</a>
</form>