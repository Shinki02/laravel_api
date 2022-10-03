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
						<h3>Mới cập nhật</h3>
						@foreach($newest_post as $key => $new)
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
					<div class="abt-2">
						<h3>Top lượt xem</h3>
						<ul>
							<li><a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </a></li>
							<li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
							<li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
							<li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
							<li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
							<li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
							<li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li>
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