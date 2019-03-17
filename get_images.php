<?php

    $db = mysqli_connect('localhost', 'root', '', 'intern');

    $id=$_POST['subcat'];
    echo $id;
    
    
                $result = $db->query("SELECT * FROM activity where subcategoryid='$id' ");
                
                if($result->num_rows > 0){
                    while($imgData = $result->fetch_assoc()){
                    
                    //Render image
                        if($imgData['image']){
                    echo '<div class="col-md-4 col-sm-6 gallery_item">
                             
                            <div class="card" style="width: 18rem;">
                              <img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($imgData['image']).'" alt="Card image cap">
                              <div class="card-body">
                                
                                <p class="card-text">'.$imgData['des'].'</p>
                                
                              </div>
                            </div>

                          </div>';
                    }
                    } 
                }else{
                    echo 'Image not found...';
                }                   


?>