<?php

use App\Table\Course;
use App\Table\Categorie;

$courses = Course::getAll();
$nb_courses = Course::getNumRows();

?>
<div class="container">  
  <div class="row my-3 course-cover">
    <div class="col p-5">
      <h1 class="text-center text-light">COURS</h1>
    </div>
  </div>
  <div class="row my-3">
    <div class="col">
      <p class="text-gray-900">Nos cours sont spécialisés sur le développement personnel, l’entrepreneuriat, les techniques d’expression, la communication, le marketing, la vie associative, la gestion de projet, l’informatique et l’internet.</p>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col">
      <input class="form-control" id="searchInput" type="text" placeholder="Rechercher un cours">
    </div>
  </div>
  <div class="row" id="lessonList">
    <?php foreach ($courses as $course) : ?>
      <div class="col-12 col-lg-4 mb-3">

        <div class="card course-card mb-4 mb-lg-0 border-bottom-primary shadow-sm">
          <img src="images/courses/<?= $course->picture ?>" alt="Animations CSS modernes" class="card-img-top border img-course">
          <div class="card-body">
            <h5 class="card-title">
              <?= $course->title ?> -
              <span class="text-danger"><?= ($course->price == 0) ? "Gratuit" : $course->price . " FG"; ?></span>
            </h5>
            <p class="card-text"><?= $course->extract; ?></p>
            <a href="?p=course&id=<?= $course->id; ?>" class="btn btn-purple stretched-link">Démarrer l'apprentissage</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>