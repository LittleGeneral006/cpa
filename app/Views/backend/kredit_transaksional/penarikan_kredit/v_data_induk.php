<h1>Data Induk</h1>
<fieldset>
    <?php
$ro  = $isReadonly ? 'readonly' : '';
$dis = $isReadonly ? 'disabled' : '';

?>
<?php if (!$isReadonly): ?>
<?php else: ?>
    <div class="alert alert-info">
        Data ini bersifat <b>READ ONLY</b>
        <?= ($status === 'DISETUJUI') 
            ? 'karena sudah disetujui.'
            : 'karena Anda sudah memberikan disposisi.' ?>
    </div>
<?php endif; ?>
<h2 class="text-center text-danger">PEMROSES</h2>
<div class="form-group">
    <div class="row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Unit Kerja</label>
            <div class="col-lg-12">
                <!-- <select class="form-control class-disabled select" id="unit_kerja" name="unit_kerja">
                </select> -->
                <input id="unit_kerja" name="unit_kerja" type="text" placeholder="" class="form-control class-readonly" <?= $ro ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Pemasar</label>
            <div class="col-lg-12">
                <input id="pemasar" name="pemasar" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?> <?= $ro ?>>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Koordinator Pemasar</label>
            <div class="col-lg-12">
                <input id="koor_pemasar" name="koor_pemasar" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Kepala Cabang</label>
            <div class="col-lg-12">
                <input id="kacab" name="kacab" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Kepala Bagian</label>
            <div class="col-lg-12">
                <input id="kabag" name="kabag" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Kepala Divisi</label>
            <div class="col-lg-12">
                <input id="kadiv" name="kadiv" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
            </div>
        </div>
    </div>
</div>
<h2 class="text-center text-danger">DATA DEBITUR</h2>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Nama Debitur</label>
        <div class="col-lg-12">
            <input id="nama_debitur_induk" name="nama_debitur_induk" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">NPWP</label>
        <div class="col-lg-12">
            <input id="npwp" name="npwp" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Bidang Usaha</label>
        <div class="col-lg-12">
            <input id="bidang_usaha" name="bidang_usaha" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Nama Direktur</label>
        <div class="col-lg-12">
            <input id="nama_direktur" name="nama_direktur" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Key Person</label>
        <div class="col-lg-12">
            <input id="key_person" name="key_person" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Alamat Kantor</label>
        <div class="col-lg-12">
            <input id="alamat_kantor_induk" name="alamat_kantor_induk" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Alamat Gudang/Pabrik/workshop</label>
        <div class="col-lg-12">
            <input id="alamat_gudang_induk" name="alamat_gudang_induk" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Group Debitur</label>
        <div class="col-lg-12">
            <input id="group_debitur_induk" name="group_debitur_induk" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<h2 class="text-center text-danger">DATA PROYEK</h2>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Nama Proyek</label>
        <div class="col-lg-12">
            <input id="nama_proyek" name="nama_proyek" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Nomor SPK/ SPPBJ/ Gunning/ Kontrak</label>
        <div class="col-lg-12">
            <input id="nomor_spk" name="nomor_spk" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Tanggal SPK/ SPPBJ/ Gunning/ Kontrak</label>
        <div class="col-lg-12">
            <input id="tanggal_spk" name="tanggal_spk" type="date" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Nilai Proyek</label>
        <div class="col-lg-12">
            <input id="nilai_proyek" name="nilai_proyek" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Alamat Proyek</label>
        <div class="col-lg-12">
            <textarea class="form-control" id="alamat_proyek" name="alamat_proyek" rows="3" <?= !empty($can_edit) ? '' : 'readonly'; ?>></textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Pemberi Kerja (Bouwheer)</label>
        <div class="col-lg-12">
            <input id="pemberi_kerja" name="pemberi_kerja" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Penandatangan Kontrak (Bouwheer)</label>
        <div class="col-lg-12">
            <input id="penandatangan_kontrak" name="penandatangan_kontrak" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Alamat Pemberi Kerja</label>
        <div class="col-lg-12">
            <textarea class="form-control" id="alamat_pemberi_kerja" name="alamat_pemberi_kerja" rows="3" <?= !empty($can_edit) ? '' : 'readonly'; ?>></textarea>
        </div>
    </div>
</div>
<h2 class="text-center text-danger">FASILITAS KREDIT</h2>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Nomor PK</label>
        <div class="col-lg-12">
            <input id="nomor_pk" name="nomor_pk" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Tanggal PK</label>
        <div class="col-lg-12">
            <input id="tanggal_pk" name="tanggal_pk" type="date" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Plafond</label>
        <div class="col-lg-12">
            <input id="plafond" name="plafond" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="col-lg-12 control-label">Jangka Waktu Kredit</label>
        <div class="col-lg-12">
            <input id="jangka_waktu_kredit" name="jangka_waktu_kredit" type="text" placeholder="" class="form-control class-readonly" <?= !empty($can_edit) ? '' : 'readonly'; ?>>
        </div>
    </div>
</div>
</fieldset>