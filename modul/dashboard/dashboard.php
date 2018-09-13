<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
    alert('Anda Harus Login Terlebih Dahulu !');
    </script>
    <meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{
?>
	<div class='row'>
	    <div class='col-md-12'>
		    <div class='card'>
				<div class='header'>
			        <h3 class='title'>Dashboard</h3><hr>
			    </div>
			    <div class='content'>

			    </div>
			</div>
		</div>
	</div>
<?php
}	
?>