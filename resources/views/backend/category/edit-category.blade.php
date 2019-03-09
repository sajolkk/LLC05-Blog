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
		
	<form class="form col-10 offset-1  border p-3" method="post" action="{{ route('dashboard.category.update', $category->category_id) }}" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="form-group">
        <label>Category Name :</label>
        <input type="text" name="name" value="{{ $category->name }}"  class="form-control"> 
      </div> 

      <div class="form-group">
        <label>Category Slug :</label>
        <input type="text" name="slug" value="{{ $category->slug }}"  class="form-control"> 
      </div> 

      <div class="form-group">
      	<select name="status" class="form-control" >
      		
      		<option value="1" {{ $category->status == 1 ? 'selected' : '' }} >Active</option>
      		<option value="0" {{ $category->status == 0 ? 'selected' : '' }} >Inactive</option>
      	</select>
        
        
      </div>

       

      <div class="form-group text-center">
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </form>

	</div>


@stop