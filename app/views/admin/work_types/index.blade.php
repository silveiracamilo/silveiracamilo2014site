@extends('admin.layouts.scaffold')

@section('main')

<h1>All Work types</h1>

<p>{{ link_to_route('admin.work_types.create', 'Add new work type', '', array('class'=>'btn btn-success')) }}</p>

@if ($work_types->count())
	<table class="table table-hover table-bordered" style="background-color:#EEE;">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($work_types as $work_type)
				<tr>
					<td width="2%">{{{ $work_type->id }}}</td>
					<td>{{{ $work_type->name }}}</td>
                    <td width="5%">{{ link_to_route('admin.work_types.edit', 'Edit', array($work_type->id), array('class' => 'btn btn-info pull-right')) }}</td>
                    <td width="5%">
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.work_types.destroy', $work_type->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger pull-right')) }}
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
