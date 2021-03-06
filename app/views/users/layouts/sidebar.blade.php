<!doctype html>
<html>
<head>
    @include('users.includes.head')
</head>
<body bgcolor="#DADADA">
<div class="container">

    <header class="row">
        @include('users.includes.header')
    </header>

    <div id="main" class="row">

        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">
            @include('users.includes.sidebar')
        </div>

        <!-- main content -->
        <div id="content" class="col-md-8">
            @yield('content')
        </div>

    </div>

    <footer class="row">
        @include('users.includes.footer')
    </footer>

</div>
</body>
</html>