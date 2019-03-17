<?php
session_start();

$cat = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'intern');

if (isset($_POST['submit'])) {
  $cat = mysqli_real_escape_string($db, $_POST['cat']);
  
  if (empty($cat)) { array_push($errors, "Category is required"); }
  
  $user_check_query = "SELECT * FROM category WHERE category='$cat' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['category'] === $cat) {
      array_push($errors, "Category already exists");
    }
  }

  if (count($errors) == 0) {
    

    $query = "INSERT INTO category (category) VALUES('$cat')";
    mysqli_query($db, $query);
    $_SESSION['category'] = $cat;
    $_SESSION['success'] = "Category Added Successfully";
    header('location: home.php');
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
	<title>Category</title>
</head>
<body>
	<form action="category.php" method="post">
		<input type="text" name="cat">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>