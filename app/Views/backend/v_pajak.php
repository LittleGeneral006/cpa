<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Setup PPN</h2>
    </div>
    <!-- <div class="col-lg-2 text-right">
        <br>
        <button id="tambah_permission" class="btn-primary btn" onclick="tambah_permission()"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah</span></button>
    </div> -->
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
                        <table id="table-pajak" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <!-- <th>Id</th> -->
                                    <th>Nama</th>
                                    <th>Persentase</th>
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
<!-- <div id="modal_pajak_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
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
</div> -->
<div id="modal_pajak_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_pajak_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Data</h1>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Nama Pajak :</label>
                        <div class="col-lg-12">
                            <input id="id_edit" name="id_edit" type="hidden" placeholder="" class="form-control" required>
                            <input id="nama_pajak_edit" name="nama_pajak_edit" type="text" placeholder="" class="form-control" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Persentase :</label>
                        <div class="col-lg-12">
                            <input id="persentase_pajak_edit" name="persentase_pajak_edit" type="text" placeholder="" class="form-control" required>
                        </div>
                    </div>


                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btn_simpan" class="btn btn-sm btn-primary" type="submit" value="Simpan">
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
    // var save_method;
    // var table = null;
    // // Upgrade button class name
    // $.fn.dataTable.Buttons.defaults.dom.button.className = "btn btn-white btn-sm";

    // $(document).ready(function() {
    //     // table = $('.dataTables-users').DataTable({
    //     table = $("#table-pajak").DataTable({
    //         processing: true,
    //         responsive: true,
    //         serverSide: true,
    //         ordering: true, // Set true agar bisa di sorting
    //         // order: [[2, "asc"]],
    //         // order: [],
    //         // // Load data for the table's content from an Ajax source
    //         ajax: {
    //             url: "pajak/table_pajak",
    //             type: "post",
    //         },
    //         columnDefs: [{
    //             className: "vertical-center",
    //             targets: "_all"
    //         }],
    //         deferRender: true,
    //         lengthMenu: [
    //             [10, 25, 50, 1000000],
    //             [10, 25, 50, "All"],
    //         ],
    //         columns: [{
    //                 data: "CARD_NUMBER",
    //             },
    //             {
    //                 data: "CARD_HOLDER",
    //             },
    //             {
    //                 data: "ACCOUNT_NUMBER",
    //             },
    //             {
    //                 data: "BRANCH_CODE",
    //             },
    //             {
    //                 data: "BRANCH_NAME",
    //             },
    //             {
    //                 data: "ISSUED_DATE",
    //             },
    //             {
    //                 data: "EXPIRED_DATE",
    //             },
    //             {
    //                 data: "LIMIT_PROFILE_CARD",
    //             },
    //             {
    //                 data: "STATUS_DESCRIPTION",
    //             },
    //             {
    //                 data: "STATUS_CODE",
    //             },
    //             {
    //                 data: "HARGA",
    //             },
    //         ],

    //         dom: '<"html5buttons"B>lTfgitp',
    //         buttons: [{
    //                 extend: "copy",
    //                 exportOptions: {
    //                     // columns: [0, 1, 2, 3, 4],
    //                 },
    //             },
    //             {
    //                 extend: "csv",
    //                 exportOptions: {
    //                     // columns: [0, 1, 2, 3, 4],
    //                 },
    //             },
    //             {
    //                 extend: "excel",
    //                 exportOptions: {
    //                     // columns: [0, 1, 2, 3, 4],
    //                 },
    //                 title: "Report",
    //             },
    //             {
    //                 extend: "pdf",
    //                 exportOptions: {
    //                     // columns: [0, 1, 2, 3, 4],
    //                 },
    //                 title: "Report",
    //             },

    //             {
    //                 extend: "print",
    //                 exportOptions: {
    //                     // columns: [0, 1, 2, 3, 4],
    //                 },
    //                 customize: function(win) {
    //                     $(win.document.body).addClass("white-bg");
    //                     $(win.document.body).css("font-size", "10px");

    //                     $(win.document.body)
    //                         .find("table")
    //                         .addClass("compact")
    //                         .css("font-size", "inherit");
    //                 },
    //             },
    //         ],
    //     });
    // });

    // function prosesMaster() {
    //     swal({
    //             title: "Proses?",
    //             text: "Proses",
    //             type: "warning",
    //             showCancelButton: true,
    //             cancelButtonText: "Batal",
    //             confirmButtonColor: "#DD6B55",
    //             confirmButtonText: "Iya",
    //             closeOnConfirm: false,
    //         },
    //         function(isConfirm) {
    //             if (isConfirm) {
    //                 $.ajax({
    //                     url: "atmMaster/proses",
    //                     type: "GET",
    //                     error: function() {
    //                         alert(url);
    //                     },
    //                     success: function(data) {
    //                         reload_table();
    //                         swal({
    //                             title: "Proses!",
    //                             text: " berhasil diproses.",
    //                             type: "error",
    //                             showConfirmButton: false,
    //                             timer: 1000,
    //                         });
    //                     },
    //                 });
    //             }
    //         }
    //     );
    // }

    var table = [];
    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

    $(document).ready(function() {

        var table = $('#table-pajak').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>pajak/tabel_pajak/",
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
                // {
                //     "targets": 4,
                //     "width": "15%"
                // },


            ],
            "aoColumns": [
                // null,
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
                    "title": 'Daftar Pajak',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3] // kolom 0, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Daftar Pajak',
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
        $('#table-pajak tbody ').on('click', '#edit_pajak', function() {

            document.getElementById("form_pajak_edit").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_pajak_edit").modal('show')
            console.log('testing');

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>pajak/get_data_by_id/" + data[4],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response.data.permission.nama_permission)
                    var data = response.data.pajak
                    $('#id_edit').val(data.ID);
                    $('#nama_pajak_edit').val(data.nama_pajak);
                    $('#persentase_pajak_edit').val(data.persentase_pajak);
                    // $('#kd_unit_permission_edit').val(data[5]);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru

        });

    });

    function reset_form() {
        document.getElementById("form_pajak_edit").reset();

        $("#modal_pajak_edit").modal('show')
    }
    //proses tambah
    $("#form_pajak").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>permission/edit_permission",
                data: $("#form_pajak").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_permission_edit").modal('hide')
                        toastr.success('Edit Data Berhasil', 'Berhasil')
                        $('#table_pajak').DataTable().ajax.reload();
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