<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Portal')</title>
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

        /* body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
} */

.container {
  max-width: 1200px;
  margin: 20px auto;
  /* display: grid; */
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  grid-gap: 20px;
}

.product-card {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

.product-card img {
  width: 100%;
  border-radius: 8px;
  margin-bottom: 10px;
}

.product-card h3 {
  margin-top: 0;
}

.product-card p {
  color: #666;
}

.product-card button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.product-card button:hover {
  background-color: #0056b3;
}
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand font-weight-bold " href="#">User Portal</a>
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
                    <a class="nav-link font-weight-bold " href="#">Ashwani Pandey</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('getVenderPage.get')}}">Vendor Dash Board</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link font-weight-bold " href="{{route('logout')}}">Logout</a>
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
                <a class="nav-link font-weight-bold " href="{{route('getUserDashBaord.get')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="#">Select Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="{{route('getCartProduct.get')}}">Go to cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="#">Settings</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('user-content')
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
