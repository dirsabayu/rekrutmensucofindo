<?php 
include "../../koneksi.php";
$password=md5($_POST['password1']);
$password1=md5($_POST['password2']);
$module=$_GET['module'];

if($_POST['password1'] == $_POST['password2']){
	mysqli_query($conn, "UPDATE tbl_admin SET password='$password'
							  WHERE username='$_POST[username1]'");
	header('location:../../tampil.php?module=dashboard');
}
else{
	echo"
	<script language='javascript' type='text/javascript'>
	alert('Password Tidak Sama !');
	</script>
	<meta http-equiv='refresh' content='0; url=../../tampil.php?module=$module'>";
}


?>