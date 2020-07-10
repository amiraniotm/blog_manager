@extends('layouts.app')

@section('title','| Homepage')

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome!</h1>
            <p>Thanks for visiting</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">

          @foreach($posts as $post)

            <div class="post">
              <h3>{{ $post->title }}</h3>
              <p>{{ substr($post->body,0,300) }}{{ strlen($post->body) > 300 ? '...' : ''  }}</p>
              <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">{{ __('Read more') }}</a>
            </div>
            <hr>

          @endforeach
        </div>
      </div>
@endsection
