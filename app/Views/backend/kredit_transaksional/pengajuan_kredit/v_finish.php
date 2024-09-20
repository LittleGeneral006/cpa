<script>
    $(document).ready(function() {
        // $('a[href="#finish"]').text('New Title haha');
        // $('a[href="#finish"]').hide();
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
                // Mengirim data menggunakan AJAX
                var data_entry_finish = data_data_entry(kumpulan_agunan);
                post_data_entry('edit_finish', data_entry_finish, 'finish')

            } else {
                $('#mohon').hide()
                toastr.warning('Jenis agunan harus diisi', 'Gagal')
            }

        });

    });
</script>