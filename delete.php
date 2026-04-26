<?php
$tasks = file("tasks.txt", FILE_IGNORE_NEW_LINES);

$id = $_GET['id'];

unset($tasks[$id]);

file_put_contents("tasks.txt", implode("\n", $tasks));

header("Location: index.php");
?>