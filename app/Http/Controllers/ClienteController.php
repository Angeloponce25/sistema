<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cliente;
use App\Pago;
use App\Mensualidad;
use Carbon\Carbon;
use DB;
/***MAIL*/
use App\Mail\EnvioMailable;
use Illuminate\Support\Facades\Mail;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes',compact('clientes'));
    }

    public function all(Request $request)
    {
        $clientes = Cliente::All();
        return response(json_encode($clientes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        //MAPA$config = array();
        $config['center'] = '-17.021696, -72.002026';
        $config['zoom'] = 17;
        $config['disableDoubleClickZoom'] = true;
        $config['scrollwheel'] = false;
        $config['map_type'] = 'SATELLITE';
        $config['disableMapTypeControl'] = true;
        $config['disableStreetViewControl'] = true;
        
        
        app('map')->initialize($config);

        $marker = array();
        $marker['position'] = '-17.021696, -72.002026';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'document.getElementById("latitud").value = event.latLng.lat () ; document.getElementById("longitud").value = event.latLng.lng ();';               
        app('map')->add_marker($marker);

        $map = app('map')->create_map();        

        return view('clienteagregar',compact(array('map'))); 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha = Carbon::now();
        $mes = $meses[($fecha->format('n')) - 1];

        $fecha_email= $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'telefono' => 'required',            
            'precio' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
        ]);
        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

       //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //movemos la foto a la carpeta fotos de public/fotos
        $file->move(public_path('fotos'), $nombre);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->precio = $request->precio;
        $cliente->latitud = $request->latitud;
        $cliente->longitud = $request->longitud;
        $cliente->avatar = $nombre;
        $cliente->save();

        $year = Carbon::now()->format('Y'); 
        $data = Cliente::latest('id')->first();
        $mensualidad = new Mensualidad();
        $mensualidad->cliente_id = $data['id'];
        $mensualidad->monto = $data['precio'];
        $mensualidad->mes = $mes;
        $mensualidad->ano = $year;
        $mensualidad->pagada = '0';  
        $mensualidad->save();

        $msg   = ['nombre' => $request->nombre , 'email' => $request->email , 'telefono' => $request->telefono , 'direccion' => $request->direccion , 'fecha'  => $fecha_email ];
        $correo = new EnvioMailable($msg);
        $usuario = Auth::user()->email;
        Mail::to($usuario)->cc($request->email)->send($correo);

        return back()->with('mensaje', 'Cliente Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                  
        $clientes = Cliente::findOrFail($id);        
        //MAPA$config = array();
        $config['center'] = $clientes->latitud.','.$clientes->longitud;
        $config['zoom'] = 16;
        $config['disableDoubleClickZoom'] = true;
        $config['scrollwheel'] = false;
        $config['map_type'] = 'SATELLITE';
        $config['disableMapTypeControl'] = true;
        $config['disableStreetViewControl'] = true;
        
        
        app('map')->initialize($config);
        //COLOCAMOS MARCADOR PRINCIPAL TORRE
        $marker = array();
        $marker['position'] = '-17.021696, -72.002026';        
        $marker['icon'] = 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=0.9|0|008F39|11|b|TIFANET';
        app('map')->add_marker($marker);

        $marker = array();
        $marker['position'] = $clientes->latitud.','.$clientes->longitud;
        $marker['infowindow_content'] = $clientes->nombre;                     
        app('map')->add_marker($marker);

        $map = app('map')->create_map();
        $pagos = Pago::where('cliente_id', $id)->get();
        return view('clientedetalle', compact(array('clientes', 'pagos','map')));
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
        DB::table('pagos')->where('cliente_id', $id)->delete();
        DB::table('mensualidads')->where('cliente_id', $id)->delete();
        $archivoEliminar = Cliente::findOrFail($id);
        $archivoEliminar->delete();
        return back()->with('mensaje', 'Cliente Eliminado');
    }
    public function activar($id)
    {        
        $cliente_activar = Cliente::findOrFail($id);
        if($cliente_activar->activo > 0)
        {
            $cliente_activar->activo = '0';
            $cliente_activar->save();        
            return back()->with('mensaje', 'Cliente Desactivado');        
        }
        else
        {
            $cliente_activar->activo = '1';
            $cliente_activar->save();        
            return back()->with('mensaje', 'Cliente Activado');        
        }
        
    }
}
