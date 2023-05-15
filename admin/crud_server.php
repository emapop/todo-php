<?php
session_start();
require('server.php');
$task = "";
$importance = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
$task = $_POST['task'];
$importance = $_POST['importance'];

mysqli_query($db, "INSERT INTO info (task, importance) VALUES ('$task', '$importance')"); 
$_SESSION['message'] = "task salvat!"; 
header('location: logged.php');
}
if (isset($_POST['update'])) {
$id = $_POST['id'];
$task = $_POST['task'];
$importance = $_POST['importance'];

mysqli_query($db, "UPDATE info SET task='$task', importance='$importance' WHERE id=$id");
$_SESSION['message'] = "task updatat!"; 
header('location: logged.php');
}
if (isset($_GET['del'])) {
$id = $_GET['del'];
mysqli_query($db, "DELETE FROM info WHERE id LIKE $id");
$_SESSION['message'] = "task șters!"; 

header('location: logged.php');
}

?>