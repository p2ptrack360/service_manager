<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Dashboard | webadmin - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> --}}
    <meta content="Themesdesign" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- App favicon -->
    @include('partials.style')
</head>

<body data-layout-mode="bordered" data-topbar="dark" data-sidebar="dark">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('partials.header')
        <!-- ========== Left Sidebar Start ========== -->
        @include('partials.navbar')
        <!-- Left Sidebar End -->
        @include('partials.horizontal_head')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="padding-top:80px;">
                <div id="liveAlertPlaceholder"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 pr-0">
                            <div class="row">
                                <div class="col-2" id="from_div"
                                    style="display:none;padding-left:0;padding-right:2px;">

                                    <!-- <label for="formrow-inputState" class="form-label">Tickets Created At</label> -->

                                    <input type="text" class="form-control" placeholder="From" id="resolved">

                                </div>
                                <div class="col-2" id="to_div"
                                    style="display:none;padding-left:0;padding-right:2px;">

                                    <!-- <label for="formrow-inputState" class="form-label">Tickets Created To</label> -->


                                    <input type="text" class="form-control" placeholder="To" id="to">

                                </div>
                                <div class="col-1" style="display: flex;justify-content: center;align-items: center;">
                                    <label for="">Timeline</label>
                                </div>
                                <div class="col-2" style="padding-left:0;padding-right:2px;">

                                    <!-- <label for="formrow-inputState" class="form-label">Timeline</label> -->

                                    <select class="form-control" id="ticketresolved"
                                        placeholder="This is a search placeholder">
                                        <option value="Select">Select</option>
                                        <option value="Today">Today</option>
                                        <option value="twodays">Last 2 Days</option>
                                        <option value="sevendays">Last 7 Days</option>
                                        <option value="thirtydays">Last 30 Days</option>
                                        <option value="oneeighty">Last 180 Days</option>
                                        <option value="threesixty">Last 360 Days</option>
                                        <option value="custom">Custom Date</option>

                                    </select>

                                </div>
                                <div class="col-2" style="padding-left:0;padding-right:2px; display: none;"
                                    id="select_company_div">
                                    <!-- <label for="" >CHECK</label> -->

                                    <select class="form-control" id="select_company"
                                        placeholder="This is a search placeholder"
                                        onchange="company_wise_tickets(this.value)">
                                        <option value="">Select Company</option>


                                    </select>

                                </div>
                                <div class="col-2" style="padding-left:0;padding-right:2px;display:none;"
                                    id="select_bu_div">
                                    <!-- <label for="" >CHECK</label> -->

                                    <select class="form-control" id="select_bu"
                                        placeholder="This is a search placeholder"
                                        onchange="bu_wise_record(this.value)">
                                        <option value="">Select BU</option>


                                    </select>

                                </div>
                                <div class="col-2" style="padding-left:0;padding-right:2px;display:block;"
                                    id="select_account_div">
                                    <!-- <label for="" >CHECK</label> -->

                                    <select class="form-control" id="select_cus"
                                        placeholder="This is a search placeholder" onchange="cus_record(this.value)">
                                        <option value="">Select Account</option>


                                    </select>

                                </div>
                                <div class="col-2" style="padding-left:0;padding-right:2px;display:block;"
                                    id="select_assign_div">
                                    <!-- <label for="" >CHECK</label> -->

                                    <select class="form-control" id="select_asgn"
                                        placeholder="This is a search placeholder" onchange="assing_record(this.value)">
                                        <option value="">Select</option>
                                        <option value="1">Assign To Me</option>
                                        <option value="2">Created By Me </option>


                                    </select>

                                </div>

                                <div class="col-2 "
                                    style="display:flex; align-item:center;justify-content:flex-start; padding-left:0;padding-right:2px;">

                                    <div class="d-inline-block mr-2">
                                        <!-- Add d-inline-block class for inline display and mr-2 for spacing -->
                                        <button id="getData" style="display:none;"
                                            class="btn btn-soft-primary waves-effect waves-light ">GET
                                            RECORD</button>
                                    </div>
                                    <div class="d-inline-block">
                                        <!-- Add d-inline-block class for inline display -->
                                        <button id="getData2" type="button"
                                            class="btn btn-soft-primary waves-effect waves-light">
                                            <i class="bx bx-camera font-size-16 align-middle"></i>
                                        </button>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <!-- Large modal -->

                    {{-- tickets cards row start --}}
                    <div class="row">
                        <div class="col-8">
                            <div class="row">

                                <div class="card col-3" style="margin-bottom: 5px;">
                                    <div class="card-body" style="padding:10px 5px;">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded bg-soft-primary"
                                                        style="height:80%; width:80%;">
                                                        <i
                                                            class="fas fa-ticket-alt font-size-14 mb-0 text-primary"></i>
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 font-size-15">Total </h6>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">

                                                        <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                            data-bs-placement="left"
                                                            data-bs-title="Total Number of Tickets Compare to Previous Month For Selected Timeline">

                                                        </i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="display:flex;justify-content:center;">
                                                <h4 class="mt-2 pt-1 mb-0 font-size-22" id="total_tickets">0<span
                                                        class="text-success fw-medium font-size-13 align-middle">
                                                        <i class="mdi mdi-arrow-up"></i> 8.34% </span> </h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card col-3" style="margin-bottom: 5px;">
                                    <div class="card-body" style="padding:10px 5px;">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded bg-soft-primary"
                                                        style="height:80%; width:80%;">
                                                        <i class="fas fa-clock font-size-14 mb-0 text-primary"></i>
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1 ">
                                                    <h6 class="mb-0 font-size-15">Pending </h6>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">

                                                        <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                            data-bs-placement="left"
                                                            data-bs-title="Total Number of Pending Tickets Compare to Previous Month For Selected Timeline">

                                                        </i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="display:flex;justify-content:center;">
                                                <h4 class="mt-2 pt-1 mb-0 font-size-22" id="pending_tickets">0
                                                    <span class="text-danger fw-medium font-size-13 align-middle">
                                                        <i class="mdi mdi-arrow-down"></i> 3.68% </span>
                                                </h4>
                                                {{-- <div class="d-flex mt-1 align-items-end overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-0 text-truncate">Total Orders World
                                                        Wide</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="mini-2" data-colors='["#1f58c7"]'
                                                        class="apex-charts"></div>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card col-3" style="margin-bottom: 5px;">
                                    <div class="card-body" style="padding:10px 5px;">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded bg-soft-primary"
                                                        style="height:80%; width:80%;">
                                                        <i
                                                            class="fas fa-arrow-circle-down font-size-14 mb-0 text-primary"></i>
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1 ">
                                                    <h6 class="mb-0 font-size-15">InProgress</h6>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">

                                                        <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                            data-bs-placement="left"
                                                            data-bs-title="Total Number of In Progress Tickets Compare to Previous Month For Selected Timeline">

                                                        </i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="display:flex;justify-content:center;">
                                                <h4 class="mt-2 pt-1 mb-0 font-size-22" id="inprogress">0 <span
                                                        class="text-danger fw-medium font-size-13 align-middle"> <i
                                                            class="mdi mdi-arrow-down"></i> 2.64% </span> </h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card col-3" style="margin-bottom: 5px;">
                                    <div class="card-body" style="padding:10px 5px;">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded bg-soft-primary"
                                                        style="height:80%; width:80%;">
                                                        <i
                                                            class="fas fa-check-double font-size-14 mb-0 text-primary"></i>
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 font-size-15">Completed</h6>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">

                                                        <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                            data-bs-placement="left"
                                                            data-bs-title="Total Number of Completed Tickets Compare to Previous Month For Selected Timeline">

                                                        </i>
                                                    </div>
                                                </div>

                                            </div>

                                            <div style="display:flex;justify-content:center;">
                                                <h4 class="mt-2 pt-1 mb-0 font-size-22" id="closed">0<span
                                                        class="text-success fw-medium font-size-13 align-middle">
                                                        <i class="mdi mdi-arrow-down"></i> 5.79% </span> </h4>
                                                {{-- <div class="d-flex mt-1 align-items-end overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-0 text-truncate">Total Expense
                                                        World Wide</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div id="mini-4" data-colors='["#1f58c7"]'
                                                        class="apex-charts"></div>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card col-12" style="margin-bottom: 5px;">
                                    <div class="card-body pb-0">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-6">

                                                        <h5 class="card-title mb-4" id="ticketoverview_title">
                                                            Overview</h5>
                                                    </div>
                                                    <div class="col-6 d-flex flex-row-reverse">

                                                        <i style="padding-top: 4px" class="bx bxs-info-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            data-bs-title="Ticket OverView Defines The Number of Tickets Recieved in a Complete Year For Selected Timeline">

                                                        </i>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="bx bx-list-ul text-muted font-size-22"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    onclick="changegraph();">Ticket
                                                                    Overview</a>
                                                                <a class="dropdown-item"
                                                                    onclick="changegraph2()">Issue
                                                                    type</a>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                            </div>
                                        </div>

                                        <div>
                                            <div id="toverview"
                                                data-colors='["#1f58c7", "#1f58c7", "#1f58c7","#1f58c7", "#1f58c7", "#1f58c7","#1f58c7","#1f58c7","#1f58c7","#1f58c7","#1f58c7", "#1f58c7   "]'
                                                class="apex-chart"></div>
                                        </div>
                                        <div>
                                            <div id="bar_chart_issuetype"
                                                data-colors='["#1f58c7", "#1f58c7", "#1f58c7","#1f58c7", "#1f58c7", "#1f58c7","#1f58c7","#1f58c7","#1f58c7","#1f58c7","#1f58c7", "#1f58c7   "]'
                                                class="apex-chart"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card col-4 " style="margin-bottom: 5px;">
                            <div class="card-header">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0" id="pipeline_title">Trend By Status </h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="col-6 d-flex flex-row-reverse">

                                            <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="left"
                                                data-bs-title="Tickets by Status / Type for Selected Timeline. ">

                                            </i>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-list-ul text-muted font-size-22"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" onclick="changetimelinegraph();"> Trend
                                                        By Status </a>
                                                    <a class="dropdown-item" onclick="changetimelinegraph2()">Trend On
                                                        Issue </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <div id="stacked" class="apex-charts" data-colors='["#1f58c7"]'>
                                    </div>
                                </div>
                                <div>
                                    <div style="display: none;" id="stacked1" class="apex-charts"
                                        data-colors='["#1f58c7"]'>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    {{-- tickets cards row end --}}


                    <div class="row">



                        {{-- <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar">
                                                <div class="avatar-title rounded bg-soft-primary">
                                                    <i
                                                        class="mdi mdi-hexagon-multiple font-size-24 mb-0 text-primary"></i>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-15">Total Business Units</h6>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="dropdown">

                                                    <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="left"
                                                        data-bs-title="Defines Total Number of Business Units">

                                                    </i>
                                                </div>
                                            </div>


                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22">4</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar">
                                                <div class="avatar-title rounded bg-soft-primary">
                                                    <i class="fas fa-cubes font-size-24 mb-0 text-primary"></i>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-15">Total Vendors</h6>
                                            </div>

                                            <div class="flex-shrink-0">
                                                <div class="dropdown">

                                                    <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="left"
                                                        data-bs-title="Total Number of Vendors">

                                                    </i>
                                                </div>
                                            </div>



                                        </div>

                                        <div>
                                            <h4 class="mt-4 pt-1 mb-0 font-size-22">30</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="card col-4" style="margin-bottom: 5px;">
                            <div class="card-header">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Resolved Ratio</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown">

                                            <i class="bx bxs-info-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="left"
                                                data-bs-title=" Closed Ticket Ratio for selected timeline. ">

                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <div id="chart-radialBar2" class="apex-charts" data-colors='["#1f58c7"]'>
                                    </div>
                                </div>

                            </div>
                        </div>








                        <div class="card col-4" style="margin-bottom: 5px;">
                            <div class="card-header">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">BY Impact</h5>
                                    </div>
                                    {{-- <div class="flex-shrink-0">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal text-muted font-size-22"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" onclick="changegraph2();">Pie Chart</a>
                                                    <a class="dropdown-item" onclick="changegraph();">Bar Chart</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <div id="impactbar" style="display: none" class="apex-charts">
                                    </div>
                                    <div id="impactpie" class="apex-charts">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card col-4" style="margin-bottom: 5px;">
                            <div class="card-header">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">By Priority</h5>
                                    </div>
                                    {{-- <div class="flex-shrink-0">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal text-muted font-size-22"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Pie Chart</a>
                                                    <a class="dropdown-item" href="#">Bar Chart</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <div id="prioritypie" class="apex-charts">
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- end row -->


                    <div class="row">

                        <div class="card col-lg-12">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-1">

                                        <h4 class="card-title mb-0 pt-3">Tickets</h4>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.NO#</th>
                                            <th>Ticket Number</th>
                                            <th>Title</th>
                                            <th>Account Id</th>
                                            <th>Account Name</th>
                                            <th>Reported Date</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <!-- end col -->
                    </div>

                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>
        <!-- end main content-->

        <div id="dashboard_ticket_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="myModalLabel">Create Permit Type</h5> -->
                        <h5 class="modal-title" id="myModalLabel">
                            <h5 id="label">Notify</h5>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Users</label>
                                    <div class="col-md-10">
                                        <select id="ticket_user" name="special_order_status"
                                            class="form-control selectpicker">
                                            <option value="" selected>choose..</option>

                                        </select>

                                        <input type="hidden" name="ticket_id" id="ticket_id">
                                    </div>
                                </div>

                            </div>

                            <div class="col-12" style="text-align: right;">

                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary waves-effect waves-light" type="submit" name="app_btn"
                                    id="app_btn" onclick="send_email()" value="Save changes">
                            </div>
                        </div>


                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>



        @include('partials.footer')
    </div>

    <!-- END layout-wrapper -->
    @include('partials.right_bar')
    <!-- Right Sidebar -->

    <!-- JAVASCRIPT -->

    @include('partials.script')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

<!--<script>
    var from;
    var total;
    var total_ticket_compare;
    var compelete;
    var percentage = 0
    var compeletecompare;
    var total_pendings;
    var pending_compare;
    var total_inprogress_compare;
    var total_inprogress;
    //table records
    var priority_title_array = [];
    var priority_tickets_array = [];
    var table;
    var parent;
    var to;
    var impactarray = [];
    var impactarraytitle = [];
    const tickets = [];
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);

    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);

    var today = new Date(); // You can also create a date from any valid date string
    var tyear = today.getFullYear();
    var tmonth = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    var tday = String(today.getDate()).padStart(2, '0');

    var formattedtoday = `${tyear}-${tmonth}-${tday}`;
    var yesterday = new Date(); // You can also create a date from any valid date string
    var yyear = yesterday.getFullYear();
    var ymonth = String(yesterday.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    var yday = String(yesterday.getDate()).padStart(2, '0');

    var formattedyesterday = `${yyear}-${ymonth}-${yday}`;
    console.log("today" + formattedtoday);
    console.log("yesterday" + formattedyesterday);
    from = flatpickr('#resolved', {

        defaultDate: yesterday,

    });

    to = flatpickr('#to', {
        defaultDate: tomorrow,
    });



    new Choices("#ticketresolved", {
        removeItemButton: !0,
    })
    var options = {
        series: [{
            data: tickets
        }],
        chart: {
            toolbar: {
                show: !1
            },
            height: 250,
            type: "bar",
            events: {
                click: function(e, r, t) {}
            }
        },
        plotOptions: {
            bar: {
                columnWidth: "80%",
                distributed: !0,
                borderRadius: 8
            }
        },
        fill: {
            opacity: 1
        },
        stroke: {
            show: !1
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1
        },
        colors: barchartColors = getChartColorsArray("toverview"),
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
    };
    var toverview = new ApexCharts(document.querySelector("#toverview"), options);
    toverview.render();
    var options2 = {
        series: [percentage],
        chart: {
            type: "radialBar",
            height: 370,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                track: {
                    background: "#1f58c7",
                    strokeWidth: "97%",
                    margin: 5,
                    dropShadow: {
                        enabled: !1,
                        top: 2,
                        left: 0,
                        color: "#999",
                        opacity: 1,
                        blur: 2
                    }
                },
                hollow: {
                    margin: 15,
                    size: "65%"
                },
                dataLabels: {
                    name: {
                        show: !1
                    },
                    value: {
                        offsetY: -2,
                        fontSize: "22px"
                    }
                }
            }
        },
        grid: {
            padding: {
                top: -10
            }
        },
        fill: {
            opacity: 1
        },
        colors: barchartColors = getChartColorsArray("chart-radialBar2"),
        labels: ["Average Results"]
    };
    var chart2 = new ApexCharts(document.querySelector("#chart-radialBar2"), options2);
    chart2.render();



    var options = {
        series: [{
            name: 'Opened Tickets',
            data: [44, 55, 41, 37, 22, 43, 21]
        }, {
            name: 'InProgress Tickets',
            data: [53, 32, 33, 52, 13, 43, 32]
        }, {
            name: 'Completed Tickets',
            data: [12, 17, 11, 9, 15, 11, 20]
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    total: {
                        enabled: false,
                        offsetX: 0,
                        style: {
                            fontSize: '13px',
                            color: '#fff',
                            fontWeight: 900
                        }
                    }
                }
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        // title: {
        //   text: 'Fiction Books Sales'
        // },
        xaxis: {
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val;
                }
            }
        },
        fill: {
            opacity: 1
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#stacked"), options);
    chart.render();



    var options1 = {
        series: [42, 47, 52, 58, 65],
        chart: {
            width: 380,
            type: 'polarArea'
        },
        labels: ['Rose A', 'Rose B', 'Rose C', 'Rose D', 'Rose E'],
        fill: {
            opacity: 1
        },
        stroke: {
            width: 1,
            colors: undefined
        },
        yaxis: {
            show: false
        },
        legend: {
            position: 'bottom'
        },
        plotOptions: {
            polarArea: {
                rings: {
                    strokeWidth: 0
                },
                spokes: {
                    strokeWidth: 0
                },
            }
        },
        theme: {
            monochrome: {
                enabled: true,
                shadeTo: 'light',
                shadeIntensity: 0.6
            }
        }
    };



    var impactpie = new ApexCharts(document.querySelector("#impactpie"), options1);
    impactpie.render();


    var options = {
        series: [{
            data: [40, 43, 44, 47, 54]
        }],
        chart: {
            type: 'bar',
            height: 240
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: [
                'Priority 1', 'Priority 2', 'Priority 3', 'Prioriy 4', 'Priority 5'
            ],
        }
    };

    var prioritypie = new ApexCharts(document.querySelector("#prioritypie"), options);
    prioritypie.render();

    var options = {
        series: [{
            data: impactarray
        }],
        chart: {
            type: 'bar',
            height: 240
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: impactarraytitle,
        }
    };

    var impactbar = new ApexCharts(document.querySelector("#impactbar"), options);
    impactbar.render();



    function changegraph() {
        document.getElementById('impactpie').style.display = 'none';
        document.getElementById('impactbar').style.display = 'block';
    }

    function changegraph2() {
        document.getElementById('impactbar').style.display = 'none';
        document.getElementById('impactpie').style.display = 'block';
    }

    function ticket() {
        var from = document.getElementById("from");
        var to = document.getElementById("to");
        // alert(from);
        // alert(to);
    }

    function calculatePercentageChange(totaltickets, compare) {
        if (totaltickets === 0) {
            return '100%'; // Avoid division by zero
        } else if (compare === 0) {
            return '100%'; // Avoid division by zero
        }

        const percentageChange = ((compare - totaltickets) / totaltickets) * 100;
        return percentageChange.toFixed(2) + '%';
    }
    {{--
      const percentageChange = calculatePercentageChange(totaltickets, compare);

      console.log(`Percentage Change: ${percentageChange}`);  --}}









    $(document).ready(function() {
        // towerchart();
        //getdate();
        dashboard_users();
        var monthlychart = {
            "url": " http://127.0.0.1:8080/api/dashboard/yearly_graph/20",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(monthlychart).done(function(response) {
            console.log(response[0]['response']);

            // alert(response)
            console.log(response[8]['TicketCount'])
            for (i = 0; i < response.length; i++) {
                tickets.push(response[i]['TicketCount']);
            }
            console.log(tickets);
            toverview.updateSeries([{
                data: tickets
            }]);

            $("#monthlychart").text(response[0]['inprogress']);
        });

    });
</script>
-->

<script>
    if ("{{ Auth::user()->id == 1 }}") {
        $('#select_company_div').css("display", "block");
    }
    // alert({{ Auth::user()->company_id == 0 }});
    var total_data, closedTickets, opened, inprogress, distinctImpactTitles, distinctStatusTitles,
        distinctPriorityTitles;
    var percentage = 0;
    const monthNames = [];
    var ticketCounts = [];
    var impactTitleCounts = [];
    var priorityTitleCounts = [];
    var statusTitleCounts = [];
    var Ticket_user;
    var designationTitle;
    var g_id;

    const currentYear = new Date().getFullYear();




    ///Chart Variables

    var ratio_chart, toverview_graph, impactpie, prioritypie, stacked;
    var bu = new Choices("#select_bu", {
        removeItemButton: true,
    });

    var cus = new Choices("#select_asgn", {
        removeItemButton: true,
    });
    var cus = new Choices("#select_cus", {
        removeItemButton: true,
    });
    // alert({{Auth::user()->id}})
    $(document).ready(function() {
        getg_id();
        getBu();

        document.getElementById('bar_chart_issuetype').style.display = "none";
        new Choices("#ticketresolved", {
            removeItemButton: !0,
            shouldSort: false,
            shouldSortItems: false,
        });

        Ticket_user = new Choices("#ticket_user", {
            removeItemButton: !0,
        })

        from = flatpickr('#resolved', {

        });

        to = flatpickr('#to', {});



        $.ajax({
            url: 'api/users/company/{{ Auth::user()->company_id }}',
            method: 'GET',
            dataType: 'json',
            success: function(data) {

                Ticket_user.clearChoices();
                //console.log(data);
                Ticket_user.setChoices(data, 'id', 'first_name', false, );

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });

        company_select = new Choices("#select_company", {
            removeItemButton: !0,
        })

        $.ajax({
            url: 'api/companies',
            method: 'GET',
            dataType: 'json',
            success: function(data) {

                company_select.clearChoices();
                //console.log(data);
                company_select.setChoices(data, 'id', 'name', false, );

                // Refresh the Select2 element to display the newly added options
                // $('#zm').trigger('change.select2');
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });




        $("#ticketresolved").change(function() {
            var end = this.value;
            var firstDropVal = $('#ticketresolved').val();
            let today = new Date()

            today = today.toISOString().split('T')[0]
            // alert(today);
            let yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            yesterday = yesterday.toISOString().split('T')[0]
            // alert(yesterday+'--'+today);
            const currentDate = new Date();

            // Format the current date to match the format in the dataset
            const currentDateString = currentDate.toISOString().split('T')[0];




            if (firstDropVal == 'Today') {

                const currentDate = new Date();

                // Calculate the date for two days ago
                const today = new Date(currentDate);
                today.setDate(currentDate.getDate());

                // Format the two days ago date to match the format in the dataset
                const todayDateString = today.toISOString().split('T')[
                    0]; // Get the date part

                // Filter data for the past two days
                const todayData = total_data.filter(ticket => {
                    return ticket.created_at.startsWith(todayDateString);
                });

                //console.log("Past Two Days ---" + todayData.length);



                const yesterday = new Date(today);
                yesterday.setDate(today.getDate() - 2);

                // Format the four days ago and two days ago dates to match the format in the dataset
                const yesterdayString = yesterday.toISOString().split('T')[
                    0]; // Get the date part
                // const twoDaysAgoDateString = twoDaysAgo.toISOString().split('T')[0]; // Get the date part

                // Filter data for the date range between four days ago and one day before two days ago
                const yesterdayData = total_data.filter(ticket => {
                    const createdDate = ticket.created_at.split(' ')[
                        0]; // Extract the date part
                    return createdDate >= yesterdayString && createdDate <
                        todayDateString;
                });

                // console.log("More Two Days ---" + yesterdayString.length);
                /// Total Tickets WOrk Start
                update_comparision(todayData, yesterdayData, 'Total')
                ///Total Tickets Comparision Work End

                //Closed Tickets Work Start

                update_comparision(todayData, yesterdayData, "Closed")


                ///Closed Tickets Work ENd


                /// In Progress Work Start here

                update_comparision(todayData, yesterdayData, "In Progress")


                update_comparision(todayData, yesterdayData, "Open")

                // Calculate whether it's a rise or a decrease

                /// Total Tickets WOrk Start


                percentage = closedTickets.length / today.length * 100;
                percentage = Math.round(percentage);
                ratio_chart.destroy();
                ticket_ratio(percentage);
                impactpie.destroy();
                // toverview_graph_inital(targetMonthData);
                ImpactPie_initial(currentDate);
                prioritypie.destroy();
                PriorityBar_initial(tocurrentDateday);
                stacked.destroy();
                timeline_wise(currentDate);
                update_table(currentDate);






            }

            if (firstDropVal == 'twodays') {
                const currentDate = new Date();

                // Calculate the date for two days ago
                const twoDaysAgo = new Date(currentDate);
                twoDaysAgo.setDate(currentDate.getDate() - 2);

                // Format the two days ago date to match the format in the dataset
                const twoDaysAgoDateString = twoDaysAgo.toISOString().split('T')[
                    0]; // Get the date part

                // Filter data for the past two days
                const pastTwoDaysData = total_data.filter(ticket => {
                    return ticket.created_at >= twoDaysAgoDateString;
                });

                // console.log("Past Two Days ---" + pastTwoDaysData.length);



                const fourDaysAgo = new Date(twoDaysAgo);
                fourDaysAgo.setDate(twoDaysAgo.getDate() - 2);

                // Format the four days ago and two days ago dates to match the format in the dataset
                const fourDaysAgoDateString = fourDaysAgo.toISOString().split('T')[
                    0]; // Get the date part
                // const twoDaysAgoDateString = twoDaysAgo.toISOString().split('T')[0]; // Get the date part

                // Filter data for the date range between four days ago and one day before two days ago
                const morePreviousTwoDaysData = total_data.filter(ticket => {
                    const createdDate = ticket.created_at.split(' ')[
                        0]; // Extract the date part
                    return createdDate >= fourDaysAgoDateString && createdDate <
                        twoDaysAgoDateString;
                });

                //console.log("More Two Days ---" + morePreviousTwoDaysData.length);
                /// Total Tickets WOrk Start
                update_comparision(pastTwoDaysData, morePreviousTwoDaysData, 'Total')
                ///Total Tickets Comparision Work End

                //Closed Tickets Work Start

                update_comparision(pastTwoDaysData, morePreviousTwoDaysData, "Closed")


                ///Closed Tickets Work ENd


                /// In Progress Work Start here

                update_comparision(pastTwoDaysData, morePreviousTwoDaysData, "In Progress")


                update_comparision(pastTwoDaysData, morePreviousTwoDaysData, "Open")



                // Calculate whether it's a rise or a decrease

                /// Total Tickets WOrk Start


            }
            if (firstDropVal == 'sevendays') {

                // Calculate the date for two days ago
                const SevenDaysAgo = new Date(currentDate);
                SevenDaysAgo.setDate(currentDate.getDate() - 7);

                // Format the two days ago date to match the format in the dataset
                const SevenDaysAgoDateString = SevenDaysAgo.toISOString().split('T')[
                    0]; // Get the date part

                // Filter data for the past two days
                const PastSevenDaysData = total_data.filter(ticket => {
                    return ticket.created_at >= SevenDaysAgoDateString;
                });

                // console.log("Past Two Days ---" + SevenDaysAgoDateString.length);

                const fourteenDaysAgo = new Date(SevenDaysAgo);
                fourteenDaysAgo.setDate(SevenDaysAgo.getDate() - 7);

                // Format the four days ago and two days ago dates to match the format in the dataset
                const fourteenDaysAgoDateString = fourteenDaysAgo.toISOString().split('T')[
                    0]; // Get the date part
                // const twoDaysAgoDateString = twoDaysAgo.toISOString().split('T')[0]; // Get the date part

                // Filter data for the date range between four days ago and one day before two days ago
                const morePreviousSevenDaysData = total_data.filter(ticket => {
                    const createdDate = ticket.created_at.split(' ')[
                        0]; // Extract the date part
                    return createdDate >= fourteenDaysAgoDateString && createdDate <
                        SevenDaysAgoDateString;
                });

                // console.log("More Two Days ---" + morePreviousSevenDaysData.length);

                // Get the current date

                update_comparision(PastSevenDaysData, morePreviousSevenDaysData, 'Total')
                ///Total Tickets Comparision Work End

                //Closed Tickets Work Start

                update_comparision(PastSevenDaysData, morePreviousSevenDaysData, "Closed")


                ///Closed Tickets Work ENd


                /// In Progress Work Start here

                update_comparision(PastSevenDaysData, morePreviousSevenDaysData, "In Progress")


                update_comparision(PastSevenDaysData, morePreviousSevenDaysData, "Open")

            }


            if (firstDropVal == 'thirtydays') {

                // Calculate the date for two days ago
                const ThirtyDaysAgo = new Date(currentDate);
                ThirtyDaysAgo.setDate(currentDate.getDate() - 30);

                // Format the two days ago date to match the format in the dataset
                const ThirtyDaysAgoDateString = ThirtyDaysAgo.toISOString().split('T')[
                    0]; // Get the date part

                // Filter data for the past two days
                const PastThirtyDaysData = total_data.filter(ticket => {
                    return ticket.created_at >= (ThirtyDaysAgoDateString);
                });

                // console.log("Past Two Days ---" + ThirtyDaysAgoDateString.length);

                const SixtyDaysAgo = new Date(ThirtyDaysAgo);
                SixtyDaysAgo.setDate(ThirtyDaysAgo.getDate() - 30);

                // Format the four days ago and two days ago dates to match the format in the dataset
                const SixtyDaysAgoDateString = ThirtyDaysAgo.toISOString().split('T')[
                    0]; // Get the date part
                // const twoDaysAgoDateString = twoDaysAgo.toISOString().split('T')[0]; // Get the date part

                // Filter data for the date range between four days ago and one day before two days ago
                const morePreviousThirtyDaysData = total_data.filter(ticket => {
                    const createdDate = ticket.created_at.split(' ')[
                        0]; // Extract the date part
                    return createdDate >= SixtyDaysAgoDateString && createdDate <=
                        ThirtyDaysAgoDateString;
                });

                //console.log("More Two Days ---" + morePreviousThirtyDaysData.length);

                // Get the current date

                update_comparision(PastThirtyDaysData, morePreviousThirtyDaysData, 'Total')
                ///Total Tickets Comparision Work End

                //Closed Tickets Work Start

                update_comparision(PastThirtyDaysData, morePreviousThirtyDaysData, "Closed")


                ///Closed Tickets Work ENd


                /// In Progress Work Start here

                update_comparision(PastThirtyDaysData, morePreviousThirtyDaysData, "In Progress")


                update_comparision(PastThirtyDaysData, morePreviousThirtyDaysData, "Open")

            }


            if (firstDropVal == 'oneeighty') {

                // Calculate the date for two days ago
                const oneeightyDaysAgo = new Date(currentDate);
                oneeightyDaysAgo.setDate(currentDate.getDate() - 180);

                // Format the two days ago date to match the format in the dataset
                const oneeightyDaysAgoDateString = oneeightyDaysAgo.toISOString().split('T')[
                    0]; // Get the date part

                // Filter data for the past two days
                const PastoneeightyDaysData = total_data.filter(ticket => {
                    return ticket.created_at >= (oneeightyDaysAgoDateString);
                });

                //console.log("Past Two Days ---" + oneeightyDaysAgoDateString.length);

                const threeSixtyDaysAgo = new Date(oneeightyDaysAgo);
                threeSixtyDaysAgo.setDate(oneeightyDaysAgo.getDate() - 180);

                // Format the four days ago and two days ago dates to match the format in the dataset
                const threeSixtyDaysAgoDateString = oneeightyDaysAgo.toISOString().split('T')[
                    0]; // Get the date part
                // const twoDaysAgoDateString = twoDaysAgo.toISOString().split('T')[0]; // Get the date part

                // Filter data for the date range between four days ago and one day before two days ago
                const morePreviousoneeightyDaysData = total_data.filter(ticket => {
                    const createdDate = ticket.created_at.split(' ')[
                        0]; // Extract the date part
                    return createdDate >= threeSixtyDaysAgoDateString && createdDate <=
                        oneeightyDaysAgoDateString;
                });

                // console.log("More Two Days ---" + morePreviousoneeightyDaysData.length);

                // Get the current date

                update_comparision(PastoneeightyDaysData, morePreviousoneeightyDaysData, 'Total')
                ///Total Tickets Comparision Work End

                //Closed Tickets Work Start

                update_comparision(PastoneeightyDaysData, morePreviousoneeightyDaysData, "Closed")


                ///Closed Tickets Work ENd


                /// In Progress Work Start here

                update_comparision(PastoneeightyDaysData, morePreviousoneeightyDaysData, "In Progress")


                update_comparision(PastoneeightyDaysData, morePreviousoneeightyDaysData, "Open")

            }


            if (firstDropVal == 'threesixty') {

                // Calculate the date for two days ago
                const threesixtyDaysAgo = new Date(currentDate);
                threesixtyDaysAgo.setDate(currentDate.getDate() - 360);

                // Format the two days ago date to match the format in the dataset
                const threesixtyDaysAgoDateString = threesixtyDaysAgo.toISOString().split('T')[
                    0]; // Get the date part

                // Filter data for the past two days
                const PastthreesixtyDaysData = total_data.filter(ticket => {
                    return ticket.created_at >= (threesixtyDaysAgoDateString);
                });

                //console.log("Past Two Days ---" + threesixtyDaysAgoDateString.length);

                const seventwentyDaysAgo = new Date(threesixtyDaysAgo);
                seventwentyDaysAgo.setDate(threesixtyDaysAgo.getDate() - 360);

                // Format the four days ago and two days ago dates to match the format in the dataset
                const seventwentyDaysAgoDateString = threesixtyDaysAgo.toISOString().split('T')[
                    0]; // Get the date part
                // const twoDaysAgoDateString = twoDaysAgo.toISOString().split('T')[0]; // Get the date part

                // Filter data for the date range between four days ago and one day before two days ago
                const morePreviousthreesixtyDaysData = total_data.filter(ticket => {
                    const createdDate = ticket.created_at.split(' ')[
                        0]; // Extract the date part
                    return createdDate >= seventwentyDaysAgoDateString && createdDate <=
                        threesixtyDaysAgoDateString;
                });

                //console.log("More Two Days ---" + morePreviousthreesixtyDaysData.length);

                // Get the current date

                update_comparision(PastthreesixtyDaysData, morePreviousthreesixtyDaysData, 'Total')
                ///Total Tickets Comparision Work End

                //Closed Tickets Work Start

                update_comparision(PastthreesixtyDaysData, morePreviousthreesixtyDaysData, "Closed")


                ///Closed Tickets Work ENd


                /// In Progress Work Start here

                update_comparision(PastthreesixtyDaysData, morePreviousthreesixtyDaysData,
                    "In Progress")


                update_comparision(PastthreesixtyDaysData, morePreviousthreesixtyDaysData, "Open")

            }
            if (firstDropVal != 'custom') {
                $('#from_div').css('display', 'none');
                $('#to_div').css('display', 'none');
                $('#getData').css('display', 'none');
            } else {
                $('#from_div').css('display', 'block');
                $('#to_div').css('display', 'block');
                $('#getData').css('display', 'block');
            }
        });



    })





    if ("{{ Auth::user()->company_id == 0 }}") {

        function getBu() {


        }

        function cus_record(id) {
            company = $("#select_company").val();
            bu_id = $("#select_bu").val();
            var settings = {
                "url": "api/dashboard/get_customers_w_t/" + company + "/" + bu_id + "/" + id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                total_data = response;
                $("#total_tickets").html('');
                $("#pending_tickets").html("");
                $("#inprogress").html("");
                $("#closed").html("");
                ratio_chart.destroy();
                toverview_graph.destroy();

                bar_chart_issuetype_graph.destroy();
                stacked1_graph.destroy();
                impactpie.destroy();
                prioritypie.destroy();
                stacked.destroy();
                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title === "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);



                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);

            });

        }

        function bu_wise_record(bu_id) {
            company = $("#select_company").val();

            $.ajax({
                url: "api/dashboard/get_customers/" + bu_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    cus.clearChoices();
                    console.log("check" + response);
                    cus.setChoices(response, 'id', 'first_name', false);
                }
            });

            var settings = {
                "url": "api/dashboard/bu_wise_records/" + company + "/" + bu_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                total_data = response;
                $("#total_tickets").html('');
                $("#pending_tickets").html("");
                $("#inprogress").html("");
                $("#closed").html("");
                ratio_chart.destroy();
                toverview_graph.destroy();

                bar_chart_issuetype_graph.destroy();
                stacked1_graph.destroy();
                impactpie.destroy();
                prioritypie.destroy();
                stacked.destroy();
                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title === "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);



                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);

            });

        }


        function company_wise_tickets(company_id) {

            $.ajax({
                url: "api/business_units/company/" + company_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    bu.clearChoices();
                    console.log("check" + response);
                    bu.setChoices(response, 'id', 'name', false);
                }
            });
            var settings = {
                "url": "api/company_wise_dashboard/" + company_id + "",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                total_data = response;
                $("#total_tickets").html('');
                $("#pending_tickets").html("");
                $("#inprogress").html("");
                $("#closed").html("");
                ratio_chart.destroy();
                toverview_graph.destroy();

                bar_chart_issuetype_graph.destroy();
                stacked1_graph.destroy();
                impactpie.destroy();
                prioritypie.destroy();
                stacked.destroy();
                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title === "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);



                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);

            });

        }

        function getg_id() {
            var settings = {
                "url": "api/dashboard/super_admin_tickets",
                "method": "GET",
                "timeout": 0,
            };
            $.ajax(settings).done(function(response) {
                total_data = response;

                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title ===
                    "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);
                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);



            });
            $('#select_bu_div').css('display', 'block');
        }
    } else {


        function getg_id() {
            var settings = {
                "url": "api/users/{{ Auth::user()->bu_id }}/{{ Auth::user()->designation_id }}",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                g_id = response[0]['group_id'];
                var settings = {
                    "url": "api/users_bu_group/" + g_id,
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(settings).done(function(response) {
                    designationTitle = response[0]['title'];
                    // alert(designationTitle);
                    if (designationTitle == "Staff") {

                        console.log(designationTitle)
                        $('#select_bu_div').css('display', 'none')
                    } else {
                        $('#select_bu_div').css('display', 'block')

                    }
                    var settings = {
                        "url": "api/dashboard/index/{{ Auth::user()->company_id }}/" +
                            designationTitle + "/{{ Auth::user()->bu_id }}/{{ Auth::user()->id }}",
                        "method": "GET",
                        "timeout": 0,
                    };

                    $.ajax(settings).done(function(response) {
                        total_data = response;

                        // console.log("Total Tickets:" + total_data.length);
                        closedTickets = response.filter(ticket => ticket.status_title ===
                            "Closed");
                        opened = response.filter(ticket => ticket.status_title === "Open");
                        inprogress = response.filter(ticket => ticket.status_title ===
                            "In Progress");
                        // console.log("Closed Tickets:" + closedTickets.length);
                        // console.log("Opened Tickets:" + opened.length);
                        $("#total_tickets").html(total_data.length);
                        $("#pending_tickets").html(opened.length);
                        $("#inprogress").html(inprogress.length);
                        $("#closed").html(closedTickets.length);
                        percentage = closedTickets.length / total_data.length * 100;
                        percentage = Math.round(percentage);
                        ticket_ratio(percentage);
                        issuetype_graph(total_data);
                        toverview_graph_inital(total_data);
                        ImpactPie_initial(total_data);
                        PriorityBar_initial(total_data);
                        timeline_wise(total_data);
                        timeline2_graph(total_data)
                        update_table(total_data);



                    });

                })


            })

        }

        function getBu(company_id) {
            var settings = {
                "url": "api/users/{{ Auth::user()->bu_id }}/{{ Auth::user()->designation_id }}",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                g_id = response[0]['group_id'];
                var settings = {
                    "url": "api/users_bu_group/" + g_id,
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(settings).done(function(response) {
                    designationTitle = response[0]['title'];


                    $.ajax({
                        url: "api/business_units/parent_bu/{{ Auth::user()->company_id }}/{{ Auth::user()->bu_id }}/" +
                            designationTitle + "",
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // bu = new Choices("#select_bu", {
                            //     removeItemButton: !0,
                            // })
                            bu.clearChoices();
                            console.log("check" + response);
                            bu.setChoices(response, 'id', 'name', false, );
                        }

                    });




                })



            })

        }

        function bu_wise_record(bu_id) {
            $.ajax({
                url: "api/dashboard/get_customers/" + bu_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    cus.clearChoices();
                    console.log("check" + response);
                    cus.setChoices(response, 'id', 'first_name', false);
                }
            });
            var settings = {
                "url": "api/dashboard/index/{{ Auth::user()->company_id }}/Manager/" + bu_id +
                    "/{{ Auth::user()->id }}",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                total_data = response;
                $("#total_tickets").html('');
                $("#pending_tickets").html("");
                $("#inprogress").html("");
                $("#closed").html("");
                ratio_chart.destroy();
                toverview_graph.destroy();

                bar_chart_issuetype_graph.destroy();
                stacked1_graph.destroy();
                impactpie.destroy();
                prioritypie.destroy();
                stacked.destroy();
                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title === "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);



                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);

            });

        }

    }

    function cus_record(id) {
            company = $("#select_company").val();
            bu_id = $("#select_bu").val();
            var settings = {
                "url": "api/dashboard/get_customers_w_t/{{Auth::user()->company_id}}/" + bu_id + "/" + id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                total_data = response;
                $("#total_tickets").html('');
                $("#pending_tickets").html("");
                $("#inprogress").html("");
                $("#closed").html("");
                ratio_chart.destroy();
                toverview_graph.destroy();

                bar_chart_issuetype_graph.destroy();
                stacked1_graph.destroy();
                impactpie.destroy();
                prioritypie.destroy();
                stacked.destroy();
                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title === "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);



                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);

            });
        }

    table = $('#myTable').DataTable({
        dom: 'Bfrtip',


        buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

    });


    function update_table(tdata) {
        table.clear().draw();
        $.each(tdata, function(index, data) {
            table.row.add([
                index + 1, '<a href="#" onclick="copyToClipboard(' + data.id + ')">' + '000' + data
                .company_id + '-000' + data.business_unit_id + '-' + data.id + '</a>', data.title, data
                .cus_id,
                data.fname + ' ' + data.lname, data
                .reported_by_name, 'EST ' + data.created_at, data.due_date, data
                .status_title,
                '<div class="dropdown"><a class="text-muted dropdown-toggle font-size-18" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-horizontal"></i> </a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" data-id=' +
                data.id + ' href="Tickets/' + data.id +
                '">View</a><a class="dropdown-item notify" onclick="notify_click(' + data.id +
                ')" id=' + data.id + '>Notify</a>' +
                '<a class="dropdown-item notify" onclick="copyToClipboard(' + data.id +
                ')">Share</a></div></div>',
            ]).draw(false);
        });

    }





    function ticket_ratio(per) {
        var options2 = {
            series: [per],
            chart: {
                type: "radialBar",
                height: 300,
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    track: {
                        background: "#e6ecf9",
                        strokeWidth: "97%",
                        margin: 5,
                        dropShadow: {
                            enabled: !1,
                            top: 2,
                            left: 0,
                            color: "#999",
                            opacity: 1,
                            blur: 2
                        }
                    },
                    hollow: {
                        margin: 15,
                        size: "75%"
                    },
                    dataLabels: {
                        name: {
                            show: !1
                        },
                        value: {
                            offsetY: -2,
                            fontSize: "22px"
                        }
                    }
                }
            },
            grid: {
                padding: {
                    top: -10
                }
            },
            fill: {
                opacity: 1
            },
            colors: barchartColors = getChartColorsArray("chart-radialBar2"),
            labels: ["Average Results"]
        };
        ratio_chart = new ApexCharts(document.querySelector("#chart-radialBar2"), options2);
        ratio_chart.render();
    }


    function toverview_graph_inital(tdata) {
        const ticketCountsByMonth = {};


        const total_year = tdata.filter(ticket => {
            const createdDate = new Date(ticket.created_at);
            return createdDate.getFullYear() === currentYear;
        });

        const allMonthNames = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        // const ticketCounts = Array(12).fill(0); // Initialize with 0 counts for each month

        // Iterate through the closedTickets array and count tickets by month
        tdata.forEach(ticket => {
            const createdDate = new Date(ticket.created_at);
            const monthName = allMonthNames[createdDate.getMonth()];

            if (!monthNames.includes(monthName)) {
                monthNames.push(monthName);
                ticketCounts.push(1);
            } else {
                const index = monthNames.indexOf(monthName);
                ticketCounts[index]++;
            }
        });
        var options = {
            series: [{
                data: ticketCounts
            }],
            chart: {
                toolbar: {
                    show: !1
                },
                height: 180,
                type: "bar",
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        // console.log(config.dataPointIndex);
                        // const category = chart.xaxis.categories[config.dataPointIndex];
                        // const value = selectedDataPoint.y;
                        // monthNames[config.dataPointIndex]

                        // console.log(
                        //     `Selected Data Point - Value: ${monthNames[config.dataPointIndex]}`);

                        const targetMonthData = tdata.filter(ticket => {
                            const createdDate = new Date(ticket.created_at);
                            const createdMonthName = createdDate.toLocaleString('en-US', {
                                month: 'long'
                            });

                            return createdMonthName === monthNames[config.dataPointIndex];
                        });

                        // console.log(targetMonthData);
                        closedTickets = targetMonthData.filter(ticket => ticket.status_title ===
                            "Closed");
                        opened = targetMonthData.filter(ticket => ticket.status_title === "Open" ||
                            ticket.status_title === "Pending");
                        inprogress = targetMonthData.filter(ticket => ticket.status_title ===
                            "In Progress");
                        $("#total_tickets").html(targetMonthData.length);
                        $("#pending_tickets").html(opened.length);
                        $("#inprogress").html(inprogress.length);
                        $("#closed").html(closedTickets.length);
                        percentage = closedTickets.length / targetMonthData.length * 100;
                        percentage = Math.round(percentage);
                        ratio_chart.destroy();
                        ticket_ratio(percentage);
                        impactpie.destroy();
                        // toverview_graph_inital(targetMonthData);
                        ImpactPie_initial(targetMonthData);
                        prioritypie.destroy();
                        PriorityBar_initial(targetMonthData);
                        stacked.destroy();
                        timeline_wise(targetMonthData);
                        update_table(targetMonthData);

                    }
                }
            },

            plotOptions: {
                bar: {
                    columnWidth: "80%",
                    distributed: !0,
                    borderRadius: 8
                }
            },
            fill: {
                opacity: 1
            },
            stroke: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            legend: {
                show: !1
            },
            colors: barchartColors = getChartColorsArray("toverview"),
            xaxis: {
                categories: monthNames
            },
        };
        toverview_graph = new ApexCharts(document.querySelector("#toverview"), options);
        toverview_graph.render();
    }

    //// issue type graph
    function issuetype_graph(tdata) {

        distincttype_title = [];
        type_titleCounts = [];

        distincttype_title = [...new Set(tdata.map(item => item.type_title))];


        // console.log(distincttype_title);
        distincttype_title.forEach(title => {
            const count = tdata.filter(item => item.type_title === title).length;
            type_titleCounts.push(count);

        });


        var options = {
            series: [{
                data: type_titleCounts
            }],
            chart: {
                toolbar: {
                    show: !1
                },
                height: 180,
                type: "bar",
                events: {

                    dataPointSelection: function(event, chartContext, config) {
                        // console.log(config.dataPointIndex);
                        // console.log(
                        //     `Selected Data Point - Value: ${distincttype_title[config.dataPointIndex]}`
                        // );
                        const bugs = tdata.filter(ticket => {
                            return ticket.type_title === distincttype_title[config.dataPointIndex];
                        });


                        // console.log("issuetype"+bugs);
                        closedTickets = bugs.filter(ticket => ticket.status_title ===
                            "Closed");
                        opened = bugs.filter(ticket => ticket.status_title === "Open" ||
                            ticket.status_title === "Pending");
                        inprogress = bugs.filter(ticket => ticket.status_title === "In Progress");
                        $("#total_tickets").html(bugs.length);
                        $("#pending_tickets").html(opened.length);
                        $("#inprogress").html(inprogress.length);
                        $("#closed").html(closedTickets.length);
                        percentage = closedTickets.length / bugs.length * 100;
                        percentage = Math.round(percentage);
                        ratio_chart.destroy();
                        // toverview_graph.destroy();
                        ticket_ratio(percentage);
                        impactpie.destroy();
                        // toverview_graph_inital(bugs);
                        ImpactPie_initial(bugs);
                        prioritypie.destroy();
                        PriorityBar_initial(bugs);
                        stacked.destroy();
                        timeline_wise(bugs);
                        update_table(bugs);

                    }
                }
            },

            plotOptions: {
                bar: {
                    columnWidth: "80%",
                    distributed: !0,
                    borderRadius: 8
                }
            },
            fill: {
                opacity: 1
            },
            stroke: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            legend: {
                show: !1
            },
            colors: barchartColors = getChartColorsArray("bar_chart_issuetype"),
            xaxis: {
                categories: distincttype_title
            },
        }

        bar_chart_issuetype_graph = new ApexCharts(document.querySelector("#bar_chart_issuetype"), options);
        bar_chart_issuetype_graph.render();
    }

    function timeline2_graph(tdata) {


        distincttype_title = [];
        type_titleCounts = [];

        distincttype_title = [...new Set(tdata.map(item => item.type_title))];

        // console.log(distincttype_title);
        distincttype_title.forEach(title => {
            const count = tdata.filter(item => item.type_title === title).length;
            type_titleCounts.push(count);

        });

        var options = {
            series: [{
                data: type_titleCounts
            }],
            chart: {
                toolbar: {
                    show: !1
                },
                height: 280,
                type: "bar",
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        // console.log(config.dataPointIndex);
                        // const category = chart.xaxis.categories[config.dataPointIndex];
                        // const value = selectedDataPoint.y;
                        monthNames[config.dataPointIndex]

                        // console.log(
                        //     `Selected Data Point - Value: ${monthNames[config.dataPointIndex]}`);

                        const bugs = tdata.filter(ticket => {
                            return ticket.type_title === distincttype_title[config.dataPointIndex];
                        });

                        // console.log(bugs);
                        closedTickets = bugs.filter(ticket => ticket.status_title ===
                            "Closed");
                        opened = bugs.filter(ticket => ticket.status_title === "Open" ||
                            ticket.status_title === "Pending");
                        inprogress = bugs.filter(ticket => ticket.status_title ===
                            "In Progress");
                        $("#total_tickets").html(bugs.length);
                        $("#pending_tickets").html(opened.length);
                        $("#inprogress").html(inprogress.length);
                        $("#closed").html(closedTickets.length);
                        percentage = closedTickets.length / bugs.length * 100;
                        percentage = Math.round(percentage);
                        ratio_chart.destroy();
                        ticket_ratio(percentage);
                        impactpie.destroy();
                        // toverview_graph.destroy();
                        // toverview_graph_inital(bugs);
                        ImpactPie_initial(bugs);
                        prioritypie.destroy();
                        PriorityBar_initial(bugs);
                        stacked.destroy();

                        timeline_wise(bugs);
                        update_table(bugs);

                    }
                }
            },

            plotOptions: {
                bar: {
                    columnWidth: "100%",
                    distributed: !0,
                    borderRadius: 8
                }
            },
            fill: {
                opacity: 1
            },
            stroke: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            legend: {
                show: !1
            },
            colors: barchartColors = getChartColorsArray("stacked1"),
            xaxis: {
                categories: distincttype_title
            },
        }

        stacked1_graph = new ApexCharts(document.querySelector("#stacked1"), options);
        stacked1_graph.render();
    }




    function ImpactPie_initial(tdata) {
        // console.log(tdata.length);

        distinctImpactTitles = [];
        impactTitleCounts = [];
        distinctImpactTitles = [...new Set(tdata.map(item => item.impact_title))];

        // console.log(distinctImpactTitles);
        distinctImpactTitles.forEach(title => {
            const count = tdata.filter(item => item.impact_title === title).length;
            impactTitleCounts.push(count);
        });

        // console.log('Impact Titles:', distinctImpactTitles);
        // console.log('Impact Title Counts:', impactTitleCounts);
        var options1 = {
            series: impactTitleCounts,
            chart: {
                width: 250,
                type: 'polarArea',
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        // console.log(config.dataPointIndex);
                        // const category = chart.xaxis.categories[config.dataPointIndex];
                        // const value = selectedDataPoint.y;
                        distinctImpactTitles[config.dataPointIndex]

                        // console.log(
                        //     `Selected Data Point - Value: ${distinctImpactTitles[config.dataPointIndex]}`
                        // );

                        const targetMonthData = tdata.filter(ticket => {
                            return ticket.impact_title === distinctImpactTitles[config
                                .dataPointIndex];
                        });

                        // console.log(targetMonthData);
                        closedTickets = targetMonthData.filter(ticket => ticket.status_title ===
                            "Closed");
                        opened = targetMonthData.filter(ticket => ticket.status_title === "Open" ||
                            ticket.status_title === "Pending");
                        inprogress = targetMonthData.filter(ticket => ticket.status_title ===
                            "In Progress");
                        $("#total_tickets").html(targetMonthData.length);
                        $("#pending_tickets").html(opened.length);
                        $("#inprogress").html(inprogress.length);
                        $("#closed").html(closedTickets.length);
                        percentage = closedTickets.length / targetMonthData.length * 100;
                        percentage = Math.round(percentage);
                        ratio_chart.destroy();
                        ticket_ratio(percentage);
                        // impactpie.destroy();
                        // toverview_graph_inital(targetMonthData);
                        // ImpactPie_initial(targetMonthData);
                        prioritypie.destroy();
                        PriorityBar_initial(targetMonthData);
                        stacked.destroy();
                        // toverview_graph.destroy();
                        timeline_wise(targetMonthData);
                        update_table(targetMonthData);

                    }
                }
            },
            labels: distinctImpactTitles,
            fill: {
                opacity: 1
            },
            stroke: {
                width: 1,
                colors: undefined
            },
            yaxis: {
                show: false
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                polarArea: {
                    rings: {
                        strokeWidth: 0
                    },
                    spokes: {
                        strokeWidth: 0
                    },
                }
            },
            theme: {
                monochrome: {
                    enabled: true,
                    shadeTo: 'light',
                    shadeIntensity: 0.6
                }
            }
        };



        impactpie = new ApexCharts(document.querySelector("#impactpie"), options1);
        impactpie.render();

    }


    function PriorityBar_initial(tdata) {

        distinctPriorityTitles = [];
        priorityTitleCounts = [];

        distinctPriorityTitles = [...new Set(tdata.map(item => item.priority_title))];

        // console.log(distinctPriorityTitles);
        distinctPriorityTitles.forEach(title => {
            const count = tdata.filter(item => item.priority_title === title).length;
            priorityTitleCounts.push(count);
        });
        var options = {
            series: [{
                data: priorityTitleCounts
            }],
            chart: {
                type: 'bar',
                height: 170,
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        // console.log(config.dataPointIndex);
                        // const category = chart.xaxis.categories[config.dataPointIndex];
                        // const value = selectedDataPoint.y;
                        distinctImpactTitles[config.dataPointIndex]

                        // console.log(
                        //     `Selected Data Point - Value: ${distinctPriorityTitles[config.dataPointIndex]}`
                        // );

                        const targetMonthData = tdata.filter(ticket => {
                            return ticket.priority_title === distinctPriorityTitles[config
                                .dataPointIndex];
                        });

                        // console.log(targetMonthData);
                        closedTickets = targetMonthData.filter(ticket => ticket.status_title ===
                            "Closed");
                        opened = targetMonthData.filter(ticket => ticket.status_title === "Open" ||
                            ticket.status_title === "Pending");
                        inprogress = targetMonthData.filter(ticket => ticket.status_title ===
                            "In Progress");
                        $("#total_tickets").html(targetMonthData.length);
                        $("#pending_tickets").html(opened.length);
                        $("#inprogress").html(inprogress.length);
                        $("#closed").html(closedTickets.length);
                        percentage = closedTickets.length / targetMonthData.length * 100;
                        percentage = Math.round(percentage);
                        ratio_chart.destroy();
                        // toverview_graph.destroy();
                        ticket_ratio(percentage);
                        impactpie.destroy();
                        // toverview_graph_inital(targetMonthData);
                        ImpactPie_initial(targetMonthData);
                        // prioritypie.destroy();
                        // PriorityBar_initial(targetMonthData);
                        stacked.destroy();

                        timeline_wise(targetMonthData);
                        update_table(targetMonthData);

                    }
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: distinctPriorityTitles,
            }
        };

        prioritypie = new ApexCharts(document.querySelector("#prioritypie"), options);
        prioritypie.render();

    }


    function timeline_wise(tdata) {
        distinctStatusTitles = [];
        statusTitleCounts = [];

        distinctStatusTitles = [...new Set(tdata.map(item => item.status_title))];

        // console.log(distinctStatusTitles);
        distinctStatusTitles.forEach(title => {
            const count = tdata.filter(item => item.status_title === title).length;
            statusTitleCounts.push(count);
        });

        var options = {
            series: [{
                data: statusTitleCounts
            }],
            chart: {
                type: 'bar',
                height: 280,
                events: {
                    dataPointSelection: function(event, chartContext, config) {

                        // console.log(config.dataPointIndex);
                        // const category = chart.xaxis.categories[config.dataPointIndex];
                        // const value = selectedDataPoint.y;
                        distinctStatusTitles[config.dataPointIndex]

                        // console.log(
                        //     `Selected Data Point - Value: ${distinctStatusTitles[config.dataPointIndex]}`
                        // );

                        const targetMonthData = tdata.filter(ticket => {
                            return ticket.status_title === distinctStatusTitles[config
                                .dataPointIndex];
                        });

                        // console.log(targetMonthData);
                        closedTickets = targetMonthData.filter(ticket => ticket.status_title ===
                            "Closed");
                        opened = targetMonthData.filter(ticket => ticket.status_title === "Open" ||
                            ticket.status_title === "Pending");
                        inprogress = targetMonthData.filter(ticket => ticket.status_title ===
                            "In Progress");
                        $("#total_tickets").html(targetMonthData.length);
                        $("#pending_tickets").html(opened.length);
                        $("#inprogress").html(inprogress.length);
                        $("#closed").html(closedTickets.length);
                        percentage = closedTickets.length / targetMonthData.length * 100;
                        percentage = Math.round(percentage);
                        ratio_chart.destroy();
                        ticket_ratio(percentage);
                        impactpie.destroy();
                        ImpactPie_initial(targetMonthData);
                        prioritypie.destroy();
                        PriorityBar_initial(targetMonthData);
                        update_table(targetMonthData)

                    }
                },
            },
            colors: getChartColorsArray("toverview"),
            plotOptions: {
                bar: {
                    borderRadius: 18,
                    dataLabels: {
                        total: {
                            enabled: false,
                            offsetX: 0,
                            style: {
                                fontSize: '13px',
                                color: '#fff',
                                fontWeight: 900
                            }
                        }
                    }
                },
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            xaxis: {
                categories: distinctStatusTitles,
            },
            yaxis: {
                title: {
                    text: 'Tickets'
                },
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val;
                    }
                }
            },
            fill: {
                opacity: 1
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            }
        };

        stacked = new ApexCharts(document.querySelector("#stacked"), options);
        stacked.render();

    }


    function update_comparision(frontData, backData, type) {
        let percentage = 0;
        var closedTickets = frontData.filter(ticket => ticket.status_title === "Closed");

        if (type == "Total") {
            // console.log('infunction');
            var front = frontData;
            var back = backData;

            // console.log(front.length);
            // console.log(back.length);

            if (back.length !== 0) {

                percentageDifference = ((front.length - back.length) / back.length) * 100;
                // console.log(percentageDifference);
            } else if (back.length == front.length) {
                percentageDifference = "No Change";
                // console.log("Here");
            } else {
                percentageDifference = 100
            }

            if (percentageDifference == "No Change") {

                $("#total_tickets").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"> No Change </span>`
                );

            }


            if (percentageDifference > 0) {
                changeDescription = `Rise of ${percentageDifference.toFixed(2)}%`;
                $("#total_tickets").html(front.length +
                    `<span class="text-success fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-up"></i>${percentageDifference.toFixed(2)}</span>`
                );
            } else if (percentageDifference < 0) {

                changeDescription = `Decrease of ${Math.abs(percentageDifference).toFixed(2)}%`;
                $("#total_tickets").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-down"></i>${Math.abs(percentageDifference).toFixed(2)}</span>`
                );
            }
        }


        if (type == "In Progress") {
            // console.log('infunction');
            var front = frontData.filter(ticket => ticket.status_title === "In Progress");
            var back = backData.filter(ticket => ticket.status_title === "In Progress");

            // console.log(front.length);
            // console.log(back.length);

            if (back.length !== 0) {

                percentageDifference = ((front.length - back.length) / back.length) * 100;
                // console.log(percentageDifference);
            } else if (back.length == front.length) {
                percentageDifference = "No Change";
                // console.log("Here");
            } else {
                percentageDifference = 100
            }

            if (percentageDifference == "No Change") {

                $("#inprogress").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"> No Change </span>`
                );

            }


            if (percentageDifference > 0) {
                changeDescription = `Rise of ${percentageDifference.toFixed(2)}%`;
                $("#inprogress").html(front.length +
                    `<span class="text-success fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-up"></i>${percentageDifference.toFixed(2)}</span>`
                );
            } else if (percentageDifference < 0) {

                changeDescription = `Decrease of ${Math.abs(percentageDifference).toFixed(2)}%`;
                $("#inprogress").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-down"></i>${Math.abs(percentageDifference).toFixed(2)}</span>`
                );
            }
        }

        if (type == "Closed") {
            // console.log('infunction');
            var front = frontData.filter(ticket => ticket.status_title === "Closed");
            var back = backData.filter(ticket => ticket.status_title === "Closed");

            // console.log(front.length);
            // console.log(back.length);

            if (back.length !== 0) {

                percentageDifference = ((front.length - back.length) / back.length) * 100;
                // console.log(percentageDifference);
            } else if (back.length == front.length) {
                percentageDifference = "No Change";
                // console.log("Here");
            } else {
                percentageDifference = 100
            }

            if (percentageDifference == "No Change") {

                $("#closed").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"> No Change </span>`
                );

            }


            if (percentageDifference > 0) {
                changeDescription = `Rise of ${percentageDifference.toFixed(2)}%`;
                $("#closed").html(front.length +
                    `<span class="text-success fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-up"></i>${percentageDifference.toFixed(2)}</span>`
                );
            } else if (percentageDifference < 0) {

                changeDescription = `Decrease of ${Math.abs(percentageDifference).toFixed(2)}%`;
                $("#closed").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-down"></i>${Math.abs(percentageDifference).toFixed(2)}</span>`
                );
            }
        }

        if (type == "Open") {
            // console.log('infunction');
            var front = frontData.filter(ticket => ticket.status_title === "Open");
            var back = backData.filter(ticket => ticket.status_title === "Open");

            // console.log(front.length);
            // console.log(back.length);

            if (back.length !== 0) {

                percentageDifference = ((front.length - back.length) / back.length) * 100;
                // console.log(percentageDifference);
            } else if (back.length == front.length) {
                percentageDifference = "No Change";
                // console.log("Here");
            } else {
                percentageDifference = 100
            }

            if (percentageDifference == "No Change") {

                $("#pending_tickets").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"> No Change </span>`
                );

            }


            if (percentageDifference > 0) {
                changeDescription = `Rise of ${percentageDifference.toFixed(2)}%`;
                $("#pending_tickets").html(front.length +
                    `<span class="text-success fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-up"></i>${percentageDifference.toFixed(2)}</span>`
                );
            } else if (percentageDifference < 0) {

                changeDescription = `Decrease of ${Math.abs(percentageDifference).toFixed(2)}%`;
                $("#pending_tickets").html(front.length +
                    `<span class="text-danger fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-down"></i>${Math.abs(percentageDifference).toFixed(2)}</span>`
                );
            }
        }

        percentage = closedTickets.length / frontData.length * 100;
        percentage = Math.round(percentage);
        ratio_chart.destroy();
        ticket_ratio(percentage);
        impactpie.destroy();
        // toverview_graph_inital(targetMonthData);
        ImpactPie_initial(frontData);
        prioritypie.destroy();
        PriorityBar_initial(frontData);
        stacked.destroy();
        timeline_wise(frontData);
        update_table(frontData);


    }
    $('#getData2').click(function(e) {

        html2canvas(document.body).then(function(canvas) {
            const link = document.createElement('a');
            canvas.toBlob(function(blob) {
                const url = URL.createObjectURL(blob);
                link.href = url;
                link.download = 'screenshot.jpg';
                link.click();
                URL.revokeObjectURL(url);
            }, 'image/jpeg');
        });

    });

    $('#getData').click(function(e) {
        //alert(e);
        var resolved = $("#resolved").val();
        var to = $("#to").val();

        total_data = total_data.filter(ticket => {
            const createdDate = ticket.created_at.split('T')[
                0]; // Extract the date part
            return createdDate >= resolved && createdDate <=
                to;
        });

        // console.log("Total Tickets:" + total_data.length);
        closedTickets = total_data.filter(ticket => ticket.status_title === "Closed");
        opened = total_data.filter(ticket => ticket.status_title === "Open");
        inprogress = total_data.filter(ticket => ticket.status_title === "In Progress");
        // console.log("Closed Tickets:" + closedTickets.length);
        // console.log("Opened Tickets:" + opened.length);
        $("#total_tickets").html(total_data.length);
        $("#pending_tickets").html(opened.length);
        $("#inprogress").html(inprogress.length);
        $("#closed").html(closedTickets.length);
        percentage = closedTickets.length / total_data.length * 100;
        percentage = Math.round(percentage);
        ratio_chart.destroy();
        ticket_ratio(percentage);
        impactpie.destroy();
        // toverview_graph_inital(targetMonthData);
        ImpactPie_initial(total_data);
        prioritypie.destroy();
        PriorityBar_initial(total_data);
        stacked.destroy();
        timeline_wise(total_data);
        update_table(total_data);



    });


    function takeScreenshot() {
        html2canvas(document.body).then(function(canvas) {
            const link = document.createElement('a');
            canvas.toBlob(function(blob) {
                const url = URL.createObjectURL(blob);
                link.href = url;
                link.download = 'screenshot.jpg';
                link.click();
                URL.revokeObjectURL(url);
            }, 'image/jpeg');
        });
    }


    function changegraph() {
        document.getElementById('ticketoverview_title').innerHTML = "Overview";
        document.getElementById('bar_chart_issuetype').style.display = 'none';
        document.getElementById('toverview').style.display = 'block';
    }

    function changegraph2() {
        document.getElementById('ticketoverview_title').innerHTML = "Issues Overview";
        document.getElementById('toverview').style.display = 'none';
        document.getElementById('bar_chart_issuetype').style.display = 'block';
    }

    function changetimelinegraph() {
        document.getElementById('pipeline_title').innerHTML = "Trends By Status";
        document.getElementById('stacked1').style.display = 'none';
        document.getElementById('stacked').style.display = 'block';
    }

    function changetimelinegraph2() {
        document.getElementById('pipeline_title').innerHTML = "Trend On Issue";
        document.getElementById('stacked').style.display = 'none';
        document.getElementById('stacked1').style.display = 'block';
    }

    function notify_click(id) {
        $('#dashboard_ticket_modal').modal('show');
        //alert(id);
        document.getElementById("ticket_id").value = id;
    }

    function send_email() {
        var ticketId = document.getElementById("ticket_id").value;
        var ticket_user = document.getElementById("ticket_user").value;
        // alert(ticketId + "---" + ticket_user);
        var settings = {
            "url": "api/dashboard/notifyemail/" + ticket_user + "/" + ticketId + "",
            "method": "GET",
            "timeout": 0,
        };
        $('#dashboard_ticket_modal').modal('hide');
        $.ajax(settings).done(function(response) {
            // console.log(response);

        });

    }

    function copyToClipboard(text) {
        // Create a temporary textarea element
        var $tempTextarea = $('<textarea>');
        var pageUrl = window.location.href;
        var urlBeforeFirstSlash = pageUrl.split('/')[2];
        // Set the value of the textarea
        $tempTextarea.val(urlBeforeFirstSlash + '/Tickets/' + text);

        // Append the textarea to the body
        $('body').append($tempTextarea);

        // Select the text in the textarea
        $tempTextarea.select();

        // Copy the selected text to the clipboard
        document.execCommand('copy');

        // Remove the temporary textarea
        $tempTextarea.remove();

        alert('Link Copied!');
    }
    function assing_record(id){
        if(id==1){
            var settings = {
                "url": "api/dashboard/created_by/{{Auth::user()->id}}",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                total_data = response;
                $("#total_tickets").html('');
                $("#pending_tickets").html("");
                $("#inprogress").html("");
                $("#closed").html("");
                ratio_chart.destroy();
                toverview_graph.destroy();

                bar_chart_issuetype_graph.destroy();
                stacked1_graph.destroy();
                impactpie.destroy();
                prioritypie.destroy();
                stacked.destroy();
                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title === "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);



                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);
            });
        }
        else if(id==2){
            var settings = {
                "url": "api/dashboard/assign_to/{{Auth::user()->id}}",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                total_data = response;
                $("#total_tickets").html('');
                $("#pending_tickets").html("");
                $("#inprogress").html("");
                $("#closed").html("");
                ratio_chart.destroy();
                toverview_graph.destroy();

                bar_chart_issuetype_graph.destroy();
                stacked1_graph.destroy();
                impactpie.destroy();
                prioritypie.destroy();
                stacked.destroy();
                // console.log("Total Tickets:" + total_data.length);
                closedTickets = response.filter(ticket => ticket.status_title === "Closed");
                opened = response.filter(ticket => ticket.status_title === "Open");
                inprogress = response.filter(ticket => ticket.status_title === "In Progress");
                // console.log("Closed Tickets:" + closedTickets.length);
                // console.log("Opened Tickets:" + opened.length);
                $("#total_tickets").html(total_data.length);
                $("#pending_tickets").html(opened.length);
                $("#inprogress").html(inprogress.length);
                $("#closed").html(closedTickets.length);
                percentage = closedTickets.length / total_data.length * 100;
                percentage = Math.round(percentage);



                ticket_ratio(percentage);
                issuetype_graph(total_data);
                toverview_graph_inital(total_data);
                ImpactPie_initial(total_data);
                PriorityBar_initial(total_data);
                timeline_wise(total_data);
                timeline2_graph(total_data)
                update_table(total_data);
            });

        }
    }


    function check_ticket_button() {

        $('#ticket_dates').modal('show');
    }
</script>

</html>
