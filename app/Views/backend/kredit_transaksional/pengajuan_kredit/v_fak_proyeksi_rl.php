<?php // if($tampil_fak_proyeksi_rl){ 
?>
<h1>Data FAK Proyeksi RL</h1>
<fieldset>
    <h2>Data FAK Proyeksi RL</h2>
    <h2 class="text-center text-danger">Proyeksi Laba Rugi</h2>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Nilai Kontrak</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="nilai_kontrak_fak_rl" name="nilai_kontrak_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Pekerjaan Persiapan Dan Konstruksi</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="pekerjaan_persiapan_konstruksi_fak_rl" name="pekerjaan_persiapan_konstruksi_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Laba Kotor</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="laba_kotor_fak_rl" name="laba_kotor_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Biaya Adm/Umum</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="biaya_umum_adm_fak_rl" name="biaya_umum_adm_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Laba Usaha</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="laba_usaha_fak_rl" name="laba_usaha_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Bunga + Provisi Bank</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="bunga_provisi_bank_fak_rl" name="bunga_provisi_bank_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Laba Sebelum Pajak</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="laba_sebelum_pajak_fak_rl" name="laba_sebelum_pajak_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Pajak (PPh & PPN)</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="pajak_pph_ppn_fak_rl" name="pajak_pph_ppn_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Laba Bersih</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="laba_bersih_fak_rl" name="laba_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <br>
    <div class="border border-dark p-1">
        <h2 class="text-center text-danger">Ratio</h2>
        <div class="form-group row">
            <div class="col-lg-6">
                <label class="col-lg-6 control-label">Gross Profit Marfin</label>
                <div class="col-lg-12">
                    <input id="gross_profit_margin_fak_rl" name="gross_profit_margin_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-6 control-label">Gross Operating Margin</label>
                <div class="col-lg-12">
                    <input id="gross_operating_margin_fak_rl" name="gross_operating_margin_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label class="col-lg-6 control-label">Return of Sale</label>
                <div class="col-lg-12">
                    <input id="return_of_sale_fak_rl" name="return_of_sale_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-6 control-label">Return of Equity</label>
                <div class="col-lg-12">
                    <input id="return_of_equity_fak_rl" name="return_of_equity_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">Potongan Kredit</h2>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Harga Borongan</label>
        <div class="col-lg-3">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="harga_borongan_fak_rl" name="harga_borongan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Penerimaan Uang Muka</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="persentase_penerimaan_uang_muka_fak_rl" name="persentase_penerimaan_uang_muka_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="penerimaan_uang_muka_fak_rl" name="penerimaan_uang_muka_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Penerimaan Termijn</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="persentase_penerimaan_termijn_fak_rl" name="persentase_penerimaan_termijn_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="penerimaan_termijn_fak_rl" name="penerimaan_termijn_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Penerimaan Termijn Pemeliharaan</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="persentase_penerimaan_termijn_pemeliharaan_fak_rl" name="persentase_penerimaan_termijn_pemeliharaan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="penerimaan_termijn_pemeliharaan_fak_rl" name="penerimaan_termijn_pemeliharaan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Penerimaan Bersih</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="persentase_penerimaan_bersih_fak_rl" name="persentase_penerimaan_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="penerimaan_bersih_fak_rl" name="penerimaan_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Pajak (PPN & PPh)</label>
        <div class="col-lg-3">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="pajak_ppn_pph_fak_rl" name="pajak_ppn_pph_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="kosong_bersih_fak_rl" name="kosong_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Kredit Bank yang Diberikan</label>
        <div class="col-lg-3">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="kredit_bank_fak_rl" name="kredit_bank_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">% Pemotongan Kredit Bank</label>
        <div class="col-lg-3">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="persentase_pemotongan_kredit_bank_fak_rl" name="persentase_pemotongan_kredit_bank_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-1">

        </div>
        <label class="col-lg-3 control-label">Dibulatkan</label>
        <div class="col-lg-3">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="dibulatkan_fak_rl" name="dibulatkan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

    <br>
</fieldset>
<?php // } 
?>