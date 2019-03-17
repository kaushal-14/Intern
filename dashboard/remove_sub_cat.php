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
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>NGO</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>

    <style type="text/css">
        
        p {
            font-size: 16px;
            color: #1E2EC1;
            
            

        }

        #p {
            font-size: 20px;
            color: green;

        }




    </style>

</head>

<body>
    <div class="wrapper">
        <?php include_once("sidebar.php") ?>
        <div class="main-panel">
            <?php include_once("navbar.php") ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-12" >
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Remove Sub-Category</h4>
                                    
                                </div>
                                <div class="card-content">
                                    <form method="post" enctype="multipart/form-data">
                                    <p id="p">In this panel we can remove categories of your choice</p>
                                    
                                    
                                            <select id="cat">
                
                                                <option disabled selected>Select category</option>
                                                    <?php
                                                        
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
                                                    &ensp; &ensp; &ensp;
                                                
                                                  <select name="subcat" id="subcat">
                                                    <option disabled selected>Select sub-category</option>
                                                  </select>

                                                    &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;

                                                 <button type="button" id="s4" class="btn btn-primary btn-sm">Delete</button>

                                             </form>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


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
                
                $('#s4').click(function () {
                   $.post("remove_sub_server.php",
                  {
                    subcat:id
                  },
                  function(data, status){
                    if(status && data){
                        alert('sub-category deleted successfully');
                    }
                    else{
                        alert("Deletion Failed");
                    }
                  });

                });
            });
        </script>



</html>