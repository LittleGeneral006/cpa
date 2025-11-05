<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Penarikan Kredit Transaksional</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <button type="button" class="btn blue-bg" onclick="tambah_penarikan()">
            <i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah Data</span>
        </button>
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
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Termin</th>
                                    <th>Jumlah Penarikan</th>
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
            <form id="form_penarikan_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Data</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama Nasabah :</label>
                        <div class="col-lg-10">
                            <select id="nama_nasabah_tambah" name="nama_nasabah_tambah" class="form-control select" required>
                                <option value="" selected disabled>Pilih Nasabah</option>
                                <!-- opsi akan di-generate/diisi lewat jQuery -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Cabang :</label>
                        <div class="col-lg-10">
                            <!-- field tampil untuk user (readonly), value sebenarnya dikirim lewat input hidden -->
                            <input id="cabang_tambah_display" type="text" class="form-control" placeholder="Cabang otomatis terisi" readonly>
                            <input id="cabang_tambah" name="cabang_tambah" type="hidden">
                        </div>
                    </div>
                </div>

                <div id="92_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btns_92" class="btn btn-sm btn-primary" type="submit" value="Simpan">
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

                // {
                //     "targets": 9,
                //     "width": "15%"
                // },

            ],
            "aoColumns": [
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
                    "title": 'Penarikan Kredit Transaksional',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 3, 4, 5, 6, 7, 8, dan 6, 7, 8 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Penarikan Kredit Transaksional',
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

    });


    function tambah_penarikan() {
        document.getElementById("form_penarikan_tambah").reset();

        $("#modal_penarikan_tambah").modal('show')
    }
    //proses tambah
    // $("#form_penarikan_tambah").validate({
    //     submitHandler: function(form) {
    //         $('#mohon').show()
    //         $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url() ?>unit_kerja/simpan_penarikan",
    //             data: $("#form_penarikan_tambah").serialize(),
    //             success: function(d) {
    //                 if (d == '1') {
    //                     $("#modal_penarikan_tambah").modal('hide')
    //                     $('#mohon').hide()
    //                     toastr.success('Simpan Data Berhasil', 'Berhasil')
    //                     $('#tabel_penarikan').DataTable().ajax.reload();
    //                 } else {

    //                     toastr.warning(d, 'Gagal')
    //                     $('#mohon').hide()
    //                 }
    //             }
    //         })
    //     }
    // });
    //proses edit
    // $("#form_penarikan_edit").validate({
    //     submitHandler: function(form) {
    //         $('#mohon').show()
    //         $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url() ?>unit_kerja/edit_penarikan",
    //             data: $("#form_penarikan_edit").serialize(),
    //             success: function(d) {
    //                 if (d == '1') {
    //                     $("#modal_penarikan_edit").modal('hide')
    //                     $('#mohon').hide()
    //                     toastr.success('Edit Data Berhasil', 'Berhasil')
    //                     $('#tabel_penarikan').DataTable().ajax.reload();
    //                 } else {

    //                     toastr.warning(d, 'Gagal')
    //                     $('#mohon').hide()
    //                 }
    //             }
    //         })
    //     }
    // });
    $(document).ready(function () {
    // 1️⃣ Ambil data nasabah dari server
        $.ajax({
            url:
            "<?php echo base_url() ?>ajax-penarikan-kredit-transaksional/get_nasabah_by_unit",
            type: "GET",
            dataType: "json",
            success: function (data) {
            let select = $("#nama_nasabah_tambah");
            select
                .empty()
                .append('<option value="" disabled selected>Pilih Nasabah</option>');

            // Tambahkan opsi
            data.forEach(function (row) {
                // gunakan data-* untuk menyimpan cabang di option
                select.append(
                `<option value="${row.kd_data}" data-cabang="${row.kd_unit_kerja}">${row.nama_debitur} - ${row.kd_unit_kerja}</option>`
                );
            });
            },
            error: function (xhr, status, error) {
            console.error("Gagal memuat daftar nasabah:", error);
            },
        });

        // 2️⃣ Saat user memilih nasabah
        $("#nama_nasabah_tambah").on("change", function () {
            let cabang = $(this).find(":selected").data("cabang") || "";
            $("#cabang_tambah_display").val(cabang);
            $("#cabang_tambah").val(cabang);
        });
        $("#form_penarikan_tambah").on("submit", function (e) {
    e.preventDefault();

    const $opt = $("#nama_nasabah_tambah").find(":selected");
    if (!$opt.val()) {
      alert("Silakan pilih nasabah terlebih dahulu");
      return;
    }

    const kd_data = $opt.val(); // value option = kd_data
    const kd_unit_kerja = $opt.data("cabang") || $("#cabang_tambah").val() || "";
    // nama diambil dari teks option sebelum " - "
    const txt = ($opt.text() || "").trim();
    const nama = txt.split(" - ")[0] || txt;

    // Kirim ke server
    $.ajax({
      url: "<?= base_url('ajax-penarikan-kredit-transaksional/penarikan_simpan') ?>",
      type: "POST",
      dataType: "json",
      data: {
        kd_data: kd_data,
        nama: nama,
        kd_unit_kerja: kd_unit_kerja
      },
      beforeSend: function () {
        $("#btns_92").prop("disabled", true).val("Menyimpan...");
      },
      success: function (res) {
        $("#btns_92").prop("disabled", false).val("Simpan");

        if (res && res.status === "ok") {
          // Tutup modal & refresh tabel/halaman sesuai kebutuhan
          $("#modal_penarikan_tambah").modal("hide");
          // TODO: reload datatable / location.reload() / panggil fungsi refresh grid
          // location.reload();
          alert("Berhasil membuat baris penarikan sebanyak " + res.jumlah_termin + " termin.");
        } else {
          alert(res.message || "Gagal menyimpan.");
        }
      },
      error: function () {
        $("#btns_92").prop("disabled", false).val("Simpan");
        alert("Koneksi gagal. Coba lagi.");
      }
    });
  });
    });
</script>

<?= $this->endSection(); ?>