<script>
    $(document).ready(function() {

        // memberi nilai awal edit Data Entry

        // simpan data entry
        $('a[href="#finish"]').click(function(e) {
            // alert('save tombol finish di klik haha')
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // Mendefinisikan array untuk menyimpan nilai input
            var kumpulan_agunan = getJenisAgunan();
            if (kumpulan_agunan != 'cpa123') {
                // alert(data.jenis_agunan_tambah)
                // Mengirim data menggunakan AJAX
                var data_entry_finish = data_data_entry(kumpulan_agunan);
                post_data_entry('edit_finish', data_entry_finish, 'finish')
                // Mengirim data menggunakan AJAX
                var finish_fcr = data_data_fcr();
                post_fcr('finish_fcr', finish_fcr, 'finish_fcr')

                var finish_fcr3 = data_fcr_usaha();
                post_fcr_usaha('finish_fcr_usaha', finish_fcr3, 'finish_fcr_usaha')

                var fcr_agunan3 = data_fcr_agunan();
                post_fcr_agunan('finish_fcr_agunan', fcr_agunan3, 'finish_fcr_agunan')

                var hasil_dok2 = data_dokumen();
                edit_dok('edit_dokumen', hasil_dok2, 'finish_dok')

                var hasil_scoring2 = data_scoring()
                save_scoring('finish_scoring', hasil_scoring2, 'finish_scoring');

                var hasil_recap2 = data_recap();
                post_recap('edit_recap', hasil_recap2, 'finish_recap')

            } else {
                $('#mohon').hide()
                toastr.warning('Jenis agunan harus diisi', 'Gagal')
            }

        });

    });
    // bikin function
    function isi_recapz() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.kirim;
                // alert(data.kd_data)
                // unit_kerja_fcr()
                $('#kd_data_tambah').val(hasil.message.data_entry.kd_data);
                $('#disposisi_sc').val(data.rekomendasi_pemasar);

                // $('#data_entry1').css('text-decoration', 'line-through');
                // $('#data_entry2').css('text-decoration', 'none');

                // $('#fcr1').css('text-decoration', 'line-through');
                // $('#fcr2').css('text-decoration', 'none');

                // $('#fcr_usaha1').css('text-decoration', 'line-through');
                // $('#fcr_usaha2').css('text-decoration', 'none');

                // $('#fcr_agunan1').css('text-decoration', 'line-through');
                // $('#fcr_agunan2').css('text-decoration', 'none');

                // $('#dokumen1').css('text-decoration', 'line-through');
                // $('#dokumen2').css('text-decoration', 'none');

                // $('#scoring1').css('text-decoration', 'line-through');
                // $('#scoring2').css('text-decoration', 'none');

            } else {
                alert(hasil.message)
            }
        });
    }

    function refresh_recapz() {
        isi_recap()
        tampil_button('save_recap')
    }
</script>