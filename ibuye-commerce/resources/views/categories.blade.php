@extends('layouts.layout')
@section('content')

<div class="card card-cascade narrower z-depth-1">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
  </div>
  @endif
    <!-- Card image -->
    <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

      

      <a href="" class="white-text mx-3">Liste des categories</a>

      <div>

        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" data-toggle="modal" data-target="#modalContactForm" ><i class="fas fa-plus"></i></button>
      </div>

    </div>
    <!-- /Card image -->

    <div class="px-4">

      <div class="table-responsive">
        <!-- Table -->
        <table class="table table-hover mb-0">

          <!-- Table head -->
          <thead>
            <tr>
                <th class="th-lg"><a>Id <i class="fas fa-sort ml-1"></i></a></th>
                <th class="th-lg"><a>Nom <i class="fas fa-sort ml-1"></i></a></th>
                <th class="th-lg"><a href="">Nom de utilsateur<i class="fas fa-sort ml-1"></i></a></th>
                <th class="th-lg"><a href="">Nbr produits<i class="fas fa-sort ml-1"></i></a></th>
                <th class="th-lg"><a href="">Description<i class="fas fa-sort ml-1"></i></a></th>
                            
            </tr>
          </thead>
          <!-- Table head -->

          <!-- Table body -->
          <tbody>
            @foreach ($categories as $cat)
                
            
            <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{DB::table('users')->where('id',$cat->user_id)->value('name')}}</td>
            <td>{{DB::table('produits')->where('categorie_id',$cat->id)->count()}}</td>
            <td>{{$cat->description}}</td>
           
              <td>
              <a  href="{{route('detailcategorie',$cat->id)}}"><i class="fab fa-accusoft"></i></a>
              <a data-toggle="modal" data-target="#mmm{{$cat->id}}"><i class="fas fa-pen-alt" style="color: green" ></i></a>


   <!-- Modal: Contact form -->
              
<div class="modal fade" id="mmm{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
  <form action="{{route('updatecategorie',$cat->id)}}" method="POST" enctype="multipart/form-data">
       @csrf 
       <div class="modal-content">
        <!-- Header -->
        <div class="modal-header light-blue darken-3 white-text">
            <h4 class=""><i class="fas fa-pencil-alt"></i> Modifer un categorie</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
       
        <!-- Body -->

        <div class="modal-body mb-0">
          <div class="row">
            <div class="col-md-12">
              <div class="md-form form-sm">
                    
              <input type="text" id="form19" name="name" value="{{$cat->name}}" class="form-control form-control-sm" required>
                <label for="form19">Nom </label>
                </div>
            </div>
           
          </div>
      
          <div class="row">
            <div class="col-md-12">
              <label for="form19">Description</label>
              <div class="md-form form-sm">
                  
              <textarea type="text" id="form19" rows="5"  name="description" class="form-control form-control-sm" required>{{$cat->description}}</textarea>
              
            </div>
          </div>
        </div>
                
        
                <div class="text-center mt-1-half">
                <button class="btn btn-info mb-2">Modifer <i class="fas fa-paper-plane ml-1"></i></button>
                </div>

        </div>
        </div>
    </form>
    <!-- Content -->
  </div>
</div>


                <a href="{{route('deletecategorie',$cat->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"style="color:red"></i></a></td>
            </tr>
            @endforeach
            
                
            
          </tbody>
          <!-- Table body -->
        </table>
        <!-- Table -->
        {{ $categories->links() }}
      </div>

      

    </div>
  </div>  

  <!-- Modal: Contact form -->
  <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
  <form action="{{route('addcategorie')}}" method="POST" enctype="multipart/form-data">
       @csrf 
       <div class="modal-content">
        <!-- Header -->
        <div class="modal-header light-blue darken-3 white-text">
            <h4 class=""><i class="fas fa-pencil-alt"></i> Ajouter un categorie</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
       
        <!-- Body -->

        <div class="modal-body mb-0">
          <div class="row">
            <div class="col-md-12">
              <div class="md-form form-sm">
                    
                <input type="text" id="form19" name="name" class="form-control form-control-sm" required>
                <label for="form19">Nom </label>
                </div>
            </div>
           
          </div>
      
          <div class="row">
            <div class="col-md-12">
              <label for="form19">Description</label>
              <div class="md-form form-sm">
                  
              <textarea type="text" id="form19" rows="5" name="description" class="form-control form-control-sm" required></textarea>
             
            </div>
          </div>
        </div>
                
        
                <div class="text-center mt-1-half">
                <button class="btn btn-info mb-2">Ajouter <i class="fas fa-paper-plane ml-1"></i></button>
                </div>

        </div>
        </div>
    </form>
    <!-- Content -->
  </div>
</div>
@endsection