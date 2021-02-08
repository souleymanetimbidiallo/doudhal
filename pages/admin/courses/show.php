<?php
    use App\App;
    use App\Table\Course;

    $course = Course::find($_GET['id']);
    if($course === false){
        App::notFound();
    }
    App::setTitle($course->title); 

?>

<h2><?= $course->title; ?></h2>
<p><em><?= $course->category ?></em></p>
<p><?= $course->author; ?></p>
<a href="admin.php?p=courses.index" class="btn btn-primary">Retour</a>
