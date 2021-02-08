<?php

use App\Table\Quiz;

$quizzes = Quiz::getAll();
?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Quizzes</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p><a href="?p=quizzes.add" class="btn btn-success">Ajouter</a></p>
            <table class="table table-bordered table-striped"  id="dataTable">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Section</th>
                    <th>Cours</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    
                    <?php foreach($quizzes as $quiz): ?>
                    <tr>
                        <td><?= $quiz->id ?></td>
                        <td><?= $quiz->title ?></td>
                        <td><?= $quiz->section ?></td>
                        <td><?= $quiz->course ?></td>
                        <td >
                            <a href="?p=quizzes.edit&id=<?= $quiz->id ?>" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                            <form action="?p=quizzes.delete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $quiz->id ?>">
                                <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <a href="?p=quizzes.show&id=<?= $quiz->id ?>" class="btn btn-circle btn-purple"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>