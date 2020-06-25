@extends('layouts.layout')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<hr>
<form action="{{route('searchproduit')}}" method="post">
        @csrf
      <div class="row">

        <div class="col-md-3">
          <select class="form-control" id="exampleFormControlSelect1" name="categorie_id" >
         <option value="" selected disabled>sélectionner un categorie</option>
            @foreach (DB::table('categories')->get() as $cat)
            
            <option value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach
          </select>
        </div>
        <div class="col-md-7">
          <input class="form-control" type="text" name="text" placeholder="prix,qte,name,description" aria-label="Search">

        </div>
        <div class="col-md-2"><button class="btn btn-primary form-control text-center" style=" margin-top: 3px;">Serach</button></div>

      </div>
</form>
<hr>
<br>
<div class="card card-cascade narrower z-depth-1">

    <!-- Card image -->
    <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

      

      <a href="" class="white-text mx-3">Liste des produits</a>

      <div>

        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus" ></i></button>
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
                <th class="th-lg"><a>Id </a></th>
                <th class="th-lg"><a>Nom </a></th>
                <th class="th-lg"><a >Nom de utilsateur</a></th>
                <th class="th-lg"><a>Prix </a></th>
                <th class="th-lg"><a>Qte </a></th>
                <th class="th-lg"><a>Offre </a></th>
                <th class="th-lg"><a>Categorie</a></th>

                <th class="th-lg"><a>Description</a></th>
                            
            </tr>
          </thead>
          <!-- Table head -->

          <!-- Table body -->
          <tbody>
            @foreach($produits as $produit)
            <tr>
            <td>{{$produit->id}}</td>
            <td><img src="/produits/{{$produit->photo}}" style="width: 30px; ">&nbsp; &nbsp;{{$produit->name}}</td>
            <td>{{DB::table('users')->where('id',$produit->user_id)->value('name')}}</td>
            <td>{{$produit->prix}}</td>
            <td>{{$produit->qte}}</td>
            <td>{{$produit->offre}}</td>
            <td>{{DB::table('categories')->where('id',$produit->categorie_id)->value('name')}}</td>
            <td>{{$produit->description}}</td>
           
              <th>
                <td>
          
                    <a data-toggle="modal" data-target="#mmm{{$produit->id}}"><i class="fas fa-pen-alt" style="color: green"></i></a>
                    
                    <!-------------------modal update product ---------------------->
                       <!-- Modal: Contact form -->
              
<div class="modal fade" id="mmm{{$produit->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <form action="{{route('updateproduit',$produit->id)}}" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="modal-content">
           <!-- Header -->
           <div class="modal-header light-blue darken-3 white-text">
               <h4 class=""><i class="fas fa-pencil-alt"></i> Ajouter un Produit</h4>
               <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
           </div>
          
           <!-- Body -->
   
           <div class="modal-body mb-0">
             <div class="row">
               <div class="col-md-12">
                 <div class="md-form form-sm">    
                 <input type="text" id="form19" name="name"  value="{{$produit->name}}" class="form-control form-control-sm" required>
                    <label for="form19">Nom </label>
                 </div>
               </div>
              
             </div>
         <div class="row">
          <div class="col-md-4">
            <div class="md-form form-sm">    
              <input type="text" id="form19" name="prix" value="{{$produit->prix}}" class="form-control form-control-sm" required>
              <label for="form19">Prix </label>
           </div>
          </div>
          <div class="col-md-4">
            <div class="md-form form-sm">    
              <input type="text" id="form19" name="offre" value="{{$produit->offre}}" class="form-control form-control-sm" required>
              <label for="form19">Offre </label>
           </div>
          </div>
          <div class="col-md-4">
            <div class="md-form form-sm">    
              <input type="text" id="form19" name="qte"value="{{$produit->qte}}" class="form-control form-control-sm" required>
              <label for="form19">Qte </label>
           </div>
          </div>
         </div>
  
         <hr style="border-style: dashed;">
                    
         <div class="row">
           <div class="col-md-12">
  
             <div class="form-group">
               <label for="exampleFormControlSelect1">Categorie</label>
               <select class="form-control" id="exampleFormControlSelect1" name="categorie_id" required>
                @foreach (DB::table('categories')->get() as $cat)
                  @if($produit->categorie_id==$cat->id)
                    <option value="{{$cat->id}}" selected >{{$cat->name}}</option>
                  @endif
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
               </select>
             </div>
  
             </div>
         
         </div>
         <hr style="border-style: dashed;">
             <div class="row">
               <div class="col-md-12">
                
  
               <label for="form19" style="margin-buttom:5px;">Description </label> 
               <div class="md-form form-sm">  
                 
               <textarea type="text" id="form19" name="description" class="form-control form-control-sm" required>    {{$produit->description}}</textarea>
                
  
               </div>
               </div>
           </div>
           <hr style="border-style: dashed;">
           <div class="row">
             <div class="col-md-12">
              
                <div class="md-form">
                  <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                      <span>photo</span>
                      <input type="file" name="photo" required>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Upload your file">
                    </div>
                  </div>
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
<!-----------------------------end Modal update Product----------------------->
                    
                    <a href="{{route('deleteproduit',$produit->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"style="color:red"></i></a></td>
            </tr>
            @endforeach
          
            
                
            
          </tbody>
          <!-- Table body -->
        </table>
        <!-- Table -->
        {{ $produits->links() }}
      </div>

      

    </div>
  </div>  








   <!-- Modal: Contact form -->
   <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog cascading-modal" role="document">
         <!-- Content -->
   <form action="{{route('addproduit')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="modal-content">
         <!-- Header -->
         <div class="modal-header light-blue darken-3 white-text">
             <h4 class=""><i class="fas fa-pencil-alt"></i> Ajouter un Produit</h4>
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
        <div class="col-md-4">
          <div class="md-form form-sm">    
            <input type="text" id="form19" name="prix" class="form-control form-control-sm" required>
            <label for="form19">Prix </label>
         </div>
        </div>
        <div class="col-md-4">
          <div class="md-form form-sm">    
            <input type="text" id="form19" name="offre" class="form-control form-control-sm" required>
            <label for="form19">Offre </label>
         </div>
        </div>
        <div class="col-md-4">
          <div class="md-form form-sm">    
            <input type="text" id="form19" name="qte" class="form-control form-control-sm" required>
            <label for="form19">Qte </label>
         </div>
        </div>
       </div>

       <hr style="border-style: dashed;">
                  
       <div class="row">
         <div class="col-md-12">

           <div class="form-group">
             <label for="exampleFormControlSelect1">Categorie</label>
             <select class="form-control" id="exampleFormControlSelect1" name="categorie_id" required>
              @foreach (DB::table('categories')->get() as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
             </select>
           </div>

           </div>
       
       </div>
       <hr style="border-style: dashed;">
           <div class="row">
             <div class="col-md-12">
              

             <label for="form19" style="margin-buttom:5px;">Description </label> 
             <div class="md-form form-sm">  
               
              <textarea type="text" id="form19" name="description" class="form-control form-control-sm" required></textarea>
              

             </div>
             </div>
         </div>
         <hr style="border-style: dashed;">
         <div class="row">
           <div class="col-md-12">
            
              <div class="md-form">
                <div class="file-field">
                  <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                    <span>photo</span>
                    <input type="file" name="photo" required>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your file">
                  </div>
                </div>
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