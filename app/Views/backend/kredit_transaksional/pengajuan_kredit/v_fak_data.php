<?php //  if($tampil_fak_data){ 
?>
<h1>Data FAK</h1>
<fieldset>
    <h2>Data FAK Data</h2>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Kegiatan</label>
            <div class="col-lg-12">
                <input id="kegiatan_fak_data" name="kegiatan_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Pekerjaan</label>
            <div class="col-lg-12">
                <input id="pekerjaan_fak_data" name="pekerjaan_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Nomor Kontrak</label>
            <div class="col-lg-12">
                <input id="no_kontrak_fak_data" name="no_kontrak_fak_data" type="text" placeholder="" onkeyup="copyvalue(this.id,'no_kontrak2_fak_data')" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Lokasi</label>
            <div class="col-lg-12">
                <input id="lokasi_fak_data" name="lokasi_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Kontraktor</label>
            <div class="col-lg-12">
                <input id="kontraktor_fak_data" name="kontraktor_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Sumber Dana</label>
            <div class="col-lg-12">
                <input id="sumber_dana_fak_data" name="sumber_dana_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Nilai Kontrak Setelah PPN</label>
            <div class="col-lg-12">
                <input id="nilai_kontrak_setelah_ppn_fak_data" name="nilai_kontrak_setelah_ppn_fak_data" onkeyup="copyvalue2(this.id,'nilai_kontrak_fak_rl','harga_borongan_fak_rl')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="nilai_kontrak_setelah_ppn_fak_data_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">PPN</label>
            <div class="col-lg-4">
                <div class="input-group">
                    <input id="ppn_fak_data" name="ppn_fak_data" type="text" onkeyup="copyvalue2(this.id,'ppn_pp_fak_data0','ppn_fak_modal')" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">PPh</label>
            <div class="col-lg-12">
                <select name="pph_fak_data" id="pph_fak_data" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <option value="">-- pilih --</option>
                    <option value="1.75">Pengadaan -- 1.75%</option>
                    <option value="1.75">Konstruksi -- 1.75%</option>
                    <option value="0.35">Konsultan -- 3.5%</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Nomor Kontrak</label>
            <div class="col-lg-12">
                <input disabled id="no_kontrak2_fak_data" name="no_kontrak2_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tanggal Kontrak</label>
            <div class="col-lg-12">
                <input id="tgl_kontrak_fak_data" name="tgl_kontrak_fak_data" type="date" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tanggal Pelaksanaan</label>
            <div class="col-lg-12">
                <input type="date" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> id="tgl_pelaksanaan_fak_data" name="tgl_pelaksanaan_fak_data">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Lama Pelaksanaan</label>
            <div class="col-lg-12">
                <input id="lama_pelaksanaan_fak_data" name="lama_pelaksanaan_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Lama Pemeliharaan</label>
            <div class="col-lg-12">
                <input id="lama_pemeliharaan_fak_data" name="lama_pemeliharaan_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Asumsi Tanggal Pencairan Kredit</label>
            <div class="col-lg-12">
                <input id="tgl_pencairan_fak_data" name="tgl_pencairan_fak_data" type="date" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-4 control-label">Persentase Uang Muka</label>
            <div class="col-lg-4">
                <div class="input-group">
                    <input id="persen_uang_muka_fak_data" name="persen_uang_muka_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-4 control-label">Bunga Kredit</label>
            <div class="col-lg-4">
                <div class="input-group">
                    <input id="bunga_kredit_fak_data" name="bunga_kredit_fak_data" type="text" onkeyup="copyvalue(this.id,'bunga_mauk')" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-4 control-label">Asumsi Profit Kontraktor</label>
            <div class="col-lg-4">
                <div class="input-group">
                    <input id="profit_kontraktor_fak_data" name="profit_kontraktor_fak_data" onkeyup="copyvalue(this.id,'profit_fak_modal')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-4 control-label">Biaya Pemeliharaan</label>
            <div class="col-lg-4">
                <div class="input-group">
                    <input type="text" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> onkeyup="copyvalue(this.id,'pemeliharaan_fak_modal')" id="biaya_pemeliharaan_fak_data" name="biaya_pemeliharaan_fak_data">
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-4 control-label">Biaya Provisi</label>
            <div class="col-lg-4">
                <div class="input-group">
                    <input id="biaya_provisi_fak_data" name="biaya_provisi_fak_data" onkeyup="copyvalue(this.id,'provisi_fee_mauk')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">Persiapan dan Pekerjaan</h2>
    <button class="btn btn-success mt-2 tambah-field-pp text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Persiapan dan Pekerjaan</button>
    <div class="add-form-pp">
        <div class="form-group row">
            <div class="col-lg-3">
                <label class="col-lg-6 control-label">Item</label>
                <div class="col-lg-18">
                    <input id="item_pp_fak_data0" name="item_pp_fak_data[]" type="text" onkeyup="copyvalue(this.id,'item_pp_fak_modal1')" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                </div>
            </div>
            <div class="col-lg-2">
                <label class="col-lg-6 control-label">PPN</label>
                <div class="col-lg-24">
                    <div class="input-group">
                        <input id="ppn_pp_fak_data0" name="ppn_pp_fak_data[]" onkeyup="hitungPP(0)" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <label class="col-lg-12 control-label">Nilai Sebelum PPN</label>
                <div class="col-lg-12">
                    <input id="nilai_sebelum_ppn_pp_fak_data0" name="nilai_sebelum_ppn_pp_fak_data[]" onkeyup="hitungPP(0,'nilai_sebelum_ppn_pp_fak_data0','nilai_sebelum_ppn_pp_fak_data0_separators','nilai_sesudah_ppn_pp_fak_data0_separators')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <p>Nominal: <span id="nilai_sebelum_ppn_pp_fak_data0_separators" class="mask"></span></p>
                </div>
            </div>
            <div class="col-lg-3">
                <label class="col-lg-12 control-label">Nilai Sesudah PPN</label>
                <div class="col-lg-12">
                    <input id="nilai_sesudah_ppn_pp_fak_data0" name="nilai_sesudah_ppn_pp_fak_data[]" onchange="copyvalue(this.id,'nilai_pp_fak_modal1')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <p>Nominal: <span id="nilai_sesudah_ppn_pp_fak_data0_separators" class="mask"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Pembulatan</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="pembulatan_nilai_sebelum_ppn_total_pp_fak_data" name="pembulatan_nilai_sebelum_ppn_total_pp_fak_data" onkeyup="hitungPP()" aria-atomic="" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="pembulatan_nilai_sesudah_ppn_total_pp_fak_data" name="pembulatan_nilai_sesudah_ppn_total_pp_fak_data" onkeyup="hitungPP()" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Jumlah Total</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="jumlah_nilai_sebelum_ppn_total_pp_fak_data" name="jumlah_nilai_sebelum_ppn_total_pp_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="jumlah_nilai_sebelum_ppn_total_pp_fak_data_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="jumlah_nilai_sesudah_ppn_total_pp_fak_data" name="jumlah_nilai_sesudah_ppn_total_pp_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="jumlah_nilai_sesudah_ppn_total_pp_fak_data_separators" class="mask"></span></p>
            </div>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">Biaya Umum / Adm</h2>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Gaji Direktur</label>
            <div class="col-lg-12">
                <input id="gaji_direktur_fak_data" name="gaji_direktur_fak_data" onkeyup="copyvalue(this.id,'gaji_direktur_fak_modal')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="gaji_direktur_fak_data_separators" class="mask"></span></p>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Gaji Pengawas</label>
            <div class="col-lg-12">
                <input id="gaji_pengawas_fak_data" name="gaji_pengawas_fak_data" onkeyup="copyvalue(this.id,'gaji_pengawas_fak_modal')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="gaji_pengawas_fak_data_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Gaji Staf</label>
            <div class="col-lg-12">
                <input id="gaji_staf_fak_data" name="gaji_staf_fak_data" onkeyup="copyvalue(this.id,'gaji_staf_fak_modal')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="gaji_staf_fak_data_separators" class="mask"></span></p>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Biaya Umum</label>
            <div class="col-lg-12">
                <input id="biaya_umum_fak_data" name="biaya_umum_fak_data" onkeyup="copyvalue(this.id,'biaya_umum_fak_modal')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                <p>Nominal: <span id="biaya_umum_fak_data_separators" class="mask"></span></p>
            </div>
        </div>
    </div>
    <br>
    <h2 class="text-center text-danger">Termijn</h2>
    <button class="btn btn-success mt-2 tambah-field-termijn text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Termijn</button>
    <div class="add-form-termijn-fak-data">
        <div class="form-group row">
            <div class="col-lg-4">
                <label class="col-lg-6 control-label">Termijn</label>
                <input id="termijn_fak_data0" name="termijn_fak_data[]" type="text" placeholder="" value="Uang Muka" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
            <div class="col-lg-2">
                <label class="col-lg-6 control-label">Progress</label>
                <div class="input-group">
                    <input id="progress_termijn_fak_data0" name="progress_termijn_fak_data[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <label class="col-lg-18 center control-label">Persentase Termijn</label>
                <div class="input-group">
                    <input id="persentase_termijn_fak_data" name="persentase_termijn_fak_data[]" onkeyup="copyvalue(this.id,'persentase_penerimaan_uang_muka_fak_rl')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-1">
                <a class="btn btn-success btn-rounded m-t-n-xs" style="margin-top:30px" onclick="hitungPrakiraanTanggalTermijn(0)"><span>Hitung</span></a>
            </div>
            <div class="col-lg-3">
                <label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>
                <input id="prakiraan_tgl_termijn_fak_data0" name="prakiraan_tgl_termijn_fak_data[]" type="date" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2">

        </div>
        <label class="col-lg-3 control-label">Setelah Masa Pemeliharaan</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="setelah_masa_pemeliharaan_fak_data" name="setelah_masa_pemeliharaan_fak_data" type="text" placeholder="" onkeyup="copyvalue(this.id,'persentase_penerimaan_termijn_pemeliharaan_fak_rl')" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Total</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="total_termijn_fak_data" name="total_termijn_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Jumlah Termijn (Diluar uang muka dan pemeliharaan)</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="jumlah_termijn_fak_data" name="jumlah_termijn_fak_data" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
</fieldset>
<?php //} 
?>