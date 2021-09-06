<?php 

if (isset($_POST['create'])) {
	include "connect.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$surname = validate($_POST['surname']);
	$phone = validate($_POST['phone']);
	$description =validate($_POST['description']);

	$user_data = 'name='.$name. '&surname='.$surname. '&phone='.$phone. '&description='.$description;

	if (empty($name)) {
		header("Location: add.php?error=Name is required&$user_data");
	}else if (empty($surname)) {
		header("Location: add.php?error=Surname is required&$user_data");
	}else {

       $sql = "INSERT INTO contacts(name, surname, phone, description) 
               VALUES('$name', '$surname', '$phone', '$description')";
       $result = mysqli_query($connection, $sql);
       if ($result) {
       	  header("Location: site.php?success=successfully created");
       }else {
          header("Location: add.php?error=unknown error occurred&$user_data");
       }
	}

}

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
		<form action="" 
		      method="post">
            
		   <h4 class="display-4 text-center">Add Contact</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		    
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" 
		           placeholder="Enter name">
		   </div>

		   <div class="form-group">
		     
		     <input type="surname" 
		           class="form-control" 
		           id="surname" 
		           name="surname" 
		           value="<?php if(isset($_GET['surname']))
		                           echo($_GET['surname']); ?>"
		           placeholder="Enter Surname">
		   </div>
		   
		   <div class="form-group">
		    
		     <input type="phone" 
		           class="form-control" 
		           id="phone" 
		           name="phone" 
		           value="<?php if(isset($_GET['phone']))
		                           echo($_GET['phone']); ?>" 
		           placeholder="Enter Phone Number">
		   </div>
		   
		   <div class="form-group">
		    
		     <input type="description" 
		           class="form-control" 
		           id="description" 
		           name="description" 
		           value="<?php if(isset($_GET['description']))
		                           echo($_GET['description']); ?>" 
		           placeholder="Enter Description">
		   </div>			
		   <button type="submit" 
		          class="btn btn-warning"
		          name="create">Create</button>
		    &nbsp&nbsp<a href="site.php" class="btn btn-dark">Back</a>
	    </form>
	</div>

	</body>
</html>