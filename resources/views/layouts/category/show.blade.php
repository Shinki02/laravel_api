@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật danh mục bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{route('category.update',[$category->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label> 
                            <input type="text" value="{{$category->title}}" class="form-control" name="title">
                            <label for="title">Mô tả danh mục</label> 
                            <textarea  placeholder="Mô tả danh mục..." class="form-control" name="short_desc2" row="5" style="resize: none">{{$category->short_desc2}}</textarea>   
                            <input type="submit" name="themdanhmuc" class="btn btn -primary mt-2" value="Cập nhật">               
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    