<?php //This is to Upload Images into Database 

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'intern';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
       

        //Insert image content into database
        $insert = $db->query("INSERT into images (image,created) VALUES ('$imgContent', '$dataTime')");
        if($insert){
            echo "Image uploaded successfully.";
            header('location: gallery.php');
        }else{
             echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}


?>





