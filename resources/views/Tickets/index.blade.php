<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jul 2023 18:04:41 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Tickets | Service Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> --}}
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    @include('partials.style')
    {{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css'> --}}
    <link rel="stylesheet" href="./style.css">
    <Style>
        input[switch]:checked+label:after {
            left: 70px;
            background-color: #f5f6f8;
        }

        h1 {
            text-align: center;
        }

        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed rgb(0, 135, 247);
            border-image: none;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
    </Style>
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
            <div class="page-content">
                <div id="liveAlertPlaceholder"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-2">

                                            <h4 class="card-title mb-0 pt-3" id="tickettittle">Tickets</h4>


                                        </div>
                                        <div class="col-md-4">
                                            {{-- <button type="button" class="btn btn-soft-primary waves-effect waves-light"  data-bs-toggle="modal" data-bs-target="#myModal">
                                                     Add New
                                                </button> --}}
                                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                aria-controls="offcanvasRight"><i
                                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2"></i>Add
                                                New</button>

                                            {{-- <button type="button" class="btn btn-primary waves-effect waves-light">Add New</button> --}}
                                        </div>

                                    </div>



                                </div><!-- end card header -->
                                <div class="card-body">
                                    <table id="myTable">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Ticket No</th>
                                                <th>Title</th>
                                                <th>Issue Type</th>
                                                <th>Reported On</th>
                                                <th>Account Id</th>
                                                <th>Account Name</th>
                                                <th>Status</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                                {{-- <th>Delete</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end card body -->
                            </div>

                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>


                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>
        <!-- end main content-->
        @include('partials.footer')
    </div>
    <!-- END layout-wrapper -->
    @include('partials.right_bar')
    <!-- Right Sidebar -->

    <!-- JAVASCRIPT -->
    <!-- right offcanvas -->
    <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Create Ticket</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body" id="modalbody">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="formrow-inputState" class="form-label">Ticket #</label>
                        <input class="form-control " type="text" name="ticket_n" id="ticket_no" data-model="post"
                            disabled="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="formrow-inputState" class="form-label">Ticket Created By</label>
                        <div class="col-md-12">
                            <select class="form-control" name="choices-single-default" id="formrow-inputState"
                                placeholder="This is a search placeholder" value="Admin" data-model="post"
                                disabled="">
                                <option value="0" selected>Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="square-switch">
                    <input type="checkbox" id="square-switch1" switch="none" checked="" onclick="myFunction()">
                    <label for="square-switch1" data-on-label="Indivisual" data-off-label="Group"
                        style="width: 100px;"></label>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Task Assigned</label>
                            <div class="col-md-12">
                                <select class="form-control" id="assigned" placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Ticket Reported By</label>
                            <div class="col-md-12">
                                <select class="form-control" id="reported" placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Problem</label>
                            <input type="text" class="form-control" placeholder="Enter Problem" id="title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Mode of Complaint</label>
                            <input type="text" class="form-control" placeholder="Mode of Complaint"
                                id="moc">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Issue Type</label>
                            <div class="col-md-12">
                                <select class="form-control" id="type"
                                    placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Ticket Resolved By</label>
                            <div class="col-md-12">
                                <select class="form-control" id="ticketresolved"
                                    placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row"> -->
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Issue Sub Type</label>
                            <div class="col-md-12">
                                <select class="form-control" id="subtype"
                                    placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Ticket Resolved Date</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Resolved Date"
                                    id="resolved">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Status</label>
                            <div class="col-md-12">
                                <select class="form-control" id="status1">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Priority</label>
                            <div class="col-md-12">
                                <select class="form-control" id="priority"
                                    placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">BU/Store Name</label>
                            <div class="col-md-12">
                                <select class="form-control" id="business"
                                    placeholder="This is a search placeholder"
                                    onchange="addtional_fields(this.value)">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" id="customer_col" style="display: none;">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Account</label>
                            <div class="col-md-12">
                                <select class="form-control" id="customer"
                                    placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Ticket Due Date</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Due Date" id="due_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Store Info</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Enter Store Info"
                                    id="store_info">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Impact</label>
                            <div class="col-md-12">
                                <select class="form-control" id="impact"
                                    placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Store Manager </label>
                            <div class="col-md-12">
                                <select class="form-control" id="manager"
                                    placeholder="This is a search placeholder">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="formrow-inputState" class="form-label">Marketing Manager </label>
                            <div class="col-md-12">
                                <select class="form-control" id="marketing"
                                    placeholder="This is a search placeholder">

                                </select>


                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row" id="newfields">
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="description" name="description" spellcheck="false">
                                    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            {{-- <form action="#" class="dropzone dz-clickable">

                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                    </div>

                                    <h4>Click to Upload</h4>
                                </div>
                            </form> --}}
                            <DIV id="dropzone">
                                <FORM class="dropzone needsclick" id="demo-upload" action="/upload">
                                    <DIV class="dz-message needsclick">
                                        Drop files here or click to upload.<BR>

                                    </DIV>
                                </FORM>
                            </DIV>
                            <DIV id="preview-template" style="display: none;">
                                <DIV class="dz-preview dz-file-preview">
                                    <DIV class="dz-image"><IMG data-dz-thumbnail=""></DIV>
                                    <DIV class="dz-details">
                                        <DIV class="dz-size"><SPAN data-dz-size=""></SPAN></DIV>
                                        <DIV class="dz-filename"><SPAN data-dz-name=""></SPAN></DIV>
                                    </DIV>
                                    <DIV class="dz-progress"><SPAN class="dz-upload"
                                            data-dz-uploadprogress=""></SPAN></DIV>
                                    <DIV class="dz-error-message"><SPAN data-dz-errormessage=""></SPAN></DIV>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 row">
                                    {{-- <label for="example-text-input" class="col-md-2 col-form-label">Domain Members</label> --}}
                                    <div class="col-md-6">
                                        <div id="fields">
                                            <input type="text" name="hidden" hidden id="hidden"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-10 col-form-label"></label>
                                    <div class="col-md-2">

                                        <button type="button" onclick="submit()"
                                            class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>

            @include('partials.script')






</body>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

<script>
    //    if(session('success')){
    //     alert(session('success'));
    //    }
    const profileDropzone = new Dropzone('#demo-upload', {
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        parallelUploads: 2,
        thumbnailHeight: 120,
        thumbnailWidth: 120,
        maxFilesize: 30,
        maxFiles: 1,
        filesizeBase: 1000,
        url: "api/tickets", // API endpoint URL
        paramName: "profile", // Name of the file parameter
        autoProcessQueue: true,
        thumbnail: function(file, dataUrl) {
            if (file.previewElement) {
                file.previewElement.classList.remove("dz-file-preview");
                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                for (var i = 0; i < images.length; i++) {
                    var thumbnailElement = images[i];
                    thumbnailElement.alt = file.name;
                    thumbnailElement.src = dataUrl;
                }
                setTimeout(function() {
                    file.previewElement.classList.add("dz-image-preview");
                }, 1);
            }
        }

    });


    // Now fake the file upload, since GitHub does not handle file uploads
    // and returns a 404

    var minSteps = 6,
        maxSteps = 60,
        timeBetweenSteps = 100,
        bytesPerStep = 100000;

    dropzone.uploadFiles = function(files) {
        var self = this;

        for (var i = 0; i < files.length; i++) {

            var file = files[i];
            totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

            for (var step = 0; step < totalSteps; step++) {
                var duration = timeBetweenSteps * (step + 1);
                setTimeout(function(file, totalSteps, step) {
                    return function() {
                        file.upload = {
                            progress: 100 * (step + 1) / totalSteps,
                            total: file.size,
                            bytesSent: (step + 1) * file.size / totalSteps
                        };

                        self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                        if (file.upload.progress == 100) {
                            file.status = Dropzone.SUCCESS;
                            self.emit("success", file, 'success', null);
                            self.emit("complete", file);
                            self.processQueue();
                            //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
                        }
                    };
                }(file, totalSteps, step), duration);
            }
        }
    }
</script>
<script>
    var assigned, reported, marketing, manager, ticketresolved;
    var subtype;
    var table;
    var resolved, due_date, type1, status1, impact, priority, bu, tid, customer;
    customer = new Choices("#customer", {
        removeItemButton: !0,
    })
    $(document).ready(function() {



        getg_id();
        getBu();


        resolved = flatpickr('#resolved', {});
        due_date = flatpickr('#due_date', {});
        $("#addfield").click(function() {
            var newRowAdd =
                '<div id="row" class="row"><div class="input-group m-3">' +
                '<div class="col-3"><div class="input-group-prepend">' +
                '<button type="button" id="DeleteRow" class="btn btn-outline-danger waves-effect waves-light m-1">Delete</button>' +
                '<i class="bi bi-trash"></i></button></div> </div>' +
                '<div class="col-4"><div class="input-group-prepend m-1"><input class="form-control" type="text" placeholder="Additional Field"></div> </div><div class="col-1"></div>' +
                '<div class="col-4"><select class="form-control "  name="choices-single-default" id="choices-single-default" placeholder=""><option>String</option><option>Number</option><option>Text</option></select> </div> </div>' +
                '';

            $('#fields').append(newRowAdd);
            // alert("The paragraph was clicked.");
        });

        $.ajax({
            url: ("{{ Auth::user()->company_id == 0 }}" ? "api/users/super_admin_users" :
                "api/users/company/{{ Auth::user()->company_id }}"),
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                assigned = new Choices("#assigned", {
                    removeItemButton: !0,
                })
                assigned.clearChoices();
                console.log(response);
                assigned.setChoices(response,
                    'id',
                    'name',
                    false, );

                reported = new Choices("#reported", {
                    removeItemButton: !0,
                })
                reported.clearChoices();
                console.log(response);
                reported.setChoices(response,
                    'id',
                    'name',
                    false, );

                marketing = new Choices("#marketing", {
                    removeItemButton: !0,
                })
                marketing.clearChoices();
                console.log(response);
                marketing.setChoices(response,
                    'id',
                    'name',
                    false, );

                manager = new Choices("#manager", {
                    removeItemButton: !0,
                })
                manager.clearChoices();
                console.log(response);
                manager.setChoices(response,
                    'id',
                    'name',
                    false, );

                ticketresolved = new Choices("#ticketresolved", {
                    removeItemButton: !0,
                })
                ticketresolved.clearChoices();
                console.log(response);
                ticketresolved.setChoices(response,
                    'id',
                    'name',
                    false, );

            }
        });

        $.ajax({
            url: "api/companytype/{{ Auth::user()->company_id }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                type1 = new Choices("#type", {
                    removeItemButton: !0,
                })
                type1.clearChoices();
                console.log(response);
                type1.setChoices(response,
                    'id',
                    'title',
                    false, );
            }
        });

        $.ajax({
            url: "api/status/company/{{ Auth::user()->company_id }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                status1 = new Choices("#status1", {
                    removeItemButton: !0,
                })
                status1.clearChoices();
                console.log(response);
                status1.setChoices(response,
                    'id',
                    'title',
                    false, );
            }
        });

        $.ajax({
            url: "api/priority/company/{{ Auth::user()->company_id }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                priority = new Choices("#priority", {
                    removeItemButton: !0,
                })
                priority.clearChoices();
                console.log(response);
                priority.setChoices(response,
                    'id',
                    'title',
                    false, );
            }
        });





        $.ajax({
            url: "api/impacts/company/{{ Auth::user()->company_id }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                impact = new Choices("#impact", {
                    removeItemButton: !0,
                })
                impact.clearChoices();
                console.log(response);
                impact.setChoices(response,
                    'id',
                    'title',
                    false, );
            }
        });

        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
        table = $('#myTable').DataTable({
            dom: 'Bfrtip',


            buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],


        });
        getg_id();
    });

    function bu_wise(id) {
        $.ajax({
            url: "api/bu_wise_cus/" + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.length === 0) {
                    $('#customer_col').css('display', "none");
                } else {
                    $('#customer_col').css('display', "block");
                    customer.clearChoices();
                    console.log(response);
                    customer.setChoices(response, 'id', 'first_name', false);
                }
            }
        });
    }


    function myFunction() {
        var checkBox = document.getElementById("square-switch1");
        var text = document.getElementById("text");
        if (checkBox.checked == true) {
            // alert("Indivisual")
            $.ajax({
                url: "api/users/company/{{ Auth::user()->company_id }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    assigned.clearChoices();
                    console.log(response);
                    assigned.setChoices(response,
                        'id',
                        'name',
                        false, );
                }
            });

        } else {
            $.ajax({
                url: "api/bu_groups/company/{{ Auth::user()->company_id }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    assigned.clearChoices();
                    console.log(response);
                    assigned.setChoices(response,
                        'id',
                        'title',
                        false, );
                }
            });
        }
    }


    subtype = new Choices("#subtype", {
        removeItemButton: !0,
    })
    $("#type").change(function() {
        var end = this.value;
        // alert(end);
        $.ajax({
            url: "api/types/parent/" + end + "",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                subtype.clearChoices();
                console.log(response);
                subtype.setChoices(response,
                    'id',
                    'title',
                    false, );
            }
        });


        // $.ajax({
        //     url: "api/types",
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(response) {
        //         type1 = new Choices("#type", {
        //             removeItemButton: !0,
        //         })
        //         type1.clearChoices();
        //         console.log(response);
        //         type1.setChoices(response,
        //             'id',
        //             'title',
        //             false, );
        //     }
        // });
    });

    function submit() {
        // profileDropzone.processQueue();
        var bu_id = $('#business').val();
        var assign_val = $('#assigned').val();
        var assign;

        if (assign_val == null) {

            var settings = {
                "url": "api/business_units_r/{{ Auth::user()->company_id }}/" + bu_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                console.log(response[0]);
                assign = response[0]['reponsible_user'];
                var form = new FormData();
                form.append("title", document.getElementById("title").value);
                form.append("description", document.getElementById("description").value);
                form.append("completed_date", document.getElementById("resolved").value);
                form.append("due_date", document.getElementById("due_date").value);
                form.append("company_id", {{ Auth::user()->company_id }});
                form.append("completed_by", document.getElementById("ticketresolved").value);
                form.append("business_unit_id", document.getElementById("business").value);
                form.append("customer_id", document.getElementById("customer").value);
                form.append("vendor_id", "0");
                form.append("vendor_type_id", "0");
                form.append("reported_by", document.getElementById("reported").value);
                form.append("assigned_to", assign);
                form.append("mode_of_complaint", document.getElementById("moc").value);
                form.append("sub_type_id", document.getElementById("subtype").value);
                form.append("priority_id", document.getElementById("priority").value);
                form.append("impact_id", document.getElementById("impact").value);
                form.append("status_id", document.getElementById("status1").value);
                form.append("store_contact", document.getElementById("store_info").value);
                form.append("created_by", {{ Auth::user()->id }});
                form.append("email_status", "0");
                var checkBox1 = document.getElementById("square-switch1");
                console.log("SoMI" + profileDropzone.files[0]);

                if (checkBox1.checked == true) {
                    // alert('checked');
                    form.append("assigned_type", "Individual");
                } else {
                    // alert('unchecked')
                    form.append("assigned_type", "Group");
                }

                if (profileDropzone.files.length > 0) {
                    form.append("profile", profileDropzone.files[0]);
                } else {
                    // alert("Samad---"+profileDropzone.files.length);
                }


                // console.log(form);

                var settings = {
                    "url": "api/tickets",
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form
                };


                $.ajax({
                    ...settings,
                    statusCode: {
                        200: function(response) {
                            console.log(response);
                            // $('#myModal').modal('hide');

                            // console.log("Request was successful");
                            if ($('#newfields').children().length > 0) {
                                // The div has child elements
                                console.log("Div has children.");
                                var responseObject = JSON.parse(response);

                                // Access the "id" property
                                tid = responseObject.id;

                                // Iterate through input elements with class 'data-input'
                                $('.multi_text').each(function() {
                                    var inputVal = $(this).val();
                                    var dataId = $(this).data('id');
                                    console.log('data-id ' + dataId);
                                    var formdata = new FormData();
                                    formdata.append("field_id", dataId);
                                    formdata.append("bu_id", document.getElementById(
                                        "business").value);
                                    formdata.append("Ticket_id", tid);
                                    formdata.append("field_data", inputVal);
                                    var settings = {
                                        "url": "api/bu_fields_data",
                                        "method": "POST",
                                        "timeout": 0,
                                        "processData": false,
                                        "mimeType": "multipart/form-data",
                                        "contentType": false,
                                        "data": formdata
                                    };

                                    $.ajax(settings).done(function(response) {
                                        console.log(response);
                                    }); // Get the value of the current input
                                });
                                document.getElementById('title')
                                    .value = "";
                                document.getElementById('hidden').value = "";
                            } else {
                                // The div has no child elements
                                console.log("Div has no children.");
                            }

                            // Do something with the collected data

                            getg_id();

                            Swal.fire(
                                'Success!',
                                'Ticket Created Successfully',
                                'success'
                            )

                        },
                        // Add more status code handlers as needed
                    },
                    success: function(data) {
                        // Additional success handling if needed

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr)
                        console.log(errorThrown)
                        console.log(textStatus)
                        Swal.fire(
                            'Server Error!',
                            'Ticket Not Created',
                            'error'
                        )

                        // console.log("Request failed with status code: " + xhr.status);
                    }
                });



            })
        } else {
            assign = document.getElementById("assigned").value;
            var form = new FormData();
            form.append("title", document.getElementById("title").value);
            form.append("description", document.getElementById("description").value);
            form.append("completed_date", document.getElementById("resolved").value);
            form.append("due_date", document.getElementById("due_date").value);
            form.append("company_id", {{ Auth::user()->company_id }});
            form.append("completed_by", document.getElementById("ticketresolved").value);
            form.append("business_unit_id", document.getElementById("business").value);
            form.append("customer_id", document.getElementById("customer").value);
            form.append("vendor_id", "0");
            form.append("vendor_type_id", "0");
            form.append("reported_by", document.getElementById("reported").value);
            form.append("assigned_to", assign);
            form.append("mode_of_complaint", document.getElementById("moc").value);
            form.append("sub_type_id", document.getElementById("subtype").value);
            form.append("priority_id", document.getElementById("priority").value);
            form.append("impact_id", document.getElementById("impact").value);
            form.append("status_id", document.getElementById("status1").value);
            form.append("store_contact", document.getElementById("store_info").value);
            form.append("created_by", {{ Auth::user()->id }});
            form.append("email_status", "0");
            var checkBox1 = document.getElementById("square-switch1");
            console.log("SoMI" + profileDropzone.files[0]);

            if (checkBox1.checked == true) {
                // alert('checked');
                form.append("assigned_type", "Individual");
            } else {
                // alert('unchecked')
                form.append("assigned_type", "Group");
            }

            if (profileDropzone.files.length > 0) {
                form.append("profile", profileDropzone.files[0]);
            } else {
                // alert("Samad---"+profileDropzone.files.length);
            }


            // console.log(form);

            var settings = {
                "url": "api/tickets",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };


            $.ajax({
                ...settings,
                statusCode: {
                    200: function(response) {
                        console.log(response);
                        // $('#myModal').modal('hide');

                        // console.log("Request was successful");
                        if ($('#newfields').children().length > 0) {
                            // The div has child elements
                            console.log("Div has children.");
                            var responseObject = JSON.parse(response);

                            // Access the "id" property
                            tid = responseObject.id;

                            // Iterate through input elements with class 'data-input'
                            $('.multi_text').each(function() {
                                var inputVal = $(this).val();
                                var dataId = $(this).data('id');
                                console.log('data-id ' + dataId);
                                var formdata = new FormData();
                                formdata.append("field_id", dataId);
                                formdata.append("bu_id", document.getElementById("business").value);
                                formdata.append("Ticket_id", tid);
                                formdata.append("field_data", inputVal);
                                var settings = {
                                    "url": "api/bu_fields_data",
                                    "method": "POST",
                                    "timeout": 0,
                                    "processData": false,
                                    "mimeType": "multipart/form-data",
                                    "contentType": false,
                                    "data": formdata
                                };

                                $.ajax(settings).done(function(response) {
                                    console.log(response);
                                }); // Get the value of the current input
                            });
                            document.getElementById('title')
                                .value = "";
                            document.getElementById('hidden').value = "";
                        } else {
                            // The div has no child elements
                            console.log("Div has no children.");
                        }

                        // Do something with the collected data

                        getg_id();

                        Swal.fire(
                            'Success!',
                            'Ticket Created Successfully',
                            'success'
                        )

                    },
                    // Add more status code handlers as needed
                },
                success: function(data) {
                    // Additional success handling if needed

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr)
                    console.log(errorThrown)
                    console.log(textStatus)
                    Swal.fire(
                        'Server Error!',
                        'Ticket Not Created',
                        'error'
                    )

                    // console.log("Request failed with status code: " + xhr.status);
                }
            });

        }


    }


    if ("{{ Auth::user()->company_id == 0 }}") {
        function getBu() {}

        function getg_id() {
            var settings = {
                "url": "api/dashboard/super_admin_tickets",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                table.clear().draw();
                $.each(response, function(index, data) {
                    table.row.add([
                        index + 1,
                        '<a href="#" onclick="copyToClipboard(' + data.id + ')">' + '000' + data
                        .company_id + '-000' + data.business_unit_id + '-' + data.id + '</a>',
                        data.title,
                        data.type_title,
                        data.created_at,
                        data.cus_id,
                        data.fname + ' ' + data.lname,
                        data.status_title,
                        '<div class="dropdown"><a class="text-muted dropdown-toggle font-size-18" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-horizontal"></i> </a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" data-id=' +
                        data.id + ' href="Tickets/' + data.id + '">View</a>' +
                        '<a class="dropdown-item notify" onclick="copyToClipboard(' + data.id +
                        ')">Share</a></div></div>',

                        // '<a type="button"id="edit" name="edit"  href="Tickets/' + data
                        // .id +
                        // '" target="_blank" class="btn btn-soft-success waves-effect waves-light"><i class="bx bxs-show font-size-16 align-middle"></i></a>',
                        '<button type="button"id="edit" name="edit"  onclick="editData(' +
                        data.id +
                        ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                        // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                        // data.id +
                        // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
                    ]).draw(false);
                });

            });

        }
    } else if ("{{ Auth::user()->company_id != 0 }}") {
        function getg_id() {
            var settings = {
                "url": "api/users/{{ Auth::user()->bu_id }}/{{ Auth::user()->designation_id }}",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                g_id = response[0]['group_id'];
                getgname(g_id);


            })

        }

        function getgname(id) {
            var settings = {
                "url": "api/users_bu_group/" + id,
                "method": "GET",
                "timeout": 0,
            };
            $.ajax(settings).done(function(response) {

                designationTitle = response[0]['title'];
                // console.log("api/dashboard/index/{{ Auth::user()->company_id }}/" + designationTitle +
                //     "/{{ Auth::user()->bu_id }}/{{ Auth::user()->id }}")
                var settings = {
                    "url": "api/tickets/company/{{ Auth::user()->company_id }}",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function(response) {
                    table.clear().draw();
                    $.each(response, function(index, data) {
                        table.row.add([
                            index + 1,
                            '<a href="#" onclick="copyToClipboard(' + data.id + ')">' +
                            '000' + data.company_id + '-000' + data.business_unit_id +
                            '-' + data.id + '</a>',
                            data.title,
                            data.type_title,
                            data.created_at,
                            data.cus_id,
                            data.fname + ' ' + data.lname,
                            data.status_title,
                            '<div class="dropdown"><a class="text-muted dropdown-toggle font-size-18" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-horizontal"></i> </a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" data-id=' +
                            data.id + ' href="Tickets/' + data.id + '">View</a>' +
                            '<a class="dropdown-item notify" onclick="copyToClipboard(' +
                            data.id + ')">Share</a></div></div>',

                            // '<a type="button"id="edit" name="edit"  href="Tickets/' + data
                            // .id +
                            // '" target="_blank" class="btn btn-soft-success waves-effect waves-light"><i class="bx bxs-show font-size-16 align-middle"></i></a>',
                            '<button type="button"id="edit" name="edit"  onclick="editData(' +
                            data.id +
                            ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                            // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                            // data.id +
                            // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
                        ]).draw(false);
                    });

                });

            })

        }


        function getBu() {
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
                            bu = new Choices("#business", {
                                removeItemButton: !0,
                            })
                            bu.clearChoices();
                            console.log("check" + response);
                            bu.setChoices(response,
                                'id',
                                'name',
                                false, );
                        }

                    });




                })



            })

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
                getgname(g_id);


            })

        }

        function getgname(id) {
            var settings = {
                "url": "api/users_bu_group/" + id,
                "method": "GET",
                "timeout": 0,
            };
            $.ajax(settings).done(function(response) {

                designationTitle = response[0]['title'];
                // console.log("api/dashboard/index/{{ Auth::user()->company_id }}/" + designationTitle +
                //     "/{{ Auth::user()->bu_id }}/{{ Auth::user()->id }}")
                var settings = {
                    "url": "api/dashboard/index/{{ Auth::user()->company_id }}/" + designationTitle +
                        "/{{ Auth::user()->bu_id }}/{{ Auth::user()->id }}",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function(response) {
                    table.clear().draw();
                    $.each(response, function(index, data) {
                        table.row.add([
                            index + 1,
                            '<a href="#" onclick="copyToClipboard(' + data.id + ')">' +
                            '000' + data.company_id + '-000' + data.business_unit_id +
                            '-' + data.id + '</a>',
                            data.title,
                            data.type_title,
                            data.created_at,
                            data.reported_by_name,
                            data.status_title,
                            '<div class="dropdown"><a class="text-muted dropdown-toggle font-size-18" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-horizontal"></i> </a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" data-id=' +
                            data.id + ' href="Tickets/' + data.id + '">View</a>' +
                            '<a class="dropdown-item notify" onclick="copyToClipboard(' +
                            data.id + ')">Share</a></div></div>',

                            // '<a type="button"id="edit" name="edit"  href="Tickets/' + data
                            // .id +
                            // '" target="_blank" class="btn btn-soft-success waves-effect waves-light"><i class="bx bxs-show font-size-16 align-middle"></i></a>',
                            '<button type="button"id="edit" name="edit"  onclick="editData(' +
                            data.id +
                            ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                            // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                            // data.id +
                            // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
                        ]).draw(false);
                    });

                });

            })

        }


        function getBu() {
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
                            bu = new Choices("#business", {
                                removeItemButton: !0,
                            })
                            bu.clearChoices();
                            console.log("check" + response);
                            bu.setChoices(response,
                                'id',
                                'name',
                                false, );
                        }

                    });




                })



            })

        }

    }

    // function fetchtable() {
    //     var settings = {
    //         "url": "api/tickets/company/{{ Auth::user()->company_id }}",
    //         "method": "GET",
    //         "timeout": 0,
    //     };

    //     $.ajax(settings).done(function(response) {
    //         console.log(response);
    //         table.clear().draw();
    //         $.each(response, function(index, data) {
    //             table.row.add([
    //                 index + 1,
    //                 data.title,
    //                 data.type_title,
    //                 data.created_at,
    //                 data.reported_by_name,
    //                 data.status_title,
    //                 '<a type="button"id="edit" name="edit"  href="Tickets/' + data.id +
    //                 '" target="_blank" class="btn btn-soft-success waves-effect waves-light"><i class="bx bxs-show font-size-16 align-middle"></i></a>',
    //                 '<button type="button"id="edit" name="edit"  onclick="editData(' +
    //                 data.id +
    //                 ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
    //                 '<button type="button" id="delete" name="delete" onclick="deleteData(' +
    //                 data.id +
    //                 ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
    //             ]).draw(false);
    //         });
    //     });
    // }



    function addtional_fields(id) {
        bu_wise(id)
        $('#newfields').empty()
        console.log("id" + id);
        var settings = {
            "url": "api/tickets/bu_fields/" + id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
            console.log("id" + id);
            // alert("id" + id)
            for (i = 0; i < response.length; i++) {
                console.log(response[i]['name']);
                var field_type;
                if (response[i]['type'] == "Text") {
                    field_type = "text";
                    var newrow =
                        '<div class="col-6">' +
                        ' <label for="formrow-inputState" class="form-label">' + response[i]['name'] +
                        '</label>' +
                        ' <input name="name2[]" class="form-control multi_text" id="' + i + '" data-id="' +
                        response[i]
                        ['id'] + '" type="' + field_type + '" placeholder="' + response[i]['name'] +
                        '"></div>';

                } else if (response[i]['type'] == "String") {
                    field_type = "text";
                    var newrow =
                        '<div class="col-6">' +
                        ' <label for="formrow-inputState" class="form-label">' + response[i]['name'] +
                        '</label>' +
                        ' <input name="name2[]" class="form-control multi_text" id="' + i + '" data-id="' +
                        response[i]
                        ['id'] + '" type="' + field_type + '" placeholder="' + response[i]['name'] +
                        '"></div>';

                } else if (response[i]['type'] == "Number") {
                    field_type = "number";
                    var newrow =
                        '<div class="col-6">' +
                        ' <label for="formrow-inputState" class="form-label">' + response[i]['name'] +
                        '</label>' +
                        ' <input name="name2[]" class="form-control multi_text" id="' + i + '" data-id="' +
                        response[i]
                        ['id'] + '"  type="' + field_type + '" placeholder="' + response[i]['name'] +
                        '"></div>';

                } else if (response[i]['type'] == "Boolean") {
                    field_type = "Select";
                    var newrow =
                        '<div class="col-6">' +
                        '<label for="formrow-inputState" class="form-label">' + response[i]['name'] +
                        '</label>' +
                        '<select name="name2[]" id="' + i + '" data-id="' + response[i]['id'] +
                        '" class="form-control multi_text" placeholder="' + response[i]['name'] + '">' +
                        '<option value="1">Yes</option>' +
                        '<option value="0">No</option>' +
                        '</select></div>'
                } else {
                    field_type = "text";
                    var newrow =
                        '<div class="col-6">' +
                        ' <label for="formrow-inputState" class="form-label">' + response[i]['name'] +
                        '</label>' +
                        ' <input name="name2[]" class="form-control multi_text" id="' + i + '" data-id="' +
                        response[i]
                        ['id'] + '"  type="' + field_type + '" placeholder="' + response[i]['name'] +
                        '"></div>';

                }
                //   document.getElementById('modalbody').innerHTML(newrow);
                $('#newfields').append(newrow)
            }
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
</script>

</html>
