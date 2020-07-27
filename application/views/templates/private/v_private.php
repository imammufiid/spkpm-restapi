
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($Components['header']); ?>
<body class="hold-transition sidebar-mini <?php if($Nav=="TRANSAKSI") : echo "sidebar-collapse";endif; ?> layout-fixed layout-navbar-fixed layout-footer-fixed pace-material-*">
<div class="wrapper">
    <?php //$this->load->view($Components['navbar']); $this->load->view($Components['sidebar']); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php //$this->load->view($Components['navbar']); $this->load->view($Components['heading']); ?>
        <!-- Main content -->
        <section class="content" style="background-color: #FFF;">
            <div class="container-fluid">
                <?php $this->load->view($Components['content']);?>
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <!-- <footer class="main-footer">
        <strong>Copyright &copy; <?= date('Y') ?>.</strong> All rights reserved.
    
    </footer> -->
</div>
<!-- ./wrapper -->
</body>
</html>
