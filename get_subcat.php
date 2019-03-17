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
    $id = $_POST['cat'];
    $result = $db->query("SELECT * FROM subcategory WHERE categoryid='$id' ");
    
    if($result->num_rows > 0){
        echo '<option disabled selected>Select sub-category</option>';
        while($row = $result->fetch_assoc()){
        
        
        echo '<option value="'.$row['id'].'">'.$row['subcategory'].'</option>';
        
        } 
    }else{
        echo 'No subcategories';
    }
?>