<?php
define('MODULE_PATH',__DIR__.'/');
define('FPDF_FONTPATH',MODULE_PATH.'fpdf/font/');

require(MODULE_PATH.'fpdf/fpdf.php');
require_once(MODULE_PATH.'/fpdf/barcode.php');
require_once(MODULE_PATH.'/fpdf/qrcode.php');

$msg = '爱国123456-//ssssWD';
$err = isset($_GET['err']) ? $_GET['err'] : '';
if (!in_array($err, array('L', 'M', 'Q', 'H'))) $err = 'L';
$fpdf = new tFPDF('P', 'mm', 'A4');//创建新的FPDF对象，竖向放纸，单位为毫米，纸张大小A4
$fpdf->AddFont('DejaVu','','simfang.ttf',true);
$fpdf->SetFont('DejaVu','',14);
$fpdf->AddPage();


$fpdf->text(10,8,$msg);


$Qrcode = new PdfQrcode($msg);
$Barcode = new Barcode();
$Barcode->setBarcodeString('5535555555545');
$Barcode->GenerateBarcode($fpdf,10, 10, '', 15, 0.7,12);

$Barcode->setBarcodeString('5535555555545');
$Barcode->GenerateBarcode($fpdf,10, 60, '', 12, 0.6,10);
$Qrcode->setBarcodeString('少时诵诗书');
$Qrcode->GenerateQrcode($fpdf,10,120,30);

$fpdf->Output();
exit;

