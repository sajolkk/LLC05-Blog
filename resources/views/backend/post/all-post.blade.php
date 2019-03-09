@extends('backend.dashboard')
@section('content')

	<div class="container">
		<h6 class="text-center bg-light p-2">All Post <a href="{{ route('post.create') }}">New Post</a></h6>
		<table class="table table-hover table-striped " >
			<tr>
				<td class="text-uppercase">#ID</td>
				<td class="text-uppercase">Category</td>
				<td class="text-uppercase">Author</td>
				<td class="text-uppercase">Titel</td>
				<td class="text-uppercase">Content</td>
				<td class="text-uppercase">Status</td>
				<td class="text-uppercase">Action</td>
			</tr>
			
			@forelse($post as $data)
			<tr>
				<td>{{ $data->id }}</td>
				<td>{{ $data->category->name }}</td>
				<td>{{ $data->user->name }}</td>
				<td>{{ $data->title }}</td>
				<td>{{ $data->content }}</td>
				<td>{{ $data->status }}</td>
				<td><a href="{{ route('post.show',$data->id) }}">Details</a></td>
			</tr>
			@empty
				<tr>
					<td colspan="4" class="text-center font-weight-bold">Category Empty</td>
				</tr>
			@endforelse
		</table>
		{{ $post->links() }}
	</div>


@stop