{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                      <strong>Pagos: 1 Enero, 2020 - 31 Diciembre, 2020</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div>
</section>
@stop
@section('js')
    <script type="text/javascript"> 
    var indices=[];   
    var valores_pagado = [];
    var valores_deben = [];
    $(document).ready(function(){      
      $.ajax({
        url: '/clientes/all',
        headers: {
            'X-CSRF-TOKEN' : '{{csrf_token()}}' 
        },
        method: 'POST',        
      }).done(function(res){
          /*console.log(res);*/
          
          var arreglo = JSON.parse(res);
          /*console.log(arreglo.pagado[0]);
          console.log(arreglo.deben[11]);     */
          for(var x=0;x<arreglo.pagado.length;x++)
          {
            valores_pagado.push(arreglo.pagado[x].mes);
            valores_deben.push(arreglo.deben[x].mes);
            /*console.log(arreglo.pagado[x].mes);  */
          }
          console.log(valores_deben); 
          generarGrafica();

        });

    })
    function generarGrafica(){
         // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

  var salesChartData = {
    labels  : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    datasets: [
      {
        label               : 'Pagos',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : true,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : valores_pagado
      },
      {
        label               : 'Deudas',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : true,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : valores_deben
      },
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : true,
        }
      }],
      yAxes: [{
        gridLines : {
          display : true,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas, { 
      type: 'line', 
      data: salesChartData, 
      options: salesChartOptions
    }
  )

    }
    </script>
@stop