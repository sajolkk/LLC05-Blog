@extends('backend.dashboard')
@section('content')

	<div class="container">
		<h4 class="text-center bg-light p-2">Category Details</h4>

		
		
  Category Name : {{ $category->name }} <br>
  Category Slug : {{ $category->slug }} <br>
	Category status : {{ $category->status == 1? 'Active' : 'Inactive' }} <br>
  <a href="{{ route('dashboard.category.edit',$category->category_id) }}" class="btn btn-sm btn-primary" >Edit</a>
  
  <form action="{{ route('dashboard.category.delete',$category->category_id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure, you want to delete data??')">
  @csrf
  @method('delete') 
    <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
  </form>
    <a href="{{ route('dashboard.category.index') }}" class="btn btn-sm btn-primary" >Back</a>
            <h5>All Post Under {{ $category->name }} Category</h5>
          <table class="table table-hover table-striped">
            <tr>
              <th class="text-uppercase">Name</th>
              <th class="text-uppercase">Content</th>
              <th class="text-uppercase">Author</th>
              <th class="text-uppercase">Status</th>
              <th class="text-uppercase">Date</th>
              <th class="text-uppercase">Action</th>
            </tr>
            @forelse($category->post as $data)
              
              <tr>
                <td>{{ $data->title }}</td>
                <td>{{ $data->content }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->created_at }}</td>
                <td><a href="{{ route('post.show',$data->id) }}">Details</a></td>
              </tr>
    
            @empty
              <tr>
                <td colspan="4" class="text-center font-weight-bold">Category Empty</td>
              </tr>
            @endforelse
          </table>
	</div>


@stop