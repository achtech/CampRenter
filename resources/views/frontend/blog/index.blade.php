
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
			<div class="col-lg-9 col-md-8 padding-right-30">
				<div class="row">

				@foreach($blogs as $blog)
					<!-- Listing Item -->
					<div class="col-lg-12 col-md-12">
						<div class="listing-item-container list-layout">
							<a href="{{route('frontend.blog.fdetail',$blog->id)}}" class="listing-item">

								<!-- Image -->
								<div class="listing-item-image">
									<img src="{{asset('images')}}/blog/{{$blog->photo}}" alt="{{$blog->title}}">
								</div>

								<!-- Content -->
								<div class="listing-item-content">
									<div class="listing-item-inner">
									<h3>{{$blog->title}} <i class="verified-icon"></i></h3>
									<div class="row">
										<div class="col-lg-4"><div class="numerical-rating mid" data-rating="{{App\Http\Controllers\Controller::getUser($blog->created_by)}}"></div></div>
										<div class="col-lg-4"><div class="numerical-rating mid" data-rating="{{$blog->created_at}}"></div></div>
										<div class="col-lg-4"><div class="numerical-rating mid" data-rating="{{App\Http\Controllers\frontend\FBlogController::getBlogReviewsCount($blog->id)}}/comment"></div></div>
									</div>
										<div class="star-rating" data-rating="5">
											<div class="rating-counter">({{App\Http\Controllers\frontend\FBlogController::getBlogReviewsCount($blog->id)}} reviews)</div>
										</div>
									</div>

									<span class="like-icon"></span>
								</div>
							</a>
						</div>
					</div>
					<!-- Listing Item / End -->
				@endforeach
				</div>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						<div class="pagination-container margin-top-20 margin-bottom-40">
							<nav class="pagination">
							{{ $blogs->links() }}
							</nav>
						</div>
					</div>
				</div>
				<!-- Pagination / End -->

			</div>

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
	</div>
</div>
@endsection
