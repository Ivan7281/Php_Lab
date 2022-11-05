<?php
$connect =mysqli_connect('localhost', 'root', '', 'list1');
$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM students WHERE `students`.`id` = '$id'");
header('Location: /');