  @include('KambariuRezervacija.Layout.Partials.header')
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
    <!-- search -->
    @include('KambariuRezervacija.Layout.Partials.footer')
