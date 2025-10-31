<h1>Recap</h1>

<fieldset>
    <h2>Recap</h2>
    <div class="row">
        <div class="col-lg-6">
            <table class="table table-responsive" border="0" width="100%">
                <tr>
                    <td>
                        No
                    </td>
                    <td>
                        Item
                    </td>
                    <td>
                        Status
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Data Entry</td>
                    <td>
                        <span id="data_entry1" style="display: none;">Oke</span><span id="data_entry2" style="display: none;">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        2
                    </td>
                    <td>
                        Formulir Call Report (FCR)
                    </td>
                    <td>
                        <span id="fcr1">Oke</span><span id="fcr2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        3
                    </td>
                    <td>
                        Lampiran FCR - Usaha
                    </td>
                    <td>
                        <span id="fcr_usaha1">Oke</span><span id="fcr_usaha2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        4
                    </td>
                    <td>
                        Lampiran FCR - Agunan
                    </td>
                    <td>
                        <span id="fcr_agunan1">Oke</span><span id="fcr_agunan2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        5
                    </td>
                    <td>
                        Document Pendukung
                    </td>
                    <td>
                        <span id="dokumen1">Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        6
                    </td>
                    <td>
                        FAK Data
                    </td>
                    <td>
                        <span id="fak_data1">Oke</span><span id="fak_data2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        7
                    </td>
                    <td>
                        FAK Modal
                    </td>
                    <td>
                        <span id="fak_modal1">Oke</span><span id="fak_modal2">Not Oke</span>
                    </td>
                </tr>

            </table>

        </div>
        <div class="col-lg-6">
            <table class="table table-responsive" border="0" width="100%">
                <tr>
                    <td>
                        No
                    </td>
                    <td>
                        Item
                    </td>
                    <td>
                        Status
                    </td>
                </tr>

                <tr>
                    <td>
                        8
                    </td>
                    <td>
                        FAK Proyeksi RL
                    </td>
                    <td>
                        <span id="fak_rl1">Oke</span><span id="fak_rl2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        9
                    </td>
                    <td>
                        Upload Laporan RL
                    </td>
                    <td>
                        <span id="lap_rl1">Oke</span><span id="lap_rl2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        10
                    </td>
                    <td>
                        CEF
                    </td>
                    <td>
                        <span id="ceftb1">Oke</span><span id="ceftb2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        11
                    </td>
                    <td>
                        FAA
                    </td>
                    <td>
                        <span id="faa1">Oke</span><span id="faa2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        12
                    </td>
                    <td>
                        MAUK
                    </td>
                    <td>
                        <span id="mauk1">Oke</span><span id="mauk2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        13
                    </td>
                    <td>
                        DCL Compliance
                    </td>
                    <td>
                        <span id="dcl1">Oke</span><span id="dcl2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        14
                    </td>
                    <td>
                        Scoring Koordinator
                    </td>
                    <td>
                        <span id="scoring1">Oke</span><span id="scoring2">Not Oke</span>
                    </td>
                </tr>
                <!-- <tr>
                                            <td>
                                                15
                                            </td>
                                            <td>
                                                Recap
                                            </td>
                                            <td>
                                                <span id="scoring1">Oke</span> / <span id="scoring2">Not Oke</span>
                                            </td>
                                        </tr> -->

            </table>

        </div>
    </div>

    <div class="form-group">
        <div class="row" id="hilang_pemasar">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Pemasar</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data) ? '' : 'disabled'; ?> id="disposisi_sc" name="disposisi_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row" id="hilang_koordinator">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Koordinator Pemasar</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> id="disposisi_koordinator_pemasar_sc" name="disposisi_koordinator_pemasar_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row" id="hilang_kacab">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Cabang</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_kepala_cabang) ? '' : 'disabled'; ?> id="disposisi_kepala_cabang_sc" name="disposisi_kepala_cabang_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row" id="hilang_analis">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Analis Kredit</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_analis_kredit) ? '' : 'disabled'; ?> id="disposisi_analis_kredit_sc" name="disposisi_analis_kredit_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row" id="hilang_kabag">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Bagian</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_kepala_bagian) ? '' : 'disabled'; ?> id="disposisi_kepala_bagian_sc" name="disposisi_kepala_bagian_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row" id="hilang_kadiv">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Divisi</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_kepala_divisi) ? '' : 'disabled'; ?> id="disposisi_kepala_divisi_sc" name="disposisi_kepala_divisi_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<script>
    var posisi = '<?php echo $posisi ?>';

    $(document).ready(function() {
        // disposisi tampil berjenjang
        $('#hilang_pemasar').hide();
        $('#hilang_koordinator').hide();
        $('#hilang_kacab').hide();
        $('#hilang_analis').hide();
        $('#hilang_kabag').hide();
        $('#hilang_kadiv').hide();

        if(posisi == 'pemasar'){
            $('#hilang_pemasar').show();
            $('#hilang_koordinator').hide();
            $('#hilang_kacab').hide();
            $('#hilang_analis').hide();
            $('#hilang_kabag').hide();
            $('#hilang_kadiv').hide();
        }
        if(posisi == 'koordinator pemasar'){
            $('#hilang_pemasar').show();
            $('#hilang_koordinator').show();
            $('#hilang_kacab').hide();
            $('#hilang_analis').hide();
            $('#hilang_kabag').hide();
            $('#hilang_kadiv').hide();
        }
        if(posisi == 'kepala cabang'){
            $('#hilang_pemasar').show();
            $('#hilang_koordinator').show();
            $('#hilang_kacab').show();
            $('#hilang_analis').hide();
            $('#hilang_kabag').hide();
            $('#hilang_kadiv').hide();
        }
        if(posisi == 'analis kredit'){
            $('#hilang_pemasar').show();
            $('#hilang_koordinator').show();
            $('#hilang_kacab').show();
            $('#hilang_analis').show();
            $('#hilang_kabag').hide();
            $('#hilang_kadiv').hide();
        }
        if(posisi == 'kepala bagian'){
            $('#hilang_pemasar').show();
            $('#hilang_koordinator').show();
            $('#hilang_kacab').show();
            $('#hilang_analis').show();
            $('#hilang_kabag').show();
            $('#hilang_kadiv').hide();
        }
        if(posisi == 'kepala divisi'){
            $('#hilang_pemasar').show();
            $('#hilang_koordinator').show();
            $('#hilang_kacab').show();
            $('#hilang_analis').show();
            $('#hilang_kabag').show();
            $('#hilang_kadiv').show();
        }
        // disposisi

        // memberi nilai awal edit Data Entry
        isi_recap()
        // simpan data entry
        $('#save_recap').click(function(e) {
            
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            // Mengirim data menggunakan AJAX
            // var hasil_recap = data_recap();
            // post_recap('edit_recap', hasil_recap, 'edit_recap')
            if (edit_data_pemasar) {
                var hasil_recap = data_recap();
                post_recap('edit_recap', hasil_recap, 'edit_recap');
                return;
            }

            // Jika edit_data_pemasar kosong, cek checkbox
            if (edit_data_koordinator) {
                if (!$('#cb_data_entry').prop('checked') && !$('#cb_fcr').prop('checked') && !$('#cb_fcr_usaha').prop('checked') && !$('#cb_fcr_agunan').prop('checked') && !$('#cb_dokumen').prop('checked')) {
                    $('#mohon').hide();
                    toastr.warning('Anda harus mencentang checkbox paraf sebelum melanjutkan.', 'Peringatan');
                    return;
                } else {
                    var hasil_recap = data_recap();
                    post_recap('edit_recap', hasil_recap, 'edit_recap');
                }
            }

            if (!edit_data_koordinator && !edit_data_pemasar) {
                if (!$('#cb_data_entry').prop('checked') && !$('#cb_fcr').prop('checked') && !$('#cb_fcr_usaha').prop('checked') && !$('#cb_fcr_agunan').prop('checked') && !$('#cb_dokumen').prop('checked') && !$('#cb_fak_data').prop('checked') && !$('#cb_fak_modal').prop('checked') && !$('#cb_fak_rl').prop('checked') && !$('#cb_lap_rl').prop('checked') && !$('#cb_cef').prop('checked') && !$('#cb_faa').prop('checked') && !$('#cb_mauk').prop('checked') && !$('#cb_dcl').prop('checked') && !$('#cb_scoring').prop('checked')) {
                    $('#mohon').hide();
                    toastr.warning('Anda harus mencentang checkbox paraf sebelum melanjutkan.', 'Peringatan');
                    return;
                } else {
                    var hasil_recap = data_recap();
                    post_recap('edit_recap', hasil_recap, 'edit_recap');
                }
            }
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

            edit_data : '<?= $edit_data ?>',
            edit_data_koordinator : '<?= $edit_data_koordinator ?>',
            edit_data_kepala_cabang : '<?= $edit_data_kepala_cabang ?>',
            edit_data_analis_kredit : '<?= $edit_data_analis_kredit ?>',
            edit_data_kepala_bagian : '<?= $edit_data_kepala_bagian ?>',
            edit_data_kepala_divisi : '<?= $edit_data_kepala_divisi ?>',

        };
        // console.log(edit_data)
        // console.log(data_recap.disposisi_sc)
        // console.log(data_recap.disposisi_koordinator_pemasar_sc)

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