<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('backend/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/mdi/css/materialdesignicons.min.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
   
     
            <div class="d-flex align-items-center justify-content-between">
              
              <h4 class="mb-0 me-3">Skydash Admin</h4>
              <span class="text"></span>
            </div>
          </div>
        
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
   @include('backend.includes.navbar') 
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
   @include('backend.includes.sidebar')
      <!-- partial -->
     @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 
</html>