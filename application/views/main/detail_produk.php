<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    PPIC Detail
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
                        <a class="link-fx" href="javascript:void(0)">PPIC Monitoring</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        PPIC Detail
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
            <h3 class="block-title">PPIC Detail</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Nama</strong>
                        </div>
                        <div class="col-sm-6" id="detail_nama">
                            : 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Tanggal</strong>
                        </div>
                        <div class="col-sm-6" id="detail_tanggal">
                            : 
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <form class="space-y-4" id="form-input-form-ppic">
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-kode-barang">Kode Order</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-barcode"></i>
                            </span>
                            <input type="text" class="form-control form-control-alt" id="detail_kode_order" name="detail_kode_order" placeholder="Create " readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-add_produk">Produk</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <p id="detail_produk">test</p>
                            <!-- <input type="text" class="form-control" id="add_produk" name="add_produk" placeholder="Create Produk"> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-quantity_order">Quantity Order</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <p id="detail_qty_order">0</p>
                            <!-- <input type="number" min="1" class="form-control" id="quantity_order" name="quantity_order" placeholder="Create Quantity Order"> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-kode-barang">Quantity Process</label>
                    <div class="col-sm-8">
                        <table width:100%>
                            <tr>
                                <td style="width: 40px;" id="detail_qty_proses">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-kode-barang">Quantity Reject</label>
                    <div class="col-sm-8">
                        <table width:100%>
                            <tr>
                                <td style="width: 40px;" id="detail_qty_reject">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-quantity_order">Remark</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <textarea name="add_remark" id="add_remark" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mb-2">
                    <strong>Detail Item Barang</strong>    
                </div>
                <table class="table table-bordered table-striped table-vcenter" id="datatable-add-ppic">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 50%;">Nama Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Qty</th>
                    </tr>
                </thead>
                <tbody id="body-detail-produk">
                    
                </tbody>
            </table>
                <div class=" row">
                    <div class="col-sm-8 ms-auto">
                        <button type="button" class="btn btn-primary" style="float:right" onclick="backProduk()" id="btn-back-produk">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->

<script>
    var id = "<?= $kode_order ?>";
    var urlGetData = "<?= base_url() ?>api/produk/detail";
    $(function() {
        getData();
    });

    function getData()
    {
        $.ajax({
            url: urlGetData,
            data: {
                kode_order: id
            },
            type: 'GET',
            dataType: 'JSON',
            success: function(res)
            {
                $('#detail_nama').text(': ' + res.data.fullname);
                $('#detail_tanggal').text(': ' + res.data.tgl_now);
                $('#detail_kode_order').val(res.data.kode_order);
                $('#detail_produk').text(res.data.produk);
                $('#detail_qty_order').text(res.data.qty_order);
                var qty_actual = 0;
                if(res.data.qty_actual != null)
                    qty_actual = res.data.qty_actual

                var qty_reject = 0;
                if(res.data.qty_reject != null)
                    qty_reject = res.data.qty_reject

                $('#add_qty_order').val(res.data.qty_order);
                $('#detail_qty_proses').text(qty_actual);
                $('#before_qty_prosess').text(qty_actual);
                $('#detail_qty_reject').text(qty_reject);
                $('#add_remark').val(res.data.remark);
                $('#body-detail-produk').html('');
                $.each(res.data.detail, function(k,v) {
                    var html = `
                            <tr>
                                <td>${v.kode_barang}</td>
                                <td>${v.nama_barang}</td>
                                <td>${v.qty}</td>
                            </tr>`
                    $('#body-detail-produk').append(html);
                })
            }
        })
    }

    function backProduk()
    {
        v_produk();
    }

</script>