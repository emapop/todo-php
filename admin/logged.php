<?php require_once('server.php'); ?>
<?php require_once('crud_server.php'); ?>
<?php
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

	if ($record->num_rows == 1) {
		$n = mysqli_fetch_array($record);
		$task = $n['task'];
		$importance = $n['importance'];
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>TODO list</title>
	<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
	<nav class="navbar-main">
		<div class="navbar-container">
			<a class="navbar-text">Listă de sarcini</a>
			<a href="login.php" class="navbar-text">Delogare</a>
		</div>
	</nav>
	<div class="main-container">
		<?php if (isset($_SESSION['message'])) : ?>
			<div class="msg">
				<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
				?>
			</div>
		<?php endif ?>
		<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
		<form class="form-logged" method="post" action="crud_server.php">
			<?php
			if (!isset($_GET['edit'])) {
				echo '<div class="input-group">
			<label><b>Nume Task</b></label>
			<input type="text" name="task" value="" placeholder="sarcină" required>
		</div>
		<div class="input-group">
			<label><b>Selectează importanța</b></label>
			<select name="importance">
			<option value="important">important</option>
			<option value="medium">medium</option>
			<option value="neimportant">neimportant</option>
			</select required>
			<input type="hidden" name="importance1" value="" placeholder="important, medium, neimportant">
		    </div>';
			} else if (isset($_GET['edit'])) {
				echo "<div class='input-group'>
               <label><b>Edit</b></label>
               <input type='hidden' name='id' value='$id'>
               <input type='text' name='task' value='$task' placeholder='sarcină' required>
               </div>
               <div class='input-group'>
               <label><b>Importanță</b></label>
			   <select name='importance'>
					<option value='important'>important</option>
					<option value='medium'>medium</option>
					<option value='neimportant'>neimportant</option>
				</select required>
               <input type='hidden' name='importance1' value='$importance'  placeholder='important, medium, neimportant'>
               </div>
               ";
			}
			?>
			<?php if ($update == true) : ?>
				<div class="input-group">
					<button class="btn" type="submit" name="update" style="background: #5F9DA0">modifică</button>
				</div>
			<?php else : ?>
				<div class="input-group">
					<button class="btn" type="submit" name="save">Salvează</button>
				</div>
			<?php endif ?>
		</form>
		<?php
		include('form.php') ;
		?>
		
</body>

</html>