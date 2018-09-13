<?php
	if ($_SESSION['level']=='1'){
		if($_GET['module']=="dashboard"){
			include "modul/dashboard/dashboard.php";
		}
		else if($_GET['module']=="pendaftar"){
			include "modul/pendaftar/pendaftar.php";
		}
		else if($_GET['module']=="password"){
			include "modul/password/password.php";
		}
	}
	if ($_SESSION['level']=='2'){
		if($_GET['module']=="dashboard"){
			include "modul/dashboard/dashboard.php";
		}
		else if($_GET['module']=="pendaftar"){
			include "modul/pendaftar/pendaftar.php";
		}
		else if($_GET['module']=="password"){
			include "modul/password/password.php";
		}
	}
?>