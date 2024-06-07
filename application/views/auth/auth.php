<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>OneUI - Bootstrap 5 Admin Template &amp; UI Framework</title>

  <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
  <meta property="og:site_name" content="OneUI">
  <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
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

  <!-- jQuery (required for jQuery Validation plugin) -->
  <script src="<?= base_url() ?>assets/js/lib/jquery.min.js"></script>
  <!-- Page JS Plugins -->
  <script src="<?= base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

  <!-- Page JS Code -->
  <script src="<?= base_url() ?>assets/js/pages/op_auth_signin.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>

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
  <div id="page-container">
    <div id="content-login"></div>
  </div>
  <!-- END Page Container -->

  <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->

</body>

</html>
<script>
  const urlLogin = "<?= base_url() ?>auth/login";
  const urlRegister = "<?= base_url() ?>auth/register";
  const urlDashboard = "<?= base_url() ?>";

  const urlPostRegis = "<?= base_url() ?>api/auth/register";
  const urlPostLogin = "<?= base_url() ?>api/auth/login";
</script>

<script>
  $(function() {
    login()
  })

  function login() {
    $.ajax({
      url: urlLogin,
      type: "GET",
      success: function(res) {
        $('#content-login').html(res);
      }
    })
  }
</script>