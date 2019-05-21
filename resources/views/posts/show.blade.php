@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.12);">
                {{-- <div class="card">
                    <div class="card-header">{{ $post->name }}
                    <hr>
                    โพสโดย {{$post->user->name}} ({{$post->user->email}})
                    </div> --}}
                    <div class="card-body">
                        {{-- <a href="{{ url('/posts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> --}}
                        @if($post->check)
                            <a href="{{ url('/posts/' . $post->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('posts' . '/' . $post->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>

                            <form method="POST" action="{{ url('post/update_status' . '/' . $post->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success btn-sm" title="Delete Post" onclick="return confirm(&quot;ทำการยืนยัน โพสของคุณจะถูกปิดการแสดงความคิดเห็นและเปลี่ยนสถานะ?&quot;)"><i class="fa fa-correct" aria-hidden="true"></i> ฉันได้ทำการแลกเปลี่ยนเสร็จสิ้น</button>
                            </form>
                        @endif

                        <div style="margin-top: 30px;"></div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-weight: 800;">{{ $post->name }}</h5>
                        </div>

                        <div class="form-group">
                            <img src="{{$post->img_url}}" height="300" width="100%">
                        </div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-size:16px; font-weight: 800;">รายละเอียดของร้าน (วันเวลาเปิดปิด)</h5>
                            <p class="card-text" style="font-size:14px;">{{ $post->open_shop }}</p>
                        </div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-size:16px; font-weight: 800;">ที่อยู่ของร้าน</h5>
                            <p class="card-text" style="font-size:14px;">{{ $post->address }}</p>
                        </div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-size:16px; font-weight: 800;">เบอร์โทรของร้าน</h5>
                            <p class="card-text" style="font-size:14px;">{{ $post->mobile }}</p>
                        </div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-size:16px; font-weight: 800;">ที่อยู่ของร้าน</h5>
                            <p class="card-text" style="font-size:14px;">{{ $post->address }}</p>
                        </div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-size:16px; font-weight: 800;">ช่วงราคา</h5>
                            <p class="card-text" style="font-size:14px;">{{ $post->price }}</p>
                        </div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-size:16px; font-weight: 800;">Facebook ของร้าน</h5>
                            <p class="card-text" style="font-size:14px;">{{ $post->facebook }}</p>
                        </div>

                        <div class="form-group">
                            <h5 class="card-title" style="font-size:16px; font-weight: 800;">Instagram ของร้าน</h5>
                            <p class="card-text" style="font-size:14px;">{{ $post->instagram }}</p>
                        </div>

                    </div>
            </div>
                    <div class="col-md-12" style="margin-top: 28px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.12); padding-bottom: 22px;">
                            <div class="p-4">
                                    <h3 style="font-size: 16px; font-weight: 800;">แสดงความคิดเห็น</h3>
                                    @if (Auth::check() && !$post->status)
                                        {{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}
                                        <p>{{ Form::textarea('body', old('body')) }}</p>
                                        <p>{{ Form::input('file', old('img_url')) }}</p>
                                        {{ Form::hidden('post_id', $post->id) }}
                                        <p class="btn-submit-comment">{{ Form::submit('แสดงความคิดเห็น') }}</p>
                                        {{ Form::close() }}
                                    @else
                                        <h3 class="p-4">
                                        ความคิดเห็นถูกปิดการใช้งาน เนื่องจาก โพสนี้ได้ทำการแลกเปลี่ยนเรียบร้อยแล้ว
                                        </h3>
                                    @endif
                                    
                            </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 28px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.12); padding-bottom: 22px;">
                            <div class="p-4">
                                    @forelse ($post->comments as $comment)
                                        <h3 style="font-size: 16px; font-weight: 800;">ความคิดเห็น</h3>
                                        <p>{{ $comment->body }}</p>
                                        <h3 style="font-size: 16px; font-weight: 800;">รูปภาพหรือวีดีโอ</h3>
                                        <img src="{{ $comment->img_url }}" class="comment-img">
                                        <p>Post by {{ $comment->user->name }}</p>
                                        <hr>
                                        @empty
                                        <p></p>
                                    @endforelse
                            </div>
                    </div>
    
        </div>
        </div>
    </div>

@endsection
