<!-- disini coding viewnya -->
<h1>Memo Penarikan Dana Kredit Konstruksi Transaksional</h1>
<fieldset>
    <h2 class="text-center text-danger">DATA NASABAH</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <!-- <label>Nama Debitur</label>
                <input type="text" name="nama_debitur" class="form-control"> -->
                <?= form_label('Nama Debitur', 'nama_debitur') ?>
            <?= form_input('nama_debitur', '', ['class' => 'form-control', 'id' => 'nama_debitur']) ?>
            </div>
            <div class="form-group">
                <label>Key Person</label>
                <input type="text" name="key_person" class="form-control">
            </div>
            <div class="form-group">
                <label>Telepon/Fax</label>
                <input type="text" name="telepon_fax" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nama Direktur</label>
                <input type="text" name="nama_direktur" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat Kantor</label>
                <textarea name="alamat_kantor" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Bidang Usaha</label>
                <input type="text" name="bidang_usaha" class="form-control">
            </div>
        </div>
    </div>

    <!-- FASILITAS KREDIT -->
    <h2 class="text-center text-danger">FASILITAS KREDIT</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nomor PK</label>
                <input type="text" name="nomor_pk" class="form-control">
            </div>
            <div class="form-group">
                <label>Plafond Kredit</label>
                <input type="number" name="plafond_kredit" class="form-control">
            </div>
            <div class="form-group">
                <label>Kualitas Kredit</label>
                <input type="text" name="kualitas_kredit" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Tanggal PK</label>
                <input type="date" name="tanggal_pk" class="form-control">
            </div>
            <div class="form-group">
                <label>Jangka Waktu Kredit</label>
                <input type="text" name="jangka_waktu_kredit" class="form-control">
            </div>
        </div>
    </div>

    <!-- PENARIKAN KREDIT -->
    <h2 class="text-center text-danger">PENARIKAN KREDIT</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Penarikan Tahap</label>
                <input type="text" name="penarikan_tahap" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Permohonan</label>
                <input type="date" name="tgl_permohonan" class="form-control">
            </div>
            <div class="form-group">
                <label>Nomor SPK</label>
                <input type="text" name="no_spk" class="form-control">
            </div>
            <div class="form-group">
                <label>Nilai Kontrak</label>
                <input type="number" name="nilai_kontrak" class="form-control">
            </div>
            <div class="form-group">
                <label>Pemberi Kerja</label>
                <input type="text" name="pemberi_kerja" class="form-control">
            </div>
            <div class="form-group">
                <label>Jumlah Permohonan</label>
                <input type="number" name="jumlah_permohonan" class="form-control">
            </div>
            <div class="form-group">
                <label>Jumlah Penarikan Disetujui</label>
                <input type="number" name="jumlah_penarikan_disetujui" class="form-control">
            </div>
            <div class="form-group">
                <label>Prosentase Pemotongan Kredit</label>
                <input type="text" name="prosentase_pemotongan" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nomor Surat Permohonan Debitur</label>
                <input type="text" name="no_surat_permohonan" class="form-control">
            </div>
            <div class="form-group">
                <label>Nama Proyek</label>
                <input type="text" name="nama_proyek" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal SPK</label>
                <input type="date" name="tgl_spk" class="form-control">
            </div>
            <div class="form-group">
                <label>Pelaksana</label>
                <input type="text" name="pelaksana" class="form-control">
            </div>
            <div class="form-group">
                <label>Jangka Waktu Proyek</label>
                <input type="text" name="jangka_waktu_proyek" class="form-control">
            </div>
            <div class="form-group">
                <label>Rencana Penggunaan</label>
                <textarea name="rencana_penggunaan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Sisa Termijn</label>
                <input type="number" name="sisa_termijn" class="form-control">
            </div>
            <div class="form-group">
                <label>Lain-Lain</label>
                <textarea name="lain_lain" class="form-control"></textarea>
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
