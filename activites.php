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

    

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>NGO</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

        <style type="text/css">
            
            .d {
                padding-top: 40px;
            }
            
            .nice-select:nth-of-type(1){
                margin-left: 190px;
            }
            .nice-select{
                display: none;
            }
            select{
                display: block !important;
                float: left;
                margin-left: 186px;
                padding: 20px;
            }
            

            #s4{
            padding: 10px;
            border: none;
            outline: none;
            color: #fff;
            font-size: 17.5px;
            background:  #0098cb;
            width: 191px;
            
            margin-left: 170px;
            border: 0px;
            border-radius: 3px;
            cursor: pointer;
            position: relative;
            
        }

        </style>

    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <?php include('header.php'); ?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Activites</h2>
                        <div class="page_link">
                            <a href="index.php">Home</a>
                            <a href="activites.php">Activites</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Gallery Area =================-->
        <div class="d">
            
    <form>
  <div class="form-row align-items-center">
    <div class="col-auto">
      <select class="form-control" id="cat">
                
        <option disabled selected>Select category</option>
                            <?php
                                
                                
                                //Get image data from database
                                $result = $db->query("SELECT * FROM category");
                                
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                    
                                    
                                    echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                                    
                                    } 
                                }else{
                                    echo 'Category not found...';
                                }
                            ?>
                </select>
    </div>
    <div class="col-auto">
      <select class="form-control" name="subcat" id="subcat">
        <option disabled selected>Select sub-category</option>
      </select>
    </div>
    &ensp; &ensp; 
    <div class="col-auto">
      <button type="button" id="s4" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </div>
</form>
                
    
                
               
        </div>
        <section class="gallery_area p_120">
            <div class="container">
                <div class="row gallery_inner imageGallery1">
                    
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
                    $result = $db->query("SELECT * FROM activity");
                    
                    if($result->num_rows > 0){
                        while($imgData = $result->fetch_assoc()){
                        
                        //Render image
                        echo '<div class="col-md-4 col-sm-6 gallery_item">
                                 
                                <div class="card" style="width: 18rem;">
                                  <img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($imgData['image']).'" alt="Card image cap">
                                  <div class="card-body">
                                    
                                    <p class="card-text">'.$imgData['des'].'</p>
                                    
                                  </div>
                                </div>

                              </div>';
                        
                        } 
                    }else{
                        echo 'Image not found...';
                    }
            ?>    
                    
                    
                </div>
                
            </div>
        </section>
        <!--================End Gallery Area =================-->
        
        <!--================ start footer Area  =================-->    
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Agency</h6>
                            <p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Navigation Links</h6>
                            <div class="row">
                                <div class="col-4">
                                    <ul class="list">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Feature</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Portfolio</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul class="list">
                                        <li><a href="#">Team</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>                                      
                            </div>                          
                        </div>
                    </div>                          
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>For business professionals caught between high OEM price and mediocre print and graphic output, </p>     
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-location"></span></button>     
                                    </div>                                  
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">InstaFeed</h6>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="img/instagram/Image-01.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-02.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-03.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-04.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-07.jpg" alt=""></li>
                                <li><img src="img/instagram/Image-08.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>                      
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-sm-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
        <script type="text/javascript">
            $(function(){
                $("#cat").on('change',function(){
                    var id = $(this).val();
                    $.post("get_subcat.php",
                      {
                        cat: id
                      },
                      function(data, status){
                        if(status){
                           $('#subcat').html(data);
                        }
                      });
                });
                var id=0;
                $('#subcat').on('change',function(){
                    id=$(this).val();
                });
                $("#s4").click(function(){
                    $.post("get_images.php",
                    {
                        subcat: id
                    },
                    function(data, status){
                        
                        if(status){
                            $(".gallery_inner").html(data);
                        }
                    });
                });
            });
        </script>
    </body>
</html>