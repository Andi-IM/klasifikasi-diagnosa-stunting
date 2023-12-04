<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Klasifikasi Stunting')</title>

    @include('layouts.include.style')
</head>

<body>
    <div id="main-wrapper">
        <div class="content-body">
            @yield('content')
        </div>
    </div>

    @include('layouts.include.footer')

    @include('layouts.include.script')

    @stack('addon-script')

    @stack('js')
</body>

</html>
