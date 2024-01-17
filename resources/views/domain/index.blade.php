<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jul 2023 18:04:41 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Domain | Service Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> --}}
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
            <div class="page-content">
                <div id="liveAlertPlaceholder"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-1">

                                            <h4 class="card-title mb-0 pt-3">Domain</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-soft-primary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#myModal">
                                                <i class="bx bxs-add-to-queue font-size-16 align-middle me-2"></i> Add
                                                New
                                            </button>
                                            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add New</button> --}}
                                            {{-- <button type="button" class="btn btn-primary waves-effect waves-light">Add New</button> --}}
                                        </div>
                                    </div>

                                </div><!-- end card header -->
                                <div class="card-body">
                                    <table id="myTable">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Title</th>
                                                <th>Created At</th>
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


    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="labelc">Create</h5>
                    <br>
                    <h5>Domains</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Enter Domain Title"
                                        id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3 row">
                                <div class="col-md-10">
                                    <input class="form-control" type="hidden" id="hidden" name="hidden" value="0">
                                    <!-- <input type="hidden" id="postId" name="postId" value="34657" /> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-6 col-form-label">Additional
                                    Fields</label>
                                <div class="col-md-6 p-1">

                                    <button type="button" id="addfield"
                                        class="btn btn-outline-warning waves-effect waves-light"><i
                                            class="fas fa-plus-square"></i> Add More</button>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3 row">
                                {{-- <label for="example-text-input" class="col-md-2 col-form-label">Domain Members</label> --}}
                                <div class="col-md-10">
                                    <div id="fields">

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button" onclick="submit()" name="button"
                        class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @include('partials.script')
</body>
<script>
$(document).ready(function() {
    // $('#textbox1').val(this.checked);

    $("#addfield").click(function() {
        var newRowAdd =
            '<div id="row" class="row"><div class="input-group m-3">' +
            '<div class="col-3"><div class="input-group-prepend">' +
            '<button type="button" id="DeleteRow" class="btn btn-outline-danger waves-effect waves-light m-1">Delete</button>' +
            '<i class="bi bi-trash"></i></button></div> </div>' +
            '<div class="col-4"><div class="input-group-prepend m-1"><input class="form-control" type="text" placeholder="Additional Field"></div> </div><div class="col-1"></div>' +
            '<div class="col-4"><select class="form-control " data-trigger name="choices-single-default" id="choices-single-default" placeholder=""><option>String</option><option>Number</option><option>Text</option></select> </div> </div>' +
            '';

        $('#fields').append(newRowAdd);
        // alert("The paragraph was clicked.");
    });
    $("body").on("click", "#DeleteRow", function() {
        $(this).parents("#row").remove();
    })
});

var table;
$(document).ready(function() {

    table = $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'colvis',
            {
                extend: 'csv',
                // Add the custom class to the CSV button
            },
            {
                extend: 'excel', // Add the custom class to the Excel button
            },
            {
                extend: 'pdf', // Add the custom class to the Excel button
            },
            {
                extend: 'print', // Add the custom class to the Excel button
            }
            // Add more buttons and classes as needed
        ]
    });
    fetchtable();

});

function fetchtable() {
    var settings = {
        "url": "api/domains",
        "method": "GET",
        "timeout": 0,
    };
    $.ajax(settings).done(function(response) {
        console.log(response);
        table.clear().draw();
        $.each(response, function(index, data) {
            table.row.add([
                index + 1,
                data.title,
                data.created_at ,
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

function submit() {
    var update_id = document.getElementById("hidden").value;
    console.log(update_id);
    if (update_id == 0) {
        var form = new FormData();
        form.append("title", document.getElementById('example-text-input').value);
        form.append("status", "1");

        var settings = {
            "url": "api/domains",
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
                    $('#myModal').modal('hide');
                    console.log("Request was successful");
                    document.getElementById('example-text-input').value = "";
                    document.getElementById('hidden').value = "";
                    fetchtable();
                    Swal.fire(
                        'Success!',
                        'Type Created Successfully',
                        'success'
                    )
                },
                // Add more status code handlers as needed
            },
            success: function(data) {
                // $('#myModal').reset();
                // Additional success handling if needed
            },
            error: function(xhr, textStatus, errorThrown) {
                Swal.fire(
                    'Server Error!',
                    'Type Not Created',
                    'error'
                )

                // console.log("Request failed with status code: " + xhr.status);
            }
        });
    } else {
        var settings = {
            "url": "api/domains/" + update_id + "",
            "method": "PUT",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "title": document.getElementById('example-text-input').value,
                "status": 1
            }),
        };
        $.ajax({
            ...settings,
            statusCode: {
                200: function(response) {
                    console.log(response);
                    $('#myModal').modal('hide');
                    document.getElementById('example-text-input').value = "";
                    document.getElementById('hidden').value = "";
                    // console.log("Request was successful");
                    fetchtable();
                    Swal.fire(
                        'Success!',
                        'Type updated Successfully',
                        'success'
                    )
                },
                // Add more status code handlers as needed
            },
            success: function(data) {
                // Additional success handling if needed
            },
            error: function(xhr, textStatus, errorThrown) {
                Swal.fire(
                    'Server Error!',
                    'Type Not updated',
                    'error'
                )

                // console.log("Request failed with status code: " + xhr.status);
            }
        });

    }
}

function editData(id) {
    // alert("waqar")
    var settings = {
        "url": "api/domains/" + id + "",
        "method": "GET",
        "timeout": 0,
    };
    $.ajax({
            ...settings,
            statusCode: {
                200: function(response) {
                    console.log(response[0]['title']);
                    document.getElementById('example-text-input').value = response[0]['title'];
                    document.getElementById('hidden').value = response[0]['id'];
                    // $("#parent").val(response[0]['parent']);
                    $('#myModal').modal('show');
                    document.getElementById("labelc").innerHTML = 'Update'


                },
                // Add more status code handlers as needed
            },
            success: function(data) {
                // Additional success handling if needed
            },
            error: function(xhr, textStatus, errorThrown) {
                Swal.fire(
                    'Server Error!',
                    '',
                    'error'
                )

                // console.log("Request failed with status code: " + xhr.status);
            }
        });
}
function deleteData(id) {

// alert(id);
var settings = {
    "url": "api/domains/" + id + "",
    "method": "DELETE",
    "timeout": 0,
};

$.ajax({
    ...settings,
    statusCode: {
        200: function(response) {
            console.log(response);
            // $('#myModal').modal('hide');
            // console.log("Request was successful");
            fetchtable();
            Swal.fire(
                'Success!',
                'Status Deleted Successfully',
                'success'
            )
        },
        // Add more status code handlers as needed
    },
    success: function(data) {
        // Additional success handling if needed
    },
    error: function(xhr, textStatus, errorThrown) {
        Swal.fire(
            'Server Error!',
            'Type Not Deleted',
            'error'
        )

        // console.log("Request failed with status code: " + xhr.status);
    }
});
};
</script>

</html>
