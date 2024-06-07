<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    User
                </h1>
                <!-- <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Tables transformed with dynamic features.
        </h2> -->
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        User
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">User Aprroval</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-user-approval">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Fullname</th>
                        <th class="d-none d-sm-table-cell">Email</th>
                        <th class="d-none d-sm-table-cell">Jabatan</th>
                        <th class="d-none d-sm-table-cell">Role</th>
                        <th class="d-none d-sm-table-cell">Is Active</th>
                        <th class="d-none d-sm-table-cell">Tgl Create</th>
                        <th class="d-none d-sm-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">User Data</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-user">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Fullname</th>
                        <th class="d-none d-sm-table-cell">Email</th>
                        <th class="d-none d-sm-table-cell">Jabatan</th>
                        <th class="d-none d-sm-table-cell">Role</th>
                        <th class="d-none d-sm-table-cell">Is Active</th>
                        <th class="d-none d-sm-table-cell">Tgl Create</th>
                        <th class="d-none d-sm-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->

<div class="modal fade" id="modal-block-fromright-user" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="titleAddRole">Detail User</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-add-role">
                    <div class="block-content fs-sm">
                        <!-- isi -->
                        <div class="mb-4">
                            <label class="form-label" for="detail_fullname">Fullname</label>
                            <input type="text" class="form-control" id="detail_fullname" name="detail_fullname" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="detail_email">Email</label>
                            <input type="text" class="form-control" id="detail_email" name="detail_email" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="detail_jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="detail_role">Role</label>
                            <input type="text" class="form-control" id="detail_role" name="detail_role" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="detail_is_active">Is Active</label>
                            <div id="detail_is_active"></div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var urlDatatableUserApproval = "<?= base_url() ?>api/user/datatableApproval";
    var urlDatatableUser = "<?= base_url() ?>api/user/datatable";
    var urlApproveUser = "<?= base_url() ?>api/user/approve";
    var urlDeclineUser = "<?= base_url() ?>api/user/decline";
    var urlDetailUser = "<?= base_url() ?>api/user/detail";
    var urlDeleteUser = "<?= base_url() ?>api/user/delete";
    var swalInstance = '';
    $(function() {
        var tableUser = '';
        var tableUserApproval = '';
        swalInstance = Swal.mixin({
            buttonsStyling: false,
            target: "#page-container",
            customClass: {
                confirmButton: "btn btn-primary m-1",
                cancelButton: "btn btn-danger m-1",
                input: "form-control"
            }
        });
    })

    tableUserApproval = $("#datatable-list-user-approval").DataTable({
        pagingType: "simple_numbers",
        layout: {
            topStart: {
                pageLength: {
                    menu: [5, 10, 15, 20]
                }
            }
        },
        pageLength: 10,
        autoWidth: !1,
        ajax: {
            url: urlDatatableUserApproval,
            type: "POST",
        },
        columns: [{
                "data": "no"
            },
            {
                "data": "fullname"
            },
            {
                "data": "email"
            },
            {
                "data": "jabatan"
            },
            {
                "data": "role_name"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `<span class="badge bg-warning">Waiting</span>`
                },
                "orderable": false,
                "searchable": false
            },
            {
                "data": "created_at"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button type="button" class="btn rounded-pill btn-alt-success me-1 mb-3" onclick="approve('${row.id}')">
                                <i class="fa fa-fw fa-check me-1"></i> Approve
                            </button>
                            <button type="button" class="btn rounded-pill btn-danger me-1 mb-3" onclick="decline('${row.id}')">
                                <i class="fa fa-fw fa-times me-1"></i> Decline
                            </button>`
                },
                "orderable": false,
                "searchable": false
            }
        ]
    })

    tableUser = $("#datatable-list-user").DataTable({
        pagingType: "simple_numbers",
        layout: {
            topStart: {
                pageLength: {
                    menu: [5, 10, 15, 20]
                }
            }
        },
        pageLength: 10,
        autoWidth: !1,
        ajax: {
            url: urlDatatableUser,
            type: "POST",
        },
        columns: [{
                "data": "no"
            },
            {
                "data": "fullname"
            },
            {
                "data": "email"
            },
            {
                "data": "jabatan"
            },
            {
                "data": "role_name"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    if (row.is_active == '1') {
                        return `<span class="badge bg-success">Active</span>`
                    } else {
                        return `<span class="badge bg-danger">Decline</span>`
                    }
                },
                "orderable": false,
                "searchable": false
            },
            {
                "data": "created_at"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" href="javascript:void(0)" onclick="detailUser('${row.id}')" data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                <i class="fa fa-fw fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled" href="javascript:void(0)" data-bs-toggle="tooltip" onclick="deleteUser('${row.id}')" aria-label="Delete" data-bs-original-title="Delete">
                                <i class="fa fa-fw fa-times text-danger"></i>
                            </a>`
                },
                "orderable": false,
                "searchable": false
            }
        ]
    })

    function approve(id) {
        $.ajax({
            url: urlApproveUser,
            type: "POST",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(res) {
                if (res.status == 'Success') {
                    One.helpers('jq-notify', {
                        type: 'success',
                        icon: 'fa fa-check me-1',
                        message: `${res.messages}`
                    });
                } else {
                    One.helpers('jq-notify', {
                        type: 'danger',
                        icon: 'fa fa-times me-1',
                        message: `${res.messages}`
                    });
                }
                tableUser.ajax.reload();
                tableUserApproval.ajax.reload();
            }

        })
    }

    function decline(id) {
        $.ajax({
            url: urlDeclineUser,
            type: "POST",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(res) {
                if (res.status == 'Success') {
                    One.helpers('jq-notify', {
                        type: 'success',
                        icon: 'fa fa-check me-1',
                        message: `${res.messages}`
                    });
                } else {
                    One.helpers('jq-notify', {
                        type: 'danger',
                        icon: 'fa fa-times me-1',
                        message: `${res.messages}`
                    });
                }
                tableUser.ajax.reload();
                tableUserApproval.ajax.reload();
            }

        })
    }

    function detailUser(id) {
        $.ajax({
            url: urlDetailUser,
            type: "GET",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(res) {
                var data = res.data;
                $('#detail_fullname').val(data.fullname);
                $('#detail_email').val(data.email);
                $('#detail_jabatan').val(data.jabatan);
                $('#detail_role').val(data.role_name);
                if (data.is_active == '1') {
                    var isActive = `<span class="badge bg-success">Active</span>`
                } else {
                    var isActive = `<span class="badge bg-danger">Decline</span>`
                }
                $('#detail_is_active').html(isActive);
                $('#modal-block-fromright-user').modal('show');
                console.log(res);
            }
        })
    }

    function deleteUser(id) {
        swalInstance.fire({
            title: "Are you sure?",
            text: "You delete this data!",
            icon: "warning",
            showCancelButton: true,
            customClass: {
                confirmButton: "btn btn-danger m-1",
                cancelButton: "btn btn-secondary m-1"
            },
            confirmButtonText: "Yes, delete it!",
            html: false,
            preConfirm: () => new Promise((resolve) => {
                setTimeout(() => {
                    resolve();
                }, 50);
            })
        }).then((result) => {
            if (result.value) {
                delete_user(id);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                One.helpers('jq-notify', {
                    type: 'danger',
                    icon: 'fa fa-times me-1',
                    message: `Your data is safe :)`
                });
            }
        });
    }

    function delete_user(id) {
        $.ajax({
            url: urlDeleteUser,
            type: "POST",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(res) {
                if (res.status == 'Success') {
                    One.helpers('jq-notify', {
                        type: 'success',
                        icon: 'fa fa-check me-1',
                        message: `${res.messages}`
                    });
                    tableUser.ajax.reload();
                } else {
                    One.helpers('jq-notify', {
                        type: 'danger',
                        icon: 'fa fa-times me-1',
                        message: `${res.messages}`
                    });
                }
            }
        })
    }
</script>