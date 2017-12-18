<!-- Modul Arsip dan Pencarian -->
<div class="col-md-3">
				<h2>Arsip Kwitansi</h2>
			</div>
			<div class="col-md-8">
			<center>
			<input type="search" size="80" onKeyUp="javascript:cariArsip(this.value);" placeholder="Pencarian Arsip Memo Berdasarkan No. Memo atau Tanggal" >
			</center>
			<div class="col-md-12">
				<br>
			<table cellspacing="15" >
				<tr><th>No. Memo</th><th>Nominal</th><th>Pembayar</th><th>Tanggal</th><th>Untuk Pembayaran</th></tr>
			</table class="arsip-hover">
				<div class="kotak box-arsip">
				<?php
				/*Load arsip di sini */
				require('lib/lib-function.php');
				$fungsi = new Fungsi();
				$fungsi->fetchData('','tab');
				?>
				</div>
			</div>
			</div>
			<div class="col-md-1">
				<ul>
					<li><a href="index.html" class="kembali btn btn-sm btn-primary">&laquo; Kembali</a></li>
				</ul>
			</div>
			<script type="text/javascript">
			function cariArsip(q){
				$('.box-arsip').text('Loading...');
				$('.box-arsip').load('search.php?q='+q);
			}
			</script>