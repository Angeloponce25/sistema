<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Pago;
use App\User;
use App\Mensualidad;

class MapaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //configuaración
        $config = array();
        $config['center'] = '-17.021696, -72.002026';
        $config['zoom'] = 17;
        $config['disableDoubleClickZoom'] = true;
        $config['scrollwheel'] = false;
        $config['map_type'] = 'SATELLITE';
        $config['disableMapTypeControl'] = true;
        $config['disableStreetViewControl'] = true;       


        /*$config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
 
            });
        }
        centreGot = true;';*/


        //CODIGO EN CASO DE MARCAR 2 PUNTOS
        /*$config['directions'] = TRUE;
        $config['directionsStart'] = '-17.021696, -72.002026';
        $config['directionsEnd'] = '-17.021429, -72.002544';
        $config['directionsDivID'] = 'directionsDiv';*/
 
        app('map')->initialize($config);
 
        // Colocar el marcador 
        // Una vez se conozca la posición del usuario

        //COLOCAMOS MARCADOR PRINCIPAL TORRE
        $marker = array();
        $marker['position'] = '-17.021696, -72.002026';        
        $marker['icon'] = 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=0.9|0|008F39|11|b|TIFANET';
        app('map')->add_marker($marker);

        $total_clientes = Cliente::where('activo', 1)->count();
        $total_pagos = Pago::all()->count();
        $total_desactivados = Cliente::where('activo', 0)->count();
        $total_deudas = Mensualidad::where('pagada', 0)->count();
        $clientes = Cliente::all();
        foreach ($clientes as $clientes) {
            $marker = array();
            $marker['position'] = $clientes->latitud.','.$clientes->longitud;
            $marker['infowindow_content'] = $clientes->nombre;
            $marker['icon'] = 'http://maps.google.com/mapfiles/kml/pal3/icon55.png';
            app('map')->add_marker($marker);
        }
 
        $map = app('map')->create_map();
 
        //Devolver vista con datos del mapa
        return view('home', compact(array('total_clientes','total_pagos','total_desactivados','total_deudas','map')));
    }
}
