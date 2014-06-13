@extends('admin.layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::model($user, array('class'=>'form-style', 'method' => 'PATCH', 'route' => array('admin.users.update', $user->id))) }}
	<h2>Edit User</h2>
    
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}

    {{ Form::label('username', 'Username:') }}
    {{ Form::text('username') }}

    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email') }}

    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password') }}

    </br></br>
	{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
		
{{ Form::close() }}

@stop
