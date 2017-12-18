<?php
require ("lib/fpdf/fpdf.php");
require("lib/lib-function.php");
Class Kwitansi extends FPDF
{
	/*Format Kwitansi Sederhana oleh : Syahrul Ramdhan*/
	var $tanggal,$kwnums,$admins,$notevalid,$headerCo,$headerAddr,$headerTel;
	/* Header Kwitansi */
	function Header(){
		    // Logo
			    $this->Image('Logo-line.png',103,6,23);
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Move to the right
    // Title
    $this->Cell(45,10,'KUITANSI',0,0,'C');

    // Line break
    $this->Ln(0);
		$this->SetFont('Arial','B',12);
		$this->Cell(197,7,$this->headerCo,0,1,'R');
		$this->SetFont('Arial','B',11);
		$this->Cell(174,7,$this->headerAddr,0,1,'R');
		$this->Cell(147,7,$this->headerTel,0,0,'R');

		$this->SetFillColor(95, 95, 95);
		$this->Rect(5, 29, 198, 3, 'FD');
	}
	/* Footer Kwitansi*/
	function Footer(){
		$this->SetY(-60);
		$this->SetFont('Courier','',12);
		$this->Cell(130);
		$this->Cell(0,6,'Bandung, '.$this->tanggal,0,1,'C');
		$this->Ln(27);
		$this->Cell(130);
		$this->SetFont('Courier','B',12);
		$this->Cell(0,6,$this->admins,0,1,'C');
		$this->Ln(4);
		$this->SetFont('Arial','I',10);
		$this->Cell(0,6,$this->notevalid,0,1,'L');
		$this->Ln(0);
		$this->SetFont('Arial','I',10);
		$this->Cell(81,6,'sebelum surat-surat berharga tersebut diuangkan.',0,1,'R');
	}
	function setHeaderParam($pt,$jl,$tel){
		$this->headerCo=$pt;
		$this->headerAddr=$jl;
		$this->headerTel=$tel;
		}
	function setTanggal($tgl){$this->tanggal=$tgl;}
	function setAdmins($admins){$this->admins=$admins;}
	function setKwtNums($kwnums){$this->kwnums=$kwnums;}
	function setValidasi($word){$this->notevalid=$word;}
}
/*Deklarasi variable untuk cetak*/
$pt='PT. Trimitra Garmedindo Interbuana';
$jl='Jl. Cijeruk No. 17 Lembang';
$tel='022-2787555';
$cash=$_POST['cash'];
$nokwt=$_POST['nokwt'];
$tanggl=$_POST['tanggl'];
$pembayar=$_POST['payee'];
$admins=$_POST['pic'];
$payment=$_POST['remark'];
$notevalid='*Pembayaran dengan Cheque, Giro, belum dianggap lunas ';
/*parameter kertas*/
$pdf=new Kwitansi('L','mm','A5');
$fungsi=new Fungsi();
$tglCetak=$fungsi->Tanggal('tanggl').' '.$fungsi->Tanggal('blnL').' '.$fungsi->Tanggal('THN');

/* Retrieve No. Kwitansi*/
// $KwtNum = $fungsi->KwNums();

/*Persiapan Parameter*/
$pdf->setTanggal($tanggl);
$pdf->setAdmins($admins);
$pdf->setKwtNums($nokwt);
$pdf->setValidasi($notevalid);
$pdf->setHeaderParam($pt,$jl,$tel);
/* Bagian di mana inti dari kwitansi berada*/
$pdf->setMargins(5,5,5);
$pdf->AddPage();
$pdf->SetLineWidth(0.6);
$pdf->Cell(2);
$pdf->SetFont('Arial','',12);
$pdf->Cell(-131.5,8,'Nomor:',0,0,'R');
$pdf->SetFont('Courier','',14);
$pdf->Cell(16,8,$nokwt,0,1,'L');
$pdf->Ln(10);
$pdf->Cell(2);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(50,8,'Terima Dari',0,0,'L');
$pdf->Cell(5,8,': ',0,0,'L');
$pdf->SetFont('Courier','',14);
$pdf->Cell(16,8,$pembayar,0,1,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(2);
$pdf->Cell(50,8,'Uang Sejumlah',0,0,'L');
$pdf->Cell(5,8,': ',0,0,'L');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,'###'.$fungsi->Terbilang($cash).' RUPIAH ###',0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->SetY(-90);
$pdf->Cell(2);
$pdf->Cell(50,8,'Untuk Pembayaran',0,0,'L');
$pdf->Cell(5,8,': ',0,0,'L');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$payment,0,'L');
$pdf->SetY(-58);
$pdf->SetFont('Courier','B','16');
$pdf->Cell(60,12,'Rp. '.$fungsi->Ribuan($cash),1,0,'C');
$pdf->Output();
$fungsi->insertData($cash, $pembayar, $admins,$payment);
?>
