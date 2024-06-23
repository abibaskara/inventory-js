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

<div class="content">
    <!-- Overview -->
    <div class="row items-push">
        <div class="col-sm-4 col-xxl-4">
            <!-- Pending Orders -->
            <a href="javascript:void(0)" onclick="cardClick('Release')">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="txt-release">0</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Release</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-gem fs-3 text-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END Pending Orders -->
        </div>
        <div class="col-sm-4 col-xxl-4">
            <!-- Pending Orders -->
            <a href="javascript:void(0)" onclick="cardClick('In Process')">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="txt-process">0</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total In Process</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-gem fs-3 text-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END Pending Orders -->
        </div>
        <div class="col-sm-4 col-xxl-4">
            <!-- Pending Orders -->
            <a href="javascript:void(0)" onclick="cardClick('Close')">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="txt-close">0</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Close</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-gem fs-3 text-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END Pending Orders -->
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="content" id="card-ppic">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Stok Barang</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-ppic">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%;">No</th>
                        <th style="width: 30%;">Kode Order</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Nama Produk</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Qty Permintaan</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Qty Actual</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Qty Reject</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Achive</th>
                        <th class="d-none d-sm-table-cell">Status</th>
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
    var urlDatatablePPIC = '<?= base_url() ?>api/ppic/datatable';
    var urlUpdateProsesPPIC = '<?= base_url() ?>api/ppic/update_proses';
    var urlVDetailPPIC = '<?= base_url() ?>main/ppic/detail';
    var urlCardPPIC = '<?= base_url() ?>api/ppic/card';
    var urlGenerateStok = '<?= base_url() ?>api/stok/detail_generate_barcode';
    var statusPPIC = '';
    
    $(function() {
        var tablePPIC = '';
        getCardPPIC();
    });
    function cardClick(statusCard) {
        statusPPIC = statusCard;
        console.log(statusPPIC)
        tablePPIC.ajax.reload();
    }


    tablePPIC = $("#datatable-list-ppic").DataTable({
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
            data: function (d) {
            d.status = statusPPIC;
        }
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
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <div class="progress mb-1" style="height: 5px;" role="progressbar" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: ${row.achive}%;"></div>
                            </div>
                            <p class="fs-xs fw-semibold mb-0">${row.achive}%</p>
                            `
                },
                "orderable": false,
                "searchable": false
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    if(row.status == 'Release') {
                        return `<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-info">Release</span>`;
                    }  else if(row.status == 'In Process') {
                        return `<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">In Process</span>`;
                    } else {
                        return `<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-info">Close</span>`;
                    }
                },
                "orderable": false,
                "searchable": false
            },
            {
                "data": "tgl_start"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    if(row.status != 'Close') {
                        return `
                                <button type="button" class="btn btn-sm rounded-pill btn-secondary me-1 mb-3 btn-show" onclick="detailPPIC('${row.kode_order}')">
                                    <i class="fa fa-fw fa-file-pen"></i>
                                </button>
                                <button type="button" class="btn btn-sm rounded-pill btn-primary me-1 mb-3 btn-show" onclick="barcodeGenerate('${row.kode_order}')">
                                    <i class="fa fa-fw fa-barcode"></i>
                                </button>`
                    } else {
                        return `<button type="button" class="btn btn-sm rounded-pill btn-primary me-1 mb-3 btn-show" onclick="barcodeGenerate('${row.kode_order}')">
                                    <i class="fa fa-fw fa-barcode"></i>
                                </button>`
                    }
                },
                "orderable": false,
                "searchable": false
            }
        ]
    })
    
    function detailPPIC(id) {
        $.ajax({
            url: urlUpdateProsesPPIC,
            data: {
                kode_order: id
            },
            type: 'POST',
            dataType: 'JSON',
            success: function(res) {
                $.ajax({
                    url: urlVDetailPPIC + '/' + id,
                    type: 'GET',
                    success: function(res) {
                        $('#contents').html(res)
                    }
                })
            }
        })

    }
    
    function barcodeGenerate(kode_order) {
        var newUrl = urlGenerateStok + '?kode_barang=' + kode_order;
        window.open(newUrl, '_blank');
    }

    function getCardPPIC() {
        $.ajax({
            url: urlCardPPIC,
            dataType: 'JSON',
            type: 'GET',
            success: function(res) {
                console.log(res)
                $('#txt-release').text(res.data.total_release);
                $('#txt-process').text(res.data.total_process);
                $('#txt-close').text(res.data.total_close);
            }
        })
    }
</script>