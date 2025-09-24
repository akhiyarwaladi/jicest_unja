<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>



    @include('assets.poppins')
    @yield('css')

    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        poppins {
            font-family: "Poppins", sans-serif;
        }

        .glassmorphism {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .glassmorphism-success {
            background: rgba(76, 175, 80, 0.4);
            /* semi-transparent green */
        }

        .glassmorphism-primary {
            background: rgba(33, 150, 243, 0.4);
            /* semi-transparent blue */
        }

        .glassmorphism-error {
            background: rgba(244, 67, 54, 0.4);
            /* semi-transparent red */
        }

        .glassmorphism-danger {
            background: rgba(255, 69, 58, 0.15);
            /* semi-transparent dark red */
        }

        .glassmorphism-warning {
            background: rgba(255, 193, 7, 0.4);
            /* semi-transparent yellow */
        }

        .glassmorphism-secondary {
            background: rgba(158, 158, 158, 0.4);
            /* semi-transparent grey */
        }

        .glassmorphism-white {
            background: rgba(255, 255, 255, .6);
        }

        .glassmorphism-sm {
            background: rgba(255, 255, 255, .15);
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
        }
    </style>

</head>

<body>
    @include('templates.navbar')

    <div>@yield('main')</div>
    @yield('modal')
    @stack('js')

</body>

</html>
