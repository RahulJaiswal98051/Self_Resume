<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include CSS and other head elements here -->
</head>
<body>
    @include('backend.includes.header')
    @include('backend.includes.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('backend.includes.sidebar')
        <div class="col-md-12 main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    <!-- Include JS scripts here -->
</body>
</html>
