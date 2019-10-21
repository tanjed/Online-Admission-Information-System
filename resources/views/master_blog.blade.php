<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('blog/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('blog/css/blog-post.css')}}" rel="stylesheet">

</head>

<body>
@include('header')
@yield('content')
@include('footer')
<!-- Bootstrap core JavaScript -->
<script src="{{URL::to('blog/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::to('blog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
