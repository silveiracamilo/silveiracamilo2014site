@extends('admin/layouts.scaffold')

@section('main')

<h1>All Works</h1>

<p>{{ link_to_route('admin.works.create', 'Add new work', '', array('class'=>'btn btn-success')) }}</p>

@if ($works->count())
	<table class="table table-hover table-bordered" style="background-color:#EEE;">
		<thead>
			<tr>
				<th>Id</th>
				<th>Work type</th>
				<th>Title</th>
				<th>Date</th>
				<th>Path</th>
				<th>Thumb</th>
				<th>Gallery Pictures</th>				
			</tr>
		</thead>

		<tbody>
			@foreach ($works as $work)
				<tr>
					<td>{{{ $work->id }}}</td>
					<td>{{{ $work->work_type()->name }}}</td>
					<td>{{{ $work->title }}}</td>
					<td>{{{ $work->date }}}</td>
					<td>{{{ $work->path }}}</td>
					<td style="text-align:center;"><img src="{{{ $work->thumb }}}"/></td>
					@if ($work->work_pictures()->count())
					<td><a class="btn btn-success" href="{{{ '/admin/works/'.$work->id.'#pictures' }}}">View pictures</a></td>					
					@else
					<td><a class="btn btn-success" href="{{ url('admin/work_pictures/create', $work->id) }}">Add new picture</a></td>
					@endif
                    <td width="5%">{{ link_to_route('admin.works.edit', 'Edit', array($work->id), array('class' => 'btn btn-info')) }}</td>
                    <td width="5%">
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
