<!-- disini coding viewnya -->
<h1>Formulir Call Report</h1>
<fieldset>
    <h2>Formulir Call Report</h2>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Nomor</label>
                <div class="col-lg-12">
                    <input id="nomor_edit" name="nomor_edit" type="text" placeholder="" class="form-control class-readonly" readonly>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Tanggal</label>
                <div class="col-lg-12">
                    <input id="tanggal_edit" readonly name="tanggal_edit" type="date" placeholder="" class="form-control class-readonly">

                </div>
            </div>

        </div>


    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Nama Debitur</label>
            <div class="col-lg-12">
                <input id="nama_debitur_edit" readonly name="nama_debitur_edit" type="text" placeholder="" class="form-control class-readonly">

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Alamat Kantor</label>
            <div class="col-lg-12">
                <textarea class="form-control" readonly id="alamat_kantor_edit" name="alamat_kantor_edit" rows="3"></textarea>

            </div>
        </div>


    </div>
    <div class="form-group row">


        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Alamat Gudang/ Pabrik/ Workshop</label>
            <div class="col-lg-12">
                <textarea class="form-control" readonly id="alamat_gudang_edit" name="alamat_gudang_edit" rows="3"></textarea>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Group Debitur</label>
            <div class="col-lg-12">
                <input id="group_debitur_edit" readonly name="group_debitur_edit" type="text" placeholder="" class="form-control class-readonly">

            </div>
        </div>



    </div>

    <div class="form-group row">


        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Contact Person</label>

            <div class="col-lg-12">
                <textarea class="form-control" id="contact_person_edit" name="contact_person_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Abdullah;Fitriani;Ahmad Rossy</p>
            </div>


        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Yang Melaksanakan Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="kunjungan_edit" name="kunjungan_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Abdullah;Fitriani;Ahmad Rossy</p>


            </div>
        </div>



    </div>
    <div class="form-group row">

        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Unit Kerja</label>
            <div class="col-lg-12">
                <select class="form-control class-disabled select" id="kd_unit_kerja_edit" name="kd_unit_kerja_edit" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>

                </select>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tanggal Kunjungan</label>
            <div class="col-lg-12">
                <input id="tanggal_kunjungan_edit" name="tanggal_kunjungan_edit" type="date" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

            </div>
        </div>


    </div>
    <div class="form-group row">



        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Lokasi Yang Dikunjungi</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="lokasi_edit" name="lokasi_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Lokasi;Lokasi B;Lokasi C</p>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tujuan Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="tujuan_kunjungan_edit" name="tujuan_kunjungan_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

            </div>
        </div>



    </div>
    <div class="form-group row">



        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Hasil Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="hasil_kunjungan_edit" name="hasil_kunjungan_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tindak Lanjut</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="tindak_lanjut_edit" name="tindak_lanjut_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_fcr" title="Checkbox ini sebagai paraf" name="cb_fcr" <?php echo empty($edit_data) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>





</fieldset>

<script>
    var kd_level = <?= json_encode(session()->get('kd_level_user')) ?>;
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

            if (edit_data_pemasar) {
                // Jika edit_data_koordinator null atau kosong
                var data_fcr2 = data_data_fcr();
                // Mengirim data menggunakan AJAX
                post_fcr('edit_fcr', data_fcr2, 'save_fcr')
            } else {
                // Jika edit_data_koordinator memiliki nilai
                var data_fcr2 = paraf_fcr();
                post_paraf('paraf_fcr', data_fcr2, 'save_fcr');
            }

        });

    });

    // bikin function
    function isi_fcr() {
        variabelGlobal(function(hasil) {
            
            if (hasil.status == 'success') {
                var data = hasil.message.fcr;
                var data_paraf = hasil.message.paraf;
                
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

                if (Array.isArray(data_paraf) && data_paraf.length > 0) {
                    let paraf = data_paraf.find(p => p.nomor_halaman == '2'); // Cari nomor_halaman = 4

                    if (paraf && paraf.kd_level && typeof kd_level !== "undefined" &&
                        paraf.kd_level === kd_level &&
                        paraf.kd_data === data.kd_data &&
                        paraf.nama_halaman === 'FCR') {

                        $('#cb_fcr').prop('checked', paraf.ceklis === 'true');
                    } else {
                        $('#cb_fcr').prop('checked', false);
                    }
                } else {
                    $('#cb_fcr').prop('checked', false);
                }

            } else {
                alert(hasil.message)
            }
        });
    }

    function unit_kerja_fcr() {
        variabelGlobal(function(hasil) {
            if (hasil.status == 'success') {
                var kd_unit = hasil.message.fcr.kd_unit_kerja;
                
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
                
                toastr.error('Edit fcr gagal', 'Error')
            }
        });

    }

    function paraf_fcr() {
        var data_fcr = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            unit_kerja_tambah: $('#unit_kerja_tambah').val(),
            nomor_halaman: '2',
            nama_halaman: 'FCR',

            cb_fcr: $('#cb_fcr').is(':checked')
            // upload dokumen
        };
        return data_fcr;
    }
</script>