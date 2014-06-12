@extends('admin.layouts.scaffold')

@section('main')

<h1>Show Work_type</h1>

<p>{{ link_to_route('admin.work_types.index', 'Return to all work_types') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $work_type->name }}}</td>
                    <td>{{ link_to_route('admin.work_types.edit', 'Edit', array($work_type->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.work_types.destroy', $work_type->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
