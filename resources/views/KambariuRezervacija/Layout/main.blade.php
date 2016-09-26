<!DOCTYPE html>
<html lang="en">
  <head>
    @include('KambariuRezervacija.Layout.Partials.header')
  </head>
  <body>
    <!-- Navigation -->
    @include('KambariuRezervacija.Layout.Partials.navigation')
    <!-- Flash message -->
    @include('KambariuRezervacija.Layout.Partials.flashMessage')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
          <!-- search -->
          @yield('search')
          @yield('width')
            <!-- slider -->
            @yield('slider')
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