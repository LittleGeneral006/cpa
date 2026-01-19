<style>
.file-thumb{max-width:220px;max-height:160px;border-radius:6px}
.is-valid{border-color:#198754!important}
.is-invalid{border-color:#dc3545!important}
</style>

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
            <label>Permohonan Penarikan</label>
            <input type="file" id="permohonan_penarikan" name="permohonan_penarikan" accept=".pdf,.jpg,.jpeg,.png" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            <div id="permohonan_penarikan_status" class="mt-1"></div>
            <div id="permohonan_penarikan_preview" class="mt-2"></div>
        </div>
        <div class="col-lg-6">
            <label>Dokumen Kebutuhan Penarikan</label>
            <input type="file" id="dokumen_kebutuhan_penarikan" name="dokumen_kebutuhan_penarikan" accept=".pdf,.jpg,.jpeg,.png" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            <div id="dokumen_kebutuhan_penarikan_status" class="mt-1"></div>
            <div id="dokumen_kebutuhan_penarikan_preview" class="mt-2"></div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label>Dokumen Progres</label>
            <input type="file" id="dokumen_progres" name="dokumen_progres" accept=".pdf,.jpg,.jpeg,.png" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            <div id="dokumen_progres_status" class="mt-1"></div>
            <div id="dokumen_progres_preview" class="mt-2"></div>
        </div>
        <div class="col-lg-6">
            <label>Dokumen Lainnya</label>
            <input type="file" id="dokumen_lainnya" name="dokumen_lainnya" accept=".pdf,.jpg,.jpeg,.png" class="form-control" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            <div id="dokumen_lainnya_status" class="mt-1"></div>
            <div id="dokumen_lainnya_preview" class="mt-2"></div>
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

