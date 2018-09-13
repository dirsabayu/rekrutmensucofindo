<?php
	include "koneksi.php";
	$password=md5($_POST['password']);
	$cari=mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username='$_POST[username]' AND password='$password'");
	$ketemu=mysqli_num_rows($cari);
	$r=mysqli_fetch_array($cari);

	if ($ketemu>0){
		session_start();
		$_SESSION['id']		= $r['id'];
		$_SESSION['username'] = $r['username'];
		$_SESSION['password']	= $r['password'];
		$_SESSION['level']	= $r['level'];

		if($_SESSION['level']==1){
		header('location:tampil.php?module=dashboard');
	  	}else if($_SESSION['level']==2){
		header('location:tampil.php?module=dashboard');
	  	}
	}else{
		echo"
		<script language='javascript' type='text/javascript'>
		alert('Password Salah !');
		</script>
		<meta http-equiv='refresh' content='0; url=index.php'>";
	}
?>