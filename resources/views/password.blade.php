{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <h3 class="profile-username text-center">Actualizar Contraseña</h3>
                @if ( session('exito') )                    
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-check"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Exito!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  {{ session('exito') }} </font><font style="vertical-align: inherit;">,Gracias.
                </font></font></div>
                @endif
                @if ( session('error') )                    
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-check"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Exito!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  {{ session('error') }} </font><font style="vertical-align: inherit;">,Gracias.
                </font></font></div>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-ban"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  {{ session('error') }} </font><font style="vertical-align: inherit;">,Reintentelo. 
                </font></font></div>
                @endif
                @error('mypassword')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  Tu contraseña Actual es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>                  
                  @enderror
                  @error('password')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  Tu contraseña Nueva es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>                  
                  @enderror
                  @error('password_confirmation')
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ¡Alerta!</font></font></h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  Tu contraseña de confirmacion es . </font><font style="vertical-align: inherit;"><b>obligatorio</b>.
                </font></font></div>                  
                  @enderror
              <form method="post" action="{{route('updatepassword')}}">
              @csrf
              <div class="form-group">
                <label for="mypassword">Introduce tu actual password:</label>
                <input type="password" name="mypassword" class="form-control" value="{{ old('mypassword') }}">                
              </div>
              <div class="form-group">
                <label for="password">Introduce tu nuevo password:</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
              </div>
              <div class="form-group">
                <label for="mypassword">Confirma tu nuevo password:</label>
                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
              </div>
              <button type="submit" class="btn btn-primary">Cambiar mi password</button>
              </form>
            </div>
          </div>

          </div>
        </div>
</div>
@stop