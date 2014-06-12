@extends('admin/layouts.scaffold')

@section('main')

<h1>Show Work_picture</h1>

<p>{{ link_to_route('admin.work_pictures.index', 'Return to all work_pictures') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Work_id</th>
				<th>Title</th>
				<th>Picture</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $work_picture->work_id }}}</td>
					<td>{{{ $work_picture->title }}}</td>
					<td>{{{ $work_picture->picture }}}</td>
                    <td>{{ link_to_route('admin.work_pictures.edit', 'Edit', array($work_picture->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.work_pictures.destroy', $work_picture->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
