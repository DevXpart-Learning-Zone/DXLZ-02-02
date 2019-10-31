<h1>Homepage</h1>
<a href="insert.php">Insert Data</a>
<style>
	table{
		border: 1px solid #000;
		border-collapse: collapse;
	}
	td,tr{
		border:1px solid #000;
		padding: 4px;
	}

</style>
<?php 
include 'connection.php';


//delete data
if (isset($_GET['action'])) {
	$id = $_GET['id'];
	

	$sql = "delete from users where id='$id'";
	$statement = $con->query($sql) or die(mysqli_error($con));
	if ($statement) {
		echo 'Data deleted successfully';
	}else{
		echo 'Data deleted failed';
	}
}


$sql = "select * from users";
$statement = $con->query($sql) or die(mysqli_error($con));
if ($statement) {
	echo '<table>';
	while ($row = $statement->fetch_assoc()) { ?>

		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a href="?action=delete&id=<?php echo $row['id']; ?>" onclick="return(confirm('are you sure to delete?'))">Delete</a> ||
		<a href="edit.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a>


			</td>
		</tr>
	<?php }

	echo '</table>';

}else{
	echo 'wrong';
}


?>