<?php

use App\Table\Course;
use App\Table\Categorie;

$courses = Course::getAll();
$nb_courses = Course::getNumRows();

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Cours</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p>
                <a href="?p=courses.add" class="btn btn-success">Ajouter</a>
            </p>
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Mise en ligne</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    <?php foreach($courses as $course): ?>
                    <tr>
                        <td><?= $course->id ?></td>
                        <td><?= $course->title ?></td>
                        <td><?= $course->creation_date ?></td>
                        <td><?= $course->author?></td>
                        <td><?= $course->category?></td>
                        <td >
                            <a href="?p=courses.edit&id=<?= $course->id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="?p=courses.delete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $course->id ?>">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <a href="?p=courses.show&id=<?= $course->id ?>" class="btn btn-sm btn-purple"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>