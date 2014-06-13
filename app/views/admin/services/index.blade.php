@extends('admin/layouts.scaffold')

@section('main')

<h1>All Services</h1>

<p>{{ link_to_route('admin.services.create', 'Add new service', '', array('class'=>'btn btn-success')) }}</p>

@if ($services->count())
	<table class="table table-hover table-bordered" style="background-color:#EEE;">
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
					<td><img src="{{{ $service->image }}}"/></td>
                    <td width="5%">{{ link_to_route('admin.services.edit', 'Edit', array($service->id), array('class' => 'btn btn-info pull-right')) }}</td>
                    <td width="5%">
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.services.destroy', $service->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger pull-right')) }}
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
