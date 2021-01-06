
@extends('frontend.layout.layout',['activePage' => 'blog','footerPage' => 'true'])

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
						<li>{{date('j F Y', strtotime($blog->created_at))}}</li>
						<li>{{App\Http\Controllers\frontend\FBlogController::getBlogReviewsCount($blog->id)}} {{trans('front.blog_comment')}}</li>
					</ul>

					<p>{{$blog->article}}</p>



					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- Blog Post / End -->


			<!-- Post Navigation -->
			<ul id="posts-nav" class="margin-top-0 margin-bottom-45">
			@if($next)
				<li class="next-post">
					<a href="{{route('frontend.blog.fdetail',$next ?? 0)}}"><span>{{trans('front.next_post')}} <i class="fas fa-chevron-right"></i></span>{{$nextTitle ?? ''}}</a>
				</li>
			@endif
			@if($previous)
				<li class="prev-post">
					<a href="{{route('frontend.blog.fdetail',$previous ?? 0)}}"><span><i class="fas fa-chevron-left"></i> {{trans('front.previous_post')}}</span>{{$previousTitle ?? ''}}</a>
				</li>
			@endif
			</ul>

			<div class="margin-top-50"></div>

			<!-- Reviews -->
			<section class="comments">
				<h4 class="headline margin-bottom-35"> {{trans('front.blog_comment')}} <span class="comments-amount">({{App\Http\Controllers\frontend\FBlogController::getBlogReviewsCount($blog->id)}})</span></h4>
				<ul>
				@include('frontend.blog.comment', ['comments' => $comments, 'id_blogs' => $blog->id])
				</ul>
			</section>
			<div class="clearfix"></div>


			<!-- Add Comment -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-35">{{__('front.Add comment')}}</h3>

				<!-- Review Comment -->
				{{ Form::open(['action'=>'App\Http\Controllers\frontend\FBlogController@store','method'=>'POST','id'=>'add-comment','class'=>"add-comment"]) }}
				<input type="hidden" name="id_blogs" value="{{ $blog->id }}">
				<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>{{__('front.Name')}} :</label>
								{{Form::text('name','')}}
							</div>

							<div class="col-md-6">
								<label>{{__('front.Email')}} :</label>
								{{Form::email('email','')}}
							</div>
						</div>

						<div>
							<label>{{__('front.Comment')}} :</label>
							<textarea cols="40" rows="3" name="comment"></textarea>
						</div>

					</fieldset>

					{{Form::submit(__('front.Submit Comment'))}}

					<div class="clearfix"></div>
					{{ Form::close() }}

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
							<a href="{{route('contact')}}" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
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
										<span>{{App\Http\Controllers\Controller::getUser($blog->created_by)}}, {{date('j F Y', strtotime($blog->created_at))}}</span>
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
						<ul class="social-icons color rounded">
							<li><a class="facebook" href="https://www.facebook.com/Campunite-357655531438672"><i class="fa fa-facebook"></i></a></li>
							<li><a class="twitter" href="https://twitter.com/campunite"><i class="fa fa-twitter"></i></a></li>
							<li><a class="pinterest" href="https://www.instagram.com/campunite.official"><i class="fa fa-instagram"></i></a></li>
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
