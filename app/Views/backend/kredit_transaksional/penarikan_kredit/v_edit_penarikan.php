<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<link href="<?= base_url(); ?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?= base_url(); ?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Penarikan Kredit Transaksional</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <!-- <h5>Basic Data Tables example with responsive plugin</h5> -->
                    <label for="pilih_termin">Penarikan Ke:</label>
                    <input id="pilih_termin" name="pilih_termin" type="text" placeholder="Masukkan Termin"
                        class="form-control" value="<?= esc($termin) ?>">
                </div>
                <div class="ibox-content">
                    <h2>
                        Form Penarikan Kredit Transaksional
                    </h2>
                    <p>
                        Silakan isi form di bawah ini untuk mengajukan permohonan penarikan Kredit transaksional
                        <br>
                        <!-- <span class="text-danger">* Wajib diisi</span> -->
                    </p>
                    <form id="form" action="#" class="wizard-big">
                        <?= csrf_field() ?>
                        <input type="hidden" id="kd_data" value="<?= esc($kd_data) ?>">
                        <input type="hidden" id="termin" value="<?= esc($termin) ?>">

                        <?php include 'v_data_induk.php'; ?>
                        <?php include 'v_fcr.php'; ?>
                        <?php include 'v_dok_checklist.php'; ?>
                        <?php include 'v_mpdkk.php'; ?>
                        <?php include 'v_recap.php'; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- Steps -->
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.min.js"></script>
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.fix.js"></script>
<script src="<?= base_url(); ?>public/assets/js/plugins/ckeditor/ckeditor.js"></script>

<!-- Jquery Validate -->
<script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js-manual/script_penarikan.js"></script>

<script>
    function tambahInput() {
        var jumlah = document.getElementById("jumlah_agunan").value;
        var inputAgunan = document.getElementById("input_agunan");
        inputAgunan.innerHTML = ''; // Reset inputan

        for (var i = 0; i < jumlah; i++) {
            var inputGroup = document.createElement("div");
            inputGroup.classList.add("input-group");
            inputGroup.classList.add("col-lg-12");

            var input = document.createElement("input");
            input.type = "text";
            input.name = "jenis_agunan[]";
            input.classList.add("form-control"); // Tambah class "form_control"
            input.placeholder = "Jenis Agunan " + (i + 1);

            inputGroup.appendChild(input);
            inputAgunan.appendChild(inputGroup);
        }
        resizeJquerySteps();
    }

    $(document).ready(function() {
        var kd_data = $("#kd_data").val();
        console.log("KD DATA:", kd_data);

        $("#wizard").steps();

        $("#form").steps({
            bodyTag: "fieldset",
            enableAllSteps: true,
            labels: {
                current: "Langkah sekarang:",
                finish: "Selesai",
                next: "Berikutnya",
                previous: "Sebelumnya",
                loading: "Memuat..."
            },
            onInit: function() {
                resizeJquerySteps();

                // Tambahkan tombol "Simpan Sementara" di antara tombol Previous dan Next
                setTimeout(function() {
                    var actions = $(".actions ul");
                    if ($("#btn-save-step").length === 0) {
                        $('<li><a href="#" id="btn-save-step" role="menuitem" class="btn btn-primary">Simpan Sementara</a></li>')
                            .insertAfter(actions.find("li:first-child"));
                    }
                }, 200);

                // Event klik tombol simpan
                $(document).on("click", "#btn-save-step", function(e) {
                    e.preventDefault();
                    saveStepProgress();
                });
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                resizeJquerySteps();
                if (currentIndex > newIndex) return true;

                var form = $(this);
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                resizeJquerySteps();

                // Hitung index step terakhir (Recap)
                var lastIndex = $("#form").find("fieldset").length - 1;

                if (currentIndex === lastIndex) {
                    // baru panggil cek_rekap saat masuk ke tab Recap
                    cek_rekap();
                }
            },
            onFinishing: function(event, currentIndex) {
                // index step terakhir (Recap)
                var lastIndex = $("#form").find("fieldset").length - 1;

                // Validasi hanya ketika posisi di step Recap
                if (currentIndex === lastIndex) {

                    // 1) CEK RECAP: kalau masih ada Not Oke → TOLAK
                    var hasNotOke = $("#data_entry2:visible, #fcr2:visible, #dokumen_checklist2:visible, #mpdkk2:visible").length > 0;

                    if (hasNotOke) {
                        toastr.warning("Masih ada bagian yang berstatus 'Not Oke'. Silakan lengkapi dulu sebelum menyelesaikan.");
                        return false; // blok finish
                    }

                    // 2) CEK DISPOSISI SESUAI ROLE

                    var errors = [];

                    // Pemasar
                    if ($("#can_edit_pemasar").val() === "1") {
                        if (!$.trim($("#disposisi_sc").val())) {
                            errors.push("Disposisi / Rekomendasi Pemasar wajib diisi.");
                            $("#disposisi_sc").addClass("is-invalid");
                        } else {
                            $("#disposisi_sc").removeClass("is-invalid");
                        }
                    }

                    // Koordinator Pemasar
                    if ($("#can_edit_koor_pemasar").val() === "1") {
                        if (!$.trim($("#disposisi_koordinator_pemasar_sc").val())) {
                            errors.push("Disposisi / Rekomendasi Koordinator Pemasar wajib diisi.");
                            $("#disposisi_koordinator_pemasar_sc").addClass("is-invalid");
                        } else {
                            $("#disposisi_koordinator_pemasar_sc").removeClass("is-invalid");
                        }
                    }

                    // Kepala Cabang
                    if ($("#can_edit_kepala_cabang").val() === "1") {
                        if (!$.trim($("#disposisi_kepala_cabang_sc").val())) {
                            errors.push("Disposisi / Rekomendasi Kepala Cabang wajib diisi.");
                            $("#disposisi_kepala_cabang_sc").addClass("is-invalid");
                        } else {
                            $("#disposisi_kepala_cabang_sc").removeClass("is-invalid");
                        }
                    }

                    // Analis Kredit
                    if ($("#can_edit_analis_kredit").val() === "1") {
                        if (!$.trim($("#disposisi_analis_kredit_sc").val())) {
                            errors.push("Disposisi / Rekomendasi Analis Kredit wajib diisi.");
                            $("#disposisi_analis_kredit_sc").addClass("is-invalid");
                        } else {
                            $("#disposisi_analis_kredit_sc").removeClass("is-invalid");
                        }
                    }

                    // Kepala Bagian
                    if ($("#can_edit_kepala_bagian").val() === "1") {
                        if (!$.trim($("#disposisi_kepala_bagian_sc").val())) {
                            errors.push("Disposisi / Rekomendasi Kepala Bagian wajib diisi.");
                            $("#disposisi_kepala_bagian_sc").addClass("is-invalid");
                        } else {
                            $("#disposisi_kepala_bagian_sc").removeClass("is-invalid");
                        }
                    }

                    // Kepala Divisi
                    if ($("#can_edit_kepala_divisi").val() === "1") {
                        if (!$.trim($("#disposisi_kepala_divisi_sc").val())) {
                            errors.push("Disposisi / Rekomendasi Kepala Divisi wajib diisi.");
                            $("#disposisi_kepala_divisi_sc").addClass("is-invalid");
                        } else {
                            $("#disposisi_kepala_divisi_sc").removeClass("is-invalid");
                        }
                    }

                    if (errors.length > 0) {
                        toastr.warning(errors.join("<br>"));
                        return false; // blok finish
                    }
                }

                // kalau bukan di step terakhir, atau semua valid → boleh lanjut
                return true;
            },


            onFinished: function(event, currentIndex) {
                if (!confirm("Apakah Anda yakin ingin menyimpan data ini?")) {
                    return false; // CANCEL = stop, tidak kirim apa-apa
                }
                // di sini kita kirim permohonan final
                const kd_data = $("#kd_data").val();
                const termin = $("#termin").val();

                // jumlah penarikan ambil dari tab MPDKK
                const jumlah_penarikan = $("#jumlah_penarikan_disetujui_mpdkk").val();

                // tanggal penarikan, silakan sesuaikan ID-nya, contoh:
                const tanggal = $("#tanggal_penarikan").val() || $("#tanggal").val();

                const payload = {
                    kd_data: kd_data,
                    termin: termin,
                    jumlah_penarikan: jumlah_penarikan,
                    tanggal: tanggal,

                    // Disposisi summary
                    disposisi_pemasar: $("#disposisi_pemasar").val(),
                    disposisi_koor_pemasar: $("#disposisi_koor_pemasar").val(),
                    disposisi_kacab: $("#disposisi_kacab").val(),
                    disposisi_analis: $("#disposisi_analis").val(),
                    disposisi_kabag: $("#disposisi_kabag").val(),
                    disposisi_kadiv: $("#disposisi_kadiv").val(),
                };

                $.ajax({
                    url: base_url + "ajax-penarikan-kredit-transaksional/simpan_permohonan",
                    type: "POST",
                    dataType: "json",
                    data: payload,
                    beforeSend: function() {
                        $("#mohon").show();
                    },
                    success: function(res) {
                        $("#mohon").hide();

                        if (res && res.status === "ok") {
                            toastr.success(res.message || "Permohonan penarikan berhasil disimpan.");

                            // redirect ke list / detail, silakan sesuaikan
                            window.location.href = base_url + "penarikan-kredit-transaksional";
                        } else {
                            toastr.warning((res && res.message) || "Gagal menyimpan permohonan.");
                        }
                    },
                    error: function() {
                        $("#mohon").hide();
                        toastr.error("Koneksi gagal, coba lagi.");
                    },
                });

                // jangan submit form biasa
                return false;
            }


        });

        // === FUNGSI SIMPAN PROGRESS PER FIELDSET ===
        function saveStepProgress() {
            var currentIndex = $("#form").steps("getCurrentIndex");
            var currentFieldset = $("fieldset").eq(currentIndex);
            var kd_data = $("#kd_data").val();
            var termin = $("#termin").val();

            // Mapping tabel berdasarkan step
            let tableMap = {
                0: "tb_data_induk",
                1: "tb_fcr_penarikan",
                2: "tb_upload_berkas", // misal fieldset ke-3 berisi upload
                3: "tb_mpdkk" // misal fieldset ke-3 berisi upload
            };

            var targetTable = tableMap[currentIndex] || "tb_penarikan";
            console.log("Step ke:", currentIndex, "Tabel:", targetTable);

            $("#mohon").show();

            // === STEP 3: UPLOAD FILE ===
            if (currentIndex === 2) {
                const fd = new FormData();
                fd.append('kd_data', $('#kd_data').val());
                fd.append('termin', $('#termin').val()); // pastikan ada

                // input file (jika ada)
                if ($('#permohonan_penarikan')[0].files[0]) {
                    fd.append('permohonan_penarikan', $('#permohonan_penarikan')[0].files[0]);
                }
                if ($('#dokumen_kebutuhan_penarikan')[0].files[0]) {
                    fd.append('dokumen_kebutuhan_penarikan', $('#dokumen_kebutuhan_penarikan')[0].files[0]);
                }
                if ($('#dokumen_progres')[0].files[0]) {
                    fd.append('dokumen_progres', $('#dokumen_progres')[0].files[0]);
                }
                if ($('#dokumen_lainnya')[0].files[0]) {
                    fd.append('dokumen_lainnya', $('#dokumen_lainnya')[0].files[0]);
                }

                $.ajax({
                    url: base_url + 'ajax-penarikan-kredit-transaksional/simpan_progress_file',
                    method: 'POST',
                    data: fd,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $("#mohon").show(); // tampilkan spinner
                        $("#btns_92").prop("disabled", true).val("Mengunggah...");
                    },
                    success: function(res) {
                        if (res?.status === "ok") {
                            toastr.success(res.message || "Berhasil disimpan.");
                            refreshDokumenPenarikan();
                            resizeJquerySteps();
                            // ... refresh preview kalau perlu
                        } else {
                            toastr.warning(res?.message || "Gagal menyimpan dokumen.");
                        }
                    },
                    error: function() {
                        toastr.error("Koneksi gagal, coba lagi.");
                    },
                    complete: function() {
                        // <-- SELALU JALAN, apapun hasilnya
                        $("#mohon").hide(); // sembunyikan spinner
                        $("#btns_92").prop("disabled", false).val("Simpan");
                    }
                });

            }
            // === STEP 1 & 2: TEXT DATA ===
            else {
                try {
                    if (typeof CKEDITOR !== "undefined") {
                        if (CKEDITOR.instances["rencana_penggunaan_mpdkk"]) {
                            CKEDITOR.instances["rencana_penggunaan_mpdkk"].updateElement();
                        }
                        if (CKEDITOR.instances["lain_lain_mpdkk"]) {
                            CKEDITOR.instances["lain_lain_mpdkk"].updateElement();
                        }
                    }
                } catch (e) {
                    console.warn("Gagal sync CKEditor:", e);
                }
                let inputs = currentFieldset.find(":input").serialize();

                $.ajax({
                    url: base_url + "ajax-penarikan-kredit-transaksional/simpan_progress",
                    type: "POST",
                    dataType: "json",
                    data: inputs + "&kd_data=" + kd_data + "&target_table=" + targetTable + "&termin=" + termin,
                    success: function(res) {
                        $("#mohon").hide();
                        if (res && res.status === "ok") {
                            toastr.success(res.message || "Data langkah ini berhasil disimpan!");
                        } else {
                            toastr.warning((res && res.message) || "Gagal menyimpan data");
                            if (res.errors) {
                                if (res.errors.nomor) $('#nomor').addClass('is-invalid'), toastr.warning(res.errors.nomor);
                                if (res.errors.tanggal) $('#tanggal').addClass('is-invalid'), toastr.warning(res.errors.tanggal);
                            }
                        }
                    },
                    error: function() {
                        $("#mohon").hide();
                        toastr.error("Koneksi gagal, coba lagi.");

                    },
                });

            }
        }
    });
</script>

<?= $this->endSection(); ?>