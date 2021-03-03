{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="/storage/user1-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Informacion Personal</h3>

                <strong><i class="fas fa-book mr-1"></i> Codigo de usuario</strong>

                <p class="text-muted">
                {{auth()->id()}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Nombres Completos</strong>

                <p class="text-muted">
                {{auth()->user()->name}}
                </p>

                <hr>

                <strong><i class="fas fa-envelope mr-1"></i> E-mail</strong>

                <p class="text-muted">
                {{auth()->user()->email}}
                </p>

                <hr>

                <strong><i class="nav-icon far fa-calendar-alt"></i> Fecha Creacion</strong>

                <p class="text-muted">
                {{auth()->user()->created_at}}
                </p>

                <strong><i class="nav-icon far fa-calendar-alt"></i> Total Pagos</strong>

                <p class="text-muted">
                1,322
                </p>
              <a href="password" class="btn btn-primary btn-block"><b>Cambiar Contraseña</b></a>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
@stop