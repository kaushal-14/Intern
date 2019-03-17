
<?php

session_start();

$subcat = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'intern');

if (isset($_POST['submit'])) {
  
  $subcat = mysqli_real_escape_string($db, $_POST['subcat']);
  
  if (empty($subcat)) { array_push($errors, "Sub-Category is required"); }
  
  $user_check_query = "SELECT * FROM subcategory WHERE subcategory='$subcat' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_f
  tch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['subcategory'] === $subcat) {
      array_push($errors, "Sub-Category already exists");
    }
  }

  if (count($errors) == 0) {
    
  	$cat_id=$_POST['cat'];
  	$subcat=$_POST['subcat'];
    $query = "INSERT INTO subcategory (categoryid,subcategory) VALUES('$cat_id','$subcat')";
    if(mysqli_query($db, $query))
    	echo 'inserted';
    else echo 'not inserted';
    // $_SESSION['subcategory'] = $subcat;
    // $_SESSION['success'] = "Category Added Successfully";
    // header('location: home.php');
  }
  else
  {
  	echo 'Not Added';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sub Category</title>
</head>
<body>
	<form method="post">
	<select name="cat">
  				<?php
                    //DB details
                    $dbHost     = 'localhost';
                    $dbUsername = 'root';
                    $dbPassword = '';
                    $dbName     = 'intern';
                    
                    //Create connection and select DB
                    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
                    
                    //Check connection
                    if($db->connect_error){
                       die("Connection failed: " . $db->connect_error);
                    }
                    
                    //Get image data from database
                    $result = $db->query("SELECT * FROM category");
                    
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        
                        
                        echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                        
                        } 
                    }else{
                        echo 'Category not found...';
                    }
                ?>
	</select>

		<input type="text" name="subcat">
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>