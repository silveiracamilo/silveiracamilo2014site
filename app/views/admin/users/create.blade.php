@extends('admin.layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('class'=>'form-style', 'route' => 'admin.users.store')) }}
	
    <h2>Create User</h2>
    
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}

    {{ Form::label('username', 'Username:') }}
    {{ Form::text('username') }}

    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email') }}

    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password') }}

    </br></br>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		
{{ Form::close() }}

@stop


