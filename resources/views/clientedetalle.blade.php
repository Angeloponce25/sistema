{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
<div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><i class="fas fa-user"></i> {{$clientes->nombre}}</h3>
              <p><b>Fecha Actual:</b>  {{ now() }}<br>
                  <b>Cliente ID:</b> {{$clientes->id}}<br>
                  <b>Creado el:</b> {{$clientes->created_at}}<br>    </p>

              <hr>
                    <i class="fas fa-building"></i><b> Direccion:</b> {{$clientes->direccion}}<br>
                    <i class="fas fa-phone"></i><b> Telefono:</b> <a href="https://api.whatsapp.com/send?phone=+51{{$clientes->telefono}}">+51 {{$clientes->telefono}}</a><br>
                    <i class="fas fa-envelope"></i><b> Email:</b> {{$clientes->email}}
            </div>
            <div class="col-12 col-sm-6">              
              <div class="col-12">
                <img src="{{ asset('fotos/'.$clientes->avatar) }}" class="product-image" alt="Product Image">
                <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  S/{{$clientes->precio}}.00
                </h2>
              </div>
              </div>
            </div>           
          </div>
        <hr>
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1" style="background-color: #ffffff;">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" style="color:#007bff; " id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Pagos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color:#007bff; " id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Ubicación</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">

                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="col-12 table-responsive">
                      <table class="table table-striped">
                              <thead>
                                  <tr>
                                  <th scope="col">#</th>                                                        
                                  <th scope="col">Fecha</th>
                                  <th scope="col">Mes</th>
                                  <th scope="col">Año</th>
                                  <th scope="col">Detalle</th>
                                  <th scope="col">Responsable</th>
                                  </tr>
                              </thead>
                              <tbody>                        
                              @foreach ($pagos as $item)
                                  <tr>
                                      <th scope="row">{{$item->id}}</th>
                                      <td>{{$item->created_at}}</td>
                                      <td>{{$item->mensualidad->mes}}</td>
                                      <td>{{$item->mensualidad->ano}}</td>
                                      <td>{{$item->detalle}}</td>
                                      <td>{{$item->usuario->name}}</td>                                  
                                  </tr>
                              @endforeach
                              </tbody>
                      </table>
                  </div>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <div class="card"> {!!$map['html']!!} </div>
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
@stop
@section('js')
<script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
@stop