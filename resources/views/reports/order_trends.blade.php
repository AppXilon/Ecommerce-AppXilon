@include('include.header')

<head>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>

</head>

<body>

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('include.sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            @include('include.header_area')
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Ordering Trends</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Ordering Trends</span></li>
                            </ul>
                        </div>
                    </div>
                    @include('include.managerBar')
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">


                    {{-- ADD FROM ADMINKIT-DEV --}}
                    <div class="row" style="padding: 30px 0px 0px 15px">

                        {{-- ordering trends details start --}}
                        <div class="col-xl-6 col-xxl-5 d-flex">
                            <div class="w-100">

                            </div>
                        </div>

                        {{-- end order trends details --}}

                        {{-- sales performances line chart --}}
                        <div class="col-xl-6 col-xxl-5 d-flex">

                            <div class="card flex-fill w-100">
                                <div class="s-report-title d-flex justify-content-between"
                                    style="padding:25px 25px 0px 25px">
                                    <h4 class="header-title mb-0" style="padding:0px">Sales Performance</h4>

                                </div>
                                <div class="card-body py-3">
                                    <div class="chart chart-sm">
                                        <canvas id="myChart" height="270"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- end sales performances line chart --}}



                        <div class="row" style="padding: 30px 10px 0px 15px">

                            {{-- top popular products --}}
                            <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body">
                                        <h4 class="header-title">Top Selling Products</h4>
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table table-striped text-center">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th scope="col">Product Image</th>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Product Id</th>
                                                            <th scope="col">Quantity Sold</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($popular as $popular)
                                                        <tr height="60px">
                                                            <td>
                                                                <div class="m-r-10"><img
                                                                        src="{{asset('images/'. $popular->P_Image)}}"
                                                                        alt="user" class="rounded" width="45"></div>
                                                            </td>
                                                            <td>{{ $popular->P_Name }}</td>
                                                            <td>{{ $popular->P_Id}}</td>
                                                            <td>{{ $popular->P_Qty}}</td>
                                                            <td>RM{{ $popular->P_Price}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end top popular products --}}

                            {{-- least popular products chart start --}}
                            <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body">
                                        <h4 class="header-title">Least Selling Products</h4>
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table table-striped text-center">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th scope="col">Product Image</th>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Product Id</th>
                                                            <th scope="col">Quantity Sold</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($least as $least)
                                                        <tr height="60px">
                                                            <td>
                                                                <div class="m-r-10"><img
                                                                        src="{{asset('images/'. $least->P_Image)}}"
                                                                        alt="user" class="rounded" width="45"></div>
                                                            </td>
                                                            <td>{{ $least->P_Name }}</td>
                                                            <td>{{ $least->P_Id}}</td>
                                                            <td>{{ $least->P_Qty}}</td>
                                                            <td>RM{{ $least->P_Price}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- least popular products chart end --}}


                        </div>


                        {{-- END FROM ADMINKIT-DEV --}}



                        <!-- order trends pie chart breakdown area start -->
                        <div class="sales-report-area sales-style-two" style="padding: 0px 25px 25px 25px">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <h4 class="header-title">Order by</h4>
                                            <div class="single-table">
                                                <h4 class="header-title mb-0">Payment Type</h4>
                                                <select class="custome-select border-0 pr-3"
                                                    onchange="filterDataPayment()" id="dataMarital">
                                                    <option value="0" selected="">All Time</option>
                                                    <option value="1">Last 7 Days</option>
                                                    <option value="2">Last 2 Months</option>
                                                    <option value="3">Annual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <canvas id="payment_type" height="200"></canvas>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <h4 class="header-title">Order by</h4>
                                            <div class="single-table">
                                                <h4 class="header-title mb-0">Service Type</h4>
                                                <select class="custome-select border-0 pr-3" onchange="filterDataType()"
                                                    id="dataOrderType">
                                                    <option value="0" selected="">All Time</option>
                                                    <option value="1">Last 7 Days</option>
                                                    <option value="2">Last 2 Months</option>
                                                    <option value="3">Annual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <canvas id="service_type" height="200"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- order trends pie chart breakdown area end -->



                    </div>
                </div>
            </div>
            <!-- main content area end -->
            <!-- footer area start-->
            @include('include.footer')
            <!-- footer area end-->
        </div>
        <!-- page container area end -->
        <!-- offset area start -->
        @include('include.offset')
        <!-- offset area end -->

        @include('include.script')













        // sales performance line chart

        <script>
            var xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var yValues = <?php echo $salesChart; ?>;
        var ctx = document.getElementById("myChart").getContext("2d");   
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            
            new Chart(document.getElementById("myChart"), {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "Sales",
                    fill: true,
                    lineTension: 0.4,
                    backgroundColor: gradient,
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {display: false},
                maintainAspectRatio: false,
                tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
                scales: {
                    xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
                    yAxes: [{
                        ticks: {
                            min: 0, 
                            max:100,
                            stepSize: 10
                        },   
                        gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
                                    
                        
                            
                    }]
                }
            }
            });
        </script>
        <!-- Payment Types-->
        <script>
            var xValues = ["Cash", "PayPal"];
        var yValues = <?php echo $orderPayment; ?>;
        var barColors = [
        "#004c6d",
        "#436f8d",

        ];
        
        new Chart("payment_type", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            
        }
        });
        </script>

        <!-- Order Types -->
        // <script>
            // var xValues = ["DineIn", "Delivery", "PickUp", "Booking"];
        // var yValues = [ <?php echo $orderService; ?>;
        // var barColors = [
        // "#004c6d",
        // "#436f8d",
        // "#7193af",
        // "#b6cee3",
        // ];
        
        // new Chart("order_type", {
        // type: "pie",
        // data: {
        //     labels: xValues,
        //     datasets: [{
        //     backgroundColor: barColors,
        //     data: yValues
        //     }]
        // },
        // options: {
            
        // }
        // });
        // 
        </script>

        <script>
            var xValues = ["DineIn", "Delivery", "PickUp", "Booking"];
            var yValues =  <?php echo $orderService; ?>;
            var barColors = [
            "#004c6d",
            "#436f8d",
            "#7193af",
            "#b6cee3",
            ];
            
      
            new Chart("service_type", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                
            }
            });
            </script>



</body>


</body>