<?php



$subcat = "";
$imgContent = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'intern');

if (isset($_POST['submit'])) {
  
  $subcat = mysqli_real_escape_string($db, $_POST['subcat']);
  
  if (empty($subcat)) { array_push($errors, "Sub-Category is required"); }
  
  $user_check_query = "SELECT * FROM subcategory WHERE subcategory='$subcat' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['subcategory'] === $subcat) {
      array_push($errors, "Sub-Category already exists");
    }
  }

  $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
  
  if (count($errors) == 0) {
    
  	$cat_id=$_POST['cat'];
  	$subcat_id=$_POST['subcat'];
  	$des=$_POST['des'];
    $query = "INSERT INTO activity (categoryid,subcategoryid,image,des) VALUES('$cat_id','$subcat_id','$imgContent','$des')";
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