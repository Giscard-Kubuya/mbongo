<?php
class fpdf_test extends CI_Controller
  {

  	public function __construct(){
  		require_once APPPATH.'third_party/fpdf/fpdf.php';
  		//$pdf=new FPDF();
  		$pdf = new FPDF('P','mm','A4');//L:LANDASCAP oe P:PAYSAGE
  		$pdf->AddPage();
  		$CI=get_instance();
  		$CI->fpdf=$pdf;
  	}
  }

?>