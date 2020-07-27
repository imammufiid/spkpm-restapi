<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('portal') ?>"><b><?= $Title ?></b> LOGIN</a><br />
        <small><?= $Info->info_name ?></small>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?= form_open("#", array('id' => 'Frm')) ?>
                <div class="input-group mb-3">
                    <?php
                        $data = array(
                            'id' => 'user_login',
                            'name' => 'user_login',
                            'class' => 'form-control form-control-sm',
                            'required' => 'true',
                            'autocomplete' => 'off',
                            'placeholder' => 'Username'
                        );
                        echo form_input($data);
                    ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <?php
                        $data = array(
                            'id' => 'user_pass',
                            'name' => 'user_pass',
                            'class' => 'form-control form-control-sm',
                            'required' => 'true',
                            'autocomplete' => 'off',
                            'placeholder' => 'Password'
                        );
                        echo form_password($data);
                    ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-mid',
        showConfirmButton: false,
        timer: 3000,
        onClose: () => {
            window.location.reload();
        }
    });
    $("#Frm").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = "<?= base_url('portal/proses_login') ?>";
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            beforeSend: function() {
                Pace.restart();
            },
            success: function(data) {
                var response = JSON.parse(data);
                Toast.fire({
                    type: response.kode,
                    title: response.pesan+' Harap Tunggu Sebentar!'
                });
            },
            error: function(xhr, httpStatusMessage, customErrorMessage) {
                Toast.fire({
                    type: 'error',
                    title: xhr+' '+httpStatusMessage+' '+customErrorMessage
                });
            }
        })
    });
</script>