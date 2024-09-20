<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pemroses</h2>

        <!-- <strong>Data Tables</strong> -->

    </div>
    <div class="col-lg-2 text-right">
        <br>
        <button id="tambah_pemroses" class="btn-primary btn" onclick="tambah_pemroses()"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah Data</span></button>
        <!-- <br>
        <a href="<?= base_url(); ?>home/tambah-users" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah User</span></a> -->
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
                        <table id="tabel_pemroses" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <th>Koordinator Pemasar</th>
                                    <th>Kepala Cabang</th>
                                    <th>Kepala Bagian</th>
                                    <th>Kepala Divisi</th>
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
<div id="modal_pemroses_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--            <div class="modal-header" style="padding:10px">
                            <h7 class="modal-title">Input Skoring</h7>
                        </div>-->
            <form id="form_pemroses_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Pemroses</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Unit Kerja</label>
                        <div class="col-lg-4">
                            <select class="form-control select" id="unit_kerja_tambah" name="unit_kerja_tambah" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>
                        <label class="col-lg-2 control-label">Koordinator Pemasar</label>
                        <div class="col-lg-4">
                            <input id="koordinator_pemasar_tambah" name="koordinator_pemasar_tambah" type="text" placeholder="" class="form-control" required>

                        </div>


                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Kepala Cabang</label>
                        <div class="col-lg-4">
                            <input id="kepala_cabang_tambah" name="kepala_cabang_tambah" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Kepala Bagian</label>
                        <div class="col-lg-4">
                            <input id="kepala_bagian_tambah" name="kepala_bagian_tambah" type="text" placeholder="" class="form-control" required>
                        </div>



                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Kepala Divisi</label>
                        <div class="col-lg-4">
                            <input id="kepala_divisi_tambah" name="kepala_divisi_tambah" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="status_tambah" name="status_tambah">
                                <option value="" selected="" disabled="">pilih</option>
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
<div id="modal_pemroses_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form id="form_pemroses_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Pemroses</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Unit Kerja</label>
                        <div class="col-lg-4">
                            <input id="kd_proses_edit" name="kd_proses_edit" type="hidden" placeholder="" class="form-control" required>
                            <select class="form-control select" id="unit_kerja_edit" name="unit_kerja_edit" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>
                        <label class="col-lg-2 control-label">Koordinator Pemasar</label>
                        <div class="col-lg-4">
                            <input id="koordinator_pemasar_edit" name="koordinator_pemasar_edit" type="text" placeholder="" class="form-control" required>

                        </div>


                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Kepala Cabang</label>
                        <div class="col-lg-4">
                            <input id="kepala_cabang_edit" name="kepala_cabang_edit" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Kepala Bagian</label>
                        <div class="col-lg-4">
                            <input id="kepala_bagian_edit" name="kepala_bagian_edit" type="text" placeholder="" class="form-control" required>
                        </div>



                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Kepala Divisi</label>
                        <div class="col-lg-4">
                            <input id="kepala_divisi_edit" name="kepala_divisi_edit" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="status_edit" name="status_edit">
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

<div id="modal_pemroses_detail" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Detail Pemroses</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <!-- <div class="ibox-content" style="height: 400px"> -->
                                    <h2 class="text-center">Detail Pemroses <span id="unit_kerja_detail"></span></h2>
                                    <!-- <p>
                                        Berikut adalah detail permohonan e-form dari <div id="nama_nasabah_detail"></div>
                                    </p> -->

                                    <div class="clients-list">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-university"></i> Detail Pemroses</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>

                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Kerja</td>
                                                                    <td id="dunit_kerja"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Induk Unit Kerja</td>
                                                                    <td id="dkd_induk_unit"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Koordinator Pemasar</td>
                                                                    <td id="dkoordinator_pemasar"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kepala Cabang</td>
                                                                    <td id="dkepala_cabang"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kepala Bagian</td>
                                                                    <td id="dkepala_bagian"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kepala Divisi</td>
                                                                    <td id="dkepala_divisi"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Status</td>
                                                                    <td id="dstatus"></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td class="font-weight-bold">Pengubah</td>
                                                                    <td id="dpengubah"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Terakhir Diubah</td>
                                                                    <td id="dwaktu_pengubah"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Kerja Pengubah</td>
                                                                    <td id="dkd_unit_pengubah"></td>
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

        var table = $('#tabel_pemroses').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>pemroses/tabel_pemroses",
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
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 0, 2, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Data Pemroses',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 0, 3, 4, 5, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Data Pemroses',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5] // kolom 1, da akan di-export
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
        $('#tabel_pemroses tbody ').on('click', '#edit_pemroses', function() {

            document.getElementById("form_pemroses_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_pemroses_edit").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>pemroses/get_tabel_pemroses_by_id/" + data[7],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#kd_proses_edit').val(data.kd_proses);
                    // $('#unit_kerja_edit').val(data.unit_kerja);
                    $('#koordinator_pemasar_edit').val(data.koordinator_pemasar);
                    $('#kepala_cabang_edit').val(data.kepala_cabang);
                    $('#kepala_bagian_edit').val(data.kepala_bagian);
                    $('#kepala_divisi_edit').val(data.kepala_divisi);
                    $('#status_edit').val(data.status);


                    var kd_unit = data.unit_kerja;
                    console.log(kd_unit);

                    $.ajax({
                        url: "<?php echo base_url('unit_kerja/get_unit'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.unit;
                            var select = $('#unit_kerja_edit');

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
                                dropdownParent: $('#unit_kerja_edit').parent()
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

        $('#tabel_pemroses tbody ').on('click', '#detail_pemroses', function() {
            // newx_702 = 1;
            // document.getElementById("form_pemroses_hapus").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_pemroses_detail").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>pemroses/get_tabel_pemroses_by_id/" + data[7],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#unit_kerja_detail').html(data.nama_unit);
                    $('#dunit_kerja').html(data.nama_unit);
                    $('#dkd_induk_unit').html(data.kd_induk_unit_label);
                    $('#dkoordinator_pemasar').html(data.koordinator_pemasar);
                    $('#dkepala_cabang').html(data.kepala_cabang);
                    $('#dkepala_bagian').html(data.kepala_bagian);
                    $('#dkepala_divisi').html(data.kepala_divisi);
                    $('#dstatus').html(data.status_label);
                    $('#dpengubah').html(data.pengubah);
                    $('#dwaktu_pengubah').html(data.waktu_pengubah_label);
                    $('#dkd_unit_pengubah').html(data.kd_unit_kerja_label);
                    

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru

        });

    });


    function tambah_pemroses() {
        document.getElementById("form_pemroses_tambah").reset();

        $.ajax({
            url: "<?php echo base_url('unit_kerja/get_unit'); ?>",
            type: "get",
            dataType: "JSON",
            // data: {
            //     search: $('#searchInput').val()
            // },
            success: function(data) {
                var options = data.unit;
                var select = $('#unit_kerja_tambah');

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
                    dropdownParent: $('#unit_kerja_tambah').parent()
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });

        $("#modal_pemroses_tambah").modal('show')
    }
    //proses tambah
    $("#form_pemroses_tambah").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>pemroses/simpan_pemroses",
                data: $("#form_pemroses_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_pemroses_tambah").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Simpan Data Berhasil', 'Berhasil')
                        $('#tabel_pemroses').DataTable().ajax.reload();
                    } else {

                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    //proses edit
    $("#form_pemroses_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>pemroses/edit_pemroses",
                data: $("#form_pemroses_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_pemroses_edit").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Data Berhasil', 'Berhasil')
                        $('#tabel_pemroses').DataTable().ajax.reload();
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