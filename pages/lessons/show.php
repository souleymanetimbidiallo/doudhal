<?php
use App\App;
use App\Table\Course;

$course = Course::find($_GET['id']);
    if($course === false){
        echo 'error';
    }
?>
<div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                    <h5 class="alert-heading">Prérequis</h5>
                    <p>
                        Bases en CSS. Si vous ne les maîtrisez pas, suivez ce cours : 
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
            <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/lOox4UJVFb4"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h2>À la fin de ce cours, vous serez capable de :</h2>
                <ul>
                    <li>réaliser vos premières animations CSS ;</li>
                    <li>maîtriser les translations, les rotations et l’opacité ;</li>
                    <li>réaliser des animations dynamiques.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
                <h3>Notes</h3>
                <form>
                    <div class="form-group mt-3">
                        <label for="timeInput">Temps :</label>
                        <input type="text" class="form-control" id="timeInput" placeholder="mm:ss"
                            aria-describedby="timeHelp">
                    </div>
                    <div class="form-group mt-3">
                        <label for="note">Note :</label>
                        <textarea id="note" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Rendre cette notation publique
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>