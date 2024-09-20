<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $title ?></h2>
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <button id="tambah_assign" class="btn-primary btn" onclick="tambah_assign()"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah</span></button>
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
                        <table id="tabel_assign" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <th>Id Assign</th>
                                    <th>Kd Assign</th>
                                    <th>Kd Level</th>
                                    <th>Nama Level</th>
                                    <th>Kd Permission</th>
                                    <th>Nama Permission</th>
                                    <th>Status</th>
                                    <!-- <th>Aksi</th> -->
                                    <th>Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_assign_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_assign_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah assign</h1>
                    </div>
                    <br>
                    <div class="form-group row">

                        <label class="col-lg-12 control-label">Level :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_level_tambah" name="kd_level_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>

                        </div>
                        <label class="col-lg-12 control-label">Permission :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_permission_tambah" name="kd_permission_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>

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
<div id="modal_assign_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_assign_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit assign</h1>
                    </div>
                    <br>
                    <div class="form-group">

                        <label class="col-lg-12 control-label">Level :</label>
                        <div class="col-lg-12">
                            <input id="kd_assign_edit" name="kd_assign_edit" type="hidden" placeholder="" class="form-control" required>

                            <select class="form-control select" id="kd_level_edit" name="kd_level_edit" required>
                                <!-- blm di generate dari controller -->

                            </select>

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Permission :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_permission_edit" name="kd_permission_edit" required>
                                <!-- blm di generate dari controller -->

                            </select>

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Status :</label>
                        <div class="col-lg-12">
                            <select class="form-control class-required select" required id="aktif_assign_edit" name="aktif_assign_edit">
                                <option value="" disabled="">pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>

                            </select>

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


<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script>
    var table = [];
    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

    $(document).ready(function() {

        var table = $('#tabel_assign').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>assign/tabel_assign/",
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
                    "width": "15%"
                },
                {
                    "targets": 6,
                    "width": "15%"
                },
                {
                    "targets": 7,
                    "width": "15%"
                },


            ],
            "aoColumns": [
                null,
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
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 0, 1, dan 2, 3, 4, 5, 6 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 0, 2, 3, 4, 5, 6, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Level Has Permission',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 0, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Level Has Permission',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 1, da akan di-export
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
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });
        $('#tabel_assign tbody ').on('click', '#edit_assign', function() {

            document.getElementById("form_assign_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_assign_edit").modal('show')
            // console.log(data[1])

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>assign/get_tabel_assign_by_id/" + data[1],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response.data.assign.nama_assign)
                    var data = response.data.assign
                    $('#kd_assign_edit').val(data.kd_assign);
                    $('#aktif_assign_edit').val(data.aktif_assign);

                    var kd_level = data.kd_level;
                    // console.log(kd_level);

                    $.ajax({
                        url: "<?php echo base_url('user/get_level'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.level;
                            var select = $('#kd_level_edit');

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
                                dropdownParent: $('#kd_level_edit').parent()
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("Error get data");
                        }
                    });

                    var kd_permission = data.kd_permission;
                    console.log(kd_permission);

                    $.ajax({
                        url: "<?php echo base_url('assign/get_permission'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.permission;
                            var select = $('#kd_permission_edit');

                            select.empty();
                            // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                            var defaultOption = new Option('Pilih', '', true, true);
                            $(defaultOption).prop('disabled', true);
                            select.append(defaultOption);

                            $.each(options, function(index, option) {
                                var newOption = new Option(option.kd_permission + ' - ' + option.nama_permission, option.kd_permission, false, false);
                                if (option.kd_permission === kd_permission) {
                                    $(newOption).prop('selected', true);
                                }
                                select.append(newOption);
                            });

                            select.select2({
                                placeholder: 'Pilih',
                                dropdownParent: $('#kd_permission_edit').parent()
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

    });

    function tambah_assign() {
        document.getElementById("form_assign_tambah").reset();

        $.ajax({
            url: "<?php echo base_url('user/get_level'); ?>",
            type: "get",
            dataType: "JSON",

            success: function(data) {
                var options = data.level;
                var select = $('#kd_level_tambah');

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
                    dropdownParent: $('#kd_level_tambah').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });

        $.ajax({
            url: "<?php echo base_url('assign/get_permission'); ?>",
            type: "get",
            dataType: "JSON",

            success: function(data) {
                var options = data.permission;
                var select = $('#kd_permission_tambah');

                select.empty();
                // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                var defaultOption = new Option('Pilih', '', true, true);
                $(defaultOption).prop('disabled', true);
                select.append(defaultOption);

                $.each(options, function(index, option) {
                    var newOption = new Option(option.nama_permission, option.kd_permission, false, false);
                    select.append(newOption);
                });

                select.select2({
                    placeholder: 'Pilih',
                    dropdownParent: $('#kd_permission_tambah').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });

        $("#modal_assign_tambah").modal('show')
    }
    //proses tambah
    $("#form_assign_tambah").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>assign/simpan_assign",
                data: $("#form_assign_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_assign_tambah").modal('hide')
                        toastr.success('Simpan Data Berhasil', 'Berhasil')
                        $('#tabel_assign').DataTable().ajax.reload();
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });
    //proses edit
    $("#form_assign_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>assign/edit_assign",
                data: $("#form_assign_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_assign_edit").modal('hide')
                        toastr.success('Edit Data Berhasil', 'Berhasil')
                        $('#tabel_assign').DataTable().ajax.reload();
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