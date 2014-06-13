@extends('admin/layouts.scaffold')

@section('main')

<h1>Home</h1>

@if ($homes->count())
	<table class="table table-hover table-bordered" style="background-color:#EEE;">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($homes as $home)
				<tr>
					<td>{{{ $home->title }}}</td>
					<td>{{{ $home->description }}}</td>
                    <td width="5%">{{ link_to_route('admin.homes.edit', 'Edit', array($home->id), array('class' => 'btn btn-info pull-right')) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no homes
@endif

@stop
