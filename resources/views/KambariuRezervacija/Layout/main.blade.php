<!DOCTYPE html>
<html lang="en">
  <head>
    @include('KambariuRezervacija.Layout.Partials.header')
  </head>
  <body>
    <!-- Navigation -->
    @include('KambariuRezervacija.Layout.Partials.navigation')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
          <!-- search -->
          @include('KambariuRezervacija.Layout.Partials.search')
          <div class="col-md-9">
            <!-- slider -->
            @include('KambariuRezervacija.Layout.Partials.slider')
            <div class="row">
              @yield('content')
            </div>
          </div>
        </div>
    </div>
    <!-- footer -->
    @include('KambariuRezervacija.Layout.Partials.footer')
  </body>
</html>