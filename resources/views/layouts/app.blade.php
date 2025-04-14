<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tes Al Irsyad</title>
    @include('layouts.css')
    @stack('styles')
</head>

<body>
    @include('layouts.navbar')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    @include('layouts.js')
    @stack('script')
</body>

</html>
