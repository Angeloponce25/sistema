<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Pago;

class PDFController extends Controller
{
    //
    public function PDFgenerator ($id) {
        $pagos = Pago::findOrFail($id);
        $pdf = PDF::loadview('demo', compact(array('pagos')))->setPaper('a5', 'landscape');
        return $pdf->stream('recibo'.$id.'.pdf');
    }
}