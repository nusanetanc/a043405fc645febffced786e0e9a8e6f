<?php
$base_url="https://qrbarcode-nurhandiyudi.c9users.io";
session_start();
if(!isset($_SESSION['crdname_username'])){
  header('location:'.$base_url.'/login.php');
} else {
if(isset($_POST['submit-kartunama'])){
  include "phpqrcode-master/qrlib.php";
  QRcode::png("http://andalworks.com/emp/".$_POST['id-kartunama'],"./qrcode/".$_POST['id-kartunama'].".png","C", 5,5);
  require('./fpdf/fpdf.php');

if($_POST['cabang-kartunama']=="jakarta"){
  $baris1 = "Cyber Building, 7th Floor";
  $baris2 = "Jl. Kuningan Barat No. 8";
  $baris3 = "Jakarta 12710";
} else if ($_POST['cabang-kartunama']=="pekanbaru"){
  $baris1 = "Jl. Borobudur No. 14";
  $baris2 = "Pekanbaru 28116";
}

$pdf = new FPDF('L','mm',array(79.639583333,126.735416667));
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->Image('logo-nusanet.png','12.7','10.054166667','46.0375','10.847916667');
$pdf->Ln('1');
$pdf -> SetX(66.145833333);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(70,87,159);
$pdf->Cell(0,5,$_POST['name-kartunama'], '0', 1);
$pdf -> SetX(66.145833333);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(128,128,128);
$pdf->Cell(0,5,$_POST['jabatan-kartunama'], '0', 1);
$pdf->Ln('4');
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,'PT Media Andalan Nusa', '0', 1);
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,$baris1, '0', 1);
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,$baris2, '0', 1);
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,$baris3, '0', 1);
$pdf->Ln('4');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,$_POST['no_hp1-kartunama'], '0', 1);
if ($_POST['no_hp2-kartunama']<>"" || $_POST['no_hp2-kartunama']<>null){
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,$_POST['no_hp2-kartunama'], '0', 1);
}
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,$_POST['email-kartunama'], '0', 1);
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,'www.nusa.net.id', '0', 1);
$pdf -> SetX(66.145833333);
$pdf->Cell(0,5,$_POST['no_telp-kartunama'], '0', 0);
$pdf->Image('./qrcode/'.$_POST['id-kartunama'].'.png','10.054166667','48','23','23');
$pdf->Output();
}
if(isset($_POST['submit-idcard'])){
  include "phpqrcode-master/qrlib.php";
  QRcode::png("http://andalworks.com/emp/".$_POST['id-idcard'],"./qrcode/".$_POST['id-idcard'].".png","C", 5,5);
  require('./fpdf/fpdf.php');

  $lokasifile= $_FILES['inputfoto']['tmp_name'];
	$dir = "foto-karyawan/";
  
    if($fileName=="" || $fileName==null){
			$move = move_uploaded_file($lokasifile, "$dir".$_POST['id-idcard'].'.png');
    }

$pdf = new FPDF('P','mm',array(92,148));
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->Image($_POST['brand-idcard'],'20','23','52','13');
$pdf->Ln('35');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,7,$_POST['name-idcard'], '0', 1, 'C');
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,7,$_POST['jabatan-idcard'], '0', 1, 'C');
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,12,$_POST['id-idcard'], '0', 1, 'C');
$pdf->Image('foto-karyawan/'.$_POST['id-idcard'].'.png','6','65','80','83');
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->Image('./qrcode/'.$_POST['id-idcard'].'.png','26','20','40','40');
$pdf->Image('foto-karyawan/'.$_POST['id-idcard'].'.png','6','65','80','83');
$pdf->Output();
}
?>
  <!DOCTYPE html>
  <html>
    <head>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
    </head>

    <body background="bg.jpg" style=" font-family: 'Architects Daughter', cursive;">
      <div class="container">
        <div class="col-sm-6">
          <div class="panel panel-default" style="margin-top: 2cm;">
            <div class="panel-body">
              <form method="post">
                <h3 style="color:#3072AB;font-size:36px;">KARTU NAMA</h3><br/>
                <input type="text" name="id-kartunama" class="form-control input-lg" placeholder="ID Karyawan"><br/>
                <input type="text" name="name-kartunama" class="form-control input-lg" placeholder="Nama Karyawan"><br>
                <input type="text" name="no_hp1-kartunama" class="form-control input-lg" placeholder="No Hp 1"><br/>
                <input type="text" name="no_hp2-kartunama" class="form-control input-lg" placeholder="No Hp 1"><br/>
                <input type="text" name="no_telp-kartunama" class="form-control input-lg" placeholder="No Tlp"><br/>
                <input type="text" name="jabatan-kartunama" class="form-control input-lg" placeholder="Jabatan"><br/>
                <input type="text" name="email-kartunama" class="form-control input-lg" placeholder="Email"><br/>
                <select name="cabang-kartunama" class="form-control input-lg">
                  <option disabled selected>Cabang</option>
                  <option value="jakarta">Jakarta</option>
                  <option value="pekanbaru">Pekanbaru</option>
                </select><br/>
                <input class="btn btn-primary btn-lg" name="submit-kartunama" id="submit-kartunama" type="submit" value="CREATE">
              </form> 
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-default" style="margin-top: 2cm;">
            <div class="panel-body">
              <form enctype="multipart/form-data" method="post">
                <h3 style="color:#3072AB; font-size:36px;">ID CARD</h3><br/>
                <input type="text" name="id-idcard" class="form-control input-lg" placeholder="ID Karyawan"><br/>
                <input type="text" name="name-idcard" class="form-control input-lg" placeholder="Nama Karyawan"><br>
                <input type="text" name="jabatan-idcard" class="form-control input-lg" placeholder="Jabatan"><br/>
                <input type="file" name="inputfoto" class="form-control input-lg"><br/>
                <select name="brand-idcard" class="form-control input-lg">
                  <option value="logo-nusanet.png">Nusanet</option>
                  <option value="logo-groovy.png">Groovy</option>
                </select><br/>
                <input class="btn btn-primary btn-lg" name="submit-idcard" id="submit-idcard" type="submit" value="CREATE">
              </form> 
             </div>
          </div>
        </div>
    </div>
    </body>
  </html>
<?php } ?>