<?php

require __DIR__ . '/vendor/autoload.php';

use  Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
ob_start();
require_once 'lib/pdf/example2/index2.php';
$html = ob_get_clean();
$html2pdf = new Html2Pdf('p','A4','es','true','UTF-8');
$html2pdf->setDefaultFont('Arial');
$html2pdf->writeHTML($html);
$html2pdf->output();

 ?>
