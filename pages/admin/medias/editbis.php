<?php

use App\Table\Media;

require '../core/HTML/BootstrapForm.php';

if(isset($_FILES['file'])){

    $file = Media::getFile($_GET['id'], $_FILES['file']);
}

if(!empty($_POST)){
    $result = Media::update($_GET['id'], [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'location' => $file,
    ]);
    if($result){
        ?>
        
        <div class="alert alert-success">
            <p>Le media a bien été modifié</p>
        </div>
        <?php
    }
}
$category = Media::find($_GET['id']);
$types = array(
    'image' => 'Image',
    'video' => 'Vidéo',
    'audio' => 'Audio',
    'pdf' => 'PDF'
);

$form = new BootstrapForm($category);
?>

<form method="POST"  enctype="multipart/form-data">
    <?= $form->input('name', 'Nom'); ?>
    <?= $form->select('type', 'Type', $types); ?>
    <div class="custom-file mb-2">
        <input type="file" name="location"  class="custom-file-input" id="location">
        <label class="custom-file-label" for="location">Choisir un fichier</label>
    </div>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>