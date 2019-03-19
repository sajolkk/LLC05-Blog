@extends('backend.dashboard')
@section('content')

	<div class="container">
		<h4 class="text-center bg-light p-2">New Post</h4>

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
		
	<form class="form col-10 offset-1  border p-3" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Post Title :</label>
        <input type="text" name="title" value="{{ old('title') }}"  class="form-control"> 
      </div> 

      <div class="form-group">
        <label>Post Content :</label>
        <textarea name="content" class="form-control" >{{ old('content') }}</textarea>
       
      </div> 

      <div class="form-group">
        <select name="category_id" class="form-control" >
          <option value="">Select Category</option>
          @foreach($category as $cat)
            <option value="{{ $cat->category_id }}"  >{{ $cat->name }}</option>
          @endforeach
          
        </select>
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