<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Supplier
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
                        Supplier
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
            <h3 class="block-title">Data Supplier</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" id="btn-add-supplier">
                    <i class="si si-plus"> Tambah Supplier</i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-supplier">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">No</th>
                        <th>Kode</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Nama PT</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Alamat</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">PIC</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Telp</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Tgl Create</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->


<div class="modal fade" id="modal-block-fromright-supplier" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="titleAddSupplier">Tambah Data Supplier</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-add-supplier">
                    <div class="block-content fs-sm">
                        <!-- isi -->
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-4">
                                    <label class="form-label" for="add_kode_supplier">Kode Supplier</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-alt">
                                            <i class="fa fa-barcode"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-alt" id="add_kode_supplier" name="add_kode_supplier" readonly>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="add_nama_supplier">Nama Supplier <span class="text-danger">*</span></label>
                                    <input type="hidden" class="form-control" id="add_id_supplier" name="add_id_supplier">
                                    <input type="text" class="form-control" id="add_nama_supplier" name="add_nama_supplier" placeholder="Enter a nama supplier..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="add_nama_pic">Nama PIC <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="add_nama_pic" name="add_nama_pic" placeholder="Enter a nama pic..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="add_nama_pic">Telp PIC <span class="text-danger">*</span></label>
                                    <input type="text" class="js-masked-phone-supplier form-control" id="add_telp_pic" name="add_telp_pic" placeholder="(999) 999-999-999">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label class="form-label" for="add_role">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="add_alamat_supplier" name="add_alamat_supplier" style="height: 250px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="btn-save-supplier">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var urlAddSupplier = "<?= base_url() ?>api/supplier/add";
    var urlDatatableSupplier = "<?= base_url() ?>api/supplier/datatable";
    var urlDeleteSupplier = "<?= base_url() ?>api/supplier/delete";
    var urlGetSupplier = "<?= base_url() ?>api/supplier/get";
    var swalInstance = '';
    $(function() {
        var tableSupplier = '';
        swalInstance = Swal.mixin({
            buttonsStyling: false,
            target: "#page-container",
            customClass: {
                confirmButton: "btn btn-primary m-1",
                cancelButton: "btn btn-danger m-1",
                input: "form-control"
            }
        });
        One.helpersOnLoad(['jq-masked-inputs']);
        $('.js-masked-phone-supplier').mask('(999) 999-999-999');

        $('#btn-add-supplier').click(function() {
            updateDateTime();
            $('#titleAddSupplier').html('Tambah Data Supplier')
            $('#add_id_supplier').val('');
            $('#add_nama_supplier').val('');
            $('#add_nama_pic').val('');
            $('#add_telp_pic').val('');
            $('#add_alamat_supplier').val('');

            $('#modal-block-fromright-supplier').modal('show');
        });

        $.validator.addMethod("simplemdeRequired", function(value, element) {
            console.log(value, element)
            return $('#add_alamat_supplier').value().trim().length > 0;
        }, "This field is required.");

        $("#form-add-supplier").validate({
            rules: {
                add_nama_supplier: {
                    required: true,
                },
                add_nama_pic: {
                    required: true,
                },
                add_telp_pic: {
                    required: true,
                },
                add_alamat_supplier: {
                    required: true,
                },
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                post_add_supplier($(form))
            }
        })
    })

    function post_add_supplier($form) {
        $.ajax({
            url: urlAddSupplier,
            type: "POST",
            data: $form.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#btn-save-supplier').html('loading...');
                $('#btn-save-supplier').prop('disabled', true);
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
                $('#btn-save-supplier').html('Save');
                $('#btn-save-supplier').prop('disabled', false);
                if (res.status == 'Success') {
                    tableSupplier.ajax.reload();
                    $('#titleAddSupplier').html('Tambah Data Supplier');
                    $('#add_id_supplier').val('');
                    $('#add_nama_supplier').val('');
                    $('#add_nama_pic').val('');
                    $('#add_telp_pic').val('');
                    $('#add_alamat_supplier').val('');
                }

                $('#modal-block-fromright-supplier').modal('hide');
            }

        })
    }

    tableSupplier = $("#datatable-list-supplier").DataTable({
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
            url: urlDatatableSupplier,
            type: "POST",
        },
        columns: [{
                "data": "no"
            },
            {
                "data": "kode_supplier"
            },
            {
                "data": "nama_supplier"
            },
            {
                "data": "alamat_supplier"
            },
            {
                "data": "nama_pic"
            },
            {
                "data": "telp_pic"
            },
            {
                "data": "created_at"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button type="button" class="btn rounded-pill btn-success me-1 mb-3" onclick="editRow('${row.id}')">
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

    function editRow(id) {
        $.ajax({
            url: urlGetSupplier,
            data: {
                id: id
            },
            dataType: "JSON",
            type: "GET",
            success: function(res) {
                var data = res.data;
                $('#titleAddSupplier').html('Edit Data Supplier');
                $('#add_id_supplier').val(data.id_supplier);
                $('#add_kode_supplier').val(data.kode_supplier);
                $('#add_nama_supplier').val(data.nama_supplier);
                $('#add_nama_pic').val(data.nama_pic);
                $('#add_telp_pic').val(data.telp_pic);
                $('#add_alamat_supplier').val(data.alamat_supplier);
                $('#modal-block-fromright-supplier').modal('show');
            }
        })
    }

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
                delete_supplier(id);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                One.helpers('jq-notify', {
                    type: 'danger',
                    icon: 'fa fa-times me-1',
                    message: `Your data is safe :)`
                });
            }
        });
    }

    function delete_supplier(id) {
        $.ajax({
            url: urlDeleteSupplier,
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
                tableSupplier.ajax.reload();
            }
        })
    }

    function updateDateTime() {
        var now = new Date();
        var year = now.getFullYear().toString().slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2); // Menambahkan leading zero
        var date = ("0" + now.getDate()).slice(-2); // Menambahkan leading zero
        var hours = ("0" + now.getHours()).slice(-2); // Menambahkan leading zero
        var minutes = ("0" + now.getMinutes()).slice(-2); // Menambahkan leading zero
        var seconds = ("0" + now.getSeconds()).slice(-2); // Menambahkan leading zero

        var formattedDateTime = 'S-' + year + month + date + hours + minutes + seconds;
        $('#add_kode_supplier').val(formattedDateTime);
    }
</script>