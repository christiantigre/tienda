<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests;

class PdfController extends Controller
{
    public function pdf(){
    	$pdf = \PDF::loadView('pdf.vista');
  		return $pdf->download('archivo.pdf');
    }
}
