@extends('layout')
@section('content')
<!--start-single-->
	<div class="single">
		<div class="container">
				<div class="single-top">
						<a href="#"><img class="img-responsive" src="{{asset('uploads/'.$post->image)}}" alt=" "></a>
					<div class=" single-grid">
						<h4>{{$post->title}}</h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Admin</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i>June 14, 2013</span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Views:145</span></li>
		  					</ul>		  						
						    {!!$post->desc!!}
					</div>
					<div class="comments heading">
						<h3>Bình luận bài viết</h3>
                    </div>
					
    				<div class="comment-bottom heading">
    					<h3>Bình luận</h3>
    					<form>	
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
						<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
						<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
							<input type="submit" value="Gửi bình luận">
					</form>
    				</div>
				</div>	
			</div>					
	</div>
    @endsection