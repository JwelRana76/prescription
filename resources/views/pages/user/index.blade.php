<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

<!-- Buttons CSS -->
<link rel="stylesheet"
href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css">

<!-- FixedHeader CSS -->
<link rel="stylesheet"
href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap4.min.css">

<style>
    .dataTables_wrapper .dataTables_filter {
    text-align: right;
}

.dataTables_wrapper .dt-buttons {
    text-align: center;
}

.dataTables_wrapper .dataTables_length {
    text-align: left;
}

.dt-buttons .btn {
    margin: 2px;
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header">
                            <h3>User List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped"
       id="myTable" width="100%">

    <thead>
        <tr>
            <th>
                <input type="checkbox" id="selectAll">
            </th>
            <th>SL</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>

</table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="/jquery/jquery.min.js"></script>

<script src="/jquery/bootstrap.bundle.min.js"></script>

<script src="/jquery/jquery.easing.min.js"></script>

<script src="/jquery/sb-admin-2.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
    <script>
$('#myTable').DataTable({

    processing: true,
    serverSide: true,

    ajax: "{{ route('user.data') }}",

    pageLength: 10,

    lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"]
    ],

    dom:
        "<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row mt-3'<'col-md-5'i><'col-md-7'p>>",

    buttons: [
        {
            extend: 'copy',
            className: 'btn btn-sm btn-secondary'
        },
        {
            extend: 'excel',
            className: 'btn btn-sm btn-success'
        },
        {
            extend: 'pdf',
            className: 'btn btn-sm btn-danger'
        },
        {
            extend: 'print',
            className: 'btn btn-sm btn-primary',
            title: '',
            messageTop: '<h2 class="text-center">User List</h2>',
            customize: function (win) {
                $(win.document.body).css('font-size', '12px');

                $(win.document.body).find('h2')
                    .css({
                        'text-align': 'center',
                        'font-size': '22px',
                        'font-weight': 'bold',
                        'margin-bottom': '20px'
                    });

                $(win.document.body).find('table')
                    .addClass('table-bordered')
                    .css('font-size', '12px');
            }
        }
    ],

    columns: [
        {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'name', name: 'name'},
        {data: 'username', name: 'username'},
        {data: 'email', name: 'email'},
        {data: 'created_at', name: 'created_at'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]

});
</script>
    @stack('js')

</body>

</html>