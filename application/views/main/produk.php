<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    PPIC Monitoring
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
                        PPIC Monitoring
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->


<!-- Page Content -->
<div class="content" id="card-produk">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Stok Barang</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-produk">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%;">No</th>
                        <th style="width: 30%;">Kode Produk</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Nama Produk</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Qty Permintaan</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Qty Actual</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Qty Reject</th>
                        <th class="d-none d-sm-table-cell">Created</th>
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

<script>
    var urlDatatablePPIC = '<?= base_url() ?>api/produk/datatable';
    var urlVDetailProduk = '<?= base_url() ?>main/produk/detail';
    var urlGenerateStok = '<?= base_url() ?>api/stok/detail_generate_barcode';

    $(function () {
        var tableProduk = '';
    })

    tableProduk = $("#datatable-list-produk").DataTable({
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
            url: urlDatatablePPIC,
            type: "POST", 
        },
        columns: [{
                "data": "no"
            },
            {
                "data": "kode_order"
            },
            {
                "data": "produk"
            },
            {
                "data": "qty_order"
            },
            {
                "data": "qty_actual"
            },
            {
                "data": "qty_reject"
            },
            {
                "data": "tgl_start"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button type="button" class="btn btn-sm rounded-pill btn-secondary me-1 mb-3 btn-show" onclick="detailProduk('${row.kode_order}')">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm rounded-pill btn-primary me-1 mb-3 btn-show" onclick="barcodeGenerate('${row.kode_order}')">
                                <i class="fa fa-fw fa-barcode"></i>
                            </button>`
                },
                "orderable": false,
                "searchable": false
            }
        ]
    })

    function detailProduk(id) {
        $.ajax({
            url: urlVDetailProduk + '/' + id,
            type: 'GET',
            success: function(res) {
                $('#contents').html(res)
            }
        })
    }
    
    function barcodeGenerate(kode_order) {
        var newUrl = urlGenerateStok + '?kode_barang=' + kode_order;
        window.open(newUrl, '_blank');
    }
</script>