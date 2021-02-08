<?php

use Core\File\File;

require "File.php";

$file1 = new File("file1.txt");
$file1->open('r+');
echo $file1->readAll().'<br>';
$file1->close();

$file2 = new File("file2.txt");
$file2->open('a+');
$file2->write('Hello wolrd');
$file2->close();

$file3 = new File("file3.txt");
echo $file3->delete();
?>