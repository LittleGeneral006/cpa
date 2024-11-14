<script>
    $(document).ready(function() {

        // memberi nilai awal edit Data Entry
        isi_recap()
        // simpan data entry
        $('#save_recap').click(function(e) {
            // alert('save fcr di klik')
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            // Mengirim data menggunakan AJAX
            var hasil_recap = data_recap();
            post_recap('edit_recap', hasil_recap, 'edit_recap')
        });

        $('#save_return').click(function(e) {
            // alert('save return di klik')
            document.getElementById("form_return").reset();
            $("#modal_return").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>pengajuan/get_data_entry/" + '<?php echo $data_entry->kd_data ?>',
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    if (response.status == 'success') {
                        $('#kd_data_return').val(response.message.kd_data);
                        $('#nama_debitur_return').val(response.message.nama_debitur);
                    } else {
                        alert("Gagal get data return pengajuan kredit(1)");
                    }


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal get data return pengajuan kredit(2)");
                }
            });

        });

        $('#save_reject').click(function(e) {

            document.getElementById("form_reject").reset();
            $("#modal_reject").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>pengajuan/get_data_entry/" + '<?php echo $data_entry->kd_data ?>',
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    if (response.status == 'success') {
                        $('#kd_data_reject').val(response.message.kd_data);
                        $('#nama_debitur_reject').val(response.message.nama_debitur);
                    } else {
                        alert("Gagal get data reject pengajuan kredit(1)");
                    }


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal get data reject pengajuan kredit(2)");
                }
            });

        });

        // batas baru

        // panggil function buat separator input disemua tab pemasar
        separator_input('nilai_proyek_tambah', 'nilai_proyek_tambah_separators')
        separator_input('plafond_tambah', 'plafond_separators')
        // batas panggil function buat separator input disemua tab pemasar
    });
    // bikin function
    function isi_recap() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.kirim;
                // alert(data.kd_data)
                // unit_kerja_fcr()
                $('#kd_data_tambah').val(hasil.message.data_entry.kd_data);

                $('#disposisi_sc').val(data.rekomendasi_pemasar);
                $('#disposisi_koordinator_pemasar_sc').val(data.rekomendasi_koor);
                $('#disposisi_kepala_cabang_sc').val(data.rekomendasi_kacab);
                $('#disposisi_analis_kredit_sc').val(data.rekomendasi_analis);
                $('#disposisi_kepala_bagian_sc').val(data.rekomendasi_kabag);
                $('#disposisi_kepala_divisi_sc').val(data.rekomendasi_kadiv);

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

    function refresh_recap() {
        isi_recap()
        tampil_button('save_recap')
    }

    function data_recap() {
        var data_recap = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            disposisi_sc: $('#disposisi_sc').val(),
            disposisi_koordinator_pemasar_sc: $('#disposisi_koordinator_pemasar_sc').val(),
            disposisi_kepala_cabang_sc: $('#disposisi_kepala_cabang_sc').val(),
            disposisi_analis_kredit_sc: $('#disposisi_analis_kredit_sc').val(),
            disposisi_kepala_bagian_sc: $('#disposisi_kepala_bagian_sc').val(),
            disposisi_kepala_divisi_sc: $('#disposisi_kepala_divisi_sc').val(),

        };
        return data_recap
    }

    function post_recap(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            success: function(response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_recap()
                    if (button == 'edit_recap') {
                        toastr.success(response.message, 'Berhasil')
                    } else if (button == 'finish_recap') {
                        toastr.success('Sukses mengirim data', 'Berhasil')
                        return
                        // alert('Kirim data berhasil');
                    }
                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                }
            },
            error: function(xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit recap gagal', 'Error')
            }
        });
    }
    
    function tampil_disposisi(kd_data) {
        $.ajax({
            url: '<?php echo base_url(); ?>pengajuan/tampil_disposisi/' + kd_data,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log('Success:', response);
                // $('a[href="#finish"]').text('New Title haha');
                // $('a[href="#finish"]').hide();
                $('#disposisi_sc').prop('readonly', true);
                $('#disposisi_koordinator_pemasar_sc').prop('readonly', true);
                $('#disposisi_kepala_cabang_sc').prop('readonly', true);
                $('#disposisi_analis_kredit_sc').prop('readonly', true);
                $('#disposisi_kepala_bagian_sc').prop('readonly', true);
                $('#disposisi_kepala_divisi_sc').prop('readonly', true);

                // $('#save_return').hide();

                // $data_kirim = [
                //     'status' => 'success',
                //     'pemasar' => '0',
                //     'koor' => '0',
                //     'kacab' => '0',
                //     'analis' => '0',
                //     'kabag' => '0',
                //     'kadiv' => '0',
                // ];

                if (response.status == 'success') {
                    if (response.pemasar == '1') {
                        $('#disposisi_sc').prop('readonly', false);
                    }
                    if (response.koor == '1') {
                        $('#disposisi_koordinator_pemasar_sc').prop('readonly', false);
                    }
                    if (response.kacab == '1') {
                        $('#disposisi_kepala_cabang_sc').prop('readonly', false);
                    }
                    if (response.analis == '1') {
                        $('#disposisi_analis_kredit_sc').prop('readonly', false);
                    }
                    if (response.kabag == '1') {
                        $('#disposisi_kepala_bagian_sc').prop('readonly', false);
                    }
                    if (response.kadiv == '1') {
                        $('#disposisi_kepala_divisi_sc').prop('readonly', false);
                    }

                    if (response.tampil_btn_return == '1') {
                        $('#save_return').show();
                        $('#save_reject').show();
                    } else {
                        $('#save_return').hide();
                        $('#save_reject').hide();
                    }
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

    //proses edit
    $("#form_return").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>pengajuan/edit_return",
                data: $("#form_return").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_return").modal('hide')
                        toastr.success('Return Berhasil', 'Berhasil')

                        tampil_btn_finish('<?php echo $data_entry->kd_data ?>')
                        tampil_disposisi('<?php echo $data_entry->kd_data ?>')
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });

    //proses edit
    $("#form_reject").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>pengajuan/edit_reject",
                data: $("#form_reject").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_reject").modal('hide')
                        // toastr.success('Reject Berhasil', 'Berhasil')
                        alert('Reject Berhasil')

                        window.location.href = "<?php echo base_url('pengajuan-kredit-transaksional') ?>"

                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });

    // fungsi buat separator angka pada form tambah, edit tampil pengajuan kredit, tampil data, on input pada form edit
    function formatNumber(num) {
        // Ubah angka menjadi string dan pisahkan bagian integer dan desimal
        var parts = num.toString().split(".");

        // Ganti ribuan separator dengan titik
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        // Jika ada bagian desimal, gabungkan kembali dengan koma sebagai pemisah desimal
        return parts.join(",");
    }

    function separator_edit(angka, id_letak) {
        // var hasil = '';
        if (angka != '' && angka != null) {
            var angka_olah = formatNumber(angka);
            // console.log(angka)
            // console.log(id_letak)

            $('#' + id_letak).text(angka_olah);
        } else {
            $('#' + id_letak).text('');
        }
    }

    function separator_input(pokok_field, pokok_separator) {
        $('#' + pokok_field).on('input', function() {
            var inputValue = $(this).val();
            var formattedValue = formatNumber(inputValue);
            $('#' + pokok_separator).text(formattedValue);
        });
    }
</script>