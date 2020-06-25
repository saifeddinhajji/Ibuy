
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Home</title>
  <base href="/">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('style/css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('style/css/mdb.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/css/modules/animations-extended.min.css')}}">

  <!-- Your custom styles (optional) -->
  <style>

  </style>
</head>

<body class="fixed-sn white-skin">

   <!--Main Navigation-->
   <header>

    <!-- Sidebar navigation -->
   {{-- <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        
        <!--/. Logo -->

        <!--Search Form-->
        <li>
          <form class="search-form" role="search">
            <div class="md-form mt-0 waves-light">
              <input type="text" class="form-control py-2" placeholder="Search">
            </div>
          </form>
        </li>
        <!--/.Search Form-->

      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
--}}
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse black-text"><strong style="font-size: 30px;color:blue">I</strong><span style="color: #5D6865">buy</span></a>
      </div>
      <!-- Breadcrumb-->
   

      <!--Navbar links-->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">


        <li class="nav-item">
          <a class="nav-link waves-effect" href=" {{route('home')}}"><i class="fas fa-users"></i> <span class="clearfix d-none d-sm-inline-block">Utlisateurs</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect" href="{{route('categories')}}"><i class="fas fa-layer-group " ></i><span class="clearfix d-none d-sm-inline-block">Categories</span></a>
          </li>
          <li class="nav-item">
          <a class="nav-link waves-effect"  href="{{route('products')}}"><i class="fas fa-shopping-basket"></i><span class="clearfix d-none d-sm-inline-block">Produits</span></a>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{Auth::user()->name}}</span></a>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>Deconnexion</a>
            
                                       
                                       
                                                     
                                    
          </div>
        </li>

      </ul>
      <!--/Navbar links-->
    </nav>
    <!-- /.Navbar -->

  </header>
  <!--Main Navigation-->

  <!-- Main layout -->
  <main>
    <div class="container-fluid">
        <section class="mt-md-4 pt-md-2 mb-5 pb-4">

            <!-- Grid row -->
            <div class="row">
                  <!-- Grid column -->
                  <div class="col-xl-4 col-md-6 mb-md-0 mb-4">
    
                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">
        
                      <!-- Card Data -->
                      <div class="admin-up">
                        <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
                        <div class="data">
                          <p class="text-uppercase">Utlisateurs</p>
                        <h4 class="font-weight-bold dark-grey-text">{{DB::table('users')->count()}}</h4>
                        </div>
                      </div>
        
                    </div>
                    <!-- Card -->
        
                  </div>
                  <!-- Grid column -->
              <!-- Grid column -->
              <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
    
                <!-- Card -->
                <div class="card card-cascade cascading-admin-card">
    
                  <!-- Card Data -->
                  <div class="admin-up">
                    <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                    <div class="data">
                      <p class="text-uppercase">Categories</p>
                      <h4 class="font-weight-bold dark-grey-text">{{DB::table('categories')->count()}}</h4>
                    </div>
                  </div>
    
                </div>
                <!-- Card -->
    
              </div>
              <!-- Grid column -->
    
              <!-- Grid column -->
              <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
    
                <!-- Card -->
                <div class="card card-cascade cascading-admin-card">
    
                  <!-- Card Data -->
                  <div class="admin-up">
                    <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                    <div class="data">
                      <p class="text-uppercase">Produits</p>
                    <h4 class="font-weight-bold dark-grey-text">{{DB::table('produits')->count()}}</h4>
                    </div>
                  </div>
    
                  
    
                </div>
                <!-- Card -->
    
              </div>
              <!-- Grid column -->
    

    
          
    
            </div>
            <!-- Grid row -->
        
          </section>
      @yield('content')
    </div>
  </main>
  <!-- Main layout -->





  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="{{asset('style/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('style/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('style/js/bootstrap.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('style/js/mdb.min.js')}}"></script>
  <!--Custom scripts-->
  <script>

new WOW().init();

    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').materialSelect();
    });

  </script>
</body>

</html>
