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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('backend/vendors/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <!-- <script src="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> -->
  <script src="{{ asset('backend/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('backend/js/dataTables.select.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/js/template.js') }}"></script>
  <script src="{{ asset('backend/js/settings.js') }}"></script>
  <script src="{{ asset('backend/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('backend/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <script src="{{ asset('backend/js/dashboard.js') }}"></script>
  <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
</body>

</html>