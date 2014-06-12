@extends('admin/layouts.scaffold')

@section('main')

<h1>Show Home</h1>

<p>{{ link_to_route('admin.homes.index', 'Return to all homes') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
				<th>Description</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $home->title }}}</td>
					<td>{{{ $home->description }}}</td>
                    <td>{{ link_to_route('admin.homes.edit', 'Edit', array($home->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.homes.destroy', $home->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
