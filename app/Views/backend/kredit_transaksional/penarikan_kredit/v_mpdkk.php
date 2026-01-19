<!-- disini coding viewnya -->
<h1>Memo Penarikan Dana Kredit Konstruksi Transaksional</h1>
<fieldset>
    <h2 class="text-center text-danger">DATA NASABAH</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <!-- <label>Nama Debitur</label>
                <input type="text" name="nama_debitur_mpdkk" id="nama_debitur_mpdkk"  class="form-control"> -->
                
                <label>Nama Debitur</label>
                <input type="text" name="nama_debitur_mpdkk" id="nama_debitur_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Key Person</label>
                <input type="text" name="key_person_mpdkk" id="key_person_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Telepon/Fax</label>
                <input type="text" name="telepon_fax_mpdkk" id="telepon_fax_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nama Direktur</label>
                <input type="text" name="nama_direktur_mpdkk" id="nama_direktur_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Alamat Kantor</label>
                <textarea name="alamat_kantor_mpdkk" id="alamat_kantor_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>></textarea>
            </div>
            <div class="form-group">
                <label>Bidang Usaha</label>
                <input type="text" name="bidang_usaha_mpdkk" id="bidang_usaha_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
    </div>

    <!-- FASILITAS KREDIT -->
    <h2 class="text-center text-danger">FASILITAS KREDIT</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nomor PK</label>
                <input type="text" name="nomor_pk_mpdkk" id="nomor_pk_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Plafond Kredit</label>
                <input type="number" name="plafond_kredit_mpdkk" id="plafond_kredit_mpdkk" class="form-control" readonly <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Kualitas Kredit</label>
                <input type="text" name="kualitas_kredit_mpdkk" id="kualitas_kredit_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Tanggal PK</label>
                <input type="date" name="tanggal_pk_mpdkk" id="tanggal_pk_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Jangka Waktu Kredit</label>
                <input type="text" name="jangka_waktu_kredit_mpdkk" id="jangka_waktu_kredit_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
    </div>

    <!-- PENARIKAN KREDIT -->
    <h2 class="text-center text-danger">PENARIKAN KREDIT</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Penarikan Tahap</label>
                <input type="text" name="penarikan_tahap_mpdkk" id="penarikan_tahap_mpdkk" class="form-control" readonly <?= !empty($can_edit) ? '' : 'readonly'; ?>
                    value="<?= esc($termin) ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Permohonan</label>
                <input type="date" name="tgl_permohonan_mpdkk" id="tgl_permohonan_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Nomor SPK</label>
                <input type="text" name="no_spk_mpdkk" id="no_spk_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Nilai Kontrak</label>
                <input type="number" name="nilai_kontrak_mpdkk" id="nilai_kontrak_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Pemberi Kerja</label>
                <input type="text" name="pemberi_kerja_mpdkk" id="pemberi_kerja_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Jumlah Permohonan</label>
                <input type="number" name="jumlah_permohonan_mpdkk" id="jumlah_permohonan_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Jumlah Penarikan Disetujui</label>
                <input type="number" name="jumlah_penarikan_disetujui_mpdkk" id="jumlah_penarikan_disetujui_mpdkk"
                    class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <!-- <div class="form-group">
                <label>Persentase Pemotongan Kredit</label>
                <input type="text" name="persentase_pemotongan_mpdkk" id="persentase_pemotongan_mpdkk"
                    class="form-control  <?= !empty($can_edit) ? '' : 'readonly'; ?>col-lg-4">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div> -->
            <div class="form-group">
                <label for="persentase_pemotongan_mpdkk">Persentase Pemotongan Kredit</label>
                <div class="input-group col-lg-4">
                    <input type="number" step="0.01" min="0" name="persentase_pemotongan_mpdkk"
                        id="persentase_pemotongan_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nomor Surat Permohonan Debitur</label>
                <input type="text" name="no_surat_permohonan_mpdkk" id="no_surat_permohonan_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Nama Proyek</label>
                <input type="text" name="nama_proyek_mpdkk" id="nama_proyek_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Tanggal SPK</label>
                <input type="date" name="tgl_spk_mpdkk" id="tgl_spk_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Pelaksana</label>
                <input type="text" name="pelaksana_mpdkk" id="pelaksana_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Jangka Waktu Proyek</label>
                <input type="text" name="jangka_waktu_proyek_mpdkk" id="jangka_waktu_proyek_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Persentase Penarikan (%)</label>
                <input type="number" step="0.01" min="0" max="100" name="persentase_penarikan_mpdkk"
                    id="persentase_penarikan_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            <div class="form-group">
                <label>Sisa Termijn</label>
                <input type="number" name="sisa_termijn_mpdkk" id="sisa_termijn_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
            <div class="form-group">
                <label>Rencana Penggunaan</label>
                <textarea name="rencana_penggunaan_mpdkk" id="rencana_penggunaan_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>></textarea>
            </div>
            <div class="form-group">
                <label>Lain-Lain</label>
                <textarea name="lain_lain_mpdkk" id="lain_lain_mpdkk" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>></textarea>
            </div>
        </div>
    </div>

</fieldset>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Assuming you have a way to get the session permission from the backend
        var userPermission = "<?php echo session()->get('kd_level_user') ?? ''; ?>";

        if (userPermission === 'LVL23072023135343') {
            // Enable all readonly inputs and textareas
            console.log('mashok');
            document.querySelectorAll('.class-readonly').forEach(function (element) {
                element.removeAttribute('readonly');
            });

            // Enable all disabled selects
            document.querySelectorAll('.class-disabled').forEach(function (element) {
                element.removeAttribute('disabled');
            });
        }
    });
</script>