@extends('backend.dashboard')
@section('content')

	<div class="container">
		<h4 class="text-center bg-light p-2">Post Details</h4>

		
		
  {{ $post->title }} <br>
 {{ $post->content }} <br>
  {{ $post->image }} <br>
	 {{ $post->status }} <br>
  <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-primary" >Edit</a>
  
  <form action="{{ route('post.destroy',$post->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure, you want to delete data??')">
  @csrf
  @method('delete') 
    <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
  </form>
    <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary" >Back</a>
	</div>


@stop