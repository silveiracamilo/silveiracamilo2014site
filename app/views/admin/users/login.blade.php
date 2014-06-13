@extends('admin.layouts.login')

@section('main')

{{ Form::open(array('class'=>'form-login')) }}
	
	@if ($errors->any())
		<ul>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</ul>
	@endif
    
    <h2 class="form-signin-heading">Por favor faça o login</h2>

    {{ Form::text('username', '', array('class' => 'form-control', 'placeholder'=>'username')) }}
    </br>
    {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'password')) }}

    </br>
	{{ Form::submit('Entrar', array('class' => 'btn btn-info')) }}

{{ Form::close() }}

@stop


