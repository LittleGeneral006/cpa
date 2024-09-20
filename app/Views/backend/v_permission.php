<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Setup Permission</h2>
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <button id="tambah_permission" class="btn-primary btn" onclick="tambah_permission()"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah</span></button>
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
                        <table id="tabel_permission" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <th>Id Permission</th>
                                    <th>Kd Permission</th>
                                    <th>Nama</th>
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
<div id="modal_permission_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_permission_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Permission</h1>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Nama Permission :</label>
                        <div class="col-lg-12">
                            <input id="nama_permission_tambah" name="nama_permission_tambah" type="text" placeholder="" class="form-control" required>
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
<div id="modal_permission_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
           
            <form id="form_permission_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Permission</h1>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Nama Permission :</label>
                        <div class="col-lg-12">
                            <input id="kd_permission_edit" name="kd_permission_edit" type="hidden" placeholder="" class="form-control" required>
                            <input id="nama_permission_edit" name="nama_permission_edit" type="text" placeholder="" class="form-control" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Status Permission :</label>
                        <div class="col-lg-12">
                            <select class="form-control class-required select" required id="aktif_permission_edit" name="aktif_permission_edit">
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

        var table = $('#tabel_permission').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>permission/tabel_permission/",
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


            ],
            "aoColumns": [
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
                        "columns": [0, 1, 2, 3] // kolom 0, 1, dan 2, 3 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3] // kolom 0, 2, 3, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Daftar Permission',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3] // kolom 0, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Daftar Permission',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3] // kolom 1, da akan di-export
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
                        "columns": [0, 1, 2, 3] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });
        $('#tabel_permission tbody ').on('click', '#edit_permission', function() {

            document.getElementById("form_permission_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_permission_edit").modal('show')
            // console.log(data[1])

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>permission/get_tabel_permission_by_id/" + data[1],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response.data.permission.nama_permission)
                    var data = response.data.permission
                    $('#kd_permission_edit').val(data.kd_permission);
                    $('#nama_permission_edit').val(data.nama_permission);
                    $('#aktif_permission_edit').val(data.aktif_permission);
                    // $('#kd_unit_permission_edit').val(data[5]);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru

        });

    });

    function tambah_permission() {  
        document.getElementById("form_permission_tambah").reset();

        $("#modal_permission_tambah").modal('show')
    }
    //proses tambah
    $("#form_permission_tambah").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>permission/simpan_permission",
                data: $("#form_permission_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_permission_tambah").modal('hide')
                        toastr.success('Simpan Data Berhasil', 'Berhasil')
                        $('#tabel_permission').DataTable().ajax.reload();
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });
    //proses edit
    $("#form_permission_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>permission/edit_permission",
                data: $("#form_permission_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_permission_edit").modal('hide')
                        toastr.success('Edit Data Berhasil', 'Berhasil')
                        $('#tabel_permission').DataTable().ajax.reload();
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