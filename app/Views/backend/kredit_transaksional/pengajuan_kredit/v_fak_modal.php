<?php // if($tampil_fak_modal){ 
?>
<h1>Data FAK Modal</h1>
<fieldset>
    <h2>Data FAK Modal <a class="btn btn-default btn-rounded m-t-n-xs" onclick="hitungNilaiProyek()" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-refresh"></i></a></h2>
    <h2 class="text-center text-danger">Perhitungan Plafond Kredit</h2>
    <div class="form-group row">
        <label class="col-lg-3 control-label">Proyek</label>
        <div class="col-lg-2">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="proyek_fak_modal" name="proyek_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 control-label">Profit</label>
        <div class="col-lg-2">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="profit_fak_modal" name="profit_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 control-label">PPN</label>
        <div class="col-lg-2">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="ppn_fak_modal" name="ppn_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 control-label">Pemeliharaan</label>
        <div class="col-lg-2">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="pemeliharaan_fak_modal" name="pemeliharaan_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 control-label">Total Persentase Dari Proyek</label>
        <div class="col-lg-2">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="persentase_proyek_fak_modal" name="persentase_proyek_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-2">
            <a class="btn btn-default float-right btn-rounded m-t-n-xs" onclick="hitungNilaiProyek()" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><span>Nilai Proyek</span></a>
        </div>
        <div class="col-lg-4">
            <input id="nilai_proyek_fak_modal" name="nilai_proyek_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            <p>Nominal: <span id="nilai_proyek_fak_modal_separators" class="mask"></span></p>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">Persiapan dan Pekerjaan</h2>
    <div class="add-form-pp-fak-modal">
        <div class="form-group row">
            <!-- <div class="col-lg-1">
            </div> -->
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Item</label>
                <div class="col-lg-12">
                    <div class="input-group">
                        <input id="item_pp_fak_modal0" name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <label class="col-lg-12 control-label">Nilai</label>
                <div class="col-lg-12">
                    <div class="input-group">
                        <input id="nilai_pp_fak_modal0" name="nilai_pp_fak_modal[]" type="text" placeholder="" onchange="hitungPPFAKM()" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    </div>
                    <p>Nominal: <span id="nilai_pp_fak_modal0_separators" class="mask"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-3">
            <label class="col-lg-8 control-label">Koreksi Biaya</label>
        </div>
        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="koreksi_biaya_fak_modal" name="koreksi_biaya_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-3">
            <label class="col-lg-6 control-label">Jumlah</label>
        </div>
        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="jumlah_fak_modal" name="jumlah_fak_modal" onkeyup="copyvalue(this.id,'pekerjaan_persiapan_konstruksi_fak_rl')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <p>Nominal: <span id="jumlah_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
    </div>

    <br>
    <h2 class="text-center text-danger">Biaya Umum / Adm</h2>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Gaji Direktur</label>
            <div class="col-lg-12">
                <input id="gaji_direktur_fak_modal" name="gaji_direktur_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="gaji_direktur_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Gaji Pengawas</label>
            <div class="col-lg-12">
                <input id="gaji_pengawas_fak_modal" name="gaji_pengawas_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="gaji_pengawas_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Gaji Staf</label>
            <div class="col-lg-12">
                <input id="gaji_staf_fak_modal" name="gaji_staf_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="gaji_staf_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Biaya Umum</label>
            <div class="col-lg-12">
                <input id="biaya_umum_fak_modal" name="biaya_umum_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="biaya_umum_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Jumlah</label>
            <div class="col-lg-12">
                <input id="jumlah_total_biaya_umum_fak_modal" name="jumlah_total_biaya_umum_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="jumlah_total_biaya_umum_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Total</label>
            <div class="col-lg-12">
                <input id="total_biaya_umum_fak_modal" name="total_biaya_umum_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="total_biaya_umum_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">Kebutuhan Modal Kerja (s/d pekerjaan <input type="text" id="persentase_pekerjaan_fak_modal" name="persentase_pekerjaan_fak_modal" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> onkeyup="hitungJumlahKebutuhanModalKerja()" style="display: inline-block; width: 90px; margin-left: 10px;">%)</h2>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Persiapan dan Pekerjaan</label>
            <div class="col-lg-12">
                <input id="persiapan_pekerjaan_fak_modal" name="persiapan_pekerjaan_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="persiapan_pekerjaan_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Biaya Umum/ Adm</label>
            <div class="col-lg-12">
                <input id="biaya_umum_adm_fak_modal" name="biaya_umum_adm_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="biaya_umum_adm_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-6 control-label">Total</label>
            <div class="col-lg-12">
                <input id="jumlah_kebutuhan_modal_kerja_fak_modal" name="jumlah_kebutuhan_modal_kerja_fak_modal" type="text" placeholder="" value="0" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="jumlah_kebutuhan_modal_kerja_fak_modal_separators" class="mask"></span></p>
            </div>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">SUMBER PEMBIAYAAN</h2>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-3">
                </div>
                <div class="col-lg-3">
                    <label class="col-lg-10 control-label" style="margin-bottom: ‒10;"><strong>Dibulatkan</strong></label>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <label class="col-lg-10 control-label">Penerimaan Uang Muka</label>
                </div>
                <div class="col-lg-3">
                    <input id="penerimaan_uang_muka_fak_modal" name="penerimaan_uang_muka_fak_modal" readonly type="text" placeholder="" onkeyup="hitungSemua()" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="jumlah_penerimaan_uang_muka_fak_modal" readonly name="jumlah_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="persentase_penerimaan_uang_muka_fak_modal" readonly name="persentase_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <label class="col-lg-10 control-label">Pembiayaan Sendiri Minimal 10%</label>
                </div>
                <div class="col-lg-3">
                    <input id="pembiayaan_sendiri_fak_modal" readonly name="pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="jumlah_pembiayaan_sendiri_fak_modal" readonly name="jumlah_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="persentase_pembiayaan_sendiri_fak_modal" readonly name="persentase_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <label class="col-lg-10 control-label">Kredit Bank</label>
                </div>
                <div class="col-lg-3">
                    <input id="kredit_bank_fak_modal" name="kredit_bank_fak_modal" readonly type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="jumlah_kredit_bank_fak_modal" name="jumlah_kredit_bank_fak_modal" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="persentase_kredit_bank_fak_modal" readonly name="persentase_kredit_bank_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <label class="col-lg-10 control-label">Jumlah</label>
                </div>
                <div class="col-lg-3">
                    <input id="sumber_pembiayaan_fak_modal" readonly name="sumber_pembiayaan_fak_modal" onchange="copyvalue(this.id)" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="jumlah_bulat_sumber_pembiayaan_fak_modal" readonly name="jumlah_bulat_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
                <div class="col-lg-3">
                    <input id="persentase_jumlah_sumber_pembiayaan_fak_modal" readonly name="persentase_jumlah_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_fak_modal" title="Checkbox ini sebagai paraf" name="cb_fak_modal"
                    <?php echo (!empty($edit_data) && !empty($edit_data_koordinator)) ? '' : 'disabled'; ?>>

            </div>
        </div>
    </div>
</fieldset>
<?php //} 
?>