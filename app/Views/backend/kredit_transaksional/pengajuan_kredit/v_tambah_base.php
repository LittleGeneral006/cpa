<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<link href="<?= base_url(); ?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?= base_url(); ?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pengajuan Kredit Transaksional</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
    <div class="col-lg-2 text-right">
        <br>
        <a href="<?= base_url(); ?>tambah-pengajuan-kredit-transaksional" class="btn blue-bg"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah Data</span></a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <!-- <h5>Basic Data Tables example with responsive plugin</h5> -->
                </div>
                <div class="ibox-content">
                    <h2>
                        Form Pengajuan Kredit Transaksional
                    </h2>
                    <p>
                        Silakan isi form di bawah ini untuk mengajukan permohonan Kredit transaksional
                        <br>
                        <!-- <span class="text-danger">* Wajib diisi</span> -->
                    </p>
                    <form id="form" action="#" class="wizard-big">
                        <?= csrf_field() ?>

                        <h1>Data FAK</h1>
                        <fieldset>
                            <h2>Data FAK Data</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kegiatan</label>
                                    <div class="col-lg-12">
                                        <input id="kegiatan_fak_data" name="kegiatan_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pekerjaan</label>
                                    <div class="col-lg-12">
                                        <input id="pekerjaan_fak_data" name="pekerjaan_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nomor Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="no_kontrak_fak_data" name="no_kontrak_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Lokasi</label>
                                    <div class="col-lg-12">
                                        <input id="lokasi_fak_data" name="lokasi_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kontraktor</label>
                                    <div class="col-lg-12">
                                        <input id="kontraktor_fak_data" name="kontraktor_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Sumber Dana</label>
                                    <div class="col-lg-12">
                                        <input id="sumber_dana_fak_data" name="sumber_dana_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nilai Kontrak Setelah PPN</label>
                                    <div class="col-lg-12">
                                        <input id="nilai_kontrak_fak_data" name="nilai_kontrak_fak_data" onkeyup="copyvalue(this.id)" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">PPN</label>
                                    <div class="col-lg-12">
                                        <input id="ppn_fak_data" name="ppn_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">PPh</label>
                                    <div class="col-lg-12">
                                        <select name="pph_fak_data" id="pph_fak_data" class="form-control">
                                            <option value="">-- pilih --</option>
                                            <option value="0.175">Pengadaan -- 1.75%</option>
                                            <option value="0.175">Konstruksi -- 1.75%</option>
                                            <option value="0.35">Konsultan -- 3.5%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nomor Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="no_kontrak2_fak_data" name="no_kontrak2_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="tgl_kontrak_fak_data" name="tgl_kontrak_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal Pelaksanaan</label>
                                    <div class="col-lg-12">
                                        <input type="date" class="form-control" id="tgl_pelaksaan_fak_data" name="tgl_pelaksaan_fak_data">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Lama Pelaksanaan</label>
                                    <div class="col-lg-12">
                                        <input id="lama_pelaksanaan_fak_data" name="lama_pelaksanaan_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Lama Pemeliharaan</label>
                                    <div class="col-lg-12">
                                        <input id="lama_pemeliharaan_fak_data" name="lama_pemeliharaan_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Asumsi Tanggal Pencairan Kredit</label>
                                    <div class="col-lg-12">
                                        <input id="tgl_pencairan_fak_data" name="tgl_pencairan_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Persentase Uang Muka</label>
                                    <div class="col-lg-12">
                                        <input id="persen_uang_muka_fak_data" name="persen_uang_muka_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Bunga Kredit</label>
                                    <div class="col-lg-12">
                                        <input id="bunga_kredit_fak_data" name="bunga_kredit_fak_data" type="date" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Asumsi Profit Kontraktor</label>
                                    <div class="col-lg-12">
                                        <input id="profit_kontraktor_fak_data" name="profit_kontraktor_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Pemeliharaan</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" onkeyup="copyvalue(this.id)" id="biaya_pemeliharaan_fak_data" name="biaya_pemeliharaan_fak_data">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Provisi</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_provisi_fak_data" name="biaya_provisi_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Persiapan dan Pekerjaan</h2>
                            <button class="btn btn-success mt-2 tambah-field-pp text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                            <div class="add-form-pp">
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Item</label>
                                        <div class="col-lg-12">
                                            <input id="item_pp_fak_data1" name="item_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">PPN</label>
                                        <div class="col-lg-12">
                                            <input id="ppn_pp_fak_data1" name="ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Nilai Sebelum PPN</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_sebelum_ppn_pp_fak_data1" name="nilai_sebelum_ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Nilai Sesudah PPN</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_sesudah_ppn_pp_fak_data1" name="nilai_sesudah_ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Biaya Umum / Adm</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Direktur</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_direktur_fak_data" name="gaji_direktur_fak_data" onkeyup="copyvalue(this.id,'gaji_direktur_fak_modal')" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Pengawas</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_pengawas_fak_data" name="gaji_pengawas_fak_data" onkeyup="copyvalue(this.id,'gaji_pengawas_fak_modal')" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Staf</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_staf_fak_data" name="gaji_staf_fak_data" onkeyup="copyvalue(this.id,'gaji_staf_fak_modal')" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Umum</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_fak_data" name="biaya_umum_fak_data" onkeyup="copyvalue(this.id,'biaya_umum_fak_modal')" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Termijn</h2>
                            <button class="btn btn-success mt-2 tambah-field-termijn text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-lg-6 control-label">termijn</label>
                                    <div class="col-lg-12">
                                        <input id="termijn_pp_fak_data" name="termijn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-lg-6 control-label">progress</label>
                                    <div class="col-lg-12">
                                        <input id="progress_pp_fak_data" name="progress_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-lg-6 control-label">Persentase Termijn</label>
                                    <div class="col-lg-12">
                                        <input id="persentase_termijn_pp_fak_data" name="persentase_termijn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>
                                    <div class="col-lg-12">
                                        <input id="prakiraan_tgl_termijn_fak_data" name="prakiraan_tgl_termijn_fak_data[]" type="date" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="add-form-termijn">
                                </div>
                            </div>
                        </fieldset>

                        <!-- fak modal -->
                        <!-- <h1>Data FAK Modal</h1>
                        <fieldset>
                            <h2>Data FAK Modal</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nilai Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nilai_proyek_fak_modal" name="nilai_proyek_fak_modal" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Perhitungan Plafond Kredit</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="proyek_fak_modal" name="proyek_fak_modal" onkeyup="hitungPersentase()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Profit</label>
                                    <div class="col-lg-12">
                                        <input id="profit_fak_modal" name="profit_fak_modal" onkeyup="hitungPersentase()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">PPN</label>
                                    <div class="col-lg-12">
                                        <input id="ppn_fak_modal" name="ppn_fak_modal" onkeyup="hitungPersentase()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pemeliharaan</label>
                                    <div class="col-lg-12">
                                        <input id="pemeliharaan_fak_modal" name="pemeliharaan_fak_modal" onkeyup="hitungPersentase()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Total Persentase Dari Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="persentase_proyek_fak_modal" name="persentase_proyek_fak_modal" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Persiapan dan Pekerjaan</h2>
                            <div class="add-form-pp-fak-modal">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Item</label>
                                        <div class="col-lg-12">
                                            <input id="item_pp_fak_modal" name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai</label>
                                        <div class="col-lg-12">
                                            <input id="nilai__pp_fak_modal" name="nilai__pp_fak_modal[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-lg-6 control-label">Koreksi Biaya</label>
                                <div class="col-lg-12">
                                    <input id="koreksi_biaya_fak_modal" name="koreksi_biaya_fak_modal" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-lg-6 control-label">Jumlah</label>
                                <div class="col-lg-12">
                                    <input id="jumlah_fak_modal" name="jumlah_fak_modal" onkeyup="copyvalue(this.id)" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Biaya Umum / Adm</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Direktur</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_direktur_fak_modal" name="gaji_direktur_fak_modal" onchange="hitungTotal()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Pengawas</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_pengawas_fak_modal" name="gaji_pengawas_fak_modal" onchange="hitungTotal()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Staf</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_staf_fak_modal" name="gaji_staf_fak_modal" onchange="hitungTotal()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Umum</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_fak_modal" name="biaya_umum_fak_modal" onchange="hitungTotal()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Total</label>
                                    <div class="col-lg-12">
                                        <input id="total_biaya_umum_fak_modal" name="total_biaya_umum_fak_modal" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Kebutuhan Modal Kerja (s/d pekerjaan 100%)</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Persiapan dan Pekerjaan</label>
                                    <div class="col-lg-12">
                                        <input id="persiapan_pekerjaan_fak_modal" name="persiapan_pekerjaan_fak_modal" type="text" onkeyup="hitungJumlahKebutuhanModalKerja()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Biaya Umum/ Adm</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_adm_fak_modal" name="biaya_umum_adm_fak_modal" onkeyup="hitungJumlahKebutuhanModalKerja()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Total</label>
                                    <div class="col-lg-12">
                                        <input id="jumlah_kebutuhan_modal_kerja_fak_modal" name="jumlah_kebutuhan_modal_kerja_fak_modal" type="text" placeholder="" value="0" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">SUMBER PEMBIAYAAN</h2>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="col-lg-6 control-label">Penerimaan Uang Muka</label>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input id="penerimaan_uang_muka_fak_modal" name="penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-1">
                                            <button name="sama_dengan" class="btn btn-primary btn-block sama_dengan">=</button>
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_penerimaan_uang_muka_fak_modal" name="jumlah_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_penerimaan_uang_muka_fak_modal" name="persentase_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="col-lg-6 control-label">Pembiayaan Sendiri Minimal 10%</label>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input id="pembiayaan_sendiri_fak_modal" name="pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-1">
                                            <button name="sama_dengan" class="btn btn-primary btn-block sama_dengan">=</button>
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_pembiayaan_sendiri_fak_modal" name="jumlah_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_pembiayaan_sendiri_fak_modal" name="persentase_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="col-lg-6 control-label">Kredit Bank</label>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input id="kredit_bank_fak_modal" name="kredit_bank_fak_modal" onchange="copyvalue(this.id)" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-1">
                                            <button name="sama_dengan" class="btn btn-primary btn-block sama_dengan">=</button>
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_kredit_bank_fak_modal" name="jumlah_kredit_bank_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_kredit_bank_fak_modal" name="persentase_kredit_bank_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="col-lg-6 control-label">Jumlah</label>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input id="sumber_pembiayaan_fak_modal" name="sumber_pembiayaan_fak_modal" onchange="copyvalue(this.id)" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-1">
                                            <button name="sama_dengan" class="btn btn-primary btn-block sama_dengan">=</button>
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_bulat_sumber_pembiayaan_fak_modal" name="jumlah_bulat_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_jumlah_sumber_pembiayaan_fak_modal" name="persentase_jumlah_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset> -->

                        <!-- <h1>Data FAK Proyeksi RL</h1>
                        <fieldset>
                            <h2>Data FAK Proyeksi RL</h2>
                            <h2 class="text-center text-danger">Proyeksi Laba Rugi</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nilai Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="nilai_kontrak_fak_rl" name="nilai_kontrak_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pekerjaan Persiapan Dan Konstruksi</label>
                                    <div class="col-lg-12">
                                        <input id="pekerjaan_persiapan_konstruksi_fak_rl" name="pekerjaan_persiapan_konstruksi_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Laba Kotor</label>
                                    <div class="col-lg-12">
                                        <input id="laba_kotor_fak_rl" name="laba_kotor_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Adm/Umum</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_adm_fak_rl" name="biaya_umum_adm_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Laba usaha</label>
                                    <div class="col-lg-12">
                                        <input id="laba_usaha_fak_rl" name="laba_usaha_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Bunga + Provisi Bank</label>
                                    <div class="col-lg-12">
                                        <input id="bunga_provisi_bank_fak_rl" name="bunga_provisi_bank_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Laba Sebelum Pajak</label>
                                    <div class="col-lg-12">
                                        <input id="laba_sebelum_pajak_fak_rl" name="laba_sebelum_pajak_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pajak (PPh & PPN)</label>
                                    <div class="col-lg-12">
                                        <input id="paja_pph_ppn_fak_rl" name="paja_pph_ppn_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Laba Bersih</label>
                                    <div class="col-lg-12">
                                        <input id="laba_bersih_fak_rl" name="laba_bersih_fak_rl" type="text" placeholder="" class="form-control">
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
                                            <input id="gross_profit_margin_fak_rl" name="gross_profit_margin_fak_rl" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Gross Operating Margin</label>
                                        <div class="col-lg-12">
                                            <input id="gross_operating_margin_fak_rl" name="gross_operating_margin_fak_rl" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Return of Sale</label>
                                        <div class="col-lg-12">
                                            <input id="return_of_sale_fak_rl" name="return_of_sale_fak_rl" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Return of Equity</label>
                                        <div class="col-lg-12">
                                            <input id="return_of_equity_fak_rl" name="return_of_equity_fak_rl" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Potongan Kredit</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Harga Borongan</label>
                                    <div class="col-lg-12">
                                        <input id="harga_borongan_fak_rl" name="harga_borongan_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Penerimaan Uang Muka</label>
                                    <div class="col-lg-12">
                                        <input id="penerimaan_uang_muka_fak_rl" name="penerimaan_uang_muka_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Penerimaan Termijn</label>
                                    <div class="col-lg-12">
                                        <input id="penerimaan_termijn_fak_rl" name="penerimaan_termijn_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Penerimaan Termijn Pemeliharaan</label>
                                    <div class="col-lg-12">
                                        <input id="penerimaan_termijn_pemeliharaan_fak_rl" name="penerimaan_termijn_pemeliharaan_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Penerimaan Bersih</label>
                                    <div class="col-lg-12">
                                        <input id="penerimaan_bersih_fak_rl" name="penerimaan_bersih_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pajak (PPN & PPh)</label>
                                    <div class="col-lg-12">
                                        <input id="pajak_ppn_pph_fak_rl" name="pajak_ppn_pph_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kredit Bank yang Diberikan</label>
                                    <div class="col-lg-12">
                                        <input id="kredit_bank_fak_rl" name="kredit_bank_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">% Pemotongan Kredit Bank</label>
                                    <div class="col-lg-12">
                                        <input id="persentase_pemotongan_kredit_bank_fak_rl" name="persentase_pemotongan_kredit_bank_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Dibulatkan</label>
                                    <div class="col-lg-12">
                                        <input id="dibulatkan_fak_rl" name="dibulatkan_fak_rl" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                        </fieldset> -->
                    </form>
                    <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="add_jenis_agunan()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Cancel</span></a>
                </div>
            </div>
        </div>
        <div class="copy-pp invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12" style="max-width: 98% !important;">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-append" style="width: 100% !important; margin-bottom: 10px;">
                                    <button name="hapus" class="btn btn-danger hapus delete-btn" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <label id="ISI-error" class="reset" for="ISI_KKA"></label>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3">
                        <label class="col-lg-6 control-label">Item</label>
                        <div class="col-lg-12">
                            <input name="item_pp_fak_data[]" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label class="col-lg-6 control-label">PPN</label>
                        <div class="col-lg-12">
                            <input name="ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label class="col-lg-6 control-label">Nilai Sebelum PPN</label>
                        <div class="col-lg-12">
                            <input name="nilai_sebelum_ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label class="col-lg-6 control-label">Nilai Sesudah PPN</label>
                        <div class="col-lg-12">
                            <input name="nilai_sesudah_ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                </div> -->
                    <!-- <div class="col-md-1 pl-0">
                    <div class="form-group">
                        <label class="control-label col-lg-12"></label>
                        <button name="hapus" style="width: 204%;" class="btn btn-danger mt-2 hapus px-3"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                    </div>
                </div> -->
                </div>
            </div>
            <div class="copy-pp-fak-modal invisible">
                <div class="row new" id="new">
                    <!-- <div class="form-group row"> -->
                    <div class="col-lg-6">
                        <label class="col-lg-6 control-label">Item</label>
                        <div class="col-lg-12">
                            <input name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-lg-6 control-label">Nilai</label>
                        <div class="col-lg-12">
                            <input name="nilai_pp_fak_modal[]" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="copy-termijn invisible">
                <div class="row new sort" id="new">
                    <div class="pindah">
                        <i class="fa fa-sort fa-2x"></i>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-lg-6 control-label">termijn</label>
                            <div class="col-lg-12">
                                <input id="termijn_pp" name="termijn_pp[]" type="text" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-lg-6 control-label">progress</label>
                            <div class="col-lg-12">
                                <input id="progress_pp" name="progress_pp[]" type="text" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-lg-12 control-label">Persentase Termijn</label>
                            <div class="col-lg-12">
                                <input id="persentase_termijn_pp" name="persentase_termijn_pp[]" type="text" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>
                            <div class="col-lg-12">
                                <input id="prakiraan_tgl_termijn" name="prakiraan_tgl_termijn[]" type="date" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 pl-0">
                        <div class="form-group">
                            <label class="control-label col-lg-12"></label>
                            <button name="hapus" style="width: 204%;" class="btn btn-danger mt-2 hapus px-3"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= $this->endSection(); ?>
    <?= $this->section('script'); ?>
    <!-- Steps -->
    <script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.fix.js"></script>

    <!-- Jquery Validate -->
    <script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>
    <!-- <script src="<?= base_url(); ?>public/assets/js-manual/script_.js"></script> -->

    <script>
        var angka = 1;

        function tambahInput() {
            var jumlah = document.getElementById("jumlah_agunan").value;
            var inputAgunan = document.getElementById("input_agunan");
            inputAgunan.innerHTML = ''; // Reset inputan

            for (var i = 0; i < jumlah; i++) {
                var inputGroup = document.createElement("div");
                inputGroup.classList.add("input-group");
                inputGroup.classList.add("col-lg-12");

                var input = document.createElement("input");
                input.type = "text";
                input.name = "jenis_agunan[]";

                input.classList.add("form-control"); // Tambah class "form_control"
                input.placeholder = "Jenis Agunan " + (i + 1);

                inputGroup.appendChild(input);
                inputAgunan.appendChild(inputGroup);
            }

            resizeJquerySteps();
        }

        function add_jenis_agunan() {
            var inpJenisAgunanForm = document.getElementsByName("jenis_agunan[]");
            let simpanJenisAgunanForm = "";
            for (var i = 0; i < inpJenisAgunanForm.length; i++) {
                var nama = inpJenisAgunanForm[i];
                simpanJenisAgunanForm += nama.value;
                if (i < inpJenisAgunanForm.length - 1) {
                    simpanJenisAgunanForm += ";";
                }
            }
            $('[name="jenisagunan"]').val(simpanJenisAgunanForm);
            console.log('test');
        }

        function copyvalue(id, target) {
            let TEXTValue = $("#" + id).val();
            // let fieldName = id.slice(0, -9);
            // Salin nilai dari input dengan nama ppn ke input dengan nama ppn_pp
            $("#" + target).val(TEXTValue);
        }

        //
        //FAK Data
        //
        const ppn_fak_data = document.getElementById('ppn_fak_data');
        ppn_fak_data.addEventListener('change', function(event) {
            console.log('Event pertama terjadi');
        });

        // Menambahkan event listener kedua
        // ppn_fak_data.addEventListener('change', function(event) {
        //     // Logika untuk event kedua
        //     console.log('Event kedua terjadi');
        // });

        // Fungsi untuk melakukan perhitungan
        //FAK Modal
        function hitungPersentase() {
            let proyek = parseFloat($("#proyek_fak_modal").val()) || 0;
            let profit = parseFloat($("#profit_fak_modal").val()) || 0;
            let ppn = parseFloat($("#ppn_fak_modal").val()) || 0;
            let pemeliharaan = parseFloat($("#pemeliharaan_fak_modal").val()) || 0;
            let hasil = proyek - profit - ppn - pemeliharaan;
            $("#persentase_proyek_fak_modal").val(hasil);
        }

        function hitungTotal() {
            let direktur = parseFloat($("#gaji_direktur_fak_modal").val()) || 0;
            let pengawas = parseFloat($("#gaji_pengawas_fak_modal").val()) || 0;
            let staf = parseFloat($("#gaji_staf_fak_modal").val()) || 0;
            let umum = parseFloat($("#biaya_umum_fak_modal").val()) || 0;
            let hasil = direktur + pengawas + staf + umum;
            $("#total_biaya_umum_fak_modal").val(hasil);
        }

        function hitungJumlahKebutuhanModalKerja() {
            let persiapan_pekerjaan_fak_modal = parseFloat($("#persiapan_pekerjaan_fak_modal").val()) || 0;
            let biaya_umum_adm_fak_modal = parseFloat($("#biaya_umum_adm_fak_modal").val()) || 0;
            let hasil = persiapan_pekerjaan_fak_modal + biaya_umum_adm_fak_modal;
            $("#jumlah_kebutuhan_modal_kerja_fak_modal").val(hasil);
            $("#sumber_pembiayaan_fak_modal").val(hasil);
            $("#jumlah_bulat_sumber_pembiayaan_fak_modal").val(hasil);
        }



        const operatorMap = {
            '+': (numbers) => numbers.reduce((acc, curr) => acc + curr, 0),
            '-': (numbers) => numbers.reduce((acc, curr) => acc - curr),
            '*': (numbers) => numbers.reduce((acc, curr) => acc * curr, 1),
            '/': (numbers) => numbers.reduce((acc, curr) => acc / curr),
            '%': (numbers) => numbers.reduce((acc, curr) => acc % curr),
            '^': (numbers) => numbers.reduce((acc, curr) => Math.pow(acc, curr)),
            // Tambahkan operator lain sesuai kebutuhan
        };

        // Fungsi untuk melakukan perhitungan
        function hitung(inputIds, operators, place, event) {
            // Variabel untuk menyimpan nilai dari inputan
            const numbers = inputIds.map(id => parseFloat($("#" + id).val()) || 0);

            // Variabel untuk menyimpan hasil sementara
            let result = numbers[0];

            // Iterasi melalui operator dan angka
            for (let i = 0; i < operators.length; i++) {
                const operator = operators[i];
                const number = numbers[i + 1];

                // Cek apakah operator ada di dalam objek operatorMap
                if (operatorMap.hasOwnProperty(operator)) {
                    // Panggil fungsi sesuai operator
                    result = operatorMap[operator]([result, number]);
                } else {
                    console.error('Operator tidak valid:', operator);
                    return NaN;
                }
            }

            // Update nilai input dengan hasil perhitungan
            $("#" + place).val(result);

            // Hentikan event agar tidak melakukan aksi default
            event.preventDefault();
        }

        jumlahisipp = 1;
        jumlahisitermijn = 1;

        // $.ajax({
        //     url: "setting-jenis/edit/" + id,
        //     type: "GET",
        //     dataType: "JSON",
        //     success: function (data) {
        //       if (levelSession == "admin" || levelSession == "super_admin") {
        //         select_akses(data["SETTING"].AKSES);
        //       }

        //       $('[name="AKSES"]').val(data["SETTING"].AKSES);
        //       $('[name="JENIS_ID"]').val(data["SETTING"].ID);
        //       $('[name="NAMA_JENIS"]').val(data["SETTING"].LABEL);

        //       $('[name="nama_form"]').val(data["SETTING"].LABEL_DATA);
        //       $('[name="tipe_form"]').val(data["SETTING"].TIPE_LABEL_DATA);

        //       let namaForm = data["SETTING"].LABEL_DATA;
        //       let nama_form = namaForm.split(";");
        //       let tipeForm = data["SETTING"].TIPE_LABEL_DATA;
        //       let tipe_form = tipeForm.split(";");
        //       jumlahField = nama_form.length;
        //       var html = "";
        //       // $('[name="nama_form[0]"]').val(data["setting_skl"].nama_form);
        //       // $('[name="tipe_form[0]"]').val(data["setting_skl"].tipe_form);

        //       $("#modal_form_setting").modal("show"); // show bootstrap modal when complete loaded
        //       $(".modal-title").text("Edit Jenis"); // Set title to Bootstrap modal title
        //     },
        //     error: function (jqXHR, textStatus, errorThrown) {
        //       alert("Error get data from ajax");
        //     },
        //   });
        $(document).ready(function() {
            $("body").on("click", ".tambah-field-pp", function() {
                if (jumlahisipp == 13) {
                    swal({
                        title: "Peringatan!",
                        text: "Isi form jumlah maksimal!",
                        type: "warning",
                        showConfirmButton: false,
                        timer: 1000,
                    });
                } else {
                    $(".add-form-pp").after("<hr class='new mt-0 pt-0'>");
                    var html1 = $(".copy-pp").html();
                    $(".add-form-pp").after(html1);
                    var html11 =
                        '<div class="col-lg-3">' +
                        '<label class="col-lg-6 control-label">Item</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="item_pp_fak_data'+angka+'" name="item_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-3">' +
                        '<label class="col-lg-6 control-label">PPN</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="ppn_pp_fak_data'+angka+'" name="ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-3">' +
                        '<label class="col-lg-6 control-label">Nilai Sebelum PPN</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="nilai_sebelum_ppn_pp_fak_data'+angka+'" name="nilai_sebelum_ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-3">' +
                        '<label class="col-lg-6 control-label">Nilai Sesudah PPN</label>' +
                        '<div class="col-lg-12">' +
                        '<input id="nilai_sesudah_ppn_pp_fak_data'+angka+'" name="nilai_sesudah_ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                        '</div>' +
                        '</div>';
                    $(".delete-btn").first().after(html11);
                    // var html2 = $(".copy-pp-fak-modal").html();

                    // $(".add-form-pp-fak-modal").after(html2);
                    jumlahisipp++;
                    resizeJquerySteps();
                }
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".hapus", function() {
                $(this).parents("#new").remove();
                jumlahisipp--;
            });
            $("body").on("click", ".tambah-field-termijn", function() {
                if (jumlahisitermijn == 13) {
                    swal({
                        title: "Peringatan!",
                        text: "Isi form jumlah maksimal!",
                        type: "warning",
                        showConfirmButton: false,
                        timer: 1000,
                    });
                } else {
                    var html = $(".copy-termijn").html();
                    $(".add-form-termijn").after(html);
                    jumlahisitermijn++;
                    resizeJquerySteps();
                }
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".hapus", function() {
                $(this).parents("#new").remove();
                jumlahisitermijn--;
                resizeJquerySteps();
            });
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onInit: function(event, currentIndex) {
                    resizeJquerySteps();
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    resizeJquerySteps();
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function(event, currentIndex, priorIndex) {
                    resizeJquerySteps();
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                    // mengubah CSS ketika tab berpindah
                    if (currentIndex === 0) {
                        resizeJquerySteps();
                    }
                    if (currentIndex === 1) {
                        resizeJquerySteps();
                    }
                    if (currentIndex === 2) {
                        resizeJquerySteps();
                    }
                    if (currentIndex === 3) {
                        resizeJquerySteps();
                    }
                    if (currentIndex === 4) {
                        resizeJquerySteps();
                    }
                    if (currentIndex === 5) {
                        resizeJquerySteps();
                    }
                    if (currentIndex === 6) {
                        resizeJquerySteps();
                    }
                    $(window).on("resize", function() {
                        if ($(window).width() < 480) {
                            // CSS untuk perangkat mobile

                            // Tab pertama
                            if (currentIndex === 0) {
                                resizeJquerySteps();

                            }

                            // Tab kedua
                            if (currentIndex === 1) {
                                resizeJquerySteps();

                            }

                            // Tab ketiga
                            if (currentIndex === 2) {
                                resizeJquerySteps();

                            }

                            // Tab keempat
                            if (currentIndex === 3) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 4) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 5) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 6) {
                                resizeJquerySteps();

                            }
                        } else if ($(window).width() < 880) {
                            // CSS untuk perangkat tablet atau desktop

                            // Tab pertama
                            if (currentIndex === 0) {
                                resizeJquerySteps();

                            }

                            // Tab kedua
                            if (currentIndex === 1) {
                                resizeJquerySteps();

                            }

                            // Tab ketiga
                            if (currentIndex === 2) {
                                resizeJquerySteps();

                            }

                            // Tab keempat
                            if (currentIndex === 3) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 4) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 5) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 6) {
                                resizeJquerySteps();

                            }
                        } else {
                            // Tab pertama
                            if (currentIndex === 0) {
                                resizeJquerySteps();

                            }

                            // Tab kedua
                            if (currentIndex === 1) {
                                resizeJquerySteps();

                            }

                            // Tab ketiga
                            if (currentIndex === 2) {
                                resizeJquerySteps();

                            }

                            // Tab keempat
                            if (currentIndex === 3) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 4) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 5) {
                                resizeJquerySteps();

                            }
                            if (currentIndex === 6) {
                                resizeJquerySteps();

                            }

                        }
                    });

                    // Panggil event resize saat halaman dimuat
                    $(window).trigger("resize");
                },
                onFinishing: function(event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                // onFinished: function(event, currentIndex) {
                //     var form = $(this);

                //     // Submit form input
                //     form.submit();
                // }
                onFinished: function(event, currentIndex) {
                    var form = $(this);

                    // Validate form input using jQuery Validation Plugin
                    if (!form.valid()) {
                        return false;
                    }

                    // Serialize form data
                    var formData = form.serialize();
                    // console.log(formData)
                    $('#mohon').show()
                    // Send AJAX request to CodeIgniter 4 controller method
                    $.ajax({
                        url: "<?php echo base_url() ?>home/simpan_permohonan",
                        type: "POST",
                        data: formData,
                        success: function(data) {
                            // Handle successful response
                            // console.log(data)
                            if (data == 1) {
                                $('#mohon').hide()
                                alert('Data Berhasil Disimpan')
                                // toastr.success('Data Berhasil Disimpan', 'Berhasil');
                                window.location.href = "<?php echo base_url() ?>home/e-form";
                            } else {
                                // alert(data)
                                $('#mohon').hide()
                                toastr.warning(data, 'Data Gagal Disimpan');
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            // console.log(error)
                        }
                    });

                    return true;
                },

            });


        });
    </script>

    <?= $this->endSection(); ?>