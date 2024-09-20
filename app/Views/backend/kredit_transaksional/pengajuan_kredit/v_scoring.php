<script>
    $(document).ready(function() {

        // memberi nilai awal edit Data Entry
        refresh_scoring()
        // simpan data entry
        $('#save_scoring').click(function(e) {
            // alert('save fcr di klik')
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            // Mengirim data menggunakan AJAX
            var hasil_scoring = data_scoring()
            save_scoring('edit_scoring', hasil_scoring, 'edit_scoring');
        });

    });
    // bikin function
    function isi_scoring() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.scoring;
                // alert(data.kd_data)
                // unit_kerja_fcr()
                $('#kd_data_tambah').val(hasil.message.data_entry.kd_data);

                $('#nama_pemohon_sc').val(data.nama_pemohon);
                $('#alamat_sc').val(data.alamat);
                $('#plafond_sc').val(data.plafond);
                $('#tujuan_sc').val(data.tujuan);
                $('#no_pak_sc').val(data.no_pak);

                $('#pendirian_sc').val(data.pendirian_bu);
                $('#legalitas_sc').val(data.legalitas);
                $('#hubungan_sc').val(data.hubungan_funding);
                $('#pengelolaan_sc').val(data.manajemen_usaha);
                $('#jenis_agunan_sc').val(data.jenis_agunan);
                $('#bukti_sc').val(data.bukti_kepemilikan_agunan);
                $('#status_sc').val(data.status_kepemilikan);
                $('#marketable_sc').val(data.marketable_agunan);
                $('#lending_sc').val(data.hubungan_landing);
                $('#pengalaman_sc').val(data.pengalaman);
                $('#sumber_dana_sc').val(data.sumber_dana);
                $('#lokasi_sc').val(data.lokasi_proyek);
                $('#jenis_proyek_sc').val(data.jenis_proyek);
                $('#bahan_baku_sc').val(data.bahan_baku);
                $('#peralatan_sc').val(data.peralatan);
                $('#pembayaran_sc').val(data.pembayaran_termijn);
                $('#dasar_penunjukan_sc').val(data.dasar_penunjukan);
                $('#prosentase_sc').val(data.persentase_plafond);
                $('#jangka_sc').val(data.jangka_waktu);
                $('#agunan_sc').val(data.persentase_agunan);
                $('#penjaminan_sc').val(data.penjaminan_maskapai);

                $('#hasil_scoring').html(data.hasil_skoring);
                $('#ket_hasil').html(data.keterangan);


            } else {
                alert(hasil.message)
            }
        });
    }

    function refresh_scoring() {
        isi_scoring()
        // tampil_button('save_scoring')
    }

    function data_scoring() {
        var data_scoring = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            nama_pemohon_sc: $('#nama_pemohon_sc').val(),
            alamat_sc: $('#alamat_sc').val(),
            plafond_sc: $('#plafond_sc').val(),
            tujuan_sc: $('#tujuan_sc').val(),
            no_pak_sc: $('#no_pak_sc').val(),

            pendirian_sc: $('#pendirian_sc').val(),
            legalitas_sc: $('#legalitas_sc').val(),
            hubungan_sc: $('#hubungan_sc').val(),
            pengelolaan_sc: $('#pengelolaan_sc').val(),
            jenis_agunan_sc: $('#jenis_agunan_sc').val(),
            bukti_sc: $('#bukti_sc').val(),
            status_sc: $('#status_sc').val(),
            marketable_sc: $('#marketable_sc').val(),
            lending_sc: $('#lending_sc').val(),
            pengalaman_sc: $('#pengalaman_sc').val(),
            sumber_dana_sc: $('#sumber_dana_sc').val(),
            lokasi_sc: $('#lokasi_sc').val(),
            jenis_proyek_sc: $('#jenis_proyek_sc').val(),
            bahan_baku_sc: $('#bahan_baku_sc').val(),
            peralatan_sc: $('#peralatan_sc').val(),
            pembayaran_sc: $('#pembayaran_sc').val(),
            dasar_penunjukan_sc: $('#dasar_penunjukan_sc').val(),
            prosentase_sc: $('#prosentase_sc').val(),
            jangka_sc: $('#jangka_sc').val(),
            agunan_sc: $('#agunan_sc').val(),
            penjaminan_sc: $('#penjaminan_sc').val(),

            // upload dokumen
        };
        return data_scoring
    }

    function save_scoring(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            success: function(response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_scoring()
                    if (button == 'edit_scoring') {
                        toastr.success(response.message, 'Berhasil')

                    }
                    if (button != 'edit_scoring') {
                        var hasil_recap2 = data_recap();
                        post_recap('edit_recap', hasil_recap2, 'finish_recap')

                    }
                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                }
            },
            error: function(xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit scoring gagal', 'Error')
            }
        });


    }
</script>