<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/css/toastr.min.css')}}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <!-- Scripts -->

    @yield('style')

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                   <ul class="nav navbar-nav">
                       @if (Auth::check())
                        <li class="active"><a href="{{route('home')}}">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="{{route('post.index')}}">Posts</a></li>
                        <li><a href="{{route('post.trash')}}">All trashed Posts</a></li>
                        <li><a href="{{route('post.create')}}">Create Post</a></li>
                        <li><a href="{{route('category.create')}}">Create Category</a></li>
                        <li><a href="{{route('categories')}}">Category</a></li>
                        <li><a href="{{route('tag.index')}}">Tags</a></li>
                        <li><a href="{{route('tag.create')}}">Tags Create</a></li>
                           @if(Auth::user()->admin)
                                <li><a href="{{route('users')}}">Users</a></li>
                                <li><a href="{{route('users.create')}}">Users Create</a></li>
                                <li><a href="{{route('settings')}}">Settings</a></li>
                           @endif
                                <li><a href="{{route('user.profile')}}">Profile</a></li>
                           @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/toastr.min.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
    @endif
    @if(Session::has('info'))
    toastr.success("{{Session::get('info')}}")
    @endif

    $(document).ready(function() {
        $('#summernote').summernote({
            height: 150
        });
    });

</script>

    @yield('script')

</body>
</html>
