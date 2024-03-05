<!DOCTYPE html>
<html>
<?php
if (session()->get('sudah_login') == TRUE) {
    session()->destroy();
    echo ("<script>location=" . $setting->redirect . ";</script>");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url(); ?>public/assets/img/logo.png" type="image/png">

    <title><?= $setting->judul_web ?></title>

    <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url(); ?>public/assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/assets/css/style.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?php echo base_url(); ?>public/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    <style>
        /* Style for the eye icon */
        .fa-eye-slash {
            cursor: pointer;
        }
    </style>
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            /* background-image: url('<?= base_url(); ?>public/assets/img/penari.jpg'); */
            background-size: cover;
            background-position: center center;
        }

        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(249, 249, 249, 0.6);
        }
    </style>
</head>

<body class="white-bg">
    <div id="mohon" class="loader text-center text-danger" style="display: none;">
        <!-- <h2><b>Mohon Tunggu...</b></h2> -->
        <img src="<?= base_url(); ?>public/assets/img/loading.gif" alt="Loading..." width="5%">
    </div>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>

            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container text-dark">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <div class="text-center">

                                    <img src="<?= base_url(); ?>public/assets/img/logo.png" alt="Bank Kalsel" width="200">
                                </div>
                                <h1 class="text-center text-secondary"><i><?= $setting->judul_web ?></i></h1>
                                <p class="text-muted mb-4 text-center"><i>Login untuk lanjut</i></p>
                                <form id="form_login" class="m" role="form" action="#" autocomplete="off">
                                    <div class="form-group mb-3">
                                        <input type="username" id="username" name="username" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <!-- <div class="form-group mb-3">
                                        <input id="password" name="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i id="togglePassword" class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div> -->
                                    <div class="form-group mb-3">
                                        <div class="input-group">
                                            <input id="password" name="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i id="togglePassword" class="fa fa-eye-slash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-block  mb-2 rounded-pill shadow-sm"><i>Log In</i></button>
                                    <div class="text-center text-muted mb-4">
                                        <p><i><?= $setting->copyright ?></i></p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?= base_url(); ?>public/assets/js/inspinia.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/pace/pace.min.js"></script>

    <!-- Flot -->
    <script src="<?= base_url(); ?>public/assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <!-- <script src="<?= base_url(); ?>public/assets/js/plugins/chartJs/Chart.min.js"></script> -->

    <!-- Peity -->
    <script src="<?= base_url(); ?>public/assets/js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="<?= base_url(); ?>public/assets/js/demo/peity-demo.js"></script>
    <!-- Toastr script -->
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>
    <!-- Jquery Validate -->
    <script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>
    <!-- rechapcha google -->
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/select2/select2.full.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function(e) {
                // toggle icon
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye-slash');
                icon.classList.toggle('fa-eye');

                // toggle password field
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
            });
        });
    </script>


    <script>
        $(document).ready(function() {


        });

        //proses login
        $("#form_login").validate({
            submitHandler: function(form) {
                // $('#putar').show()
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>user/proses_login",
                    data: $("#form_login").serialize(),
                    success: function(d) {
                        if (d == '1') {
                            window.location.href = "<?php echo base_url() ?>dashboard";
                        } else {
                            toastr.warning(d, 'Gagal')
                            // alert(d)
                            // console.log(d)
                        }
                    }
                })
            }
        });
        // foto login
        $(document).ready(function() {
            // Lakukan AJAX call untuk mendapatkan URL gambar
            $.ajax({
                url: '<?= base_url('user/gambar_login'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Ganti background-image dengan URL gambar yang didapatkan dari AJAX
                    $('.bg-image').css('background-image', 'url(' + response.image_url + ')');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error: ' + error);
                }
            });
        });
    </script>
</body>

</html>