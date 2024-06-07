<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Jabatan
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
                        Jabatan
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
            <h3 class="block-title">Data Jabatan</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" id="btn-add-jabatan">
                    <i class="si si-plus"> Tambah Jabatan</i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-jabatan">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Jabatan</th>
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

<div class="modal fade" id="modal-block-fromright-jabatan" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="titleAddJabatan">Tambah Data Jabatan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-add-jabatan">
                    <div class="block-content fs-sm">
                        <!-- isi -->
                        <div class="mb-4">
                            <label class="form-label" for="add_jabatan">Jabatan <span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" id="add_id_jabatan" name="add_id_jabatan">
                            <input type="text" class="form-control" id="add_jabatan" name="add_jabatan" placeholder="Enter a jabatan..">
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="btn-save-jabatan">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var urlAddJabatan = "<?= base_url() ?>api/jabatan/add";
    var urlDatatableJabatan = "<?= base_url() ?>api/jabatan/datatable";
    var urlDeleteJabatan = "<?= base_url() ?>api/jabatan/delete";
    var swalInstance = '';
    $(function() {
        var tableJabatan = '';
        swalInstance = Swal.mixin({
            buttonsStyling: false,
            target: "#page-container",
            customClass: {
                confirmButton: "btn btn-primary m-1",
                cancelButton: "btn btn-danger m-1",
                input: "form-control"
            }
        });

        $('#btn-add-jabatan').click(function() {
            $('#titleAddJabatan').html('Tambah Data Jabatan')
            $('#add_id_jabatan').val('');
            $('#add_jabatan').val('');
            $('#modal-block-fromright-jabatan').modal('show');
        })

        $("#form-add-jabatan").validate({
            rules: {
                add_jabatan: {
                    required: true,
                }
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                post_add_jabatan($(form))
            }
        })
    })

    function post_add_jabatan($form) {
        $.ajax({
            url: urlAddJabatan,
            type: "POST",
            data: $form.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#btn-save-jabatan').html('loading...');
                $('#btn-save-jabatan').prop('disabled', true);
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
                $('#btn-save-jabatan').html('Save');
                $('#btn-save-jabatan').prop('disabled', false);
                $('#titleAddJabatan').html('Tambah Data Jabatan')
                $('#add_id_jabatan').val('');
                $('#add_jabatan').val('');
                tableJabatan.ajax.reload();
                $('#modal-block-fromright-jabatan').modal('hide');
            }

        })
    }

    tableJabatan = $("#datatable-list-jabatan").DataTable({
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
            url: urlDatatableJabatan,
            type: "POST",
        },
        columns: [{
                "data": "no"
            },
            {
                "data": "jabatan"
            },
            {
                "data": "created_at"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button type="button" class="btn rounded-pill btn-success me-1 mb-3 btn-edit-jabatan" data-id="${row.id}" data-jabatan="${row.jabatan}">
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

    $('#datatable-list-jabatan').on('click', '.btn-edit-jabatan', function() {
        $('#modal-block-fromright-jabatan').modal('show');
        var jabatan = $(this).data('jabatan');
        var id = $(this).data('id');
        $('#titleAddJabatan').html('Update Data Jabatan');
        $('#add_id_jabatan').val(id);
        $('#add_jabatan').val(jabatan);
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
                delete_jabatan(id);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                One.helpers('jq-notify', {
                    type: 'danger',
                    icon: 'fa fa-times me-1',
                    message: `Your data is safe :)`
                });
            }
        });
    }

    function delete_jabatan(id) {
        $.ajax({
            url: urlDeleteJabatan,
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
                tableJabatan.ajax.reload();
            }
        })
    }
</script>/