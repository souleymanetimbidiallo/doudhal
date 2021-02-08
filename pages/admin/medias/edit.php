<?php

use App\Table\Media;

require '../core/HTML/BootstrapForm.php';

if(isset($_FILES['location'])){
    $message = Media::uploadFile($_FILES['location']);
    if($message->getType()=='success'){
        if(!empty($_POST)){
            $result = Media::update($_GET['id'], [
                'name' => $_POST['name'],
                'type' => $_POST['type'],
                'location' => $_FILES['location']['name']
            ]);
            if($result){
                header('Location: admin.php?p=medias.index');
            }
        }
    }else{
        echo $message->display();
    }
}


$media = Media::find($_GET['id']);
$types = array(
    'image' => 'Image',
    'video' => 'Vidéo',
    'audio' => 'Audio',
    'pdf' => 'PDF'
);

$form = new BootstrapForm($media);
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