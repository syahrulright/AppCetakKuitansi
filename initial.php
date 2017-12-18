<?php
require_once 'lib/lib-function.php';
$fungsi = new Fungsi();;
if(!$fungsi->checkDB()){
?>
<div class="col-md-3">
				<h2>Setup Aplikasi</h2>
</div><div class="col-md-6">
<div class="alert alert-warning"></div>
<p>Ini adalah kali pertama aplikasi dijalankan, penyetingan database diperlukan agar aplikasi bisa berjalan. Silakan klik tombol "Setup" untuk memulainya.</p>
<a href="javascript:setupDB();" class="btn btn-success">Setup</a>
</div>
<div class="col-md-3"></div>
<?php
}
else{
?>
<div class="main-row">
<div>
				<center><b><h2>Pilih Modul</h2></b></center>
			</div>
		</br>
		</br>
			<div class="col-md-6">
				<ul>
					<li><a href="javascript:cetak()" class="cetak btn tbl">Cetak Kuitansi &raquo;</a></li>
					<li><a href="http://192.168.2.81:82/kuitansi/nonppn" class="cetak btn tbl">Cetak Kuitansi Non PPN &raquo;</a></li>
					</br>
					</br>
					</br>
					<li><a href="javascript:arsip()" class="arsip btn tbl">Arsip Kuitansi &raquo;</a></li>
				</ul>
			</div>
<div class="col-md-3"></div>
</div>
<?php
}
?>
<script type="text/javascript">
function loading(){
		$('.main-row').text('Loading..');
	}
$('.alert').hide();
	function setupDB(){
		$('.alert').fadeIn(500);
		$('.alert').load('setinit.php');
	}
function cetak(){
		loading();
		$('.main-row').load('cetak-interface.php');
	}

function arsip(){
		loading();
		$('.main-row').load('arsip.php');
	}
</script>