<?php
$task = $_POST['task'];

$data = $task . "|Pending\n";

file_put_contents("tasks.txt", $data, FILE_APPEND);

header("Location: index.php");
?>