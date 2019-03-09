@extends('backend.dashboard')
@section('content')

	<div class="container">
		<h4 class="text-center bg-light p-2">Edit Post</h4>

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
		
	<form class="form col-10 offset-1  border p-3" method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="form-group">
        <label>post Name :</label>
        <input type="text" name="title" value="{{ $post->title }}"  class="form-control"> 
      </div> 

      <div class="form-group">
        <label>post Slug :</label>
        <textarea name="content" class="form-control" rows="5">{{ $post->content }}</textarea>
        
      </div> 

      <div class="form-group">
      	
      		<input type="text" name="status" value="{{ $post->status }}" class="form-control">

      </div>

       

      <div class="form-group text-center">
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </form>

	</div>


@stop