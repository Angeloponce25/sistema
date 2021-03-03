@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if ( session('mensaje_eliminar') )
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('mensaje_eliminar') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   </div>
                  @endif
                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th style="width: 40px">Rol</th>
                      <th>Editar</th>
                      <th>Borrar</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($user as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td><a target="_blank" href="#">{{$item->name}}</a></td>
                      <td>
                        {{$item->email}}
                      </td>
                      <td>{{$item->rol}}</td>
                      <td><a href="{{route('usuarios.editar', $item->id)}}" class="btn btn-warning btn-sm">Editar</a></td>
                      <td><form action="{{route('usuarios.eliminar', $item->id)}}" method="POST">
                      @method('DELETE')
                      @csrf

                      <button class="btn btn-danger btn-sm" type="submit">
                              <i class="fas fa-trash">
                              </i>
                      </button>
                      </form> </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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