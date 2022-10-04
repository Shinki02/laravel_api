	@extends('layout')
	@section('content')
	@include('pages.banner')
	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
				<div class="about-tre">
						<div class="a-1">
                            @foreach($all_post as $key => $post)
                            
                            <div class="row" style="margin:5px">
							<a href="{{route('danh-muc.show',['id'=>$post->categories->id,'slug'=>Str::slug($post->categories->title)])}}"><h6>{{$post->categories->title}}</h6></a>
                            <a href="{{route('bai-viet.show',['id'=>$post->id])}}">
                                <div class="col-md-6 abt-left">
                                    <img width="100%" src="{{asset('uploads/'.$post->image)}}" alt="{{Str::slug($post->title)}}" />
                                </div>
                                <div class="col-md-6 abt-left">    
                                    
                                    <h3>{{$post->title}}</h3>
                                    <p>{!!$post->short_desc!!}</p>''
                                    <label>{{$post->post_date}}</label>
                                </div>
                                
							           <a href="{{route('bai-viet.show',['id'=>$post->id])}}">Đọc tiếp...</a>
						        
                            </div>
                            </a>
                            @endforeach
                            <div class="clearfix"></div>
						</div>
					</div>	
				</div>
				<div class="col-md-4 about-right heading">
					
					<div class="abt-2">
						<h3>Mới cập nhật</h3>
						@foreach($newest_post as $key => $new)
						
							<div class="might-grid">
							<a href="{{route('danh-muc.show',['id'=>$new->categories->id,'slug'=>Str::slug($new->categories->title)])}}"><h6>{{$new->categories->title}}</h6></a>
							<a href="{{route('bai-viet.show',['id'=>$new->id])}}">
								<div class="grid-might">
									<img src="{{asset('uploads/'.$new->image)}}" class="img-responsive" alt="">
								</div>
								<div class="might-top">
									<h4><a href="{{route('bai-viet.show',['id'=>$new->id])}}">{{$new->title}}</a></h4>
									<p>{!!substr($new->short_desc,0,100)!!}....</p> 
									<a href="{{route('bai-viet.show',['id'=>$new->id])}}">Đọc tiếp...</a>
								</div>
								<div class="clearfix"></div>
								</a>
							</div>	
							
						@endforeach			    			
					</div>
					<div class="abt-2">
						<h3>Top lượt xem</h3>
						<ul>
						@foreach($viewest_post as $key => $view)
							<li><a href="{{route('bai-viet.show',['id'=>$view->id])}}">{{$view->title}}</a> </li>
						@endforeach
						</ul>	
					</div>
					<div class="abt-2">
						<h3>NEWS LETTER</h3>
						<div class="news">
							<form>
								<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
								<input type="submit" value="Đăng ký">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
    @endsection