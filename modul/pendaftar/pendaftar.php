<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
    alert('Anda Harus Login Terlebih Dahulu !');
    </script>
    <meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{
	$aksi="modul/pendaftar/aksi_pendaftar.php";
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 
	switch($act){
	default:
	
	$tampil=mysqli_query($conn,"select * from tbl_profil ORDER BY no_pendaftar");
?>
	<div class='row'>
	    <div class='col-md-12'>
		    <div class='card'>
				<div class='header'>
			        <h3 class='title'>Data Pendaftar</h3><hr>
					<?php echo"<input type=button value='(+) Tambah'  class='btn btn-info btn-fill' onclick=\"window.location.href='?module=pendaftar&act=input';\"><br> ";?>
			    </div>
			    <div class='content'>
					<table id="lookup" class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th><center>No Pendaftaran</th>
							<th><center>Nama Lengkap</th>
							<th><center>Jenis Kelamin</th>
							<th><center>Alamat</th>
							<th><center>Aksi</th>
						</tr>
					</thead>
					<tbody>
<?php
	while($r = mysqli_fetch_array($tampil)){
	echo"
		<tr>
			<td><center>000$r[no_pendaftar]</td>
			<td><center>$r[nama_lengkap]</td>
			<td><center>$r[jenis_kelamin]</td>
			<td><center>$r[alamat_ktp]</td>
			<td id='edit'><center><a href='?module=pendaftar&act=edit&kode=$r[no_pendaftar]'>Edit</a> | 
				<a href='$aksi?module=pendaftar&act=hapus&kode=$r[no_pendaftar]' onclick=\"return confirm('Apakah anda yakin akan menghapus $r[nama_lengkap] ?')\">Hapus</a></td>
		</tr>";
		}
?>		
					</tbody>			
					</table>
				</div>
			</div>
		</div>
	</div>

<?php
	
	break;
	
	case "input":
?>
	<div class='row'>
	    <div class='col-md-12'>
		    <div class='card'>
				<div class='header'>
			        <h3 class='title'>Tambah Data</h3><hr>
				</div>
				<div class='content'>
					<form method='POST' action='<?php echo "$aksi?module=pendaftar&act=input"; ?>'>
									<div class="col-md-6">
								  		<div class="form-group">
											<label for="Nama">Nama Lengkap</label>
											<input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="Email">Jenis Kelamin</label>
											<select name="jenis_kelamin" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="L">Laki - Laki</option>
										        <option value="P">Perempuan</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-4">
								  		<div class="form-group">
											<label for="Nama">Tempat / Tanggal Lahir</label>
											<input type="text" name="ttl_pendaftar" class="form-control" placeholder="Tempat / Tanggal Lahir" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Email">Kewarganegaraan</label>
											<select name="kewarganegaraan" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="WNI">WNI</option>
										        <option value="WNA">WNA</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Nama">Suku</label>
											<input type="text" name="suku" class="form-control" placeholder="Masukkan Suku" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Email">Agama</label>
											<select name="agama" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="Islam">Islam</option>
										        <option value="Katolik">Katolik</option>
										        <option value="Protestan">Protestan</option>
										        <option value="Hindu">Hindu</option>
										        <option value="Buddha">Buddha</option>
										        <option value="Kong Hu Cu">Kong Hu Cu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-6">
								  		<div class="form-group">
											<label for="Nama">Status Perkawinan</label>
											<select name="status_perkawinan" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="Belum Menikah">Belum Menikah</option>
										        <option value="Menikah">Menikah</option>
										        <option value="Janda/Duda">Janda / Duda</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-6">
								  		<div class="form-group">
											<label for="Nama">Tempat / Tanggal Perkawinan</label>
											<input type="text" name="tempat_tgl_perkawinan" class="form-control" placeholder="Tempat / Tanggal Perkawinan">
										</div>
									</div>
									<div class="col-md-12">
										<p>Kartu Identitas</p>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Nomor</label>
												<input type="text" name="nomor_identitas" class="form-control" placeholder="Nomor Identitas" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Tanggal</label>
												<input type="date" name="tanggal_identitas" class="form-control"  required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Dikeluarkan Oleh</label>
												<input type="text" name="penerbit_identitas" class="form-control" placeholder="Dikeluarkan Oleh" required>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<p>Alamat Lengkap (Sesuai KTP)</p>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Jalan</label>
												<input type="text" name="alamat_ktp" class="form-control" placeholder="Masukkan Nama Jalan" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kelurahan / Desa</label>
												<input type="text" name="kelurahan_ktp" class="form-control" placeholder="Kelurahan" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kecamatan</label>
												<input type="text" name="kecamatan_ktp" class="form-control" placeholder="Kecamatan" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kab. / Kotamadya</label>
												<input type="text" name="kabupaten_ktp" class="form-control" placeholder="Kabupaten" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Propinsi</label>
												<input type="text" name="propinsi_ktp" class="form-control" placeholder="Propinsi" required>
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Kode Pos</label>
												<input type="text" name="kode_pos_ktp" class="form-control" placeholder="Kode Pos" required>
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Telepon</label>
												<input type="text" name="telepon_ktp" class="form-control" placeholder="Telepon" required>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<p>Alamat Sementara (Jika ADA)</p>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Jalan</label>
												<input type="text" name="alamat_sementara" class="form-control" placeholder="Masukkan Nama Jalan">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kelurahan / Desa</label>
												<input type="text" name="kelurahan_sementara" class="form-control" placeholder="Kelurahan">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kecamatan</label>
												<input type="text" name="kecamatan_sementara" class="form-control" placeholder="Kecamatan">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kab. / Kotamadya</label>
												<input type="text" name="kabupaten_sementara" class="form-control" placeholder="Kabupaten">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Propinsi</label>
												<input type="text" name="propinsi_sementara" class="form-control" placeholder="Propinsi">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Kode Pos</label>
												<input type="text" name="kode_pos_sementara" class="form-control" placeholder="Kode Pos">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Telepon</label>
												<input type="text" name="telepon_sementara" class="form-control" placeholder="Telepon">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<p>Ciri Badan</p>
										<div class="col-md-1">
									  		<div class="form-group">
												<label for="Nama">Tinggi (cm)</label>
												<input type="text" name="tinggi" class="form-control" placeholder="Tinggi">
											</div>
										</div>
										<div class="col-md-1">
									  		<div class="form-group">
												<label for="Nama">Berat (kg)</label>
												<input type="text" name="berat" class="form-control" placeholder="Berat">
											</div>
										</div>
										<div class="col-md-3">
									  		<div class="form-group">
												<label for="Nama">Rambut</label>
												<input type="text" name="rambut" class="form-control" placeholder="Rambut">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Warna Rambut</label>
												<input type="text" name="warna_rambut" class="form-control" placeholder="Warna Rambut">
											</div>
										</div>
										<div class="col-md-3">
									  		<div class="form-group">
												<label for="Nama">Bentuk Muka</label>
												<input type="text" name="bentuk_muka" class="form-control" placeholder="Bentuk Muka">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Warna Kulit</label>
												<input type="text" name="warna_kulit" class="form-control" placeholder="Warna Kulit">
											</div>
										</div>
										<div class="col-md-5">
									  		<div class="form-group">
												<label for="Nama">Ciri - Ciri Khas</label>
												<input type="text" name="ciri_khas" class="form-control" placeholder="Ciri Khas">
											</div>
										</div>
										<div class="col-md-3">
									  		<div class="form-group">
												<label for="Nama">Cacat Tubuh</label>
												<input type="text" name="cacat_tubuh" class="form-control" placeholder="Cacat Tubuh">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Hobi</label>
												<input type="text" name="hobi" class="form-control" placeholder="Hobi">
											</div>
										</div>
									</div>


	 					 <input type=submit value=Simpan  class="btn btn-info">
	 					 <input type=button value=Batal  class="btn btn-warning" onclick=self.history.back()>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
	break;
	
	case "edit":
	$baca=mysqli_query($conn,"select * from tbl_profil where no_pendaftar='$_GET[kode]'");
	$r=mysqli_fetch_array($baca);
	?>

	<div class='row'>
	    <div class='col-md-12'>
		    <div class='card'>
				<div class='header'>
			        <h3 class='title'>Lengkapi Data</h3><hr>
				</div>
				<div class='content'>
					<form method='POST' action='$aksi?module=pendaftar&act=input'>
					<div class="">
						<div class="tabs-wrap">
							<ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active">
							    	<a href="#Profil" aria-controls="Profil" role="tab" data-toggle="tab" aria-expanded="true">Profil</a>
							    </li>
							    <li>
							    	<a href="#PendidikanFormal" aria-controls="PendidikanFormal" role="tab" data-toggle="tab" aria-expanded="false">Pendidikan Formal</a>
							    </li>
							    <li>
							    	<a href="#PendidikanNonFormal" aria-controls="PendidikanNonFormal" role="tab" data-toggle="tab" aria-expanded="false">Pendidikan Non Formal</a>
							    </li>
							    <li>
							    	<a href="#Kerabat" aria-controls="Kerabat" role="tab" data-toggle="tab" aria-expanded="false">Kerabat</a>
							    </li>
							    <li>
							    	<a href="#PengalamanKerja" aria-controls="PengalamanKerja" role="tab" data-toggle="tab" aria-expanded="false">Pengalaman Kerja</a>
							    </li>
							    <li>
							    	<a href="#UploadFile" aria-controls="UploadFile" role="tab" data-toggle="tab" aria-expanded="false">Upload File</a>
							    </li>
							</ul>

							<div class="tab-content">
								  <div role="tabpanel" class="tab-pane active" id="Profil">
								  	<div class="col-md-6">
								  		<div class="form-group">
											<label for="Nama">Nama Lengkap</label>
											<input type="text" name="nama_lengkap" class="form-control" value="<?php echo "$r[nama_lengkap]"; ?>">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="Email">Jenis Kelamin</label>
											<select name="jenis_kelamin" class="form-control">
												<?php
												if $r[nama_lengkap]=='L'{
												?>
										        <option value="">--Pilih--</option>
										        <option value="L" selected>Laki - Laki</option>
										        <option value="P">Perempuan</option>
										    }else{
										    ?>
										    	<option value="">--Pilih--</option>
										        <option value="L">Laki - Laki</option>
										        <option value="P" selected>Perempuan</option>
											<?php } ?>
									       	</select>
										</div>
									</div>
									<div class="col-md-4">
								  		<div class="form-group">
											<label for="Nama">Tempat / Tanggal Lahir</label>
											<input type="text" name="ttl_pendaftar" class="form-control" placeholder="Tempat / Tanggal Lahir" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Email">Kewarganegaraan</label>
											<select name="kewarganegaraan" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="WNI">WNI</option>
										        <option value="WNA">WNA</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Nama">Suku</label>
											<input type="text" name="suku" class="form-control" placeholder="Masukkan Suku" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Email">Agama</label>
											<select name="agama" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="Islam">Islam</option>
										        <option value="Katolik">Katolik</option>
										        <option value="Protestan">Protestan</option>
										        <option value="Hindu">Hindu</option>
										        <option value="Buddha">Buddha</option>
										        <option value="Kong Hu Cu">Kong Hu Cu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-6">
								  		<div class="form-group">
											<label for="Nama">Status Perkawinan</label>
											<select name="status_perkawinan" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="Belum Menikah">Belum Menikah</option>
										        <option value="Menikah">Menikah</option>
										        <option value="Janda/Duda">Janda / Duda</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-6">
								  		<div class="form-group">
											<label for="Nama">Tempat / Tanggal Perkawinan</label>
											<input type="text" name="tempat_tgl_perkawinan" class="form-control" placeholder="Tempat / Tanggal Perkawinan">
										</div>
									</div>
									<div class="col-md-12">
										<p>Kartu Identitas</p>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Nomor</label>
												<input type="text" name="nomor_identitas" class="form-control" placeholder="Nomor Identitas" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Tanggal</label>
												<input type="date" name="tanggal_identitas" class="form-control"  required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Dikeluarkan Oleh</label>
												<input type="text" name="penerbit_identitas" class="form-control" placeholder="Dikeluarkan Oleh" required>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<p>Alamat Lengkap (Sesuai KTP)</p>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Jalan</label>
												<input type="text" name="alamat_ktp" class="form-control" placeholder="Masukkan Nama Jalan" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kelurahan / Desa</label>
												<input type="text" name="kelurahan_ktp" class="form-control" placeholder="Kelurahan" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kecamatan</label>
												<input type="text" name="kecamatan_ktp" class="form-control" placeholder="Kecamatan" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kab. / Kotamadya</label>
												<input type="text" name="kabupaten_ktp" class="form-control" placeholder="Kabupaten" required>
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Propinsi</label>
												<input type="text" name="propinsi_ktp" class="form-control" placeholder="Propinsi" required>
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Kode Pos</label>
												<input type="text" name="kode_pos_ktp" class="form-control" placeholder="Kode Pos" required>
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Telepon</label>
												<input type="text" name="telepon_ktp" class="form-control" placeholder="Telepon" required>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<p>Alamat Sementara (Jika ADA)</p>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Jalan</label>
												<input type="text" name="alamat_sementara" class="form-control" placeholder="Masukkan Nama Jalan">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kelurahan / Desa</label>
												<input type="text" name="kelurahan_sementara" class="form-control" placeholder="Kelurahan">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kecamatan</label>
												<input type="text" name="kecamatan_sementara" class="form-control" placeholder="Kecamatan">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Kab. / Kotamadya</label>
												<input type="text" name="kabupaten_sementara" class="form-control" placeholder="Kabupaten">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Propinsi</label>
												<input type="text" name="propinsi_sementara" class="form-control" placeholder="Propinsi">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Kode Pos</label>
												<input type="text" name="kode_pos_sementara" class="form-control" placeholder="Kode Pos">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Telepon</label>
												<input type="text" name="telepon_sementara" class="form-control" placeholder="Telepon">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<p>Ciri Badan</p>
										<div class="col-md-1">
									  		<div class="form-group">
												<label for="Nama">Tinggi (cm)</label>
												<input type="text" name="tinggi" class="form-control" placeholder="Tinggi">
											</div>
										</div>
										<div class="col-md-1">
									  		<div class="form-group">
												<label for="Nama">Berat (kg)</label>
												<input type="text" name="berat" class="form-control" placeholder="Berat">
											</div>
										</div>
										<div class="col-md-3">
									  		<div class="form-group">
												<label for="Nama">Rambut</label>
												<input type="text" name="rambut" class="form-control" placeholder="Rambut">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Warna Rambut</label>
												<input type="text" name="warna_rambut" class="form-control" placeholder="Warna Rambut">
											</div>
										</div>
										<div class="col-md-3">
									  		<div class="form-group">
												<label for="Nama">Bentuk Muka</label>
												<input type="text" name="bentuk_muka" class="form-control" placeholder="Bentuk Muka">
											</div>
										</div>
										<div class="col-md-2">
									  		<div class="form-group">
												<label for="Nama">Warna Kulit</label>
												<input type="text" name="warna_kulit" class="form-control" placeholder="Warna Kulit">
											</div>
										</div>
										<div class="col-md-5">
									  		<div class="form-group">
												<label for="Nama">Ciri - Ciri Khas</label>
												<input type="text" name="ciri_khas" class="form-control" placeholder="Ciri Khas">
											</div>
										</div>
										<div class="col-md-3">
									  		<div class="form-group">
												<label for="Nama">Cacat Tubuh</label>
												<input type="text" name="cacat_tubuh" class="form-control" placeholder="Cacat Tubuh">
											</div>
										</div>
										<div class="col-md-4">
									  		<div class="form-group">
												<label for="Nama">Hobi</label>
												<input type="text" name="hobi" class="form-control" placeholder="Hobi">
											</div>
										</div>
									</div>
								  </div>



								  <div role="tabpanel" class="tab-pane" id="PendidikanFormal">
								    <h3 class="">Pendidikan Saat Ini</h3>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Jenjang</label>
											<select name="Jenjang" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">SMP</option>
									        <option value="2">SMA/K</option>
									        <option value="3">S1</option>
									        <option value="4">S2</option>
									        <option value="5">S3</option>
									       	</select>
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Nama Institusi Pendidikan</label>
											<input type="text" name="Nama_Institusi" class="form-control" placeholder="Masukkan Nama Institusi">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Fakultas</label>
											<input type="text" name="Fakultas" class="form-control" placeholder="Masukkan Nama Fakultas">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Jurusan / Program Studi</label>
											<input type="text" name="Jurusan" class="form-control" placeholder="Masukkan Jurusan">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Nomor Ijazah</label>
											<input type="text" name="Nomor_Ijazah" class="form-control" placeholder="Masukkan Nomor Ijazah">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Akreditasi</label>
											<select name="Akreditasi" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">A</option>
									        <option value="2">B</option>
									        <option value="3">C</option>
									        <option value="4">Belum Terakreditasi</option>
									       	</select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="col-md-12">
								    		<label for="Ktp">Tahun Pendidikan</label>
								    	</div>
								    	<div class="col-md-4">
								    		<div class="form-group">
												<P>Dari Tahun</P>
												<select name="Dari_Tahun" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select>
											</div>
								    	</div>
								    	<div class="col-md-4">
								    		<div class="form-group">
												<p>Sampai Tahun</p>
												<select name="Sampai_Tahun" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select>
											</div>
								    	</div>
								    	<div class="col-md-4">
								    		<div class="form-group">
												<p>Status Lulus</p>
												<select name="Tahun_Lulus" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select>
											</div>
								    	</div>
								    </div>
								    <div class="col-md-12">
										<div class="form-group">
											<label for="Ktp">Alamat Institusi Pendidikan</label>
											<textarea cols="20" rows="2" class="form-control" name="Alamat_Domisili"></textarea>
										</div>	
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Propinsi</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kabupaten</label>
											<select name="Kabupaten_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kota</label>
											<select name="Kota_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kode Pos</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Ktp">Telepon</label>
											<input type="text" name="Telepon" class="form-control" placeholder="Masukkan Telepon">
										</div>	
									</div>
									<div class="col-md-12">
										<hr>
										<h3 class="">Pendidikan Sebelumnya</h3>
									</div>
									<div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Jenjang</label>
											<select name="Jenjang" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">SMP</option>
									        <option value="2">SMA/K</option>
									        <option value="3">S1</option>
									        <option value="4">S2</option>
									        <option value="5">S3</option>
									       	</select>
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Nama Institusi Pendidikan</label>
											<input type="text" name="Nama_Institusi" class="form-control" placeholder="Masukkan Nama Institusi">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Fakultas</label>
											<input type="text" name="Fakultas" class="form-control" placeholder="Masukkan Nama Fakultas">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Jurusan / Program Studi</label>
											<input type="text" name="Jurusan" class="form-control" placeholder="Masukkan Jurusan">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Nomor Ijazah</label>
											<input type="text" name="Nomor_Ijazah" class="form-control" placeholder="Masukkan Nomor Ijazah">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Akreditasi</label>
											<select name="Akreditasi" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">A</option>
									        <option value="2">B</option>
									        <option value="3">C</option>
									        <option value="4">Belum Terakreditasi</option>
									       	</select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="col-md-12">
								    		<label for="Ktp">Tahun Pendidikan</label>
								    	</div>
								    	<div class="col-md-4">
								    		<div class="form-group">
												<P>Dari Tahun</P>
												<select name="Dari_Tahun" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select>
											</div>
								    	</div>
								    	<div class="col-md-4">
								    		<div class="form-group">
												<p>Sampai Tahun</p>
												<select name="Sampai_Tahun" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select>
											</div>
								    	</div>
								    	<div class="col-md-4">
								    		<div class="form-group">
												<p>Status Lulus</p>
												<select name="Tahun_Lulus" class="form-control">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select>
											</div>
								    	</div>
								    </div>
								    <div class="col-md-12">
										<div class="form-group">
											<label for="Ktp">Alamat Institusi Pendidikan</label>
											<textarea cols="20" rows="2" class="form-control" name="Alamat_Domisili"></textarea>
										</div>	
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Propinsi</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kabupaten</label>
											<select name="Kabupaten_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kota</label>
											<select name="Kota_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kode Pos</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Ktp">Telepon</label>
											<input type="text" name="Telepon" class="form-control" placeholder="Masukkan Telepon">
										</div>	
									</div>
								  </div>

								  <div role="tabpanel" class="tab-pane" id="PendidikanNonFormal">
								    <h3 class="">Sertifikasi Pelatihan</h3>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Nama Pelatihan/Sertifikasi</label>
											<input type="text" name="Nama_Pelatihan1" class="form-control" placeholder="Masukkan Nama Sertifikasi">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Lembaga Penyelenggara Sertifikasi</label>
											<input type="text" name="Nama_Lembaga1" class="form-control" placeholder="Masukkan Nama Lembaga">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Bidang Pelatihan/Sertifikasi</label>
											<input type="text" name="Nama_Bidang1" class="form-control" placeholder="Masukkan Nama Bidang">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Tahun Sertifikasi Dikeluarkan</label>
											<select name="Tahun_Dikeluarkan" class="form-control" >
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
								    </div>
								    <div class="col-md-12">
										<div class="form-group">
											<label for="Ktp">Alamat Institusi Pelatihan/Sertifikasi</label>
											<textarea cols="20" rows="2" class="form-control" name="Alamat_Domisili"></textarea>
										</div>	
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Propinsi</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kabupaten</label>
											<select name="Kabupaten_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kota</label>
											<select name="Kota_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kode Pos</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Ktp">Telepon</label>
											<input type="text" name="Telepon" class="form-control" placeholder="Masukkan Telepon">
										</div>	
									</div>
									<div class="col-md-12"><hr></div>
									<div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Nama Pelatihan/Sertifikasi</label>
											<input type="text" name="Nama_Pelatihan1" class="form-control" placeholder="Masukkan Nama Sertifikasi">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Lembaga Penyelenggara Sertifikasi</label>
											<input type="text" name="Nama_Lembaga1" class="form-control" placeholder="Masukkan Nama Lembaga">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Bidang Pelatihan/Sertifikasi</label>
											<input type="text" name="Nama_Bidang1" class="form-control" placeholder="Masukkan Nama Bidang">
										</div>
								    </div>
								    <div class="col-md-3">
								    	<div class="form-group">
											<label for="Ktp">Tahun Sertifikasi Dikeluarkan</label>
											<select name="Tahun_Dikeluarkan" class="form-control" >
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
								    </div>
								    <div class="col-md-12">
										<div class="form-group">
											<label for="Ktp">Alamat Institusi Pelatihan/Sertifikasi</label>
											<textarea cols="20" rows="2" class="form-control" name="Alamat_Domisili"></textarea>
										</div>	
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Propinsi</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kabupaten</label>
											<select name="Kabupaten_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kota</label>
											<select name="Kota_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Email">Kode Pos</label>
											<select name="Propinsi_Domisili" class="form-control">
									        <option value="">--Pilih--</option>
									        <option value="1">Islam</option>
									        <option value="2">Katolik</option>
									        <option value="3">Protestan</option>
									        <option value="4">Hindu</option>
									        <option value="5">Buddha</option>
									        <option value="6">Khonghucu</option>
									       	</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="Ktp">Telepon</label>
											<input type="text" name="Telepon" class="form-control" placeholder="Masukkan Telepon">
										</div>	
									</div>
									<div class="col-md-12"><hr>
										<h3 class="">Pengalaman Organisasi</h3></div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Ktp">Nama Organisasi</label>
											<input type="text" name="Nama_Organisasi1" class="form-control" placeholder="Masukkan Nama Organisasi">
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Ktp">Bidang Organisasi</label>
											<input type="text" name="Bidang_Organisasi1" class="form-control" placeholder="Masukkan Bidang Organisasi">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Ktp">Jabatan</label>
											<input type="text" name="Jabatan_Organisasi1" class="form-control" placeholder="Masukkan Jabatan Organisasi">
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-12">
								    		<label for="Ktp">Periode Jabatan</label>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Bulan
												<select name="Dari_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Tahun
												<select name="Dari_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Bulan
												<select name="Sampai_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Tahun
												<select name="Sampai_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
									</div>
									<div class="col-md-12"><hr></div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Ktp">Nama Organisasi</label>
											<input type="text" name="Nama_Organisasi1" class="form-control" placeholder="Masukkan Nama Organisasi">
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Ktp">Bidang Organisasi</label>
											<input type="text" name="Bidang_Organisasi1" class="form-control" placeholder="Masukkan Bidang Organisasi">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Ktp">Jabatan</label>
											<input type="text" name="Jabatan_Organisasi1" class="form-control" placeholder="Masukkan Jabatan Organisasi">
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-12">
								    		<label for="Ktp">Periode Jabatan</label>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Bulan
												<select name="Dari_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Tahun
												<select name="Dari_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Bulan
												<select name="Sampai_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Tahun
												<select name="Sampai_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
									</div>
								  </div>

								  <div role="tabpanel" class="tab-pane" id="Kerabat">
								    <h3 class="">Data Kerabat Sesuai Kartu Keluarga</h3>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Nomor Kartu Keluarga</label>
											<input type="text" style="max-width: 300px;" name="Nomor_KK" class="form-control" placeholder="Nomor Kartu Keluarga">
										</div>
								    </div>
								    <div class="col-md-12"><p style="text-decoration: underline;">Ayah</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Ayah" class="form-control" placeholder="Masukkan Nama Ayah">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Ayah" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Pekerjaan</label>
											<input type="text" style="max-width: 300px;" name="Pekerjaan_Ayah" class="form-control" placeholder="Masukkan Pekerjaan">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Instansi</label>
											<input type="text" style="max-width: 300px;" name="Instansi_Ayah" class="form-control" placeholder="Masukkan Instansi">
										</div>
								    </div>
								    <div class="col-md-12"><hr></div>
								    <div class="col-md-12"><p style="text-decoration: underline;">Ibu</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Ibu" class="form-control" placeholder="Masukkan Nama Ibu">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Ibu" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Pekerjaan</label>
											<input type="text" style="max-width: 300px;" name="Pekerjaan_Ibu" class="form-control" placeholder="Masukkan Pekerjaan">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Instansi</label>
											<input type="text" style="max-width: 300px;" name="Instansi_Ayah" class="form-control" placeholder="Masukkan Instansi">
										</div>
								    </div>
								    <div class="col-md-12"><hr></div>
								    <div class="col-md-12"><p style="text-decoration: underline;">Saudara Kandung 1</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Saudara1" class="form-control" placeholder="Masukkan Nama Saudara">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Saudara1" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Jenis Kelamin</label>
											<select name="Kelamin_Saudara1" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Laki-Laki</option>
										        <option value="2">Perempuan</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Pekerjaan</label>
											<input type="text" style="max-width: 300px;" name="Pekerjaan_Saudara1" class="form-control" placeholder="Masukkan Pekerjaan">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Instansi</label>
											<input type="text" style="max-width: 300px;" name="Instansi_Saudara1" class="form-control" placeholder="Masukkan Instansi">
										</div>
								    </div>
								    <div class="col-md-12"><hr></div>
								    <div class="col-md-12"><p style="text-decoration: underline;">Saudara Kandung 2</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Saudara2" class="form-control" placeholder="Masukkan Nama Saudara">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Saudara2" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Jenis Kelamin</label>
											<select name="Kelamin_Saudara2" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Laki-Laki</option>
										        <option value="2">Perempuan</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Pekerjaan</label>
											<input type="text" style="max-width: 300px;" name="Pekerjaan_Saudara2" class="form-control" placeholder="Masukkan Pekerjaan">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Instansi</label>
											<input type="text" style="max-width: 300px;" name="Instansi_Saudara2" class="form-control" placeholder="Masukkan Instansi">
										</div>
								    </div>
								    <div class="col-md-12"><hr></div>
								    <div class="col-md-12"><p style="text-decoration: underline;">Saudara Kandung 3</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Saudara3" class="form-control" placeholder="Masukkan Nama Saudara">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Saudara3" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Jenis Kelamin</label>
											<select name="Kelamin_Saudara3" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Laki-Laki</option>
										        <option value="2">Perempuan</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Pekerjaan</label>
											<input type="text" style="max-width: 300px;" name="Pekerjaan_Saudara3" class="form-control" placeholder="Masukkan Pekerjaan">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Instansi</label>
											<input type="text" style="max-width: 300px;" name="Instansi_Saudara3" class="form-control" placeholder="Masukkan Instansi">
										</div>
								    </div>
								    <div class="col-md-12"><hr>
								    	<div class="form-inline">
								    	<label>Apakah Saudara memiliki kerabat (Orangtua, saudara kandung, kerabat yang bekerja sebagai karyawan di PT. SUCOFINDO?
								    	<select name="Kelamin_Saudara3" class="form-control" style="max-width: 100px;">
										        <option value="">--Pilih--</option>
										        <option value="1">Ya</option>
										        <option value="2">Tidak</option>
										    </select> Bila Ya, Sebutkan :
										</label>
										</div>
									</div>
								    <div class="col-md-12"><p style="text-decoration: underline;">Kerabat 1</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Kerabat1" class="form-control" placeholder="Masukkan Nama Kerabat">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Kerabat1" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Jenis Kelamin</label>
											<select name="Kelamin_Kerabat1" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Laki-Laki</option>
										        <option value="2">Perempuan</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Unit Kerja</label>
											<input type="text" style="max-width: 300px;" name="Unit_Kerabat1" class="form-control" placeholder="Masukkan Unit Kerja">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Job Title</label>
											<input type="text" style="max-width: 300px;" name="Title_Kerabat1" class="form-control" placeholder="Masukkan Job Title">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Hubungan Kekerabatan</label>
											<select name="Hubungan_Kerabat1" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Paman/Bibi</option>
										        <option value="2">Keponakan</option>
										    </select>
										</div>
								    </div>
									<div class="col-md-12"><hr></div>
									<div class="col-md-12"><p style="text-decoration: underline;">Kerabat 2</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Kerabat2" class="form-control" placeholder="Masukkan Nama Kerabat">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Kerabat2" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Jenis Kelamin</label>
											<select name="Kelamin_Kerabat2" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Laki-Laki</option>
										        <option value="2">Perempuan</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Unit Kerja</label>
											<input type="text" style="max-width: 300px;" name="Unit_Kerabat2" class="form-control" placeholder="Masukkan Unit Kerja">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Job Title</label>
											<input type="text" style="max-width: 300px;" name="Title_Kerabat2" class="form-control" placeholder="Masukkan Job Title">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Hubungan Kekerabatan</label>
											<select name="Hubungan_Kerabat2" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Paman/Bibi</option>
										        <option value="2">Keponakan</option>
										    </select>
										</div>
								    </div>
									<div class="col-md-12"><hr></div>
									<div class="col-md-12"><p style="text-decoration: underline;">Kerabat 3</p></div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Nama</label>
											<input type="text" style="max-width: 300px;" name="Nama_Kerabat3" class="form-control" placeholder="Masukkan Nama Kerabat">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Tanggal Lahir</label>
											<input type="date" style="max-width: 300px;" name="Tl_Kerabat3" class="form-control" placeholder="Masukkan Tgl Lahir">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Jenis Kelamin</label>
											<select name="Kelamin_Kerabat3" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Laki-Laki</option>
										        <option value="2">Perempuan</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Unit Kerja</label>
											<input type="text" style="max-width: 300px;" name="Unit_Kerabat3" class="form-control" placeholder="Masukkan Unit Kerja">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Job Title</label>
											<input type="text" style="max-width: 300px;" name="Title_Kerabat3" class="form-control" placeholder="Masukkan Job Title">
										</div>
								    </div>
								    <div class="col-md-6">
								    	<div class="form-group">
											<label for="Ktp">Hubungan Kekerabatan</label>
											<select name="Hubungan_Kerabat3" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Paman/Bibi</option>
										        <option value="2">Keponakan</option>
										    </select>
										</div>
								    </div>
								  </div>

								  <div role="tabpanel" class="tab-pane" id="PengalamanKerja">
								    <P style="color:red;text-decoration: bold;"><i>Jika pernah bekerja lebih dari 1 perusahaan, sebutkan dari perusahaan terakhir tempat Anda bekerja</i></P>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Nama Perusahaan</label>
											<input type="text" style="max-width: 300px;" name="Nama_Perusahaan1" class="form-control" placeholder="Masukkan Nama Perusahaan">
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jenis Perusahaan</label>
											<select name="Jenis_Perusahaan1" class="form-control" style="max-width: 300px;">
										        <option value="">--Pilih--</option>
										        <option value="1">BUMN</option>
										        <option value="2">SWASTA</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Bidang Perusahaan</label>
											<input type="text" style="max-width: 300px;" name="Bidang_Perusahaan1" class="form-control" placeholder="Masukkan Bidang Perusahaan">
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jumlah Kantor Cabang</label>
											<input type="text" style="max-width: 300px;" name="Cabang_Perusahaan1" class="form-control" placeholder="Masukkan Jumlah Cabang Perusahaan">
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jumlah Karyawan</label>
											<input type="text" style="max-width: 300px;" name="Karyawan_Perusahaan1" class="form-control" placeholder="Masukkan Jumlah Karyawan Perusahaan">
								    		<P style="color:red;text-decoration: bold;"><i>Tuliskan jenis bidang/jasa perusahaan tempat Anda bekerja</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="col-md-12">
								    		<label for="Ktp">Periode Kerja</label>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Bulan
												<select name="Dari_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Tahun
												<select name="Dari_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Bulan
												<select name="Sampai_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Tahun
												<select name="Sampai_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
								    	<P style="color:red;text-decoration: bold;"><i>Mohon isikan periode kerja Anda pada kolom yang disediakan di atas, misal: Dari Bulan `01` Tahun `2012` – Sampai Bulan `07` Tahun `2013`</i></P>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jabatan/Posisi Awal Periode</label>
											<input type="text" style="max-width: 300px;" name="Jabatan_Awal1" class="form-control" placeholder="Jabatan Awal">
											<P style="color:red;text-decoration: bold;"><i>Tuliskan Jabatan/Posisi pada awal masa kerja Anda di Perusahaan terkait</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jabatan/Posisi Akhir Periode</label>
											<input type="text" style="max-width: 300px;" name="Jabatan_Akhir1" class="form-control" placeholder="Jabatan Awal">
											<P style="color:red;text-decoration: bold;"><i>Tuliskan Jabatan/Posisi pada akhir masa kerja Anda di Perusahaan terkait</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Gaji</label>
											<input type="text" style="max-width: 300px;" name="Gaji1" class="form-control" placeholder="Gaji Rupiah">
											<P style="color:red;text-decoration: bold;"><i>Dalam Rupiah</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Uraian Jabatan</label>
											<textarea class="form-control" name="Uraian_Jabatan1"></textarea>
											<P style="color:red;text-decoration: bold;"><i>Deskripsikan secara lengkap uraian pekerjaan Anda (Maks. 4000 Karakter)</i></P>
										</div>
								    </div>
								    <div class="col-md-12"><hr></div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Nama Perusahaan</label>
											<input type="text" style="max-width: 300px;" name="Nama_Perusahaan2" class="form-control" placeholder="Masukkan Nama Perusahaan">
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jenis Perusahaan</label>
											<select name="Jenis_Perusahaan2" class="form-control" style="max-width: 300px;">
										        <option value="">--Pilih--</option>
										        <option value="1">BUMN</option>
										        <option value="2">SWASTA</option>
										    </select>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Bidang Perusahaan</label>
											<input type="text" style="max-width: 300px;" name="Bidang_Perusahaan2" class="form-control" placeholder="Masukkan Bidang Perusahaan">
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jumlah Kantor Cabang</label>
											<input type="text" style="max-width: 300px;" name="Cabang_Perusahaan2" class="form-control" placeholder="Masukkan Jumlah Cabang Perusahaan">
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jumlah Karyawan</label>
											<input type="text" style="max-width: 300px;" name="Karyawan_Perusahaan2" class="form-control" placeholder="Masukkan Jumlah Karyawan Perusahaan">
								    		<P style="color:red;text-decoration: bold;"><i>Tuliskan jenis bidang/jasa perusahaan tempat Anda bekerja</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="col-md-12">
								    		<label for="Ktp">Periode Kerja</label>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Bulan
												<select name="Dari_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Dari Tahun
												<select name="Dari_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">A</option>
										        <option value="2">B</option>
										        <option value="3">C</option>
										        <option value="4">Belum Terakreditasi</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Bulan
												<select name="Sampai_Bulan" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
								    	<div class="col-md-3">
								    		<div class="form-inline">
												<p>Sampai Tahun
												<select name="Sampai_Tahun" class="form-control" style="width: 50%;">
										        <option value="">--Pilih--</option>
										        <option value="1">Lulus</option>
										        <option value="2">Belum Lulus</option>
										       	</select></p>
											</div>
								    	</div>
								    	<P style="color:red;text-decoration: bold;"><i>Mohon isikan periode kerja Anda pada kolom yang disediakan di atas, misal: Dari Bulan `01` Tahun `2012` – Sampai Bulan `07` Tahun `2013`</i></P>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jabatan/Posisi Awal Periode</label>
											<input type="text" style="max-width: 300px;" name="Jabatan_Awal2" class="form-control" placeholder="Jabatan Awal">
											<P style="color:red;text-decoration: bold;"><i>Tuliskan Jabatan/Posisi pada awal masa kerja Anda di Perusahaan terkait</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Jabatan/Posisi Akhir Periode</label>
											<input type="text" style="max-width: 300px;" name="Jabatan_Akhir2" class="form-control" placeholder="Jabatan Awal">
											<P style="color:red;text-decoration: bold;"><i>Tuliskan Jabatan/Posisi pada akhir masa kerja Anda di Perusahaan terkait</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Gaji</label>
											<input type="text" style="max-width: 300px;" name="Gaji2" class="form-control" placeholder="Gaji Rupiah">
											<P style="color:red;text-decoration: bold;"><i>Dalam Rupiah</i></P>
										</div>
								    </div>
								    <div class="col-md-12">
								    	<div class="form-group">
											<label for="Ktp">Uraian Jabatan</label>
											<textarea class="form-control" name="Uraian_Jabatan2"></textarea>
											<P style="color:red;text-decoration: bold;"><i>Deskripsikan secara lengkap uraian pekerjaan Anda (Maks. 4000 Karakter)</i></P>
										</div>
								    </div>
								  </div>

								  <div role="tabpanel" class="tab-pane" id="UploadFile">
								    <h3 class="">Upload CV/Sertifikat/Ijazah</h3>
								    <div class="col-md-4">
								    	<div class="form-group">
											<label for="Ktp">Upload CV</label>
											<input type="file" name="Foto_Profil_S" required>
										</div>	
										<div class="form-group">
											<label for="Ktp">Upload Ijazah</label>
											<input type="file" name="Foto_Profil_S" required>
										</div>
										<div class="form-group">
											<label for="Ktp">Upload Sertifikat</label>
											<input type="file" name="Foto_Profil_S" required>
										</div>	
										<div class="form-group">
											<label for="Ktp">Upload File Pendukung</label>
											<input type="file" name="Foto_Profil_S" required>
										</div>	
								    </div>
								    <div class="col-md-8">

								    </div>
								  </div>
							</div>
						</div>
						<!--<button type="submit" class="btn btn-default" style="background-color:#FC8228;color:white;width:100%;">Simpan</button>-->
					</div>



	  <input type=submit value=Simpan  class="btn btn-info">
	  <input type=button value=Batal  class="btn btn-warning" onclick=self.history.back()>
					</form>";
				</div>
			</div>
		</div>
	</div>
	<?php
	break;
	
	case "hapus":
	
	break;
	
	}
}	
?>	