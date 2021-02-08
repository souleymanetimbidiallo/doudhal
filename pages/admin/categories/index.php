<?php

use App\Table\Category;
require '../core/HTML/TableHTML.php';

$categories = Category::getAll();

$table = new TableHTML();
$headings = ['ID', 'Titre', 'Actions'];
$attributes = ['id', 'title'];
?>

<h1>Catégories</h1>

<p>
    <a href="?p=categories.add" class="btn btn-success">Ajouter</a>
</p>

<?= $table->createHtmlTable('categories', $headings, $attributes, $categories); ?>