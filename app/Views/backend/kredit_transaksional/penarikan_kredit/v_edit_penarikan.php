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
                    <input id="pilih_termin" name="pilih_termin" type="text" placeholder="Masukkan Termin" class="form-control">
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
    // function tambahInput() {
    //     var jumlah = document.getElementById("jumlah_agunan").value;
    //     var inputAgunan = document.getElementById("input_agunan");
    //     inputAgunan.innerHTML = ''; // Reset inputan

    //     for (var i = 0; i < jumlah; i++) {
    //         // Buat row baru setiap dua input
    //         if (i % 2 === 0) {
    //             var row = document.createElement("div");
    //             row.classList.add("row");
    //             row.classList.add("form-group");
    //         }

    //         // Buat kolom untuk input
    //         var col = document.createElement("div");
    //         col.classList.add("col-lg-6"); // Setiap input akan mengambil setengah lebar kolom

    //         var enter = document.createElement("div");
    //         enter.classList.add("col-lg-12"); // Setiap input akan mengambil setengah lebar kolom

    //         var input = document.createElement("input");
    //         input.type = "text";
    //         input.name = "jenis_agunan[]";
    //         input.classList.add("form-control"); // Tambah class "form_control"
    //         input.placeholder = "Jenis Agunan " + (i + 1);

    //         enter.appendChild(input);
    //         col.appendChild(enter);
    //         // Tambah kolom ke dalam row
    //         row.appendChild(col);

    //         // Jika sudah mencapai dua input atau ini adalah input terakhir, tambahkan row ke inputAgunan
    //         if ((i + 1) % 2 === 0 || (i + 1) === jumlah) {
    //             inputAgunan.appendChild(row);
    //         }
    //     }
    //     resizeJquerySteps();
    // }

    // $(document).ready(function() {
    //     var kd_data = $("#kd_data").val(); // ambil dari hidden input
    //     console.log(kd_data);

    //     $("#wizard").steps();
    //     $("#form").steps({
    //         bodyTag: "fieldset",
    //         enableAllSteps: true,
    //         onInit: function(event, currentIndex) {
    //             resizeJquerySteps();
    //         },
    //         onStepChanging: function(event, currentIndex, newIndex) {
    //             // Allow moving between steps without validation
    //             resizeJquerySteps();
    //             if (currentIndex > newIndex) {
    //                 return true;
    //             }
    //             var form = $(this);

    //             // Clean up if user went backward before
    //             if (currentIndex < newIndex) {
    //                 // To remove error styles
    //                 $(".body:eq(" + newIndex + ") label.error", form).remove();
    //                 $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
    //             }
    //             // Disable validation on fields that are disabled or hidden.
    //             form.validate().settings.ignore = ":disabled,:hidden";
    //             // Start validation; Prevent going forward if false
    //             return form.valid();
    //         },
    //         onStepChanged: function(event, currentIndex, priorIndex) {
    //             resizeJquerySteps();
    //             // Suppress (skip) "Warning" step if the user is old enough.
    //         },
    //         onFinishing: function(event, currentIndex) {
    //             // Do not block finishing; allow proceeding to submit
    //             return true;
    //         },
    //         // onFinished: function(event, currentIndex) {
    //         //     var form = $(this);

    //         //     // Submit form input
    //         //     form.submit();
    //         // }
    //         onFinished: function(event, currentIndex) {
    //             var form = $(this);

    //             // Serialize form data
    //             var formData = form.serialize();
    //             // console.log(formData)
    //             $('#mohon').show()
    //             // Send AJAX request to CodeIgniter 4 controller method
    //             $.ajax({
    //                 url: "<?php echo base_url() ?>home/simpan_permohonan",
    //                 type: "POST",
    //                 data: formData,
    //                 success: function(data) {
    //                     // Handle successful response
    //                     // console.log(data)
    //                     if (data == 1) {
    //                         $('#mohon').hide()
    //                         alert('Data Berhasil Disimpan')
    //                         // toastr.success('Data Berhasil Disimpan', 'Berhasil');
    //                         window.location.href = "<?php echo base_url() ?>home/e-form";
    //                     } else {
    //                         // alert(data)
    //                         $('#mohon').hide()
    //                         toastr.warning(data, 'Data Gagal Disimpan');
    //                     }
    //                 },
    //                 error: function(xhr, status, error) {
    //                     // Handle error response
    //                     // console.log(error)
    //                 }
    //             });

    //             return true;
    //         },

    //     });


    // });
//    $(document).ready(function () {
//     var kd_data = $("#kd_data").val();
//     console.log("KD DATA:", kd_data);

//     $("#wizard").steps();

//     $("#form").steps({
//         bodyTag: "fieldset",
//         enableAllSteps: true,
//         labels: {
//             current: "Langkah sekarang:",
//             finish: "Selesai",
//             next: "Berikutnya",
//             previous: "Sebelumnya",
//             loading: "Memuat..."
//         },
//         onInit: function () {
//             resizeJquerySteps();

//             // Tambahkan tombol "Simpan Sementara" di antara tombol Previous dan Next
//             setTimeout(function () {
//                 var actions = $(".actions ul");
//                 if ($("#btn-save-step").length === 0) {
//                     $('<li><a href="#" id="btn-save-step" role="menuitem" class="btn btn-warning">Simpan Sementara</a></li>')
//                         .insertAfter(actions.find("li:first-child"));
//                 }
//             }, 200);

//             // Event klik tombol simpan
//             $(document).on("click", "#btn-save-step", function (e) {
//                 e.preventDefault();
//                 saveStepProgress();
//             });
//         },
//         onStepChanging: function (event, currentIndex, newIndex) {
//             resizeJquerySteps();
//             if (currentIndex > newIndex) return true;

//             var form = $(this);
//             form.validate().settings.ignore = ":disabled,:hidden";
//             return form.valid();
//         },
//         onStepChanged: function () {
//             resizeJquerySteps();
//         },
//         onFinishing: function () {
//             return true;
//         },
//         onFinished: function () {
//             var form = $(this);
//             var formData = form.serialize();

//             $("#mohon").show();
//             $.ajax({
//                 url: "<?php echo base_url('home/simpan_permohonan') ?>",
//                 type: "POST",
//                 data: formData,
//                 success: function (data) {
//                     $("#mohon").hide();
//                     if (data == 1) {
//                         alert("Data Berhasil Disimpan");
//                         window.location.href = "<?php echo base_url('home/e-form') ?>";
//                     } else {
//                         toastr.warning(data, "Data Gagal Disimpan");
//                     }
//                 },
//                 error: function () {
//                     $("#mohon").hide();
//                     toastr.error("Terjadi kesalahan koneksi");
//                 },
//             });
//             return true;
//         },
//     });

//     // === FUNGSI SIMPAN PROGRESS PER FIELDSET ===
//     function saveStepProgress() {
//         var currentIndex = $("#form").steps("getCurrentIndex");
//         var currentFieldset = $("fieldset").eq(currentIndex);
//         var kd_data = $("#kd_data").val();

//         // Mapping tabel berdasarkan step
//         let tableMap = {
//             0: "tb_data_entry",
//             1: "tb_fcr",
//             2: "tb_upload_berkas" // misal fieldset ke-3 berisi upload
//         };

//         var targetTable = tableMap[currentIndex] || "tb_data_entry";
//         console.log("Step ke:", currentIndex, "Tabel:", targetTable);

//         $("#mohon").show();

//         // === STEP 3: UPLOAD FILE ===
//         if (currentIndex === 2) {
//             let formData = new FormData();
//             formData.append("kd_data", kd_data);
//             formData.append("target_table", targetTable);

//             // ambil semua input file di fieldset
//             currentFieldset.find("input[type='file']").each(function () {
//                 if (this.files.length > 0) {
//                     formData.append($(this).attr("name"), this.files[0]);
//                 }
//             });

//             $.ajax({
//                 url: "<?php echo base_url('home/simpan_progress_file') ?>",
//                 type: "POST",
//                 data: formData,
//                 processData: false,
//                 contentType: false,
//                 success: function (data) {
//                     $("#mohon").hide();
//                     if (data == 1) {
//                         toastr.success("File berhasil diunggah dan disimpan!");
//                     } else {
//                         toastr.warning(data, "Gagal menyimpan file");
//                     }
//                 },
//                 error: function () {
//                     $("#mohon").hide();
//                     toastr.error("Koneksi gagal, coba lagi.");
//                 },
//             });
//         } 
//         // === STEP 1 & 2: TEXT DATA ===
//         else {
//             let inputs = currentFieldset.find(":input").serialize();
//             $.ajax({
//                 url: "<?php echo base_url('home/simpan_progress') ?>",
//                 type: "POST",
//                 data: inputs + "&kd_data=" + kd_data + "&target_table=" + targetTable,
//                 success: function (data) {
//                     $("#mohon").hide();
//                     if (data == 1) {
//                         toastr.success("Data langkah ini berhasil disimpan!");
//                     } else {
//                         toastr.warning(data, "Gagal menyimpan data");
//                     }
//                 },
//                 error: function () {
//                     $("#mohon").hide();
//                     toastr.error("Koneksi gagal, coba lagi.");
//                 },
//             });
//         }
//     }
// });
$(document).ready(function () {
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
        onInit: function () {
            resizeJquerySteps();

            // Tambahkan tombol "Simpan Sementara" di antara tombol Previous dan Next
            setTimeout(function () {
                var actions = $(".actions ul");
                if ($("#btn-save-step").length === 0) {
                    $('<li><a href="#" id="btn-save-step" role="menuitem" class="btn btn-primary">Simpan Sementara</a></li>')
                        .insertAfter(actions.find("li:first-child"));
                }
            }, 200);

            // Event klik tombol simpan
            $(document).on("click", "#btn-save-step", function (e) {
                e.preventDefault();
                saveStepProgress();
            });
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            resizeJquerySteps();
            if (currentIndex > newIndex) return true;

            var form = $(this);
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function () {
            resizeJquerySteps();
        },
        onFinishing: function () {
            return true;
        },
        onFinished: function () {
            var form = $(this);
            var formData = form.serialize();

            $("#mohon").show();
            $.ajax({
                url: base_url+"ajax-penarikan-kredit-transaksional/simpan_permohonan",
                type: "POST",
                data: formData,
                success: function (data) {
                    $("#mohon").hide();
                    if (data == 1) {
                        alert("Data Berhasil Disimpan");
                        // window.location.href = base_url+"ajax-penarikan-kredit-transaksional/e-form";
                    } else {
                        toastr.warning(data, "Data Gagal Disimpan");
                    }
                },
                error: function () {
                    $("#mohon").hide();
                    toastr.error("Terjadi kesalahan koneksi");
                },
            });
            return true;
        },
    });

    // === FUNGSI SIMPAN PROGRESS PER FIELDSET ===
    function saveStepProgress() {
        var currentIndex = $("#form").steps("getCurrentIndex");
        var currentFieldset = $("fieldset").eq(currentIndex);
        var kd_data = $("#kd_data").val();

        // Mapping tabel berdasarkan step
        let tableMap = {
            0: "tb_data_entry",
            1: "tb_fcr",
            2: "tb_upload_berkas", // misal fieldset ke-3 berisi upload
            3: "tb_mpdkk" // misal fieldset ke-3 berisi upload
        };

        var targetTable = tableMap[currentIndex] || "tb_data_entry";
        console.log("Step ke:", currentIndex, "Tabel:", targetTable);

        $("#mohon").show();

        // === STEP 3: UPLOAD FILE ===
        if (currentIndex === 2) {
            let formData = new FormData();
            formData.append("kd_data", kd_data);
            formData.append("target_table", targetTable);

            // ambil semua input file di fieldset
            currentFieldset.find("input[type='file']").each(function () {
                if (this.files.length > 0) {
                    formData.append($(this).attr("name"), this.files[0]);
                }
            });

            $.ajax({
                url: base_url+"ajax-penarikan-kredit-transaksional/simpan_progress_file",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    $("#mohon").hide();
                    if (data == 1) {
                        toastr.success("File berhasil diunggah dan disimpan!");
                    } else {
                        toastr.warning(data, "Gagal menyimpan file");
                    }
                },
                error: function () {
                    $("#mohon").hide();
                    toastr.error("Koneksi gagal, coba lagi.");
                },
            });
        } 
        // === STEP 1 & 2: TEXT DATA ===
        else {
            let inputs = currentFieldset.find(":input").serialize();
            $.ajax({
                url: base_url+"ajax-penarikan-kredit-transaksional/simpan_progress",
                type: "POST",
                data: inputs + "&kd_data=" + kd_data + "&target_table=" + targetTable,
                success: function (data) {
                    $("#mohon").hide();
                    if (data == 1) {
                        toastr.success("Data langkah ini berhasil disimpan!");
                    } else {
                        toastr.warning(data, "Gagal menyimpan data");
                    }
                },
                error: function () {
                    $("#mohon").hide();
                    toastr.error("Koneksi gagal, coba lagi.");
                },
            });
        }
    }
});




</script>

<?= $this->endSection(); ?>



