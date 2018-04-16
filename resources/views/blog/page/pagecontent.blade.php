@extends('blog.layouts.master')

@section('page-breadcrumb')
<section id="page-breadcrumb">
	<div class="vertical-center sun">
		<div class="container">
			<div class="row">
				<div class="action">
					<div class="col-sm-12">
						<h1 class="title">Anh - Details</h1>
						{{-- <p>Blog </p> --}}
					</div>                                                                                
				</div>
			</div>
		</div>
	</div>
</section>
<!--/#page-breadcrumb-->
@endsection


@section('content')
<section id="blog-details" class="padding-top">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-7">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						@foreach ($post as $post)
						<div class="single-blog blog-details two-column">
							<div class="post-thumb">
								<a href="#"><img src="{{ $post['thumbnail'] }}" class="img-responsive" alt=""></a>
								<div class="post-overlay">
									<span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
								</div>
							</div>
							<div class="post-content overflow">
								<h2 class="post-title bold"><a href="#">{{ $post['title'] }}</a></h2>
								<h3 class="post-author"><a href="#">{{ $post['user_id'] }}</a></h3>
								<div class="text-justify">
									{{ $post['content'] }}
								</div>
								<div class="post-bottom overflow">
									<ul class="nav navbar-nav post-nav">
										<li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
										<li><a href="#"><i class="fa fa-heart"></i>{{ $post['view'] }} Love</a></li>
										<li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
									</ul>
								</div>
								<div class="blog-share">
									<span class='st_facebook_hcount'></span>
									<span class='st_twitter_hcount'></span>
									<span class='st_linkedin_hcount'></span>
									<span class='st_pinterest_hcount'></span>
									<span class='st_email_hcount'></span>
								</div>
								<div class="author-profile padding">
									<div class="row">
										<div class="col-sm-2">
											<img src="images/blogdetails/1.png" alt="">
										</div>
										<div class="col-sm-10">
											<h3>Rodrix Hasel</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
											<span>Website:<a href="www.jooomshaper.com"> www.jooomshaper.com</a></span>
										</div>
									</div>
								</div>


								<div class="response-area">
									<h2 class="bold">Comments</h2>
									<ul class="media-list">
										<li class="media">
											<div class="post-comment">
												<a class="pull-left" href="#">
													<img class="media-object" src="images/blogdetails/2.png" alt="">
												</a>
												<div class="media-body">
													<span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
													<ul class="nav navbar-nav post-nav">
														<li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
														<li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
													</ul>
												</div>
											</div>
											<div class="parrent">
												<ul class="media-list">
													<li class="post-comment reply">
														<a class="pull-left" href="#">
															<img class="media-object" src="images/blogdetails/3.png" alt="">
														</a>
														<div class="media-body">
															<span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
															<ul class="nav navbar-nav post-nav">
																<li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
															</ul>
														</div>
													</li>
												</ul>
											</div>
										</li>
										<li class="media">
											<div class="post-comment">
												<a class="pull-left" href="#">
													<img class="media-object" src="images/blogdetails/4.png" alt="">
												</a>
												<div class="media-body">
													<span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
													<ul class="nav navbar-nav post-nav">
														<li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
														<li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
													</ul>
												</div>
											</div>
										</li>

									</ul>                   
								</div><!--/Response-area-->
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-5">
				<div class="sidebar blog-sidebar">
					
					<div class="sidebar-item categories">
						<h3>Categories</h3>
						<ul class="nav navbar-stacked">
							<li><a href="#">Lorem ipsum<span class="pull-right">(1)</span></a></li>
							<li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a></li>
						</ul>
					</div>
					<div class="sidebar-item tag-cloud">
						<h3>Tag</h3>
						<ul class="nav nav-pills">
							<li><a href="#">Corporate</a></li>
						</ul>
					</div>
					<div class="sidebar-item popular">
						<h3>Latest Photos</h3>
						<ul class="gallery">
							<li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
							<li><a href="#"><img src="images/portfolio/popular2.jpg" alt=""></a></li>
							<li><a href="#"><img src="images/portfolio/popular3.jpg" alt=""></a></li>
							<li><a href="#"><img src="images/portfolio/popular4.jpg" alt=""></a></li>
							<li><a href="#"><img src="images/portfolio/popular5.jpg" alt=""></a></li>
							<li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/#blog-->
@endsection