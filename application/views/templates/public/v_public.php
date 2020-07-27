<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <?php $this->load->view($Components['header']); ?>
    <body class="hold-transition login-page pace-material-*">
        <?php $this->load->view($Components['content']); ?>
    </body>
</html>