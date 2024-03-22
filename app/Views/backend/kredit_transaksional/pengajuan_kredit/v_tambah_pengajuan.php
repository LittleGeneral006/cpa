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
                        <!-- // -->
                        <!-- FAK Data -->
                        <!-- // -->
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
                                        <input id="no_kontrak_fak_data" name="no_kontrak_fak_data" type="text" placeholder="" onkeyup="copyvalue(this.id,'no_kontrak2_fak_data')" class="form-control">
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
                                        <input id="nilai_kontrak_fak_data" name="nilai_kontrak_fak_data" onkeyup="copyvalue2(this.id,'nilai_kontrak_fak_rl','harga_borongan_fak_rl')" type="text" placeholder="" class="form-control">
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
                                            <option value="0.0175">Pengadaan -- 1.75%</option>
                                            <option value="0.0175">Konstruksi -- 1.75%</option>
                                            <option value="0.035">Konsultan -- 3.5%</option>
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
                                        <input id="tgl_kontrak_fak_data" name="tgl_kontrak_fak_data" type="date" placeholder="" class="form-control">
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
                                        <input id="tgl_pencairan_fak_data" name="tgl_pencairan_fak_data" type="date" placeholder="" class="form-control">
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
                                        <input id="bunga_kredit_fak_data" name="bunga_kredit_fak_data" type="text" placeholder="" class="form-control">
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
                                            <input id="ppn_pp_fak_data1" name="ppn_pp_fak_data[]" onkeyup="hitungPP(1)" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Nilai Sebelum PPN</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_sebelum_ppn_pp_fak_data1" name="nilai_sebelum_ppn_pp_fak_data[]" onkeyup="hitungPP(1)" type="text" placeholder="" class="form-control">
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
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Total</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="nilai_sebelum_ppn_total_pp_fak_data" name="nilai_sebelum_ppn_total_pp_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="nilai_sesudah_ppn_total_pp_fak_data" name="jumlah_nilai_sebelum_ppn_total_pp_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Jumlah Total</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="jumlah_nilai_sebelum_ppn_total_pp_fak_data" name="nilai_sesudah_ppn_total_pp_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="jumlah_nilai_sesudah_ppn_total_pp_fak_data" name="jumlah_nilai_sesudah_ppn_total_pp_fak_data" type="text" placeholder="" class="form-control">
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
                            <div class="add-form-termijn-fak-modal">
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Termijn</label>
                                        <div class="col-lg-12">
                                            <input id="termijn_pp_fak_data1" name="termijn_pp_fak_data[]" type="text" placeholder="" value="Uang Muka" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Progress</label>
                                        <div class="col-lg-12">
                                            <input id="progress_pp_fak_data1" name="progress_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Persentase Termijn</label>
                                        <div class="col-lg-12">
                                            <input id="persentase_termijn_pp_fak_data" name="persentase_termijn_pp_fak_data[]" onkeyup="copyvalue(this.id,'persentase_penerimaan_uang_muka_fak_rl')" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>
                                        <div class="col-lg-12">
                                            <input id="prakiraan_tgl_termijn_fak_data1" name="prakiraan_tgl_termijn_fak_data[]" type="date" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Setelah Masa Pemeliharaan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="setelah_masa_pemeliharaan_fak_data" name="setelah_masa_pemeliharaan_fak_data" type="text" placeholder="" onkeyup="copyvalue(this.id,'persentase_penerimaan_termijn_pemeliharaan_fak_rl')" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Total</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="total_termijn_fak_data" name="total_termijn_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Jumlah Termijn (Diluar uang muka dan pemeliharaan)</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="jumlah_termijn_fak_data" name="jumlah_termijn_fak_data" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-- // -->
                        <!-- FAK Modal -->
                        <!-- // -->
                        <h1>Data FAK Modal</h1>
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
                                        <input id="proyek_fak_modal" name="proyek_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Profit</label>
                                    <div class="col-lg-12">
                                        <input id="profit_fak_modal" name="profit_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">PPN</label>
                                    <div class="col-lg-12">
                                        <input id="ppn_fak_modal" name="ppn_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pemeliharaan</label>
                                    <div class="col-lg-12">
                                        <input id="pemeliharaan_fak_modal" name="pemeliharaan_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
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
                                            <input id="item_pp_fak_modal1" name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_pp_fak_modal1" name="nilai_pp_fak_modal[]" type="text" placeholder="" class="form-control">
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
                                    <input id="jumlah_fak_modal" name="jumlah_fak_modal" onchange="copyvalue(this.id,'pekerjaan_persiapan_konstruksi_fak_rl')" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Biaya Umum / Adm</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Direktur</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_direktur_fak_modal" name="gaji_direktur_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Pengawas</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_pengawas_fak_modal" name="gaji_pengawas_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Gaji Staf</label>
                                    <div class="col-lg-12">
                                        <input id="gaji_staf_fak_modal" name="gaji_staf_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Umum</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_fak_modal" name="biaya_umum_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Total</label>
                                    <div class="col-lg-12">
                                        <input id="total_biaya_umum_fak_modal" name="total_biaya_umum_fak_modal" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Jumlah</label>
                                    <div class="col-lg-12">
                                        <input id="jumlah_total_biaya_umum_fak_modal" name="jumlah_total_biaya_umum_fak_modal" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Kebutuhan Modal Kerja (s/d pekerjaan 100%)</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Persiapan dan Pekerjaan</label>
                                    <div class="col-lg-12">
                                        <input id="persiapan_pekerjaan_fak_modal" name="persiapan_pekerjaan_fak_modal" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Biaya Umum/ Adm</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_adm_fak_modal" name="biaya_umum_adm_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
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
                                            <input id="penerimaan_uang_muka_fak_modal" name="penerimaan_uang_muka_fak_modal" type="text" placeholder="" onkeyup="hitungSemua()" class="form-control">
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
                                            <input id="kredit_bank_fak_modal" name="kredit_bank_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_kredit_bank_fak_modal" name="jumlah_kredit_bank_fak_modal" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
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
                                        <div class="col-lg-3">
                                            <input id="jumlah_bulat_sumber_pembiayaan_fak_modal" name="jumlah_bulat_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_jumlah_sumber_pembiayaan_fak_modal" name="persentase_jumlah_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-- // -->
                        <!-- FAK Proyeksi RL -->
                        <!-- // -->
                        <h1>Data FAK Proyeksi RL</h1>
                        <fieldset>
                            <h2>Data FAK Proyeksi RL</h2>
                            <h2 class="text-center text-danger">Proyeksi Laba Rugi</h2>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Nilai Kontrak</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="nilai_kontrak_fak_rl" name="nilai_kontrak_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Pekerjaan Persiapan Dan Konstruksi</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="pekerjaan_persiapan_konstruksi_fak_rl" name="pekerjaan_persiapan_konstruksi_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="hitungSemua()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Laba Kotor</span></a>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="laba_kotor_fak_rl" name="laba_kotor_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Adm/Umum</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_adm_fak_rl" name="biaya_umum_adm_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="hitungSemua()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Laba Usaha</span></a>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="laba_usaha_fak_rl" name="laba_usaha_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="hitungSemua()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Bunga + Provisi Bank</span></a>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="bunga_provisi_bank_fak_rl" name="bunga_provisi_bank_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="hitungSemua()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Laba Sebelum Pajak</span></a>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="laba_sebelum_pajak_fak_rl" name="laba_sebelum_pajak_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="hitungSemua()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Pajak (PPh & PPN)</span></a>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="pajak_pph_ppn_fak_rl" name="pajak_pph_ppn_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="hitungSemua()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Laba Bersih</span></a>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="laba_bersih_fak_rl" name="laba_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
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
                                            <input id="gross_profit_margin_fak_rl" name="gross_profit_margin_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Gross Operating Margin</label>
                                        <div class="col-lg-12">
                                            <input id="gross_operating_margin_fak_rl" name="gross_operating_margin_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Return of Sale</label>
                                        <div class="col-lg-12">
                                            <input id="return_of_sale_fak_rl" name="return_of_sale_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Return of Equity</label>
                                        <div class="col-lg-12">
                                            <input id="return_of_equity_fak_rl" name="return_of_equity_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Potongan Kredit</h2>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Harga Borongan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <!-- kosong -->
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="harga_borongan_fak_rl" name="harga_borongan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Penerimaan Uang Muka</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="persentase_penerimaan_uang_muka_fak_rl" name="persentase_penerimaan_uang_muka_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="penerimaan_uang_muka_fak_rl" name="penerimaan_uang_muka_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Penerimaan Termijn</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="persentase_penerimaan_termijn_fak_rl" name="persentase_penerimaan_termijn_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="penerimaan_termijn_fak_rl" name="penerimaan_termijn_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Penerimaan Termijn Pemeliharaan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="persentase_penerimaan_termijn_pemeliharaan_fak_rl" name="persentase_penerimaan_termijn_pemeliharaan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="penerimaan_termijn_pemeliharaan_fak_rl" name="penerimaan_termijn_pemeliharaan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Penerimaan Bersih</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="persentase_penerimaan_bersih_fak_rl" name="persentase_penerimaan_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="penerimaan_bersih_fak_rl" name="penerimaan_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="hitungSemua()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Pajak (PPN & PPh)</span></a>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <!-- kosong -->
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="pajak_ppn_pph_fak_rl" name="pajak_ppn_pph_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <!-- kosong -->
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="kosong_bersih_fak_rl" name="kosong_bersih_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Kredit Bank yang Diberikan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <!-- kosong -->
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="kredit_bank_fak_rl" name="kredit_bank_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">% Pemotongan Kredit Bank</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <!-- kosong -->
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="persentase_pemotongan_kredit_bank_fak_rl" name="persentase_pemotongan_kredit_bank_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Dibulatkan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <!-- kosong -->
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="dibulatkan_fak_rl" name="dibulatkan_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <br>
                        </fieldset>
                        <h1>Upload Laporan RL</h1>
                        <fieldset>
                            <h2>Upload Laporan RL</h2>
                            <h2 class="text-center text-danger">Upload Laporan Keuangan</h2>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Laporan Rugi Laba</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="laporan_rugi_laba_upload_lap_rl" name="laporan_rugi_laba_upload_lap_rl" type="file" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Neraca</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="neraca_upload_lap_rl" name="neraca_upload_lap_rl" type="file" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Depresiasi</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="depresiasi_upload_lap_rl" name="depresiasi_upload_lap_rl" type="file" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Rasio Laporan Keuangan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="rasio_lap_keuangan_upload_lap_rl" name="rasio_lap_keuangan_upload_lap_rl" type="file" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <br>
                        </fieldset>
                        <h1>CEF (T or T&B only)</h1>
                        <fieldset>
                            <h2>CEF (T or T&B only)</h2>
                            <h2 class="text-center text-danger">Proyeksi Laba Rugi</h2>

                            <br>
                        </fieldset>
                        <h1>FAA</h1>
                        <fieldset>
                            <h2>FAA</h2>
                            <h2 class="text-center text-danger">FAA</h2>

                            <br>
                        </fieldset>
                        <h1>Memo Analisa & Usulan Kredit</h1>
                        <fieldset>
                            <h2>Memo Analisa & Usulan Kredit</h2>
                            <h2 class="text-center text-danger">Proyeksi Laba Rugi</h2>

                            <br>
                        </fieldset>
                    </form>
                    <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="add_jenis_agunan()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Cancel</span></a>
                </div>
            </div>
        </div>
        <div class="copy-pp invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-termijn invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_termijn_fak_data" class="btn btn-danger hapus_termijn_fak_data delete-btn-termijn-fak-data" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-pp-fak-modal invisible">
            <div class="row new" id="new">
                <!-- <div class="form-group row"> -->
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button name="hapus" class="btn btn-danger hapus delete-btn-pp-fak-modal" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        </div>
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
<script src="<?= base_url(); ?>public/assets/js-manual/script_cadangan.js"></script>

<!-- <script>
    var angka = 2;
    var angkatermijn = 0;
    var angkatermijninput = 1;



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
    function hitungPP(angka) {
        let nilai = parseFloat($("#nilai_sebelum_ppn_pp_fak_data" + angka).val()) || 0;
        let ppn = parseFloat($("#ppn_fak_modal" + angka).val()) || 0;
        let hasil = nilai * (1 + ppn);
        $("#nilai_sesudah_ppn_pp_fak_data" + angka).val(hasil);

        // Hitung total nilai_sesudah_ppn_pp_fak_data
        const inputs = $("input[name='nilai_sebelum_ppn_pp_fak_data[]']");
        let total = 0;
        inputs.each(function() {
            const nilai = parseFloat($(this).val()) || 0;
            total += nilai;
        });
        $("#nilai_sebelum_ppn_total_pp_fak_data").val(total);
        const inputs2 = $("input[name='nilai_sesudah_ppn_pp_fak_data[]']");
        let total2 = 0;
        inputs2.each(function() {
            const nilai2 = parseFloat($(this).val()) || 0;
            total2 += nilai2;
        });
        $("#nilai_sesudah_ppn_total_pp_fak_data").val(total2);
    }

    // Fungsi untuk melakukan perhitungan
    //FAK Modal
    function hitungSemua() {
        let proyek = parseFloat($("#proyek_fak_modal").val()) || 0;
        let profit = parseFloat($("#profit_fak_modal").val()) || 0;
        let ppn = parseFloat($("#ppn_fak_modal").val()) || 0;
        let pemeliharaan = parseFloat($("#pemeliharaan_fak_modal").val()) || 0;
        let hasil = proyek - profit - ppn - pemeliharaan;
        $("#persentase_proyek_fak_modal").val(hasil);
    }

    function hitungSemua() {
        let nilaiproyek = parseFloat($("#nilai_proyek_fak_modal").val()) || 0;
        const inputs = $("input[name='nilai_pp_fak_modal[]']");
        let total = 0;
        inputs.each(function() {
            const nilai = parseFloat($(this).val()) || 0;
            total += nilai;
        });
        const jumlah = total - nilaiproyek;
        // 
        tottal = total - jumlah;
        $("#koreksi_biaya_fak_modal").val(jumlah);
        $("#jumlah_fak_modal").val(tottal);
        $("#biaya_umum_adm_fak_rl").val(tottal);
        // $("#pembiayaan_sendiri_fak_modal").val(pembiayaan);
    }

    function hitungSemua() {
        let nilaiproyek = parseFloat($("#nilai_proyek_fak_modal").val()) || 0;
        let direktur = parseFloat($("#gaji_direktur_fak_modal").val()) || 0;
        let pengawas = parseFloat($("#gaji_pengawas_fak_modal").val()) || 0;
        let staf = parseFloat($("#gaji_staf_fak_modal").val()) || 0;
        let umum = parseFloat($("#biaya_umum_fak_modal").val()) || 0;
        let hasil = direktur + pengawas + staf + umum;
        let hasil2 = nilaiproyek + hasil;
        $("#total_biaya_umum_fak_modal").val(hasil);
        $("#biaya_umum_adm_fak_rl").val(hasil);
        $("#jumlah_total_biaya_umum_fak_modal").val(hasil2);
    }

    function hitungSemua() {
        let persiapan_pekerjaan_fak_modal = parseFloat($("#persiapan_pekerjaan_fak_modal").val()) || 0;
        let biaya_umum_adm_fak_modal = parseFloat($("#biaya_umum_adm_fak_modal").val()) || 0;
        let hasil = persiapan_pekerjaan_fak_modal + biaya_umum_adm_fak_modal;
        $("#jumlah_kebutuhan_modal_kerja_fak_modal").val(hasil);
        $("#sumber_pembiayaan_fak_modal").val(hasil);
        $("#jumlah_bulat_sumber_pembiayaan_fak_modal").val(hasil);

        const pembiayaan = 0.2 * hasil;
        $("#pembiayaan_sendiri_fak_modal").val(pembiayaan);
    }

    function hitungSemua() {
        let sumber_pembiayaan_fak_modal = parseFloat($("#sumber_pembiayaan_fak_modal").val()) || 0;
        let penerimaan_uang_muka_fak_modal = parseFloat($("#penerimaan_uang_muka_fak_modal").val()) || 0;
        let pembiayaan_sendiri_fak_modal = parseFloat($("#pembiayaan_sendiri_fak_modal").val()) || 0;
        console.log(penerimaan_uang_muka_fak_modal);
        console.log(pembiayaan_sendiri_fak_modal);
        console.log(sumber_pembiayaan_fak_modal);
        const hasil = sumber_pembiayaan_fak_modal - penerimaan_uang_muka_fak_modal - pembiayaan_sendiri_fak_modal;
        $("#kredit_bank_fak_modal").val(hasil);
        copyvalue('penerimaan_uang_muka_fak_modal', 'jumlah_penerimaan_uang_muka_fak_modal');
    }

    function hitungSemua() {
        let jumlah_bulat_sumber_pembiayaan_fak_modal = parseFloat($("#jumlah_bulat_sumber_pembiayaan_fak_modal").val()) || 0;
        let jumlah_penerimaan_uang_muka_fak_modal = parseFloat($("#jumlah_penerimaan_uang_muka_fak_modal").val()) || 0;
        let jumlah_kredit_bank_fak_modal = parseFloat($("#jumlah_kredit_bank_fak_modal").val()) || 0;
        // const hasil = jumlah_bulat_sumber_pembiayaan_fak_modal - jumlah_penerimaan_uang_muka_fak_modal - jumlah_kredit_bank_fak_modal;
        // const hasil2 = jumlah_kredit_bank_fak_modal / jumlah_bulat_sumber_pembiayaan_fak_modal;
        // const hasil3 = hasil / jumlah_bulat_sumber_pembiayaan_fak_modal;
        // const hasil4 = 1 - hasil3 - hasil2;
        // const hasil5 = hasil4 + hasil3 + hasil2;

        const hasil = jumlah_bulat_sumber_pembiayaan_fak_modal - jumlah_penerimaan_uang_muka_fak_modal - jumlah_kredit_bank_fak_modal;
        const hasil2 = ((jumlah_kredit_bank_fak_modal / jumlah_bulat_sumber_pembiayaan_fak_modal) * 100).toFixed(2);
        const hasil3 = ((hasil / jumlah_bulat_sumber_pembiayaan_fak_modal) * 100).toFixed(2);
        const hasil4 = (100 - parseFloat(hasil2) - parseFloat(hasil3)).toFixed(2);
        const hasil5 = (parseFloat(hasil4) + parseFloat(hasil3) + parseFloat(hasil2)).toFixed(2);

        $("#jumlah_pembiayaan_sendiri_fak_modal").val(hasil);
        $("#persentase_pembiayaan_sendiri_fak_modal").val(hasil3);
        $("#persentase_kredit_bank_fak_modal").val(hasil2);
        $("#persentase_penerimaan_uang_muka_fak_modal").val(hasil4);
        $("#persentase_jumlah_sumber_pembiayaan_fak_modal").val(hasil5);
    }

    //FAK Proyeksi RL
    //  $("body").on("input", "input[name='nilai_kontrak_fak_rl'], input[name='pekerjaan_persiapan_konstruksi_fak_rl']", function() {
    //         const nilaiKontrak = parseFloat($("input[name='nilai_kontrak_fak_rl']").val()) || 0;
    //         const pekerjaanPersiapan = parseFloat($("input[name='pekerjaan_persiapan_konstruksi_fak_rl']").val()) || 0;
    //         const fix = nilaiKontrak - pekerjaanPersiapan;
    //         $("#laba_kotor_fak_rl").val(fix);
    //     });
    function hitungSemua() {
        const nilaiKontrak = parseFloat($("#nilai_kontrak_fak_rl").val()) || 0;
        const pekerjaanPersiapan = parseFloat($("#pekerjaan_persiapan_konstruksi_fak_rl").val()) || 0;
        const fix = nilaiKontrak - pekerjaanPersiapan;
        $("#laba_kotor_fak_rl").val(fix);
        // var tanggal = new Date('22-Feb-24');
        // var excelEpochInMilliseconds = new Date('1900-01-01').getTime();
        // var javascriptEpochInMilliseconds = new Date('1970-01-01').getTime();
        // var millisecondsPerDay = 24 * 60 * 60 * 1000; // milidetik per hari

        // var excelSerialDate = (tanggal.getTime() - javascriptEpochInMilliseconds) / millisecondsPerDay + (excelEpochInMilliseconds / millisecondsPerDay);
        // console.log(excelSerialDate);
    }

    function hitungSemua() {
        const BiayaUmum = parseFloat($("#biaya_umum_adm_fak_rl").val()) || 0;
        const LabaKotor = parseFloat($("#laba_kotor_fak_rl").val()) || 0;
        const fix = BiayaUmum - LabaKotor;
        $("#laba_usaha_fak_rl").val(fix);
    }

    function hitungSemua() {
        var tanggalElement = document.getElementById("tgl_pencairan_fak_data");
    var tanggal_termijnElement = document.getElementById("prakiraan_tgl_termijn_fak_data1" + angka);

    if (tanggalElement && tanggal_termijnElement) {
        var tanggal = new Date(tanggalElement.value);
        var tanggal_termijn = new Date(tanggal_termijnElement.value);
        var tanggal_termijn = new Date(document.getElementById("prakiraan_tgl_termijn_fak_data" + angka).value);
        const jumlah_kredit_bank_fak_modal = parseFloat($("#jumlah_kredit_bank_fak_modal").val()) || 0;
        const bunga_kredit_fak_data = parseFloat($("#bunga_kredit_fak_data").val()) || 0;
        const biaya_pemeliharaan_fak_data = parseFloat($("#biaya_pemeliharaan_fak_data").val()) || 0;

        // Mengonversi objek tanggal menjadi nilai numerik
        var excelEpochInMilliseconds = new Date('1900-01-01').getTime();
        var millisecondsPerDay = 24 * 60 * 60 * 1000; // milidetik per hari

        var nilaiTanggal = Math.ceil((tanggal.getTime() - excelEpochInMilliseconds) / millisecondsPerDay + 2); // Tambah 1 hari untuk menghitung fraksional waktu
        var nilaiTanggaltermijn = Math.ceil((tanggal_termijn.getTime() - excelEpochInMilliseconds) / millisecondsPerDay + 2); // Tambah 1 hari untuk menghitung fraksional waktu
        // console.log('tanggal asumsi:'+tanggal);
        // console.log('tanggal termijn:'+tanggal_termijn);
        // console.log('nilai tanggal asumsi:'+nilaiTanggal);
        // console.log('nilai tanggal termijn:'+nilaiTanggaltermijn);
        const fix = (jumlah_kredit_bank_fak_modal * bunga_kredit_fak_data / 360 * (nilaiTanggaltermijn - nilaiTanggal)) + (biaya_pemeliharaan_fak_data * jumlah_kredit_bank_fak_modal);
        $("#laba_sebelum_pajak_fak_rl").val(fix);
        
        // Lanjutkan dengan perhitungan...
    }else {
        console.error("Elemen HTML tidak ditemukan atau tidak memiliki properti 'value'.");
    }
        // var angka = document.getElementById("jumlah_termijn_fak_data");
        // var tanggal = new Date(document.getElementById("tgl_pencairan_fak_data").value);
        // var tanggal_termijn = new Date(document.getElementById("prakiraan_tgl_termijn_fak_data" + angka).value);
        // const jumlah_kredit_bank_fak_modal = parseFloat($("#jumlah_kredit_bank_fak_modal").val()) || 0;
        // const bunga_kredit_fak_data = parseFloat($("#bunga_kredit_fak_data").val()) || 0;
        // const biaya_pemeliharaan_fak_data = parseFloat($("#biaya_pemeliharaan_fak_data").val()) || 0;

        // // Mengonversi objek tanggal menjadi nilai numerik
        // var excelEpochInMilliseconds = new Date('1900-01-01').getTime();
        // var millisecondsPerDay = 24 * 60 * 60 * 1000; // milidetik per hari

        // var nilaiTanggal = Math.ceil((tanggal.getTime() - excelEpochInMilliseconds) / millisecondsPerDay + 2); // Tambah 1 hari untuk menghitung fraksional waktu
        // var nilaiTanggaltermijn = Math.ceil((tanggal_termijn.getTime() - excelEpochInMilliseconds) / millisecondsPerDay + 2); // Tambah 1 hari untuk menghitung fraksional waktu
        // console.log('tanggal asumsi:'+tanggal);
        // console.log('tanggal termijn:'+tanggal_termijn);
        // console.log('nilai tanggal asumsi:'+nilaiTanggal);
        // console.log('nilai tanggal termijn:'+nilaiTanggaltermijn);
        // const fix = (jumlah_kredit_bank_fak_modal * bunga_kredit_fak_data / 360 * (nilaiTanggaltermijn - nilaiTanggal)) + (biaya_pemeliharaan_fak_data * jumlah_kredit_bank_fak_modal);
        // $("#laba_sebelum_pajak_fak_rl").val(fix);
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
        const numbers = inputIds.map(id => parseFloat($("#" + id).val()) || 0);

        let result = numbers[0];

        for (let i = 0; i < operators.length; i++) {
            const operator = operators[i];
            const number = numbers[i + 1];

            if (operatorMap.hasOwnProperty(operator)) {
                result = operatorMap[operator]([result, number]);
            } else {
                console.error('Operator tidak valid:', operator);
                return NaN;
            }
        }

        $("#" + place).val(result);

        event.preventDefault();
    }

    jumlahisipp = 1;
    jumlahisitermijn = 1;

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
                    '<input id="item_pp_fak_data' + angka + '" name="item_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<label class="col-lg-6 control-label">PPN</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="ppn_pp_fak_data' + angka + '" name="ppn_pp_fak_data[]" onkeyup="hitungPP(' + angka + ')" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<label class="col-lg-6 control-label">Nilai Sebelum PPN</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="nilai_sebelum_ppn_pp_fak_data' + angka + '" name="nilai_sebelum_ppn_pp_fak_data[]" onkeyup="hitungPP(' + angka + ')" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<label class="col-lg-6 control-label">Nilai Sesudah PPN</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="nilai_sesudah_ppn_pp_fak_data' + angka + '" name="nilai_sesudah_ppn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>';
                $(".delete-btn-pp-fak-data").first().after(html11);
                var html2 = $(".copy-pp-fak-modal").html();
                $(".add-form-pp-fak-modal").after(html2);
                var html12 =
                    '<div class="col-lg-12">' +
                    '<label class="col-lg-6 control-label">Item</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="item_pp_fak_modal' + angka + '" name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-12">' +
                    '<label class="col-lg-6 control-label">Nilai</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="nilai_pp_fak_modal' + angka + '" name="nilai_pp_fak_modal[]" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>';
                $(".delete-btn-pp-fak-modal").first().after(html12);
                hitungPP(angka);
                angka++;
                jumlahisipp++;
                resizeJquerySteps();
            }
        });
        // saat tombol remove dklik control group akan dihapus
        $("body").on("click", ".hapus_pp_fak_data", function() {
            $(this).parents("#new").remove();
            jumlahisipp--;
            resizeJquerySteps();
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
                $(".add-form-termijn-fak-data").after("<hr class='new mt-0 pt-0'>");
                var html1 = $(".copy-termijn").html();
                $(".add-form-termijn-fak-modal").after(html1);
                var html11 =
                    '<div class="col-lg-3">' +
                    '<label class="col-lg-6 control-label">Termijn</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="termijn_pp_fak_data" name="termijn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<label class="col-lg-6 control-label">Progress</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="progress_pp_fak_data" name="progress_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<label class="col-lg-6 control-label">Persentase Termijn</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="persentase_termijn_pp_fak_data" name="persentase_termijn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<label class="col-lg-6 control-label">Prakiraan Tanggal Termijn</label>' +
                    '<div class="col-lg-12">' +
                    '<input id="prakiraan_tgl_termijn_fak_data' + angkatermijninput + '" name="prakiraan_tgl_termijn_fak_data[]" type="date" placeholder="" class="form-control">' +
                    '</div>' +
                    '</div>';
                $(".delete-btn-termijn-fak-data").first().after(html11);

                $("body").on("input", "input[name='persentase_termijn_pp_fak_data[]']", function() {
                    // const input = parseFloat($("#setelah_masa_pemeliharaan_fak_data").val()) || 0;
                    const inputs = $("input[name='persentase_termijn_pp_fak_data[]']");
                    let total = 0;
                    inputs.each(function() {
                        const nilai = parseFloat($(this).val()) || 0;
                        total += nilai;
                    });
                    const total_termijn = 100;
                    const fix = total_termijn - total;

                    $("#total_termijn_fak_data").val(total_termijn);
                    $("#setelah_masa_pemeliharaan_fak_data").val(fix);
                    $("#pemeliharaan_fak_modal").val(fix);
                });

                angkatermijn++;
                angkatermijninput++;
                $("#jumlah_termijn_fak_data").val(angkatermijn);
                jumlahisitermijn++;
                resizeJquerySteps();
            }
        });
        // saat tombol remove dklik control group akan dihapus
        $("body").on("click", ".hapus_termijn_fak_data", function() {
            $(this).parents("#new").remove();
            jumlahisitermijn--;
            angkatermijn--;
            angkatermijninput--;
            $("#jumlah_termijn_fak_data").val(angkatermijn);
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
</script> -->

<?= $this->endSection(); ?>