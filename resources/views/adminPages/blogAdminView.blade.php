@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
        <div class="content-body container">
            <div class="mb-2">
                <div class="card-title text-center">
                    <h1 class="crt-acc"><b>Blog</b></h1>
                </div>                        
            </div>      
            <section id="pagination">
                <div>
                    <div class="row match-height">
                        @foreach ($posts as $post)   
                            <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                                <a href="{{route('blogDetails', $post->slug)}}">
                                    <div class="card">
                                        <div class="card-content">
                                            <img height="180" class="card-img-top" src=" {{asset($post->image)}} " alt="Blog Image">
                                            <div class="card-body">
                                                <h4 class="card-title"><b> {{$post->title}} </b></h4>
                                                <p>{!! str_limit($post->body, 25) !!}</p>
                                                {{$post->created_at->diffForHumans()}}
                                                <br>
                                                <b><i>Posted by {{$post->author}}</i></b>
                                                                        
                                                    <div class="text-center mt-1">
                                                        <form action="{{ route('post.delete', $post->slug) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('editBlogPost', $post->slug) }}" class="btn btn-outline-primary btn-sm ">Edit</a>
                                                            <button type="submit" class="btn btn-outline-danger btn-sm  mr-2">Delete</button>                                
                                                        </form> 
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </section>
        </div>
        </div>
    </div>    
@endsection