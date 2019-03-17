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
                    $id=$_POST['id'];
                    
                    $result = $db->query("delete FROM images where id='$id' ");
                    
                    if($result){
                            echo 1;
                                               
                    }else{
                        echo 0;
                    }
                

?>