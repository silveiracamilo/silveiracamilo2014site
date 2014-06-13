@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('class'=>'form-style', 'files'=>true, 'route' => 'admin.posts.store')) }}
    
    <h2>Create Post</h2>

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::text('description') }}

    {{ Form::label('post', 'Post:') }}
    {{ Form::textarea('post', null, array('style'=>'width:100%;')) }}

    {{ Form::label('image', 'Image:') }}
    {{ Form::file('image') }}

    </br></br>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}

{{ Form::close() }}

@stop


