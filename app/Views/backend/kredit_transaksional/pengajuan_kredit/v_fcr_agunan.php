<h1>Lampiran FCR Agunan</h1>
<fieldset>
    <h2>Lampiran FCR Agunan</h2>
    <div class="row">

        <div class="col-lg-12">
            <button type="button" class="btn btn-primary btn-tambah" id="btn_tambah_tanah" style="display:none" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i> Tanah</button>
            <button type="button" class="btn btn-primary btn-tambah" id="btn_tambah_bangunan" style="display:none" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i> Bangunan</button>
            <!-- <button type="button"  class="btn btn-primary btn-tambah" id="btn_tambah_lingkungan" style="display:none"><i class="fa fa-plus"></i> Lingkungan</button> -->
            <button type="button" class="btn btn-primary btn-tambah" id="btn_tambah_barang_bergerak"
                style="display:none" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>
                Barang Bergerak</button>

        </div>

    </div>


    <div class="form-group">
        <!-- agunan dinamis disini -->
        <div id="tanah_dinamis">

        </div>
        <div id="bangunan_dinamis">

        </div>
        <div id="bb_dinamis">

        </div>
        <!-- agunan dinamis disini -->

    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_fcr_agunan" title="Checkbox ini sebagai paraf"
                    name="cb_fcr_agunan" <?php echo empty($edit_data) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
</fieldset>
<script>
    $(document).ready(function () {
        refresh_fcr_agunan()
        panggil_perulangan()
        // onInputLuas()
        // $(".lihat_gambar").on("click", function() {
        //     var button_id = $(this).attr("data-id");
        //     // console.log('button_id')
        //     lihatGambar(button_id)
        // });
        // $("#edit_gambar").on("click", function() {
        //     editGambar()
        // });
        var counter = 0;
        $("#form").on("click", "#btn_tambah_tanah", function () {
            variabelGlobal(function (hasil) {
                // console.log(hasil.message.data_entry.kd_data);
                if (hasil.status == 'success') {
                    var data = hasil.message.fcr_agunan;
                    jumlah_elemen = hasil.message.bukti_kepemilikan.length;
                    var bukti_kepemilikan = hasil.message.bukti_kepemilikan;
                    // console.log('ini jumlah_elemen' + jumlah_elemen);
                    if (counter > jumlah_elemen) {
                        counter = counter;
                    } else if (jumlah_elemen != 0) {
                        counter = jumlah_elemen;
                    }
                    counter++;
                    // console.log(counter);
                    var inputan_tanah =
                        '<div id="bagian_tanah' + counter + '">' +

                        '<h2 class="text-center text-danger">Tanah</h2>' +
                        '<h3 class="text-left text-success">Status tanah/ Jenis pemilikan</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Bukti Kepemilikan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="bukti_kepemilikan' + counter + '" name="bukti_kepemilikan[]" type="text" placeholder="" class="form-control class-readonly bukti_kepemilikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tanggal Bukti Kepemilikan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="tanggal_bukti_kepemilikan' + counter + '" name="tanggal_bukti_kepemilikan[]" type="date" placeholder="" class="form-control class-readonly tanggal_bukti_kepemilikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +

                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Surat Ukur</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="surat_ukur' + counter + '" name="surat_ukur[]" type="text" placeholder="" class="form-control class-readonly surat_ukur" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tanggal Surat Ukur</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="tanggal_surat_ukur' + counter + '" name="tanggal_surat_ukur[]" type="date" placeholder="" class="form-control class-readonly tanggal_surat_ukur" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">NIB</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="nib' + counter + '" name="nib[]" type="text" placeholder="" class="form-control class-readonly nib" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Penunjuk (warkah)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="penunjuk' + counter + '" name="penunjuk[]" type="text" placeholder="" class="form-control class-readonly penunjuk" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<h3 class="text-left text-success">Letak Tanah</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kelurahan/ Desa</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kelurahan' + counter + '" name="kelurahan[]" type="text" placeholder="" class="form-control class-readonly kelurahan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kecamatan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kecamatan' + counter + '" name="kecamatan[]" type="text" placeholder="" class="form-control class-readonly kecamatan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kabupaten</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kabupaten' + counter + '" name="kabupaten[]" type="text" placeholder="" class="form-control class-readonly kabupaten" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Provinsi</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="provinsi' + counter + '" name="provinsi[]" type="text" placeholder="" class="form-control class-readonly provinsi" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<h3 class="text-left text-success">Luas Tanah</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Utara (M)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="utara' + counter + '" name="utara[]" type="number" placeholder="" class="form-control class-readonly utara" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Barat (M)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="barat' + counter + '" name="barat[]" type="number" placeholder="" class="form-control class-readonly barat" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Selatan (M)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="selatan' + counter + '" name="selatan[]" type="number" placeholder="" class="form-control class-readonly selatan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Timur (M)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="timur' + counter + '" name="timur[]" type="number" placeholder="" class="form-control class-readonly timur" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Luas (M2)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="luas' + counter + '" name="luas[]" type="number" placeholder="" class="form-control class-readonly luas" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +



                        '</div>' +
                        '<h3 class="text-left text-success">Perwatasan</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kanan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kanan' + counter + '" name="kanan[]" type="text" placeholder="" class="form-control class-readonly kanan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kiri</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kiri' + counter + '" name="kiri[]" type="text" placeholder="" class="form-control class-readonly kiri" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Depan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="depan' + counter + '" name="depan[]" type="text" placeholder="" class="form-control class-readonly depan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Belakang</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="belakang' + counter + '" name="belakang[]" type="text" placeholder="" class="form-control class-readonly belakang" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<h3 class="text-left text-success">Daerah Pemakaian</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Daerah Pemakaian</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="daerah_pemakaian' + counter + '" name="daerah_pemakaian[]" type="text" placeholder="" class="form-control class-readonly daerah_pemakaian" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<h3 class="text-left text-success">Kondisi Tanah</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kondisi Tanah</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kondisi_tanah' + counter + '" name="kondisi_tanah[]" type="text" placeholder="" class="form-control class-readonly kondisi_tanah" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<h3 class="text-left text-success">Harga Tanah (M2)</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Menurut Buku Tanah (Permeter)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="buku_tanah' + counter + '" name="buku_tanah[]" type="number" placeholder="" class="form-control class-readonly buku_tanah" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<p>Menurut Buku Tanah: <span id="buku_tanah' + counter + '_separator" class="mask"></span></p>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Menurut Pasar (Permeter)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="menurut_pasar' + counter + '" name="menurut_pasar[]" type="number" placeholder="" class="form-control class-readonly menurut_pasar" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<p>Menurut Pasar: <span id="menurut_pasar' + counter + '_separator" class="mask"></span></p>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<h3 class="text-left text-success">Keterangan Lain</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Keterangan Lain</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="keterangan_lain' + counter + '" name="keterangan_lain[]" type="text" placeholder="" class="form-control class-readonly keterangan_lain" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<br>' +
                        '<button type="button" class="btn btn-danger btn-sm btn_hapus_tanah" data-id="' + counter + '" id="btn_hapus_tanah' + counter + '" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash"></i> Hapus</button>' +
                        '</div>' +
                        '</div>' +

                        '</div>' +


                        '</div>';
                    $("#tanah_dinamis").append(inputan_tanah);
                    resizeJquerySteps();
                    separator_input('buku_tanah' + counter, 'buku_tanah' + counter + '_separator');
                    separator_input('menurut_pasar' + counter, 'menurut_pasar' + counter + '_separator');

                } else {
                    alert(hasil.message)
                }
            });

            // $('#tanah_dinamis').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $('#form').on('click', '.btn_hapus_tanah', function () {
            if (confirm('Yakin ingin menghapus form input tanah ini?')) {
                counter--;
                var button_id = $(this).attr("data-id");
                // alert(button_id)
                $('#bagian_tanah' + button_id).remove();
                resizeJquerySteps();
            }

        });

        // input dinamis bangunan
        var hitung_bangunan = 0;
        $("#form").on("click", "#btn_tambah_bangunan", function () {
            variabelGlobal(function (hasil) {
                // console.log(hasil.message.data_entry.kd_data);
                if (hasil.status == 'success') {
                    jumlah_elemen = hasil.message.imb.length;
                    // console.log('ini jumlah_elemen' + jumlah_elemen);
                    if (hitung_bangunan > jumlah_elemen) {
                        hitung_bangunan = hitung_bangunan;
                    } else if (jumlah_elemen != 0) {
                        hitung_bangunan = jumlah_elemen;
                    }
                    hitung_bangunan++;
                    // console.log(hitung_bangunan);
                    // '<input id="bukti_kepemilikan' + counter + '" name="bukti_kepemilikan[]" type="text" placeholder="" class="form-control class-readonly bukti_kepemilikan">' +
                    var inputan_bangunan =
                        '<div id="bagian_bangunan' + hitung_bangunan + '">' +
                        '<h2 class="text-center text-danger">Bangunan</h2>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">IMB</label>' +
                        ' <div class="col-lg-12">' +
                        '<input id="imb' + hitung_bangunan + '" name="imb[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly imb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Pondasi</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="pondasi' + hitung_bangunan + '" name="pondasi[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly pondasi" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        ' </div>' +

                        '</div>' +
                        '<div class="row">' +

                        ' <div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Lantai</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="lantai' + hitung_bangunan + '" name="lantai[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly lantai" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        ' <div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tinggi Lantai Terhadap Jalan</label>' +
                        '  <div class="col-lg-12">' +
                        ' <input id="tinggi_lantai_terhadap_jalan' + hitung_bangunan + '" name="tinggi_lantai_terhadap_jalan[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly tinggi_lantai_terhadap_jalan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        ' </div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Rangka</label>' +
                        '<div class="col-lg-12">' +
                        ' <input id="rangka' + hitung_bangunan + '" name="rangka[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly rangka">' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Dinding</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="dinding' + hitung_bangunan + '" name="dinding[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly dinding" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        ' </div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Langit - Langit Plafond</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="langit_plafond' + hitung_bangunan + '" name="langit_plafond[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly langit_plafond" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Atap</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="atap' + hitung_bangunan + '" name="atap[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly atap" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tahun Pembangunan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="tahun_pembangunan' + hitung_bangunan + '" name="tahun_pembangunan[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly tahun_pembangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Rehab/ Perbaikan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="rehap_perbaikan' + hitung_bangunan + '" name="rehap_perbaikan[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly rehap_perbaikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<h3 class="text-left text-success">Biaya yang Dikeluarkan</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Saat Pembelian Tanah</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="saat_pembelian_tanah' + hitung_bangunan + '" name="saat_pembelian_tanah[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly saat_pembelian_tanah" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<p>Saat Pembelian Tanah: <span id="saat_pembelian_tanah' + hitung_bangunan + '_separator" class="mask"></span></p>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Saat Pembangunan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="saat_pembangunan' + hitung_bangunan + '" name="saat_pembangunan[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly saat_pembangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<p>Saat Pembangunan: <span id="saat_pembangunan' + hitung_bangunan + '_separator" class="mask"></span></p>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Saat Rehab Perbaikan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="saat_rehab_perbaikan' + hitung_bangunan + '" name="saat_rehab_perbaikan[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly saat_rehab_perbaikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<p>Saat Rehab Perbaikan: <span id="saat_rehab_perbaikan' + hitung_bangunan + '_separator" class="mask"></span></p>' +
                        '</div>' +
                        '</div>' +

                        ' </div>' +
                        '<h2 class="text-center text-success">Fasilitas yang Tersedia</h2>' +
                        ' <div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Air</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="air' + hitung_bangunan + '" name="air[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly air" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        ' </div>' +
                        '  </div>' +
                        '<div class="col-lg-6">' +
                        ' <label class="col-lg-12 control-label">Telepon</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="telepon' + hitung_bangunan + '" name="telepon[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly telepon" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        ' </div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        ' <label class="col-lg-12 control-label">Listrik</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="listrik' + hitung_bangunan + '" name="listrik[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly listrik" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Pagar</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="pagar' + hitung_bangunan + '" name="pagar[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly pagar" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        ' </div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        ' <div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Taman</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="taman' + hitung_bangunan + '" name="taman[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly taman" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Lainnya</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="lainnya_fag' + hitung_bangunan + '" name="lainnya_fag[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly lainnya_fag" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<button class="btn btn-success mt-2 tambah-field-lantai-bangunan' + hitung_bangunan + ' text-center" style="width:100%;" type="button" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Lantai</button>' +
                        '<div class="lantai_bangunan' + hitung_bangunan + '">' +
                        '<div class="form-group row">' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Luas Bangunan Lantai 1(M2)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="lantai1_bangunan' + hitung_bangunan + '" name="lantai[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly lantai_total" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Total Bangunan (M2)</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="total_bangunan' + hitung_bangunan + '" name="total_bangunan[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly total_bangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        ' </div>' +
                        '  </div>' +
                        ' <div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kondisi Bangunan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kondisi_bangunan' + hitung_bangunan + '" name="kondisi_bangunan[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly kondisi_bangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="harga_bangunan' + hitung_bangunan + '">' +
                        '<h3 class="text-left text-success">Harga Bangunan Lantai 1</h3>' +
                        '<div class="add-form_harga_bangunan">' +
                        '<div class="row">' +
                        ' <div class="col-lg-4">' +
                        '   <label class="control-label">Menurut Harga Perolehan</label>' +
                        '   <input id="menurut_harga_perolehan' + hitung_bangunan + '" name="menurut_harga_perolehan[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly menurut_harga_perolehan" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                        '   <p>Menurut Harga Perolehan: <span id="menurut_harga_perolehan' + hitung_bangunan + '_separator" class="mask"></span></p>' +
                        ' </div>' +
                        ' <div class="col-lg-4">' +
                        '   <label class="control-label">Menurut Pasar/ Pemilik</label>' +
                        '   <input id="menurut_pasar_fag' + hitung_bangunan + '" name="menurut_pasar_fag[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly menurut_pasar_fag" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                        '   <p>Menurut Pasar/ Pemilik: <span id="menurut_pasar_fag' + hitung_bangunan + '_separator" class="mask"></span></p>' +
                        ' </div>' +
                        ' <div class="col-lg-4">' +
                        '   <label class="control-label">Keterangan Lain</label>' +
                        '   <input id="keterangan_lain_fag' + hitung_bangunan + '" name="keterangan_lain_fag[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly keterangan_lain_fag" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                        ' </div>' +
                        '</div>' + // Close .row
                        '</div>' + // Close .add-form_harga_bangunan
                        '</div>' + // Close .harga_bangunan
                        '<h2 class="text-center text-success">Lingkungan</h2>' +
                        '<div class="row">' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Sarana yang tersedia disekitar lingkungan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="sarana' + hitung_bangunan + '" name="sarana[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly sarana" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        ' </div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Sarana dan prasarana perhubung</label>' +
                        ' <div class="col-lg-12">' +
                        '<input id="sarana_prasarana_fag' + hitung_bangunan + '" name="sarana_prasarana_fag[]" type="text" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly sarana_prasarana_fag" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kelas dan Lebar Jalan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kelas' + hitung_bangunan + '" name="kelas[]" type="number" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly kelas" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<br>' +
                        '<button type="button" class="btn btn-danger btn-sm btn_hapus_bangunan" data-id="' + hitung_bangunan + '" id="btn_hapus_bangunan' + hitung_bangunan + '" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash"></i> Hapus</button>' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Gambar Situasi</label>' +
                        '<div class="row px-3">' +
                        '<div class="col-lg-6">' +
                        '<input id="lihat_gambar' + hitung_bangunan + '" value="Lihat Dokumen" name="lihat_gambar[]" data-id="' + hitung_bangunan + '" type="button" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly lihat_gambar" onclick="lihatGambar(' + hitung_bangunan + ')">' +

                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<input id="edit_gambar' + hitung_bangunan + '" value="Edit Dokumen" name="edit_gambar[]" type="button" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly edit_gambar" onclick="editGambar(' + hitung_bangunan + ')">' +
                        // '<input id="edit_gambar'+hitung_bangunan+'" name="edit_gambar[]" type="file" data-bangunan="'+hitung_bangunan+'" placeholder="" class="form-control class-readonly edit_gambar" multiple onclick="editGambar(' + hitung_bangunan + ')">'+

                        '</div>' +
                        ' </div>' +

                        '</div>' +

                        ' </div>' +
                        '</div>';

                    var modal_gambar = '<div id="modal_gambar_edit' + hitung_bangunan + '" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">' +
                        '<div class="modal-dialog modal-md">' +
                        '<div class="modal-content">' +
                        '<form id="form_gambar_edit' + hitung_bangunan + '" class="form-horizontal" enctype="multipart/form-data">' +
                        '<div class="modal-body">' +
                        '<div class="modal-header" style="padding:10px">' +
                        '<h1 class="modal-title">Edit Dokumen</h1>' +
                        '</div>' +
                        ' <br>' +

                        '<div class="form-group row">' +
                        '<input id="kd_data_edit2' + hitung_bangunan + '" name="kd_data_edit2' + hitung_bangunan + '" type="hidden" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly">' +

                        '<div class="col-lg-12">' +
                        '<label class="col-lg-12 control-label">Upload Gambar Situasi</label>' +
                        '<div class="col-lg-12">' +
                        '<input type="file" class="form-control form-control-file" name="upload_gambar_edit' + hitung_bangunan + '" id="upload_gambar_edit' + hitung_bangunan + '" accept=".pdf">' +
                        '<small class="form-text text-muted">File PDF, maksimal 2 MB</small>' +

                        '</div>' +
                        '</div>' +

                        ' </div>' +

                        '</div>' +
                        '<div id="921_fb" class="modal-footer">' +
                        '<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>' +
                        '<input id="btns_921" class="btn btn-sm btn-primary" type="submit" onclick="submit_gambar(' + hitung_bangunan + ')" value="Simpan">' +
                        ' <br>' +
                        ' <br>' +
                        '<br>' +
                        '<br>' +
                        ' </div>' +

                        ' </form>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="copy-lantai_bangunan' + hitung_bangunan + ' invisible">' +
                        '<div class="row new" id="new">' +
                        '<div class="form-group row">' +
                        '<div class="col-md-12">' +
                        '<div class="input-group">' +
                        '<div class="input-group-append">' +
                        '<button name="hapus_lantai_fcr_agunan" class="btn btn-danger hapus_lantai_fcr_agunan delete-btn-lantai-fcr-agunan" type="button" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="copy-harga_bangunan' + hitung_bangunan + ' invisible">' +
                        '<div class="row new" id="new">' +
                        '<div class="form-group row">' +
                        '<div class="col-md-12">' +
                        '<div class="input-group">' +
                        '<div class="input-group-append">' +
                        '<button name="hapus_harga_bangunan_fcr_agunan" class="btn btn-danger hapus_harga_bangunan_fcr_agunan delete-btn-harga_bangunan-fcr-agunan" type="button" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $("#bangunan_dinamis").append(inputan_bangunan);
                    $("#gambar_situasi_dinamis").append(modal_gambar);
                    resizeJquerySteps();

                    separator_input('saat_pembelian_tanah' + hitung_bangunan, 'saat_pembelian_tanah' + hitung_bangunan + '_separator');
                    separator_input('saat_pembangunan' + hitung_bangunan, 'saat_pembangunan' + hitung_bangunan + '_separator');
                    separator_input('saat_rehab_perbaikan' + hitung_bangunan, 'saat_rehab_perbaikan' + hitung_bangunan + '_separator');
                    separator_input('menurut_harga_perolehan' + hitung_bangunan, 'menurut_harga_perolehan' + hitung_bangunan + '_separator');
                    separator_input('menurut_pasar_fag' + hitung_bangunan, 'menurut_pasar_fag' + hitung_bangunan + '_separator');

                    jumlahisilantai = 2;

                    $("body").on("click", ".tambah-field-lantai-bangunan" + hitung_bangunan, function () {
                        if (jumlahisilantai == 13) {
                            swal({
                                title: "Peringatan!",
                                text: "Isi form jumlah maksimal!",
                                type: "warning",
                                showConfirmButton: false,
                                timer: 1000,
                            });
                        } else {
                            var html1 = $(".copy-lantai_bangunan" + hitung_bangunan).html();
                            var html11 =
                                '<div class="row new lantai-bangunan" id="new" data-group="' + hitung_bangunan + '' + jumlahisilantai + '">' +
                                '<div class="form-group row">' +
                                '<div class="col-md-12">' +
                                '<div class="input-group">' +
                                '<div class="input-group-append">' +
                                '<button name="hapus_lantai_fcr_agunan" class="btn btn-danger hapus_lantai_fcr_agunan delete-btn-lantai-fcr-agunan" type="button" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="col-lg-6">' +
                                '<label class="col-lg-12 control-label">Luas Bangunan Lantai ' + jumlahisilantai + '(M2)</label>' +
                                '<div class="col-lg-12">' +
                                '<input id="lantai' + jumlahisilantai + '_bangunan' + hitung_bangunan + '" name="lantai[]"  type="number" data-lantai="' + jumlahisilantai + '" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control class-readonly lantai_total" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            var html2 = $(".copy-harga_bangunan" + hitung_bangunan).html();
                            // $(".add-form_harga_bangunan").after(html2);
                            var html21 =
                                '<div class="row new harga-bangunan mb-4" id="new" data-group="' + hitung_bangunan + '' + jumlahisilantai + '">' +
                                '  <div class="col-12">' +
                                '    <h3 class="text-left text-success mb-3">Harga Bangunan ' + hitung_bangunan + ' Lantai ' + jumlahisilantai + '</h3>' +
                                '  </div>' +
                                '  <div class="col-lg-4">' +
                                '    <label class="control-label">Menurut Harga Perolehan</label>' +
                                '    <input id="menurut_harga_perolehan' + hitung_bangunan + '" name="menurut_harga_perolehan[]" type="number" data-lantai="' + jumlahisilantai + '" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control form-control-lg class-readonly menurut_harga_perolehan" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                                '    <p>Menurut Harga Perolehan: <span id="menurut_harga_perolehan' + hitung_bangunan + '_separator" class="mask"></span></p>' +
                                '  </div>' +
                                '  <div class="col-lg-4">' +
                                '    <label class="control-label">Menurut Pasar/ Pemilik</label>' +
                                '    <input id="menurut_pasar_fag' + hitung_bangunan + '" name="menurut_pasar_fag[]" type="number" data-lantai="' + jumlahisilantai + '" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control form-control-lg class-readonly menurut_pasar_fag" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                                '    <p>Menurut Pasar/ Pemilik: <span id="menurut_pasar_fag' + hitung_bangunan + '_separator" class="mask"></span></p>' +
                                '  </div>' +
                                '  <div class="col-lg-4">' +
                                '    <label class="control-label">Keterangan Lain</label>' +
                                '    <input id="keterangan_lain_fag' + hitung_bangunan + '" name="keterangan_lain_fag[]" type="text" data-lantai="' + jumlahisilantai + '" data-bangunan="' + hitung_bangunan + '" placeholder="" class="form-control form-control-lg class-readonly keterangan_lain_fag" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                                '  </div>' +
                                '</div>';

                            $(".lantai_bangunan" + hitung_bangunan).append(html11);
                            $(".harga_bangunan" + hitung_bangunan).append(html21);
                            // $(".delete-btn-harga_bangunan-fcr-agunan").first().after(html21);
                            updateTotalLuasBangunan(hitung_bangunan);
                            jumlahisilantai++;
                            resizeJquerySteps();
                        }
                    });
                    // saat tombol remove dklik control group akan dihapus

                    // $("body").on("click", ".hapus_lantai_fcr_agunan", function() {
                    //     var inputId = $(this).closest('.row').find('input').attr('id');
                    //     if (inputId) {
                    //         var lantaiIndex = inputId.match(/\d+/)[0];
                    //     }
                    //     $(this).closest('.row').remove();
                    //     $(".add-form_harga_bangunan .row").each(function() {
                    //         if ($(this).find('input').attr('id').includes(lantaiIndex)) {
                    //             $(this).remove();
                    //         }
                    //     });
                    //     jumlahisilantai--;
                    //     resizeJquerySteps();
                    // });
                    // $("body").on("click", ".hapus_lantai_fcr_agunan", function() {
                    //     $(this).parents("#new").remove();
                    //     jumlahisilantai--;
                    //     // angkalantai--;
                    //     // angkalantaiinput--;
                    //     // $("#jumlah_lantai_fak_data").val(angkalantai);
                    //     resizeJquerySteps();
                    // });

                    // $("body").on("click", ".hapus_lantai_fcr_agunan", function() {
                    //     const lantaiIndex = $(this).closest("#new").index(); // Ambil index elemen yang akan dihapus

                    //     // Hapus elemen lantai
                    //     $(this).closest("#new").remove();
                    //     // Hapus elemen harga lantai
                    //     $(".add-form_harga_bangunan .row").each(function() {
                    //         if ($(this).find('input').attr('id').includes(lantaiIndex)) {
                    //             $(this).remove();
                    //         }
                    //     });
                    //     // Cari dan hapus elemen dengan kelas .hapus_harga_bangunan_fcr_agunan dengan index yang sama
                    //     $(".hapus_harga_bangunan_fcr_agunan").eq(lantaiIndex).remove();

                    //     jumlahisilantai--;
                    //     resizeJquerySteps();
                    // });

                    $("body").on("click", ".hapus_lantai_fcr_agunan", function () {
                        var groupId = $(this).closest(".lantai-bangunan").data("group");
                        // Hapus lantai dan harga bangunan yang sesuai
                        $('[data-group="' + groupId + '"]').remove();
                        jumlahisilantai--;
                        resizeJquerySteps();
                    });


                } else {
                    alert(hasil.message)
                }
            });

            // $('#tanah_dinamis').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        function updateTotalLuasBangunan(hitung_bangunan) {
            $("body").on("input", "input[data-bangunan='" + hitung_bangunan + "']", function () {
                let total = 0;
                $("input[data-bangunan='" + hitung_bangunan + "']").each(function () {
                    const nilai = parseFloat($(this).val()) || 0;
                    total += nilai;
                });
                $("#total_bangunan" + hitung_bangunan).val(total);
            });
        }

        $('#form').on('click', '.btn_hapus_bangunan', function () {
            if (confirm('Yakin ingin menghapus form input bangunan ini?')) {
                counter--;
                var button_id = $(this).attr("data-id");
                // alert(button_id)
                $('#bagian_bangunan' + button_id).remove();
                resizeJquerySteps();
            }

        });



        function storeNilaiLantaiBangunan() {
            var data_fcr_agunan1 = {
                lantai_total: [],
                menurut_harga_perolehan: [],
                menurut_pasar_fag: [],
                keterangan_lain_fag: []
            };

            $('.lantai_total').each(function () {
                var bangunanIndex = $(this).data('bangunan') || 1;
                var lantaiIndex = $(this).data('lantai') || 1; // Default to 1 if not specified
                var value = $(this).val();

                if (!data_fcr_agunan1.lantai_total[bangunanIndex]) {
                    data_fcr_agunan1.lantai_total[bangunanIndex] = [];
                }

                data_fcr_agunan1.lantai_total[bangunanIndex][lantaiIndex] = value;
            });

            $('.menurut_harga_perolehan').each(function () {
                var bangunanIndex = $(this).data('bangunan') || 1;
                var lantaiIndex = $(this).data('lantai') || 1; // Default to 1 if not specified
                var value = $(this).val();

                if (!data_fcr_agunan1.menurut_harga_perolehan[bangunanIndex]) {
                    data_fcr_agunan1.menurut_harga_perolehan[bangunanIndex] = [];
                }

                data_fcr_agunan1.menurut_harga_perolehan[bangunanIndex][lantaiIndex] = value;
            });

            $('.menurut_pasar_fag').each(function () {
                var bangunanIndex = $(this).data('bangunan') || 1;
                var lantaiIndex = $(this).data('lantai') || 1; // Default to 1 if not specified
                var value = $(this).val();

                if (!data_fcr_agunan1.menurut_pasar_fag[bangunanIndex]) {
                    data_fcr_agunan1.menurut_pasar_fag[bangunanIndex] = [];
                }

                data_fcr_agunan1.menurut_pasar_fag[bangunanIndex][lantaiIndex] = value;
            });

            $('.keterangan_lain_fag').each(function () {
                var bangunanIndex = $(this).data('bangunan') || 1;
                var lantaiIndex = $(this).data('lantai') || 1; // Default to 1 if not specified
                var value = $(this).val();

                if (!data_fcr_agunan1.keterangan_lain_fag[bangunanIndex]) {
                    data_fcr_agunan1.keterangan_lain_fag[bangunanIndex] = [];
                }

                data_fcr_agunan1.keterangan_lain_fag[bangunanIndex][lantaiIndex] = value;
            });

            var lantaiString = data_fcr_agunan1.lantai_total.filter(function (bangunan) {
                return bangunan.length > 0;
            }).map(function (bangunan) {
                return bangunan.filter(Boolean).join('|');
            }).join(';');

            var hargaPerolehanString = data_fcr_agunan1.menurut_harga_perolehan.filter(function (bangunan) {
                return bangunan.length > 0;
            }).map(function (bangunan) {
                return bangunan.filter(Boolean).join('|');
            }).join(';');

            var pasarFagString = data_fcr_agunan1.menurut_pasar_fag.filter(function (bangunan) {
                return bangunan.length > 0;
            }).map(function (bangunan) {
                return bangunan.filter(Boolean).join('|');
            }).join(';');

            var keteranganLainString = data_fcr_agunan1.keterangan_lain_fag.filter(function (bangunan) {
                return bangunan.length > 0;
            }).map(function (bangunan) {
                return bangunan.filter(Boolean).join('|');
            }).join(';');

            console.log(lantaiString);
            console.log(hargaPerolehanString);
            console.log(pasarFagString);
            console.log(keteranganLainString);

            hasilFCRAgunanBangunan = {
                lantai_total: lantaiString,
                menurut_harga_perolehan: hargaPerolehanString,
                menurut_pasar_fag: pasarFagString,
                keterangan_lain_fag: keteranganLainString
            };

            console.log(hasilFCRAgunanBangunan.lantai_total);
            return hasilFCRAgunanBangunan;
        }


        // input dinamis barang bergerak

        var counter_bb = 0;
        $("#form").on("click", "#btn_tambah_barang_bergerak", function () {
            variabelGlobal(function (hasil) {
                // console.log(hasil.message.data_entry.kd_data);
                if (hasil.status == 'success') {
                    var data = hasil.message.fcr_agunan;
                    jumlah_elemen = hasil.message.warna.length;
                    var warna = hasil.message.warna;
                    // console.log('ini warna' + warna);
                    if (counter_bb > jumlah_elemen) {
                        counter_bb = counter_bb;
                    } else if (jumlah_elemen != 0) {
                        counter_bb = jumlah_elemen;
                    }
                    counter_bb++;
                    // console.log(counter_bb);
                    var inputan_bb =
                        '<div id="bagian_bb' + counter_bb + '">' +

                        '<h2 class="text-center text-danger">Barang Bergerak</h2>' +
                        '<h3 class="text-left text-success"></h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Nama Nasabah</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="nama_nasabah_bb' + counter_bb + '" name="nama_nasabah_bb[]" type="text" value="' + hasil.message.data_entry.nama_debitur + '" placeholder="" class="form-control class-readonly nama_nasabah_bb" readonly>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Jenis Dokumen Kepemilikan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="jenis_dokumen_bb' + counter_bb + '" name="jenis_dokumen_bb[]" type="text" placeholder="" class="form-control class-readonly jenis_dokumen_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Alamat</label>' +
                        '<div class="col-lg-12">' +
                        '<textarea class="form-control class-readonly alamat_bb" id="alamat_bb' + counter_bb + '" name="alamat_bb[]" rows="3" readonly>' + hasil.message.data_entry.alamat_kantor + '</textarea>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +


                        '<h3 class="text-left text-success">Data Umum</h3>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Jenis</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="jenis_bb' + counter_bb + '" name="jenis_bb[]" type="text" placeholder="" class="form-control class-readonly jenis_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Model/ Tipe</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="model_tipe_bb' + counter_bb + '" name="model_tipe_bb[]" type="text" placeholder="" class="form-control class-readonly model_tipe_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Merk/ CC</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="merek_cc_bb' + counter_bb + '" name="merek_cc_bb[]" type="text" placeholder="" class="form-control class-readonly merek_cc_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tahun Pembuatan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="tahun_pembuatan_bb' + counter_bb + '" name="tahun_pembuatan_bb[]" type="number" placeholder="" class="form-control class-readonly tahun_pembuatan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +

                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tahun Pembelian</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="tahun_pembeliaan_bb' + counter_bb + '" name="tahun_pembeliaan_bb[]" type="number" placeholder="" class="form-control class-readonly tahun_pembeliaan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Serial Number</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="serial_number_bb' + counter_bb + '" name="serial_number_bb[]" type="text" placeholder="" class="form-control class-readonly serial_number_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Nomor Mesin</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="nomor_mesin_bb' + counter_bb + '" name="nomor_mesin_bb[]" type="text" placeholder="" class="form-control class-readonly nomor_mesin_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Warna</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="warna_bb' + counter_bb + '" name="warna_bb[]" type="text" placeholder="" class="form-control class-readonly warna_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +

                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Bahan Bakar</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="bahan_bakar_bb' + counter_bb + '" name="bahan_bakar_bb[]" type="text" placeholder="" class="form-control class-readonly bahan_bakar_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Kondisi/ Keadaan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="kondisi_keadaan_bb' + counter_bb + '" name="kondisi_keadaan_bb[]" type="text" placeholder="" class="form-control class-readonly kondisi_keadaan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Nomor Polisi</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="nomor_polisi_bb' + counter_bb + '" name="nomor_polisi_bb[]" type="text" placeholder="" class="form-control class-readonly nomor_polisi_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Bukti Kepemilikan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="bukti_kepemilikan_agb_bb' + counter_bb + '" name="bukti_kepemilikan_agb_bb[]" type="text" placeholder="" class="form-control class-readonly bukti_kepemilikan_agb_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Invoice No</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="invoice_no_bb' + counter_bb + '" name="invoice_no_bb[]" type="text" placeholder="" class="form-control class-readonly invoice_no_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +



                        '</div>' +

                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Invoice Tanggal</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="invoice_tanggal_bb' + counter_bb + '" name="invoice_tanggal_bb[]" type="date" placeholder="" class="form-control class-readonly invoice_tanggal_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Perubahan Hak Terakhir</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="perubahan_hak_terakhir_bb' + counter_bb + '" name="perubahan_hak_terakhir_bb[]" type="text" placeholder="" class="form-control class-readonly perubahan_hak_terakhir_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tercatat Atas Nama</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="tercatat_atas_nama_bb' + counter_bb + '" name="tercatat_atas_nama_bb[]" type="text" placeholder="" class="form-control class-readonly tercatat_atas_nama_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Alamat Pemilik Saat Ini</label>' +
                        '<div class="col-lg-12">' +
                        '<textarea class="form-control class-readonly alamat_pemilik_saat_ini_bb" id="alamat_pemilik_saat_ini_bb' + counter_bb + '" name="alamat_pemilik_saat_ini_bb[]" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>' +

                        '</div>' +
                        '</div>' +

                        '</div>' +

                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Umur Teknis</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="umur_teknis_bb' + counter_bb + '" name="umur_teknis_bb[]" type="text" placeholder="" class="form-control class-readonly umur_teknis_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Perkiraan Umur Ekonomis</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="perkiraan_umur_ekonomis_bb' + counter_bb + '" name="perkiraan_umur_ekonomis_bb[]" type="text" placeholder="" class="form-control class-readonly perkiraan_umur_ekonomis_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +


                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Tempat Penyimpanan</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="tempat_penyimpanan_bb' + counter_bb + '" name="tempat_penyimpanan_bb[]" type="text" placeholder="" class="form-control class-readonly tempat_penyimpanan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Route</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="route_bb' + counter_bb + '" name="route_bb[]" type="text" placeholder="" class="form-control class-readonly route_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                        '</div>' +
                        '</div>' +


                        '</div>' +

                        '<div class="row">' +

                        '<div class="col-lg-6">' +
                        '<label class="col-lg-12 control-label">Jarak Rata-rata Ditempuh</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="jarak_rata_rata_tempuh_bb' + counter_bb + '" name="jarak_rata_rata_tempuh_bb[]" type="text" placeholder="" class="form-control class-readonly jarak_rata_rata_tempuh_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                        '<br>' +
                        '<button type="button" class="btn btn-danger btn-sm btn_hapus_bb" data-id="' + counter_bb + '" id="btn_hapus_bb' + counter_bb + '" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash"></i> Hapus</button>' +
                        '</div>' +
                        '</div>' +



                        '</div>' +


                        '</div>';
                    $("#bb_dinamis").append(inputan_bb);
                    resizeJquerySteps();

                } else {
                    alert(hasil.message)
                }
            });

            // $('#tanah_dinamis').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $('#form').on('click', '.btn_hapus_bb', function () {
            if (confirm('Yakin ingin menghapus form input barang bergerak ini?')) {
                counter--;
                var button_id = $(this).attr("data-id");
                // alert(button_id)
                $('#bagian_bb' + button_id).remove();
                resizeJquerySteps();
            }

        });
        // update fcr agunan tanah
        $('#save_fcr_agunan_tanah').click(function (e) {
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // alert('hallo')
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            // var fcr_agunan2 = data_fcr_agunan();
            // post_fcr_agunan('edit_fcr_agunan', fcr_agunan2, 'fcr_agunan')
            // Mengirim data menggunakan AJAX

            if (edit_data_koordinator === null || edit_data_koordinator === '') {
                // Jika edit_data_koordinator null atau kosong
                var fcr_agunan2 = data_fcr_agunan();
                // Mengirim data menggunakan AJAX
                post_fcr_agunan('edit_fcr_agunan', fcr_agunan2, 'fcr_agunan')
            } else {
                // Jika edit_data_koordinator memiliki nilai
                var fcr_agunan2 = paraf_fcr_agunan();
                post_paraf('paraf_fcr_agunan', fcr_agunan2, 'fcr_agunan');
            }
        });
        // update fcr agunan bangunan
        $('#save_fcr_agunan_bangunan').click(function (e) {
            e.preventDefault();

            if (edit_data_pemasar) {
                // Ambil hasil dinamis dulu
                const hasil = storeNilaiLantaiBangunan();   // <-- PENTING: ditangkap
                const fcr_agunan2 = data_fcr_agunan_bangunan(hasil);

                post_fcr_agunan('edit_fcr_agunan_bangunan', fcr_agunan2, 'fcr_agunan');
            } else {
                const fcr_agunan2 = paraf_fcr_agunan();
                post_paraf('paraf_fcr_agunan', fcr_agunan2, 'fcr_agunan');
            }
        });


        // update fcr agunan barang bergerak
        $('#save_fcr_agunan_bergerak').click(function (e) {
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // alert('hallo')
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            // var fcr_agunan2 = data_fcr_agunan_bb();
            // post_fcr_agunan('edit_fcr_agunan_bb', fcr_agunan2, 'fcr_agunan')
            // Mengirim data menggunakan AJAX
            if (edit_data_koordinator === null || edit_data_koordinator === '') {
                // Jika edit_data_koordinator null atau kosong
                var fcr_agunan2 = data_fcr_agunan_bb();
                console.log(fcr_agunan2);
                // Mengirim data menggunakan AJAX
                post_fcr_agunan('edit_fcr_agunan_bb', fcr_agunan2, 'fcr_agunan')
            } else {
                // Jika edit_data_koordinator memiliki nilai
                var fcr_agunan2 = paraf_fcr_agunan();
                post_paraf('paraf_fcr_agunan', fcr_agunan2, 'fcr_agunan');
            }
        });

    });
    // bikin function

    var jumlah_elemen = 0;

    function panggil_perulangan() {
        variabelGlobal(function (hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.fcr_agunan;
                var kd_data = hasil.message.data_entry.kd_data;
                var data_paraf = hasil.message.paraf;
                perulangan(kd_data);
                perulangan_bangunan(kd_data);
                perulangan_bb(kd_data);
                if (Array.isArray(data_paraf) && data_paraf.length > 0) {
                    let paraf = data_paraf.find(p => p.nomor_halaman == '4'); // Cari nomor_halaman = 4

                    if (paraf && paraf.kd_level && typeof kd_level !== "undefined" &&
                        paraf.kd_level === kd_level &&
                        paraf.kd_data === data.kd_data &&
                        paraf.nama_halaman === 'FCR Agunan') {

                        $('#cb_fcr_agunan').prop('checked', paraf.ceklis === 'true');
                    } else {
                        $('#cb_fcr_agunan').prop('checked', false);
                    }
                } else {
                    $('#cb_fcr_agunan').prop('checked', false);
                }

            } else {
                alert(hasil.message)
            }
        });
    }

    function perulangan(kd_data) {

        $.ajax({
            url: '<?php echo base_url() ?>' + 'pengajuan/get_perulangan',
            type: 'POST',
            dataType: 'json',
            data: {
                kd_data: kd_data
            },
            success: function (response) {
                if (response.jumlah > 0) {
                    // console.log('Data retrieved successfully:', response);
                    // awal
                    for (i = 0; i < response.jumlah_tanah; i++) {

                        var inputan_tanah = '<div id="bagian_tanah' + i + '">' +

                            '<h2 class="text-center text-danger">Tanah</h2>' +
                            '<h3 class="text-left text-success">Status tanah/ Jenis pemilikan</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Bukti Kepemilikan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="bukti_kepemilikan' + i + '" name="bukti_kepemilikan[]" value="' + response.bukti_kepemilikan[i] + '" type="text" placeholder="" class="form-control class-readonly bukti_kepemilikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tanggal Bukti Kepemilikan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="tanggal_bukti_kepemilikan' + i + '" name="tanggal_bukti_kepemilikan[]" value="' + response.tanggal_kepemilikan[i] + '" type="date" placeholder="" class="form-control class-readonly tanggal_bukti_kepemilikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +

                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Surat Ukur</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="surat_ukur' + i + '" name="surat_ukur[]" value="' + response.surat_ukur[i] + '" type="text" placeholder="" class="form-control class-readonly surat_ukur" <?php echo !empty($edit_data) ? '' : 'readonly'; ?> >' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tanggal Surat Ukur</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="tanggal_surat_ukur' + i + '" name="tanggal_surat_ukur[]" value="' + response.tanggal_surat_ukur[i] + '" type="date" placeholder="" class="form-control class-readonly tanggal_surat_ukur" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">NIB</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="nib' + i + '" name="nib[]" value="' + response.nib[i] + '" type="text" placeholder="" class="form-control class-readonly nib" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Penunjuk (warkah)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="penunjuk' + i + '" name="penunjuk[]" value="' + response.penunjuk[i] + '" type="text" placeholder="" class="form-control class-readonly penunjuk" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +
                            '<h3 class="text-left text-success">Letak Tanah</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kelurahan/ Desa</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kelurahan' + i + '" name="kelurahan[]" value="' + response.kelurahan[i] + '" type="text" placeholder="" class="form-control class-readonly kelurahan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kecamatan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kecamatan' + i + '" name="kecamatan[]" value="' + response.kecamatan[i] + '" type="text" placeholder="" class="form-control class-readonly kecamatan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kabupaten</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kabupaten' + i + '" name="kabupaten[]" value="' + response.kabupaten[i] + '" type="text" placeholder="" class="form-control class-readonly kabupaten" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Provinsi</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="provinsi' + i + '" name="provinsi[]" value="' + response.provinsi[i] + '" type="text" placeholder="" class="form-control class-readonly provinsi" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<h3 class="text-left text-success">Luas Tanah</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Utara (M)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="utara' + i + '" name="utara[]" value="' + response.utara[i] + '" type="number" placeholder="" class="form-control class-readonly utara" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Barat (M)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="barat' + i + '" name="barat[]" value="' + response.barat[i] + '" type="number" placeholder="" class="form-control class-readonly barat" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Selatan (M)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="selatan' + i + '" name="selatan[]" value="' + response.selatan[i] + '" type="number" placeholder="" class="form-control class-readonly selatan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Timur (M)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="timur' + i + '" name="timur[]" value="' + response.timur[i] + '" type="number" placeholder="" class="form-control class-readonly timur" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Luas (M2)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="luas' + i + '" name="luas[]" value="' + response.luas_total[i] + '" type="number" placeholder="" class="form-control class-readonly luas" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +



                            '</div>' +
                            '<h3 class="text-left text-success">Perwatasan</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kanan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kanan' + i + '" name="kanan[]" value="' + response.kanan[i] + '" type="text" placeholder="" class="form-control class-readonly kanan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kiri</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kiri' + i + '" name="kiri[]" value="' + response.kiri[i] + '" type="text" placeholder="" class="form-control class-readonly kiri" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Depan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="depan' + i + '" name="depan[]" value="' + response.depan[i] + '" type="text" placeholder="" class="form-control class-readonly depan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Belakang</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="belakang' + i + '" name="belakang[]" value="' + response.belakang[i] + '" type="text" placeholder="" class="form-control class-readonly belakang" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<h3 class="text-left text-success">Daerah Pemakaian</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Daerah Pemakaian</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="daerah_pemakaian' + i + '" name="daerah_pemakaian[]" value="' + response.daerah_pemakaian[i] + '" type="text" placeholder="" class="form-control class-readonly daerah_pemakaian" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +
                            '<h3 class="text-left text-success">Kondisi Tanah</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kondisi Tanah</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kondisi_tanah' + i + '" name="kondisi_tanah[]" value="' + response.kondisi_tanah[i] + '" type="text" placeholder="" class="form-control class-readonly kondisi_tanah" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +
                            '<h3 class="text-left text-success">Harga Tanah (M2)</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Menurut Buku Tanah (Permeter)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="buku_tanah' + i + '" name="buku_tanah[]" value="' + response.harga_tanah_buku[i] + '" type="number" placeholder="" class="form-control class-readonly buku_tanah" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<p>Menurut Buku Tanah: <span id="buku_tanah' + i + '_separatorx" class="mask"></span></p>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Menurut Pasar (Permeter)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="menurut_pasar' + i + '" name="menurut_pasar[]" value="' + response.harga_tanah_pasar[i] + '" type="number" placeholder="" class="form-control class-readonly menurut_pasar" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<p>Menurut Pasar: <span id="menurut_pasar' + i + '_separatorx" class="mask"></span></p>' +
                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<h3 class="text-left text-success">Keterangan Lain</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Keterangan Lain</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="keterangan_lain' + i + '" name="keterangan_lain[]" value="' + response.keterangan_lain[i] + '" type="text" placeholder="" class="form-control class-readonly keterangan_lain" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<br>' +
                            '<button type="button" class="btn btn-danger btn-sm btn_hapus_tanah" data-id="' + i + '" id="btn_hapus_tanah' + i + '" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash"></i> Hapus</button>' +
                            '</div>' +
                            '</div>' +

                            '</div>' +


                            '</div>';
                        $("#tanah_dinamis").append(inputan_tanah);
                        resizeJquerySteps();
                        separator_input('buku_tanah' + i, 'buku_tanah' + i + '_separatorx');
                        separator_input('menurut_pasar' + i, 'menurut_pasar' + i + '_separatorx');

                        separator_edit(response.harga_tanah_buku[i], 'buku_tanah' + i + '_separatorx');
                        separator_edit(response.harga_tanah_pasar[i], 'menurut_pasar' + i + '_separatorx');
                    }
                    // akhir
                    // Lakukan sesuatu dengan respons sukses
                    // Misalnya, tampilkan data ke dalam elemen HTML
                } else {
                    console.log('No data found for the given kd_data.');
                }
            },
            error: function (xhr, status, error) {
                console.log('Error retrieving data:', xhr.responseText);
            }
        });
    }

    function perulangan_bangunan(kd_data) {

        $.ajax({
            url: '<?php echo base_url() ?>' + 'pengajuan/get_perulangan',
            type: 'POST',
            dataType: 'json',
            data: {
                kd_data: kd_data
            },
            success: function (response) {
                if (response.jumlah > 0) {
                    // console.log('Data retrieved successfully:', response);
                    // awal
                    for (hb = 0; hb < response.jumlah_imb; hb++) {
                        var angka_awal = parseInt(hb) + 1;

                        var lantaiPerBangunan = response.luas_bangunan_lantai[hb].split('|');

                        // Iterasi setiap lantai dalam bangunan
                        var lantaiKedua = lantaiPerBangunan[1]; // Mengambil nilai lantai ke-2 (index 1)

                        var hargaperolehanPerBangunan = response.harga_bangunan_perolehan[hb].split('|');
                        console.log('Bangunan ke-' + (hb + 1) + ':', hargaperolehanPerBangunan);

                        // Iterasi setiap lantai dalam bangunan

                        var hargapasarPerBangunan = response.harga_bangunan_pasar[hb].split('|');
                        console.log('Bangunan ke-' + (hb + 1) + ':', hargapasarPerBangunan);

                        // Iterasi setiap lantai dalam bangunan

                        var keteranganlainPerBangunan = response.keterangan_lain_bangunan[hb].split('|');

                        // Iterasi setiap lantai dalam bangunan

                        var inputan_bangunan =
                            '<div id="bagian_bangunan' + hb + '">' +
                            '<h2 class="text-center text-danger">Bangunan</h2>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">IMB</label>' +
                            ' <div class="col-lg-12">' +
                            '<input id="imb' + hb + '" name="imb[]" value="' + response.imb[hb] + '" type="text" placeholder="" class="form-control class-readonly imb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Pondasi</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="pondasi' + hb + '" name="pondasi[]" value="' + response.pondasi[hb] + '" type="text" placeholder="" class="form-control class-readonly pondasi" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            ' </div>' +

                            '</div>' +
                            '<div class="row">' +

                            ' <div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Lantai</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="lantai' + hb + '" name="lantai[]" value="' + response.lantai[hb] + '" type="text" placeholder="" class="form-control class-readonly lantai" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            ' <div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tinggi Lantai Terhadap Jalan</label>' +
                            '  <div class="col-lg-12">' +
                            ' <input id="tinggi_lantai_terhadap_jalan' + hb + '" name="tinggi_lantai_terhadap_jalan[]" value="' + response.tinggi_lantai_thd_jalan[hb] + '" type="number" placeholder="" class="form-control class-readonly tinggi_lantai_terhadap_jalan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            ' </div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Rangka</label>' +
                            '<div class="col-lg-12">' +
                            ' <input id="rangka' + hb + '" name="rangka[]" value="' + response.rangka[hb] + '" type="text" placeholder="" class="form-control class-readonly rangka" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Dinding</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="dinding' + hb + '" name="dinding[]" value="' + response.dinding[hb] + '" type="text" placeholder="" class="form-control class-readonly dinding" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            ' </div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Langit - Langit Plafond</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="langit_plafond' + hb + '" name="langit_plafond[]" value="' + response.langit_plafon[hb] + '" type="text" placeholder="" class="form-control class-readonly langit_plafond" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Atap</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="atap' + hb + '" name="atap[]" value="' + response.atap[hb] + '" type="text" placeholder="" class="form-control class-readonly atap" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tahun Pembangunan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="tahun_pembangunan' + hb + '" name="tahun_pembangunan[]" value="' + response.tahun_pembangunan[hb] + '" type="number" placeholder="" class="form-control class-readonly tahun_pembangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Rehab/ Perbaikan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="rehap_perbaikan' + hb + '" name="rehap_perbaikan[]" value="' + response.rehab[hb] + '" type="text" placeholder="" class="form-control class-readonly rehap_perbaikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<h3 class="text-left text-success">Biaya yang Dikeluarkan</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Saat Pembelian Tanah</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="saat_pembelian_tanah' + hb + '" name="saat_pembelian_tanah[]" value="' + response.biaya_beli_tanah[hb] + '" type="number" placeholder="" class="form-control class-readonly saat_pembelian_tanah" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<p>Saat Pembelian Tanah: <span id="saat_pembelian_tanah' + hb + '_separatorx" class="mask"></span></p>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Saat Pembangunan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="saat_pembangunan' + hb + '" name="saat_pembangunan[]" value="' + response.biaya_pembangunan[hb] + '" type="number" placeholder="" class="form-control class-readonly saat_pembangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<p>Saat Pembangunan: <span id="saat_pembangunan' + hb + '_separatorx" class="mask"></span></p>' +
                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Saat Rehab Perbaikan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="saat_rehab_perbaikan' + hb + '" name="saat_rehab_perbaikan[]" value="' + response.biaya_rehab[hb] + '" type="number" placeholder="" class="form-control class-readonly saat_rehab_perbaikan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<p>Saat Rehab Perbaikan: <span id="saat_rehab_perbaikan' + hb + '_separatorx" class="mask"></span></p>' +
                            '</div>' +
                            '</div>' +

                            ' </div>' +
                            '<h2 class="text-center text-success">Fasilitas yang Tersedia</h2>' +
                            ' <div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Air</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="air' + hb + '" name="air[]" value="' + response.air[hb] + '" type="text" placeholder="" class="form-control class-readonly air" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            ' </div>' +
                            '  </div>' +
                            '<div class="col-lg-6">' +
                            ' <label class="col-lg-12 control-label">Telepon</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="telepon' + hb + '" name="telepon[]" value="' + response.telepon[hb] + '" type="text" placeholder="" class="form-control class-readonly telepon" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            ' </div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            ' <label class="col-lg-12 control-label">Listrik</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="listrik' + hb + '" name="listrik[]" value="' + response.listrik[hb] + '" type="text" placeholder="" class="form-control class-readonly listrik" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Pagar</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="pagar' + hb + '" name="pagar[]" value="' + response.pagar[hb] + '" type="text" placeholder="" class="form-control class-readonly pagar" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            ' </div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            ' <div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Taman</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="taman' + hb + '" name="taman[]" value="' + response.taman[hb] + '" type="text" placeholder="" class="form-control class-readonly taman" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Lainnya</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="lainnya_fag' + hb + '" name="lainnya_fag[]" value="' + response.lainnya[hb] + '" type="text" placeholder="" class="form-control class-readonly lainnya_fag" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<button class="btn btn-success mt-2 tambah-field-lantai-bangunan' + hb + ' text-center" style="width:100%;" type="button" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Lantai</button>' +
                            '<div class="lantai_bangunan' + hb + '">' +
                            '<div class="row form group">' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Luas Bangunan Lantai 1 (M2)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="lantai1_bangunan' + hb + '" name="lantai[]" value="' + lantaiPerBangunan[0] + '" type="number" data-bangunan="' + hb + '" placeholder="" class="form-control class-readonly lantai_total" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Total Bangunan (M2)</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="total_bangunan' + hb + '" name="total_bangunan[]" value="' + response.total_bangunan[hb] + '" type="number" placeholder="" class="form-control class-readonly total_bangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kondisi Bangunan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kondisi_bangunan' + hb + '" name="kondisi_bangunan[]" value="' + response.kondisi_bangunan[hb] + '" type="text" placeholder="" class="form-control class-readonly kondisi_bangunan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="harga_bangunan' + hb + '">' +
                            '<h3 class="text-left text-success">Harga Bangunan ' + (hb + 1) + ' Lantai 1</h3>' +
                            '<div class="row">' +
                            ' <div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Menurut Harga Perolehan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="menurut_harga_perolehan' + hb + '" name="menurut_harga_perolehan[]" value="' + hargaperolehanPerBangunan[0] + '" type="number" data-bangunan="' + hb + '" placeholder="" class="form-control class-readonly menurut_harga_perolehan" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<p>Menurut Harga Perolehan: <span id="menurut_harga_perolehan' + hb + '_separatorx" class="mask"></span></p>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Menurut Pasar/ Pemilik</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="menurut_pasar_fag' + hb + '" name="menurut_pasar_fag[]" value="' + hargapasarPerBangunan[0] + '" type="number" data-bangunan="' + hb + '" placeholder="" class="form-control class-readonly menurut_pasar_fag" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<p>Menurut Pasar/ Pemilik: <span id="menurut_pasar_fag' + hb + '_separatorx" class="mask"></span></p>' +
                            ' </div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            ' <div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Keterangan Lain</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="keterangan_lain_fag' + hb + '" name="keterangan_lain_fag[]" value="' + keteranganlainPerBangunan[0] + '" type="text" data-bangunan="' + hb + '" placeholder="" class="form-control class-readonly keterangan_lain_fag" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<h2 class="text-center text-success">Lingkungan</h2>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Sarana yang tersedia disekitar lingkungan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="sarana' + hb + '" name="sarana[]" value="' + response.sarana[hb] + '" type="text" placeholder="" class="form-control class-readonly sarana" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            ' </div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Sarana dan prasarana perhubung</label>' +
                            ' <div class="col-lg-12">' +
                            '<input id="sarana_prasarana_fag' + hb + '" name="sarana_prasarana_fag[]" value="' + response.sarana_prasarana[hb] + '" type="text" placeholder="" class="form-control class-readonly sarana_prasarana_fag" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kelas dan Lebar Jalan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kelas' + hb + '" name="kelas[]" value="' + response.lebar_jalan[hb] + '" type="number" placeholder="" class="form-control class-readonly kelas" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<br>' +
                            '<button type="button" class="btn btn-danger btn-sm btn_hapus_bangunan" data-id="' + hb + '" id="btn_hapus_bangunan' + hb + '" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash"></i> Hapus</button>' +
                            '</div>' +
                            '</div>' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Gambar Situasi</label>' +
                            '<div class="row px-3">' +
                            '<div class="col-lg-6">' +
                            // disini tambahkan juga readonly
                            '<input id="lihat_gambar' + hb + '" value="Lihat Dokumen" name="lihat_gambar[]" data-id="' + hb + '" type="button" placeholder="" class="form-control class-readonly lihat_gambar" onclick="lihatGambar(' + angka_awal + ')">' +

                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<input id="edit_gambar' + hb + '" value="Edit Dokumen" name="edit_gambar[]" type="button" placeholder="" class="form-control class-readonly edit_gambar" onclick="editGambar(' + angka_awal + ')">' +

                            '</div>' +
                            '</div>' +

                            '</div>' +

                            ' </div>' +
                            '</div>';
                        var angka = parseInt(hb) + 1;
                        var modal_gambar_perulangan = '<div id="modal_gambar_edit' + angka + '" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">' +
                            '<div class="modal-dialog modal-md">' +
                            '<div class="modal-content">' +
                            '<form id="form_gambar_edit' + angka + '" class="form-horizontal" enctype="multipart/form-data">' +
                            '<div class="modal-body">' +
                            '<div class="modal-header" style="padding:10px">' +
                            '<h1 class="modal-title">Edit Dokumen</h1>' +
                            '</div>' +
                            ' <br>' +

                            '<div class="form-group row">' +
                            '<input id="kd_data_edit2' + angka + '" name="kd_data_edit2' + angka + '" type="hidden" placeholder="" class="form-control class-readonly">' +

                            '<div class="col-lg-12">' +
                            '<label class="col-lg-12 control-label">Upload Gambar Situasi</label>' +
                            '<div class="col-lg-12">' +
                            '<input type="file" class="form-control form-control-file" name="upload_gambar_edit' + angka + '" id="upload_gambar_edit' + angka + '" accept=".pdf">' +
                            '<small class="form-text text-muted">File PDF, maksimal 2 MB</small>' +

                            '</div>' +
                            '</div>' +

                            ' </div>' +

                            '</div>' +
                            '<div id="921_fb" class="modal-footer">' +
                            '<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>' +
                            '<input id="btns_921" class="btn btn-sm btn-primary" type="submit" onclick="submit_gambar(' + angka + ')" value="Simpan">' +
                            ' <br>' +
                            ' <br>' +
                            '<br>' +
                            '<br>' +
                            ' </div>' +

                            ' </form>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $("#bangunan_dinamis").append(inputan_bangunan);
                        $("#gambar_situasi_dinamis").append(modal_gambar_perulangan);
                        resizeJquerySteps();

                        separator_input('saat_pembelian_tanah' + hb, 'saat_pembelian_tanah' + hb + '_separatorx');
                        separator_input('saat_pembangunan' + hb, 'saat_pembangunan' + hb + '_separatorx');
                        separator_input('saat_rehab_perbaikan' + hb, 'saat_rehab_perbaikan' + hb + '_separatorx');
                        separator_input('menurut_harga_perolehan' + hb, 'menurut_harga_perolehan' + hb + '_separatorx');
                        separator_input('menurut_pasar_fag' + hb, 'menurut_pasar_fag' + hb + '_separatorx');

                        separator_edit(response.biaya_beli_tanah[hb], 'saat_pembelian_tanah' + hb + '_separatorx');
                        separator_edit(response.biaya_pembangunan[hb], 'saat_pembangunan' + hb + '_separatorx');
                        separator_edit(response.biaya_rehab[hb], 'saat_rehab_perbaikan' + hb + '_separatorx');
                        separator_edit(response.harga_bangunan_perolehan[hb], 'menurut_harga_perolehan' + hb + '_separatorx');
                        separator_edit(response.harga_bangunan_pasar[hb], 'menurut_pasar_fag' + hb + '_separatorx');

                        // Add dynamic floors for existing buildings

                        for (var lantaiIndex = 1; lantaiIndex < lantaiPerBangunan.length; lantaiIndex++) {
                            var lantaiHtml = '<div class="row new lantai-bangunan" id="new" data-group="' + hb + '' + lantaiIndex + '">' +
                                '<div class="form-group row">' +
                                '<div class="col-md-12">' +
                                '<div class="input-group">' +
                                '<div class="input-group-append">' +
                                '<button name="hapus_lantai_fcr_agunan" class="btn btn-danger hapus_lantai_fcr_agunan delete-btn-lantai-fcr-agunan" type="button" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="col-lg-6">' +
                                '<label class="col-lg-12 control-label">Luas Bangunan Lantai ' + (lantaiIndex + 1) + ' (M2)</label>' +
                                '<div class="col-lg-12">' +
                                '<input id="lantai' + lantaiIndex + '_bangunan' + hb + '" name="lantai[]" value="' + lantaiPerBangunan[lantaiIndex] + '" type="number" data-lantai="' + lantaiIndex + '" data-bangunan="' + hb + '" placeholder="" class="form-control class-readonly lantai_total" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            var hargaHtml = '<div class="row new harga-bangunan mb-4" id="new" data-group="' + hb + '' + lantaiIndex + '">' +
                                '  <div class="col-12">' +
                                '    <h3 class="text-left text-success mb-3">Harga Bangunan ' + (hb + 1) + ' Lantai ' + (lantaiIndex + 1) + '</h3>' +
                                '  </div>' +
                                '  <div class="col-lg-4">' +
                                '    <label class="control-label">Menurut Harga Perolehan</label>' +
                                '    <input id="menurut_harga_perolehan' + hb + '" name="menurut_harga_perolehan[]" value="' + hargaperolehanPerBangunan[lantaiIndex] + '" type="number" data-lantai="' + lantaiIndex + '" data-bangunan="' + hb + '" placeholder="" class="form-control form-control-lg class-readonly menurut_harga_perolehan" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                                '    <p>Menurut Harga Perolehan: <span id="menurut_harga_perolehan' + hb + '_separator" class="mask"></span></p>' +
                                '  </div>' +
                                '  <div class="col-lg-4">' +
                                '    <label class="control-label">Menurut Pasar/ Pemilik</label>' +
                                '    <input id="menurut_pasar_fag' + hb + '" name="menurut_pasar_fag[]" value="' + hargapasarPerBangunan[lantaiIndex] + '" type="number" data-lantai="' + lantaiIndex + '" data-bangunan="' + hb + '" placeholder="" class="form-control form-control-lg class-readonly menurut_pasar_fag" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                                '    <p>Menurut Pasar/ Pemilik: <span id="menurut_pasar_fag' + hb + '_separator" class="mask"></span></p>' +
                                '  </div>' +
                                '  <div class="col-lg-4">' +
                                '    <label class="control-label">Keterangan Lain</label>' +
                                '    <input id="keterangan_lain_fag' + hb + '" name="keterangan_lain_fag[]" value="' + keteranganlainPerBangunan[lantaiIndex] + '" type="text" data-lantai="' + lantaiIndex + '" data-bangunan="' + hb + '" placeholder="" class="form-control form-control-lg class-readonly keterangan_lain_fag" <?php echo !empty($edit_data) ? "" : "readonly"; ?>>' +
                                '  </div>' +
                                '</div>';

                            $(".lantai_bangunan" + hb).append(lantaiHtml);
                            $(".harga_bangunan" + hb).append(hargaHtml);
                            resizeJquerySteps();


                        }
                    }
                    // akhir
                    // Lakukan sesuatu dengan respons sukses
                    // Misalnya, tampilkan data ke dalam elemen HTML
                } else {
                    console.log('No data found for the given kd_data.');
                }
            },
            error: function (xhr, status, error) {
                console.log('Error retrieving data:', xhr.responseText);
            }
        });
    }

    function perulangan_bb(kd_data) {
        $.ajax({
            url: '<?php echo base_url() ?>' + 'pengajuan/get_perulangan',
            type: 'POST',
            dataType: 'json',
            data: {
                kd_data: kd_data
            },
            success: function (response) {
                if (response.jumlah > 0) {
                    // console.log('Data retrieved successfully:', response);
                    // awal
                    for (counter_bb_loop = 0; counter_bb_loop < response.jumlah_bb; counter_bb_loop++) {
                        // console.log(counter_bb_loop)
                        var inputan_bb =
                            '<div id="bagian_bb' + counter_bb_loop + '">' +

                            '<h2 class="text-center text-danger">Barang Bergerak</h2>' +
                            '<h3 class="text-left text-success"></h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Nama Nasabah</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="nama_nasabah_bb' + counter_bb_loop + '" name="nama_nasabah_bb[]" type="text" value="' + response.nama_debitur + '" placeholder="" class="form-control class-readonly nama_nasabah_bb" readonly>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Jenis Dokumen Kepemilikan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="jenis_dokumen_bb' + counter_bb_loop + '" name="jenis_dokumen_bb[]" value="' + response.jenis_dokumen[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly jenis_dokumen_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Alamat</label>' +
                            '<div class="col-lg-12">' +
                            '<textarea class="form-control class-readonly alamat_bb" id="alamat_bb' + counter_bb_loop + '" name="alamat_bb[]" rows="3" readonly>' + response.alamat_kantor + '</textarea>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +


                            '<h3 class="text-left text-success">Data Umum</h3>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Jenis</label>' +
                            '<div class="col-lg-12">' +
                            // '<input id="imb'+hb+'" name="imb[]" value="' + response.imb[hb] + '" type="text" placeholder="" class="form-control class-readonly imb">'+
                            '<input id="jenis_bb' + counter_bb_loop + '" name="jenis_bb[]" value="' + response.jenis[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly jenis_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Model/ Tipe</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="model_tipe_bb' + counter_bb_loop + '" name="model_tipe_bb[]" value="' + response.model_tipe[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly model_tipe_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Merk/ CC</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="merek_cc_bb' + counter_bb_loop + '" name="merek_cc_bb[]" value="' + response.merek_cc[counter_bb_loop] + '"type="text" placeholder="" class="form-control class-readonly merek_cc_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tahun Pembuatan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="tahun_pembuatan_bb' + counter_bb_loop + '" name="tahun_pembuatan_bb[]" value="' + response.tahun_pembuatan[counter_bb_loop] + '" type="number" placeholder="" class="form-control class-readonly tahun_pembuatan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +

                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tahun Pembelian</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="tahun_pembeliaan_bb' + counter_bb_loop + '" name="tahun_pembeliaan_bb[]" type="number" value="' + response.tahun_pembeliaan[counter_bb_loop] + '" placeholder="" class="form-control class-readonly tahun_pembeliaan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Serial Number</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="serial_number_bb' + counter_bb_loop + '" name="serial_number_bb[]" value="' + response.serial_number[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly serial_number_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Nomor Mesin</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="nomor_mesin_bb' + counter_bb_loop + '" name="nomor_mesin_bb[]" value="' + response.nomor_mesin[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly nomor_mesin_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Warna</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="warna_bb' + counter_bb_loop + '" name="warna_bb[]" value="' + response.warna[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly warna_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +

                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Bahan Bakar</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="bahan_bakar_bb' + counter_bb_loop + '" name="bahan_bakar_bb[]" value="' + response.bahan_bakar[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly bahan_bakar_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Kondisi/ Keadaan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="kondisi_keadaan_bb' + counter_bb_loop + '" name="kondisi_keadaan_bb[]" value="' + response.kondisi_keadaan[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly kondisi_keadaan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Nomor Polisi</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="nomor_polisi_bb' + counter_bb_loop + '" name="nomor_polisi_bb[]" value="' + response.nomor_polisi[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly nomor_polisi_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Bukti Kepemilikan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="bukti_kepemilikan_agb_bb' + counter_bb_loop + '" name="bukti_kepemilikan_agb_bb[]" value="' + response.bukti_kepemilikan_agb[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly bukti_kepemilikan_agb_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Invoice No</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="invoice_no_bb' + counter_bb_loop + '" name="invoice_no_bb[]" value="' + response.invoice_no[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly invoice_no_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +



                            '</div>' +

                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Invoice Tanggal</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="invoice_tanggal_bb' + counter_bb_loop + '" name="invoice_tanggal_bb[]" value="' + response.invoice_tanggal[counter_bb_loop] + '" type="date" placeholder="" class="form-control class-readonly invoice_tanggal_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Perubahan Hak Terakhir</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="perubahan_hak_terakhir_bb' + counter_bb_loop + '" name="perubahan_hak_terakhir_bb[]" value="' + response.perubahan_hak_terakhir[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly perubahan_hak_terakhir_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +
                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tercatat Atas Nama</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="tercatat_atas_nama_bb' + counter_bb_loop + '" name="tercatat_atas_nama_bb[]" value="' + response.tercatat_atas_nama[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly tercatat_atas_nama_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Alamat Pemilik Saat Ini</label>' +
                            '<div class="col-lg-12">' +
                            '<textarea class="form-control class-readonly alamat_pemilik_saat_ini_bb" id="alamat_pemilik_saat_ini_bb' + counter_bb_loop + '" name="alamat_pemilik_saat_ini_bb[]" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' + response.alamat_pemilik_saat_ini[counter_bb_loop] + '</textarea>' +

                            '</div>' +
                            '</div>' +

                            '</div>' +

                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Umur Teknis</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="umur_teknis_bb' + counter_bb_loop + '" name="umur_teknis_bb[]" value="' + response.umur_teknis[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly umur_teknis_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Perkiraan Umur Ekonomis</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="perkiraan_umur_ekonomis_bb' + counter_bb_loop + '" name="perkiraan_umur_ekonomis_bb[]" value="' + response.perkiraan_umur_ekonomis[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly perkiraan_umur_ekonomis_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +


                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Tempat Penyimpanan</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="tempat_penyimpanan_bb' + counter_bb_loop + '" name="tempat_penyimpanan_bb[]" value="' + response.tempat_penyimpanan[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly tempat_penyimpanan_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Route</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="route_bb' + counter_bb_loop + '" name="route_bb[]" value="' + response.route[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly route_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +

                            '</div>' +
                            '</div>' +


                            '</div>' +

                            '<div class="row">' +

                            '<div class="col-lg-6">' +
                            '<label class="col-lg-12 control-label">Jarak Rata-rata Ditempuh</label>' +
                            '<div class="col-lg-12">' +
                            '<input id="jarak_rata_rata_tempuh_bb' + counter_bb_loop + '" name="jarak_rata_rata_tempuh_bb[]" value="' + response.jarak_rata_rata_tempuh[counter_bb_loop] + '" type="text" placeholder="" class="form-control class-readonly jarak_rata_rata_tempuh_bb" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>' +
                            '<br>' +
                            '<button type="button" class="btn btn-danger btn-sm btn_hapus_bb" data-id="' + counter_bb_loop + '" id="btn_hapus_bb' + counter_bb_loop + '" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-trash"></i> Hapus</button>' +
                            '</div>' +
                            '</div>' +



                            '</div>' +


                            '</div>';
                        $("#bb_dinamis").append(inputan_bb);
                        resizeJquerySteps();
                    }
                    // akhir
                    // Lakukan sesuatu dengan respons sukses
                    // Misalnya, tampilkan data ke dalam elemen HTML
                } else {
                    console.log('No data found for the given kd_data.');
                }
            },
            error: function (xhr, status, error) {
                console.log('Error retrieving data:', xhr.responseText);
            }
        });
    }

    function isi_fcr_agunan() {
        variabelGlobal(function (hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.fcr_agunan;


                var kd_data = hasil.message.data_entry.kd_data;
                // alert(data.kd_data)
                $('#kd_data_tambah').val(hasil.message.data_entry.kd_data);

            } else {
                alert(hasil.message)
            }
        });
    }

    function refresh_fcr_agunan(param) {
        isi_fcr_agunan()
        // tampil_button('save_fcr_agunan')
    }

    function lihatGambar(data_id) {
        // Ambil nilai kd_data dari $data_entry
        // console.log('ini data id ke-' + data_id)
        var kd_data = "<?php echo sha1($data_entry->kd_data) ?>";

        // Bangun URL dengan base_url dan kd_data
        var url = "<?php echo base_url() ?>lihat-gambar-situasi/" + kd_data + "/" + data_id;

        // Buka tautan dalam tab baru
        window.open(url, '_blank');
    }

    function editGambar(index) {
        // $("#modal_gambar_edit"+index).modal('show')
        document.getElementById("form_gambar_edit" + index).reset();
        variabelGlobal(function (hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.data_entry;
                // alert(data.kd_data)
                $('#kd_data_edit2' + index).val(data.kd_data);
                $("#modal_gambar_edit" + index).modal('show')
            } else {
                alert(hasil.message)
            }
        });
    }

    function submit_gambar(id_bangunan) {
        // edit file
        $('#form_gambar_edit' + id_bangunan).on('submit', function (e) {
            e.preventDefault();
            $('#mohon').show()
            $.ajax({
                url: "<?php echo base_url(); ?>" + 'pengajuan/edit_gambar/' + id_bangunan,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data == '1') {
                        $("#modal_gambar_edit" + id_bangunan).modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Gambar Situasi ' + id_bangunan + ' Berhasil', 'Berhasil')
                        refresh_fcr_agunan()
                    } else {
                        $('#mohon').hide()
                        toastr.warning(data, 'Gagal')
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    }

    function data_fcr_agunan() {
        var data_fcr_agunan1 = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            bukti_kepemilikan: [],
            tanggal_bukti_kepemilikan: [],

            surat_ukur: [],
            tanggal_surat_ukur: [],
            nib: [],
            penunjuk: [],
            kelurahan: [],
            kecamatan: [],
            kabupaten: [],
            provinsi: [],
            utara: [],
            barat: [],
            selatan: [],
            timur: [],
            luas: [],
            kanan: [],
            kiri: [],
            depan: [],
            belakang: [],
            daerah_pemakaian: [],
            kondisi_tanah: [],
            buku_tanah: [],
            menurut_pasar: [],
            keterangan_lain: [],

            
        };

        $('.bukti_kepemilikan').each(function () {
            data_fcr_agunan1.bukti_kepemilikan.push($(this).val());
        });
        $('.tanggal_bukti_kepemilikan').each(function () {
            data_fcr_agunan1.tanggal_bukti_kepemilikan.push($(this).val());
        });
        // baru tanah
        $('.surat_ukur').each(function () {
            data_fcr_agunan1.surat_ukur.push($(this).val());
        });
        $('.tanggal_surat_ukur').each(function () {
            data_fcr_agunan1.tanggal_surat_ukur.push($(this).val());
        });
        $('.nib').each(function () {
            data_fcr_agunan1.nib.push($(this).val());
        });
        $('.penunjuk').each(function () {
            data_fcr_agunan1.penunjuk.push($(this).val());
        });
        $('.kelurahan').each(function () {
            data_fcr_agunan1.kelurahan.push($(this).val());
        });
        $('.kecamatan').each(function () {
            data_fcr_agunan1.kecamatan.push($(this).val());
        });
        $('.kabupaten').each(function () {
            data_fcr_agunan1.kabupaten.push($(this).val());
        });
        $('.provinsi').each(function () {
            data_fcr_agunan1.provinsi.push($(this).val());
        });
        $('.utara').each(function () {
            data_fcr_agunan1.utara.push($(this).val());
        });
        $('.barat').each(function () {
            data_fcr_agunan1.barat.push($(this).val());
        });
        $('.selatan').each(function () {
            data_fcr_agunan1.selatan.push($(this).val());
        });
        $('.timur').each(function () {
            data_fcr_agunan1.timur.push($(this).val());
        });
        $('.luas').each(function () {
            data_fcr_agunan1.luas.push($(this).val());
        });
        $('.kanan').each(function () {
            data_fcr_agunan1.kanan.push($(this).val());
        });
        $('.kiri').each(function () {
            data_fcr_agunan1.kiri.push($(this).val());
        });
        $('.depan').each(function () {
            data_fcr_agunan1.depan.push($(this).val());
        });
        $('.belakang').each(function () {
            data_fcr_agunan1.belakang.push($(this).val());
        });
        $('.daerah_pemakaian').each(function () {
            data_fcr_agunan1.daerah_pemakaian.push($(this).val());
        });
        $('.kondisi_tanah').each(function () {
            data_fcr_agunan1.kondisi_tanah.push($(this).val());
        });
        $('.buku_tanah').each(function () {
            data_fcr_agunan1.buku_tanah.push($(this).val());
        });
        $('.menurut_pasar').each(function () {
            data_fcr_agunan1.menurut_pasar.push($(this).val());
        });
        $('.keterangan_lain').each(function () {
            data_fcr_agunan1.keterangan_lain.push($(this).val());
        });
        // console.log(data_fcr_agunan1['bukti_kepemilikan'])
        return data_fcr_agunan1;
    }


    function data_fcr_agunan_bangunan() {
        var data_fcr_agunan1 = {
            kd_data_tambah: $('#kd_data_tambah').val(),
            imb: [],
            pondasi: [],
            lantai: [],
            tinggi_lantai_terhadap_jalan: [],
            rangka: [],
            dinding: [],
            langit_plafond: [],
            atap: [],
            tahun_pembangunan: [],
            rehap_perbaikan: [],
            saat_pembelian_tanah: [],
            saat_pembangunan: [],
            saat_rehab_perbaikan: [],
            air: [],
            telepon: [],
            listrik: [],
            pagar: [],
            taman: [],
            lainnya_fag: [],
            lantai_total: "",
            total_bangunan: [],
            kondisi_bangunan: [],
            menurut_harga_perolehan: "",
            menurut_pasar_fag: "",
            keterangan_lain_fag: "",
            sarana: [],
            sarana_prasarana_fag: [],
            kelas: [],
        };

        $('.imb').each(function () {
            data_fcr_agunan1.imb.push($(this).val());
        });

        $('.pondasi').each(function () {
            data_fcr_agunan1.pondasi.push($(this).val());
        });
        // baru tanah
        $('.lantai').each(function () {
            data_fcr_agunan1.lantai.push($(this).val());
        });
        $('.tinggi_lantai_terhadap_jalan').each(function () {
            data_fcr_agunan1.tinggi_lantai_terhadap_jalan.push($(this).val());
        });
        $('.rangka').each(function () {
            data_fcr_agunan1.rangka.push($(this).val());
        });
        $('.dinding').each(function () {
            data_fcr_agunan1.dinding.push($(this).val());
        });
        $('.langit_plafond').each(function () {
            data_fcr_agunan1.langit_plafond.push($(this).val());
        });
        $('.atap').each(function () {
            data_fcr_agunan1.atap.push($(this).val());
        });
        $('.tahun_pembangunan').each(function () {
            data_fcr_agunan1.tahun_pembangunan.push($(this).val());
        });
        $('.rehap_perbaikan').each(function () {
            data_fcr_agunan1.rehap_perbaikan.push($(this).val());
        });
        $('.saat_pembelian_tanah').each(function () {
            data_fcr_agunan1.saat_pembelian_tanah.push($(this).val());
        });
        $('.saat_pembangunan').each(function () {
            data_fcr_agunan1.saat_pembangunan.push($(this).val());
        });
        $('.saat_rehab_perbaikan').each(function () {
            data_fcr_agunan1.saat_rehab_perbaikan.push($(this).val());
        });
        $('.air').each(function () {
            data_fcr_agunan1.air.push($(this).val());
        });
        $('.telepon').each(function () {
            data_fcr_agunan1.telepon.push($(this).val());
        });
        $('.listrik').each(function () {
            data_fcr_agunan1.listrik.push($(this).val());
        });
        $('.pagar').each(function () {
            data_fcr_agunan1.pagar.push($(this).val());
        });
        $('.taman').each(function () {
            data_fcr_agunan1.taman.push($(this).val());
        });
        $('.lainnya_fag').each(function () {
            data_fcr_agunan1.lainnya_fag.push($(this).val());
        });
        data_fcr_agunan1.lantai_total = hasilFCRAgunanBangunan.lantai_total;
        // $('.lantai1').each(function() {
        //     data_fcr_agunan1.lantai1.push($(this).val());
        // });
        // $('.lantai2').each(function() {
        //     data_fcr_agunan1.lantai2.push($(this).val());
        // });
        $('.total_bangunan').each(function () {
            data_fcr_agunan1.total_bangunan.push($(this).val());
        });
        $('.kondisi_bangunan').each(function () {
            data_fcr_agunan1.kondisi_bangunan.push($(this).val());
        });


        data_fcr_agunan1.menurut_harga_perolehan = hasilFCRAgunanBangunan.menurut_harga_perolehan;
        data_fcr_agunan1.menurut_pasar_fag = hasilFCRAgunanBangunan.menurut_pasar_fag;
        data_fcr_agunan1.keterangan_lain_fag = hasilFCRAgunanBangunan.keterangan_lain_fag;
        // $('.menurut_harga_perolehan').each(function() {
        //     data_fcr_agunan1.menurut_harga_perolehan.push($(this).val());
        // });
        // $('.menurut_pasar_fag').each(function() {
        //     data_fcr_agunan1.menurut_pasar_fag.push($(this).val());
        // });
        // $('.keterangan_lain_fag').each(function() {
        //     data_fcr_agunan1.keterangan_lain_fag.push($(this).val());
        // });

        $('.sarana').each(function () {
            data_fcr_agunan1.sarana.push($(this).val());
        });
        $('.sarana_prasarana_fag').each(function () {
            data_fcr_agunan1.sarana_prasarana_fag.push($(this).val());
        });
        $('.kelas').each(function () {
            data_fcr_agunan1.kelas.push($(this).val());
        });

        // $('.edit_gambar').each(function() {
        //     data_fcr_agunan1.edit_gambar.push($(this).val());
        // });

        // $('.edit_gambar').each(function() {
        //     var files = $(this)[0].files;
        //     for (var i = 0; i < files.length; i++) {
        //         data_fcr_agunan1.edit_gambar.push(convertToBase64(files[i]));
        //     }
        // });
        // console.log(data_fcr_agunan1)
        return data_fcr_agunan1;
    }

    function data_fcr_agunan_bb() {
        var data_fcr_agunan1 = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            // bukti_kepemilikan: [],

            jenis_dokumen_bb: [],

            jenis_bb: [],
            model_tipe_bb: [],
            merek_cc_bb: [],
            tahun_pembuatan_bb: [],
            tahun_pembeliaan_bb: [],
            serial_number_bb: [],
            nomor_mesin_bb: [],
            warna_bb: [],
            bahan_bakar_bb: [],
            kondisi_keadaan_bb: [],
            nomor_polisi_bb: [],
            bukti_kepemilikan_agb_bb: [],
            invoice_no_bb: [],
            invoice_tanggal_bb: [],
            perubahan_hak_terakhir_bb: [],
            tercatat_atas_nama_bb: [],
            alamat_pemilik_saat_ini_bb: [],
            umur_teknis_bb: [],
            perkiraan_umur_ekonomis_bb: [],
            tempat_penyimpanan_bb: [],
            route_bb: [],
            jarak_rata_rata_tempuh_bb: [],

            // edit_gambar_bb: [],
        };

        $('.jenis_dokumen_bb').each(function () {
            data_fcr_agunan1.jenis_dokumen_bb.push($(this).val());
        });
        $('.jenis_bb').each(function () {
            data_fcr_agunan1.jenis_bb.push($(this).val());
        });
        $('.model_tipe_bb').each(function () {
            data_fcr_agunan1.model_tipe_bb.push($(this).val());
        });
        $('.merek_cc_bb').each(function () {
            data_fcr_agunan1.merek_cc_bb.push($(this).val());
        });
        $('.tahun_pembuatan_bb').each(function () {
            data_fcr_agunan1.tahun_pembuatan_bb.push($(this).val());
        });
        $('.tahun_pembeliaan_bb').each(function () {
            data_fcr_agunan1.tahun_pembeliaan_bb.push($(this).val());
        });
        $('.serial_number_bb').each(function () {
            data_fcr_agunan1.serial_number_bb.push($(this).val());
        });
        $('.nomor_mesin_bb').each(function () {
            data_fcr_agunan1.nomor_mesin_bb.push($(this).val());
        });
        $('.warna_bb').each(function () {
            data_fcr_agunan1.warna_bb.push($(this).val());
        });
        $('.bahan_bakar_bb').each(function () {
            data_fcr_agunan1.bahan_bakar_bb.push($(this).val());
        });
        $('.kondisi_keadaan_bb').each(function () {
            data_fcr_agunan1.kondisi_keadaan_bb.push($(this).val());
        });
        $('.nomor_polisi_bb').each(function () {
            data_fcr_agunan1.nomor_polisi_bb.push($(this).val());
        });
        $('.bukti_kepemilikan_agb_bb').each(function () {
            data_fcr_agunan1.bukti_kepemilikan_agb_bb.push($(this).val());
        });
        $('.invoice_no_bb').each(function () {
            data_fcr_agunan1.invoice_no_bb.push($(this).val());
        });
        $('.invoice_tanggal_bb').each(function () {
            data_fcr_agunan1.invoice_tanggal_bb.push($(this).val());
        });
        $('.perubahan_hak_terakhir_bb').each(function () {
            data_fcr_agunan1.perubahan_hak_terakhir_bb.push($(this).val());
        });
        $('.tercatat_atas_nama_bb').each(function () {
            data_fcr_agunan1.tercatat_atas_nama_bb.push($(this).val());
        });
        $('.alamat_pemilik_saat_ini_bb').each(function () {
            data_fcr_agunan1.alamat_pemilik_saat_ini_bb.push($(this).val());
        });
        $('.umur_teknis_bb').each(function () {
            data_fcr_agunan1.umur_teknis_bb.push($(this).val());
        });
        $('.perkiraan_umur_ekonomis_bb').each(function () {
            data_fcr_agunan1.perkiraan_umur_ekonomis_bb.push($(this).val());
        });
        $('.tempat_penyimpanan_bb').each(function () {
            data_fcr_agunan1.tempat_penyimpanan_bb.push($(this).val());
        });
        $('.route_bb').each(function () {
            data_fcr_agunan1.route_bb.push($(this).val());
        });
        $('.jarak_rata_rata_tempuh_bb').each(function () {
            data_fcr_agunan1.jarak_rata_rata_tempuh_bb.push($(this).val());
        });


        // console.log(data_fcr_agunan1)
        return data_fcr_agunan1;
    }

    function post_fcr_agunan(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            // contentType: false,
            // processData: false,
            success: function (response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_fcr_agunan()
                    if (button == 'fcr_agunan') {
                        toastr.success(response.message, 'Berhasil')
                    }
                    if (button != 'fcr_agunan') {
                        var hasil_dok2 = data_dokumen();
                        edit_dok('edit_dokumen', hasil_dok2, 'finish_dok')
                    }
                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                    console.log(response)
                }
            },
            error: function (xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit fcr agunan gagal', 'Error')
            }
        });

    }

    // function hitung_luas() {
    //     var luas = 0;
    //     var timur = cek_ada($('#timur').val());
    //     var barat = cek_ada($('#barat').val());
    //     var utara = cek_ada($('#utara').val());
    //     var selatan = cek_ada($('#selatan').val());
    //     var luas = timur + barat + utara + selatan;
    //     return luas;
    // }

    // function cek_ada(input) {
    //     if (input != '' || input != null) {
    //         return parseInt(input);
    //     } else {
    //         return 0;
    //     }
    // }

    // function onInputLuas() {
    //     $("#timur, #barat, #utara, #selatan").on("input", function() {
    //         var luas_total = hitung_luas();
    //         $('#luas').val(luas_total)
    //     });
    // }

    function convertFilesToBase64(files) {
        // var files = $('#fileInput')[0].files;
        if (files.length > 0) {
            $('#base64Output').empty(); // Clear previous output
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = (function (file) {
                    return function (e) {
                        var base64String = e.target.result.split(',')[1]; // Get base64 string
                        $('#base64Output').append('<p>Base64 of ' + file.name + ':<br>' + base64String + '</p>');
                    };
                })(files[i]);
                reader.readAsDataURL(files[i]);
            }
        } else {
            alert('Please select a file.');
        }
    }

    function convert_base64(file) {
        $.ajax({
            url: "<?php echo base_url('pengajuan/convert_base64'); ?>",
            type: "post",
            dataType: "JSON",
            data: file,
            success: function (data) {
                console.log(data)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Error get data");
            }
        });
    }

    function convertToBase64(param) {
        // Select the input element using jQuery
        var $inputElement = $('#edit_gambar' + param);
        var selectedFile = $inputElement[0].files;

        // Check File is not Empty
        if (selectedFile.length > 0) {
            // Select the very first file from list
            var fileToLoad = selectedFile[0];
            // FileReader function for reading the file
            var fileReader = new FileReader();
            var base64;

            // Onload of file read the file content
            fileReader.onload = function (fileLoadedEvent) {
                base64 = fileLoadedEvent.target.result;
                // Print data in console
                console.log(base64);
                // Optionally display base64 string in an output div
                $('#base64Output').text(base64);
                return base64;
            };

            // Convert data to base64
            fileReader.readAsDataURL(fileToLoad);
        }
    }

    function paraf_fcr_agunan() {
        var data_fcr_agunan = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            unit_kerja_tambah: $('#unit_kerja_tambah').val(),
            nomor_halaman: '4',
            nama_halaman: 'FCR Agunan',

            cb_fcr_agunan: $('#cb_fcr_agunan').is(':checked')
            // upload dokumen
        };
        return data_fcr_agunan;
    }

    // input dinamis tanah
</script>