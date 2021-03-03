{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card mb-12">
<div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                  <i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Generar Pagos
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
                  <form method="POST" action="{{ route('mensualidad.crear') }}">
                    @csrf                    
                    <select class="form-control mb-2" name="cliente_id">                                   
                    <option value="Enero">Enero</option>
                    <option value="Febrero">Febrero</option>
                    <option value="Marzo">Marzo</option>
                    <option value="Abril">Abril</option>
                    <option value="Mayo">Mayo</option>
                    <option value="Junio">Junio</option>
                    <option value="Julio">Julio</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Septiembre">Septiembre</option>
                    <option value="Octubre">Octubre</option>
                    <option value="Noviembre">Noviembre</option>
                    <option value="Diciembre">Diciembre</option>
                    </select>
                    <button class="btn btn-primary btn-block" type="submit">Pagar</button>
                  </form>
    </div>
      <div class="card-header">
            <h3 class="card-title">Tabla de Pagos</h3>
      </div>
      <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Cliente</th>
                  <th>Monto</th>
                  <th>Mes</th>
                  <th>Estado</th>
                  <th>Creacion</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($mensualidad as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->cliente->nombre}}</td>
                  <td>{{$item->monto}} </td>
                  <td>{{$item->mes}} </td>
                  @if ($item->pagada == 1)
                                <td><span class="badge badge-success">Pagado</span></td>
                            @else
                                <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                  Cobrar
                </button>
                                </td>
                  @endif 
                  <td>{{$item->created_at}} </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Codigo</th>
                  <th>Cliente</th>
                  <th>Monto</th>
                  <th>Mes</th>
                  <th>Estado</th>
                  <th>Creacion</th>
                </tr>
                </tfoot>
              </table>
      </div>
    </div>
    <!-- /.modal -->
    <div class="modal fullscreen-modal fade" id="modal-default">
        <div class="modal-dialog" style="width: 350px;">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title">Cliente <b id="nombre"></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('pagos.crear') }}">
                    @csrf                                       
                    <input type="hidden" id="mensualidad_id" name="mensualidad_id" class="form-control mb-2"
                      />
                    <label>Monto a cancelar</label> 
                    <input type="text" id="monto" name="monto" class="form-control mb-2"
                      />
                    <label>Detalle</label> 
                    <input type="text" name="detalle" class="form-control mb-2"
                      />
                    <button class="btn btn-primary btn-block" type="submit">Pagar</button>
                  </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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
    var table = $('#tabla').DataTable();
    $('#tabla tbody').on( 'click', 'tr', function () {
      var data = table.row( this ).data();      
      var mensualidad_id = data[0];
      var nombre = data[1];
      var monto = data[2];
    document.getElementById('nombre').innerHTML=nombre;
    $("#mensualidad_id").val(mensualidad_id);
    $("#monto").val(monto);
    });
    

  });   
</script>
@stop