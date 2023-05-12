<?php 
	session_start();
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'crud');
	$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(!$db){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

	$task = "";
	$importance = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$task = $_POST['task'];
		$importance = $_POST['importance'];

		mysqli_query($db, "INSERT INTO info (task, importance) VALUES ('$task', '$importance')"); 
		$_SESSION['message'] = "task salvat!"; 
		header('location: index.php');
	}
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $task = $_POST['task'];
        $importance = $_POST['importance'];
    
        mysqli_query($db, "UPDATE info SET task='$task', importance='$importance' WHERE id=$id");
        $_SESSION['message'] = "task updatat!"; 
        header('location: index.php');
    }
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id LIKE $id");
        $_SESSION['message'] = "task șters!"; 
        
        header('location: index.php');
    }
    

    ?>