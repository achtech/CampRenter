
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
									<h3>{{$blog->title}} </h3>
									<div class="row">
										<div class="col-lg-4"><div class="blog-title " >{{App\Http\Controllers\Controller::getUser($blog->created_by)}}</div></div>
										<div class="col-lg-4"><div class="blog-title " >{{date('j F Y', strtotime($blog->created_at))}}</div></div>
										<div class="col-lg-4"><div class="blog-title " >{{App\Http\Controllers\frontend\FBlogController::getBlogReviewsCount($blog->id)}} {{trans('front.blog_comment')}}</div></div>
									</div>

									<div class="rating-counter">{{ Illuminate\Support\Str::limit($blog->article, 100)}}

									</div>

									</div>
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
						<h3 class="margin-top-0 margin-bottom-25">{{trans('front.search_blog')}}</h3>
						<div class="search-blog-input">
							<div class="input"><input class="search-field" type="text" placeholder="{{trans('front.type_and_hit_enter')}}" name="searchBlog" value="{{$searchBlog ?? ''}}" /></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- Widget / End -->
					{{ Form::close() }}

					<!-- Widget -->
					<div class="widget margin-top-40">
						<h3>{{trans('front.any_question')}}</h3>
						<div class="info-box margin-bottom-10">
							<p>{{trans('front.feel_free_to_ask')}}</p>
							<a href="{{route('contact')}}" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> {{trans('front.drop_line')}}</a>
						</div>
					</div>
					<!-- Widget / End -->


					<!-- Widget -->
					<div class="widget margin-top-40">

						<h3>{{trans('front.popular_posts')}}</h3>
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
						<h3 class="margin-bottom-25">{{trans('front.footer_social')}}</h3>
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
