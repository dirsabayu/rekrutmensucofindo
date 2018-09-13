<?php 
include "koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
    alert('Anda Harus Login Terlebih Dahulu !');
    </script>
    <meta http-equiv='refresh' content='0; url=index.php'>";  
}
else{
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin | E-Rekrutmen SUCOFINDO</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
    <!--<link href="css/style.css" rel="stylesheet" />-->
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/1.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <img src="assets/img/logo.png" width="40%">
                </a>
            </div>

            <ul class="nav">
                <?php
                if ($_SESSION['level']=='1'){
                ?>
                <li>
                    <a href="?module=dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="?module=pendaftar">
                        <i class="pe-7s-id"></i>
                        <p>Data Pendaftar</p>
                    </a>
                </li>
                <li>
                    <a href="?module=password">
                        <i class="pe-7s-config"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>
                <?php } ?>
                <?php
                if ($_SESSION['level']=='2'){
                ?>
                <li>
                    <a href="?module=dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="?module=pendaftar">
                        <i class="pe-7s-id"></i>
                        <p>Pendaftar</p>
                    </a>
                </li>
                <li>
                    <a href="?module=password">
                        <i class="pe-7s-config"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>
                <?php } ?>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SUCOFINDO | Halaman Admin</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <?php include "data.php"; ?>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Bayu Dirsa Gunawan</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

    	});
	</script>

        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            // tabel lookup
            $(function () {
                $("#lookup").dataTable();
            });
        </script>

</html>
<?php } ?>
