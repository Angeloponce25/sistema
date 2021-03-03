{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Nota:</h5>
              Esta pagina muestra informacion detallada del {{$clientes->nombre}}
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{$clientes->nombre}}                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <i class="fas fa-building"></i><b> Direccion:</b> {{$clientes->direccion}}<br>
                    <i class="fas fa-phone"></i><b> Telefono:</b> {{$clientes->telefono}}<br>
                    <i class="fas fa-envelope"></i><b> Email:</b> {{$clientes->email}}
                  </address>
                </div>                
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Fecha Actual:</b>  {{ now() }}<br>
                  <b>Cliente ID:</b> {{$clientes->id}}<br>
                  <b>Creado el:</b> {{$clientes->created_at}}<br>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>                                                        
                            <th scope="col">Fecha</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Responsable</th>
                            </tr>
                        </thead>
                        <tbody>                        
                        @foreach ($pagos as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->detalle}}</td>
                                <td>{{$item->usuario->name}}</td>                                  
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    En el siguiente esquema se muestran los ultimos pagos realizados por el usuario, tener en cuenta depositos
                    
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Monto a cobrar</p>

                  <div class="table-responsive">
                      
                    <table class="table">                      
                      <tr>
                        <th><h4>Total:</h4></th>
                        <td style="background-color:green;"><b><h4>{{$clientes->precio}}</h4></b></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@stop