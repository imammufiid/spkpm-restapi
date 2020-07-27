<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $Title ?> | <?= $this->session->userdata('AppInfo') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/pace-progress/themes/blue/pace-theme-material.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/pace-progress/pace.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $(".modal").on('hidden.bs.modal', function () {
                $(".modal").find("input, textarea, select").val("").change();
                $(".modal").find("input, textarea, select").removeAttr("readonly");
            });
        });
    </script>
</head>