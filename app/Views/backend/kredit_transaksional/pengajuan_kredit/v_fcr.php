<script>
    $(document).ready(function() {

        // memberi nilai awal edit Data Entry
        refresh_fcr()
        // simpan fcr
        $('#save_fcr').click(function(e) {
            // alert('save fcr di klik')
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            var data_fcr2 = data_data_fcr();
            // Mengirim data menggunakan AJAX
            post_fcr('edit_fcr', data_fcr2, 'save_fcr')

        });

    });
    // bikin function
    function isi_fcr() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.fcr;
                // alert(data.kd_data)
                // unit_kerja_fcr()
                $('#kd_data_tambah').val(hasil.message.data_entry.kd_data);

                $('#nomor_edit').val(data.nomor);
                $('#tanggal_edit').val(data.tanggal);
                $('#nama_debitur_edit').val(data.nama_debitur);
                $('#alamat_kantor_edit').val(data.alamat_kantor);
                $('#alamat_gudang_edit').val(data.alamat_gudang);
                $('#group_debitur_edit').val(data.group_debitur);
                $('#contact_person_edit').val(data.contact_person);
                $('#kunjungan_edit').val(data.kunjungan_oleh);
                // $('#kd_unit_kerja_edit').val(data.kd_unit_kerja);
                $('#tanggal_kunjungan_edit').val(data.tanggal_kunjungan);
                $('#lokasi_edit').val(data.lokasi_yang_dikunjungi);
                $('#tujuan_kunjungan_edit').val(data.tujuan_kunjungan);
                $('#hasil_kunjungan_edit').val(data.hasil_kunjungan);
                $('#tindak_lanjut_edit').val(data.tindak_lanjut);

            } else {
                alert(hasil.message)
            }
        });
    }

    function unit_kerja_fcr() {
        variabelGlobal(function(hasil) {
            if (hasil.status == 'success') {
                var kd_unit = hasil.message.fcr.kd_unit_kerja;
                console.log(kd_unit);
                $.ajax({
                    url: "<?php echo base_url('unit_kerja/get_unit'); ?>",
                    type: "get",
                    dataType: "JSON",
                    success: function(data) {
                        var options = data.unit;
                        var select = $('#kd_unit_kerja_edit');

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
                            dropdownParent: $('#kd_unit_kerja_edit').parent()
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

    function refresh_fcr() {
        isi_fcr()
        unit_kerja_fcr()
        // tampil_button('save_fcr')
    }

    function data_data_fcr() {
        var data_fcr1 = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            nomor_edit: $('#nomor_edit').val(),
            tanggal_edit: $('#tanggal_edit').val(),
            nama_debitur_edit: $('#nama_debitur_edit').val(),
            alamat_kantor_edit: $('#alamat_kantor_edit').val(),
            alamat_gudang_edit: $('#alamat_gudang_edit').val(),
            group_debitur_edit: $('#group_debitur_edit').val(),
            contact_person_edit: $('#contact_person_edit').val(),
            kunjungan_edit: $('#kunjungan_edit').val(),
            kd_unit_kerja_edit: $('#kd_unit_kerja_edit').val(),
            tanggal_kunjungan_edit: $('#tanggal_kunjungan_edit').val(),
            lokasi_edit: $('#lokasi_edit').val(),
            tujuan_kunjungan_edit: $('#tujuan_kunjungan_edit').val(),
            hasil_kunjungan_edit: $('#hasil_kunjungan_edit').val(),
            tindak_lanjut_edit: $('#tindak_lanjut_edit').val(),

            // upload dokumen
        };
        return data_fcr1;
    }

    function post_fcr(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            success: function(response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_fcr()
                    if (button == 'save_fcr') {
                        toastr.success(response.message, 'Berhasil')
                    }
                    if (button != 'save_fcr') {
                        var finish_fcr3 = data_fcr_usaha();
                        post_fcr_usaha('finish_fcr_usaha', finish_fcr3, 'finish_fcr_usaha')
                    }

                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                }
            },
            error: function(xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit fcr gagal', 'Error')
            }
        });

    }
</script>