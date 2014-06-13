@extends('admin/layouts.scaffold')

@section('main')

<h1>All Works</h1>

<p>{{ link_to_route('admin.works.create', 'Add new work', '', array('class'=>'btn btn-success')) }}</p>

@if ($works->count())
	<table class="table table-hover table-bordered" style="background-color:#EEE;">
		<thead>
			<tr>
				<th>Work type</th>
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
			@foreach ($works as $work)
				<tr>
					<td>{{{ $work->work_type()->name }}}</td>
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
			@endforeach
		</tbody>
	</table>
@else
	There are no works
@endif

@stop
