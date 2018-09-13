<?php 
include "../../koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];


if($module=='pendaftar' AND $act=='input' ){
	mysqli_query($conn, "INSERT INTO `tbl_profil` (`nama_lengkap`, `jenis_kelamin`, `ttl_pendaftar`, `kewarganegaraan`, `suku`, `agama`, `status_perkawinan`, `tempat_tgl_perkawinan`, `nomor_identitas`, `tanggal_identitas`, `penerbit_identitas`, `alamat_ktp`, `kelurahan_ktp`, `kecamatan_ktp`, `kabupaten_ktp`, `propinsi_ktp`, `kode_pos_ktp`, `telepon_ktp`, `alamat_sementara`, `kelurahan_sementara`, `kecamatan_sementara`, `kabupaten_sementara`, `propinsi_sementara`, `kode_pos_sementara`, `telepon_sementara`, `tinggi`, `berat`, `rambut`, `warna_rambut`, `bentuk_muka`, `warna_kulit`, `ciri_khas`, `cacat_tubuh`, `hobi`) VALUES ('$_POST[nama_lengkap]', '$_POST[jenis_kelamin]', '$_POST[ttl_pendaftar]', '$_POST[kewarganegaraan]', '$_POST[suku]', '$_POST[agama]', '$_POST[status_perkawinan]', '$_POST[tempat_tgl_perkawinan]', '$_POST[nomor_identitas]', '$_POST[tanggal_identitas]', '$_POST[penerbit_identitas]', '$_POST[alamat_ktp]', '$_POST[kelurahan_ktp]', '$_POST[kecamatan_ktp]', '$_POST[kabupaten_ktp]', '$_POST[propinsi_ktp]', '$_POST[kode_pos_ktp]', '$_POST[telepon_ktp]', '$_POST[alamat_sementara]', '$_POST[kelurahan_sementara]', '$_POST[kecamatan_sementara]', '$_POST[kabupaten_sementara]', '$_POST[propinsi_sementara]', '$_POST[kode_pos_sementara]', '$_POST[telepon_sementara]', '$_POST[tinggi]', '$_POST[berat]', '$_POST[rambut]', '$_POST[warna_rambut]', '$_POST[bentuk_muka]', '$_POST[warna_kulit]', '$_POST[ciri_khas]', '$_POST[cacat_tubuh]', '$_POST[hobi]')");
		
		header('location:../../tampil.php?module='.$module);
}

elseif($module=='pendaftar' AND $act=='edit' ){
	mysqli_query($conn,"UPDATE tbl_profil SET kode_mata_diklat='$_POST[mata_diklat_kode]',
											Kompetensi_nama='$_POST[kompetensi_nama]'
											WHERE Kompetensi_kode='$_POST[Kompetensi_kode]'");
	header('location:../../tampil.php?module='.$module);
}

elseif($module=='pendaftar' AND $act=='hapus' ){
	$hapus=mysqli_query($conn, "Delete from tbl_profil WHERE no_pendaftar='$_GET[kode]'");
	header('location:../../tampil.php?module='.$module);
}


?>