<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Stok Barang
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
                        Stok Barang
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
        <div class="col-sm-3 col-xxl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold" id="txt-stok-in">0</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total IN</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>
        <div class="col-sm-3 col-xxl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold" id="txt-stok-out">0</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Out</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>
        <div class="col-sm-3 col-xxl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold" id="txt-stok-allstok">0</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Stok</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>
        <div class="col-sm-3 col-xxl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold" id="txt-stok-barang">0</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Barang</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="far fa-gem fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="content" id="card-history-barang-masuk">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Stok Barang</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter" id="datatable-list-stok">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">No</th>
                        <th>Kode Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Nama Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Jumlah Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Harga Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Total Harga</th>
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

<script>
    var urlCardStok = '<?= base_url() ?>api/stok/card';
    var urlDatatableStok = '<?= base_url() ?>api/stok/datatable';
    var urlVDetailStok = '<?= base_url() ?>main/stok/detail'
    $(function() {
        var tableStok = '';
        cardStok();
    })

    function cardStok() {
        $.ajax({
            url: urlCardStok,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {
                $('#txt-stok-in').html(res.data.total_in);
                $('#txt-stok-out').html(res.data.total_out);
                $('#txt-stok-allstok').html(res.data.total_stok);
                $('#txt-stok-barang').html(res.data.total_barang);
            }
        })
    }

    tableStok = $("#datatable-list-stok").DataTable({
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
            url: urlDatatableStok,
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
                "data": "jumlah_barang"
            },
            {
                "data": "harga_barang"
            },
            {
                "data": "total_harga"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button type="button" class="btn rounded-pill btn-secondary me-1 mb-3 btn-show" onclick="detailStok(${row.kode_barang})">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>`
                },
                "orderable": false,
                "searchable": false
            }
        ]
    })

    function detailStok(id) {
        $.ajax({
            url: urlVDetailStok + '/' + id,
            type: 'GET',
            success: function(res) {
                $('#contents').html(res)
            }
        })
    }
</script>