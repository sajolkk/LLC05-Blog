@extends('master')
@section('content') 
      <div class="col-10 offset-1 mt-5 border p-3 mt-5">

        @if(session()->has('message'))
          <div class="alert-success">
            {{ session('message') }}
          </div>
          
        @endif
        <h5 class="text-center border-bottom">Please Signin</h5>
          @if($errors->any())

            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>
                    {{ $error }}
                  </li>
                @endforeach
              </ul>
            </div>

          @endif
      </div>

    <form class="form col-10 offset-1  border p-3" method="post" action="{{ route('login') }}" enctype="multipart/form-data">
      @csrf
      
      <div class="form-group">
        <label>E-mail :</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control"> 
      </div>

       <div class="form-group">
        <label>Password :</label>
        <input type="password" name="password"  class="form-control"> 
      </div> 

      
      <div class="form-group text-center">
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </form>



@stop