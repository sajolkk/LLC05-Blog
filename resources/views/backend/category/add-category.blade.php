@extends('backend.dashboard')
@section('content')

	<div class="container">
		<h4 class="text-center bg-light p-2">New Category</h4>

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
		
	<form class="form col-10 offset-1  border p-3" method="post" action="{{ route('dashboard.category.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Category Name :</label>
        <input type="text" name="name" value="{{ old('name') }}"  class="form-control"> 
      </div> 

      <div class="form-group">
        <label>Category Slug :</label>
        <input type="text" name="slug" value="{{ old('slug') }}"  class="form-control"> 
      </div> 

      <div class="form-group">
      	<select name="status" class="form-control" >
      		<option value="">Select Status</option>
      		<option value="1">Active</option>
      		<option value="0">Inactive</option>
      	</select>
        
        
      </div>

       

      <div class="form-group text-center">
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </form>

	</div>


@stop