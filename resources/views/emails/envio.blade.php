<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="background-color: #f6f6f6;-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;-webkit-text-size-adjust: none;width: 100% !important;height: 100%;line-height: 1.6;margin: 0; padding: 0;font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;box-sizing: border-box;font-size: 14px;">
<table class="body-wrap" style="background-color: #f6f6f6;width: 100%;">
	<tbody><tr><td>&nbsp;</td><td style="display: block !important; max-width: 600px !important;margin: 0 auto !important;clear: both !important;" width="600">
		<div style="max-width: 600px;margin: 0 auto;display: block;padding: 20px;">
		<table cellpadding="0" cellspacing="0" style=" background: #fff;border: 1px solid #e9e9e9;border-radius: 3px;" width="100%">
			<tbody><tr><td style="vertical-align: middle;font-size: 16px;color: #fff;font-weight: 500;padding: 15px;border-radius: 3px 3px 0 0;border-bottom: 1px solid #e9e9e9;"><img alt="Mostrar Logo" src="{{ asset('material') }}/img/logo-lgant.png" style="max-height:65px;" />
				<div style="width: auto;color: #348eda;font-weight: 600;float: right;margin: 10px auto;"><span style="font-size:14px;"><span style="color:#66cccc;">Bienvenido a {{ env('APP_NAME') }}</span></span></div>
				</td></tr><tr><td style="vertical-align: top;padding: 25px;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tbody><tr><td style="vertical-align: top;padding: 0px;">Estimado(a) &nbsp;<strong>{{$msg['nombre']}}</strong></td></tr><tr><td style="vertical-align: top;padding: 0 0 10px;">
						<p><span style="font-size:12px;">Perm&iacute;tame saludarlo(a) por este medio y de la misma forma agradecerle de manera muy especial&nbsp;su amable preferencia, en&nbsp;<strong>{{config('app.name')}}</strong>&nbsp;queremos brindarle la mejor de las atenciones y darle la&nbsp;mas cordial bienvenida a nuestros Servicios.&nbsp;</span></p>

						<p><span style="font-size:12px;">Para su comodidad enviamos un correo de confirmación de acceso al sistema como cliente nuestro.</span></p>

						<div style="width: 100%;border: 1px solid #348eda;border-radius: 5px;">
						<div style="width: 100%;text-align:center;background: #348eda;color: #FFF;font-weight: bold;border-radius: 3px 3px 0 0px;height: 25px;vertical-align: middle;">Datos de Cliente</div>

						<p style="line-height: 8px;margin-left: 20px;"><span style="font-size:12px;"><strong>Email:</strong> {{$msg['email']}}</span></p>						

						<p style="line-height: 8px;margin-left: 20px;"><span style="font-size:12px;"><strong>Telefono:</strong> {{$msg['telefono']}}</span></p>

						<p style="line-height: 8px;margin-left: 20px;"><span style="font-size:12px;"><strong>Direccion:</strong> {{$msg['direccion']}}</span></p>

						<p style="line-height: 8px;margin-left: 20px;"><span style="font-size:12px;"><strong>Fecha:</strong> {{$msg['fecha']}}</span></p>
						</div>
						</td></tr>
					</tbody>
				</table>
				</td></tr>
			</tbody>
		</table>

		<div style="width: 100%;clear: both;color: #999;padding: 20px;">
		<table width="100%">
			<tbody><tr><td class="aligncenter" style="vertical-align: top; padding: 0px 0px 20px; font-size: 12px;"><strong>Nota:</strong>&nbsp;No responda este correo, Cualquier consulta debe hacerlo &nbsp; a nuestros telefonos.</td></tr>
			</tbody>
		</table>
		</div>
		</div>
		</td><td>&nbsp;</td></tr>
	</tbody>
</table>
</div>

</body>
</html>