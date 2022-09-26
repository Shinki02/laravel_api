@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label> 
                            <input type="text" placeholder="Tiêu đề..." class="form-control" name="title">
                            <label for="title">Hình ảnh</label> 
                            <input type="file" class="form-control" name="image">  
                            <label for="title">Mô tả ngắn</label> 
                            <Textarea name="short_desc" id="ckeditor_shortdesc" placeholder="Mô tả ngắn..." row="5" class="form-control" style="resize:none"></Textarea>
                            <label for="title">Nội dung</label> 
                            <Textarea id="ckeditor_desc" name="desc" placeholder="Nội dung" row="5" class="form-control" style="resize:none"></Textarea>
                            <label for="title">Danh mục bài viết</label>
                            <select name="category_id" class="form-control">
                                @foreach($category as $key => $cate)
                                <option value="{{$cate->id}}">{{$cate->title}}</option>
                                @endforeach
                            </select>
                            <input type="submit" name="themdanhmuc" class="btn btn -primary mt-2" value="Thêm bài viết">               
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    