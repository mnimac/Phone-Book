<?php 

if (isset($_GET['id'])) {
	include "connect.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM contacts WHERE id=$id";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: site.php");
    }


}else if(isset($_POST['update'])){
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
	$description = validate($_POST['description']);
	$id = validate($_POST['id']);

	if (empty($name)) {
		header("Location: ../php-projekt/edit.php?id=$id&error=Name is required");
	}else if (empty($surname)) {
		header("Location: ../php-projekt/edit.php?id=$id&error=Surname is required");
	}else {

       $sql = "UPDATE contacts
               SET name='$name', surname='$surname', phone='$phone', description='$description'
               WHERE id=$id ";
       $result = mysqli_query($connection, $sql);
       if ($result) {
       	  header("Location: ../php-projekt/site.php?success=successfully updated");
       }else {
          header("Location: ../php-projekt/edit.php?id=$id&error=unknown error occurred&$user_data");
       }
	}
}else {
	header("Location: site.php");
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<link rel="stylesheet" type="text/css" href="style.css">	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
		<title>Edit</title>
		
		
	</head>
	<body>
	<div class="container">
		<form action="edit.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Edit</h4><hr><br>
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
		           value="<?=$row['name'] ?>" >
		   </div>

		   <div class="form-group">
		     
		     <input type="surname" 
		           class="form-control" 
		           id="surname" 
		           name="surname" 
		           value="<?=$row['surname'] ?>" >
		   </div>
		   
		   <div class="form-group">
		     
		     <input type="phone" 
		           class="form-control" 
		           id="phone" 
		           name="phone" 
		           value="<?=$row['phone'] ?>" >
		   </div>
		   
		   <div class="form-group">
		     
		     <input type="description" 
		           class="form-control" 
		           id="description" 
		           name="description" 
		           value="<?=$row['description'] ?>" >
		   </div>
		   
		   <input type="text" 
		          name="id"
		          value="<?=$row['id']?>"
		          hidden >

		   <button 
		           class="btn btn-warning"
		           name="update">Update</button>
		    &nbsp&nbsp<a href="site.php" class="btn btn-dark">Back</a>
	    </form>
	</div>

	</body>
</html>