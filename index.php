#!/usr/local/bin/php
<?php
// mandatory utk php 4.5 and above
	date_default_timezone_set('Asia/Jakarta');

// userid & PIN BCA
	define('USERID','hahahaha0563');
	define('PASSWD','987654');

// penetapan tanggal from-to mutasi
	$from_date = date("Y-m-01");
	$to_date = date("Y-m-d");

// load Class
	include('bcaclass.php');
	$bca = new bankBCA;
	$bca->userid = USERID;
	$bca->password = PASSWD;

// ################ START ACTION ################# \\
echo "<pre>";
if($bca->login()){
	$mutasi = $bca->mutasi($from_date,$to_date);
	$bca->logout();

	if(count($mutasi)) print_r($mutasi);
	else echo "Hasil Check Mutasi Zero/Error";
} else {				// ERROR LOGIN
	echo "Error Login Internet Banking / Wait 10mnt";
}
echo "</pre>";
?>
