<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Admin Control Panel</title>
</head>

<body>
    <div class=" container-fluid">
        <div class=" mt-3">
            <div class="row">

                {{-- side bar --}}
                <div class=" col-md-3 p-3">
                    <h1 class="ms-5">Admin Control</h1>
                    <ul class=" list-group">
                        <a href="{{route('category.index')}}">
                            <li class=" list-group-item">Category List</li>
                        </a>
                        <a href="{{route('watch.index')}}">
                            <li class=" list-group-item">Product List</li>
                        </a>

                        <li class=" list-group-item">Order List</li>

                    </ul>
                </div>

                {{-- Control Page --}}
                <div class=" col-md-9">
                    <div class="card p-3">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif
                        @if (session('info'))
                        <div class="alert alert-info">
                            {{session('info')}}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ol class="list-group">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                        </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>