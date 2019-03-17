<?php

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
                        
                        //Render image
                        echo '<tr><td>'. $row["category"]. ' &ensp; &ensp; </td><td><button val="'.$row['id'].'" class="cat_del">Delete</button></td></tr>';
                        
                        } 
                    }else{
                        echo 'Image not found...';
                    }
                

?>