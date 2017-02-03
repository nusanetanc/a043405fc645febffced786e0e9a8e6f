<?php
if(isset($_POST['submit'])){
  include "phpqrcode-master/qrlib.php";
  QRcode::png("http://andalworks/emp/".$_POST['id'],"./qrcode/".$_POST['id'].".png","C", 5,5);
  require('./fpdf/fpdf.php');

  $lokasifile= $_FILES['inputfoto']['tmp_name'];
	$dir = "foto-karyawan/";
  
    if($fileName=="" || $fileName==null){
			$move = move_uploaded_file($lokasifile, "$dir".$_POST['id'].'.png');
    }

$pdf = new FPDF('P','mm',array(92,148));
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->Image('logo-nusanet.png','20','23','52','13');
$pdf->Ln('35');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,7,$_POST['name'], '0', 1, 'C');
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,7,$_POST['jabatan'], '0', 1, 'C');
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,12,$_POST['id'], '0', 1, 'C');
$pdf->Image('foto-karyawan/'.$_POST['id'].'.png','6','65','80','83');
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->Image('./qrcode/'.$_POST['id'].'.png','26','20','40','40');
$pdf->Image('foto-karyawan/'.$_POST['id'].'.png','6','65','80','83');
$pdf->Output();
}
?>
<form enctype="multipart/form-data" method="post">
  id:<br>
  <input type="text" name="id">
  <br>
  name:<br>
  <input type="text" name="name">
  <br>
  jabatan:<br>
  <input type="text" name="jabatan">
  <br>
  foto:<br>
  <input type="file" name="inputfoto">
  <br><br>
  <input name="submit" id="submit" type="submit" value="Submit">
</form> 