@extends('layouts.layout')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="card card-cascade narrower z-depth-1">

    <!-- Card image -->
    <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

      

      <a href="" class="white-text mx-3">Liste des utlisateurs</a>

      <div>

        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-user-plus" ></i></button>
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
              <th class="th-lg"><a>Nom <i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a href="">Prénom<i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a href="">Email<i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a href="">Adresse<i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a href="">Telephone<i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a href="">Role<i class="fas fa-sort ml-1"></i></a></th>            
            </tr>
          </thead>
          <!-- Table head -->

          <!-- Table body -->
          <tbody>
            @foreach ($users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td>
              @if($user->lastname)
              {{$user->lastname}}
              @else
              -------
              @endif
            </td>
            <td>{{$user->email}}</td>
            <td>
              @if($user->adresse)
              {{$user->adresse}}
              @else
              -------
              @endif
              </td>
            <td>
              @if($user->telephone)
              {{$user->telephone}}
              @else
              -------
              @endif
            </td>
            <td>{{$user->role}}</td>
            <td>
              @if($user->role=="gerant")
            <a href="{{route('toadmin',$user->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-user-lock" style="color:green"></i></a>
              @else
            <a href="{{route('togerant',$user->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-user-slash"></i></a>
              @endif
            <a href="{{route('deleteuser',$user->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-user-minus" style="color: red"></i></a></td>
            </tr> 
            @endforeach
      
          
            
                
            
          </tbody>
          <!-- Table body -->
        </table>
        {{ $users->links() }}
        <!-- Table -->
      </div>

      

    </div>
  </div>

    <!-- Modal: Contact form -->
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
          <!-- Content -->
    <form action="{{route('adduser')}}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="modal-content">
          <!-- Header -->
          <div class="modal-header light-blue darken-3 white-text">
              <h4 class=""><i class="fas fa-pencil-alt"></i> Ajouter un utlisateur</h4>
              <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
         
          <!-- Body -->

          <div class="modal-body mb-0">
            <div class="row">
              <div class="col-md-6">
                <div class="md-form form-sm">
                      
                  <input type="text" id="form19" name="name" class="form-control form-control-sm" required>
                  <label for="form19">Nom </label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="md-form form-sm">
                      
                  <input type="text" id="form19" name="lastname" class="form-control form-control-sm" required>
                  <label for="form19">Prénom</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="md-form form-sm">
                      
                  <input type="text" id="form19" name="email" class="form-control form-control-sm" required>
                  <label for="form19">Email </label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="md-form form-sm">
                      
                  <input type="text" id="form19" name="password" class="form-control form-control-sm" required>
                  <label for="form19">Password</label>
                </div>
              </div>
            </div>
                  
            <div class="row">
              <div class="col-md-6">
                <div class="md-form form-sm">
                      
                  <input type="text" id="form19" name="adresse" class="form-control form-control-sm" required>
                  <label for="form19">Adresse </label>
                  </div>
              </div>
              <div class="col-md-6">
                
                <div class="md-form form-sm">
                      
                  <input type="text" id="form19" name="telephone" class="form-control form-control-sm" required>
                  <label for="form19">Telephone </label>
                </div>
      
              </div>
            </div>
            <hr style="border-top: 1px dashed; ">
                  
            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Role</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="role" required>
                    <option  value="admin">Admin</option>
                    <option  value="gerant">Gerant</option>
                  </select>
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
<!---->