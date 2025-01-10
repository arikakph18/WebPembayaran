
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    @include('layouts.style')
    
   
</head>

<body>
@include('layouts.sidebar')
    
    <div id="app">
       
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <h3>Dashboard Admin</h3>
</div> 
<!-- @yield('content') -->

@include('layouts.footer')
        </div>
    </div>
   
    @include('layouts.script')



    
</body>

</html>