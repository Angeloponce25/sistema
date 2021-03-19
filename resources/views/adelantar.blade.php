{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card mb-12">
<div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                  <i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Adelantar Pagos
                                </div>                                
                            </div>  
    <div class="card-body">    
                  @if ( session('mensaje') )
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   </div>
                  @endif
                  <form method="POST" action="{{ route('enviar.adelantar') }}">
                    @csrf                                       
                    <select class="form-control mb-2" name="cliente_id">   
                    @foreach ($clientes as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach 
                    </select>
                    <div class="card card-secondary">
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                  	<div class="col-sm-12">
                  		<label>Seleccionar Meses</center></label>
                  	</div>
                    <div class="col-sm-4">
                      <!-- checkbox --> 
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Enero" value="Enero">
                          <label for="Enero" class="custom-control-label">Enero</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Febrero" value="Febrero">
                          <label for="Febrero" class="custom-control-label">Febrero</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Marzo" value="Marzo">
                          <label for="Marzo" class="custom-control-label">Marzo</label>
                        </div>                        
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Abril" value="Abril">
                          <label for="Abril" class="custom-control-label">Abril</label>               
                        </div>                        
                      </div>
                    </div> 
                    <div class="col-sm-4">
                      <!-- radio -->
                      <div class="form-group">                      	
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Mayo" value="Mayo">
                          <label for="Mayo" class="custom-control-label">Mayo</label>               
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Junio" value="Junio">
                          <label for="Junio" class="custom-control-label">Junio</label>               
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Julio" value="Julio">
                          <label for="Julio" class="custom-control-label">Julio</label>               
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Agosto" value="Agosto">
                          <label for="Agosto" class="custom-control-label">Agosto</label>              
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- radio -->
                      <div class="form-group">                      	
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Septiembre" value="Septiembre">
                          <label for="Septiembre" class="custom-control-label">Septiembre</label>               
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Octubre" value="Octubre">
                          <label for="Octubre" class="custom-control-label">Octubre</label>               
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Noviembre" value="Noviembre">
                          <label for="Noviembre" class="custom-control-label">Noviembre</label>               
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="mes[]" class="custom-control-input" type="checkbox" id="Diciembre" value="Diciembre">
                          <label for="Diciembre" class="custom-control-label">Diciembre</label>              
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

                    <button class="btn btn-primary btn-block" type="submit">Pagar</button>
                  </form>
    </div>
    </div>
@stop
