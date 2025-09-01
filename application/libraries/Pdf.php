<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH.'third_party/tcpdf/tcpdf.php';


class Pdf extends TCPDF {
public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8')
{
parent::__construct($orientation, $unit, $format, $unicode, $encoding, false);
$this->SetCreator('CodeIgniter 3');
$this->SetAuthor('COF App');
$this->setPrintHeader(false); // nonaktif header default TCPDF
$this->setPrintFooter(false); // nonaktif footer default TCPDF
$this->SetMargins(10, 10, 10);
$this->SetAutoPageBreak(true, 10);
$this->SetFont('dejavusans', '', 9); // font bawaan TCPDF, aman untuk UTF-8
}
}