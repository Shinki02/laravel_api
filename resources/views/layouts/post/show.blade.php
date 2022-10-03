@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label> 
                            <input type="text" value="{{$post->title}}" class="form-control" name="title">
                            <label for="title">Lượt views</label> 
                            <input type="text" value="{{$post->views}}" class="form-control" name="views">
                            <label for="title">Hình ảnh</label> 
                            <input type="file" class="form-control" name="image">
                            <p><img width="200px" src="{{asset('uploads/'.$post->image)}}"></p>
                            <label for="title">Mô tả ngắn</label> 
                            <Textarea name="short_desc" id="ckeditor_shortdesc" row="5" class="form-control" style="resize:none">{{$post->short_desc}}</Textarea>
                            <label for="title">Nội dung</label> 
                            <Textarea id="ckeditor_desc" name="desc" row="5" class="form-control" style="resize:none">{{$post->desc}}</Textarea>
                            <label for="title">Danh mục bài viết</label>
                            <select name="category_id" class="form-control">
                                @foreach($category as $key => $cate)
                                <option {{ $cate -> id==$post->category_id ?  'selected' : ' ' }} value="{{$cate->id}}">{{$cate->title}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="submit" name="capnhatdanhmuc" class="btn btn -primary mt-2" value="Cập nhật bài viết">                -->
                            <button type="submit">Cap nhat</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    