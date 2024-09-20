<script>
    $(document).ready(function() {
        // perorangan()
        isi_dokumen()
        $("#jenis_badan_usaha_dp").on("change", function() {
            var jenis_usaha = $(this).val();
            if (jenis_usaha == 'Perseroan Perseorangan') {
                $(".perorangan").show()
                $(".cv").hide()
                $(".pt").hide()

            } else if (jenis_usaha == 'Commanditaire Vennootschap') {
                $(".perorangan").hide()
                $(".cv").show()
                $(".pt").hide()
            } else if (jenis_usaha == 'Perseroan Terbatas') {
                $(".perorangan").hide()
                $(".cv").hide()
                $(".pt").show()
            } else {
                $(".perorangan").show()
                $(".cv").hide()
                $(".pt").hide()
            }
            changeDokumen(jenis_usaha);
        });
        $(".lihat-dokumen").on("click", function() {
            var data_id = $(this).data('id');
            seeDokumen(data_id)
            // Lakukan sesuatu dengan nilai data-id yang telah diambil
            // console.log('Nilai data-id:', data_id);
        });

        // // update fcr agunan
        $('#save_dokumen').click(function(e) {
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            var hasil_dok = data_dokumen();
            edit_dok('edit_dokumen', hasil_dok, 'edit_dok')
            // batas baru

        });

    });
    // BATAS COBA

    // bikin function
    function isi_dokumen() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            var result = 'nihil';
            if (hasil.status == 'success') {
                var orang = hasil.message.dok;
                var cv = hasil.message.dok_cv;
                var pt = hasil.message.dok_pt;

                var data = hasil.message.dok;

                if (orang.nama_nasabah == null && cv.nama_nasabah == null && pt.nama_nasabah == null) {
                    perorangan();
                } else {
                    if (orang.nama_nasabah != null) {
                        var result = 'orang';
                        var data = hasil.message.dok;
                        ada_dokumen(result, data);
                    }
                    if (cv.nama_nasabah != null) {
                        var result = 'cv';
                        var data = hasil.message.dok_cv;
                        ada_dokumen(result, data);
                    }
                    if (pt.nama_nasabah != null) {
                        var result = 'pt';
                        var data = hasil.message.dok_pt;
                        ada_dokumen(result, data);
                    }

                    tampil_edit_dok(result);

                    $('#nama_nasabah_dp').val(data.nama_nasabah);
                    $('#alamat_dp').val(data.alamat);
                    $('#usaha_dp').val(data.usaha);
                    $('#jenis_badan_usaha_dp').val(data.jenis_badan_usaha);
                }

            } else {
                alert(hasil.message)
            }
        });
    }

    function refresh_dokumen(param) {
        isi_dokumen()
        tampil_button('save_dokumen')
        // reset_dokumen()
    }

    function reset_dokumen() {
        // Reset semua input file di dalam elemen dengan kelas "asiyap"
        $('.reset-dokumen input[type=file]').val(null);
    }

    function seeDokumen(param) {
        // Ambil nilai kd_data dari $data_entry
        var id_input = CryptoJS.SHA1(param);
        // alert(id_input)
        var kd_data = "<?php echo sha1($data_entry->kd_data) ?>";

        // Bangun URL dengan base_url dan kd_data
        var url = "<?php echo base_url() ?>dokumen-pendukung/" + kd_data + "/" + id_input;

        // Buka tautan dalam tab baru
        window.open(url, '_blank');
    }

    function perorangan() {
        $(".perorangan").show()
        $(".cv").hide()
        $(".pt").hide()
    }

    function tampil_edit_dok(jenis_usaha) {
        if (jenis_usaha == 'orang') {
            $(".perorangan").show()
            $(".cv").hide()
            $(".pt").hide()

        } else if (jenis_usaha == 'cv') {
            $(".perorangan").hide()
            $(".cv").show()
            $(".pt").hide()
        } else if (jenis_usaha == 'pt') {
            $(".perorangan").hide()
            $(".cv").hide()
            $(".pt").show()
        } else {
            $(".perorangan").hide()
            $(".cv").hide()
            $(".pt").hide()
        }
    }

    // bikin function
    function changeDokumen(param) {
        variabelGlobal(function(hasil) {
            // alert(param)
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                if (param == 'Perseroan Perseorangan') {
                    var segment = 'orang';
                    var data = hasil.message.dok;
                    ada_dokumen(segment, data);

                } else if (param == 'Commanditaire Vennootschap') {
                    var segment = 'cv';
                    var data = hasil.message.dok_cv;
                    ada_dokumen(segment, data);

                } else if (param == 'Perseroan Terbatas') {
                    var segment = 'pt';
                    var data = hasil.message.dok_pt;
                    ada_dokumen(segment, data);

                } else {
                    var segment = 'orang';
                    var data = hasil.message.dok;
                    ada_dokumen(segment, data);

                }

                $('#nama_nasabah_dp').val(data.nama_nasabah);
                $('#alamat_dp').val(data.alamat);
                $('#usaha_dp').val(data.usaha);
                // $('#jenis_badan_usaha_dp').val(data.jenis_badan_usaha);

            } else {
                alert(hasil.message)
            }
        });
    }

    function data_dokumen() {
        // Buat objek FormData
        var formData = new FormData();
        formData.append('kd_data_tambah', $('#kd_data_tambah').val());

        formData.append('nama_nasabah_dp', $('#nama_nasabah_dp').val());
        formData.append('alamat_dp', $('#alamat_dp').val());
        formData.append('usaha_dp', $('#usaha_dp').val());
        formData.append('jenis_badan_usaha_dp', $('#jenis_badan_usaha_dp').val());

        formData.append('pengajuan_kredit1', $('#pengajuan_kredit1')[0].files[0]);
        formData.append('pendirian_perseroan1', $('#pendirian_perseroan1')[0].files[0]);
        formData.append('pendaftaran_perseroan1', $('#pendaftaran_perseroan1')[0].files[0]);
        formData.append('npwp1', $('#npwp1')[0].files[0]);
        formData.append('ktp_persero1', $('#ktp_persero1')[0].files[0]);
        formData.append('npwp_persero1', $('#npwp_persero1')[0].files[0]);
        formData.append('perijinan_usaha1', $('#perijinan_usaha1')[0].files[0]);
        formData.append('pengalaman_kerja1', $('#pengalaman_kerja1')[0].files[0]);
        formData.append('laporan_keuangan1', $('#laporan_keuangan1')[0].files[0]);
        formData.append('copy_dok_agunan1', $('#copy_dok_agunan1')[0].files[0]);
        formData.append('ideb_slik1', $('#ideb_slik1')[0].files[0]);
        formData.append('ktp_istri1', $('#ktp_istri1')[0].files[0]);
        formData.append('kk_pemilik_agunan1', $('#kk_pemilik_agunan1')[0].files[0]);
        formData.append('buku_nikah1', $('#buku_nikah1')[0].files[0]);
        formData.append('dhn1', $('#dhn1')[0].files[0]);
        formData.append('ideb_slik_tr1', $('#ideb_slik_tr1')[0].files[0]);

        formData.append('pengajuan_kredit2', $('#pengajuan_kredit2')[0].files[0]);
        formData.append('akta_pendirian2', $('#akta_pendirian2')[0].files[0]);
        formData.append('ahu2', $('#ahu2')[0].files[0]);
        formData.append('npwp_perseroan2', $('#npwp_perseroan2')[0].files[0]);
        formData.append('ktp_pengurus2', $('#ktp_pengurus2')[0].files[0]);
        formData.append('ktp_komanditer2', $('#ktp_komanditer2')[0].files[0]);
        formData.append('perijinan_usaha2', $('#perijinan_usaha2')[0].files[0]);
        formData.append('pengalaman_kerja2', $('#pengalaman_kerja2')[0].files[0]);
        formData.append('laporan_keuangan2', $('#laporan_keuangan2')[0].files[0]);
        formData.append('copy_dok_agunan2', $('#copy_dok_agunan2')[0].files[0]);
        formData.append('ideb_slik_agunan2', $('#ideb_slik_agunan2')[0].files[0]);
        formData.append('ktp_pemilik_agunan2', $('#ktp_pemilik_agunan2')[0].files[0]);
        formData.append('kk_pemilik_agunan2', $('#kk_pemilik_agunan2')[0].files[0]);
        formData.append('buku_nikah2', $('#buku_nikah2')[0].files[0]);
        formData.append('dhn2', $('#dhn2')[0].files[0]);
        formData.append('ideb_slik2', $('#ideb_slik2')[0].files[0]);

        formData.append('pengajuan_kredit3', $('#pengajuan_kredit3')[0].files[0]);
        formData.append('akta_pendirian3', $('#akta_pendirian3')[0].files[0]);
        formData.append('ahu3', $('#ahu3')[0].files[0]);
        formData.append('npwp_perseroan3', $('#npwp_perseroan3')[0].files[0]);
        formData.append('ktp_direksi3', $('#ktp_direksi3')[0].files[0]);
        formData.append('ktp_komisaris3', $('#ktp_komisaris3')[0].files[0]);
        formData.append('pemegang_saham3', $('#pemegang_saham3')[0].files[0]);
        formData.append('perijinan_usaha3', $('#perijinan_usaha3')[0].files[0]);
        formData.append('pengalaman_kerja3', $('#pengalaman_kerja3')[0].files[0]);
        formData.append('laporan_keuangan3', $('#laporan_keuangan3')[0].files[0]);
        formData.append('ideb_slik_agunan3', $('#ideb_slik_agunan3')[0].files[0]);
        formData.append('ktp_pemilik_agunan3', $('#ktp_pemilik_agunan3')[0].files[0]);
        formData.append('ktp_istri3', $('#ktp_istri3')[0].files[0]);
        formData.append('kk_pemilik_agunan3', $('#kk_pemilik_agunan3')[0].files[0]);
        formData.append('buku_nikah3', $('#buku_nikah3')[0].files[0]);
        formData.append('dhn3', $('#dhn3')[0].files[0]);
        formData.append('ideb_slik3', $('#ideb_slik3')[0].files[0]);
        return formData;
    }

    function edit_dok(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_dokumen()
                    reset_dokumen()
                    if (button == 'edit_dok') {
                        toastr.success(response.message, 'Berhasil')

                    }
                    if (button != 'edit_dok') {
                        var hasil_scoring2 = data_scoring()
                        save_scoring('finish_scoring', hasil_scoring2, 'finish_scoring');

                    }
                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                }
                // $('#mohon').hide()
                // toastr.success(response.message, 'Berhasil')
            },
            error: function(xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit data gagal', 'Error')
            }
        });


    }

    function ada_dokumen(result, data) {
        // console.log(result)
        // console.log(data)
        // alert(data)
        // alert(result)

        if (result == 'cv') {
            status_ada(data.pengajuan_kredit, 'pengajuan_kredit2');
            status_ada(data.akta_pendirian, 'akta_pendirian2');
            status_ada(data.ahu, 'ahu2');
            status_ada(data.npwp_perseroan, 'npwp_perseroan2');
            status_ada(data.ktp_pengurus, 'ktp_pengurus2');
            status_ada(data.ktp_komanditer, 'ktp_komanditer2');
            status_ada(data.perijinan_usaha, 'perijinan_usaha2');
            status_ada(data.pengalaman_kerja, 'pengalaman_kerja2');
            status_ada(data.laporan_keuangan, 'laporan_keuangan2');
            status_ada(data.copy_dok_agunan, 'copy_dok_agunan2');
            status_ada(data.ideb_slik_agunan, 'ideb_slik_agunan2');
            status_ada(data.ktp_pemilik_agunan, 'ktp_pemilik_agunan2');
            status_ada(data.kk_pemilik_agunan, 'kk_pemilik_agunan2');
            status_ada(data.buku_nikah, 'buku_nikah2');
            status_ada(data.dhn, 'dhn2');
            status_ada(data.ideb_slik, 'ideb_slik2');

        } else if (result == 'pt') {
            status_ada(data.pengajuan_kredit, 'pengajuan_kredit3');
            status_ada(data.akta_pendirian, 'akta_pendirian3');
            status_ada(data.ahu, 'ahu3');
            status_ada(data.npwp_perseroan, 'npwp_perseroan3');
            status_ada(data.ktp_direksi, 'ktp_direksi3');
            status_ada(data.ktp_komisaris, 'ktp_komisaris3');
            status_ada(data.pemegang_saham, 'pemegang_saham3');
            status_ada(data.perijinan_usaha, 'perijinan_usaha3');
            status_ada(data.pengalaman_kerja, 'pengalaman_kerja3');
            status_ada(data.laporan_keuangan, 'laporan_keuangan3');
            status_ada(data.ideb_slik_agunan, 'ideb_slik_agunan3');
            status_ada(data.ktp_pemilik_agunan, 'ktp_pemilik_agunan3');
            status_ada(data.ktp_istri, 'ktp_istri3');
            status_ada(data.kk_pemilik_agunan, 'kk_pemilik_agunan3');
            status_ada(data.buku_nikah, 'buku_nikah3');
            status_ada(data.dhn, 'dhn3');
            status_ada(data.ideb_slik, 'ideb_slik3');

            // orang
        } else {
            status_ada(data.pengajuan_kredit, 'pengajuan_kredit1');
            status_ada(data.pendirian_perseroan, 'pendirian_perseroan1');
            status_ada(data.pendaftaran_perseroan, 'pendaftaran_perseroan1');
            status_ada(data.npwp_perorangan, 'npwp1');
            status_ada(data.ktp_persero, 'ktp_persero1');
            status_ada(data.npwp_persero, 'npwp_persero1');
            status_ada(data.perijinan_usaha, 'perijinan_usaha1');
            status_ada(data.pengalaman_kerja, 'pengalaman_kerja1');
            status_ada(data.laporan_keuangan, 'laporan_keuangan1');
            status_ada(data.copy_dok_agunan, 'copy_dok_agunan1');
            status_ada(data.ideb_slik_agunan, 'ideb_slik1');
            status_ada(data.ktp_istri, 'ktp_istri1');
            status_ada(data.kk_pemilik_agunan, 'kk_pemilik_agunan1');
            status_ada(data.buku_nikah, 'buku_nikah1');
            status_ada(data.dhn, 'dhn1');
            status_ada(data.ideb_slik, 'ideb_slik_tr1');
        }
    }

    function status_ada(kolom_db, data_id) {
        // alert(data.pengajuan_kredit)
        // console.log(data.pengajuan_kredit)
        // alert(kolom_db)
        // alert(data_id)

        // Mengecek apakah ada elemen dengan data-id yang sama sebelumnya
        var id_baru = data_id +'span';
        // var existingElement = $('[data-id="' + data_id + '"]');
        var existingElement = $('#'+ id_baru);

        // Jika ada elemen dengan data-id yang sama, hapus kontennya
        if (existingElement.length > 0) {
            existingElement.remove();
        }

        // Kemudian tambahkan elemen baru sesuai kondisi
        if (kolom_db == null || kolom_db == '') {
            $('[data-id="' + data_id + '"]').append('<span id="' + id_baru + '" class="text-danger"> <i class="fa fa-circle text-danger" aria-hidden="true"></i></span>');
        } else {
            $('[data-id="' + data_id + '"]').append('<span id="' + id_baru + '" class="text-success"> <i class="fa fa-circle text-success" aria-hidden="true"></i></span>');
        }
    }
</script>