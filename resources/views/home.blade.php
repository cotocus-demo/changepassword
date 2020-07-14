@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
   </div>
  @endif
  @if(session('error'))
  <div class="alert alert-danger" role="alert">
    {{session('error')}}
  </div>
  @endif
  @if(session()->get('message'))
  <div class="alert alert-success" role="alert">
    <strong>Success: </strong>{{session()->get('message')}}
  </div>
  @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}'s Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
                    <form action="{{route('home')}}" method="POST">
                    @csrf
                       <div class="form-group">
                           <label for="current_password"><strong>Current Password:</strong></label>
                           <input type="password" class="form-control" id ="current_password" name="current_password">
                       </div>
                        <div class="form-group">
                           <label for="new_password"><strong>New Password:</strong></label>
                           <input type="password" class="form-control" id ="new_password" name="new_password">
                       </div>
                       <div class="form-group">
                           <label for="new_password_confirmation"><strong>Confirm New Password:</strong></label>
                           <input type="password" class="form-control" id ="new_password_confirmation" name="new_password_confirmation">
                       </div>
                      
                        <button class="btn btn-primary" type="submit">Generate New Password</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


      


