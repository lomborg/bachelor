<!doctype html>
<html>
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
        <h2>So, {{ Auth::User()->name }}</h2>
        <h3>Please select the Instagram account you would like to use</h3>
        <select>
            @foreach($instagramAccounts as $instagramAccount)
            <option value="{{ $instagramAccount['id'] }}">
                {{ $instagramAccount['name'] }} ( {{ $instagramAccount['username'] }} )
            </option>
            <hr>
            @endforeach
        </select>    
        <a href="">
            <button>Get info</button>
        </a>
        <div id="account-info"></div>        
    </body>
</html>
