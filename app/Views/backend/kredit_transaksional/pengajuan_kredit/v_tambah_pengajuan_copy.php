<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<link href="<?= base_url(); ?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?= base_url(); ?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pengajuan Kredit Transaksional</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <a href="<?= base_url(); ?>tambah-pengajuan-kredit-transaksional" class="btn blue-bg"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah Data</span></a>
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
                    <h2>
                        Form Pengajuan Kredit Transaksional
                    </h2>
                    <p>
                        Silakan isi form di bawah ini untuk mengajukan permohonan Kredit transaksional
                        <br>
                        <!-- <span class="text-danger">* Wajib diisi</span> -->
                    </p>
                    <form id="form" action="#" class="wizard-big">
                        <?= csrf_field() ?>
                        <h1>Data Entry</h1>
                        <fieldset>
                            <h2>Data Entry</h2>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Unit Kerja</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="unit_kerja" name="unit_kerja">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Pemasar</label>
                                        <div class="col-lg-12">
                                            <input id="pemasar" name="pemasar" type="text" placeholder="" class="form-control class-readonly">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Koordinator Pemasar</label>
                                    <div class="col-lg-12">
                                        <input id="koordinator_pemasar" name="koordinator_pemasar" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Cabang</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_cabang" name="kepala_cabang" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Bagian</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_bagian" name="kepala_bagian" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Divisi</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_divisi" name="kepala_divisi" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_debitur" name="nama_debitur" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Bidang Usaha</label>
                                    <div class="col-lg-12">
                                        <input id="bidang_usaha" name="bidang_usaha" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Direktur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_direktur" name="nama_direktur" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Key Person</label>
                                    <div class="col-lg-12">
                                        <input id="key_person" name="key_person" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Kantor</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Gudang/ Pabrik/ Workshop</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Group Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="group_debitur" name="group_debitur" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nama_proyek" name="nama_proyek" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nomor SPK/ SPPBJ/ Gunning/ Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="nomor_spk" name="nomor_spk" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal SPK/ SPPBJ/ Gunning/ Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_spk" name="tanggal_spk" type="date" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nilai Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nilai_proyek" name="nilai_proyek" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Proyek</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_proyek" name="alamat_proyek" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pemberi Kerja (Bouwheer)</label>
                                    <div class="col-lg-12">
                                        <input id="pemberi_kerja" name="pemberi_kerja" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Penandatangan Kontrak (Bouwheer)</label>
                                    <div class="col-lg-12">
                                        <input id="penandatangan_kontrak" name="penandatangan_kontrak" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Pemberi Kerja</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_pemberi" name="alamat_pemberi" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Upload Dokumen Kontrak Proyek</label>
                                    <div class="col-lg-12">
                                        <input type="file" class="form-control-file" name="upload_dokumen" id="upload_dokumen" accept=".pdf" required>
                                        <small class="form-text text-muted">File PDF, maksimal 2 MB</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal Permohonan</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_permohonan" name="tanggal_permohonan" type="date" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Plafond</label>
                                    <div class="col-lg-12">
                                        <input id="plafond" name="plafond" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tujuan Pengajuan</label>
                                    <div class="col-lg-12">
                                        <input id="tujuan_pengajuan" name="tujuan_pengajuan" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                            </div>

                            <input type="text" name="jenisagunan" id="jenisagunan">

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="jumlah_agunan">Jumlah Agunan:</label>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <select name="jumlah_agunan" id="jumlah_agunan" class="form-control" onchange="tambahInput()">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div id="input_agunan" class="form-group"></div>
                                </div>
                            </div>
                        </fieldset>

                    </form>
                    <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="add_jenis_agunan()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Cancel</span></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- Steps -->
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.min.js"></script>
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.fix.js"></script>

<!-- Jquery Validate -->
<script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>

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
    function add_jenis_agunan() {
        var inpJenisAgunanForm = document.getElementsByName("jenis_agunan[]");
        let simpanJenisAgunanForm = "";
        for (var i = 0; i < inpJenisAgunanForm.length; i++) {
            var nama = inpJenisAgunanForm[i];
            simpanJenisAgunanForm += nama.value;
            if (i < inpJenisAgunanForm.length - 1) {
                simpanJenisAgunanForm += ";";
            }
        }
        $('[name="jenisagunan"]').val(simpanJenisAgunanForm);
        console.log('test');
    }


    $(document).ready(function() {
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onInit: function(event, currentIndex) {
                resizeJquerySteps();
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                resizeJquerySteps();
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18) {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex) {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                resizeJquerySteps();
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps("previous");
                }
                // mengubah CSS ketika tab berpindah
                if (currentIndex === 0) {
                    $(".wizard-big.wizard > .content").css("min-height", "1300px");
                }
                if (currentIndex === 1) {
                    $(".wizard-big.wizard > .content").css("min-height", "700px");
                }
                if (currentIndex === 2) {
                    $(".wizard-big.wizard > .content").css("min-height", "670px");
                }
                if (currentIndex === 3) {
                    $(".wizard-big.wizard > .content").css("min-height", "350px");
                }
                if (currentIndex === 4) {
                    $(".wizard-big.wizard > .content").css("min-height", "500px");
                }
                if (currentIndex === 5) {
                    $(".wizard-big.wizard > .content").css("min-height", "650px");
                }
                if (currentIndex === 6) {
                    $(".wizard-big.wizard > .content").css("min-height", "1250px");
                }
                $(window).on("resize", function() {
                    if ($(window).width() < 480) {
                        // CSS untuk perangkat mobile

                        // Tab pertama
                        if (currentIndex === 0) {
                            $(".wizard-big.wizard > .content").css("min-height", "2500px");
                        }

                        // Tab kedua
                        if (currentIndex === 1) {
                            $(".wizard-big.wizard > .content").css("min-height", "1300px");
                        }

                        // Tab ketiga
                        if (currentIndex === 2) {
                            $(".wizard-big.wizard > .content").css("min-height", "1200px");
                        }

                        // Tab keempat
                        if (currentIndex === 3) {
                            $(".wizard-big.wizard > .content").css("min-height", "560px");
                        }
                        if (currentIndex === 4) {
                            $(".wizard-big.wizard > .content").css("min-height", "830px"); //900 tablet
                        }
                        if (currentIndex === 5) {
                            $(".wizard-big.wizard > .content").css("min-height", "900px");
                        }
                        if (currentIndex === 6) {
                            $(".wizard-big.wizard > .content").css("min-height", "2300px");
                        }
                    } else if ($(window).width() < 880) {
                        // CSS untuk perangkat tablet atau desktop

                        // Tab pertama
                        if (currentIndex === 0) {
                            $(".wizard-big.wizard > .content").css("min-height", "2100px");
                        }

                        // Tab kedua
                        if (currentIndex === 1) {
                            $(".wizard-big.wizard > .content").css("min-height", "1200px");
                        }

                        // Tab ketiga
                        if (currentIndex === 2) {
                            $(".wizard-big.wizard > .content").css("min-height", "1100px");
                        }

                        // Tab keempat
                        if (currentIndex === 3) {
                            $(".wizard-big.wizard > .content").css("min-height", "490px");
                        }
                        if (currentIndex === 4) {
                            $(".wizard-big.wizard > .content").css("min-height", "760px"); //900 tablet
                        }
                        if (currentIndex === 5) {
                            $(".wizard-big.wizard > .content").css("min-height", "780px");
                        }
                        if (currentIndex === 6) {
                            $(".wizard-big.wizard > .content").css("min-height", "1800px");
                        }
                    } else {
                        // Tab pertama
                        if (currentIndex === 0) {
                            $(".wizard-big.wizard > .content").css("min-height", "2100px");
                        }

                        // Tab kedua
                        if (currentIndex === 1) {
                            $(".wizard-big.wizard > .content").css("min-height", "1200px");
                        }

                        // Tab ketiga
                        if (currentIndex === 2) {
                            $(".wizard-big.wizard > .content").css("min-height", "1100px");
                        }

                        // Tab keempat
                        if (currentIndex === 3) {
                            $(".wizard-big.wizard > .content").css("min-height", "490px");
                        }
                        if (currentIndex === 4) {
                            $(".wizard-big.wizard > .content").css("min-height", "760px"); //900 tablet
                        }
                        if (currentIndex === 5) {
                            $(".wizard-big.wizard > .content").css("min-height", "780px");
                        }
                        if (currentIndex === 6) {
                            $(".wizard-big.wizard > .content").css("min-height", "1800px");
                        }

                    }
                });

                // Panggil event resize saat halaman dimuat
                $(window).trigger("resize");
            },
            onFinishing: function(event, currentIndex) {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            // onFinished: function(event, currentIndex) {
            //     var form = $(this);

            //     // Submit form input
            //     form.submit();
            // }
            onFinished: function(event, currentIndex) {
                var form = $(this);

                // Validate form input using jQuery Validation Plugin
                if (!form.valid()) {
                    return false;
                }

                // Serialize form data
                var formData = form.serialize();
                // console.log(formData)
                $('#mohon').show()
                // Send AJAX request to CodeIgniter 4 controller method
                $.ajax({
                    url: "<?php echo base_url() ?>home/simpan_permohonan",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        // Handle successful response
                        // console.log(data)
                        if (data == 1) {
                            $('#mohon').hide()
                            alert('Data Berhasil Disimpan')
                            // toastr.success('Data Berhasil Disimpan', 'Berhasil');
                            window.location.href = "<?php echo base_url() ?>home/e-form";
                        } else {
                            // alert(data)
                            $('#mohon').hide()
                            toastr.warning(data, 'Data Gagal Disimpan');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        // console.log(error)
                    }
                });

                return true;
            },

        });


    });
</script>

<?= $this->endSection(); ?>