<div class="col-md-3">
				<h2>Modul Cetak Kwitansi</h2>
			</div>
			<div class="col-md-6">

			<form name="form" method="POST" action="cetak-non-ppn.php" target="_blank">
			<table cellspacing="3" cellpadding="50">
			<tr><td>Tanggal</td><td><input type="text" name="tanggl" placeholder="Contoh: 15 November 2017" size="47"></td></tr>
			<tr><td>Nomor Kuitansi</td><td><input type="text" name="nokwt" placeholder="Nomor Kuitansi" size="47"></td></tr>
			<tr><td>Terima Dari :</td><td><input type="text" name="payee" placeholder="Nama Pembayar" size="47"></td></tr>
			<tr><td>Jumlah Uang :</td><td><input type="text" name="cash" placeholder="Nominal Uang (Rp)" size="47"></td></tr>
			<tr><td>Untuk Pembayaran :</td><td><textarea cols="50" rows="5" placeholder="Untuk pembayaran" name="remark"></textarea></td></tr>
			<tr><td>Admin :</td><td><input type="text" name="pic" placeholder="Nama Admin" size="47"></td></tr>


		

			</table>
		</br>
		</br>
		</br>
			<center>
				<a href="index.html" class="kembali btn btn-sm btn-primary">&laquo; Kembali</a>
				<input type="reset" class="btn btn-success btn-md" value="&laquo; reset">
				<input type="submit" class="btn btn-success btn-md" value="cetak &raquo;">	
			</center>
			</form>
			</div>

			