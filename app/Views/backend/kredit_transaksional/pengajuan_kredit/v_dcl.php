<?php // if($tampil_dcl_compliance){ 
?>
<h1>DCL Compliance</h1>
<fieldset>
    <h2>DCL Compliance</h2>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Pengelola</label>
        </div>
        <div class="col-lg-6">
            <select class="form-control class-disabled select" id="pengelola_dcl" name="pengelola_dcl">
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Tanggal</label>
        </div>
        <div class="col-lg-3">
            <input id="tanggal_dcl" name="" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Berkas Diterima Analis</label>
        </div>
        <div class="col-lg-3">
            <input id="tanggal_berkas_dcl" name="tanggal_berkas_dcl" readonly type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
    </div>
    <h2 class="text-center text-danger">Informasi Debitur</h2>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Nama Pemohon (Debitur/Calon Debitur)</label>
        </div>
        <div class="col-lg-3">
            <input id="nama_pemohon_dcl" name="nama_pemohon_dcl" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Jenis Usaha/Pekerjaan</label>
        </div>
        <div class="col-lg-3">
            <input id="jenis_usaha_dcl" name="jenis_usaha_dcl" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Nama Perusahaan Pemohon (Debitur/Calon Debitur)</label>
        </div>
        <div class="col-lg-3">
            <input id="nama_perusahaan_pemohon_dcl" name="nama_perusahaan_pemohon_dcl" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
    </div>
    <!-- <div class="form-group row"> -->
    <button class="btn btn-success mt-2 tambah-field-dcl text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Nama Pemilik Perusahaan</button>
    <div class="add-form-dcl">
        <div class="form-group row">
            <div class="col-md-1">
                <div class="col-lg-10">
                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-10 control-label">Nama</label>
                <div class="col-lg-12">
                    <input id="nama_pemilik_perusahaan_dcl1" name="nama_pemilik_perusahaan_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
            <div class="col-lg-4">
                <label class="col-lg-10 control-label">% Saham</label>
                <div class="col-lg-4">
                    <input id="persentase_saham_dcl1" name="persentase_saham_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- <div class="form-group row"> -->
    <button class="btn btn-success mt-2 tambah-field-dcl2 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah</button>
    <div class="add-form-dcl2">
        <div class="form-group row">
            <div class="col-md-1">
                <div class="col-lg-10">
                </div>
            </div>
            <div class="col-lg-2">
                <label class="col-lg-12 control-label">Jabatan</label>
                <div class="col-lg-12">
                    <input id="jabatan_pengurus_perusahaan_dcl1" name="jabatan_pengurus_perusahaan_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
            <div class="col-lg-4">
                <label class="col-lg-6 control-label">Nama</label>
                <div class="col-lg-12">
                    <input id="nama_pengurus_perusahaan_dcl1" name="nama_pengurus_perusahaan_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
            <div class="col-lg-4">
                <label class="col-lg-12 control-label">Kartu Pengenal</label>
                <div class="col-lg-12">
                    <input id="ktp_dcl1" name="ktp_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <div class="form-group row">
        <div class="col-lg-3">
            <label class="col-lg-6 control-label">Jenis Usaha</label>
        </div>
        <div class="col-lg-8">
            <input id="jenis_usaha_perusahaan_dcl" name="jenis_usaha_perusahaan_dcl" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
    </div>
    <h2 class="text-center text-danger">Informasi Rencana Pemberian Kredit</h2>
    <div class="form-group row">
        <button class="btn btn-success mt-2 tambah-field-dcl3 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah</button>
        <div class="add-form-dcl3">
            <div class="form-group row">
                <div class="col-md-1">
                    <div class="col-lg-10">
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-24 control-label">Fasilitas Kredit</label>
                    <div class="col-lg-12">
                        <textarea type="text" id="fasilitas_kredit_dcl1" name="fasilitas_kredit_dcl[]" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                        <!-- <input id="fasilitas_kredit_dcl1" name="fasilitas_kredit_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>> -->
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-24 control-label">Plafond</label>
                    <div class="col-lg-10">
                        <input id="plafond_dcl1" name="plafond_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-24 control-label">Jangka Waktu</label>
                    <div class="col-lg-12">
                        <textarea type="text" id="jangka_waktu_dcl1" name="jangka_waktu_dcl[]" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                        <!-- <input id="jangka_waktu_dcl1" name="jangka_waktu_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>> -->
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-24 control-label">Tujuan Penggunaan</label>
                    <div class="col-lg-12">
                        <textarea type="text" id="tujuan_penggunaan_dcl1" name="tujuan_penggunaan_dcl[]" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                        <!-- <input id="tujuan_penggunaan_dcl1" name="tujuan_penggunaan_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>> -->
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-24 control-label">Permohonan Diterima Pemasar</label>
                    <div class="col-lg-12">
                        <input id="permohonan_diterima_dcl1" name="permohonan_diterima_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <button class="btn btn-success mt-2 tambah-field-dcl4 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah</button>
        <div class="add-form-dcl4">
            <div class="form-group row">
                <div class="col-md-1">
                    <div class="col-lg-10">
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-12 control-label">Bukti Kepemilikan</label>
                    <div class="col-lg-10">
                        <input id="bukti_kepemilikan_dcl1" name="bukti_kepemilikan_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="col-lg-6 control-label">Jenis Agunan</label>
                    <div class="col-lg-12">
                        <input id="jenis_agunan_dcl1" name="jenis_agunan_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Tanggal</label>
                    <div class="col-lg-10">
                        <input id="tanggal_agunan_dcl1" name="tanggal_agunan_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Avalist</label>
                    <div class="col-lg-12">
                        <input id="avalist_dcl1" name="avalist_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Nominal</label>
                    <div class="col-lg-12">
                        <input id="nominal_dcl1" name="nominal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <button class="btn btn-success mt-2 tambah-field-dcl5 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Kredit Existing</button>
        <div class="add-form-dcl5">
            <div class="form-group row">
                <div class="col-md-1">
                    <div class="col-lg-10">
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="col-lg-6 control-label">Fasilitas</label>
                    <div class="col-lg-12">
                        <input id="fasilitas_dcl1" name="fasilitas_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-12 control-label">Jatuh Tempo</label>
                    <div class="col-lg-12">
                        <input id="jatuh_tempo_dcl1" name="jatuh_tempo_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Plafond</label>
                    <div class="col-lg-12">
                        <input id="plafond_existing_dcl1" name="plafond_existing_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Outstanding</label>
                    <div class="col-lg-12">
                        <input id="outstanding_dcl1" name="outstanding_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Kolektibilitas</label>
                    <div class="col-lg-12">
                        <input id="kolektibilitas_dcl1" name="kolektibilitas_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <button class="btn btn-success mt-2 tambah-field-dcl6 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Kredit Grup</button>
        <div class="add-form-dcl6">
            <div class="form-group row">

                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Fasilitas</label>
                    <div class="col-lg-12">
                        <input id="fasilitas_kredit_grup_dcl1" name="fasilitas_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-12 control-label">Nama Debitur</label>
                    <div class="col-lg-12">
                        <input id="nama_debitur_kredit_grup_dcl1" name="nama_debitur_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-12 control-label">Jatuh Tempo</label>
                    <div class="col-lg-10">
                        <input id="jatuh_tempo_kredit_grup_dcl1" name="jatuh_tempo_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Plafond</label>
                    <div class="col-lg-12">
                        <input id="plafond_existing_kredit_grup_dcl1" name="plafond_existing_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Outstanding</label>
                    <div class="col-lg-12">
                        <input id="outstanding_kredit_grup_dcl1" name="outstanding_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Kolektibilitas</label>
                    <div class="col-lg-8">
                        <input id="kolektibilitas_kredit_grup_dcl1" name="kolektibilitas_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <button class="btn btn-success mt-2 tambah-field-dcl7 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Kredit an. Debitur di Bank/LJK lain</button>
        <div class="add-form-dcl7">
            <div class="form-group row">

                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Fasilitas</label>
                    <div class="col-lg-12">
                        <input id="fasilitas_bank_lain_dcl1" name="fasilitas_bank_lain_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Bank/LJK</label>
                    <div class="col-lg-12">
                        <input id="bank_ljk_bank_lain_dcl1" name="bank_ljk_bank_lain_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-12 control-label">Jatuh Tempo</label>
                    <div class="col-lg-10">
                        <input id="jatuh_tempo_bank_lain_dcl1" name="jatuh_tempo_bank_lain_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Plafond</label>
                    <div class="col-lg-12">
                        <input id="plafond_existing_bank_lain_dcl1" name="plafond_existing_bank_lain_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Outstanding</label>
                    <div class="col-lg-12">
                        <input id="outstanding_bank_lain_dcl1" name="outstanding_bank_lain_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label class="col-lg-6 control-label">Kolektibilitas</label>
                    <div class="col-lg-8">
                        <input id="kolektibilitas_bank_lain_dcl1" name="kolektibilitas_bank_lain_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="form-group row"> -->
    <h2 class="text-center text-danger">Pelaksanaan terhadap Prinsip kehati-hatian OJK / Bank Indonesia</h2>
    <div class="form-group row">
        <div class="col-lg-4">
            <label class="col-lg-6 control-label">Pengujian</label>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Dasar Pengujian</label>
        </div>
        <div class="col-lg-2">
            <label class="col-lg-6 control-label">Checklist</label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_ojk_dcl1" name="pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_ojk_dcl1" name="dasar_pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_ojk_dcl[]" id="checklist_pengujian_ojk_dcl1" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_ojk_dcl2" name="pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_ojk_dcl2" name="dasar_pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_ojk_dcl[]" id="checklist_pengujian_ojk_dcl2" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_ojk_dcl3" name="pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_ojk_dcl3" name="dasar_pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_ojk_dcl[]" id="checklist_pengujian_ojk_dcl3" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">Uji terhadap Ketentuan Internal</h2>
    <div class="form-group row">
        <div class="col-lg-4">
            <label class="col-lg-6 control-label">Pengujian</label>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Dasar Pengujian</label>
        </div>
        <div class="col-lg-2">
            <label class="col-lg-6 control-label">Checklist</label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_internal_dcl1" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_internal_dcl1" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl1" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
            <!-- <input id="checklist_pengujian_internal_dcl1" name="checklist_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>> -->
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_internal_dcl2" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_internal_dcl2" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl2" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_internal_dcl3" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_internal_dcl3" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl3" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_internal_dcl4" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_internal_dcl4" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl4" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_internal_dcl5" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_internal_dcl5" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl5" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            <input id="pengujian_internal_dcl6" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-6">
            <input id="dasar_pengujian_internal_dcl6" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
        </div>
        <div class="col-lg-2">
            <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl6" class=" form-control class-disabled select">
                <option value=""></option>
                <option value="comply">Comply</option>
                <option value="not comply">Not Comply</option>
            </select>
        </div>
    </div>
    <button class="btn btn-success mt-2 tambah-field-dcl8 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Uji terhadap Ketentuan Lainnya</button>
    <div class="add-form-dcl8">
        <div class="form-group row">
            <div class="col-lg-4">
                <label class="col-lg-6 control-label">Pengujian</label>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-6 control-label">Dasar Pengujian</label>
            </div>
            <div class="col-lg-2">
                <label class="col-lg-6 control-label">Checklist</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <input id="pengujian_lainnya_dcl1" name="pengujian_lainnya_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
            <div class="col-lg-6">
                <input id="dasar_pengujian_lainnya_dcl1" name="dasar_pengujian_lainnya_dcl[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
            <div class="col-lg-2">
                <select <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> name="checklist_pengujian_lainnya_dcl[]" id="checklist_pengujian_lainnya_dcl1" class=" form-control class-disabled select">
                    <option value=""></option>
                    <option value="comply">Comply</option>
                    <option value="not comply">Not Comply</option>
                </select>
            </div>
        </div>
    </div>
    <h2 class="text-center text-danger">Kesimpulan</h2>
    <div class="form-group row">
        <div class="col-lg-3">
            <label class="col-lg-6 control-label">Kesimpulan</label>
        </div>
        <div class="col-lg-6">
            <textarea id="kesimpulan_dcl" name="kesimpulan_dcl" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">
            <label class="col-lg-6 control-label">Komentar</label>
        </div>
        <div class="col-lg-6">
            <textarea id="komentar_dcl" name="komentar_dcl" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_dcl" title="Checkbox ini sebagai paraf" name="cb_dcl"
                    <?php echo (!empty($edit_data) && !empty($edit_data_koordinator)) ? '' : 'disabled'; ?>>

            </div>
        </div>
    </div>
</fieldset>
<?php // } 
?>