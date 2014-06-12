@extends('admin.layouts.scaffold')

@section('main')

<h1>All Work_types</h1>

<p>{{ link_to_route('admin.work_types.create', 'Add new work_type', '', array('class'=>'btn btn-success')) }}</p>

@if ($work_types->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($work_types as $work_type)
				<tr>
					<td>{{{ $work_type->name }}}</td>
                    <td>{{ link_to_route('admin.work_types.edit', 'Edit', array($work_type->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.work_types.destroy', $work_type->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no work_types
@endif

@stop
