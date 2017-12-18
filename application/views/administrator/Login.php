
    <div class="panel panel-signin">
        <div class="panel-body">
            <button id="error" class="btn btn-danger btn-block"></button>
            <button id="redirect" class="btn btn-success btn-block "><i class="fa fa-check"></i> Login correcto. Ingresando ....</button>
            <?php
            $msg=$this->session->userdata('message');
            if($msg){
                echo "<button id='flash' class='btn btn-info btn-block'><i class='fa fa-thumbs-up'></i> ".$msg."</button>";
                $this->session->unset_userdata('message');
            }
            ?>
            <br>
            <h2 class="text-center">Login Topo</h2><br>
            <form id="login" action="" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div><!-- input-group -->

                <div class="clearfix">
                    <div class="pull-left">
                        <div class="ckbox ckbox-primary mt10">
                            <input type="checkbox" id="rememberMe" value="1">
                            <label for="rememberMe">Recuerdame</label><br>
                        </div>
                    </div>
                    <br>
                    <br>
                    <button id="sign" type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    <button id="auth" class="btn btn-info btn-block">Verificando... <i class='fa fa-spinner'></i></button>
                </div>
            </form>

        </div>
    </div><!-- panel -->

</section>
<script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery-1.11.1.min.js"></script>
</body>
</html>
<script>
    $('#auth').hide();
    $('#redirect').hide();
    $('#error').hide();
    $('#flash').delay(3000).fadeOut();

    $(document).bind("ajaxStart", function () {
        $('#sign').hide();
        $('#auth').show();

    });
    $(document).on('ajaxError', function () {
        $('#sign').show();
        $('#auth').hide();
        $('#error').delay(5000).fadeOut();
        $(document).trigger('reset');

    });

    $(document).on('success', function () {
        $('#sign').show();
        $('#auth').hide();
        $('#redirect').show();

    });

    $(document).ready(function () {
        $('#login').on('submit', function (e) {
            e.preventDefault();
            var url = window.location.protocol + '//' + window.location.host + '/';
            var data = $(this).serialize();
            $.ajax({
                url: url+'login/check_login',
                type: 'post',
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'error') {
                        $('#error').show().html('<i class="fa fa-warning"></i> ' +response.message);
                        $(document).trigger('ajaxError');
                    }
                    else {
                        $(document).trigger('success');
                        window.location = url + 'administrator';
                    }
                }
            });
        });
    });

</script>