@extends('admin/layouts.scaffold')

@section('main')

<h1>All Abouts</h1>

@if ($abouts->count())
	<table class="table table-hover table-bordered" style="background-color:#EEE;">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Picture</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($abouts as $about)
				<tr>
					<td>{{{ $about->title }}}</td>
					<td>{{{ $about->description }}}</td>
					<td><img src="{{{ $about->picture }}}"/></td>
                    <td width="5%">{{ link_to_route('admin.abouts.edit', 'Edit', array($about->id), array('class' => 'btn btn-info pull-right')) }}</td>
                    <td width="5%">
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.abouts.destroy', $about->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger pull-right')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no abouts
@endif

@stop
