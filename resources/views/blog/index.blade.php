@extends('layouts.blog.layout')

@section('title', 'Pen-It | Heaven for bloggers!')

@section('header')
<header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="{{asset('assets/img/bg/img-bg-17.jpg')}}" data-positiony="1000">
    <div class="intro-body text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt50">
                    <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                        Pen-It
                        <small class="color-light alpha7">Heaven for Bloggers!</small>
                    </h1>
                </div>
            </div>
        </div>

    </div>
</header>
@endsection

@section('main-content')
    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                <h4 class="blog-title"><a href="{{route('blog.show', $post->id)}}">{{$post->title}}</a></h4>
                <div class="blog-three-attrib">
                    <span class="icon-calendar"></span> {{$post->published_at->diffForHumans()}} |
                    <span class=" icon-pencil"></span> <a href="#">{{$post->author->name}}</a>
                </div>
                <img src="{{asset('storage/'.$post->image)}}" class="img-responsive" alt="image blog">
                <p class="mt25">
                    {{ $post->excerpt }}
                </p>
                <a href="{{route('blog.show', $post->id)}}" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>

            </div>
            @empty
                <p>Sorry there are no posts available currently for this!</p>
        @endforelse
    </div>

    {{$posts->appends(['search'=>request('search')])->links()}}
                <!-- Blog Paging
                ===================================== -->
                <!-- <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
                    <div class="col-md-6">
                        <a href="#" class="button button-sm button-pasific pull-left hover-skew-backward">
                            Old Entries
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
                    </div>
                </div> -->
@endsection