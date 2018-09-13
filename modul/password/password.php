<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/password/aksi_password.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	
	$baca=mysqli_query($conn, "select * from tbl_admin where username=' $_SESSION[username]'");
	$r=mysqli_fetch_array($baca);
	echo"
	<div class='row'>
	    <div class='col-md-8'>
		    <div class='card'>
				<div class='header'>
			        <h4 class='title'>Ubah Password</h4>
			    </div>
			    <div class='content'>
					<Form method='POST' action='$aksi?module=password&act=edit'>
					<input type='hidden' name='username1' value='$_SESSION[username]'>
					<div class='row'>
				    	<div class='col-md-6'>
				    		<div class='form-group'>
								<label>Password Baru</label>
								<input type='password' name='password1' class='form-control' required>
							</div>
						</div>
						<div class='col-md-6'>
			    			<div class='form-group'>
								<label>Konfirmasi Password</label>
								<input type='password' name='password2' class='form-control' required>
							</div>
						</div>
						
						<div class='col-md-12'>
							<input Value='Update' type='submit' class='btn btn-info btn-fill'>
							<input type=button value='Batal' class='btn btn-warning btn-fill' onclick=self.history.back()>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		";
	}
}	
		
?>