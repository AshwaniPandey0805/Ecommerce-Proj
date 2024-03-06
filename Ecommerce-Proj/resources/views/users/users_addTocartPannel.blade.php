<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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
            margin-left: 250px; 
            padding: 20px;
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
                <a class="nav-link font-weight-bold " href="{{route('getUserDashBaord.get')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="#">Select Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="#">Go to cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold " href="#">Settings</a>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="content">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <h2>Shopping Cart</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cart items will be dynamically added here -->
                            <tr>
                                <td><img src="path/to/product/image.jpg" alt="Product Image" style="width: 100px;"></td>
                                <td>Product Name</td>
                                <td>$50.00</td>
                                <td>2</td>
                                <td>$100.00</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </td>
                            </tr>
                            <!-- Repeat this row structure for each cart item -->
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order Summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Subtotal:
                                    <span>$200.00</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Tax:
                                    <span>$20.00</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total:
                                    <span>$220.00</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-block mt-3">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>