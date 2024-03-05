<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Setup Otoritas</h2>

        <!-- <strong>Data Tables</strong> -->

    </div>
    <div class="col-lg-1 text-right">
        <br>
        <button id="tambah_parent" class="btn-primary btn" onclick="tambah_parent()"><span class="bold">Parent</span></button>
    </div>
    <div class="col-lg-1 text-right">
        <br>
        <button id="tambah_child" class="btn-primary btn" onclick="tambah_child()"><span class="bold">Child</span></button>
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
                        <table id="tabel_otoritas" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <th>Id Otoritas</th>
                                    <th>Kd Otoritas</th>
                                    <th>Kd Level</th>
                                    <th>Nama Level</th>
                                    <th>Kd Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Status Otoritas</th>
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
<!-- tambah parent -->
<div id="modal_otoritas_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_otoritas_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Parent</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Otoritas :</label>
                        <div class="col-lg-12">
                            <input id="kd_otoritas_tambah" name="kd_otoritas_tambah" type="number" placeholder="" class="form-control" required>

                        </div>



                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Level :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_level_tambah" name="kd_level_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>



                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Menu Parent :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_menu_tambah" name="kd_menu_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>



                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Status</label>
                        <div class="col-lg-12">
                            <select class="form-control class-disabled select" required id="status_tambah" name="status_tambah">
                                <option value="0" selected="" disabled="">pilih</option>
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
<!-- tambah child -->
<div id="modal_otoritas_tambah2" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_otoritas_tambah2" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Child</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Otoritas :</label>
                        <div class="col-lg-12">
                            <input id="kd_otoritas_tambah2" name="kd_otoritas_tambah2" type="number" placeholder="" class="form-control" required>

                        </div>



                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Level :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_level_tambah2" name="kd_level_tambah2" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>



                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Menu Child :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_menu_tambah2" name="kd_menu_tambah2" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>



                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Status</label>
                        <div class="col-lg-12">
                            <select class="form-control class-disabled select" required id="status_tambah2" name="status_tambah2">
                                <option value="0" selected="" disabled="">pilih</option>
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
<!-- edit menu -->
<div id="modal_otoritas_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_otoritas_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Otoritas</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Otoritas :</label>
                        <div class="col-lg-12">
                            <input id="kd_otoritas_edit" name="kd_otoritas_edit" type="number" placeholder="" class="form-control" required readonly>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Level :</label>
                        <div class="col-lg-12">
                            <input id="kd_level_edit" name="kd_level_edit" type="text" placeholder="" class="form-control" required readonly>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Kd Menu Parent :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_menu_edit" name="kd_menu_edit" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Status</label>
                        <div class="col-lg-12">
                            <select class="form-control class-disabled select" required id="status_edit" name="status_edit">
                                <option value="0" disabled="">pilih</option>
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

<div id="modal_otoritas_detail" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Detail Otoritas</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h2 class="text-center">Detail Otoritas <span id="kd_otoritas_detail"></span></h2>

                                    <div class="clients-list">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-lock"></i> Otoritas</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>

                                                                <tr>
                                                                    <td class="font-weight-bold">Id Otoritas</td>
                                                                    <td id="did_otoritas"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kd Otoritas</td>
                                                                    <td id="dkd_otoritas"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kd Level</td>
                                                                    <td id="dkd_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama Level</td>
                                                                    <td id="dnama_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kd Menu</td>
                                                                    <td id="dkd_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama Menu</td>
                                                                    <td id="dnama_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Status Otoritas</td>
                                                                    <td id="dstatus"></td>
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

        var table = $('#tabel_otoritas').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>otoritas/tabel_otoritas",
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
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 0, 1, dan 2 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 0, 2, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Setup Otoritas',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6] // kolom 0, 3, 4, 5, 6, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Setup Otoritas',
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
        $('#tabel_otoritas tbody ').on('click', '#edit_otoritas', function() {

            document.getElementById("form_otoritas_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_otoritas_edit").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>otoritas/get_tabel_otoritas_by_id/" + data[8],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#kd_otoritas_edit').val(data.kd_otoritas);
                    $('#kd_level_edit').val(data.kd_level);
                    // $('#kd_menu_edit').val(data.kd_menu);
                    $('#status_edit').val(data.status);

                    var kd_menu = data.kd_menu;
                    console.log(kd_menu);

                    $.ajax({
                        url: "<?php echo base_url('otoritas/get_menu_edit'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.menu;
                            var select = $('#kd_menu_edit');

                            select.empty();
                            // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                            var defaultOption = new Option('Pilih', '', true, true);
                            $(defaultOption).prop('disabled', true);
                            select.append(defaultOption);

                            $.each(options, function(index, option) {
                                var newOption = new Option(option.kd_menu + ' - ' + option.nama_menu, option.kd_menu, false, false);
                                if (option.kd_menu === kd_menu) {
                                    $(newOption).prop('selected', true);
                                }
                                select.append(newOption);
                            });

                            select.select2({
                                placeholder: 'Pilih',
                                dropdownParent: $('#kd_menu_edit').parent()
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

        $('#tabel_otoritas tbody ').on('click', '#detail_otoritas', function() {
            // newx_702 = 1;
            // document.getElementById("form_otoritas_hapus").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_otoritas_detail").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>otoritas/get_tabel_otoritas_by_id/" + data[8],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#kd_otoritas_detail').html(data.kd_otoritas);
                    $('#did_otoritas').html(data.id_otoritas);
                    $('#dkd_otoritas').html(data.kd_otoritas);
                    $('#dkd_level').html(data.kd_level);
                    $('#dnama_level').html(data.nama_level);
                    $('#dkd_menu').html(data.kd_menu);
                    $('#dnama_menu').html(data.nama_menu);
                    $('#dstatus').html(data.status_warna);
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru

        });

    });


    function tambah_parent() {
        document.getElementById("form_otoritas_tambah").reset();
        $.ajax({
            url: "<?php echo base_url('otoritas/get_level'); ?>",
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
                    var newOption = new Option(option.kd_level + ' - ' + option.nama_level, option.kd_level, false, false);
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
            url: "<?php echo base_url('otoritas/get_menu'); ?>",
            type: "get",
            dataType: "JSON",

            success: function(data) {
                var options = data.menu;
                var select = $('#kd_menu_tambah');

                select.empty();
                // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                var defaultOption = new Option('Pilih', '', true, true);
                $(defaultOption).prop('disabled', true);
                select.append(defaultOption);

                $.each(options, function(index, option) {
                    var newOption = new Option(option.kd_menu + ' - ' + option.nama_menu, option.kd_menu, false, false);
                    select.append(newOption);
                });

                select.select2({
                    placeholder: 'Pilih',
                    dropdownParent: $('#kd_menu_tambah').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });

        $("#modal_otoritas_tambah").modal('show')
    }

    function tambah_child() {
        document.getElementById("form_otoritas_tambah2").reset();
        $.ajax({
            url: "<?php echo base_url('otoritas/get_level'); ?>",
            type: "get",
            dataType: "JSON",

            success: function(data) {
                var options = data.level;
                var select = $('#kd_level_tambah2');

                select.empty();
                // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                var defaultOption = new Option('Pilih', '', true, true);
                $(defaultOption).prop('disabled', true);
                select.append(defaultOption);

                $.each(options, function(index, option) {
                    var newOption = new Option(option.kd_level + ' - ' + option.nama_level, option.kd_level, false, false);
                    select.append(newOption);
                });

                select.select2({
                    placeholder: 'Pilih',
                    dropdownParent: $('#kd_level_tambah2').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });
        $.ajax({
            url: "<?php echo base_url('otoritas/get_child'); ?>",
            type: "get",
            dataType: "JSON",

            success: function(data) {
                var options = data.child;
                var select = $('#kd_menu_tambah2');

                select.empty();
                // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                var defaultOption = new Option('Pilih', '', true, true);
                $(defaultOption).prop('disabled', true);
                select.append(defaultOption);

                $.each(options, function(index, option) {
                    var newOption = new Option(option.fry_menu + ' - ' + option.kd_menu + ' - ' + option.nama_menu, option.kd_menu, false, false);
                    select.append(newOption);
                });

                select.select2({
                    placeholder: 'Pilih',
                    dropdownParent: $('#kd_menu_tambah2').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });

        $("#modal_otoritas_tambah2").modal('show')
    }
    //proses tambah
    $("#form_otoritas_tambah").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>otoritas/simpan_otoritas",
                data: $("#form_otoritas_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_otoritas_tambah").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Simpan Data Berhasil', 'Berhasil')
                        $('#tabel_otoritas').DataTable().ajax.reload();
                    } else {

                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    //proses tambah child
    $("#form_otoritas_tambah2").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>otoritas/simpan_child",
                data: $("#form_otoritas_tambah2").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_otoritas_tambah2").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Simpan Data Berhasil', 'Berhasil')
                        $('#tabel_otoritas').DataTable().ajax.reload();
                    } else {

                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    //proses edit
    $("#form_otoritas_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>otoritas/edit_otoritas",
                data: $("#form_otoritas_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_otoritas_edit").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Data Berhasil', 'Berhasil')
                        $('#tabel_otoritas').DataTable().ajax.reload();
                    } else {

                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
</script>

<?= $this->endSection(); ?>