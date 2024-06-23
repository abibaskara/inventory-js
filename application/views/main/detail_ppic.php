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
                            <input type="hidden" class="form-control form-control-alt" id="detail_id_ppic" name="detail_id_ppic">
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
                                <td>
                                    <button type="button" class="btn btn-success" id="btn-qty-proses"><i class="fa fa-plus"></i></button>
                                </td>
                                <td>
                                    <div class="input-group" id="input-qty-proses" style="display: none;">
                                        <input type="hidden" class="form-control" id="add_qty_order" name="add_qty_order">
                                        <input type="hidden" class="form-control" id="before_qty_prosess" name="before_qty_prosess">
                                        <input type="number" class="form-control" id="add_qty_prosess" name="add_qty_prosess">
                                    </div>
                                </td>
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
                                <td>
                                    <button type="button" class="btn btn-success" id="btn-qty-reject"><i class="fa fa-plus"></i></button>
                                </td>
                                <td>
                                    <div class="input-group" id="input-qty-reject" style="display: none;">
                                        <input type="number" class="form-control" id="add_qty_reject" name="add_qty_reject">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-kode-barang">Kode Barang / Nama Barang <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-barcode"></i>
                            </span>
                            <!-- <input type="text" class="form-control" id="add_kode_barang" name="add_kode_barang" placeholder="Kode Barang / Nama Barang"> -->
                            <select class="js-select2 form-control" id="add_kode_barang" style="width: 60% !important;" data-placeholder="Choose one..">
                            </select>
                        </div>
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
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Penambahan</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Qty</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Stok</th>
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Action</th>
                    </tr>
                </thead>
                <tbody id="body-detail-ppic">
                    
                </tbody>
            </table>
                <div class=" row">
                    <div class="col-sm-8 ms-auto">
                        <button type="submit" class="btn btn-primary" style="float:right; margin-left:10px" id="btn-update-ppic">Update</button>
                        <button type="button" class="btn btn-danger" style="float:right" id="btn-close-ppic">Close Request</button>
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
    var urlGetBarang = '<?= base_url() ?>api/ppic/get_barang';
    var urlGetData = "<?= base_url() ?>api/ppic/detail";
    var urlUpdateData = "<?= base_url() ?>api/ppic/udpates";
    var urlCloseData = "<?= base_url() ?>api/ppic/close";
    var urlDeleteRow = "<?= base_url() ?>api/ppic/deleteRow";

    One.helpersOnLoad(['jq-select2']);

    $(function() {
        getData();
        $('#btn-qty-proses').click(function() {
            $('#input-qty-proses').show();
        })
        $('#btn-qty-reject').click(function() {
            $('#input-qty-reject').show();
        })

        $('#btn-close-ppic').click(function () {
            prosesClose();
        })

        getBarang();
        
        $('#add_kode_barang').change(function() {
            var selectedOption = $(this).find('option:selected');
            var val = selectedOption.val();
            var qty = selectedOption.data('qty');
            var id_barang = selectedOption.data('id_barang');
            if(val != '') {
                var text = selectedOption.text(); // Untuk mendapatkan teks
                var parts = text.split('|');
                var nama_barang = parts[1].trim();
                var html = `
                        <tr id="row_${val}">
                            <td>${val}</td>
                            <td>${nama_barang}</td>
                            <td>
                                <input type="hidden" name="add_id_barang[]" value="${id_barang}">
                                <input type="hidden" name="add_stock_barang[]" value="${qty}">
                                <input type="hidden" name="add_qty_before[]" value="0">
                                <input type="hidden" name="add_id_detail_ppic[]" value="0">
                                <input type="number" class="form-control add_qty_item" data-id="${val}" max="${qty}" name="add_qty_item[]" >
                            </td>
                            <td>0</td>
                            <td>${qty}</td>
                            <td>
                                <button type="button" class="btn btn-sm rounded-pill btn-secondary me-1 mb-3 btn-show" onclick="deleteRowNew('${val}')">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </td>
                        </tr>`
                $('#body-detail-ppic').append(html);
                $(this).val('').trigger('change')
            }
        })
        
        $("#form-input-form-ppic").validate({
            submitHandler: function(form, e) {
                e.preventDefault();
                prosesUpdate($(form));
            }
        })
    });
    
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
    
    function getBarang() {
        $.ajax({
            url: urlGetBarang,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {
                console.log(res.data)
                let option = '<option value="">--Pilih--</option>';
                $.each(res.data, function(key, value) {
                    option += `<option value="${value.kode_barang}" data-qty="${value.jumlah_barang}" data-id_barang="${value.id_barang}">${value.kode_barang} | ${value.nama_barang}</option>`
                })
                $('#add_kode_barang').html(option);
            }
        })
    }

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
                $('#detail_id_ppic').val(res.data.id_ppic);
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
                $('#body-detail-ppic').html('');
                $.each(res.data.detail, function(k,v) {
                    var html = `
                            <tr id="row_${v.id_detail_ppic}">
                                <td>${v.kode_barang}</td>
                                <td>${v.nama_barang}</td>
                                <td>
                                    <input type="hidden" name="add_id_barang[]" value="${v.id_barang}">
                                    <input type="hidden" name="add_stock_barang[]" value="${v.jumlah_barang}">
                                    <input type="hidden" name="add_id_detail_ppic[]" value="${v.id_detail_ppic}">
                                    <input type="hidden" name="add_qty_before[]" value="${v.qty}">
                                    <input type="number" class="form-control add_qty_item" data-id="${res.data.kode_order}" max="${v.jumlah_barang}" name="add_qty_item[]" >
                                </td>
                                <td>${v.qty}</td>
                                <td>${v.jumlah_barang}</td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-secondary me-1 mb-3 btn-show" onclick="deleteRow(this)" data-qty="${v.qty}" data-jml="${v.jumlah_barang}" data-id_barang="${v.id_barang}" data-kode_barang="${v.kode_barang}" data-id="${v.id_detail_ppic}">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>
                                </td>
                            </tr>`
                    $('#body-detail-ppic').append(html);
                })
            }
        })
    }
    
    function deleteRow(element) {
        var qty = $(element).data('qty');
        var id = $(element).data('id');
        var jml = $(element).data('jml');
        var id_barang = $(element).data('id_barang');
        var kode_barang = $(element).data('kode_barang');
        $('#row_' + id).remove();
        $.ajax({
            url: urlDeleteRow,
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                qty: qty,
                jml: jml,
                id_barang: id_barang,
                kode_barang: kode_barang
            },
            success: function(res) {
                getBarang();
            }
        })
    }
    function deleteRowNew(val) {
        $('#row_' + val).remove();
    }

    function prosesUpdate($form)
    {
        $.ajax({
            url: urlUpdateData,
            data: $form.serialize(),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $('#btn-update-ppic').html('loading...');
                $('#btn-update-ppic').prop('disabled', true);
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
                $('#btn-update-ppic').html('Update');
                $('#btn-update-ppic').prop('disabled', false);
                getData();
            }
        })
    }

    function prosesClose()
    {
        $.ajax({
            url: urlCloseData,
            data: {
                kode_order: id
            },
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $('#btn-close-ppic').html('loading...');
                $('#btn-close-ppic').prop('disabled', true);
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
                $('#btn-close-ppic').html('Close Request');
                $('#btn-close-ppic').prop('disabled', false);
                v_ppic();
            }
        })
    }
</script>