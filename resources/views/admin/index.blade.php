@extends('layouts.app')

@section('title', '| Main Page')

@section('content')

  <div class="row">
    <div class="col-md-9">
      <h1>All Posts</h1>
    </div>

    <div class="col-md-2">
      <a href="{{route('admin.create')}}" class="btn btn-block btn-primary">Create New Post</a>
    </div>
    <div class="col-md-12">
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>Title</th>
          <th>Body</th>
          <th>Created at</th>
          <th>Last updated</th>
          <th>Status</th>
          <th>Options</th>
          <th></th>
        </thead>
        <tbody>

          @foreach($posts as $post)
            <tr>
              @if ($post->status === 'posted')
                <td>{{ substr($post->title,0,25) }}{{ strlen($post->title) > 25 ? '...' : ''  }}</td>
                <td>{{ substr($post->body,0,50) }}{{ strlen($post->body) > 50 ? '...' : ''  }}</td>
                <td>{{ date('M j, Y',strtotime($post->created_at)) }}</td>
                <td>{{ date('M j, Y',strtotime($post->updated_at)) }}</td>
              @elseif ($post->status === 'draft' || $post->status === 'deleted')
                <td><label class="text-muted">{{ substr($post->title,0,25) }}{{ strlen($post->title) > 25 ? '...' : ''  }}</label></td>
                <td><label class="text-muted">{{ substr($post->body,0,50) }}{{ strlen($post->body) > 50 ? '...' : ''  }}</label></td>
                <td><label class="text-muted">{{ date('M j, Y',strtotime($post->created_at)) }}</label></td>
                <td><label class="text-muted">{{ date('M j, Y',strtotime($post->updated_at)) }}</label></td>
              @endif
              <td>{{ $post->status }}</td>
              <td> <a href="{{ route('admin.show', $post->id)}}" class="btn btn-sm">View</a>
                  <a href="{{ route('admin.edit', $post->id)}}" class="btn btn-sm">Edit</a></td>
              <td>{!! Form::open(array('route' => array('admin.destroy',$post->id),'method'=>'DELETE')) !!}

                      {!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}

                    {!! Form::close() !!}
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
      <div class="text-center">
        {!! $posts->links(); !!}
      </div>
    </div>
  </div>
@stop
