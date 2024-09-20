<script>
    $(document).ready(function() {
        $("#jumlah_agunan_tambah").on("change", function() {
            tambahInput()
        });
        $("#lihat_file").on("click", function() {
            lihatFile()
        });
        $("#edit_file").on("click", function() {
            editFile()
        });

        // panggil function
        refresh('save_data_entry')

        // edit file
        $('#form_dokumen_edit').on('submit', function(e) {
            e.preventDefault();
            $('#mohon').show()
            $.ajax({
                url: "<?php echo base_url('pengajuan/edit_file'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data == '1') {
                        $("#modal_dokumen_edit").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Dokumen Berhasil', 'Berhasil')
                        refresh('save_data_entry')
                    } else {
                        $('#mohon').hide()
                        toastr.warning(data, 'Gagal')
                    }
                },
                error: function(data) {
                    console.log(data);
                }

            });
        });

        // simpan data entry
        $('#save_data_entry').click(function(e) {
            console.log('1');
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // alert('hallo')
            var kumpulan_agunan = getJenisAgunan();
            if (kumpulan_agunan != 'cpa123') {
                // Mendefinisikan array untuk menyimpan nilai input
                // alert(data.jenis_agunan_tambah)
                // console.log(data_data_entry2)
                // Mengirim data menggunakan AJAX
                var data_data_entry2 = data_data_entry(kumpulan_agunan);
                post_data_entry('edit_data_entry', data_data_entry2, 'save_data_entry')
            } else {
                $('#mohon').hide()
                toastr.warning('Jenis agunan harus diisi', 'Gagal')
            }
        });

    });
    // bikin function
    function pemroses() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.data_entry;
                // alert(data.kd_data)
                unit_kerja()
                cek_agunan(data.kd_data)
                // console.log(data.nama_debitur)
                $('#kd_data_tambah').val(data.kd_data);
                $('#kd_data').val(data.kd_data);

                $('#pemasar_tambah').val(data.pemasar);
                $('#koordinator_pemasar_tambah').val(data.koordinator_pemasar);
                $('#kepala_cabang_tambah').val(data.kepala_cabang);
                $('#kepala_bagian_tambah').val(data.kepala_bagian);
                $('#kepala_divisi_tambah').val(data.kepala_divisi);

                $('#nama_debitur_tambah').val(data.nama_debitur);
                $('#bidang_usaha_tambah').val(data.bidang_usaha);
                $('#nama_direktur_tambah').val(data.nama_direktur);
                $('#key_person_tambah').val(data.key_person);
                $('#alamat_kantor_tambah').val(data.alamat_kantor);
                $('#alamat_gudang_tambah').val(data.alamat_gudang);
                $('#group_debitur_tambah').val(data.group_debitur);

                $('#nama_proyek_tambah').val(data.nama_proyek);
                $('#nomor_spk_tambah').val(data.nomor_spk);
                $('#tanggal_spk_tambah').val(data.tanggal_spk);
                $('#nilai_proyek_tambah').val(data.nilai_proyek);
                $('#alamat_proyek_tambah').val(data.alamat_proyek);
                $('#pemberi_kerja_tambah').val(data.pemberi_kerja);
                $('#penandatangan_kontrak_tambah').val(data.penandatangan_kontrak);
                $('#alamat_pemberi_tambah').val(data.alamat_pemberi_kerja);
                $('#status_tambah').val(hasil.message.data_master.status);

                $('#tanggal_permohonan_tambah').val(data.tanggal_permohonan);
                $('#plafond_tambah').val(data.plafond);
                $('#tujuan_pengajuan_tambah').val(data.tujuan_pengajuan);
                $('#jumlah_agunan_tambah').val(data.jumlah_agunan);

            } else {
                // alert(hasil.message)
                console.log(hasil.message)

            }


        });
    }

    function unit_kerja() {
        variabelGlobal(function(hasil) {
            if (hasil.status == 'success') {
                var kd_unit = hasil.message.data_entry.kd_unit_kerja;
                // console.log(kd_unit);
                $.ajax({
                    url: "<?php echo base_url('unit_kerja/get_unit_by_id'); ?>" + "/" + kd_unit,
                    type: "get",
                    dataType: "JSON",
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
                            if (option.kd_unit === kd_unit) {
                                $(newOption).prop('selected', true);
                            }
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

            } else {
                alert(hasil.message)
            }

        });
    }
    // agunan dinamis
    function tambahInput() {
        variabelGlobal(function(hasil) {
            if (hasil.status == 'success') {
                var jumlah = document.getElementById("jumlah_agunan_tambah").value;
                if (jumlah == null || jumlah == '' || jumlah == undefined) {
                    var jumlah = hasil.message.data_entry.jumlah_agunan
                }
                var inputAgunan = document.getElementById("input_agunan_tambah");
                // alert(jumlah)
                inputAgunan.innerHTML = ''; // Reset inputan

                // Konversi array menjadi JSON
                // var jsArray = JSON.stringify(hasil.message.jenis_agu);
                var jsArray = hasil.message.jenis_agu;

                // Menghitung jumlah elemen dalam array
                var jumlahElemen = hasil.message.jenis_agu.length;

                for (var i = 0; i < jumlah; i++) {
                    var inputGroup = document.createElement("div");
                    inputGroup.classList.add("form-group");
                    inputGroup.classList.add("col-lg-12");

                    var label = document.createElement("label");
                    label.className = "col-lg-12 control-label";
                    label.innerHTML = "Jenis Agunan " + (i + 1);

                    var input = document.createElement("input");
                    input.type = "text";
                    console.log('<?php echo $edit_data ?>')
                    if ('<?php echo $edit_data ?>' == '') {
                        input.readOnly = "readonly";
                    }
                    input.name = "jenis_agunan_tambah[]";
                    input.id = "jenis_agunan_tambah" + i;
                    input.classList.add("form-control");
                    input.classList.add("text-dark");
                    input.placeholder = "Tanah/ Tanah dan Bangunan | Barang Bergerak | Tunai | Penjaminan Lembaga Penjamin";
                    // Set nilai input dari array PHP

                    if (jsArray[i] != undefined) {
                        input.value = jsArray[i]
                    } else {
                        input.value = '';
                    }

                    inputGroup.appendChild(label);
                    inputGroup.appendChild(input);
                    inputAgunan.appendChild(inputGroup);
                }
                resizeJquerySteps();
            } else {
                alert(hasil.message)
            }
        })
    }

    function refresh(param) {
        pemroses()
        tambahInput()
        if (param == 'save_data_entry') {
            tampil_button('save_data_entry')
        } else if (param == 'save_fcr') {
            tampil_button('save_fcr')
        } else if (param == 'save_fcr_usaha') {
            tampil_button('save_fcr_usaha')
        } else if (param == 'save_fcr_agunan') {
            tampil_button('save_fcr_agunan')
        } else if (param == 'save_dokumen') {
            tampil_button('save_dokumen')
        } else if (param == 'save_scoring') {
            tampil_button('save_scoring')
        } else if (param == 'save_recap') {
            tampil_button('save_recap')
        } else {
            tampil_button('save_data_entry')
        }
    }

    function getJenisAgunan() {
        var jumlah = document.getElementById("jumlah_agunan_tambah").value;
        var jenis_agunan = ''; // Inisialisasi string kosong untuk menyimpan hasil

        for (var i = 0; i < jumlah; i++) {
            var currentVal = $('#jenis_agunan_tambah' + i).val();
            if (currentVal == '') {
                return 'cpa123';
            }

            // Tambahkan nilai saat ini ke dalam string jenis_agunan
            jenis_agunan += currentVal;

            // Tambahkan tanda titik koma jika ini bukan nilai terakhir
            if (i < jumlah - 1) {
                jenis_agunan += ';';
            }
        }

        return jenis_agunan;
    }

    function lihatFile() {
        // Ambil nilai kd_data dari $data_entry
        var kd_data = "<?php echo sha1($data_entry->kd_data) ?>";

        // Bangun URL dengan base_url dan kd_data
        var url = "<?php echo base_url() ?>dokumen-kontrak-proyek/" + kd_data;

        // Buka tautan dalam tab baru
        window.open(url, '_blank');
    }

    function editFile() {
        document.getElementById("form_dokumen_edit").reset();
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.data_entry;
                // alert(data.kd_data)
                $('#kd_data_edit').val(data.kd_data);
                $("#modal_dokumen_edit").modal('show')
            } else {
                alert(hasil.message)

            }
        });
    }
    // batas agunan dinamis
    function tampil_button(param) {
        if ('<?php echo $save_edit_pengajuan_kredit_transaksional; ?>') {

            if (param == 'save_data_entry') {
                $('#save_data_entry').show();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();

            } else if (param == 'save_fcr') {
                $('#save_data_entry').hide();
                $('#save_fcr').show();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();

            } else if (param == 'save_fcr_usaha') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').show();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == 'save_fcr_agunan') {

                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                // $('#save_fcr_agunan_tanah').hide();
                // $('#save_fcr_agunan_bangunan').hide();
                // $('#save_fcr_agunan_lingkungan').hide();
                // $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == 'save_dokumen') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').show();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == 'save_scoring') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').show();
                $('#save_recap').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == 'save_recap') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').show();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            // } else {
            //     $('#save_data_entry').hide();
            //     $('#save_fcr').hide();
            //     $('#save_fcr_usaha').hide();
            //     $('#save_fcr_agunan_tanah').hide();
            //     $('#save_fcr_agunan_bangunan').hide();
            //     $('#save_fcr_agunan_lingkungan').hide();
            //     $('#save_fcr_agunan_bergerak').hide();
            //     $('#save_dokumen').hide();
            //     $('#save_scoring').hide();
            //     $('#save_recap').hide();
            //     $('#save_data_entry').show();
            //     $('#save_fcr').hide();
            //     $('#save_fcr_usaha').hide();
            //     $('#save_fcr_agunan_tanah').hide();
            //     $('#save_fcr_agunan_bangunan').hide();
            //     $('#save_fcr_agunan_lingkungan').hide();
            //     $('#save_fcr_agunan_bergerak').hide();
            //     $('#save_dokumen').hide();
            //     $('#save_scoring').hide();
            //     $('#save_recap').hide();
            }
            if (param == "save_fak_data") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").show();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_fak_modal") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").show();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_fak_rl") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").show();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_lap_rl") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").show();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_ceftb") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").show();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_faa") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").show();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_mauk") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").show();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_dcl") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").show();
                $("#save_scoring").hide();
                $("#save_recap").hide();
            } else if (param == "save_scoring") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").show();
                $("#save_recap").hide();
            } else if (param == "save_recap") {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan_tanah').hide();
                $('#save_fcr_agunan_bangunan').hide();
                $('#save_fcr_agunan_lingkungan').hide();
                $('#save_fcr_agunan_bergerak').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
                $('#save_data_entry').hide();
                $("#save_fak_data").hide();
                $("#save_fak_modal").hide();
                $("#save_fak_rl").hide();
                $("#save_lap_rl").hide();
                $("#save_ceftb").hide();
                $("#save_faa").hide();
                $("#save_mauk").hide();
                $("#save_dcl").hide();
                $("#save_scoring").hide();
                $("#save_recap").show();
            }
        } else {
            $('#save_data_entry').hide();
            $('#save_fcr').hide();
            $('#save_fcr_usaha').hide();
            $('#save_fcr_agunan_tanah').hide();
            $('#save_fcr_agunan_bangunan').hide();
            $('#save_fcr_agunan_lingkungan').hide();
            $('#save_fcr_agunan_bergerak').hide();
            $('#save_dokumen').hide();
            $('#save_scoring').hide();
            $('#save_recap').hide();
            $("#save_fak_data").hide();
            $("#save_fak_modal").hide();
            $("#save_fak_rl").hide();
            $("#save_lap_rl").hide();
            $("#save_ceftb").hide();
            $("#save_faa").hide();
            $("#save_mauk").hide();
            $("#save_dcl").hide();
            $("#save_scoring").hide();
            $("#save_recap").hide();
        }


    }

    function variabelGlobal(callback) {
        var kirim = {
            kd_data: '<?php echo sha1($data_entry->kd_data) ?>'
        };

        $.ajax({
            url: "<?php echo base_url() ?>pengajuan/getGlobal",
            type: "POST",
            data: kirim,
            dataType: "JSON",
            success: function(response) {
                var hasil = {
                    status: 'success',
                    message: response
                };
                callback(hasil); // Panggil callback dengan hasil yang diperoleh
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var hasil = {
                    status: 'error',
                    message: 'gagal mendapatkan data'
                };
                callback(hasil); // Panggil callback dengan hasil yang diperoleh
            }
        });
    }

    // data data entry save
    function data_data_entry(kumpulan_agunan) {
        var data_data_entry = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            unit_kerja_tambah: $('#unit_kerja_tambah').val(),
            pemasar_tambah: $('#pemasar_tambah').val(),
            koordinator_pemasar_tambah: $('#koordinator_pemasar_tambah').val(),
            kepala_cabang_tambah: $('#kepala_cabang_tambah').val(),
            kepala_bagian_tambah: $('#kepala_bagian_tambah').val(),
            kepala_divisi_tambah: $('#kepala_divisi_tambah').val(),

            nama_debitur_tambah: $('#nama_debitur_tambah').val(),
            bidang_usaha_tambah: $('#bidang_usaha_tambah').val(),
            nama_direktur_tambah: $('#nama_direktur_tambah').val(),
            key_person_tambah: $('#key_person_tambah').val(),
            alamat_kantor_tambah: $('#alamat_kantor_tambah').val(),
            alamat_gudang_tambah: $('#alamat_gudang_tambah').val(),
            group_debitur_tambah: $('#group_debitur_tambah').val(),

            nama_proyek_tambah: $('#nama_proyek_tambah').val(),
            nomor_spk_tambah: $('#nomor_spk_tambah').val(),
            tanggal_spk_tambah: $('#tanggal_spk_tambah').val(),
            nilai_proyek_tambah: $('#nilai_proyek_tambah').val(),
            alamat_proyek_tambah: $('#alamat_proyek_tambah').val(),
            pemberi_kerja_tambah: $('#pemberi_kerja_tambah').val(),
            penandatangan_kontrak_tambah: $('#penandatangan_kontrak_tambah').val(),
            alamat_pemberi_tambah: $('#alamat_pemberi_tambah').val(),
            status_tambah: $('#status_tambah').val(),

            tanggal_permohonan_tambah: $('#tanggal_permohonan_tambah').val(),
            plafond_tambah: $('#plafond_tambah').val(),
            tujuan_pengajuan_tambah: $('#tujuan_pengajuan_tambah').val(),
            jumlah_agunan_tambah: $('#jumlah_agunan_tambah').val(),
            jenis_agunan_tambah: kumpulan_agunan,

            // upload dokumen
        };
        return data_data_entry;
    }

    function post_data_entry(method, data_input, button) {
        console.log('2');
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            success: function(response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh('save_data_entry')
                    if (button == 'save_data_entry') {
                        toastr.success(response.message, 'Berhasil')
                    }
                    if (button != 'save_data_entry') {
                        var finish_fcr = data_data_fcr();
                        post_fcr('finish_fcr', finish_fcr, 'finish_fcr')
                    }

                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')

                }
            },
            error: function(xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit data entry gagal', 'Error')
            }
        });

    }

    function cek_agunan(kd_data) {
        $.ajax({
            url: '<?php echo base_url(); ?>pengajuan/cek_agunan/' + kd_data,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log('Success:', response);
                if (response.tanah != '') {
                    // Lakukan sesuatu jika status sukses
                    $('#btn_tambah_tanah').show();
                    $('#btn_tambah_bangunan').show();
                    // $('#btn_tambah_lingkungan').show();

                    // tampil button simpan agunan tanah
                    // $('#save_fcr_agunan_tanah').show();
                    // $('#save_fcr_agunan_bangunan').show();
                    // $('#save_fcr_agunan_lingkungan').show();
                } else {
                    $('#btn_tambah_tanah').hide();
                    $('#btn_tambah_bangunan').hide();
                    // $('#btn_tambah_lingkungan').hide();

                    // $('#save_fcr_agunan_tanah').hide();
                    // $('#save_fcr_agunan_bangunan').hide();
                    // $('#save_fcr_agunan_lingkungan').hide();
                }
                if (response.barang_bergerak != '') {
                    // Lakukan sesuatu jika status sukses
                    $('#btn_tambah_barang_bergerak').show();

                    // $('#save_fcr_agunan_bergerak').show();
                } else {
                    $('#btn_tambah_barang_bergerak').hide();

                    // $('#save_fcr_agunan_bergerak').hide();
                }
            },
            error: function(xhr, status, error) {
                console.log('Error response text:', xhr.responseText);
                console.log('Error status:', status);
                console.log('Error:', error);
                // console.error('Error response text:', xhr.responseText);
                // console.error('Error status:', status);
                // console.error('Error:', error);
            }
        });
    }

    function tampil_button_simpan_agunan(kd_data) {
        $.ajax({
            url: '<?php echo base_url(); ?>pengajuan/cek_agunan/' + kd_data,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log('Success:', response);

                if (response.tanah != '') {
                    // tampil button simpan agunan tanah
                    $('#save_fcr_agunan_tanah').show();
                    $('#save_fcr_agunan_bangunan').show();
                    // $('#save_fcr_agunan_lingkungan').show();
                } else {
                    $('#save_fcr_agunan_tanah').hide();
                    $('#save_fcr_agunan_bangunan').hide();
                    // $('#save_fcr_agunan_lingkungan').hide();
                }
                if (response.barang_bergerak != '') {
                    $('#save_fcr_agunan_bergerak').show();
                } else {
                    $('#save_fcr_agunan_bergerak').hide();
                }
            },
            error: function(xhr, status, error) {
                console.log('Error response text:', xhr.responseText);
                console.log('Error status:', status);
                console.log('Error:', error);
                // console.error('Error response text:', xhr.responseText);
                // console.error('Error status:', status);
                // console.error('Error:', error);
            }
        });
    }

    function tampil_btn_finish(kd_data) {
        $.ajax({
            url: '<?php echo base_url(); ?>pengajuan/tampil_btn_finish/' + kd_data,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log('Success:', response);
                // $('a[href="#finish"]').text('New Title haha');
                // $('a[href="#finish"]').hide();
                if (response.status == 'success') {
                    if (response.tampil_button == 'show') {
                        $('a[href="#finish"]').show();
                        $('a[href="#finish"]').text(response.judul_button);
                    } else {
                        $('a[href="#finish"]').hide();
                    }
                } else {
                    $('a[href="#finish"]').hide();
                }

            },
            error: function(xhr, status, error) {
                console.log('Error response text:', xhr.responseText);
                console.log('Error status:', status);
                console.log('Error:', error);
                // console.error('Error response text:', xhr.responseText);
                // console.error('Error status:', status);
                // console.error('Error:', error);
            }
        });
    }
</script>