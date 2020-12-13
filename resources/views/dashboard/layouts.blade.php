<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>welearn</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ URL::asset('css/Highlight-Blue.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/Login-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/Navigation-with-Button.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/Navigation-with-Search.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/Registration-Form-with-Photo.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css')}}')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body style="background: #dfe7f1;">
    <nav class="navbar navbar-light navbar-expand-md" style="background: #ffffff;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color: rgb(86,198,198);"><strong>welearn</strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav" style="width: 800px;margin-left: 240px;">
                    <li class="nav-item"><a class="nav-link" href="/content" style="color: #505e6c;"><i class="fa fa-book" style="margin-left: 20px;"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: #505e6c;margin-left: 20px;"><i class="fa fa-calendar"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="d-flex flex-row" style="height: 550px;background: #dfe7f1;margin-top: 30px;">
        <section class="d-flex flex-column" style="width: 300px;height: 500px;">
            <div style="width: 300px;height: 100px;">
                <h5 style="margin-left: 30px;color: #222222;">{{Auth::user()->role == 1 ? "Student" : "Teacher"}} account</h5>
                <h5 style="margin-left: 30px;color: #56c6c6;"><strong>{{ Auth::user()->name }}</strong></h5>
            </div>
            <div class="d-flex flex-column" style="height: 200px;">
                <p style="margin-left: 30px;color: #56c6c6;"><i class="fa fa-book"></i><a href="/home" style="color: #56c6c6;margin-left: 10px;">Content</a></p>
                <!-- <p style="margin-left: 30px;"><i class="fa fa-book"></i><a href="courses.html" style="color: #505e6c;margin-left: 10px;">Courses</a></p>
                <p style="margin-left: 30px;"><i class="fa fa-comments-o"></i><a href="forums.html" style="color: #505e6c;margin-left: 10px;">Forums</a></p> -->
            </div>
            <div style="height: 50px;margin-top: 150px;">
                <p style="margin-left: 30px;"><i class="fa fa-toggle-on"></i><a href="/logout" style="color: #505e6c;margin-left: 10px;">Logout</a></p>
            </div>
        </section>


        @yield('content')

    </main>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>