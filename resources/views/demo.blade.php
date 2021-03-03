<html>
<head>
  <title></title>
</head>
<body>
<style type="text/css">*
{
  border: 0;
  box-sizing: content-box;
  color: inherit;
  font-family: inherit;
  font-size: inherit;
  font-style: inherit;
  font-weight: inherit;
  line-height: inherit;
  list-style: none;
  margin: 0;
  text-decoration: none;
}

h3{
font-size:16px;
font-weight:bold;
}


body{
width:100%;
height:100%;
}

body,td,th {
font-family: Arial;
font-size: 12px;
}


.table-invoice { 
font-size: 85%;
table-layout: fixed;
border-collapse: collapse;
width:100%;
}

.border{
border-right: 1px solid #d9e8ed ;
}

.table-invoice td {
padding:7px 4px;
border-bottom: 1px solid #d9e8ed;
}

.table-invoice th {
  background:#eef2f3;
  font-weight:bold;
  height:30px;
  vertical-align:middle;
}
.invoice-content{
border:1px solid #d9e8ed;
margin:5px 10px;
min-height:100px;
display:inline-block;
}

.monto-letras{
font-weight:bold;
padding:10px;
padding-top:20px;
background: #eef2f3;
}

.table-total{
font-size: 85%;
table-layout: fixed;
border-collapse: collapse;
width:100%;
}

.table-total td {
padding:5px 5px;
border-bottom: 1px solid #d9e8ed;
}

.content-total{
margin:0px 10px;  
}
.bold,b{
  font-weight:bold;
}
.header{
margin:10px;    
}

.col{
min-height:30px;
width: 46%;
float:left;
padding:10px;
margin-top:5px;
}

.mayu{
text-transform:uppercase;
}
.table-invoice .pad{
padding:5px 30px 5px 10px !important;
}

.text{
color:#565656;
line-height:inherit;
}
.footer
{
position: fixed;
bottom: 0cm;
left: 0cm;
right: 0cm;
height: 1cm;
color: #777;
text-align: center;
line-height: 35px;
border-top: 1px solid #aaa;
font-size:10px;
}
p{
margin: 0px;
margin-bottom: 2px;
}
</style>
<div class="header">&nbsp;
<table autosize="2" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #d9e8ed;" width="100%">
  <tbody><tr><td align="left" valign="middle" width="60%"><img src="{{ public_path('storage/logofactura.png') }}" style="width:auto;max-height:70px" /></td><td style="padding-right:5px;" width="50%">
    <table border="0" width="100%" style="color:#000F">
      <tbody><tr><td align="right">
        <h3>RECIBO #0000000{{$pagos->id}}</h3>
        </td></tr><tr><td align="right">Fecha Creación: <b>{{$pagos->mensualidad->created_at->format('d-m-Y')}}</b></td></tr><tr><td align="right" >Impresi&oacute;n&nbsp;<b>{{$pagos->created_at->format('d-m-Y')}}</b></td></tr>
      </tbody>
    </table>
    </td></tr>
  </tbody>
</table>
<div class="col border"><p style="color:#000F;font-weight: bold;">De</p>

<p class="text mayu">TIFANET</p>

<p class="text">Cesar Vallejo C - 8</p>

<p class="text">Tel&eacute;fono 960273446</p>
</div>
<div class="col"><p style="color:#000F;font-weight: bold;">Para</p>

<p class="text mayu">{{ $pagos->cliente->nombre }}</p>

<p class="text">{{ $pagos->cliente->direccion }}</p>

<p class="text">Tel&eacute;fono {{ $pagos->cliente->telefono }}</p>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<div class="invoice-content">
<table autosize="2" class="table-invoice" style="color:#000F">
  <thead ><tr>
    <th>Descripci&oacute;n</th>
    <th align="right" width="100px">Precio</th>
    </tr>
  </thead>
  <tbody><tr><td>Servicio de Internet <b>({{$pagos->mensualidad->mes}})</b></td><td align="right">S/ {{ $pagos->cliente->precio}}.00</td></tr>
  </tbody>
</table>
<div class="content-total">
<table autosize="2.4" class="table-total" style="color:#000F">
  <tbody><tr><td align="center" rowspan="5">
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
    </td><td align="right" class="bold" width="120px">TOTAL : S/ {{ $pagos->cliente->precio}}.00</td></tr>
  </tbody>
</table>
</div>
<div class="footer">DOCUMENTO VALIDO PARA PRESENTAR CUALQUIER RECLAMO</div>
</body>
</html>
