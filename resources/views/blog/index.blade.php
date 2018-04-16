@extends('blog.layouts.master')


@section('page-breadcrumb')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Anh</h1>
                            <p>Every girl say Anh, but not Me</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->
@endsection



@section('content')
<section id="blog" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">                         
                    <div class="col-sm-12 col-md-12">
                        @foreach ($posts as $post)
                        <div class="single-blog single-column">
                            <div class="post-thumb">
                                <a href=""><img src="{{ $post['thumbnail'] }}" class="img-responsive" alt=""></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold">
                                    <a href='{{ asset('posts') }}/{{ $post['slug']}}'>{!! $post['title'] !!}</a>
                                </h2>
                                <h3 class="post-author"><a href="#">{!! $post['user_id']!!}</a></h3>
                                <p>{!! $post['description']!!}</p><a href="{{ asset('posts') }}/{!! $post["slug"] !!}" class="read-more">View More</a>
                                <div class="post-bottom overflow">
                                    <ul class="nav navbar-nav post-nav">
                                        <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i>{!!$post['view']!!} Love</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i>XXX Comments</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                        <div class="text-center">{{ $posts->links() }}</div>
                                               
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-5">
                <div class="sidebar blog-sidebar">
                    <div class="sidebar-item  recent">
                        <h3>Recent Posts</h3>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="{{ asset('blog_assets/images/portfolio/project1.jpg') }}" alt=""></a>
                            </div>
                            <div class="media-body">
                                <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                <p>posted on  07 March 2014</p>
                            </div>
                        </div>

                    </div>
                    <div class="sidebar-item categories">
                        <h3>Categories</h3>
                        <ul class="nav navbar-stacked">
                            <li><a href="#">Lorem ipsum<span class="pull-right">(1)</span></a></li>
                            <li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a></li>
                        </ul>
                    </div>
                    <div class="sidebar-item tag-cloud">
                        <h3>Tags</h3>
                        <ul class="nav nav-pills">
                            <li><a href="#">Corporate</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-item popular">
                        <h3>Latest Photos</h3>
                        <ul class="gallery">
                            <li><a href="#"><img src="{{ asset('blog_assets/images/portfolio/popular1.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('blog_assets/images/portfolio/popular2.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('blog_assets/images/portfolio/popular3.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('blog_assets/images/portfolio/popular4.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('blog_assets/images/portfolio/popular5.jpg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('blog_assets/images/portfolio/popular6.jpg') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


