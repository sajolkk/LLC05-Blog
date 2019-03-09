@extends('backend.dashboard')
@section('content')

	<div class="container">
		<h4 class="text-center bg-light p-2">All Categories <a href="{{ route('dashboard.category.add') }}">New Category</a></h4>
		<table class="table table-hover table-striped">
			<tr>
				<td class="text-uppercase">#ID</td>
				<td class="text-uppercase">Name</td>
				<td class="text-uppercase">Slug</td>
				<td class="text-uppercase">Status</td>
				<td class="text-uppercase">Action</td>
			</tr>
			
			@forelse($categories as $data)
			<tr>
				<td>{{ $data->category_id }}</td>
				<td>{{ $data->name }}</td>
				<td>{{ $data->slug }}</td>
				<td>{{ $data->status }}</td>
				<td><a href="{{ route('dashboard.category.show',$data->category_id) }}">Details</a></td>
			</tr>
			@empty
				<tr>
					<td colspan="4" class="text-center font-weight-bold">Category Empty</td>
				</tr>
			@endforelse
		</table>
	</div>


@stop