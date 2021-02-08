<?php

use App\Table\Media;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $media = Media::find($_POST['id']);
    if(Media::deleteFile($media->location)){
        $result = Media::delete($_POST['id']);
    }
    header('Location: admin.php?p=medias.index');
}