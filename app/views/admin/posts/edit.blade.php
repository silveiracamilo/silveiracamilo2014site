@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::model($post, array('class'=>'form-style', 'files'=>true, 'method' => 'PATCH', 'route' => array('admin.posts.update', $post->id))) }}
	<h2>Edit Post</h2>

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::text('description') }}

    {{ Form::label('post', 'Post:') }}
    {{ Form::textarea('post', null, array('style'=>'width:100%;')) }}

    {{ Form::label('imageN', 'Image:') }}
    {{ Form::file('imageN') }}

    {{ Form::hidden('image') }}

    </br></br>
	{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.posts.show', 'Cancel', $post->id, array('class' => 'btn')) }}

{{ Form::close() }}

@stop
