<h1>Lampiran FCR Usaha</h1>
<fieldset>
    <h2>Lampiran FCR Usaha</h2>
    <div class="form-group">
        <h2 class="text-center text-danger">Spesifikasi dan Kondisi Bangunan (Kantor)</h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kondisi Fisik</label>
                <div class="col-lg-12">
                    <input id="kondisi_fisik_kantor" name="kondisi_fisik_kantor" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Luas Tanah</label>
                <div class="col-lg-12">
                    <input id="luas_tanah_kantor" name="luas_tanah_kantor" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Luas Bangunan</label>
                <div class="col-lg-12">
                    <input id="luas_bangunan_kantor" name="luas_bangunan_kantor" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fasilitas/ Sarana</label>
                <div class="col-lg-12">
                    <input id="fasilitas_kantor" name="fasilitas_kantor" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Lokasi</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="lokasi_kantor" name="lokasi_kantor" rows="3" readonly></textarea>

                </div>
            </div>


        </div>
        <h2 class="text-center text-danger">Spesifikasi dan Kondisi Bangunan (Workshop)</h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kondisi Fisik</label>
                <div class="col-lg-12">
                    <input id="kondisi_fisik_workshop" name="kondisi_fisik_workshop" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Luas Tanah</label>
                <div class="col-lg-12">
                    <input id="luas_tanah_workshop" name="luas_tanah_workshop" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Luas Bangunan</label>
                <div class="col-lg-12">
                    <input id="luas_bangunan_workshop" name="luas_bangunan_workshop" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fasilitas/ Sarana</label>
                <div class="col-lg-12">
                    <input id="fasilitas_workshop" name="fasilitas_workshop" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Lokasi</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="lokasi_workshop" name="lokasi_workshop" rows="3"
                        readonly></textarea>

                </div>
            </div>


        </div>
        <h2 class="text-center text-danger">Spesifikasi & Kondisi Mesin & Peralatan Pabrik/ Kerja (Mesin-Mesin Kerja)
        </h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fungsi Mesin Utama</label>
                <div class="col-lg-12">
                    <input id="mesin_utama_m" name="mesin_utama_m" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fungsi Mesin Penunjang</label>
                <div class="col-lg-12">
                    <input id="mesin_penunjang_m" name="mesin_penunjang_m" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kondisi/ Merk/ Tahun Pembuatan</label>
                <div class="col-lg-12">
                    <input id="kondisi_m" name="kondisi_m" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kapasitas Mesin</label>
                <div class="col-lg-12">
                    <input id="kapasitas_mesin_m" name="kapasitas_mesin_m" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <h2 class="text-center text-danger">Spesifikasi & Kondisi Mesin & Peralatan Pabrik/ Kerja (Peralatan Kerja)</h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fungsi/ Jenis Peralatan Utama</label>
                <div class="col-lg-12">
                    <input id="peralatan_utama_p" name="peralatan_utama_p" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fungsi/ jenis Peralatan Penunjang</label>
                <div class="col-lg-12">
                    <input id="peralatan_penunjang_p" name="peralatan_penunjang_p" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kondisi/ Merk/ Tahun Pembuatan</label>
                <div class="col-lg-12">
                    <input id="kondisi_p" name="kondisi_p" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Lainnya</label>
                <div class="col-lg-12">
                    <input id="lainnya_p" name="lainnya_p" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <h2 class="text-center text-danger">Spesifikasi & Kondisi Peralatan Berat/ Kendaraan (Alat Berat)</h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fungsi/ Jenis</label>
                <div class="col-lg-12">
                    <input id="fungsi_b" name="fungsi_b" type="text" placeholder="" class="form-control class-readonly"
                        <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Merk/ Tahun Pembuatan</label>
                <div class="col-lg-12">
                    <input id="merk_b" name="merk_b" type="text" placeholder="" class="form-control class-readonly"
                        <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kondisi/ Jumlah</label>
                <div class="col-lg-12">
                    <input id="kondisi_b" name="kondisi_b" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Lain-lain</label>
                <div class="col-lg-12">
                    <input id="lainnya_b" name="lainnya_b" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <h2 class="text-center text-danger">Spesifikasi & Kondisi Peralatan Berat/ Kendaraan (Kendaraan)</h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Fungsi/ Jenis</label>
                <div class="col-lg-12">
                    <input id="fungsi_k" name="fungsi_k" type="text" placeholder="" class="form-control class-readonly"
                        <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Merk/ Tahun Pembuatan</label>
                <div class="col-lg-12">
                    <input id="merk_k" name="merk_k" type="text" placeholder="" class="form-control class-readonly"
                        <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kondisi/ Jumlah</label>
                <div class="col-lg-12">
                    <input id="kondisi_k" name="kondisi_k" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Lain-lain</label>
                <div class="col-lg-12">
                    <input id="lainnya_k" name="lainnya_k" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <h2 class="text-center text-danger">Spesifikasi & Kondisi Proyek</h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Lokasi</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="lokasi_sk" name="lokasi_sk" rows="3" readonly></textarea>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Luas Lokasi/ Bangunan/ Fisik/ Proyek</label>
                <div class="col-lg-12">
                    <input id="luas_lokasi_sk" name="luas_lokasi_sk" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Kondisi Fisik</label>
                <div class="col-lg-12">
                    <input id="kondisi_fisik_sk" name="kondisi_fisik_sk" type="text" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>


        </div>
        <h2 class="text-center text-danger">Spesifikasi Jumlah & Kondisi Persediaan/ Stok</h2>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Bahan Baku/ Pembantu</label>
                <div class="col-lg-12">
                    <input id="bahan_baku" name="bahan_baku" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Bahan Setengah Jadi</label>
                <div class="col-lg-12">
                    <input id="bahan_setengah_jadi" name="bahan_setengah_jadi" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Persediaan Material</label>
                <div class="col-lg-12">
                    <input id="persediaan_material" name="persediaan_material" type="number" placeholder=""
                        class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>


        </div>



    </div>




    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_fcr_usaha" title="Checkbox ini sebagai paraf"
                    name="cb_fcr_usaha" <?php echo empty($edit_data) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
</fieldset>
<script>
    $(document).ready(function () {

        // memberi nilai awal edit Data Entry
        refresh_fcr_usaha()
        // simpan data entry
        $('#save_fcr_usaha').click(function (e) {
            // alert('save fcr di klik')
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            // var data_fcr_usaha2 = data_fcr_usaha();
            // post_fcr_usaha('edit_fcr_usaha', data_fcr_usaha2, 'save_fcr_usaha')
            // Mengirim data menggunakan AJAX

            if (edit_data_pemasar) {
                // Jika edit_data_koordinator null atau kosong
                var data_fcr_usaha2 = data_fcr_usaha();
                // Mengirim data menggunakan AJAX
                post_fcr_usaha('edit_fcr_usaha', data_fcr_usaha2, 'save_fcr_usaha')
            } else {
                // Jika edit_data_koordinator memiliki nilai
                var data_fcr_usaha2 = paraf_fcr_usaha();
                post_paraf('paraf_fcr_usaha', data_fcr_usaha2, 'save_fcr_usaha');
            }
        });

    });
    // bikin function
    function isi_fcr_usaha() {
        variabelGlobal(function (hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.fcr_usaha;
                var data_paraf = hasil.message.paraf;
                // alert(data.kd_data)
                // unit_kerja_fcr()
                $('#kd_data_tambah').val(hasil.message.data_entry.kd_data);

                $('#kondisi_fisik_kantor').val(data.kondisi_fisik_kantor);
                $('#luas_tanah_kantor').val(data.luas_tanah_kantor);
                $('#luas_bangunan_kantor').val(data.luas_bangunan_kantor);
                $('#fasilitas_kantor').val(data.fasilitas_kantor);
                $('#lokasi_kantor').val(data.lokasi_kantor);

                $('#kondisi_fisik_workshop').val(data.kondisi_fisik_workshop);
                $('#luas_tanah_workshop').val(data.luas_tanah_workshop);
                $('#luas_bangunan_workshop').val(data.luas_bangunan_workshop);
                $('#fasilitas_workshop').val(data.fasilitas_workshop);
                $('#lokasi_workshop').val(data.lokasi_workshop);

                $('#mesin_utama_m').val(data.fungsi_mesin_utama);
                $('#mesin_penunjang_m').val(data.fungsi_mesin_penunjang);
                $('#kondisi_m').val(data.kondisi);
                $('#kapasitas_mesin_m').val(data.kapasitas_mesin);

                $('#peralatan_utama_p').val(data.peralatan_utama);
                $('#peralatan_penunjang_p').val(data.peralatan_penunjang);
                $('#kondisi_p').val(data.kondisi_merk);
                $('#lainnya_p').val(data.lainnya);

                $('#fungsi_b').val(data.fungsi_aab);
                $('#merk_b').val(data.merk_aab);
                $('#kondisi_b').val(data.kondisi_aab);
                $('#lainnya_b').val(data.lain_lain_aab);

                $('#fungsi_k').val(data.fungsi_kend);
                $('#merk_k').val(data.merk_kend);
                $('#kondisi_k').val(data.kondisi_kend);
                $('#lainnya_k').val(data.lain_lain_kend);

                $('#lokasi_sk').val(data.lokasi);
                $('#luas_lokasi_sk').val(data.luas_lokasi);
                $('#kondisi_fisik_sk').val(data.kondisi_fisik);

                $('#bahan_baku').val(data.bahan_baku);
                $('#bahan_setengah_jadi').val(data.bahan_setengah_jadi);
                $('#persediaan_material').val(data.persediaan_material);

                if (Array.isArray(data_paraf) && data_paraf.length > 0) {
                    let paraf = data_paraf.find(p => p.nomor_halaman == '3'); // Cari nomor_halaman = 4

                    if (paraf && paraf.kd_level && typeof kd_level !== "undefined" &&
                        paraf.kd_level === kd_level &&
                        paraf.kd_data === data.kd_data &&
                        paraf.nama_halaman === 'FCR Usaha') {

                        $('#cb_fcr_usaha').prop('checked', paraf.ceklis === 'true');
                    } else {
                        $('#cb_fcr_usaha').prop('checked', false);
                    }
                } else {
                    $('#cb_fcr_usaha').prop('checked', false);
                }

            } else {
                alert(hasil.message)
            }
        });
    }

    function refresh_fcr_usaha() {
        isi_fcr_usaha()
        // tampil_button('save_fcr_usaha')
    }

    function data_fcr_usaha() {
        var data_fcr_usaha = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            kondisi_fisik_kantor: $('#kondisi_fisik_kantor').val(),
            luas_tanah_kantor: $('#luas_tanah_kantor').val(),
            luas_bangunan_kantor: $('#luas_bangunan_kantor').val(),
            fasilitas_kantor: $('#fasilitas_kantor').val(),
            lokasi_kantor: $('#lokasi_kantor').val(),

            kondisi_fisik_workshop: $('#kondisi_fisik_workshop').val(),
            luas_tanah_workshop: $('#luas_tanah_workshop').val(),
            luas_bangunan_workshop: $('#luas_bangunan_workshop').val(),
            fasilitas_workshop: $('#fasilitas_workshop').val(),
            lokasi_workshop: $('#lokasi_workshop').val(),

            mesin_utama_m: $('#mesin_utama_m').val(),
            mesin_penunjang_m: $('#mesin_penunjang_m').val(),
            kondisi_m: $('#kondisi_m').val(),
            kapasitas_mesin_m: $('#kapasitas_mesin_m').val(),

            peralatan_utama_p: $('#peralatan_utama_p').val(),
            peralatan_penunjang_p: $('#peralatan_penunjang_p').val(),
            kondisi_p: $('#kondisi_p').val(),
            lainnya_p: $('#lainnya_p').val(),

            fungsi_b: $('#fungsi_b').val(),
            merk_b: $('#merk_b').val(),
            kondisi_b: $('#kondisi_b').val(),
            lainnya_b: $('#lainnya_b').val(),

            fungsi_k: $('#fungsi_k').val(),
            merk_k: $('#merk_k').val(),
            kondisi_k: $('#kondisi_k').val(),
            lainnya_k: $('#lainnya_k').val(),

            lokasi_sk: $('#lokasi_sk').val(),
            luas_lokasi_sk: $('#luas_lokasi_sk').val(),
            kondisi_fisik_sk: $('#kondisi_fisik_sk').val(),

            bahan_baku: $('#bahan_baku').val(),
            bahan_setengah_jadi: $('#bahan_setengah_jadi').val(),
            persediaan_material: $('#persediaan_material').val()

        };
        return data_fcr_usaha;
    }

    function post_fcr_usaha(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            success: function (response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_fcr_usaha()
                    if (button == 'save_fcr_usaha') {
                        toastr.success(response.message, 'Berhasil')
                    }
                    if (button != 'save_fcr_usaha') {
                        // var fcr_agunan3 = data_fcr_agunan();
                        // post_fcr_agunan('finish_fcr_agunan', fcr_agunan3, 'finish_fcr_agunan')

                        var fcr_agunan_tanah = data_fcr_agunan();
                        var post_data_tanah = post_fcr_agunan('finish_fcr_agunan_tanah', fcr_agunan_tanah, 'finish_fcr_agunan')
                        if (1 == 1) {
                            var fcr_agunan_bangunan = data_fcr_agunan_bangunan();
                            var post_data_bangunan = post_fcr_agunan('finish_fcr_agunan_bangunan', fcr_agunan_bangunan, 'finish_fcr_agunan')
                            if (1 == 1) {
                                var fcr_agunan_bb = data_fcr_agunan_bb();
                                post_fcr_agunan('finish_fcr_agunan_bb', fcr_agunan_bb, 'finish_fcr_agunan')
                            }
                        }
                    }

                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                }
            },
            error: function (xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit fcr gagal', 'Error')
            }
        });

    }

    function cek_post_agunan(kd_data) {
        $.ajax({
            url: '<?php echo base_url(); ?>pengajuan/cek_agunan/' + kd_data,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
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
            error: function (xhr, status, error) {
                console.log('Error response text:', xhr.responseText);
                console.log('Error status:', status);
                console.log('Error:', error);
                // console.error('Error response text:', xhr.responseText);
                // console.error('Error status:', status);
                // console.error('Error:', error);
            }
        });
    }

    function paraf_fcr_usaha() {
        var data_fcr = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            unit_kerja_tambah: $('#unit_kerja_tambah').val(),
            nomor_halaman: '3',
            nama_halaman: 'FCR Usaha',

            cb_fcr_usaha: $('#cb_fcr_usaha').is(':checked')
            // upload dokumen
        };
        return data_fcr;
    }
</script>