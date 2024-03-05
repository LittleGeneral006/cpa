<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>

<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Setup User</h2>
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <div class="row text-right">
            <div class="col-md-12">
                <button id="tambah_user" class="btn-primary btn" onclick="tambah_user()"><span class="bold">Tambah</span></button>
            </div>
        </div>

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <!-- <h5>Basic Data Tables example with responsive plugin</h5> -->

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table id="tabel_user" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <th>Username</th>
                                    <th>Unit Kerja</th>
                                    <th>Level</th>
                                    <th>Nama</th>
                                    <th>Blokir</th>
                                    <th>Role User</th>
                                    <th>Aksi</th>
                                    <!-- <th>Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->

                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_user_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form id="form_user_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah User</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama :</label>
                        <div class="col-lg-4">
                            <input id="nama_user_tambah" name="nama_user_tambah" type="text" placeholder="" class="form-control" required>
                            <!-- <input id="921_iduser" style="display:none" name="921_iduser" type="text" placeholder="" class="form-control"> -->
                        </div>

                        <label class="col-lg-2 control-label">Username :</label>
                        <div class="col-lg-4">
                            <input id="username_user_tambah" name="username_user_tambah" type="number" placeholder="Masukkan No. Absen" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Level :</label>
                        <div class="col-lg-4">
                            <select class="form-control select" id="kd_level_user_tambah" name="kd_level_user_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>

                        </div>
                        <label class="col-lg-2 control-label">Unit Kerja :</label>
                        <div class="col-lg-4">
                            <select class="form-control select" id="kd_unit_user_tambah" name="kd_unit_user_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>

                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Role User :</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="konsolidasi_user_tambah" name="konsolidasi_user_tambah">
                                <option value="0" selected="" disabled="">pilih</option>
                                <option value="1">1 - Bisa Lihat Semua Unit Kerja (Termasuk Kantor Pusat)</option>
                                <option value="2">2 - Bisa Lihat Induk dan Anak Unit Sendiri (Konsolidasi Cabang)</option>
                                <option value="3">3 - Hanya Bisa Lihat Unit Kerja Sendiri</option>
                            </select>

                        </div>
                        <label class="col-lg-2 control-label">Blokir :</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="counter_blokir_tambah" name="counter_blokir_tambah">
                                <option value="0" selected="" disabled="">pilih</option>
                                <option value="3">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row text-right">
                        <div class="col-lg-12">
                            <!-- <br> -->
                            <p>- Default password: <?= $setting->default_password ?></p>
                        </div>
                    </div>

                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
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
<div id="modal_user_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form id="form_user_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit User</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama :</label>
                        <div class="col-lg-4">
                            <input id="nama_user_edit" name="nama_user_edit" type="text" placeholder="" class="form-control" required>
                            <input id="kd_user_edit" name="kd_user_edit" type="hidden" placeholder="" class="form-control">
                        </div>



                        <label class="col-lg-2 control-label">Username :</label>
                        <div class="col-lg-4">
                            <input id="username_user_edit" name="username_user_edit" type="number" placeholder="Masukkan No. Absen" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Level :</label>
                        <div class="col-lg-4">
                            <select class="form-control select" id="kd_level_user_edit" name="kd_level_user_edit" required>
                                <!-- blm di generate dari controller -->

                            </select>

                        </div>
                        <label class="col-lg-2 control-label">Unit Kerja :</label>
                        <div class="col-lg-4">
                            <select class="form-control select" id="kd_unit_user_edit" name="kd_unit_user_edit" required>
                                <!-- blm di generate dari controller -->

                            </select>

                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Role User :</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="konsolidasi_user_edit" name="konsolidasi_user_edit">
                                <option value="0" disabled="">pilih</option>
                                <option value="1">1 - Bisa Lihat Semua Unit Kerja (Termasuk Kantor Pusat)</option>
                                <option value="2">2 - Bisa Lihat Induk dan Anak Unit Sendiri (Konsolidasi Cabang)</option>
                                <option value="3">3 - Hanya Bisa Lihat Unit Kerja Sendiri</option>
                            </select>

                        </div>
                        <label class="col-lg-2 control-label">Blokir :</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="counter_blokir_edit" name="counter_blokir_edit">
                                <option value="" disabled="">pilih</option>
                                <option value="3">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Reset Password :</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="reset_password_edit" name="reset_password_edit">
                                <option value="0" disabled="">pilih</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak" selected>Tidak</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <!-- <br> -->
                            <p>- Password akan dikembalikan ke "<?= $setting->default_password ?>" (tanpa tanda petik) jika memilih "Ya" pada reset password</p>
                        </div>
                    </div>

                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btns_921_edit" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="modal_user_detail" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Detail User</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h2 class="text-center">Detail User <span id="nama_user_detail"></span></h2>

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
                                                                    <td class="font-weight-bold">Level</td>
                                                                    <td id="dkd_level_user"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="font-weight-bold">Role User</td>
                                                                    <td id="dkonsolidasi_user"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="font-weight-bold">Last Login</td>
                                                                    <td id="dlast_login_user"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Blokir</td>
                                                                    <td id="daktif_user"></td>
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
                                                                    <td class="font-weight-bold">Pembuat</td>
                                                                    <td id="dpembuat_user"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Waktu Dibuat</td>
                                                                    <td id="dtgl_pembuat_user"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pembuat</td>
                                                                    <td id="dkd_cab_pembuat_user"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Pengubah</td>
                                                                    <td id="dpengubah_user"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Terakhir Diubah</td>
                                                                    <td id="dtgl_pengubah_user"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pengubah</td>
                                                                    <td id="dkd_cab_pengubah_user"></td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div id="702_fb" class="modal-footer">
                    <button type="button" class="btn btn-danger cabut-readonly" data-dismiss="modal">Tutup</button>
                    <!-- <input id="btns_702" class="btn btn-sm btn-primary m-t-n-xs" type="submit" value="Hapus"> -->

                </div>
            </div>
            <!-- </form> -->

        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    var table = [];
    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

    $(document).ready(function() {

        var table = $('#tabel_user').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>user/tabel_user",
            "columnDefs": [{
                    "targets": 0,
                    "width": "15%"
                },
                {
                    "targets": 1,
                    "width": "15%"
                },
                {
                    "targets": 2,
                    "width": "15%"
                },
                {
                    "targets": 3,
                    "width": "15%"
                },
                {
                    "targets": 4,
                    "width": "15%"
                },
                {
                    "targets": 5,
                    "width": "5%"
                },
                {
                    "targets": 6,
                    "width": "15%"
                }



            ],
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
                null,
                {
                    "bSortable": false
                }
            ],
            "dom": '<"html5buttons"B>lTfgitp',
            "lengthMenu": [
                ['15', '25', '50', '100', '10000000000'],
                ['15', '25', '50', '100', 'All'],
            ],
            "buttons": [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 0, 1, dan 2 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 0, 2, dan 4, 5 akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Daftar User',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 0, 3, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Daftar User',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 1, 4, da akan di-export
                    }
                },
                {
                    "extend": 'print',
                    "customize": function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });
        $('#tabel_user tbody ').on('click', '#edit_user', function() {
            newx_702 = 1;
            document.getElementById("form_user_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_user_edit").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>user/get_tabel_user_by_id/" + data[7],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#kd_user_edit').val(data.kd_user);
                    $('#nama_user_edit').val(data.nama_user);
                    $('#username_user_edit').val(data.username_user);
                    $('#konsolidasi_user_edit').val(data.konsolidasi_user);
                    $('#counter_blokir_edit').val(data.counter_blokir);

                    var kd_level = data.kd_level_user;
                    console.log(kd_level);

                    $.ajax({
                        url: "<?php echo base_url('user/get_level'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.level;
                            var select = $('#kd_level_user_edit');

                            select.empty();
                            // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                            var defaultOption = new Option('Pilih', '', true, true);
                            $(defaultOption).prop('disabled', true);
                            select.append(defaultOption);

                            $.each(options, function(index, option) {
                                var newOption = new Option(option.kd_level + ' - ' + option.nama_level, option.kd_level, false, false);
                                if (option.kd_level === kd_level) {
                                    $(newOption).prop('selected', true);
                                }
                                select.append(newOption);
                            });

                            select.select2({
                                placeholder: 'Pilih',
                                dropdownParent: $('#kd_level_user_edit').parent()
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("Error get data");
                        }
                    });

                    var kd_unit = data.kd_unit_user;
                    console.log(kd_unit);

                    $.ajax({
                        url: "<?php echo base_url('user/get_unit'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.unit;
                            var select = $('#kd_unit_user_edit');

                            select.empty();
                            // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                            var defaultOption = new Option('Pilih', '', true, true);
                            $(defaultOption).prop('disabled', true);
                            select.append(defaultOption);

                            $.each(options, function(index, option) {
                                var newOption = new Option(option.kd_unit + ' - ' + option.nama_unit, option.kd_unit, false, false);
                                if (option.kd_unit === kd_unit) {
                                    $(newOption).prop('selected', true);
                                }
                                select.append(newOption);
                            });

                            select.select2({
                                placeholder: 'Pilih',
                                dropdownParent: $('#kd_unit_user_edit').parent()
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("Error get data");
                        }
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru
        });

        $('#tabel_user tbody ').on('click', '#detail_user', function() {
            // newx_702 = 1;
            // document.getElementById("form_user_hapus").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_user_detail").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>user/get_tabel_user_by_id/" + data[7],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#nama_user_detail').html(data.nama_user);
                    $('#dnama_user').html(data.nama_user);
                    $('#dusername_user').html(data.username_user);
                    $('#dkd_level_user').html(data.nama_level);
                    $('#dkonsolidasi_user').html(data.konsolidasi_user2);
                    $('#dlast_login_user').html(data.last_login_user2);
                    $('#daktif_user').html(data.counter_blokir2);
                    $('#dkd_unit_user').html(data.nama_unit);
                    $('#dkd_induk_user').html(data.kd_induk_user2);

                    $('#dpembuat_user').html(data.maker_user);
                    $('#dtgl_pembuat_user').html(data.waktu_maker_user2);
                    $('#dkd_cab_pembuat_user').html(data.kd_unit_maker_user2);

                    $('#dpengubah_user').html(data.updater_user);
                    $('#dtgl_pengubah_user').html(data.waktu_updater_user2);
                    $('#dkd_cab_pengubah_user').html(data.kd_unit_updater_user2);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru
        });

    });

    function tambah_user() {
        document.getElementById("form_user_tambah").reset();

        $.ajax({
            url: "<?php echo base_url('user/get_level'); ?>",
            type: "get",
            dataType: "JSON",

            success: function(data) {
                var options = data.level;
                var select = $('#kd_level_user_tambah');

                select.empty();
                // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                var defaultOption = new Option('Pilih', '', true, true);
                $(defaultOption).prop('disabled', true);
                select.append(defaultOption);

                $.each(options, function(index, option) {
                    var newOption = new Option(option.nama_level, option.kd_level, false, false);
                    select.append(newOption);
                });

                select.select2({
                    placeholder: 'Pilih',
                    dropdownParent: $('#kd_level_user_tambah').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });


        $.ajax({
            url: "<?php echo base_url('user/get_unit'); ?>",
            type: "get",
            dataType: "JSON",

            success: function(data) {
                var options = data.unit;
                var select = $('#kd_unit_user_tambah');

                select.empty();
                // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                var defaultOption = new Option('Pilih', '', true, true);
                $(defaultOption).prop('disabled', true);
                select.append(defaultOption);

                $.each(options, function(index, option) {
                    var newOption = new Option(option.kd_unit + ' - ' + option.nama_unit, option.kd_unit, false, false);
                    select.append(newOption);
                });

                select.select2({
                    placeholder: 'Pilih',
                    dropdownParent: $('#kd_unit_user_tambah').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });

        $("#modal_user_tambah").modal('show')
    }

    //proses tambah
    $("#form_user_tambah").validate({
        errorPlacement: function(error, element) {
            element.after(error);
        },
        rules: {
            username_user_tambah: {
                number: true,
                minlength: 3,
                maxlength: 6,
                // strongPassword: true,
            },

        },
        messages: {
            username_user_tambah: {
                minlength: "Username minimal 3 karakter",
                maxlength: "Username maksimal 6 karakter",
            },

        },
        submitHandler: function(form) {

            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>user/simpan_user",
                data: $("#form_user_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_user_tambah").modal('hide')
                        toastr.success('Simpan User Berhasil', 'Berhasil')
                        $('#tabel_user').DataTable().ajax.reload();
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });
    //proses edit
    $("#form_user_edit").validate({
        errorPlacement: function(error, element) {
            element.after(error);
        },
        rules: {
            username_user_edit: {
                number: true,
                minlength: 3,
                maxlength: 6,
                // strongPassword: true,
            },

        },
        messages: {
            username_user_edit: {
                minlength: "Username minimal 3 karakter",
                maxlength: "Username maksimal 6 karakter",
            },

        },
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>user/edit_user",
                data: $("#form_user_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_user_edit").modal('hide')
                        toastr.success('Edit User Berhasil', 'Berhasil')
                        $('#tabel_user').DataTable().ajax.reload();
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });
</script>

<?= $this->endSection(); ?>