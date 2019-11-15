<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>4shack.org</title>

        <style>
            html, body {
                background-color: #17191f;
                color: #fff;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .content {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center full-height">
            <div class="content">
                <img src="{{ url('/img/logo.png') }}" style="height: 100px;">
            </div>
        </div>
    </body>
</html>
