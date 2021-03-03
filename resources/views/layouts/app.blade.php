<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Cobranzas Tifanet">
    <meta name="author" content="Angelo Ruben Huancapaza Ponce">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISTEMA TIFANET</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    </head>
    <body class="{{ $class ?? '' }}">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
          <div class="container">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="{{ route('home') }}">{{ $title }}</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="wrapper wrapper-full-page">
          <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('material') }}/img/login.jpg'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
          <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            @yield('content')
        <!-- Footer -->
            <footer class="footer">
                  <div class="container">
                      <div class="copyright float-right">
                      &copy;
                      <script>
                          document.write(new Date().getFullYear())
                      </script>, Arequipa - Perú
                      </div>
                  </div>
            </footer>
        <!-- Navbar -->
          </div>
        </div>
    </body>
</html>