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
    <p>{{ Session::get('success') }}</p>
    @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh mục bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach($category as $categories)
                            @php
                            $i++;
                            @endphp
                            <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$categories->title}}</td>
                            <td>
                                <form action="{{url('api/v1/category/delete',['Id'=>$categories->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger mb-2" type="submit" value="Delete" />
                                </form>
                        
                                <a class="btn btn-waring btn-sm" href="{{route('category.show',[$categories->id])}}">Edit</a>

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
    