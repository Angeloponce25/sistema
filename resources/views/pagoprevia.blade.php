{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> RECIBO TIFANET.
                    <small class="float-right">{{now()}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">
                  Para
                  <address>
                    <strong>{{ $pagos->cliente->nombre }}</strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Recibo #0000{{$pagos->id}}</b><br>
                  <b>Creado por :</b>{{ $pagos->usuario->name}}<br>
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
                      <th>#</th>
                      <th>Descripcion</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Servicio de Internet <b>({{$mensualidad->mes}})</b></td>
                      <td>S/ {{ $pagos->cliente->precio}}.00</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Recuerde:</p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Enviaremos un correo a : <b> {{ $pagos->cliente->email }}</b> <br>
                    El telefono del cliente es : <b> {{ $pagos->cliente->telefono }}</b> <br>
                    Servicio de Internet se paga por adelantado
                    
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">                  

                  <div class="table-responsive">
                    <table class="table">                      
                      <tr>
                        <th>Total</th>
                        <td>S/ {{ $pagos->cliente->precio}}.00</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{route('mensualidad.index')}}"> <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Salir
                  </button></a>
                  <a target="_blank" href="{{route('pdf',$pagos->id)}}"><button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Descargar PDF
                  </button></a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@stop

