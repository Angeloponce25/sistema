{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card mb-3">
<div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                  <i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Agregar Clientes
                                </div>
                                
                            </div>    
<div class="card-body">     
                  @if ( session('mensaje') )                    
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-check"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Exito!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  {{ session('mensaje') }} </font><font style="vertical-align: inherit;">,Gracias.
                </font></font></div>
                  @endif
                  @error('nombre')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  El campo Nombre es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>
                  
                  @enderror
                  @error('direccion')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  El campo Direccion es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>
                  
                  @enderror
                  @error('email')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  El campo Email es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>
                  
                  @enderror
                  @error('telefono')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  El campo Telefono es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>
                  
                  @enderror
                  @error('precio')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  El campo Precio es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>
                  
                  @enderror
                  <form method="POST" action="{{ route('clientes.agregar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col">
                        <input  type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}" />
                      </div>
                      <div class="col">
                        <input  type="text" name="direccion" placeholder="Direccion" class="form-control mb-2" value="{{ old('direccion') }}" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input  type="email" name="email" placeholder="Email" class="form-control mb-2" value="{{ old('email') }}" />
                      </div>
                      <div class="col">
                        <input  type="tel" name="telefono" placeholder="Telefono" class="form-control mb-2" value="{{ old('telefono') }}" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input  type="number" name="precio" placeholder="Cobro Mensual" class="form-control mb-2" 
                        value="{{ old('precio') }}" />
                      </div>
                      <div class="col">
                        <input type="file" class="form-control-file mb-2" id="file" name="file" value="{{ old('file') }}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input  type="text" name="latitud" id="latitud"placeholder="Latitud" class="form-control mb-2" value="{{ old('latitud') }}" />
                      </div>
                      <div class="col">
                        <input  type="text" name="longitud" id="longitud" placeholder="Longitud" class="form-control mb-2" value="{{ old('longitud') }}" />
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>                
                </div>
    <div class="container-fluid">
    <div class="row">
          <div class="col-md-12">
          {!!$map['html']!!}
          </div>
    </div>        
    </div>
@stop
@section('js')
    <script type="text/javascript">
    var centreGot = false;    
    </script>{!!$map['js']!!}
@stop