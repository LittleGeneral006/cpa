<!DOCTYPE html>
<html>
<?php
// use CodeIgniter\HTTP\RequestInterface;
$this->db = \Config\Database::connect();

if (session()->get('sudah_login') != TRUE) {
    session()->destroy();
    echo "<script>window.location.href='" . base_url() . "login';</script>";
}

if (session()->get('sudah_login') == TRUE) {
    $cek_sha = $this->db->query("SELECT sha_user from tb_user where kd_user = '" . session()->get('kd_user') . "' ")->getNumRows();
    if ($cek_sha > 0) {
        $sha = $this->db->query("SELECT sha_user from tb_user where kd_user = '" . session()->get('kd_user') . "' ")->getRow()->sha_user;
        if ($sha != session()->get('sha_user')) {
            session()->destroy();
            echo "<script>window.location.href='" . base_url() . "login';</script>";
            // echo "<script>window.location.href='" . base_url() . "login';</script>";
        }
    } else {
        session()->destroy();
        echo "<script>window.location.href='" . base_url() . "login';</script>";
    }
}

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url(); ?>public/assets/img/logo.png" type="image/png">

    <title><?php echo $title ?></title>

    <link href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url(); ?>public/assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="<?= base_url(); ?>public/assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/assets/css/style.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?php echo base_url(); ?>public/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    <style>
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

        .text-wrap {
            display: block;
            white-space: normal;
        }

        .nav-header {
            padding: 33px 25px;
            background-color: #1c84c6;
            /* background-image: url("<?= base_url(); ?>public/assets/css/patterns/heer-profile-skin-1.png"); */
        }
        .disabled-link {
            pointer-events: none;
            /* color: gray; Opsional: Untuk mengubah tampilan link agar terlihat dinonaktifkan */
            text-decoration: none; /* Opsional: Untuk menghapus underline */
            /* background-color: #1c84c6; */
        }

        /* body {
            background-color: #1ab394 !important;
        } */
    </style>
    <?= $this->renderSection('plugin'); ?>

</head>

<body class="fixed-sidebar">
    <div id="mohon" class="loader text-center text-danger" style="display: none;">
        <!-- <h2><b>Mohon Tunggu...</b></h2> -->
        <img src="<?= base_url(); ?>public/assets/img/loading.gif" alt="Loading..." width="5%">
    </div>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse blue-bg">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header blue-bg">
                        <div class="dropdown profile-element">
                            <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                </a> -->
                            <span class="text-wrap text-white block m-t-xs font-bold"><?= session()->get('nama_user') ?></span>
                            <span class="text-wrap text-white text-xs block"><?= session()->get('nama_level') ?></span>
                            <span class="text-wrap text-white text-xs block"><?= session()->get('nama_unit') ?></span>

                        </div>
                        <div class="logo-element">
                            <div id="singkatan_web"></div>
                        </div>
                    </li>
                    <?php
                    $menu = $this->db->query("SELECT * from tb_menu where status='Aktif' group by kd_menu order by kd_menu asc")->getResult();
                    ?>
                    <?php foreach ($menu as $list_menu) { ?>
                        <li>
                            <?php
                            $cek_tunggal = '';
                            $hitung_tunggal = $this->db->query("SELECT kd_menu, fry_menu FROM v_menu WHERE fry_menu IS NULL and kd_menu = '" . $list_menu->kd_menu . "' GROUP BY kd_menu ORDER BY kd_menu")->getNumRows();
                            if ($hitung_tunggal > 0) {
                                $cek_tunggal = $this->db->query("SELECT kd_menu, fry_menu FROM v_menu WHERE fry_menu IS NULL and kd_menu = '" . $list_menu->kd_menu . "' GROUP BY kd_menu ORDER BY kd_menu")->getRow()->kd_menu;
                            }
                            $otoritas = $this->db->query("SELECT kd_menu from tb_otoritas where status='Aktif' and kd_level = '" . session()->get('kd_level_user') . "' and kd_menu = '" . $list_menu->kd_menu . "' group by kd_menu order by kd_menu asc limit 1")->getNumRows();
                            if ($otoritas == 1) {
                            ?>
                                <a href="<?php echo base_url() . $list_menu->routes ?>"><i class="text-white <?php echo $list_menu->icon_menu ?>"></i> <span class="text-white nav-label"><?php echo $list_menu->nama_menu ?></span><?php if ($list_menu->kd_menu != $cek_tunggal) {
                                                                                                                                                                                                                                        echo '<span class="fa arrow"></span>';
                                                                                                                                                                                                                                    } ?></a>
                                <?php
                            }
                            $child_menu = $this->db->query("SELECT * from tb_child_menu where fry_menu = '" . $list_menu->kd_menu . "' and status ='Aktif' order by fry_menu asc")->getResult();
                            foreach ($child_menu as $list_child) {
                                $cek_child = $this->db->query("SELECT kd_menu from tb_otoritas where status='Aktif' and kd_level = '" . session()->get('kd_level_user') . "' and kd_menu = '" . $list_child->kd_menu . "' group by kd_menu order by kd_menu asc limit 1")->getNumRows();
                                if ($cek_child == 1) { ?>
                                    <ul class="nav nav-second-level collapse">
                                        <li><a href="<?php echo base_url() . $list_child->routes ?>"><span class="text-white"><?php echo $list_child->nama_menu ?></span></a></li>
                                    </ul>
                            <?php
                                }
                            }
                            ?>

                        </li>
                    <?php } ?>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar blue-bg navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>
                    <h1>
                        <i>
                            <div id="judul_web"></div>
                        </i>
                    </h1>
                    <ul class=" nav navbar-top-links navbar-right">

                        <li>
                            <a id="logout_link" href="<?= base_url(); ?>logout">
                                <i class="fa fa-sign-out text-white"></i> <span class="nav-label text-white">Log out</span>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            

            <?= $this->renderSection('content'); ?>

            <div class="footer">
                <div>
                    <strong id="copyright"></strong>
                </div>
            </div>

        </div>
    </div>
    <!-- modal ganti pw -->
    <div id="modal_users_ganti" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <!--            <div class="modal-header" style="padding:10px">
                            <h7 class="modal-title">Input Skoring</h7>
                        </div>-->
                <form id="form_users_ganti" class="form-horizontal">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="modal-header" style="padding:10px">
                            <h1 class="modal-title">Atur Ulang Password</h1>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-lg-12 control-label">Password Lama :</label>
                            <div class="col-lg-12">
                                <input id="pw_lama" name="pw_lama" type="password" placeholder="" class="form-control" required>
                                <input id="kd_user" name="kd_user" type="hidden" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12 control-label">Password Baru :</label>
                            <div class="col-lg-12">
                                <input id="pw_baru" name="pw_baru" type="password" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12 control-label">Konfirmasi Password Baru :</label>
                            <div class="col-lg-12">
                                <input id="konf_pw" name="konf_pw" type="password" placeholder="" class="form-control" required>
                            </div>
                        </div>


                    </div>
                    <div id="921_fb" class="modal-footer">
                        <!-- <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tutup</button> -->
                        <div class="form-group">

                            <div class="col-lg-12">
                                <input id="btns_921" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- batas modal ganti pw -->

    <!-- Mainly scripts -->
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?= base_url(); ?>public/assets/js/plugins/dataTables/datatables.min.js"></script>

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
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/select2/select2.full.min.js"></script>
    <!-- jquery mask -->
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/jQuery-Mask-Plugin-1.14.16/dist/jquery.mask.min.js"></script>
    <!-- Jquery Validate -->
    <script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/sha/CryptoJS-v3.1.2.js"></script>

    <?= $this->renderSection('script'); ?>
    <script>
        $(document).ready(function() {
            get_pengaturan();
            // Cari semua elemen <form> dalam dokumen
            $("form").each(function() {
                // Tambahkan atribut autocomplete="off" ke setiap elemen <form>
                $(this).attr("autocomplete", "off");
            });

            // Tangkap klik link logout
            $('#logout_link').on('click', function(e) {
                // Tampilkan konfirmasi
                if (!confirm('Anda yakin ingin log out?')) {
                    // Jika konfirmasi false, batalkan tindakan default (mengikuti tautan)
                    e.preventDefault();
                }
            });

            $.ajax({
                type: "GET",
                url: "<?php echo base_url('user/cek_pw_default'); ?>",
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        // alert(data.kd_info)

                        $('#kd_user').val(data.kd_user);
                        // Buka modal
                        $('#modal_users_ganti').modal('show');
                    }
                    // $('#kd_user_foto').val(data[0][6]);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // console.log("Error get data session user for modal");
                }
            });

            $.validator.addMethod("strongPassword", function(value, element) {
                // Memeriksa apakah password memuat huruf besar, huruf kecil, angka, dan karakter khusus
                return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])/.test(value);
            }, "Password harus memuat huruf besar, huruf kecil, angka, dan karakter khusus (@$!%*?&)");

        });

        function get_pengaturan() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('template/get_pengaturan'); ?>",
                dataType: "json",
                success: function(response) {
                    // console.log(response)
                    if (response.status == 'success') {
                        $('#singkatan_web').text(response.message.singkatan_web);
                        $('#judul_web').text(response.message.judul_web);
                        $('.judul_web').text(response.message.judul_web);
                        $('#copyright').text(response.message.copyright);
                        // $('.warna-tema').addClass(response.message.warna_tema);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data pengaturan website");
                }
            });
        }
        //proses ganti password
        $("#form_users_ganti").validate({
            // tambah validate
            errorPlacement: function(error, element) {
                element.after(error);
            },
            rules: {
                pw_baru: {
                    // required: true,
                    minlength: 8,
                    maxlength: 100,
                    strongPassword: true,
                },

            },
            messages: {
                pw_baru: {
                    minlength: "Password minimal 8 karakter",
                    maxlength: "Password maksimal 100 karakter",
                },

            },
            // batas tambah validate
            submitHandler: function(form) {
                $('#mohon').show()
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>user/proses_ganti_pw_default",
                    data: $("#form_users_ganti").serialize(),
                    success: function(d) {
                        if (d == '1') {
                            $('#mohon').hide()
                            $("#modal_users_ganti").modal('hide')
                            toastr.success('Atur Ulang Password Berhasil', 'Berhasil')
                            // alert('Atur Ulang Password Berhasil')
                            // window.location.href = "<?php echo base_url() ?>login";
                            // $('#tabel_users').DataTable().ajax.reload();
                        } else {
                            $('#mohon').hide()
                            toastr.warning(d, 'Gagal')
                        }
                    }
                })
            }
        });
    </script>
</body>

</html>