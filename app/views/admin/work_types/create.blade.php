@extends('admin.layouts.scaffold')

@section('main')

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
	</ul>
@endif

{{ Form::open(array('class'=>'form-style', 'route' => 'admin.work_types.store')) }}
	<h2>Create Work type</h2>

    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}

	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@stop


