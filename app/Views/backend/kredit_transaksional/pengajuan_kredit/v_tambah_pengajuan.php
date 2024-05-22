<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<link href="<?= base_url(); ?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?= base_url(); ?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
<link href="<?= base_url(); ?>public/assets/css/plugins/summernote/summernote-bs4.css" rel="stylesheet">
<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-0pky {
        border-color: inherit;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-uzvj {
        border-color: inherit;
        font-weight: bold;
        text-align: center;
        vertical-align: middle
    }

    .tg .tg-za14 {
        border-color: inherit;
        text-align: left;
        vertical-align: bottom
    }
</style>
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
                                        <input disabled id="no_kontrak2_fak_data" name="no_kontrak2_fak_data" type="text" placeholder="" class="form-control">
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
                                        <input type="date" class="form-control" id="tgl_pelaksanaan_fak_data" name="tgl_pelaksanaan_fak_data">
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
                                    <!-- <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button" style="display: none;"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button> -->
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Item</label>
                                        <div class="col-lg-12">
                                            <input id="item_pp_fak_data1" name="item_pp_fak_data[]" type="text" onkeyup="copyvalue(this.id,'item_pp_fak_modal1')" placeholder="" class="form-control">
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
                                            <input id="nilai_sesudah_ppn_pp_fak_data1" name="nilai_sesudah_ppn_pp_fak_data[]" onchange="copyvalue(this.id,'nilai_pp_fak_modal1')" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Pembulatan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="pembulatan_nilai_sebelum_ppn_total_pp_fak_data" name="pembulatan_nilai_sebelum_ppn_total_pp_fak_data" type="text" onchange="hitung" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="pembulatan_nilai_sesudah_ppn_total_pp_fak_data" name="pembulatan_nilai_sesudah_ppn_total_pp_fak_data" type="text" onchange="hitung" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-6">
                                    <a class="btn btn-success btn-rounded float-right m-t-n-xs btncancel" onclick="hitungSemua()"><span>Hitung</span></a>
                                </div>
                                <div class="col-lg-3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Jumlah Total</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="jumlah_nilai_sebelum_ppn_total_pp_fak_data" name="jumlah_nilai_sebelum_ppn_total_pp_fak_data" type="text" placeholder="" class="form-control">
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
                            <div class="add-form-termijn-fak-data">
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Termijn</label>
                                        <div class="col-lg-12">
                                            <input id="termijn_pp_fak_data0" name="termijn_pp_fak_data[]" type="text" placeholder="" value="Uang Muka" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-lg-6 control-label">Progress</label>
                                        <div class="col-lg-12">
                                            <input id="progress_pp_fak_data0" name="progress_pp_fak_data[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-lg-10 control-label">Persentase Termijn</label>
                                        <div class="col-lg-12">
                                            <input id="persentase_termijn_pp_fak_data" name="persentase_termijn_pp_fak_data[]" onkeyup="copyvalue(this.id,'persentase_penerimaan_uang_muka_fak_rl')" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <!-- <div class="col-lg-1"> -->
                                        <a class="btn btn-success btn-rounded m-t-n-xs" style="margin-top:30px" onclick="hitungPrakiraanTanggalTermijn(0)"><span>Hitung</span></a>
                                        <!-- </div> -->
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>
                                        <div class="col-lg-10">
                                            <input id="prakiraan_tgl_termijn_fak_data0" name="prakiraan_tgl_termijn_fak_data[]" type="date" placeholder="" class="form-control">
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
                            <!-- <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nilai Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nilai_proyek_fak_modal" name="nilai_proyek_fak_modal" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div> -->
                            <h2 class="text-center text-danger">Perhitungan Plafond Kredit</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="proyek_fak_modal" name="proyek_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
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
                                        <input id="ppn_fak_modal" disabled name="ppn_fak_modal" onkeyup="hitungSemua()" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
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
                            <div class="form-group row">
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-2">
                                    <a class="btn btn-default float-right btn-rounded m-t-n-xs" onclick="hitungNilaiProyek()"><span>Nilai Proyek</span></a>
                                </div>
                                <div class="col-lg-6">
                                    <input id="nilai_proyek_fak_modal" name="nilai_proyek_fak_modal" type="text" placeholder="" class="form-control">
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
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Koreksi Biaya</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input id="koreksi_biaya_fak_modal" name="koreksi_biaya_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Jumlah</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input id="jumlah_fak_modal" name="jumlah_fak_modal" onchange="copyvalue(this.id,'pekerjaan_persiapan_konstruksi_fak_rl')" type="text" placeholder="" class="form-control">
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
                                            <input id="penerimaan_uang_muka_fak_modal" name="penerimaan_uang_muka_fak_modal" type="text" placeholder="" onkeyup="hitungSemua()" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_penerimaan_uang_muka_fak_modal" disabled name="jumlah_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_penerimaan_uang_muka_fak_modal" disabled name="persentase_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control">
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
                                            <input id="pembiayaan_sendiri_fak_modal" disabled name="pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_pembiayaan_sendiri_fak_modal" disabled name="jumlah_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_pembiayaan_sendiri_fak_modal" disabled name="persentase_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
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
                                            <input id="kredit_bank_fak_modal" name="kredit_bank_fak_modal" disabled type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_kredit_bank_fak_modal" name="jumlah_kredit_bank_fak_modal" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_kredit_bank_fak_modal" disabled name="persentase_kredit_bank_fak_modal" type="text" placeholder="" class="form-control">
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
                                <label class="col-lg-3 control-label">Laba Kotor</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="laba_kotor_fak_rl" name="laba_kotor_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Biaya Adm/Umum</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_adm_fak_rl" name="biaya_umum_adm_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Laba Usaha</label>
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
                                <label class="col-lg-3 control-label">Bunga + Provisi Bank</label>
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
                                <label class="col-lg-3 control-label">Laba Sebelum Pajak</label>
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
                                <label class="col-lg-3 control-label">Pajak (PPh & PPN)</label>
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
                                <label class="col-lg-3 control-label">Laba Bersih</label>
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
                                <label class="col-lg-3 control-label">Pajak (PPN & PPh)</label>
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
                                        <input id="rasio_lap_keuangan_upload_lap_rl" name="rasio_lap_keuangan_upload_lap_rl" type="file" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <br>
                        </fieldset>
                        <h1>CEF (T or T&B only)</h1>
                        <fieldset>
                            <h2 class="text-center text-danger">CEF (T or T&B only)</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <h3 class="text-center text-danger">Penetapan CEF TANAH</h3>
                                    <table class="tg">
                                        <thead>
                                            <tr>
                                                <th class="tg-0pky">No</th>
                                                <th class="tg-uzvj" colspan="2">Kriteria</th>
                                                <th class="tg-0pky">Bobot</th>
                                                <th class="tg-0pky">Parameter</th>
                                                <th class="tg-0pky">Nilai</th>
                                                <th class="tg-0pky">CEF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">1</td>
                                                <td class="tg-0pky" colspan="2">Bukti Kepemilikan</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">SHM</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox1ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SHGB, SHGU, STRATA TITLE</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox2ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td>-</td>
                                                <td class="tg-za14">SKPT (SRT KET PENDAFTARAN TANAH), SRT UKUR</td>
                                                <td></td>
                                                <td>50</td>
                                                <td><input type="checkbox" id="checkbox3ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">HAK PAKAI, SEGEL, SKPT (SRT KET PENGUASAAN TANAH) </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox4ceft" name="checkbox[]" value="25" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 1</td>
                                                <td class="tg-0pky">25%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil1ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">2</td>
                                                <td class="tg-za14" colspan="2">KELAS JALAN </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">JALAN RAYA UTAMA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox5ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LINGKUNGAN/KOMPLEK </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox6ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">GANG </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox7ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SETAPAK</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox8ceft" name="checkbox[]" value="25" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 2</td>
                                                <td class="tg-0pky">20%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil2ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">3</td>
                                                <td class="tg-za14" colspan="2">PEMILIK AGUNAN </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">AN. SENDIRI / ISTERI & SUAMI / PENGURUS PERUSAHAAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox9ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">AN. ANAK KANDUNG/TIRI / SAUDARA KANDUNG/TIRI/AYAH KANDUNG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox10ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">AN. KELUARGA LAIN </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox11ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">AN. PIHAK KETIGA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox12ceft" name="checkbox[]" value="25" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 3</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil3ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">4</td>
                                                <td class="tg-za14" colspan="2">LINGKUNGAN </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">PERKANTORAN & PERDAGANGAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox13ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">PERUMAHAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox14ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">PERTANIAN/PERKEBUNAN/PETERNAKAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox15ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LAINNYA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox16ceft" name="checkbox[]" value="25" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 4</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil4ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">5</td>
                                                <td class="tg-za14" colspan="2">LETAK / LOKASI BERKAITAN DGN PUSAT BISNIS </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SANGAT DEKAT ( 0 M S/D 500 M)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox17ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">DEKAT (> 500 M S/D 1 KM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox18ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">CUKUP DEKAT (> 1 KM S/D 2 KM) </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox19ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">JAUH (> 2 KM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox20ceft" name="checkbox[]" value="25" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 5</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil5ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">6</td>
                                                <td class="tg-za14" colspan="2">KELENGKAPAN FASUM / FASOS (DENGAN JARAK < 2 KM ) </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SANGAT LENGKAP (> 6 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox21ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LENGKAP (5 S/D 6 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox22ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">CUKUP (3 S/D 4 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox23ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">TIDAK LENGKAP (S/D 2 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox24ceft" name="checkbox[]" value="25" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 6</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil6ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="4">7</td>
                                                <td class="tg-0pky" colspan="2">BENTUK TANAH</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">SEGI EMPAT / PERSEGI PANJANG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox25ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'7','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">SEGI BANYAK</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox26ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'7','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">LAINNYA (SEGITIGA, TIDAK BERATURAN,DLL)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox27ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'7','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 7</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil7ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">8</td>
                                                <td class="tg-za14" colspan="2">KONTUR TANAH</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">RATA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox28ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">BERGELOMBANG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox29ceft" name="checkbox[]" value="75" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">BERTINGKAT </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox30ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LAINNYA (KOMBINASI)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox31ceft" name="checkbox[]" value="25" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 8</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil8ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="3">9</td>
                                                <td class="tg-0pky" colspan="2">JENIS TANAH</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">KERAS/DARAT/MATANG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox32ceft" name="checkbox[]" value="100" onchange="showValueCEFT(this,'9','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">RAWA/GAMBUT/BERAIR</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox33ceft" name="checkbox[]" value="50" onchange="showValueCEFT(this,'9','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 9</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil9ceft"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah CEF Tanah</td>
                                                <td class="tg-0pky">100%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasiltotalCEFT"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="text-center text-danger">Penetapan CEF BANGUNAN</h3>
                                    <table class="tg">
                                        <thead>
                                            <tr>
                                                <th class="tg-0pky">No</th>
                                                <th class="tg-uzvj" colspan="2">Kriteria</th>
                                                <th class="tg-0pky">Bobot</th>
                                                <th class="tg-0pky">Parameter</th>
                                                <th class="tg-0pky">Nilai</th>
                                                <th class="tg-0pky">CEF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="tg-0pky" rowspan="4">1</td>
                                                <td class="tg-0pky" colspan="2">PERIJINAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">MEMILIKI IMB</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox1cefb" name="checkbox[]" value="100" onchange="showValueCEFB(this,'1','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">MEMEILIKI IMB, NAMUN LUAS BANGUNAN TIDAK SESUAI DENGAN KONDISI SEBELUMNYA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox2cefb" name="checkbox[]" value="75" onchange="showValueCEFB(this,'1','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td>-</td>
                                                <td class="tg-za14">TIDAK MEMILIKI</td>
                                                <td></td>
                                                <td>50</td>
                                                <td><input type="checkbox" id="checkbox3cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'1','0.2')"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 1</td>
                                                <td class="tg-0pky">20%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil1cefb"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">2</td>
                                                <td class="tg-za14" colspan="2">JENIS BANGUNAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">BETON</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox4cefb" name="checkbox[]" value="100" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SEMI PERMANEN(KOMBINASI KAYU+BETON) </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox5cefb" name="checkbox[]" value="75" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">KAYU</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox6cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">MASIH DALAM PROSES</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox7cefb" name="checkbox[]" value="25" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 2</td>
                                                <td class="tg-0pky">20%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil2cefb"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">3</td>
                                                <td class="tg-za14" colspan="2">USIA BANGUNAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">S.D. 5 TAHUN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox8cefb" name="checkbox[]" value="100" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">>5 TAHUN S.D. 10 TAHUN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox9cefb" name="checkbox[]" value="75" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">>10 TAHUN S.D. 15 TAHUN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox10cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">>15 TAHUN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox11cefb" name="checkbox[]" value="25" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 3</td>
                                                <td class="tg-0pky">15%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil3cefb"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">4</td>
                                                <td class="tg-za14" colspan="2">KONDISI BANGUNAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SANGAT BAIK</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox12cefb" name="checkbox[]" value="100" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">BAIK</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox13cefb" name="checkbox[]" value="75" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">CUKUP</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox14cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">KURANG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox15cefb" name="checkbox[]" value="25" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 4</td>
                                                <td class="tg-0pky">15%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil4cefb"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">5</td>
                                                <td class="tg-za14" colspan="2">PENGGUNAAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">RUMAH TEMPAT TINGGAL</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox16cefb" name="checkbox[]" value="100" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">RUKO/RUKAN/TOKO</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox17cefb" name="checkbox[]" value="75" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">KANTOR</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox18cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LAINNYA (GUDANG,DLL)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox19cefb" name="checkbox[]" value="25" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 5</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil5cefb"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">6</td>
                                                <td class="tg-za14" colspan="2">TINGGI LANTAI BANGUNAN TERHADAP JALAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">TINGGI (>100CM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox20cefb" name="checkbox[]" value="100" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SEDANG (51CM S.D. 100CM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox21cefb" name="checkbox[]" value="75" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">RENDAH (0 S.D. 50CM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox22cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SANGAT RENDAH (DIBAWAH JALAN)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox23cefb" name="checkbox[]" value="25" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 6</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil6cefb"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky" rowspan="5">7</td>
                                                <td class="tg-0pky" colspan="2">KELANGKAPAN FASILITAS</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">SANGAT LENGKAP (>6 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">100</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox24cefb" name="checkbox[]" value="100" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">LENGKAP (5 S.D. 6 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox25cefb" name="checkbox[]" value="75" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">CUKUP (3 S.D. 4 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox26cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">TIDAK LENGKAP (S.D. 2 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox27cefb" name="checkbox[]" value="50" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 7</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasil7cefb"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah CEF Tanah</td>
                                                <td class="tg-0pky">100%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><span id="hasiltotalCEFB"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>
                        </fieldset>
                        <h1>FAA</h1>
                        <fieldset>
                            <h2>Data Formulir Analisa Agunan</h2>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <!-- kosong -->
                                </div>
                                <label class="col-lg-3 control-label">Nama Nasabah</label>
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
                                <label class="col-lg-3 control-label">Nomor dan Tanggal SHM</label>
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
                                <label class="col-lg-3 control-label">Nama Pemilik SHM</label>
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
                                <label class="col-lg-3 control-label">Alamat Agunan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="pekerjaan_persiapan_konstruksi_fak_rl" name="pekerjaan_persiapan_konstruksi_fak_rl" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Penilaian Agunan</h2>
                            <div class="border border-dark p-1">
                                <h3>1. Harga Tanah :</h3>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Harga menurut pasar</label>
                                        <div class="col-lg-12">
                                            <input id="harga_pasar_tanah_faa" name="harga_pasar_tanah_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Harga Buku</label>
                                        <div class="col-lg-12">
                                            <input id="harga_buku_tanah_faa" name="harga_buku_tanah_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Harga menurut pejabat bank</label>
                                        <div class="col-lg-12">
                                            <input id="harga_menurut_pejabat_bank_tanah_faa" name="harga_menurut_pejabat_bank_tanah_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-lg-6">
                                        
                                        <div class="col-lg-12">
                                            
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-6 control-label">Penilaian tanah</label>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                Rp
                                            </div>
                                            <div class="col-lg-2">
                                                <input id="harga_tanah_tanah_faa" name="harga_tanah_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                            <div class="col-lg-4">
                                                <input id="luas_persegi_tanah_tanah_faa" name="luas_persegi_tanah_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label class="col-lg-12 control-label">Cash Equivalency Factor (CEF)</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <input id="cef_tanah_faa" name="cef_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                            <div class="col-lg-4">
                                                <input id="harga_cef_tanah_faa" name="harga_cef_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Safety Margin</label>
                                        <div class="col-lg-12">
                                            <label class="col-lg-6 control-label">5%</label>
                                            <input id="safety_margin_tanah_faa" name="safety_margin_tanah_faa" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Bangun Setelah CEF & Safety Margin</label>
                                        <div class="col-lg-12">
                                            <label class="col-lg-6 control-label">5%</label>
                                            <input id="nilai_cef_safety_margin_tanah_faa" name="nilai_cef_safety_margin_tanah_faa" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-dark p-1">
                                <h3>2. Harga Bangunan :</h3>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Harga perolehan</label>
                                        <div class="col-lg-12">
                                            <input id="harga_perolehan_bangunan_faa" name="harga_perolehan_bangunan_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Harga menurut pasar</label>
                                        <div class="col-lg-12">
                                            <input id="harga_pasar_bangunan_bangunan_faa" name="harga_pasar_bangunan_bangunan_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Harga menurut pejabat bank/meter</label>
                                        <div class="col-lg-12">
                                            <input id="harga_menurut_pejabat_bank_bangunan_faa" name="harga_menurut_pejabat_bank_bangunan_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Penilaian bangunan</label>
                                        <div class="col-lg-12">
                                            <input id="harga_tanah_bangunan_faa" name="harga_tanah_bangunan_faa" type="text" placeholder="" class="form-control">
                                            <input id="luas_persegi_tanah_bangunan_faa" name="luas_persegi_tanah_bangunan_faa" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Cash Equivalency Factor (CEF)</label>
                                        <div class="col-lg-12">
                                            <input id="cef_bangunan_faa" name="cef_bangunan_faa" type="text" placeholder="" class="form-control">
                                            <input id="harga_cef_bangunan_faa" name="harga_cef_bangunan_faa" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Safety Margin</label>
                                        <div class="col-lg-12">
                                            <label class="col-lg-6 control-label">5%</label>
                                            <input id="safety_margin_bangunan_faa" name="safety_margin_bangunan_faa" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Bangun Setelah CEF & Safety Margin</label>
                                        <div class="col-lg-12">
                                            <label class="col-lg-6 control-label">5%</label>
                                            <input id="nilai_cef_safety_margin_bangunan_faa" name="nilai_cef_safety_margin_bangunan_faa" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-dark p-1">
                                <h3>3. Nilai Taksasi Seluruhnya (tanah dan bangunan) :</h3>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Tanah setelah CEF & Safety Margin</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_tanah_setelah_cef_safety_margin_faa" name="nilai_tanah_setelah_cef_safety_margin_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Bangunan setelah CEF & Safety Margin</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_bangunan_setelah_cef_safety_margin_faa" name="nilai_bangunan_setelah_cef_safety_margin_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Keseluruhan</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_keseluruhan_faa" name="nilai_keseluruhan_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Rasio Perbandingan Agunan dengan Plafond Kredit</label>
                                        <div class="col-lg-12">
                                            <input id="rasio_perbandingan_agunan_plafond_faa" name="rasio_perbandingan_agunan_plafond_faa" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </fieldset>
                        <h1>Memo Analisa & Usulan Kredit</h1>
                        <fieldset>
                            <h2>Memo Analisa & Usulan Kredit</h2>
                            <!-- <h2 class="text-center text-danger">Proyeksi Laba Rugi</h2> -->
                            <textarea id="summernote" name="contents"></textarea>
                            <br>
                        </fieldset>
                    </form>
                    <!-- <a class="btn btn-default btn-rounded btn-outline float-right m-t-n-xs btncancel" onclick="add_setting1()"><i class="fa fa-times"></i>&nbsp;&nbsp;<span class="bold">Cancel</span></a> -->
                </div>
            </div>
        </div>
        <input type="text" name="kd_data" id="kd_data" value="<?php echo $datafcr->kd_data ?>">
        <input type="text" hidden name="itemppfakdata" id="itemppfakdata">
        <input type="text" hidden name="ppnppfakdata" id="ppnppfakdata">
        <input type="text" hidden name="nilaisebelumppnppfakdata" id="nilaisebelumppnppfakdata">
        <input type="text" hidden name="nilaisesudahppnppfakdata" id="nilaisesudahppnppfakdata">

        <input type="text" hidden name="termijnppfakdata" id="termijnppfakdata">
        <input type="text" hidden name="progressppfakdata" id="progressppfakdata">
        <input type="text" hidden name="persentasetermijnppfakdata" id="persentasetermijnppfakdata">
        <input type="text" hidden name="prakiraantgltermijnfakdata" id="prakiraantgltermijnfakdata">

        <input type="text" hidden name="itemppfakmodal" id="itemppfakmodal">
        <input type="text" hidden name="nilaippfakmodal" id="nilaippfakmodal">

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

<script>
    var kd_data = document.getElementById("kd_data").value;
    $(document).ready(function() {
        // Dapatkan data untuk di-edit
        $.ajax({
            url: '/cpa/get-fcr/' + kd_data,
            method: 'GET',
            success: function(response) {
                // $('#field_name').val(response.field_name);
                // Set nilai untuk field lainnya
                console.log(response);
                console.log(response.nomor);

            },
            error: function() {
                console.log('Gagal mengambil data.');
            }
        });

        // Kirim data yang di-edit
    });
</script>
<!-- Steps -->
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.min.js"></script>
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.fix.js"></script>
<script src="<?= base_url(); ?>public/assets/js/plugins/summernote/summernote-bs4.js"></script>

<!-- Jquery Validate -->
<script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url(); ?>public/assets/js-manual/script_cadangan.js"></script>

<?= $this->endSection(); ?>