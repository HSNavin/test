<?php
require_once("../dompdf/dompdf_config.inc.php");
date_default_timezone_set('asia/kolkata');
$html =$_POST['html'];
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

?>