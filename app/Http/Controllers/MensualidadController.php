<?php

namespace App\Http\Controllers;

use App\Mensualidad;
use Carbon\Carbon;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;

class MensualidadController extends Controller
{
    public function index()
    {
    	$mensualidad = Mensualidad::where('pagada', 0)->get();
        return view("mensualidad_index",compact('mensualidad'));
    }
    public function all()
    {
        $year = Carbon::now()->format('Y');
        $array_principal = array();
        $array_pagado = array();                
        $array_deben = array();                        
        $months = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio.', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');   
        for($i = 1;$i<=count($months);$i++)
        {
            $contador = Mensualidad::where('pagada', 1)->where('mes', $months[$i])->where('ano', $year)->count();
            $array_pagado[] = array( 'mes' => $contador); 

        }
        for($i = 1;$i<=count($months);$i++)
        {
            $contador = Mensualidad::where('pagada', 0)->where('mes', $months[$i])->where('ano', $year)->count();
            $array_deben[] = array( 'mes' => $contador); 

        }

        $array_principal['pagado'] = $array_pagado;
        $array_principal['deben'] = $array_deben;

        return response(json_encode($array_principal));
    }
    public function mes()
    {
    	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$fecha = Carbon::now();
		$mes = $meses[($fecha->format('n')) - 1];
		return $mes;
	}
    public function show($id)
    {
        $mensualidad = Mensualidad::findOrFail($id);
        return view("mensualidad.mensualidad_show",compact('mensualidad'));
    }
    public function cobrar(Request $request)
    {
        $mensualidadActualizada = Mensualidad::find($request->id);
        $mensualidadActualizada->monto = $request->monto;
        $mensualidadActualizada->pagada = '1';
        $mensualidadActualizada->save();
        return view('mensualidad.previa',compact('mensualidadActualizada'));
    }
    public function adelantar()
    {
        $clientes = Cliente::where('activo', 1)->get(); 
        return view("adelantar",compact('clientes'));
    }
    public function enviar(Request $request)
    {     
        $year = Carbon::now()->format('Y');
        $cliente = Cliente::findOrFail($request->cliente_id);
        foreach ($request['mes'] as $llave ) {
            if (Mensualidad::where('cliente_id', $request->cliente_id)->where('mes', $llave)->where('ano', $year)->exists()) {

                echo "Existe";
            }
            else
            {
                $mensualidad = new Mensualidad();
                $mensualidad->cliente_id = $request->cliente_id;
                $mensualidad->monto = $cliente['precio'];
                $mensualidad->mes = $llave;
                $mensualidad->ano = $year;
                $mensualidad->pagada = '0';  
                $mensualidad->save();
            }
        }
        return back()->with('mensaje', 'Mensualidad de : '.$cliente['nombre'] .' Adelantada');
    }
    public function crear(Request $request)
    {
        $year = Carbon::now()->format('Y');
        $mensualidad = Mensualidad::where('mes', $request->cliente_id)->where('ano', $year)->get();
        $clientes = Cliente::where('activo', 1)->get();                            
        $array_mensualidades = array();
        $array_clientes = array(); 
        foreach($mensualidad as $c)
                {
                    array_push($array_mensualidades,$c->cliente_id);
                }
        foreach($clientes as $c)
                {
                    array_push($array_clientes,$c->id);
                }
        $resultado = array_diff($array_clientes, $array_mensualidades);
        $test =  array_values($resultado);
        foreach($test as $corre)
                {
                    $todos= Cliente::where('id', $corre)->select('id','precio')->get();

                    $id =$todos[0]['id'];
                    $precio =$todos[0]['precio'];

                    $mensualidad = new Mensualidad();
                    $mensualidad->cliente_id = $id;
                    $mensualidad->monto = $precio;
                    $mensualidad->mes = $request->cliente_id;
                    $mensualidad->ano = $year;
                    $mensualidad->pagada = '0';  
                    $mensualidad->save();
                }
        return back()->with('mensaje', 'Mensualidad de : '.$request->cliente_id .' Creada');
    }     
}
