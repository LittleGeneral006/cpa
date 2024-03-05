<?= $this->extend('template/v_template'); ?>

<?= $this->section('plugin'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <!-- <div class="ibox-title">
                    <div class="ibox-tools">
                        <span class="label label-success float-right">Monthly</span>
                    </div>
                    <h5>Income</h5>
                </div> -->
                <?php
                $this->db = \Config\Database::connect();
                $last_login = '';
                if (session()->get('kd_user')) {
                    $last_login = $this->db->query("SELECT last_login_user from tb_user where kd_user = '" . session()->get('kd_user') . "'")->getRow()->last_login_user;

                    if (!empty($last_login)) {
                        $dateArr = explode(' ', $last_login);
                        $last_login = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
                    } else {
                        $last_login = $last_login;
                    }
                } else {
                    echo "<script>window.location.href='" . base_url() . "login';</script>";
                }

                ?>
                <div class="ibox-content">
                    <h1 class="">Welcome to <span class="judul_web"></span></h1>
                    <i>
                        <h3 class="">Hello <?= session()->get('nama_user') ?> ! You're logged in as <?= session()->get('nama_level') ?></h3>
                        <h3 class="">Last login : <?= $last_login ?></h3>
                    </i>

                </div>
            </div>
        </div>

    </div>
    <?= $this->endSection(); ?>

    <?= $this->section('script'); ?>
    <script>
        $(document).ready(function() {

        });
    </script>

    <!-- Red - Merah
Blue - Biru
Yellow - Kuning
Gray - Abu-abu
Black - Hitam
White - Putih
Lazur/ bg-info -->
    <?= $this->endSection(); ?>