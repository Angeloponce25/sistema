<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pago;
use App\Mensualidad;
use App\Cliente;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\ComprobanteMailable;
use Illuminate\Support\Facades\Mail;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*ESTE COMANDO SIRVE PARA QUE SOLO LOS USUARIOS QUE COINCIDAN CON EL CORREO PUEDAN VER , COMO UN FILTRO
        /*$usuarioEmail = auth()->user()->email;
        $notas = Nota::where('usuario', $usuarioEmail)->paginate(5);
        return view('notas.lista',compact('notas')); */
        
        $clientes = Cliente::all();
        $pagos = Pago::all();
        $mensualidad = Mensualidad::all();
        return view('pagos',compact(array('clientes', 'pagos')));
    }

    public function store(Request $request)
    {          
        $mensualidad = Mensualidad::findOrFail($request->mensualidad_id);        

        $pago = new Pago();
        $pago->cliente_id = $mensualidad->cliente_id;
        $pago->mensualidad_id = $request->mensualidad_id;
        $pago->detalle = $request->detalle;
        $pago->usuario_id = Auth::user()->id;
        $pago->save();
        
        $mensualidad->pagada = '1';
        $mensualidad->monto = $request->monto;
        $mensualidad->save();

        $ultimo_id = $pago->id;
        $f_creacion= $mensualidad->created_at->format('d/m/Y');
        $f_impresion= $pago->created_at->format('d/m/Y');

        $pagos = Pago::findOrFail($ultimo_id);
        $pdf = PDF::loadview('demo', compact(array('pagos')))->setPaper('a5', 'landscape');
        $pdf->save('recibo'.$ultimo_id.'.pdf');

        $msg   = ['nombre' => $mensualidad->cliente->nombre , 'email' => $mensualidad->cliente->email , 'mes' => $mensualidad->mes,'ano' => $mensualidad->ano , 'monto' => $mensualidad->monto, 'id_pago' => $pago->id , 'f_creacion' => $f_creacion , 'f_impresion' => $f_impresion];
        $correo = new ComprobanteMailable($msg);
        $usuario = Auth::user()->email;
        Mail::to($usuario)
            ->cc($mensualidad->cliente->email)            
            ->send($correo);

        return redirect("previa/".$ultimo_id);

    }
    
    public function show($id)
    {
        $pagos = Pago::findOrFail($id);
        $mensualidad_id = $pagos->mensualidad_id;
        $mensualidad = Mensualidad::findOrFail($mensualidad_id);
        return view('pagoprevia', compact(array('pagos','mensualidad')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notaEliminar = Pago::findOrFail($id);
        $mensualidad_id = $notaEliminar->mensualidad_id;
        $mensualidad = Mensualidad::findOrFail($mensualidad_id);
        $notaEliminar->delete();
        $mensualidad->delete();

        return back()->with('mensaje', 'Pago Eliminado');
    }
}
