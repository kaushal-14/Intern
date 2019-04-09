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

    $id = $_POST['id'];
    $error=0;
    for($i=0;$i<sizeof($id);$i++){
    	$eid = $id[$i];
	    $result = $db->query("delete FROM activity where id='$eid' ");
	    
	    if(!$result){
	    	$error = 1;
	        break;                
	    }
	}
	echo $error;
?>