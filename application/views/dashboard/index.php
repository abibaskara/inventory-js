<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>Sistem Inventory</title>

  <meta name="description" content="Sistem Inventory">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="Sistem Inventory">
  <meta property="og:site_name" content="Sistem Inventory">
  <meta property="og:description" content="Sistem Inventory">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/logo/logo-light.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/logo/logo-light.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/logo/logo-light.png">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- OneUI framework -->
  <link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/css/oneui.min.css">

  <script src="<?= base_url() ?>assets/js/oneui.app.min.js"></script>
  <script src="<?= base_url() ?>assets/js/lib/jquery.min.js"></script>

  <script src="<?= base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/jquery-validation/additional-methods.js"></script>
  <script src="<?= base_url() ?>assets/js/pages/op_auth_signin.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- DataTable -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/simplemde/simplemde.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/dropzone/min/dropzone.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/flatpickr/flatpickr.min.css">

  <!-- Page JS Plugins -->
  <script src="<?= base_url() ?>assets/js/plugins/datatables/dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

  <!-- Page JS Code -->
  <script src="<?= base_url() ?>assets/js/pages/be_tables_datatables.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/simplemde/simplemde.min.js"></script>


  <script src="<?= base_url() ?>assets/js/plugins/flatpickr/flatpickr.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/select2/js/select2.full.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/dropzone/min/dropzone.min.js"></script>

  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url() ?>assets/css/themes/amethyst.min.css"> -->
  <!-- END Stylesheets -->
</head>

<body>
  <!-- Page Container -->
  <!--
      Available classes for #page-container:

      GENERIC

        'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                    - Theme helper buttons [data-toggle="theme"],
                                                    - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                    - ..and/or One.layout('dark_mode_[on/off/toggle]')

      SIDEBAR & SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-dark'                              Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

      HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header

      HEADER STYLE

        ''                                          Light themed Header
        'page-header-dark'                          Dark themed Header

      MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

      DARK MODE

        'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
  <div id="page-container" class="sidebar-o sidebar-light enable-page-overlay side-scroll page-header-fixed main-content-narrow">

    <!-- Sidebar -->
    <!--
          Sidebar Mini Mode - Display Helper classes

          Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
          Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
              If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

          Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
          Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
          Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
      -->
    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="index.html" style="width: 65%;">
          <span class="smini-visible">
            <i class="fa fa-circle-notch text-primary"></i>
          </span>
          <img src="<?= base_url() ?>assets/logo/logo-light.png" alt="" style="width:25%">
          <span class="smini-hide fs-5 tracking-wider">Inventory</span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
          <!-- Dark Mode -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">
            <i class="far fa-moon"></i>
          </button>
          <!-- END Dark Mode -->

          <!-- Options -->
          <div class="dropdown d-inline-block ms-1">
            <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-brush"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
              <!-- Color Themes -->
              <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
              <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="default" href="#">
                <span>Default</span>
                <i class="fa fa-circle text-default"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url() ?>assets/css/themes/amethyst.min.css" href="#">
                <span>Amethyst</span>
                <i class="fa fa-circle text-amethyst"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url() ?>assets/css/themes/city.min.css" href="#">
                <span>City</span>
                <i class="fa fa-circle text-city"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url() ?>assets/css/themes/flat.min.css" href="#">
                <span>Flat</span>
                <i class="fa fa-circle text-flat"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url() ?>assets/css/themes/modern.min.css" href="#">
                <span>Modern</span>
                <i class="fa fa-circle text-modern"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url() ?>assets/css/themes/smooth.min.css" href="#">
                <span>Smooth</span>
                <i class="fa fa-circle text-smooth"></i>
              </a>
              <!-- END Color Themes -->

              <div class="dropdown-divider"></div>

              <!-- Sidebar Styles -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">
                <span>Sidebar Light</span>
              </a>
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">
                <span>Sidebar Dark</span>
              </a>
              <!-- END Sidebar Styles -->

              <div class="dropdown-divider"></div>

              <!-- Header Styles -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">
                <span>Header Light</span>
              </a>
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">
                <span>Header Dark</span>
              </a>
              <!-- END Header Styles -->
            </div>
          </div>
          <!-- END Options -->

          <!-- Close Sidebar, Visible only on mobile screens -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
            <i class="fa fa-fw fa-times"></i>
          </a>
          <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)">
                <i class="nav-main-link-icon si si-speedometer"></i>
                <span class="nav-main-link-name">Dashboard</span>
              </a>
            </li>
            <?php if($this->session->userdata('role_name') == 'admin') { ?>
              <li class="nav-main-heading">Master</li>
              <li class="nav-main-item">
                <a class="nav-main-link active" onclick="v_supplier()" href="javascript:void(0)">
                  <i class="nav-main-link-icon si si-notebook"></i>
                  <span class="nav-main-link-name">Supplier</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link active" onclick="v_category()" href="javascript:void(0)">
                  <i class="nav-main-link-icon si si-layers"></i>
                  <span class="nav-main-link-name">Category</span>
                </a>
              </li>
            <?php } ?>
            
            <?php if($this->session->userdata('role_name') == 'admin' || $this->session->userdata('role_name') == 'produksi') { ?>
            <li class="nav-main-heading">Main</li>
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_barang_masuk()">
                <i class="nav-main-link-icon si si-action-redo"></i>
                <span class="nav-main-link-name">Barang Masuk</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_stok_barang()">
                <i class="nav-main-link-icon si si-equalizer"></i>
                <span class="nav-main-link-name">Stok Barang</span>
              </a>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('role_name') == 'admin' || $this->session->userdata('role_name') == 'user') { ?>
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_form_ppic()">
                <i class="nav-main-link-icon si si-cursor"></i>
                <span class="nav-main-link-name">Form PPIC</span>
              </a>
            </li>
            <?php } ?>
            
            <?php if($this->session->userdata('role_name') == 'admin' || $this->session->userdata('role_name') == 'user' || $this->session->userdata('role_name') == 'produksi') { ?>
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_ppic()">
                <i class="nav-main-link-icon si si-notebook"></i>
                <span class="nav-main-link-name">PPIC</span>
              </a>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('role_name') == 'admin') { ?>
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_produk()">
                <i class="nav-main-link-icon si si-drawer"></i>
                <span class="nav-main-link-name">Produk</span>
              </a>
            </li>
            <?php } ?>
            <!-- <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_purchase_order()">
                <i class="nav-main-link-icon si si-basket"></i>
                <span class="nav-main-link-name">Purchase Order</span>
              </a>
            </li> -->
            <?php if($this->session->userdata('role_name') == 'admin') { ?>
            <li class="nav-main-heading">Authenticate</li>
            <li class="nav-main-item">
              <a class="nav-main-link active" onclick="v_jabatan()" href="javascript:void(0)">
                <i class="nav-main-link-icon si si-puzzle"></i>
                <span class="nav-main-link-name">Jabatan</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link active" onclick="v_role()" href="javascript:void(0)">
                <i class="nav-main-link-icon si si-settings"></i>
                <span class="nav-main-link-name">Role</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link active" onclick="v_user()" href="javascript:void(0)">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Users</span>
              </a>
            </li>
            <?php } ?>
            
            <?php if($this->session->userdata('role_name') == 'admin' || $this->session->userdata('role_name') == 'manager') { ?>
            <li class="nav-main-heading">Report</li>
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_report_barang_masuk()">
                <i class="nav-main-link-icon si si-login"></i>
                <span class="nav-main-link-name">Report Barang Masuk</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link active" href="javascript:void(0)" onclick="v_barang_keluar()">
                <i class="nav-main-link-icon si si-logout"></i>
                <span class="nav-main-link-name">Report Barang Keluar</span>
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Open Search Section (visible on smaller screens) -->

        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle" src="<?= base_url() ?>assets/media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 21px;">
              <span class="d-none d-sm-inline-block ms-2"><?= $this->session->userdata('fullname') ?></span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?= base_url() ?>assets/media/avatars/avatar10.jpg" alt="">
                <p class="mt-2 mb-0 fw-medium"><?= $this->session->userdata('fullname') ?></p>
                <p class="mb-0 text-muted fs-sm fw-medium"><?= $this->session->userdata('jabatan') ?></p>
              </div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                  <span class="fs-sm fw-medium">Profile</span>
                  <span class="badge rounded-pill bg-primary ms-2">1</span>
                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                  <span class="fs-sm fw-medium">Lock Account</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="logout()" id="btn-logout" href="javascript:void(0)">
                  <span class="fs-sm fw-medium">Log Out</span>
                </a>
              </div>
            </div>
          </div>
          <!-- END User Dropdown -->

        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <form class="w-100" action="be_pages_generic_search.html" method="POST">
            <div class="input-group">
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times-circle"></i>
              </button>
              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      <div id="contents"></div>
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
      <div class="content py-3">
        <div class="row fs-sm">
          <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
            <!-- Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://pixelcave.com" target="_blank">pixelcave</a> -->
          </div>
          <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
            <a class="fw-semibold" href="javascript:void(0)" target="_blank">Sistem Inventory</a> &copy; <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->

  <!-- Page JS Plugins -->
  <script src="<?= base_url() ?>assets/js/plugins/chart.js/chart.umd.js"></script>

  <!-- Page JS Code -->
  <script src="<?= base_url() ?>assets/js/pages/be_pages_dashboard.min.js"></script>
</body>

</html>

<script>
  const urlLogout = "<?= base_url() ?>api/auth/logout";
  const urlLogin = "<?= base_url() ?>auth";

  //## MENU ##//

  // master
  const urlVSupplier = "<?= base_url() ?>master/supplier";
  const urlVCategory = "<?= base_url() ?>master/category";

  // main
  const urlVBarangMasuk = "<?= base_url() ?>main/barang_masuk";
  const urlVStok = "<?= base_url() ?>main/stok";
  const urlVFPPIC = "<?= base_url() ?>main/fppic";
  const urlVPPIC = "<?= base_url() ?>main/ppic";
  const urlVProduk = "<?= base_url() ?>main/produk";

  // authenticate
  const urlVJabatan = "<?= base_url() ?>authenticate/jabatan";
  const urlVRole = "<?= base_url() ?>authenticate/role";
  const urlVUser = "<?= base_url() ?>authenticate/user";
</script>

<script>
  function logout() {
    $.ajax({
      url: urlLogout,
      type: "POST",
      dataType: "JSON",
      beforeSend: function() {
        $('#btn-logout').html('loading...');
        $('#btn-logout').prop('disabled', true);
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
        setTimeout(function() {
          window.location.href = urlLogin;
          $('#btn-logout').html('<span class="fs-sm fw-medium">Log Out</span>');
          $('#btn-logout').prop('disabled', false);
        }, 2000)
      }
    })
  }

  //## MENU ##//

  //master
  function v_supplier() {
    $.ajax({
      url: urlVSupplier,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  function v_category() {
    $.ajax({
      url: urlVCategory,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  //main
  function v_barang_masuk() {
    $.ajax({
      url: urlVBarangMasuk,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  function v_stok_barang() {
    $.ajax({
      url: urlVStok,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  function v_form_ppic() {
    $.ajax({
      url: urlVFPPIC,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  function v_ppic() {
    $.ajax({
      url: urlVPPIC,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  function v_produk() {
    $.ajax({
      url: urlVProduk,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  //authenticate
  function v_jabatan() {
    $.ajax({
      url: urlVJabatan,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  function v_role() {
    $.ajax({
      url: urlVRole,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }

  function v_user() {
    $.ajax({
      url: urlVUser,
      type: "GET",
      success: function(res) {
        $('#contents').html(res);
      }
    })
  }
</script>