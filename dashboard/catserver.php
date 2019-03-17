<?php


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
    
  }
  else
  {
  	echo 'Not Added';
  }
}

?>