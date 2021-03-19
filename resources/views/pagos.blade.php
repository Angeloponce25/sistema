{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabla de Pagos</h3>
          
        </div>
        <div class="card-body">
          @if ( session('mensaje') )
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                    <th>Mes</th>
                    <th>Pago</th>
                    <th>Fecha Pago</th>
                    <th>Detalle</th>
                    <th>Accion</th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($pagos as $item)
                  <tr>
                      <td>
                      {{ $item->id }}
                      </td>
                      <td class="text-center">
                      {{$item->cliente->nombre}}
                      </td>                      
                      <td class="project-state">
                      {{ $item->mensualidad->mes }}
                      </td>
                      <td>
                      S/. {{$item->cliente->precio}}
                      </td>
                      <td class="text-center">
                      {{ $item->created_at }}
                      </td>                      
                      <td class="project-actions text-center">
                      {{ $item->detalle }}                                        
                      </td>
                      <td class="project-actions text-center">
                      <a class="btn btn-outline-primary btn-icon btn-sm" type="button" href="{{url('pagos.eliminar/'.$item->id)}}"><i class="fas fa-trash"></i></a>
                      <a class="btn btn-outline-primary btn-icon btn-sm" href="{{url('recibo'.$item->id.'.pdf')}}" download>
                        <i class="fas fa-download"></i>
                      </a>
                      <a class="btn btn-outline-primary btn-icon btn-sm" target="_blank" href="{{url('pdf/'.$item->id.'.pdf')}}">
                        <i class="fas fa-eye"></i>
                      </a>                                          
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
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