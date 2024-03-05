<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Setup Level</h2>
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <button id="tambah_level" class="btn-primary btn" onclick="tambah_level()"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah Level</span></button>
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
                        <table id="tabel_level" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <th>Nama Level</th>
                                    <th>Status</th>
                                    <th>Unit Kerja</th>
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
<div id="modal_level_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_level_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Level</h1>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Nama Level :</label>
                        <div class="col-lg-12">
                            <input id="nama_level_tambah" name="nama_level_tambah" type="text" placeholder="" class="form-control" required>
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
<div id="modal_level_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
           
            <form id="form_level_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Level</h1>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Nama Level :</label>
                        <div class="col-lg-12">
                            <input id="nama_level_edit" name="nama_level_edit" type="text" placeholder="" class="form-control" required>
                            <input id="kd_level_edit" name="kd_level_edit" type="hidden" placeholder="" class="form-control" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Status Level :</label>
                        <div class="col-lg-12">
                            <select class="form-control class-required select" required id="status_level_edit" name="status_level_edit">
                                <option value="" disabled="">pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>

                            </select>

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Edit Unit Kerja :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" id="kd_unit_level_edit" name="kd_unit_level_edit" required>
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

<div id="modal_level_detail" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Detail Level</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <!-- <div class="ibox-content" style="height: 400px"> -->
                                    <h2 class="text-center">Detail Level <span id="nama_level_detail"></span></h2>
                                    <!-- <p>
                                        Berikut adalah detail permohonan e-form dari <div id="nama_nasabah_detail"></div>
                                    </p> -->

                                    <div class="clients-list">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-shield"></i> Data Level</a></li>
                                            <!-- <li><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-history"></i> History</a></li> -->
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>

                                                                <tr>
                                                                    <td class="font-weight-bold">Nama</td>
                                                                    <td id="dnama_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Status</td>
                                                                    <td id="daktif_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama Unit</td>
                                                                    <td id="dkd_unit"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Induk Unit</td>
                                                                    <td id="dkd_induk"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="font-weight-bold">Pembuat</td>
                                                                    <td id="dpembuat_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Waktu Dibuat</td>
                                                                    <td id="dtgl_pembuat_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pembuat</td>
                                                                    <td id="dkd_cab_pembuat_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Pengubah</td>
                                                                    <td id="dpengubah_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Terakhir Diubah</td>
                                                                    <td id="dtgl_pengubah_level"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pengubah</td>
                                                                    <td id="dkd_cab_pengubah_level"></td>
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

        var table = $('#tabel_level').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>level/tabel_level/",
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


            ],
            "aoColumns": [
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
                        "columns": [0, 1, 2] // kolom 0, 1, dan 2 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2] // kolom 0, 2, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Daftar Level Aplikasi',
                    "exportOptions": {
                        "columns": [0, 1, 2] // kolom 0, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Daftar Level Aplikasi',
                    "exportOptions": {
                        "columns": [0, 1, 2] // kolom 1, da akan di-export
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
                        "columns": [0, 1, 2] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });
        $('#tabel_level tbody ').on('click', '#edit_level', function() {

            document.getElementById("form_level_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_level_edit").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>level/get_tabel_level_by_id/" + data[4],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#kd_level_edit').val(data[4]);
                    $('#nama_level_edit').val(data[0]);
                    $('#status_level_edit').val(data[6]);
                    // $('#kd_unit_level_edit').val(data[5]);

                    var kd_unit = data[5];
                    console.log(kd_unit);

                    $.ajax({
                        url: "<?php echo base_url('unit_kerja/get_unit'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.unit;
                            var select = $('#kd_unit_level_edit');

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
                                dropdownParent: $('#kd_unit_level_edit').parent()
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

        $('#tabel_level tbody ').on('click', '#detail_level', function() {
            // newx_702 = 1;
            // document.getElementById("form_level_hapus").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_level_detail").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>level/get_tabel_level_by_id/" + data[4],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#dnama_level').html(data[0]);
                    $('#daktif_level').html(data[1]);
                    $('#nama_level_detail').html(data[0]);
                    $('#dkd_unit').html(data[2]);
                    $('#dkd_induk').html(data[8]);

                    $('#dpembuat_level').html(data[9]);
                    $('#dtgl_pembuat_level').html(data[10]);
                    $('#dkd_cab_pembuat_level').html(data[11]);

                    $('#dpengubah_level').html(data[12]);
                    $('#dtgl_pengubah_level').html(data[13]);
                    $('#dkd_cab_pengubah_level').html(data[14]);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru

        });

    });

    function tambah_level() {
        document.getElementById("form_level_tambah").reset();

        $("#modal_level_tambah").modal('show')
    }
    //proses tambah
    $("#form_level_tambah").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>level/simpan_level",
                data: $("#form_level_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_level_tambah").modal('hide')
                        toastr.success('Simpan Level Berhasil', 'Berhasil')
                        $('#tabel_level').DataTable().ajax.reload();
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });
    //proses edit
    $("#form_level_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>level/edit_level",
                data: $("#form_level_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_level_edit").modal('hide')
                        toastr.success('Edit Level Berhasil', 'Berhasil')
                        $('#tabel_level').DataTable().ajax.reload();
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