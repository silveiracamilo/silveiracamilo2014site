@extends('admin/layouts.scaffold')

@section('main')

<h1>Show About</h1>

<p>{{ link_to_route('admin.abouts.index', 'Return to all abouts') }}</p>

<table class="table table-hover table-bordered" style="background-color:#EEE;">
	<thead>
		<tr>
			<th>Title</th>
				<th>Description</th>
				<th>Picture</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $about->title }}}</td>
					<td>{{{ $about->description }}}</td>
					<td>{{{ $about->picture }}}</td>
                    <td>{{ link_to_route('admin.abouts.edit', 'Edit', array($about->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.abouts.destroy', $about->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
