@extends('layouts.layout')
@section('content')
<div class="row">

  <!-- Grid column -->
  <div class="col-lg-8 col-md-12 mb-3 pb-lg-2">

    <!-- Image -->
    <div class="view zoom z-depth-1">

      <img src="https://mdbootstrap.com/img/Photos/Others/product1.jpg" class="img-fluid" alt="sample image">

      <div class="mask rgba-white-light">

        <div class="dark-grey-text d-flex align-items-center pt-4 ml-3 pl-3">

          <div>

        

            <h2 class="card-title font-weight-bold pt-2"><strong>{{$categorie->name}}</strong></h2>

            <p class="">{{$categorie->description}}.</p>

           
          </div>

        </div>

      </div>

    </div>
    <!-- Image -->

  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="col-lg-4 col-md-12 mb-4">

    <!-- Section: Categories -->
    <section class="section">


      <ul class="list-group z-depth-1">

        @foreach (DB::table('categories') ->orderBy('created_at', 'desc')
 
        ->take(7)
        ->get(); as $cat)
        <li class="list-group-item d-flex justify-content-between align-items-center">

        <a class="dark-grey-text font-small" href="{{route('detailcategorie',$cat->id)}}">{{$cat->name}}</a>

        <span class="badge badge-danger badge-pill">{{DB::table('produits')->where('categorie_id',$cat->id)->count()}}</span>
      </li>
     
        @endforeach
         
      </ul>
        
         

        

    

    </section>
    <!-- Section: Categories -->

  </div>
  <!-- Grid column -->

</div>
<div class="row">
@foreach($produits as $produit)
      <!-- Grid column -->
      <div class="col-lg-3 col-md-6 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">
  
          <!-- Card image -->
          <div class="view overlay">
  
            <img src="/produits/{{$produit->photo}}" class="img-fluid" alt="">
  
            <a>
  
              <div class="mask rgba-white-slight waves-effect waves-light"></div>
  
            </a>
  
          </div>
          <!-- Card image -->
  
          <!-- Card content -->
          <div class="card-body">
  
            <!-- Category & Title -->
            <h5 class="card-title mb-1">
  
              <strong>
  
              <a href="" class="dark-grey-text">{{$produit->name}}</a>
  
              </strong>
  
            </h5>
  
          
  
            
  
  
            <!-- Card footer -->
            <div class="card-footer pb-0">
  
              <div class="row mb-0">
  
                <h5 class="mb-0 pb-0 mt-1 font-weight-bold">
  
                  <span class="red-text">
  
                    @php
                      $t=$produit->prix/100;
                      $st=$t*$produit->offre;  
                      
                    @endphp
                  <strong>{{$produit->prix-$st}}</strong>
  
                  </span>
  
                  <span class="grey-text">
  
                    <small>
  
                      <s>{{$produit->prix}} TND</s>
  
                    </small>
  
                  </span>
  
                </h5>
  
               
  
              </div>
  
            </div>
  
          </div>
          <!-- Card content -->
  
        </div>
        <!-- Card -->
  
      </div>
      <!-- Grid column -->
  
@endforeach

  </div>

@endsection
