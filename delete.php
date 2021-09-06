<?php  

if(isset($_GET['id'])){
   include "connect.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "DELETE FROM contacts
	        WHERE id=$id";
   $result = mysqli_query($connection, $sql);
   if ($result) {
   	  header("Location: site.php?success=successfully deleted");
   }else {
      header("Location: site.php?error=unknown error occurred&$user_data");
   }
   
}else {
	header("Location: site.php");
}

?>