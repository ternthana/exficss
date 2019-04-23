@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        <a href="{{ url('/posts/create') }}" class="btn btn-success btn-sm" title="Add New Post">
                            <i class="fa fa-plus" aria-hidden="true"></i> ตั้งโพส
                        </a>

                        <form method="GET" action="{{ url('/posts') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>


                        <div class="row">
                            @foreach($posts as $item)
                                <div class="col-md-4">
                                        <div class="card" style="width: 100%;">
                                        <img class="card-img-top" src="{{$item->img_url}}" alt="Card image cap">
                                                <div class="card-body">
                                                <h5 class="card-title">{{$item->name}}</h5>
                                                <p class="card-text">{{$item->description}}</p>
                                                <a href="{{ url('/posts/' . $item->id) }}" title="View Post"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                                @if($item->check)
                                                <a href="{{ url('/posts/' . $item->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                <form method="POST" action="{{ url('/posts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                                @endif
                                                </div>

                                                <hr>
                                                <div class="card-footer">
                                                    โพสโดย<br>
                                                    {{$item->user->name}}
                                                    ({{$item->user->email}})
                                                    <hr>
                                                    <span>{{$item->comments->count()}} {{ str_plural('comment', $item->comments->count()) }}</span>

                                                </div>


                                        </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="table-responsive">

                            <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
