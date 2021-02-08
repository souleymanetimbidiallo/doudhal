<?php

use App\Table\Question;

$questions = Question::getAll();
?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Questions</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p><a href="?p=questions.add" class="btn btn-success">Ajouter</a></p>
            <table class="table table-bordered  table-striped" id="dataTable">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description courte</th>
                    <th>Quiz</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    
                    <?php foreach($questions as $question): ?>
                    <tr>
                        <td><?= $question->id ?></td>
                        <td><?= $question->title ?></td>
                        <td><?= $question->extract ?></td>
                        <td><?= $question->quiz ?></td>
                        <td >
                            <a href="?p=questions.edit&id=<?= $question->id ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="?p=questions.delete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $question->id ?>">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <a href="?p=questions.show&id=<?= $question->id ?>" class="btn btn-sm btn-purple"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>