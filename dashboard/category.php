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
        
        .card-content .s1 {
            padding: 10px;
            float: left;
            position: relative;
        }

        .card-content {
            height: 100px;
        }


        #s3 {
            padding: 10px;

            border: none;
            outline: none;
            color: #fff;
            font-size: 17.5px;
            background:  #0098cb;
            width: 191px;
            margin-left: 10px;
            float: left;
            border: 0px;
            border-radius: 3px;
            cursor: pointer;
            position: relative;
            
        }

        #s2 {
            float: left;
            position: relative;
            padding: 8px;
        }

        p {
            font-size: 20px;
            color: green;
            margin: center ;

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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: green;">
                                    <h4 class="title">Add Category</h4>
                                    
                                </div>
                                <div class="card-content">
                                   <?php include('catserver.php') ?> 
                                    
                                   <form method="post">
                                        <p>In this panel you can add Category of your choice</p>
                                        <input type="text" name="cat" id="s2">
                                        <input type="submit" name="submit" value="submit" id="s3">
                                   </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display: none">
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Table on Plain Background</h4>
                                    <p class="category">Here is a subtitle for this table</p>
                                </div>
                                <div class="card-content table-responsive">
                                    
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
    var x = document.getElementsByClassName('select');
    x[0].style.color="green";
</script>
</html>