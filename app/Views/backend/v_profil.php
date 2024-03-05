<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>
    /* .full-height-scroll {
        height: 10px;
    } */
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?php
$this->db = \Config\Database::connect();
?>
<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2>Edit Profil</h2>

    </div>
    <div class="col-lg-2">
    </div>
</div>


<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10">
            <div class="ibox">
                <div class="ibox-content">
                    <h2 class="text-center">Detail Profil <span id="nama_user_detail"></span></h2>
                    <div class="clients-list">
                        <ul class="nav nav-tabs">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Data User</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold">Nama</td>
                                                    <td id="dnama_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Username</td>
                                                    <td id="dusername_user"></td>
                                                </tr>

                                                <tr>
                                                    <td class="font-weight-bold">Unit Kerja</td>
                                                    <td id="dkd_unit_user"></td>
                                                </tr>

                                                <tr>
                                                    <td class="font-weight-bold">Induk Unit</td>
                                                    <td id="dkd_induk_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Level</td>
                                                    <td id="dkd_level_user"></td>
                                                </tr>


                                                <tr>
                                                    <td class="font-weight-bold">Blokir</td>
                                                    <td id="dcounter_blokir"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Last Login</td>
                                                    <td id="dlast_login_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Pembuat</td>
                                                    <td id="dmaker_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Waktu Dibuat</td>
                                                    <td id="dwaktu_maker_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Unit Kerja Pembuat</td>
                                                    <td id="dkd_unit_maker_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Pengubah</td>
                                                    <td id="dupdater_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Terakhir Diubah</td>
                                                    <td id="dwaktu_updater_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Unit Kerja Pengubah</td>
                                                    <td id="dkd_unit_updater_user"></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Role User</td>
                                                    <td id="dkonsolidasi_user"></td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-4">
                                            <br>
                                            <button id="edit_profil" class="btn btn-block btn-outline btn-primary btn-rounded">
                                                <h2>Ganti Password</h2>
                                            </button>

                                        </div>

                                        <div class="col-lg-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1">
        </div>

    </div>
</div>
<div id="modal_user_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_user_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Ganti Password</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Nama</label>
                        <div class="col-lg-12">
                            <input id="nama_user_edit" name="nama_user_edit" type="text" placeholder="" class="form-control" required readonly>
                            <input id="kd_user_edit" name="kd_user_edit" type="hidden" placeholder="" class="form-control">

                        </div>
                    </div>
                    <div class="form-group row">


                        <label class="col-lg-12 control-label">Password Lama</label>
                        <div class="col-lg-12">
                            <input id="password_lama" name="password_lama" type="password" placeholder="" class="form-control">
                        </div>



                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Password Baru</label>
                        <div class="col-lg-12">
                            <input id="password_baru" name="password_baru" type="password" placeholder="" class="form-control">
                        </div>


                    </div>
                    <div class="form-group row">

                        <label class="col-lg-12 control-label">Konfirmasi Password Baru</label>
                        <div class="col-lg-12">
                            <input id="konfirmasi_password_baru" name="konfirmasi_password_baru" type="password" placeholder="" class="form-control">
                        </div>

                    </div>



                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    <input id="btns_921" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script>
    $(document).ready(function() {
        tampil_profil()

        //memanggil modal edit profil 
        $("#edit_profil").click(function() {
            document.getElementById("form_user_edit").reset();
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('profil/get_tabel_user_by_id'); ?>",
                dataType: "json",
                success: function(response) {
                    // console.log(response)
                    var data = response.data;
                    $('#kd_user_edit').val(data.kd_user);
                    $('#nama_user_edit').val(data.nama_user);
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Error get data session user for modal");
                }
            });
            $("#modal_user_edit").modal('show')

        });

        $.validator.addMethod("strongPassword", function(value, element) {
            // Memeriksa apakah password memuat huruf besar, huruf kecil, angka, dan karakter khusus
            return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])/.test(value);
        }, "Password harus memuat huruf besar, huruf kecil, angka, dan karakter khusus (@$!%*?&)");

    });



    //proses edit profil
    $("#form_user_edit").validate({
        errorPlacement: function(error, element) {
            element.after(error);
        },
        rules: {
            
            password_baru: {
                // required: true,
                minlength: 8,
                maxlength: 100,
                strongPassword: true,
            },

        },
        messages: {
            password_baru: {
                minlength: "Password minimal 8 karakter",
                maxlength: "Password maksimal 100 karakter",
            },

        },
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>profil/ganti_password",
                data: $("#form_user_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_user_edit").modal('hide')
                        toastr.success('Ganti Password Berhasil', 'Berhasil')
                        tampil_profil()
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });

    function tampil_profil() {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('profil/get_tabel_user_by_id'); ?>",
            dataType: "json",
            success: function(response) {
                // console.log(response)
                var data = response.data
                $('#nama_user_detail').html(data.nama_user);
                $('#dnama_user').html(data.nama_user);
                $('#dusername_user').html(data.username_user);
                $('#dkd_unit_user').html(data.nama_unit);
                $('#dkd_induk_user').html(data.kd_induk_user2);
                $('#dkd_level_user').html(data.nama_level);
                $('#dcounter_blokir').html(data.counter_blokir2);
                $('#dlast_login_user').html(data.last_login_user2);

                $('#dmaker_user').html(data.maker_user);
                $('#dwaktu_maker_user').html(data.waktu_maker_user2);
                $('#dkd_unit_maker_user').html(data.kd_unit_maker_user2);

                $('#dupdater_user').html(data.updater_user);
                $('#dwaktu_updater_user').html(data.waktu_updater_user2);
                $('#dkd_unit_updater_user').html(data.kd_unit_updater_user2);

                $('#dkonsolidasi_user').html(data.konsolidasi_user2);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal menampilkan detail profil user");
            }
        });
    }
</script>

<?= $this->endSection(); ?>