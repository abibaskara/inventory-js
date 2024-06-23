<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Form PPIC
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
                        Form PPIC
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
            <h3 class="block-title">Input Form PPIC</h3>
        </div>
        <div class="block-content block-content-full overflow-x-auto">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Nama</strong>
                        </div>
                        <div class="col-sm-6">
                            : <?= $this->session->userdata('fullname') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Tanggal</strong>
                        </div>
                        <div class="col-sm-6">
                            : <?= date('d/m/Y') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <form class="space-y-4" id="form-input-form-ppic">
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-kode-barang">Kode Order <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-barcode"></i>
                            </span>
                            <input type="text" class="form-control form-control-alt" id="add_kode_order" name="add_kode_order" placeholder="Create " readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-add_produk">Produk <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" class="form-control" id="add_produk" name="add_produk" placeholder="Create Produk">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label" for="example-hf-quantity_order">Quantity Order <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="number" min="1" class="form-control" id="quantity_order" name="quantity_order" placeholder="Create Quantity Order">
                        </div>
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
                <table class="table table-bordered table-striped table-vcenter" id="datatable-add-ppic">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 50%;">Nama Barang</th>
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Qty</th>
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Stock</th>
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Action</th>
                    </tr>
                </thead>
                <tbody id="body-add-ppic">
                    
                </tbody>
            </table>
                <div class=" row">
                    <div class="col-sm-8 ms-auto">
                        <button type="submit" class="btn btn-primary" style="float:right" id="btn-add-fppic">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->


<script>
    
    One.helpersOnLoad(['jq-select2']);
    var urlGetBarang = '<?= base_url() ?>api/fppic/get_barang';
    var urlPostPPIC = '<?= base_url() ?>api/fppic/create_ppic';
    $(function() {
        updateDateTime()
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
                                <input type="number" class="form-control add_qty_order" data-id="${val}" max="${qty}" name="add_qty_order[]" >
                            </td>
                            <td>${qty}</td>
                            <td>
                                <button type="button" class="btn btn-sm rounded-pill btn-secondary me-1 mb-3 btn-show" onclick="deleteRow('${val}')">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </td>
                        </tr>`
                $('#body-add-ppic').append(html);
                $(this).val('').trigger('change')
            }
        })
        
        $("#form-input-form-ppic").validate({
            rules: {
                add_produk: {
                    required: true,
                },
                quantity_order: {
                    required: true,
                },
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                post_add_fppic($(form))
            }
        })
    })

    function post_add_fppic($form)
    {
        $.ajax({
            url: urlPostPPIC,
            type: "POST",
            data: $form.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#btn-add-fppic').html('loading...');
                $('#btn-add-fppic').prop('disabled', true);
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
                $('#btn-add-fppic').html('Save');
                $('#btn-add-fppic').prop('disabled', false);
                v_form_ppic();
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

        var formattedDateTime = 'P-' + year + month + date + hours + minutes + seconds;
        $('#add_kode_order').val(formattedDateTime);
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

    function deleteRow(val) {
        $('#row_' + val).remove();
    }


</script>