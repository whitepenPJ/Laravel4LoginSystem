
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login System with Laravel Framework</title>
        {{ HTML::script('assets/js/jquery.js') }}
        {{ HTML::script('assets/js/bootstrap.js') }}
        {{ HTML::style('assets/css/bootstrap.css') }}
    </head>

    <body>

        <div class="row-fluid">
            <div class="span12 well">
                <h1>Login System with Laravel Framework 4</h1>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span3">
                <ul class="nav nav-list well">
                    @if(Auth::user())
                    <li class="navbar-header">{{ Auth::user()->username }}</li>
                    <li>{{ HTML::link('post', 'Add Post') }}</li>
                    <li>{{ HTML::link('users', 'View Users') }}</li>
                    <li>{{ HTML::link('logout', 'Logout') }}</li>
                    @else
                    <li>{{ HTML::link('login', 'Login') }}</li>
                    @endif
                </ul>
            </div>
            <div class="span9">
                @yield('content')
            </div>
        </div>

    </body>
</html>


