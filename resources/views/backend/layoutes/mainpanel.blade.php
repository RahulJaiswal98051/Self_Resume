 <!-- <div class="main-panel"> -->
        <!-- <div class="content-wrapper"> -->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome John</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                      class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                      <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021) </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>

<div class="row" style="min-height: 400px;">
  <!-- Left Side: Large Card -->
  <div class="col-md-6 mb-4 d-flex">
    <div class="card tale-bg w-100 h-100">
      <div class="card-people h-100 position-relative">
        <img src="{{ asset('images/image2.jpg') }}" alt="people"
             style="width: 100%; height: 100%; object-fit: cover;">
        <div class="weather-info position-absolute bottom-0 start-0 p-3 text-white"
             style="background: rgba(0,0,0,0.5); width: 100%;">
          <div class="d-flex">
            <div>
              <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i></h2>
            </div>
            <div class="ms-2">
              <h4 class="location font-weight-normal">Chicago</h4>
              <h6 class="font-weight-normal">Illinois</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Side: 2x2 Cards -->
  <div class="col-md-6 d-flex flex-column">
    <div class="row flex-fill">
      <!-- Top Row -->
      <div class="col-md-6 mb-3 stretch-card transparent d-flex">
        <div class="card position-relative text-white w-100" style="overflow: hidden;">
          <img src="{{ asset('images/image2.jpg') }}" alt="Image"
               style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
          <div class="card-body d-flex flex-column justify-content-center"
               style="z-index: 1; background: rgba(0, 0, 0, 0.5);">
            <p class="mb-2">Today’s Bookings</p>
            <p class="fs-30 mb-1">4006</p>
            <p>10.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3 stretch-card transparent d-flex">
        <div class="card position-relative text-white w-100" style="overflow: hidden;">
          <img src="{{ asset('images/image2.jpg') }}" alt="Image"
               style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
          <div class="card-body d-flex flex-column justify-content-center"
               style="z-index: 1; background: rgba(0, 0, 0, 0.5);">
            <p class="mb-2">Total Sales</p>
            <p class="fs-30 mb-1">7850</p>
            <p>12.50% (30 days)</p>
          </div>
        </div>
      </div>

      <!-- Bottom Row -->
      <div class="col-md-6 stretch-card transparent d-flex">
        <div class="card position-relative text-white w-100" style="overflow: hidden;">
          <img src="{{ asset('images/image2.jpg') }}" alt="Image"
               style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
          <div class="card-body d-flex flex-column justify-content-center"
               style="z-index: 1; background: rgba(0, 0, 0, 0.5);">
            <p class="mb-2">Revenue</p>
            <p class="fs-30 mb-1">$12,000</p>
            <p>8.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 stretch-card transparent d-flex">
        <div class="card position-relative text-white w-100" style="overflow: hidden;">
          <img src="{{ asset('images/image2.jpg') }}" alt="Image"
               style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
          <div class="card-body d-flex flex-column justify-content-center"
               style="z-index: 1; background: rgba(0, 0, 0, 0.5);">
            <p class="mb-2">Customers</p>
            <p class="fs-30 mb-1">1094</p>
            <p>5.50% (30 days)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Repeat same structure for other cards, just change card-tale/card-dark-blue classes or images if needed -->


          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                    data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                              <p class="card-title">Detailed Reports</p>
                              <h1 class="text-primary">$34040</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the
                                period time a user is actively engaged with your website, page or app, etc</p>
                            </div>
                          </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <tr>
                                      <td class="text-muted">Illinois</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">713</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Washington</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">583</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Mississippi</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 95%"
                                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">924</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">California</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">664</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Maryland</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">560</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Alaska</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">793</h5>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                <div class="daoughnutchart-wrapper">
                                  <canvas id="north-america-chart"></canvas>
                                </div>
                                <div id="north-america-chart-legend">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                              <p class="card-title">Detailed Reports</p>
                              <h1 class="text-primary">$34040</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the
                                period time a user is actively engaged with your website, page or app, etc</p>
                            </div>
                          </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <tr>
                                      <td class="text-muted">Illinois</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">713</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Washington</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">583</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Mississippi</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 95%"
                                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">924</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">California</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">664</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Maryland</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">560</h5>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Alaska</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td>
                                        <h5 class="font-weight-bold mb-0">793</h5>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                <div class="daoughnutchart-wrapper">
                                  <canvas id="south-america-chart"></canvas>
                                </div>
                                <div id="south-america-chart-legend"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top Products</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Search Engine Marketing</td>
                          <td class="font-weight-bold">$362</td>
                          <td>21 Sep 2018</td>
                          <td class="font-weight-medium">
                            <div class="badge badge-success">Completed</div>
                          </td>
                        </tr>
                        <tr>
                          <td>Search Engine Optimization</td>
                          <td class="font-weight-bold">$116</td>
                          <td>13 Jun 2018</td>
                          <td class="font-weight-medium">
                            <div class="badge badge-success">Completed</div>
                          </td>
                        </tr>
                        <tr>
                          <td>Display Advertising</td>
                          <td class="font-weight-bold">$551</td>
                          <td>28 Sep 2018</td>
                          <td class="font-weight-medium">
                            <div class="badge badge-warning">Pending</div>
                          </td>
                        </tr>
                        <tr>
                          <td>Pay Per Click Advertising</td>
                          <td class="font-weight-bold">$523</td>
                          <td>30 Jun 2018</td>
                          <td class="font-weight-medium">
                            <div class="badge badge-warning">Pending</div>
                          </td>
                        </tr>
                        <tr>
                          <td>E-Mail Marketing</td>
                          <td class="font-weight-bold">$781</td>
                          <td>01 Nov 2018</td>
                          <td class="font-weight-medium">
                            <div class="badge badge-danger">Cancelled</div>
                          </td>
                        </tr>
                        <tr>
                          <td>Referral Marketing</td>
                          <td class="font-weight-bold">$283</td>
                          <td>20 Mar 2018</td>
                          <td class="font-weight-medium">
                            <div class="badge badge-warning">Pending</div>
                          </td>
                        </tr>
                        <tr>
                          <td>Social media marketing</td>
                          <td class="font-weight-bold">$897</td>
                          <td>26 Oct 2018</td>
                          <td class="font-weight-medium">
                            <div class="badge badge-success">Completed</div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <!-- @includes('backend.includes.footer') -->
        <!-- partial
      </div>