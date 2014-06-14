@extends('admin.layouts.scaffold')

@section('main')

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
	</ul>
@endif

{{ Form::model($work_type, array('class'=>'form-style', 'method' => 'PATCH', 'route' => array('admin.work_types.update', $work_type->id))) }}
    <h2>Edit Work type</h2>

    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}

	{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.work_types.show', 'Cancel', $work_type->id, array('class' => 'btn')) }}
{{ Form::close() }}

@stop
