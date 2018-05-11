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

        <h2>Select the right Instagram account</h2>
        <select>
            @foreach($instagramAccounts as $instagramAccount)
            <option value="{{ $instagramAccount['id'] }}">
                {{ $instagramAccount['name'] }} (
                {{ $instagramAccount['username'] }}    )
            </option>
            @endforeach
        </select>            
    </body>
</html>
