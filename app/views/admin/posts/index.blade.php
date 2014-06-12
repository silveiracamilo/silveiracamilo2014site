@extends('admin/layouts.scaffold')

@section('main')

<h1>All Posts</h1>

<p>{{ link_to_route('admin.posts.create', 'Add new post', '', array('class'=>'btn btn-success')) }}</p>

@if ($posts->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Post</th>
				<th>Image</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{{ $post->title }}}</td>
					<td>{{{ $post->description }}}</td>
					<td>{{{ $post->post }}}</td>
					<td>{{{ $post->image }}}</td>
                    <td>{{ link_to_route('admin.posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.posts.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no posts
@endif

@stop
