@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-top: 16px; font-size: 16px; font-weight: 800;">ตั้งร้าน</div>
                    <div class="card-body">
                        {{-- <a href="{{ url('/posts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> --}}

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/posts') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('posts.form', ['formMode' => 'create'])

                        </form>

                        <a href="{{ url('/posts') }}" title="Back"><button class="btn btn-warning btn-create" style="font-weight: 400; opacity: 0.8">ยกเลิก</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
