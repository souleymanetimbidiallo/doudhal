<?php

use App\Table\Lesson;

$lessons = Lesson::getAll();
?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Leçons</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p><a href="?p=lessons.add" class="btn btn-success">Ajouter</a></p>
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description courte</th>
                    <th>Section</th>
                    <th>Cours</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    
                    <?php foreach($lessons as $lesson): ?>
                    <tr>
                        <td><?= $lesson->id ?></td>
                        <td><?= $lesson->title ?></td>
                        <td><?= $lesson->extract ?></td>
                        <td><?= $lesson->section ?></td>
                        <td><?= $lesson->course ?></td>
                        <td >
                            <a href="?p=lessons.edit&id=<?= $lesson->id ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="?p=lessons.delete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $lesson->id ?>">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <a href="?p=lessons.show&id=<?= $lesson->id ?>" class="btn btn-sm btn-purple"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>