<?php 

	include "connect.php";
	
	session_start();
	
	$sql = "SELECT * FROM contacts ORDER BY id DESC";
	$result = mysqli_query($connection, $sql);
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
		<title>Yellow Pages - Phonebook</title>	
	</head>
	<body>
	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Contacts</h4><br>
			<div class="link-right">
				<a href="add.php" class="btn btn-warning">Create</a>
			</div>	
			<h4 class="link-left"><?php echo "Welcome " . $_SESSION['username'] . "!"; ?></h4>
			<?php if (isset($_GET['success'])) { ?>
		    
			<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Surname</th>
				  <th scope="col">Phone</th>
				  <th scope="col">Description</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			      <th scope="row"><?=$i?></th>
			      <td><?=$rows['name']?></td>
			      <td><?php echo $rows['surname']; ?></td>
				  <td><?php echo $rows['phone']; ?></td>
				  <td><?php echo $rows['description']; ?></td>
			      <td><a href="edit.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-success">Update</a>

			      	  <a href="delete.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
				
			<div class="link-right">
				<a class="btn btn-dark" href = "logout.php">Logout</a>
			</div>		
	</div>
	</body>
</html>	
		