<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Document</title>
<style>
  /* NUEVOS AGREGADOS */
@page {
            margin: 5px 5px;
            font-family: Arial;
        }
.small, small {
    font-size: 1.5rem;
    font-weight: 400;
}
footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: #777;
            text-align: center;
            line-height: 35px;
            border-top: 1px solid #aaa;
            font-size:10px;
            
        }
  /* FIN DE NUEVOS AGREGADOS */
    </style>
    </head>
    <body>    
    <table width="100%">
    <tr>
        <!--<td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>-->
        <td align="left">
            <small>RECIBO TIFANET.</small>        
        </td>
        <td align="right">
            <small>01/01/2020</small>        
        </td>
    </tr>
  </table>
  <table width="100%" style="font-size: 12px;margin-bottom:10px ; text-align:left">
    <tr>
        <td colspan="2">PARA:</td>
        <td><b>RECIBO #0000{{$pagos->id}}</b></td>
    </tr>
    <tr>
        <td colspan="2"><strong>{{ $pagos->cliente->nombre }}</strong></td>
        <td><b> Cobrado por :</b> {{ $pagos->usuario->name}}</td>
    </tr>
    <tr>
        <td>{{ $pagos->cliente->direccion }}</td>
        <td></td>
        <td><b>Tel:</b> {{ $pagos->cliente->telefono }}</td>
    </tr>
  </table>

  <table style="margin-bottom: 1rem;color: #212529;background-color: transparent;border-collapse: collapse;text-align:left !important;" width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th style="padding: .75rem;vertical-align: top; border-top: 1px solid #dee2e6;">#</th>
        <th>Descripcion</th>
        <th></th>
        <th></th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Servicio de Internet</td>
        <td align="right"></td>
        <td align="right"></td>
        <td align="right">S/ {{ $pagos->cliente->precio}}.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total</td>
            <td align="right" style="margin-top:5px;vertical-align: top; border-top: 1px solid #dee2e6;">S/ {{ $pagos->cliente->precio}}.00</td>
        </tr>        
    </tfoot>
  </table>
  <center>
            <strong>METODOS DE PAGO</strong>
  </center>
  <table width="100%" style="font-size: 12px;">
        <tr>            
            <td>
              Loren Llacma Arapa
            </td>           
            <td>
              923732984              
            </td>
            <td >
              <img src="{{ public_path('storage/credit/yape-234x300.png') }}" alt="YAPE" width="62" height="50">
            </td>
        </tr>
        <tr>
            <td>
              Loren Llacma Arapa
            </td>           
            <td>
              42537386437085             
            </td>
            <td >
              <img src="{{ public_path('storage/credit/logo-ica-bcp.jpg') }}" alt="BCP" width="62" height="50">
            </td>
        </tr>
        <tr>
            <td>
              Angelo Huancapaza Ponce
            </td>           
            <td>
              7940272649             
            </td>
            <td >
              <img src="{{ public_path('storage/credit/scotia-logo.png') }}" alt="SCOTIABANK" width="62" height="50">
            </td>
        </tr>

  </table>

        <footer>
            DOCUMENTO VALIDO PARA PRESENTAR CUALQUIER RECLAMO
        </footer>
    </div>
    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    <div></div>
</div>
</div>

    </body>
</html>