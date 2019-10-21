@extends('master_blog')
@section('content')
<!-- Navigation -->

<!-- Page Content -->
<div class="container">

    <div class="row" style="min-height: 850px;">

        <!-- Post Content Column -->
        <div class="col-lg-12">

            <!-- Title -->
{{--            @foreach($posts as $post)--}}
                <h1 class="mt-4">{{$post->post_title}}</h1>
{{--            @endforeach--}}
            <!-- Author -->
            <p class="lead">
                by
                <a>{{$author->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->


            <hr>

            <p></p>
            <hr>

            <!-- Comments Form -->
            @auth
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">

                    <form action="{{URL::to('/blog/'.$post->id.'/comment')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
            @endauth

            <!-- Single Comment -->
            <h4>Comments</h4>
            <hr>
            @foreach($post->comments as $comment)
            <div class="media mb-4">
                <div class="media-body">
                    <h5 class="mt-0">{{$comment->comment_author}}</h5>
                    <li>{{$comment->comment_body}}</li>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->

@stop