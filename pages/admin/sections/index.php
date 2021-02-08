<?php

use App\Table\Section;

$sections = Section::getAll();
?>

<h1>Sections</h1>

<p>
    <a href="?p=sections.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table table-bordered table-hover table-striped w-75">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Titre</th>
        <th>Cours</th>
        <th>Actions</th>
    </thead>
    <tbody>
        
        <?php foreach($sections as $section): ?>
        <tr>
            <td><?= $section->id ?></td>
            <td><?= $section->title ?></td>
            <td><?= $section->course ?></td>
            <td >
                <a href="?p=sections.edit&id=<?= $section->id ?>" class="btn btn-primary">Editer</a>
                <form action="?p=sections.delete" method="POST" class="d-inline">
                    <input type="hidden" name="id" value="<?= $section->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>