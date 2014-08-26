<!-- Stored in app/views/layouts/master.blade.php -->

<html>

{{ HTML::style('media/css/bootstrap.min.css'); }}
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
		
		{{ HTML::script('media/js/bootstrap.min.js'); }}
    </body>
</html>