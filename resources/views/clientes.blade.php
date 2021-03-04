{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card mb-3">
<div class="card-header ui-sortable-handle">
                <h3 class="card-title">Lista de Clientes</h3>
                <div class="card-tools">
                  <a type="button" href="{{route('clientes.crear')}}" class="btn btn-block bg-gradient-success btn-xs float-right" title="Agregar Cliente"><i class="fas fa-plus"></i> Agregar</a>
                </div>
              </div>
<div class="card-body">
          @if ( session('mensaje') )
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   </div>
                  @endif
          <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                  <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Direccion</th>
                            <th>Pago</th>
                            <th>Estado</th>
                            <th>Accion</th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($clientes as $item)
                  <tr>
                      <td>
                      {{ $item->id }}
                      </td>
                      <td class="text-center">
                      <a href="{{url('detalle/'.$item->id)}}">{{$item->nombre}}</a>
                      </td>                      
                      <td class="project-state">
                          {{ $item->direccion }}
                      </td>
                      <td class="text-center">
                          S/. {{ $item->precio }}.00
                      </td>
                      @if ($item->activo == 1)
                      <td><span class="badge badge-success">Activo</span></td>
                      @else
                      <td><span class="badge badge-warning">Desactivado</span></td>
                      @endif
                      <td class="project-actions text-center">
                      <a class="btn btn-outline-primary btn-icon btn-sm" type="button" href="{{url('clientes.eliminar/'.$item->id)}}"><i class="fas fa-trash"></i></a>
                      <a class="btn btn-outline-primary btn-icon btn-sm" type="button" href="{{url('clientes.activar/'.$item->id)}}"><i class="fas fa-power-off"></i></a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
@stop
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function () {
    $('#tabla').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando _START_ al _END_ de _TOTAL_ datos",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        
    });    

  });   
</script>
@stop