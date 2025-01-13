<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inventory.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">

</head>

<body>
    <div class="wrapper">
        
    @if(session('alert'))
        <script type="text/javascript">
            alert("{{ session('alert') }}");
        </script>
    @endif

    <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- Sidebar Ends -->
        <div class="main">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- Navbar Ends -->
        <section>
            @yield('content')
        </section>


    
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    
</body>

</html>     