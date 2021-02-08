<?php

use App\Table\Media;

$medias = Media::getAll();
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Médias</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p><a href="?p=medias.add" class="btn btn-success">Ajouter</a></p>
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    
                    <?php foreach($medias as $media): ?>
                    <tr>
                        <td><?= $media->id ?></td>
                        <td><?= $media->location ?></td>
                        <td><?= $media->type ?></td>
                        <td >
                            <a href="?p=medias.edit&id=<?= $media->id ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="?p=medias.delete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $media->id ?>">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <a href="medias/<?= $media->location ?>" target="_blank" class="btn btn-purple"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>