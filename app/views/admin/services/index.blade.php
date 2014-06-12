@extends('admin/layouts.scaffold')

@section('main')

<h1>All Services</h1>

<p>{{ link_to_route('admin.services.create', 'Add new service', '', array('class'=>'btn btn-success')) }}</p>

@if ($services->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Image</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($services as $service)
				<tr>
					<td>{{{ $service->name }}}</td>
					<td>{{{ $service->description }}}</td>
					<td>{{{ $service->image }}}</td>
                    <td>{{ link_to_route('admin.services.edit', 'Edit', array($service->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.services.destroy', $service->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no services
@endif

@stop
