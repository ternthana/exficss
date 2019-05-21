@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row box-search">
            <form method="GET" action="{{ url('/posts') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control input-search" style="width: 602px" name="search" placeholder="ค้นหาร้านอาหาร"value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" style="border-radius: 0 20.5px 20.5px 0;" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="card-body">
                        {{-- <form method="GET" action="{{ url('/posts') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> --}}
                        
                        <div class="row">
                            @foreach($posts as $item)
                                <div class="col-md-4">
                                <div class="card post-{{$item->status}} card-item" style="width: 100%; margin-bottom: 26px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.02);">

                                    @if($item->status)
                                    <div class="on-status-1">ทำการแลกเปลี่ยนแล้ว</div>
                                    @endif
                                        <img class="card-img-top" src="{{$item->img_url}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="font-size: 16px; font-weight: 800;">{{$item->name}}</h5>
                                                    <p class="card-text" style="font-size: 16px;">{{$item->open_shop}}</p>
                                                    <a href="{{ url('/posts/' . $item->id) }}" title="View Post"><button class="btn btn-info btn-sm btn-review">รีวิว</button></a>

                                                {{-- @if($item->check)
                                                <a href="{{ url('/posts/' . $item->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                <form method="POST" action="{{ url('/posts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                                @endif --}}
                                                </div>
                                                
                                                {{-- <div class="card-footer">
                                                    โพสโดย<br>

                                                    {{$item->user->name}}
                                                    ({{$item->user->email}})
                                                    <hr>
                                                    <span>{{$item->comments->count()}} {{ str_plural('comment', $item->comments->count()) }}</span>

                                                </div> --}}


                                        </div>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ url('/posts/create') }}" class="btn btn-success btn-sm btn-create" title="Add New Post">
                            ตั้งร้าน
                        </a>

                        <div class="table-responsive">
                            <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
