<?php
use App\App;
use App\Table\Course;
use App\Table\Lesson;
use App\Table\Section;

$course = Course::find($_GET['id']);
if($course === false){
    header("Location: index?p=404");
}
$sections = Section::byCourse($_GET['id']);

?>
<div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                    <h5 class="alert-heading">Prérequis</h5>
                    <p>Bases en CSS. Si vous ne les maîtrisez pas, suivez ce cours : 
                        <a href="#"  class="alert-link">Apprenez à créer votre site web avec HTML5 et CSS3</a> !
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 class="my-3"><?= $course->title; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8">
                <img src="images/courses/<?= $course->picture ?>" alt="Animations CSS modernes" class="card-img-top border">
            </div>
            <div class="col-12 col-md-4">
                <ul class=" card list-group list-group-flush border-top-primary">
                    <li class="list-group-item justify-content-between d-flex">
                        <p class="font-weight-bold">Formateur</p>
                        <a class="" href="?p=author&id=<?= $course->user_id; ?>"><?= $course->author; ?></a>
                    </li>
                    <li class="list-group-item justify-content-between d-flex">
                        <p class="font-weight-bold">Prix</p>
                        <span class="text-gray-700"><?= ($course->price == 0) ? "Gratuit" : $course->price . " FG"; ?></span>
                    </li>
                    <li class="list-group-item justify-content-between d-flex">
                        <p class="font-weight-bold">Catégorie</p>
                        <a class="" href="?p=category&id=<?= $course->category_id; ?>"><?= $course->category; ?></a>
                    </li>
                    <li class="list-group-item justify-content-between d-flex">
                        <p class="font-weight-bold">Durée</p>
                        <span class="text-gray-700"><?= ($course->duration == NULL) ? "Non défini" : $course->duration; ?></span>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block mt-2">Commencez le cours</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <h3 class="text-gray-700">Objectifs</h3>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            <h3 class="text-gray-700">Eligibilité</h3>
            <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>
            </div>
        </div>
        <div class="row">
            <ol type="A" id="lessons">
                <?php foreach($sections as $section): ?>
                <li> <?= $section->title ?>
                    <ol type="1" class="">
                    <?php $lessons = Lesson::bySection($section->id) ?>
                    <?php foreach($lessons as $lesson): ?>
                        <li class="p-1">
                            <a href="?p=lesson&id=<?= $lesson->id ?>" class=""><?= $lesson->title ?></a>
                        </li>
                    
                    <?php endforeach; ?>
                    </ol>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>