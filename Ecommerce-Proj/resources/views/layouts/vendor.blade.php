<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Page')</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom CSS here */
        body {
            padding-top: 56px; /* Adjust this value according to the height of your navbar */
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 20px;
            background-color: #bfbdbd;
        }

        /* Main Content Styles */
        .content {
            margin-left: 250px; /* Same as sidebar width */
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand font-weight-bold " href="#">Vendor Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold " href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold " href="{{route('getAdminPannel.get')}}">Admin DashBoard</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('getVenderPage.get')}}">Vendor Dash Board</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link font-weight-bold " href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            
            
            <li class="nav-item">
                <a class="nav-link fs-2 " href="#">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="{{route('getProductList.get')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="{{route('addProduct.get')}}">Category Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="{{route('getProducts.get')}}">Add Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="#">Settings</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('vendor-content')
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
