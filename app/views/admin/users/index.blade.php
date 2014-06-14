@extends('admin.layouts.scaffold')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('admin.users.create', 'Add new user', '', array('class'=>'btn btn-success')) }}</p>

@if ($users->count())
	<table class="table table-hover table-bordered" style="background-color:#EEE;">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Password</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{{ $user->id }}}</td>
					<td>{{{ $user->name }}}</td>
					<td>{{{ $user->username }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->password }}}</td>
                    <td width="5%">{{ link_to_route('admin.users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info pull-right')) }}</td>
                    <td width="5%">
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger pull-right')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no users
@endif

@stop
