@extends('admin/layouts.scaffold')

@section('main')

<h1>All Abouts</h1>

@if ($abouts->count())
	<table class="table table-striped table-bordered">
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
                    <td>{{ link_to_route('admin.abouts.edit', 'Edit', array($about->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.abouts.destroy', $about->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
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
