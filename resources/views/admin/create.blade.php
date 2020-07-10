@extends('layouts.app')

@section('title', '| Create New Post')

@section('stylesheets')

    {{!! Html::style('css/parsley.css') !!}}

@endsection

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>Create New Post</h1>
      <hr>
      {!! Form::open(array('route' => 'admin.store','data-parsley-validate'=>'')) !!}
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,array('class'=>'form-control','required'=>''))}}

        {{ Form::label('slug','Slug:',array('style'=> 'margin-top:20px;')) }}
        {{ Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255')) }}
        <div class="col-md-12">
          <small class="form-text text-muted">This is an identifier for your post. Use dashes and alphanum characters, for example: first-post</small>
        </div>

        {{Form::label('body','Post Body:',array('style'=> 'margin-top:20px;'))}}
        {{Form::textarea('body',null,array('class'=>'form-control','required'=>''))}}
        <div class="container">
          {{Form::submit('Create Post',array('class' => 'btn btn-success btn-lg','style'=> 'margin-top: 20px; margin-bottom:20px;'))}}
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@endsection

@section('scripts')

    {{!! Html::script('js/parsley.min.js') !!}}

@endsection
