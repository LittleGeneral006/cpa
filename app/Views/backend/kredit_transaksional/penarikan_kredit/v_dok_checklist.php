<h1>Dokumen Pendukung</h1>
<fieldset>
    <h2>Dokumen Pendukung</h2>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Nama Nasabah</label>
                <div class="col-lg-12">
                    <input id="nama_nasabah_dp" name="nama_nasabah_dp" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Alamat Kantor</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="alamat_dp" name="alamat_dp" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Usaha</label>
            <div class="col-lg-12">
                <input id="usaha_dp" name="usaha_dp" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Permohonan Perizinan</label>
            <div class="col-lg-12">
                <input type="file" class="form-control-file" id="permohonan_perizinan" name="permohonan_perizinan" accept=".pdf,.jpg,.jpeg,.png">
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Dokumen Kebutuhan Penarikan</label>
            <div class="col-lg-12">
                <input type="file" class="form-control-file" id="dokumen_kebutuhan_penarikan" name="dokumen_kebutuhan_penarikan" accept=".pdf,.jpg,.jpeg,.png">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Dokumen Progres</label>
            <div class="col-lg-12">
                <input type="file" class="form-control-file" id="dokumen_progres" name="dokumen_progres" accept=".pdf,.jpg,.jpeg,.png">
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Dokumen Lainnya</label>
            <div class="col-lg-12">
                <input type="file" class="form-control-file" id="dokumen_lainnya" name="dokumen_lainnya" accept=".pdf,.jpg,.jpeg,.png">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_dokumen_ceklis" title="Checkbox ini sebagai paraf" name="cb_dokumen_ceklis" <?php echo empty($edit_data) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
</fieldset>

