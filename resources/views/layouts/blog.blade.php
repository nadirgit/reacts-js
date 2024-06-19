<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Include Bootstrap CSS via CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        .menu li {
            float: left;
        }

        .menu li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .menu li a:hover:not(.active) {
            background-color: #111;
        }

        .menu li a.active {
            float: right;
        }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>

<body>
    <ul class="menu">

        @foreach ($categories as $category)
            @if ($loop->first)
                <li  class="{{ request()->segment(2) == '' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Home</a>
                </li>
            @endif
            <li class="{{ request()->segment(2) == $category->slug ? 'active' : '' }}">
                <a href="{{ route('posts_category', $category->slug) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
    @yield('content')

</body>

</html>
