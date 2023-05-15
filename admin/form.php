<?php require_once('server.php'); ?>
<?php require_once('crud_server.php'); ?>
<!DOCTYPE html>
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
					<?php if ($row['importance'] === 'important') : ?>
						<td class="importance-green">
							<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit-onclick">
								<?php echo $row['task']; ?>
							</a>
						</td>
						<td class="importance importance-green">
							<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit-onclick">
								<?php echo $row['importance']; ?>
							</a>
						</td>
						<!-- <td>
				<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editare</a>
			</td> -->
						<td>
							<a href="crud_server.php?del=<?php echo $row['id']; ?>" class="del_btn">Ștergere</a>
						</td>
					<?php endif ?>
					<?php if ($row['importance'] === 'medium') : ?>
						<td class="importance-yellow">
							<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit-onclick">
								<?php echo $row['task']; ?>
							</a>
						</td>
						<td class="importance importance-yellow">
							<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit-onclick">
								<?php echo $row['importance']; ?>
							</a>
						</td>
						<!-- <td>
				<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editare</a>
			</td> -->
						<td>
							<a href="crud_server.php?del=<?php echo $row['id']; ?>" class="del_btn">Ștergere</a>
						</td>
					<?php endif ?>
					<?php if ($row['importance'] === 'neimportant') : ?>
						<td class="importance-red">
							<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit-onclick">
								<?php echo $row['task']; ?>
							</a>
						</td>
						<td class="importance importance-red">
							<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit-onclick">
								<?php echo $row['importance']; ?>
							</a>
						</td>
						<!-- <td>
				<a href="logged.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >
				Editare
			</a> -->
						</td>
						<td>
							<a href="crud_server.php?del=<?php echo $row['id']; ?>" class="del_btn">
								Ștergere
							</a>
						</td>
					<?php endif ?>

				</tr>
			<?php } ?>
		</table>
	</div>
</html>
