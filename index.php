<?php  require_once('server.php'); ?>
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
	  </div>
    </nav>
	<div class="main-container">
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
	<form method="post" action="server.php" >
    <?php
        if(!isset($_GET['edit']))
        {
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
        }
        else if(isset($_GET['edit']))
           {
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
            <?php if ($update == true): ?>
                <div class="input-group">
	                <button class="btn" type="submit" name="update" style="background: #5F9DA0" >modifică</button>
                </div>
            <?php else: ?>
                <div class="input-group">
	                <button class="btn" type="submit" name="save" >Salvează</button>
                </div>
            <?php endif ?>
	</form>
    <table>
	<thead>
		<tr>
			<th>Task</th>
			<th>Gradul de importanță</th>
			<th colspan="2">Acțiuni</th>
		</tr>
	</thead>
	
	<?php 
	
	while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<?php if($row['importance'] === 'important'): ?>	
			<td class="importance-green">
			<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit-onclick" >
				<?php echo $row['task']; ?>
				</a>
			</td>
			<td class="importance importance-green"><?php echo $row['importance']; ?></td>
			<!-- <td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editare</a>
			</td> -->
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Ștergere</a>
			</td>
			<?php endif?>
			<?php if($row['importance'] === 'medium'): ?>
			<td class="importance-yellow">
			<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit-onclick" >
				<?php echo $row['task']; ?>
				</a>
			</td>
			<td class="importance importance-yellow"><?php echo $row['importance']; ?></td>
			<!-- <td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editare</a>
			</td> -->
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Ștergere</a>
			</td>
			<?php endif ?>
			<?php if($row['importance'] === 'neimportant'): ?>
			<td class="importance-red">
			<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit-onclick" >
				<?php echo $row['task']; ?>
				</a>
			</td>
			<td class="importance importance-red">
				<?php echo $row['importance']; ?>
			</td>
			<!-- <td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >
				Editare
			</a> -->
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">
				Ștergere
			</a>
			</td>
			<?php endif ?>
			
		</tr>
	<?php } ?>
</table>
	</div>
</body>
</html>