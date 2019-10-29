
<?php 
include 'connection.php';
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$sql = "insert into users(name,email,address) values('$name','$email','$address')";
	$statement = $con->query($sql) or die(mysqli_error($con));
	if ($statement) {
		header('location: index.php');
		//echo 'data inserted successfully';
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
	<div class="wrapper">
		<form action="" method="post">
			<label for="">Enter your name</label> <br>
			<input type="text" name="name" class="input"><br>

			<label for="">Enter your email</label> <br>
			<input type="text" name="email" class="input"><br>

			<label for="">Enter address</label> <br>
			<textarea name="address" id="" cols="30" rows="4">

			</textarea>
			<br><br>
			<input type="submit" value="Submit">
		</form>
		<a href="index.php">back</a>
	</div>
</body>
</html>