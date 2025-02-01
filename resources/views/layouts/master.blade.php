<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title> <!-- Tambah default title -->

    @include('layouts.style') <!-- Pastikan file ini ada -->
</head>

<body>
    <div id="app">
        @include('layouts.sidebar') <!-- Pastikan sidebar.blade.php ada -->

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <div class="page-heading">
                <h3>@yield('page-title', 'Dashboard Admin')</h3> <!-- Default jika tidak ada page-title -->
            </div> 

            <div class="page-content">
                @yield('content') <!-- Konten akan diisi oleh halaman turunan -->
            </div>

            @include('layouts.footer') <!-- Pastikan file footer.blade.php ada -->
        </div>
    </div>

    @include('layouts.script') <!-- Pastikan file script.blade.php ada -->
    @yield('js')
</body>

</html>
