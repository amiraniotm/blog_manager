@extends('layouts.app')

@section('content')

<div class="row">
  {!! Form::model($post,array('route'=>array('admin.update',$post->id), 'method'=>'PUT')) !!}
  <div class="col-md-12">
    {{ Form::label('title','Title:') }}
    {{ Form::text('title',null, array('class'=>'form-control input-lg')) }}
    {{ Form::label('slug','Slug:') }}
    {{ Form::text('slug',null,array('class'=>'form-control')) }}
    <small class="form-text text-muted">This is an identifier for your post. Use dashes and alphanum characters, for example: first-post</small>
    {{ Form::label('body','Body:') }}
    {{ Form::textarea('body',null, array('class'=>'form-control')) }}
  </div>
  <div class="col-md-4">
    <hr>
    <div class="row">
      <div class="col-sm-4">
        {!! Html::linkRoute('admin.show','Cancel',array($post->id),array('class'=>"btn btn-danger")) !!}
      </div>
      <div class="col-sm-4">
        {{ Form::submit('Save changes',array('class'=>'btn btn-success'))}}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
