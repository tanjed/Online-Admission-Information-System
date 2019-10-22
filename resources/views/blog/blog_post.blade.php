@extends('master_blog')
@section('content')
<!-- Page Content -->
<div class="container" style="min-height: 850px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">

                        <form  action="{{URL::to('/blog/search')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Go</button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @auth
            <form action="{{URL::to('blog/createpost')}}" method="POST">
            <div class="card mb-4">
                <div class="card-body">
                        {{csrf_field()}}
                       <div class="form-group">
                           <textarea class="form-control" rows="5" name="post_body"></textarea>
                       </div>

                </div>
                <div class="card-footer text-muted justify-content-end">
                  <button type="submit" class="btn btn-primary" style="float:right;width: 10%;">POST</button>
                </div>
            </div>
            </form>
            @endauth
        </div>
    </div>
    @foreach($blog_posts as $post)
    <div class="row mt-2">
        <!-- Blog Entries Column -->
        <div class="col-md-12 ">
            <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text">{{$post->post_title}}</p>
                    <a href="{{URL::to('/blog/post/'.$post->id)}}" >Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on <span>{{$post->publish_date}}</span> by
                    <a class="text-primary">{{$post->student->name}}</a>
                </div>
            </div>
        </div>

        <!-- Sidebar Widgets Column -->
    </div>
    <!-- /.row -->
    @endforeach
    {{$blog_posts->links()}}
</div>
@stop