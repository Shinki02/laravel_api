@extends('layout')
@section('content')
<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
				    
					<div class="about-one">
						<h3>{{$title_category->title}}</h3>
					</div>
					<div class="about-two">
						<p>{{$title_category->short_desc2}}</p>		
						<ul>
							<li><p>Share : </p></li>
							<li><a href="#"><span class="fb"> </span></a></li>
							<li><a href="#"><span class="twit"> </span></a></li>
							<li><a href="#"><span class="pin"> </span></a></li>
							<li><a href="#"><span class="rss"> </span></a></li>
							<li><a href="#"><span class="drbl"> </span></a></li>
						</ul>
					</div>	
					<div class="about-tre">
						<div class="a-1">
                            @foreach($category_post as $key => $post)
                            
                            <div class="row" style="margin:5px">
                            <a href="{{route('bai-viet.show',['id'=>$post->id])}}">
                                <div class="col-md-6 abt-left">
                                    <img width="100%" src="{{asset('uploads/'.$post->image)}}" alt="{{Str::slug($post->title)}}" />
                                </div>
                                <div class="col-md-6 abt-left">    
                                    <h6>{{$post->categories->title}}</h6>
                                    <h3>{{$post->title}}</h3>
                                    <p>{!!$post->short_desc!!}</p>''
                                    <label>May 29, 2015</label>
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
						<h3>Danh mục gợi ý</h3>
						<ul>
							@foreach($category_recomment as $key => $cate_recom)
							<li><a href="{{route('danh-muc.show',['id'=>$cate_recom->id,'slug'=>Str::slug($cate_recom->title)])}}">{{$cate_recom->title}}</a></li>
							@endforeach
						</ul>	
				</div>

				<div class="abt-2">
						<h3>Top lượt xem</h3>
						@foreach($viewest_post as $key => $new)
						<a href="{{route('bai-viet.show',['id'=>$new->id])}}">
							<div class="might-grid">
								<div class="grid-might">
									<img src="{{asset('uploads/'.$new->image)}}" class="img-responsive" alt="">
								</div>
								<div class="might-top">
									<h4><a href="{{route('bai-viet.show',['id'=>$new->id])}}">{{$new->title}}</a></h4>
									<p>{!!substr($new->short_desc,0,100)!!}....</p> 
									<a href="{{route('bai-viet.show',['id'=>$new->id])}}">Đọc tiếp...</a>
								</div>
								<div class="clearfix"></div>
							</div>	
							</a>
						@endforeach			    			
				</div>
					
					
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
    @endsection