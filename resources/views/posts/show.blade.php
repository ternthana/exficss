@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $post->name }}
                    <hr>
                    โพสโดย {{$post->user->name}} ({{$post->user->email}})
                    </div>
                    <div class="card-body">

                        <a href="{{ url('/posts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if($post->check)

                        <a href="{{ url('/posts/' . $post->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('posts' . '/' . $post->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                        <img src="{{$post->img_url}}" height="200" class="img-fluid">
                            <table class="table">
                                <tbody>
                                    <tr><th> Name </th><td> {{ $post->name }} </td></tr><tr><th> Description </th><td> {{ $post->description }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="p-4">
                            <h3>Comments</h3>
                            @if (Auth::check())
                            {{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}
                            <p>{{ Form::textarea('body', old('body')) }}</p>
                            {{ Form::hidden('post_id', $post->id) }}
                            <p>{{ Form::submit('Send') }}</p>
                            {{ Form::close() }}
                            @endif
                            @forelse ($post->comments as $comment)
                            <p>{{ $comment->user->name }} {{$comment->created_at}}</p>
                            <p>{{ $comment->body }}</p>
                            <hr>
                            @empty
                            <p>This post has no comments</p>
                            @endforelse
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
