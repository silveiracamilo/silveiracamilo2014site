@extends('admin/layouts.scaffold')

@section('main')

<h1>Show Post</h1>

<p>{{ link_to_route('admin.posts.index', 'Return to all posts') }}</p>

<table class="table table-hover table-bordered" style="background-color:#EEE;">
	<thead>
		<tr>
			<th>Title</th>
				<th>Description</th>
				<th>Post</th>
				<th>Image</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $post->title }}}</td>
					<td>{{{ $post->description }}}</td>
					<td>{{{ $post->post }}}</td>
					<td><img src="{{{ $post->image }}}"/></td>
                    <td>{{ link_to_route('admin.posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.posts.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
