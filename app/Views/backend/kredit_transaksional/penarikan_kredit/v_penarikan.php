<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>penarikan Kredit Transaksional</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <a href="<?= base_url(); ?>tambah-penarikan-kredit-transaksional" class="btn blue-bg"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah Data</span></a>
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
                        <table id="tabel_penarikan" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->
                                    <th>Nomor Aplikasi Kredit</th>
                                    <th>Tanggal Isi Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Posisi Progress</th>
                                    <th>Progress</th>
                                    <th>Scoring</th>
                                    <th>SLA</th>
                                    <th>Unit Kerja</th>
                                    <th>Status</th>
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
<div id="modal_penarikan_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--            <div class="modal-header" style="padding:10px">
                            <h7 class="modal-title">Input Skoring</h7>
                        </div>-->
            <form id="form_penarikan_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Unit Kerja</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Kode Unit :</label>
                        <div class="col-lg-4">
                            <input id="kd_penarikan_tambah" name="kd_penarikan_tambah" type="number" placeholder="" class="form-control" required>
                            <!-- <input id="921_iduser" style="display:none" name="921_iduser" type="text" placeholder="" class="form-control"> -->
                        </div>
                        <label class="col-lg-2 control-label">Kode Induk :</label>
                        <div class="col-lg-4">
                            <select class="form-control select" id="kd_induk_penarikan_tambah" name="kd_induk_penarikan_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>


                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama Unit :</label>
                        <div class="col-lg-4">
                            <input id="nama_penarikan_tambah" name="nama_penarikan_tambah" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Alamat Unit :</label>
                        <div class="col-lg-4">

                            <textarea class="form-control" id="alamat_penarikan_tambah" name="alamat_penarikan_tambah" rows="3"></textarea>

                        </div>



                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">No Telepon :</label>
                        <div class="col-lg-4">
                            <input id="telpon_penarikan_tambah" name="telpon_penarikan_tambah" type="number" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Status :</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="aktif_penarikan_tambah" name="aktif_penarikan_tambah">
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
<div id="modal_penarikan_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--            <div class="modal-header" style="padding:10px">
                            <h7 class="modal-title">Input Skoring</h7>
                        </div>-->
            <form id="form_penarikan_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Unit Kerja</h1>
                    </div>
                    <br>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Kode Induk :</label>
                        <div class="col-lg-4">
                            <input id="kd_penarikan_edit" style="display:none" name="kd_penarikan_edit" type="text" placeholder="" class="form-control">
                            <select class="form-control select" id="kd_induk_penarikan_edit" name="kd_induk_penarikan_edit" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>
                        <label class="col-lg-2 control-label">Nama Unit :</label>
                        <div class="col-lg-4">
                            <input id="nama_penarikan_edit" name="nama_penarikan_edit" type="text" placeholder="" class="form-control" required>

                        </div>


                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Alamat Unit :</label>
                        <div class="col-lg-4">

                            <textarea class="form-control" id="alamat_penarikan_edit" name="alamat_penarikan_edit" rows="3"></textarea>

                        </div>
                        <label class="col-lg-2 control-label">No Telepon :</label>
                        <div class="col-lg-4">
                            <input id="telpon_penarikan_edit" name="telpon_penarikan_edit" type="text" placeholder="" class="form-control" required>

                        </div>



                    </div>
                    <div class="form-group row">


                        <label class="col-lg-2 control-label">Status :</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="aktif_penarikan_edit" name="aktif_penarikan_edit">
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

<div id="modal_penarikan_detail" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Unit Kerja</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <!-- <div class="ibox-content" style="height: 400px"> -->
                                    <h2 class="text-center">Detail Unit kerja <span id="nama_penarikan_detail"></span></h2>
                                    <!-- <p>
                                        Berikut adalah detail permohonan e-form dari <div id="nama_nasabah_detail"></div>
                                    </p> -->

                                    <div class="clients-list">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-university"></i> Unit Kerja</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>

                                                                <tr>
                                                                    <td class="font-weight-bold">Kode Unit</td>
                                                                    <td id="dkd_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kode Induk Unit</td>
                                                                    <td id="dkd_induk_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama Unit</td>
                                                                    <td id="dnama_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Alamat Unit</td>
                                                                    <td id="dalamat_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Telepon Unit</td>
                                                                    <td id="dtelpon_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Status</td>
                                                                    <td id="daktif_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Pembuat</td>
                                                                    <td id="dmaker_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Waktu Dibuat</td>
                                                                    <td id="dwaktu_maker_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pembuat</td>
                                                                    <td id="dkd_penarikan_maker_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Pengubah</td>
                                                                    <td id="dupdater_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Terakhir Diubah</td>
                                                                    <td id="dwaktu_updater_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pengubah</td>
                                                                    <td id="dkd_penarikan_updater_penarikan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Didaftarkan oleh Unit Kerja/ Induk</td>
                                                                    <td id="dkd_cab_penarikan"></td>
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

        var table = $('#tabel_penarikan').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>penarikan/tabel_penarikan",
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
                {
                    "targets": 8,
                    "width": "15%"
                },
                {
                    "targets": 9,
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
                null,
                null,
                {
                    "bSortable": false
                }
            ],
            "dom": '<"html5buttons"B>lTfgitp',
            "lengthMenu": [
                ['15', '25', '50', '100', '-1'],
                ['15', '25', '50', '100', 'All'],
			],
            "buttons": [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 1, dan 2 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 2, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'penarikan Kredit Transaksional',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 3, 4, 5, 6, 7, 8, dan 6, 7, 8 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'penarikan Kredit Transaksional',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 1, da akan di-export
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
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });
        $('#tabel_penarikan tbody ').on('click', '#edit_penarikan', function() {

            document.getElementById("form_penarikan_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_penarikan_edit").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>unit_kerja/get_tabel_penarikan_by_id/" + data[5],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#kd_penarikan_edit').val(data[5]);
                    // $('#kd_induk_penarikan_edit').val(data[6]);
                    $('#nama_penarikan_edit').val(data[7]);
                    $('#alamat_penarikan_edit').val(data[8]);
                    $('#telpon_penarikan_edit').val(data[9]);
                    $('#aktif_penarikan_edit').val(data[10]);

                    var kd_induk = data[6];
                    console.log(kd_induk);

                    $.ajax({
                        url: "<?php echo base_url('unit_kerja/get_penarikan_tanpa_konsolidasi'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.unit;
                            var select = $('#kd_induk_penarikan_edit');

                            select.empty();
                            // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                            var defaultOption = new Option('Pilih', '', true, true);
                            $(defaultOption).prop('disabled', true);
                            select.append(defaultOption);

                            $.each(options, function(index, option) {
                                var newOption = new Option(option.kd_penarikan + ' - ' + option.nama_penarikan, option.kd_penarikan, false, false);
                                if (option.kd_penarikan === kd_induk) {
                                    $(newOption).prop('selected', true);
                                }
                                select.append(newOption);
                            });

                            select.select2({
                                placeholder: 'Pilih',
                                dropdownParent: $('#kd_induk_penarikan_edit').parent()
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
        
        $('#tabel_penarikan tbody ').on('click', '#detail_penarikan', function() {
            // newx_702 = 1;
            // document.getElementById("form_penarikan_hapus").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_penarikan_detail").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>unit_kerja/get_tabel_penarikan_by_id/" + data[5],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#nama_penarikan_detail').html(data[7]);
                    $('#dkd_penarikan').html(data[5]);
                    $('#dkd_induk_penarikan').html(data[6]);
                    $('#dnama_penarikan').html(data[7]);
                    $('#dalamat_penarikan').html(data[8]);
                    $('#dtelpon_penarikan').html(data[9]);
                    $('#daktif_penarikan').html(data[18]);

                    $('#dmaker_penarikan').html(data[11]);
                    $('#dwaktu_maker_penarikan').html(data[12]);
                    $('#dkd_penarikan_maker_penarikan').html(data[13]);

                    $('#dupdater_penarikan').html(data[14]);
                    $('#dwaktu_updater_penarikan').html(data[15]);
                    $('#dkd_penarikan_updater_penarikan').html(data[16]);

                    $('#dkd_cab_penarikan').html(data[17]);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru

        });

    });


    function tambah_penarikan() {
        document.getElementById("form_penarikan_tambah").reset();

        $.ajax({
            url: "<?php echo base_url('unit_kerja/get_penarikan_tanpa_konsolidasi'); ?>",
            type: "get",
            dataType: "JSON",
            // data: {
            //     search: $('#searchInput').val()
            // },
            success: function(data) {
                var options = data.unit;
                var select = $('#kd_induk_penarikan_tambah');

                select.empty();
                // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                var defaultOption = new Option('Pilih', '', true, true);
                $(defaultOption).prop('disabled', true);
                select.append(defaultOption);

                $.each(options, function(index, option) {
                    var newOption = new Option(option.kd_penarikan + ' - ' + option.nama_penarikan, option.kd_penarikan, false, false);
                    select.append(newOption);
                });

                select.select2({
                    placeholder: 'Pilih',
                    dropdownParent: $('#kd_induk_penarikan_tambah').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });

        $("#modal_penarikan_tambah").modal('show')
    }
    //proses tambah
    $("#form_penarikan_tambah").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>unit_kerja/simpan_penarikan",
                data: $("#form_penarikan_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_penarikan_tambah").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Simpan Data Berhasil', 'Berhasil')
                        $('#tabel_penarikan').DataTable().ajax.reload();
                    } else {

                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    //proses edit
    $("#form_penarikan_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>unit_kerja/edit_penarikan",
                data: $("#form_penarikan_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_penarikan_edit").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Data Berhasil', 'Berhasil')
                        $('#tabel_penarikan').DataTable().ajax.reload();
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