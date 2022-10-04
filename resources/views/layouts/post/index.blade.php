@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{Session::get('success')}}</p>
    </div>
    @endif
    @if (Session::has('failure'))
    <div class="alert alert-danger">
    <p>{{ Session::get('failure') }}</p>
    @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Lượt xem</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Mô tả ngắn</th>
                            <th scope="col">Thuộc danh mục</th>
                            <th scope="col">Ngày thêm</th>
                            <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach($post as $p)
                            @php
                            $i++;
                            @endphp
                            <tr>
                            <th scope="row">{{$i}}</th>
                            <th scope="row">{{$p->title}}</th>
                            <th scope="row">{{$p->views}}</th>
                            <th scope="row"><img width="100px" src="{{asset('uploads/'.$p->image)}}"></th>
                            <th scope="row">{!!substr($p->short_desc,0,90)!!}</th>
                            <th scope="row">{{$p->categories}}</th>
                            <th scope="row">{{$p->post_date}}</th>
                            <td>
                                <form action="{{route('post.destroy',[$p->id])}}"method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger mb-2" type="submit" value="Delete" />
                                </form>
                                
                                <a class="btn btn-waring btn-sm"  href="{{route('post.show',[$p->id])}}">Edit</a>
                           
                            </tr>
                            @endforeach

                        </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    