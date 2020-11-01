
@extends('frontend.layout3',['activePage' => 'blog'])

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{__('front.Blog')}}</h2><span>{{__('front.Latest News')}}</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="/">{{__('front.menu_home')}}</a></li>
						<li>{{__('front.Blog')}}</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-lg-9 col-md-8 padding-right-30">


			<!-- Blog Post -->
			<div class="blog-post single-post">
				
				<!-- Img -->
				<img src="{{asset('images')}}/blog/{{$blog->photo}}" alt="{{$blog->title}}">
				
				<!-- Content -->
				<div class="post-content">

					<h3>{{$blog->title}}</h3>

					<ul class="post-meta">
						<li>{{App\Http\Controllers\Controller::getUser($blog->created_by)}}</li>
						<li>{{$blog->created_at}}</li>
						<li>{{App\Http\Controllers\frontend\FBlogController::getBlogReviewsCount($blog->id)}} Comments</li>
					</ul>

					<p>{{$blog->article}}</p>



					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- Blog Post / End -->


			<!-- Post Navigation -->
			<ul id="posts-nav" class="margin-top-0 margin-bottom-45">
			@if($next)
				<li class="next-post">
					<a href="{{route('frontend.blog.fdetail',$next ?? 0)}}"><span>Next Post</span>{{$nextTitle ?? ''}}</a>
				</li>
			@endif
			@if($previous)
				<li class="prev-post">
					<a href="{{route('frontend.blog.fdetail',$previous ?? 0)}}"><span>Previous Post</span>{{$previousTitle ?? ''}}</a>
				</li>
			@endif
			</ul>

			<div class="margin-top-50"></div>

			<!-- Reviews -->
			<section class="comments">
			<h4 class="headline margin-bottom-35">Comments <span class="comments-amount">({{App\Http\Controllers\frontend\FBlogController::getBlogReviewsCount($blog->id)}})</span></h4>

				<ul>
					@foreach($comments as $comment)
					<li>
						<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by">{{$comment->name}}<span class="date">{{date('j F Y', strtotime($comment->created_at))}}</span>
								<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
							</div>
							<p>{{$comment->comment}}</p>
						</div>

						<ul>
							@foreach($comment->subComments as $subComment)
							<li>
								<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">{{$subComment->name}}<span class="date">{{date('j F Y', strtotime($subComment->created_at))}}</span>
										<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
									</div>
									<p>{{$subComment->comment}}</p>
								</div>

								<ul>
									@foreach($subComment->subSubComments as $subSubComment)
									<li>
										<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">{{$subSubComment->name}}<span class="date">{{date('j F Y', strtotime($subSubComment->created_at))}}</span>
												<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
											</div>
											<p>{{$subSubComment->comment}}</p>
										</div>
									</li>
									@endforeach
								</ul>
							</li>
							@endforeach
						</ul>

					</li>
					@endforeach
				 </ul>

			</section>
			<div class="clearfix"></div>


			<!-- Add Comment -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-35">Add Review</h3>
	
				<!-- Review Comment -->
				<form id="add-comment" class="add-comment">
					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="text" value=""/>
							</div>
						</div>

						<div>
							<label>Comment:</label>
							<textarea cols="40" rows="3"></textarea>
						</div>

					</fieldset>

					<button class="button">Submit Comment</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->

	</div>
	<!-- Content / End -->



	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
				<div class="sidebar right">
				{{ Form::open(['action'=>'App\Http\Controllers\frontend\FBlogController@search','method'=>'GET']) }}
					<!-- Widget -->
					<div class="widget">
						<h3 class="margin-top-0 margin-bottom-25">Search Blog</h3>
						<div class="search-blog-input">
							<div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" name="searchBlog" value="{{$searchBlog ?? ''}}" /></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- Widget / End -->
					{{ Form::close() }} 

					<!-- Widget -->
					<div class="widget margin-top-40">
						<h3>Got any questions?</h3>
						<div class="info-box margin-bottom-10">
							<p>Having any questions? Feel free to ask!</p>
							<a href="/contact" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
						</div>
					</div>
					<!-- Widget / End -->


					<!-- Widget -->
					<div class="widget margin-top-40">

						<h3>Popular Posts</h3>
						<ul class="widget-tabs">
							@foreach($populairePost as $blog)
							<li>
								<div class="widget-content">
										<div class="widget-thumb">
										<a href="{{route('frontend.blog.fdetail',$blog->id)}}"><img src="{{asset('images')}}/blog/{{$blog->photo}}" alt="{{$blog->title}}"></a>
									</div>

									<div class="widget-text">
										<h5><a href="pages-blog-post.html">{{$blog->title}}</a></h5>
										<span>{{App\Http\Controllers\Controller::getUser($blog->created_by)}}, {{$blog->created_at}}</span>
									</div>
									<div class="clearfix"></div>
								</div>
							</li>
							@endforeach

						</ul>

					</div>
					<!-- Widget / End-->


					<!-- Widget -->
					<div class="widget margin-top-40">
						<h3 class="margin-bottom-25">Social</h3>
						<ul class="social-icons rounded">
							<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
							<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
							<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
							<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
						</ul>

					</div>
					<!-- Widget / End-->

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>
</div>
@endsection
