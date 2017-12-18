/*
Cuma dipake untuk ngetest aja
*/
<?php
require ("lib/lib-function.php");
$fungsi = new Fungsi();
if($fungsi->checkDB())
	echo "ada";
else
	echo "ga ada";
//echo $fungsi->KwNums();
//$fungsi->insertData(60000,'Sartono','Si Udin','Beli Mobil');
//echo $fungsi->searchData('beli');

/*echo $fungsi->tambahNol(7);*/
			?>
