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
                    $error=1;
                    $result = $db->query("delete FROM activity where categoryid='$id' ");
                    
                    if($result){

                        $r= $db->query("delete FROM subcategory where categoryid='$id' ");
                        if($r){
                            $res= $db->query("delete FROM category where id='$id' ");
                            if(!$res){
                                    $error=0;
                            }

                        }
                        else{
                            $error=0;
                        }                        
                    }else{
                        $error=0;
                    }
                echo $error;

?>