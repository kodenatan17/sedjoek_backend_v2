<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>


    <style>
        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            /* font-size: 72px; */
            font-family: sans-serif;
            /* margin-bottom: 40px; */
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="content">
            <img style="max-height: 500px; overflow:hidden;" src="{{ asset('assets/images/404.png') }}" alt="">

            {{-- <div class="title">
                Halaman tidak di temukan
                <a class="dropdown-item" href="https://www.sedjoek.id/">
                    Back
                </a>
            </div> --}}

            <div class="title">
                Halaman tidak di temukan
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Back
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <div>

    </div>
</body>

</html>
