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
                    $id=$_POST['subcat'];
                    $error=1;
                    $result = $db->query("delete FROM activity where subcategoryid='$id' ");
                    
                    if($result){

                        $r= $db->query("delete FROM subcategory where id='$id' ");
                        if($r){
                            $error=0;

                        }
                        else{
                            $error=1;
                        }                        
                    }else{
                        $error=1;
                    }
                echo $error;

?>