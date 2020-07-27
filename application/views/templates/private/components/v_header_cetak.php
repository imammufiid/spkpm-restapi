<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $Title ?> | <?= $this->session->userdata('AppInfo') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/pace-progress/themes/blue/pace-theme-material.css') ?>">
    <style>
        body{ font-family: "Draft Condensed" }
    </style>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $(".modal").on('hidden.bs.modal', function () {
                $(".modal").find("input, textarea, select").val("");
            });
        });
    </script>
</head>