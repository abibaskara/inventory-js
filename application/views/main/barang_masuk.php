<!-- Hero -->
<div class="bg-body-light" id="card-input-barang-masuk">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Barang Masuk
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
                        Barang Masuk
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
            <h3 class="block-title">Input Barang Masuk</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">

            <form class="space-y-4" id="form-input-barang-masuk">
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-kode-barang">Kode Barang <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-barcode"></i>
                            </span>
                            <input type="text" class="form-control" id="add_kode_barang" name="add_kode_barang" placeholder="Create or search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-nama-barang">Nama Barang <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="add_nama_barang" name="add_nama_barang">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-nama-barang">Category Barang <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <select class="js-select2 form-select" id="add_category_barang" name="add_category_barang" style="width: 100%;" data-placeholder="Choose one..">
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-jumlah-barang">Jumlah Barang <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control" id="add_jumlah_barang" name="add_jumlah_barang">
                    </div>
                </div>
                <!-- <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-harga-persatuan">Harga Persatuan <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control js-mask-rupiah" id="add_harga_persatuan" name="add_harga_persatuan" placeholder="Masukkan nominal">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-total">Total <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control js-mask-rupiah form-control-alt" id="add_total" name="add_total" readonly>
                    </div>
                </div> -->
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-description">Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="add_description_barang" name="add_description_barang" style="height: 250px;"></textarea>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-sm-8 ms-auto">
                        <button type="submit" class="btn btn-primary" style="float:right" id="btn-add-barang_masuk">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->


<!-- Page Content -->
<div class="content" id="card-history-barang-masuk">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">History Barang</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-history">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">No</th>
                        <th>Kode Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Nama Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Qty</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal Action</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Type</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->

<script>
    One.helpersOnLoad(['jq-select2']);
    var urlGetCategory = '<?= base_url() ?>api/category/datatable';
    var urlAddBarangMasuk = '<?= base_url() ?>api/barang_masuk/add';
    var urlSearchBarangMasuk = '<?= base_url() ?>api/barang_masuk/search';
    var urlDatatableHistory = '<?= base_url() ?>api/barang_masuk/datatable_history';

    $(function() {
        var tableHistory = '';
        $('#card-history-barang-masuk').hide();
        var targetOffset = $('#card-input-barang-masuk').offset().top;
        $('html, body').animate({
            scrollTop: targetOffset
        }, 1000, function() {
            $('#card-input-barang-masuk').focus();
        });

        getCategory();

        $('.js-mask-rupiah').on('keyup', function() {
            let value = $(this).val().replace(/[^,\d]/g, ''); // Hapus semua karakter non-digit
            if (value) {
                value = 'Rp. ' + parseInt(value, 10).toLocaleString('id-ID');
            }
            $(this).val(value);
        });

        // $('#add_harga_persatuan, #add_jumlah_barang').keyup(function() {
        //     let value = $('#add_harga_persatuan').val().replace(/[^,\d]/g, '');
        //     let jml_barang = $('#add_jumlah_barang').val().replace(/[^,\d]/g, '');

        //     if (value && jml_barang) {
        //         let total = parseInt(value, 10) * parseInt(jml_barang, 10);
        //         let formattedTotal = 'Rp. ' + total.toLocaleString('id-ID');
        //         $('#add_total').val(formattedTotal);
        //     } else {
        //         $('#add_total').val('');
        //     }
        // })

        $("#form-input-barang-masuk").validate({
            rules: {
                add_kode_barang: {
                    required: true,
                },
                add_nama_barang: {
                    required: true,
                },
                add_category_barang: {
                    required: true,
                },
                add_jumlah_barang: {
                    required: true,
                    min: 0,
                    number: true
                },
                // add_harga_persatuan: {
                //     required: true,
                // },
                // add_total: {
                //     required: true,
                // },
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                post_add_barang_masuk($(form))
            }
        })

        $('#add_kode_barang').keyup(function() {
            var kode = $(this).val();
            $.ajax({
                url: urlSearchBarangMasuk,
                type: 'GET',
                dataType: 'JSON',
                data: {
                    kode: kode
                },
                success: function(res) {
                    if (res.data != null) {
                        // var harga_satuan = res.data.harga_barang
                        // harga_satuan = 'Rp. ' + harga_satuan.toLocaleString('id-ID')
                        $('#add_nama_barang').val(res.data.nama_barang);
                        $('#add_category_barang').val(res.data.id_category).trigger('change');
                        $('#add_description_barang').val(res.data.deskripsi_barang);
                        // $('#add_harga_persatuan').val(harga_satuan);
                        $('#card-history-barang-masuk').show();
                        var targetOffset = $('#card-history-barang-masuk').offset().top;
                        $('html, body').animate({
                            scrollTop: targetOffset
                        }, 1000, function() {
                            $('#card-history-barang-masuk').focus();
                        });
                    } else {
                        $('#add_nama_barang').val('');
                        $('#add_category_barang').val('').trigger('change');
                        $('#add_description_barang').val('');
                        // $('#add_harga_persatuan').val('');
                        $('#card-history-barang-masuk').hide();

                    }
                }
            })
        })
    })

    function getCategory() {
        $.ajax({
            url: urlGetCategory,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {
                let option = '<option value="">--Pilih--</option>';
                $.each(res.data, function(key, value) {
                    option += `<option value="${value.id}">${value.nama_category}</option>`
                })
                $('#add_category_barang').html(option);
            }
        })
    }

    function post_add_barang_masuk($form) {
        $.ajax({
            url: urlAddBarangMasuk,
            type: "POST",
            data: $form.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#btn-add-barang_masuk').html('loading...');
                $('#btn-add-barang_masuk').prop('disabled', true);
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
                $('#btn-add-barang_masuk').html('Tambah');
                $('#btn-add-barang_masuk').prop('disabled', false);
                $('#add_kode_barang').val('');
                $('#add_nama_barang').val('');
                $('#add_category_barang').val('').trigger('change');
                $('#add_jumlah_barang').val('');
                // $('#add_harga_persatuan').val('');
                // $('#add_total').val('');
                $('#add_description_barang').val('');
                tableHistory.ajax.reload();
                $('#card-history-barang-masuk').show();

                var targetOffset = $('#card-history-barang-masuk').offset().top;
                $('html, body').animate({
                    scrollTop: targetOffset
                }, 1000, function() {
                    $('#card-history-barang-masuk').focus();
                });
            }

        })
    }

    tableHistory = $("#datatable-list-history").DataTable({
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
            url: urlDatatableHistory,
            type: "POST",
        },
        columns: [{
                "data": "no"
            },
            {
                "data": "kode_barang"
            },
            {
                "data": "nama_barang"
            },
            {
                "data": "qty"
            },
            {
                "data": "tgl_action"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    if (row.type == 'IN')
                        return `<strong style="color:white">${row.type}</strong style="color:white">`
                    else
                        return `<strong style="color:white">${row.type}</strong style="color:white">`
                },
                // "orderable": false,
                // "searchable": false
            }
        ],
        createdRow: function(row, data, dataIndex) {
            if (data.type == 'IN') {
                $(row).find('td:eq(5)').css('background-color', 'green');
            } else {
                $(row).find('td:eq(5)').css('background-color', 'red');
            }
        }
    })
</script>