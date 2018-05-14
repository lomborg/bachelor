<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        
    </head>
    <body>
      <!--   <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content"> -->
       <h2>Welcome {{ Auth::User()->name }}</h2>
       <div>
        @if(Auth::User()->graph_instagram_id != NULL)
            Your are currently using the Instagram account for {{ Auth::User()->graph_instagram_username }}
            <br><br>
            <a href="/instagram">
                <button>Click to view info</button>
            </a>
            <br>
            <hr>
            <a href="/test">
                <button>Click here to change Instagram account</button>
            </a>
        @else
        You have no Instagram accaount connected to this profile
            <a href="/test">
                <button>Click here to connect an Instagram account</button>
            </a>
        @endif
       </div>
    </body>
</html>
