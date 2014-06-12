@extends('admin/layouts.scaffold')

@section('main')

<h1>Show Work</h1>

<p>{{ link_to_route('admin.works.index', 'Return to all works') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Tipo_id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Date</th>
				<th>Technologies</th>
				<th>Produced_in</th>
				<th>Produced_link</th>
				<th>Link</th>
				<th>Path</th>
				<th>Video</th>
				<th>Thumb</th>
				<th>Swf</th>
				<th>Swf_width</th>
				<th>Swf_height</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $work->tipo_id }}}</td>
					<td>{{{ $work->title }}}</td>
					<td>{{{ $work->description }}}</td>
					<td>{{{ $work->date }}}</td>
					<td>{{{ $work->technologies }}}</td>
					<td>{{{ $work->produced_in }}}</td>
					<td>{{{ $work->produced_link }}}</td>
					<td>{{{ $work->link }}}</td>
					<td>{{{ $work->path }}}</td>
					<td>{{{ $work->video }}}</td>
					<td>{{{ $work->thumb }}}</td>
					<td>{{{ $work->swf }}}</td>
					<td>{{{ $work->swf_width }}}</td>
					<td>{{{ $work->swf_height }}}</td>
                    <td>{{ link_to_route('admin.works.edit', 'Edit', array($work->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.works.destroy', $work->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
