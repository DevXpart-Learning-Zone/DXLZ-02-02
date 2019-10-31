
<?php 
include 'connection.php';
//get data from url
//delete data
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
	$id = $_GET['id'];
	
	$sql = "select * from users where id='$id'";
	$statement = $con->query($sql) or die(mysqli_error($con));
	if ($statement) {
		$row = $statement->fetch_assoc();
		//echo "<pre>";
		//print_r($row); exit;

	}else{
		echo 'Data deleted failed';
	}
}



if (isset($_POST['update'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$id = $_POST['id'];

	$sql = "update users set name='$name',email='$email',address='$address' where id='$id'";
	$statement = $con->query($sql) or die(mysqli_error($con));
	if ($statement) {
		header('location: index.php');
	}else{
		echo 'wrong';
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>

		.wrapper{
			width: 50%;
			margin: 0 auto;
		}
		.input{
			height: 30px;
			width: 230px;
		}
	</style>
</head>
<body>
	<h1>Edit Data</h1>
	<div class="wrapper">
		<form action="" method="post">
			<label for="">Enter your name</label> <br>
			<input type="text" name="name" value="<?php echo $row['name']; ?>" class="input"><br>

			<label for="">Enter your email</label> <br>
			<input type="text" name="email" value="<?php echo $row['email']; ?>"  class="input"><br>

			<label for="">Enter address</label> <br>
			<textarea name="address" id="" cols="30" rows="4"><?php echo $row['address']; ?></textarea>
			<br><br>
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<input type="submit" name="update" value="Update">
		</form>
		<a href="index.php">back</a>
	</div>
</body>
</html>