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
                        <table id="tabel_penarikan"
                            class="table table-striped table-bordered table-hover dataTables-example">
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
<div id="modal_penarikan_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog"
    aria-hidden="true" style="z-index: -1;">
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
                            <select id="nama_nasabah_tambah" name="nama_nasabah_tambah" class="form-control select"
                                required>
                                <option value="" selected disabled>Pilih Nasabah</option>
                                <!-- opsi akan di-generate/diisi lewat jQuery -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Cabang :</label>
                        <div class="col-lg-10">
                            <!-- field tampil untuk user (readonly), value sebenarnya dikirim lewat input hidden -->
                            <input id="cabang_tambah_display" type="text" class="form-control"
                                placeholder="Cabang otomatis terisi" readonly>
                            <input id="cabang_tambah" name="cabang_tambah" type="hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <span id="informasi"></span>
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
<div id="modal_penarikan_generate" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog"
    aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h1 class="modal-title">Generate Dokumen</h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center text-danger">Cetak Dokumen Penarikan</h2>
                        <input type="hidden" id="id_generate">
                        <input type="hidden" id="termin_gen">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Proses</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Formulir Call Report (FCR)</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen"
                                            data-id="fcr_gen">Generate</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            <div id="921_fb" class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                <br>
                <br>
                <br>
                <br>
            </div>


        </div>
    </div>
</div>
<!-- history return -->
<div id="modal_return" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true"
    style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h1 class="modal-title">History Return</h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h2 class="text-center text-danger">History Return</h2> -->
                        <table id="tabel_return" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Direturn Oleh</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Posisi Progress</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Waktu</th>

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div id="921_fb" class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                <br>
                <br>
                <br>
                <br>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script>
    var table = [];
    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';


    $(document).ready(function () {

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
                "width": "15%",
                "render": function (data, type, row, meta) {
                    // Format angka ke Rupiah dengan dua desimal (sen)
                    if (type === 'display' || type === 'filter') {
                        if (!data) return 'Rp 0,00';
                        let number = parseFloat(data);
                        return 'Rp ' + number.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    }
                    return data;
                }
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
                "customize": function (win) {
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
        $(".generate-dokumen").on("click", function () {
            var id_dok = $(this).data('id');
            var termin = $(this).data('termin');
            generateDok(id_dok,termin)
            // Lakukan sesuatu dengan nilai data-id yang telah diambil
            // console.log('Nilai data-id:', data_id);
        });

    });
    function generate_dok(kd_data,termin) {
        $('#modal_penarikan_generate').modal('show');
        $('#id_generate').val(CryptoJS.SHA1(kd_data));
        $('#termin_gen').val(termin);
        // alert(kd_data)

    }
    function generateDok(param,termin) {
        // Ambil nilai kd_data dari $data_entry
        var id_dok = CryptoJS.SHA1(param);
        // alert(id_dok)
        var kd_data = $('#id_generate').val()
        var termin = $('#termin_gen').val()

        console.log("okokokok:", kd_data);

        // Bangun URL dengan base_url dan kd_data
        var url = "<?php echo base_url() ?>penarikan/generate-dokumen/" + kd_data + "/" + id_dok + "/" + termin;

        // Buka tautan dalam tab baru
        window.open(url, '_blank');
    }


    function tambah_penarikan() {
        document.getElementById("form_penarikan_tambah").reset();

        $("#modal_penarikan_tambah").modal('show')
    }

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

            const kd_data = $(this).val();
            if (!kd_data) return;

            $.ajax({
                url: "<?php echo base_url() ?>ajax-penarikan-kredit-transaksional/get_plafond_penarikan",
                type: "GET",
                dataType: "json",
                data: { kd_data: kd_data },
                success: function (res) {
                    if (res.status === "ok") {

                        const sisa = res.sisa_plafond;
                        const sisaFormatted = res.sisa_plafond_rp;
                        const total_penarikan = res.total_penarikan;
                        const plafond_total = res.plafond_total;
                        console.log("sisa plafon:", sisa);
                        console.log("sisa plafon formatted:", sisaFormatted);
                        console.log("total penarikan:", total_penarikan);
                        console.log("plafond total:", plafond_total);

                        let narasi = "";

                        if (sisa > 0) {
                            narasi = `<span class="badge bg-success">
                                Batas penarikan adalah <strong>Rp ${sisaFormatted}</strong> dari sisa plafon.
                              </span>`;
                        } else {
                            narasi = `<span class="badge bg-warning">
                                Sisa plafon sudah habis.
                              </span>`;
                        }

                        $("#informasi").html(narasi);

                    } else {
                        $("#informasi").html(`<span class="badge bg-danger">${res.message}</span>`);
                    }
                },
                error: function () {
                    $("#informasi").html(`<span class="badge bg-danger">Gagal mengambil data plafon.</span>`);
                }
            });

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
                        $("#modal_penarikan_tambah").modal("hide");

                        const msg = res.message
                            || ("Berhasil menambahkan termin ke-" + res.next_termin + ".");
                        alert(msg);

                        // TODO: refresh datatable / reload grid
                        // location.reload();
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