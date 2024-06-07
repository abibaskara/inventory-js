<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Role
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
                        Role
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
            <h3 class="block-title">Data Role</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" id="btn-add-role">
                    <i class="si si-plus"> Tambah Role</i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-role">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Role</th>
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

<div class="modal fade" id="modal-block-fromright-role" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="titleAddRole">Tambah Data Role</h3>
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
                            <label class="form-label" for="add_role">Role Name <span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" id="add_id_role" name="add_id_role">
                            <input type="text" class="form-control" id="add_role" name="add_role" placeholder="Enter a jabatan..">
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="btn-save-role">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var urlAddRole = "<?= base_url() ?>api/role/add";
    var urlDatatableRole = "<?= base_url() ?>api/role/datatable";
    var urlDeleteRole = "<?= base_url() ?>api/role/delete";
    var swalInstance = '';
    $(function() {
        var tableRole = '';
        swalInstance = Swal.mixin({
            buttonsStyling: false,
            target: "#page-container",
            customClass: {
                confirmButton: "btn btn-primary m-1",
                cancelButton: "btn btn-danger m-1",
                input: "form-control"
            }
        });

        $('#btn-add-role').click(function() {
            $('#titleAddRole').html('Tambah Data Role')
            $('#add_id_role').val('');
            $('#add_role').val('');
            $('#modal-block-fromright-role').modal('show');
        })

        $("#form-add-role").validate({
            rules: {
                add_role: {
                    required: true,
                }
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                post_add_role($(form))
            }
        })
    })

    function post_add_role($form) {
        $.ajax({
            url: urlAddRole,
            type: "POST",
            data: $form.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#btn-save-role').html('loading...');
                $('#btn-save-role').prop('disabled', true);
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
                $('#btn-save-role').html('Save');
                $('#btn-save-role').prop('disabled', false);
                $('#titleAddRole').html('Tambah Data Role')
                $('#add_id_role').val('');
                $('#add_role').val('');
                tableRole.ajax.reload();
                $('#modal-block-fromright-role').modal('hide');
            }

        })
    }

    tableRole = $("#datatable-list-role").DataTable({
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
            url: urlDatatableRole,
            type: "POST",
        },
        columns: [{
                "data": "no"
            },
            {
                "data": "role_name"
            },
            {
                "data": "created_at"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button type="button" class="btn rounded-pill btn-success me-1 mb-3 btn-edit-role" data-id="${row.id}" data-role="${row.role_name}">
                                <i class="fa fa-fw fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn rounded-pill btn-danger me-1 mb-3" onclick="deleteRow('${row.id}')">
                                <i class="fa fa-fw fa-trash-alt"></i>
                            </button>`
                },
                "orderable": false,
                "searchable": false
            }
        ]
    })

    $('#datatable-list-role').on('click', '.btn-edit-role', function() {
        $('#modal-block-fromright-role').modal('show');
        var role = $(this).data('role');
        var id = $(this).data('id');
        $('#titleAddRole').html('Update Data Role');
        $('#add_id_role').val(id);
        $('#add_role').val(role);
    });

    function deleteRow(id) {
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
                delete_role(id);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                One.helpers('jq-notify', {
                    type: 'danger',
                    icon: 'fa fa-times me-1',
                    message: `Your data is safe :)`
                });
            }
        });
    }

    function delete_role(id) {
        $.ajax({
            url: urlDeleteRole,
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
                tableRole.ajax.reload();
            }
        })
    }
</script>