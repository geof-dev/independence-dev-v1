<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <title>{{ config('app.name', 'Independence-DEV') }}</title>
</head>
<body class="">
<div >
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="collapse navbar-collapse" id="">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
        </div>
    </div>
</nav>
<div class="container">

    <header class="blog-header py-3 row flex-nowrap">
        <a class="blog-header-link" href="/"><img class="blog-header-img" src="{{ asset('img/banner_website.png') }}" /></a>
    </header>

    <nav class="nav row mb-3" style="border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
        @foreach($categories as $category)
            <a class="py-2 col-4 text-center menu-item {{$category->slug}}" href="/{{$category->slug}}">{{$category->name}}</a>
        @endforeach
    </nav>

    <div class="row">
        @yield('content')
    </div>

</div>



<footer class="blog-footer mt-4 py-3">
    <div class="container">
    <p style="float: right;"><a href="#">Back to top</a></p>
    <p>© 2020 Independence-DEV</p>
    </div>
</footer>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>

    $(document).ready(function() {
        // executes when HTML-Document is loaded and DOM is ready
        console.log("document is ready");


        $( ".card" ).hover(
            function() {
                $(this).addClass('shadow-lg').css('cursor', 'pointer');
            }, function() {
                $(this).removeClass('shadow-lg');
            }
        );

// document ready
    });
</script>
</body>
</html>
