<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Detail Stok Barang
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
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Stok Barang</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        Detail Stok
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="row items-push">
        <div class="col-sm-4 col-xxl-4">
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold" id="txt-stok-detail-in">0</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total IN</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xxl-4">
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold" id="txt-stok-detail-out">0</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Out</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xxl-4">
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold" id="txt-stok-detail-allstok">0</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Stok</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Detail Stok Barang</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">

            <form class="space-y-4">
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-kode-barang">Kode Barang</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-barcode"></i>
                            </span>
                            <input type="text" class="form-control form-control-alt" id="detail_kode_barang" name="detail_kode_barang" placeholder="Create or search" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-nama-barang">Nama Barang</label>
                    <div class="col-sm-8">
                        <p id="txt-detail-nama_barang">:</p>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-nama-barang">Category Barang</label>
                    <div class="col-sm-8">
                        <p id="txt-detail-category_barang">:</p>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-jumlah-barang">Jumlah Barang</label>
                    <div class="col-sm-8">
                        <p id="txt-detail-jumlah_barang">:</p>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-harga-persatuan">Harga Persatuan</label>
                    <div class="col-sm-8">
                        <p id="txt-detail-harga_persatuan">:</p>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-total">Total</label>
                    <div class="col-sm-8">
                        <p id="txt-detail-total">:</p>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-description">Description</label>
                    <div class="col-sm-8">
                        <p id="txt-detail-description">:</p>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-sm-8 ms-auto">
                        <button type="button" class="btn rounded-pill btn-alt-secondary me-1 mb-3" style="float: right;" onclick="generateBarcode()" id="btn-generate-barcode-stok">
                            <i class="fa fa-fw fa-barcode me-1"></i> Genearte Barcode
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">History Barang</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-history-stok">
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
    var kode_barang = '<?= $kode_barang ?>';
    var urlDetailHeaderStok = '<?= base_url() ?>api/stok/detail_header';
    var urlDetailCardStok = '<?= base_url() ?>api/stok/detail_card';
    var urlDatatableHistoryStok = '<?= base_url() ?>api/stok/datatable_history';
    var urlDetailGenerateBarcode = '<?= base_url() ?>api/stok/detail_generate_barcode';

    $(function() {
        var tableHistoryStok = '';
        cardDetailStok();

        getDetailStok();
    })

    function getDetailStok() {
        $.ajax({
            url: urlDetailHeaderStok,
            type: 'GET',
            dataType: 'JSON',
            data: {
                kode_barang: kode_barang
            },
            success: function(res) {
                var harga_satuan = res.data.harga_barang
                harga_satuan = 'Rp. ' + harga_satuan.toLocaleString('id-ID')
                var total = res.data.total
                total = 'Rp. ' + total.toLocaleString('id-ID')

                $('#detail_kode_barang').val(': ' + res.data.kode_barang);
                $('#txt-detail-nama_barang').text(': ' + res.data.nama_barang);
                $('#txt-detail-category_barang').text(': ' + res.data.nama_category);
                $('#txt-detail-jumlah_barang').text(': ' + res.data.jumlah_barang);
                $('#txt-detail-harga_persatuan').text(': ' + harga_satuan);
                $('#txt-detail-total').text(': ' + total);
                $('#txt-detail-description').text(': ' + res.data.deskripsi_barang);

            }
        })
    }

    function cardDetailStok() {

        $.ajax({
            url: urlDetailCardStok,
            type: 'GET',
            dataType: 'JSON',
            data: {
                kode_barang: kode_barang
            },
            success: function(res) {
                $('#txt-stok-detail-in').html(res.data.total_in);
                $('#txt-stok-detail-out').html(res.data.total_out);
                $('#txt-stok-detail-allstok').html(res.data.total_stok);
            }
        })
    }

    tableHistoryStok = $("#datatable-list-history-stok").DataTable({
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
            url: urlDatatableHistoryStok,
            type: "POST",
            data: {
                kode_barang: kode_barang
            }
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

    function generateBarcode() {
        var newUrl = urlDetailGenerateBarcode + '?kode_barang=' + kode_barang;
        window.open(newUrl, '_blank');
    }
</script>