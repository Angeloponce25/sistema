@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Editar usuario</h3>                               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	@if ( session('mensaje_editar') )
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('mensaje_editar') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   </div>
            	@endif 
              <form method="POST" action="{{ route('usuarios.update', $user->id) }}" >
              	@method('PUT')
              	@csrf
              <div class="box-body">
              		<div class="form-group row">
              			<div class="col-sm-6">
                        <label>Nombre</label>
	                  	<input type="text" name="nombre" class="form-control" value="{{ $user->name }}" >
                    	</div>                  
	                </div>
	                <div class="form-group row">
	                  	<div class="col-sm-6">
                        <label>Email address</label>
	                  	<input type="email" name="email" class="form-control" value="{{ $user->email }}" >
                    	</div>
	                </div>
	                <div class="form-group row">
	                  	<div class="col-sm-6">
                        <label>Rol</label>
	                  	<input type="text" name="rol" class="form-control" value="{{ $user->rol }}" >
                    	</div>
	                </div>
	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <div class="col-md-2 float-right">
                  	<button class="btn btn-warning btn-block" type="submit">Editar</button>                
                	</div>
	              </div>
            	</form>             
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@stop
