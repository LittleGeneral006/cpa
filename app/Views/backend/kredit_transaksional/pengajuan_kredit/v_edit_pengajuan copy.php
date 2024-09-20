<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<link href="<?= base_url(); ?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?= base_url(); ?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Pengajuan Kredit Transaksional</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
    <div class="col-lg-2 text-right">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                </div>
                <div class="ibox-content">
                    <h2>
                        Edit Pengajuan Kredit Transaksional
                    </h2>
                    <p>
                        Silakan isi form di bawah ini untuk mengedit Pengajuan Kredit Transaksional
                        <br>

                    </p>

                    <form id="form" action="#" class="wizard-big">
                        <?= csrf_field() ?>

                        <h1>Data Entry</h1>
                        <fieldset>
                            <h2>Data Entry</h2>
                            <h2 class="text-center text-danger">Pemroses</h2>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Unit Kerja</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="unit_kerja_tambah" name="unit_kerja_tambah">

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Pemasar</label>
                                        <div class="col-lg-12">
                                            <input id="pemasar_tambah" name="pemasar_tambah" type="text" placeholder="" class="form-control class-readonly">
                                            <input id="kd_data_tambah" name="kd_data_tambah" type="hidden" placeholder="" class="form-control class-readonly">


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Koordinator Pemasar</label>
                                    <div class="col-lg-12">
                                        <input id="koordinator_pemasar_tambah" name="koordinator_pemasar_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Cabang</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_cabang_tambah" name="kepala_cabang_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Bagian</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_bagian_tambah" name="kepala_bagian_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Divisi</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_divisi_tambah" name="kepala_divisi_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <h2 class="text-center text-danger">Data Debitur</h2>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_debitur_tambah" name="nama_debitur_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Bidang Usaha</label>
                                    <div class="col-lg-12">
                                        <input id="bidang_usaha_tambah" name="bidang_usaha_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Direktur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_direktur_tambah" name="nama_direktur_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Key Person</label>
                                    <div class="col-lg-12">
                                        <input id="key_person_tambah" name="key_person_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Kantor</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_kantor_tambah" name="alamat_kantor_tambah" rows="3"></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Gudang/ Pabrik/ Workshop</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_gudang_tambah" name="alamat_gudang_tambah" rows="3"></textarea>

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Group Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="group_debitur_tambah" name="group_debitur_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>




                            </div>
                            <h2 class="text-center text-danger">Data Proyek</h2>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nama_proyek_tambah" name="nama_proyek_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nomor SPK/ SPPBJ/ Gunning/ Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="nomor_spk_tambah" name="nomor_spk_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal SPK/ SPPBJ/ Gunning/ Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_spk_tambah" name="tanggal_spk_tambah" type="date" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nilai Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nilai_proyek_tambah" name="nilai_proyek_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Proyek</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_proyek_tambah" name="alamat_proyek_tambah" rows="3"></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pemberi Kerja (Bouwheer)</label>
                                    <div class="col-lg-12">
                                        <input id="pemberi_kerja_tambah" name="pemberi_kerja_tambah" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Penandatangan Kontrak (Bouwheer)</label>
                                    <div class="col-lg-12">
                                        <input id="penandatangan_kontrak_tambah" name="penandatangan_kontrak_tambah" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Pemberi Kerja</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_pemberi_tambah" name="alamat_pemberi_tambah" rows="3"></textarea>

                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Dokumen Kontrak Proyek</label>
                                    <div class="row px-3">
                                        <div class="col-lg-6">
                                            <input id="lihat_file" value="Lihat Dokumen" name="lihat_file" type="button" placeholder="" class="form-control class-readonly">

                                        </div>
                                        <div class="col-lg-6">
                                            <input id="edit_file" value="Edit Dokumen" name="edit_file" type="button" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Status Pengajuan</label>
                                    <div class="col-lg-12">
                                        <select class="form-control class-disabled select" required id="status_tambah" name="status_tambah">
                                            <option value="" disabled="">pilih</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>


                                    </div>
                                </div>


                            </div>
                            <h2 class="text-center text-danger">Pengajuan Kredit</h2>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal Permohonan</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_permohonan_tambah" name="tanggal_permohonan_tambah" type="date" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Plafond</label>
                                    <div class="col-lg-12">
                                        <input id="plafond_tambah" name="plafond_tambah" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tujuan Pengajuan</label>
                                    <div class="col-lg-12">
                                        <input id="tujuan_pengajuan_tambah" name="tujuan_pengajuan_tambah" type="text" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="jumlah_agunan_tambah" class="col-lg-12 control-label">Jumlah Agunan:</label>
                                    <div class="">
                                        <div class="col-lg-12">
                                            <select name="jumlah_agunan_tambah" id="jumlah_agunan_tambah" class="form-control">
                                                <option value="" selected disabled>Pilih</option>
                                                <?php for ($i = 1; $i <= 40; $i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php  } ?>
                                            </select>


                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div id="input_agunan_tambah" class=""></div>
                                </div>




                            </div>

                        </fieldset>
                        <h1>Formulir Call Report</h1>
                        <fieldset>
                            <h2>Formulir Call Report</h2>


                            <div class="form-group">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Nomor</label>
                                        <div class="col-lg-12">
                                            <input id="nomor" name="nomor" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tanggal</label>
                                        <div class="col-lg-12">
                                            <input id="tanggal" name="tanggal" type="date" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_debitur" name="nama_debitur" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Kantor</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="3"></textarea>

                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Gudang/ Pabrik/ Workshop</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="3"></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Group Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="group_debitur" name="group_debitur" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>

                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Contact Person</label>
                                    <div class="row px-3">
                                        <div class="col-lg-9">
                                            <input id="contact_person" name="contact_person" type="text" placeholder="" class="form-control class-readonly">


                                        </div>
                                        <div class="col-lg-3">
                                            <button type="button" id="tambah_contact" class="btn btn-block btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Yang Melaksanakan Kunjungan (1)</label>
                                    <div class="col-lg-12">
                                        <input id="kunjungan1" name="kunjungan1" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Yang Melaksanakan Kunjungan (2)</label>
                                    <div class="col-lg-12">
                                        <input id="kunjungan2" name="kunjungan2" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Unit Kerja</label>
                                    <div class="col-lg-12">
                                        <select class="form-control class-disabled select" id="unit_kerja" name="unit_kerja">

                                        </select>

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal Kunjungan</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_kunjungan" name="tanggal_kunjungan" type="date" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Lokasi Yang Dikunjungi</label>
                                    <div class="col-lg-12">
                                        <input id="lokasi" name="lokasi" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tujuan Kunjungan</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="tujuan_kunjungan" name="tujuan_kunjungan" rows="3"></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Hasil Kunjungan</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="hasil_kunjungan" name="hasil_kunjungan" rows="3"></textarea>

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tindak Lanjut</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="tindak_lanjut" name="tindak_lanjut" rows="3"></textarea>

                                    </div>
                                </div>




                            </div>




                        </fieldset>
                        <h1>Lampiran FCR Usaha</h1>
                        <fieldset>
                            <h2>Lampiran FCR Usaha</h2>


                            <div class="form-group">
                                <h2 class="text-center text-danger">Spesifikasi dan Kondisi Bangunan (Kantor)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi Fisik</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_fisik" name="kondisi_fisik" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Tanah</label>
                                        <div class="col-lg-12">
                                            <input id="luas_tanah" name="luas_tanah" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Bangunan</label>
                                        <div class="col-lg-12">
                                            <input id="luas_bangunan" name="luas_bangunan" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fasilitas/ Sarana</label>
                                        <div class="col-lg-12">
                                            <input id="fasilitas" name="fasilitas" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lokasi</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="lokasi" name="lokasi" rows="3"></textarea>

                                        </div>
                                    </div>


                                </div>
                                <h2 class="text-center text-danger">Spesifikasi dan Kondisi Bangunan (Workshop)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi Fisik</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_fisik_workshop" name="kondisi_fisik_workshop" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Tanah</label>
                                        <div class="col-lg-12">
                                            <input id="luas_tanah_workshop" name="luas_tanah_workshop" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Bangunan</label>
                                        <div class="col-lg-12">
                                            <input id="luas_bangunan_workshop" name="luas_bangunan_workshop" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fasilitas/ Sarana</label>
                                        <div class="col-lg-12">
                                            <input id="fasilitas_workshop" name="fasilitas_workshop" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lokasi</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="lokasi_workshop" name="lokasi_workshop" rows="3"></textarea>

                                        </div>
                                    </div>


                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Mesin & Peralatan Pabrik/ Kerja (Mesin-Mesin Kerja)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi Mesin Utama</label>
                                        <div class="col-lg-12">
                                            <input id="mesin_utama" name="mesin_utama" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi Mesin Penunjang</label>
                                        <div class="col-lg-12">
                                            <input id="mesin_penunjang" name="mesin_penunjang" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi" name="kondisi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kapasitas Mesin</label>
                                        <div class="col-lg-12">
                                            <input id="kapasitas_mesin" name="kapasitas_mesin" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Mesin & Peralatan Pabrik/ Kerja (Peralatan Kerja)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ Jenis Peralatan Utama</label>
                                        <div class="col-lg-12">
                                            <input id="peralatan_utama" name="peralatan_utama" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ jenis Peralatan Penunjang</label>
                                        <div class="col-lg-12">
                                            <input id="peralatan_penunjang" name="peralatan_penunjang" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_peralatan" name="kondisi_peralatan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lainnya</label>
                                        <div class="col-lg-12">
                                            <input id="lainnya" name="lainnya" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Peralatan Berat/ Kendaraan (Alat Berat)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ Jenis</label>
                                        <div class="col-lg-12">
                                            <input id="fungsi" name="fungsi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="merk" name="merk" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Jumlah</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi" name="kondisi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lain-lain</label>
                                        <div class="col-lg-12">
                                            <input id="lainnya" name="lainnya" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Peralatan Berat/ Kendaraan (Kendaraan)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ Jenis</label>
                                        <div class="col-lg-12">
                                            <input id="fungsi" name="fungsi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="merk" name="merk" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Jumlah</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi" name="kondisi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lain-lain</label>
                                        <div class="col-lg-12">
                                            <input id="lainnya" name="lainnya" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Proyek</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lokasi</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="lokasi" name="lokasi" rows="3"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Lokasi/ Bangunan/ Fisik/ Proyek</label>
                                        <div class="col-lg-12">
                                            <input id="lokasi" name="lokasi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi Fisik</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_fisik" name="kondisi_fisik" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <h2 class="text-center text-danger">Spesifikasi Jumlah & Kondisi Persediaan/ Stok</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Bahan Baku/ Pembantu</label>
                                        <div class="col-lg-12">
                                            <input id="bahan_baku" name="bahan_baku" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Bahan Setengah Jadi</label>
                                        <div class="col-lg-12">
                                            <input id="bahan_setengah_jadi" name="bahan_setengah_jadi" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Persediaan Material</label>
                                        <div class="col-lg-12">
                                            <input id="persediaan_material" name="persediaan_material" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>



                            </div>





                        </fieldset>
                        <h1>Lampiran FCR Agunan</h1>
                        <fieldset>
                            <h2>Lampiran FCR Agunan</h2>
                            <div class="form-group">
                                <h2 class="text-center text-danger">Tanah</h2>
                                <h3 class="text-left text-success">Status tanah/ Jenis pemilikan</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Bukti Kepemilikan</label>
                                        <div class="col-lg-12">
                                            <input id="bukti_kepemilikan" name="bukti_kepemilikan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tanggal Bukti Kepemilikan</label>
                                        <div class="col-lg-12">
                                            <input id="tanggal_bukti_kepemilikan" name="tanggal_bukti_kepemilikan" type="date" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Surat Ukur</label>
                                        <div class="col-lg-12">
                                            <input id="surat_ukur" name="surat_ukur" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tanggal Surat Ukur</label>
                                        <div class="col-lg-12">
                                            <input id="tanggal_surat_ukur" name="tanggal_surat_ukur" type="date" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">NIB</label>
                                        <div class="col-lg-12">
                                            <input id="nib" name="nib" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Penunjuk (warkah)</label>
                                        <div class="col-lg-12">
                                            <input id="penunjuk" name="penunjuk" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <h3 class="text-left text-success">Letak Tanah</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kelurahan/ Desa</label>
                                        <div class="col-lg-12">
                                            <input id="kelurahan" name="kelurahan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kecamatan</label>
                                        <div class="col-lg-12">
                                            <input id="kecamatan" name="kecamatan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kabupaten</label>
                                        <div class="col-lg-12">
                                            <input id="kabupaten" name="kabupaten" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Provinsi</label>
                                        <div class="col-lg-12">
                                            <input id="provinsi" name="provinsi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h3 class="text-left text-success">Luas Tanah</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Utara (M)</label>
                                        <div class="col-lg-12">
                                            <input id="utara" name="utara" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Barat (M)</label>
                                        <div class="col-lg-12">
                                            <input id="barat" name="barat" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Selatan (M)</label>
                                        <div class="col-lg-12">
                                            <input id="selatan" name="selatan" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Timur (M)</label>
                                        <div class="col-lg-12">
                                            <input id="timur" name="timur" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas (M2)</label>
                                        <div class="col-lg-12">
                                            <input id="luas" name="luas" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>
                                <h3 class="text-left text-success">Perwatasan</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kanan</label>
                                        <div class="col-lg-12">
                                            <input id="kanan" name="kanan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kiri</label>
                                        <div class="col-lg-12">
                                            <input id="kiri" name="kiri" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Depan</label>
                                        <div class="col-lg-12">
                                            <input id="depan" name="depan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Belakang</label>
                                        <div class="col-lg-12">
                                            <input id="belakang" name="belakang" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h3 class="text-left text-success">Daerah Pemakaian</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Daerah Pemakaian</label>
                                        <div class="col-lg-12">
                                            <input id="daerah_pemakaian" name="daerah_pemakaian" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <h3 class="text-left text-success">Kondisi Tanah</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi Tanah</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_tanah" name="kondisi_tanah" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <h3 class="text-left text-success">Harga Tanah (M2)</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Menurut Buku Tanah (Permeter)</label>
                                        <div class="col-lg-12">
                                            <input id="buku_tanah" name="buku_tanah" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Menurut Pasar (Permeter)</label>
                                        <div class="col-lg-12">
                                            <input id="menurut_pasar" name="menurut_pasar" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <h3 class="text-left text-success">Keterangan Lain</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Keterangan Lain</label>
                                        <div class="col-lg-12">
                                            <input id="keterangan_lain" name="keterangan_lain" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>
                                <h2 class="text-center text-danger">Bangunan I</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">IMB</label>
                                        <div class="col-lg-12">
                                            <input id="imb" name="imb" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Pondasi</label>
                                        <div class="col-lg-12">
                                            <input id="pondasi" name="pondasi" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lantai</label>
                                        <div class="col-lg-12">
                                            <input id="lantai" name="lantai" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tinggi Lantai Terhadap Jalan</label>
                                        <div class="col-lg-12">
                                            <input id="tinggi_lantai_terhadap_jalan" name="tinggi_lantai_terhadap_jalan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Rangka</label>
                                        <div class="col-lg-12">
                                            <input id="rangka" name="rangka" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Dinding</label>
                                        <div class="col-lg-12">
                                            <input id="dinding" name="dinding" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Langit - Langit Plafond</label>
                                        <div class="col-lg-12">
                                            <input id="langit_plafond" name="langit_plafond" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Atap</label>
                                        <div class="col-lg-12">
                                            <input id="atap" name="atap" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tahun Pembangunan</label>
                                        <div class="col-lg-12">
                                            <input id="tahun_pembangunan" name="tahun_pembangunan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Rehap/ Perbaikan</label>
                                        <div class="col-lg-12">
                                            <input id="rehap_perbaikan" name="rehap_perbaikan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h3 class="text-left text-success">Biaya yang Dikeluarkan</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Saat Pembelian Tanah</label>
                                        <div class="col-lg-12">
                                            <input id="saat_pembelian_tanah" name="saat_pembelian_tanah" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Saat Pembangunan</label>
                                        <div class="col-lg-12">
                                            <input id="saat_pembangunan" name="saat_pembangunan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Saat Rehab Perbaikan</label>
                                        <div class="col-lg-12">
                                            <input id="saat_rehab_perbaikan" name="saat_rehab_perbaikan" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>
                                <h3 class="text-center text-danger">Fasilitas yang Tersedia</h3>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Air</label>
                                        <div class="col-lg-12">
                                            <input id="air" name="air" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Telepon</label>
                                        <div class="col-lg-12">
                                            <input id="telepon" name="telepon" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Listrik</label>
                                        <div class="col-lg-12">
                                            <input id="listrik" name="listrik" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Pagar</label>
                                        <div class="col-lg-12">
                                            <input id="pagar" name="pagar" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Taman</label>
                                        <div class="col-lg-12">
                                            <input id="taman" name="taman" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lainnya</label>
                                        <div class="col-lg-12">
                                            <input id="lainnya" name="lainnya" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Bangunan Lantai 1 (M2)</label>
                                        <div class="col-lg-12">
                                            <input id="lantai1" name="lantai1" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Bangunan Lantai 2 (M2)</label>
                                        <div class="col-lg-12">
                                            <input id="lantai2" name="lantai2" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Total Bangunan (M2)</label>
                                        <div class="col-lg-12">
                                            <input id="total_bangunan" name="total_bangunan" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi Bangunan</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_bangunan" name="kondisi_bangunan" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-left text-success">Harga Bangunan Lantai 1</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Menurut Harga Perolehan</label>
                                        <div class="col-lg-12">
                                            <input id="menurut_harga_perolehan" name="menurut_harga_perolehan" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Menurut Pasar/ Pemilik</label>
                                        <div class="col-lg-12">
                                            <input id="menurut_pasar" name="menurut_pasar" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Keterangan Lain</label>
                                        <div class="col-lg-12">
                                            <input id="keterangan_lain" name="keterangan_lain" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>

                                <h2 class="text-center text-danger">Lingkungan</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Sarana yang tersedia disekitar lingkungan</label>
                                        <div class="col-lg-12">
                                            <input id="sarana" name="sarana" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Sarana dan prasarana perhubung</label>
                                        <div class="col-lg-12">
                                            <input id="menurut_pasar" name="menurut_pasar" type="number" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kelas dan Lebar Jalan</label>
                                        <div class="col-lg-12">
                                            <input id="kelas" name="kelas" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Gambar Situasi</label>
                                        <div class="col-lg-12">
                                            <input id="gambar_situasi" name="gambar_situasi" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                </div>





                            </div>

                        </fieldset>
                        <h1>Dokumen Pendukung</h1>
                        <fieldset>
                            <h2>Dokumen Pendukung</h2>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Nama Nasabah</label>
                                        <div class="col-lg-12">
                                            <input id="nama_nasabah_dp" name="nama_nasabah_dp" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Alamat</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="alamat_dp" name="alamat_dp" rows="3"></textarea>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Usaha</label>
                                    <div class="col-lg-12">
                                        <input id="usaha_dp" name="usaha_dp" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Jenis Badan Usaha</label>
                                    <div class="col-lg-12">
                                        <select class="form-control class-disabled select" required id="jenis_badan_usaha_dp" name="jenis_badan_usaha_dp">
                                            <option value="" selected="" disabled="">pilih</option>
                                            <option value="Perseroan Perseorangan">Perseroan Perseorangan</option>
                                            <option value="Commanditaire Vennootschap (CV)">Commanditaire Vennootschap (CV)</option>
                                            <option value="Perseroan Perseorangan">Perseroan Perseorangan</option>
                                        </select>


                                    </div>
                                </div>


                            </div>
                            <h2 class="text-left text-success">Persyaratan Dokumen</h2>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                                    <div class="col-lg-12">
                                        <input id="permohonan_pengajuan_kredit_dp" name="permohonan_pengajuan_kredit_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Pernyataan Pendirian Perseroan Perorangan</label>
                                    <div class="col-lg-12">
                                        <input id="pendirian_perseroan_dp" name="pendirian_perseroan_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>

                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Sertifikat Pendaftaran Perseroan Perseorangan</label>
                                    <div class="col-lg-12">
                                        <input id="pendaftaran_perseroan_dp" name="pendaftaran_perseroan_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan Perorangan</label>
                                    <div class="col-lg-12">
                                        <input id="npwp_dp" name="npwp_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero</label>
                                    <div class="col-lg-12">
                                        <input id="ktp_dp" name="ktp_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Persero</label>
                                    <div class="col-lg-12">
                                        <input id="npwp_persero_dp" name="npwp_persero_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy perijinan usaha yang berlaku dan sesuai yang dipersyaratkan oleh pemberi kerja</label>
                                    <div class="col-lg-12">
                                        <input id="npwp_persero_dp" name="npwp_persero_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                                    <div class="col-lg-12">
                                        <input id="pengalaman_kerja_dp" name="pengalaman_kerja_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Laporan Keuangan</label>
                                    <div class="col-lg-12">
                                        <input id="laporan_keuangan_dp" name="laporan_keuangan_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>

                            </div>
                            <h2 class="text-left text-success">Dokumen Agunan</h2>

                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy dokumen agunan yang akan diserahkan disertai kelengkapannya</label>
                                    <div class="col-lg-12">
                                        <input id="agunan_diserahkan_dp" name="agunan_diserahkan_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                                    <div class="col-lg-12">
                                        <input id="ideb_slik_dp" name="ideb_slik_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                                    <div class="col-lg-12">
                                        <input id="ktp_agunan_dp" name="ktp_agunan_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                                    <div class="col-lg-12">
                                        <input id="kk_agunan_dp" name="kk_agunan_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                                    <div class="col-lg-12">
                                        <input id="akta_nikah_dp" name="akta_nikah_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>

                            </div>
                            <h2 class="text-left text-success">Track Record</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                                    <div class="col-lg-12">
                                        <input id="dhn_dp" name="dhn_dp" type="file" placeholder="" class="form-control class-readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                                    <div class="col-lg-12">
                                        <input id="ideb_slik_dp" name="ideb_slik_dp" type="file" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>

                            </div>
                            <!-- buat dokumen cv -->
                            <div class="cv">
                                <h2 class="text-left text-success">Persyaratan Dokumen</h2>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                                        <div class="col-lg-12">
                                            <input id="permohonan_pengajuan_kredit_dp" name="permohonan_pengajuan_kredit_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Akta Pendirian beserta Akta Perubahan (jika ada) atau yang dipersamakan dengan hal itu</label>
                                        <div class="col-lg-12">
                                            <input id="akta_pendirian_dp" name="akta_pendirian_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>

                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Surat Keterangan/Keputusan Administrasi Hukum Umum (AHU)</label>
                                        <div class="col-lg-12">
                                            <input id="ahu_dp" name="ahu_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan</label>
                                        <div class="col-lg-12">
                                            <input id="npwp_dp" name="npwp_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero Pengurus</label>
                                        <div class="col-lg-12">
                                            <input id="ktp_dp" name="ktp_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero Komanditer</label>
                                        <div class="col-lg-12">
                                            <input id="ktp_komanditer_dp" name="ktp_komanditer_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy perijinan usaha</label>
                                        <div class="col-lg-12">
                                            <input id="perijinan_dp" name="perijinan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                                        <div class="col-lg-12">
                                            <input id="pengalaman_kerja_dp" name="pengalaman_kerja_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Laporan Keuangan</label>
                                        <div class="col-lg-12">
                                            <input id="laporan_keuangan_dp" name="laporan_keuangan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-left text-success">Dokumen Agunan</h2>

                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy dokumen agunan yang akan diserahkan disertai kelengkapannya</label>
                                        <div class="col-lg-12">
                                            <input id="agunan_diserahkan_dp" name="agunan_diserahkan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Ideb SLIK</label>
                                        <div class="col-lg-12">
                                            <input id="ideb_slik_dp" name="ideb_slik_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>




                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                                        <div class="col-lg-12">
                                            <input id="ktp_agunan_dp" name="ktp_agunan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                                        <div class="col-lg-12">
                                            <input id="kk_agunan_dp" name="kk_agunan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>




                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                                        <div class="col-lg-12">
                                            <input id="akta_nikah_dp" name="akta_nikah_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-left text-success">Track Record</h2>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                                        <div class="col-lg-12">
                                            <input id="dhn_dp" name="dhn_dp" type="file" placeholder="" class="form-control class-readonly">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Ideb SLIK</label>
                                        <div class="col-lg-12">
                                            <input id="ideb_slik_dp" name="ideb_slik_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="pt">
                                <h2 class="text-left text-success">Persyaratan Dokumen</h2>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                                        <div class="col-lg-12">
                                            <input id="permohonan_pengajuan_kredit_dp" name="permohonan_pengajuan_kredit_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Akta Pendirian beserta Akta Perubahan (jika ada) atau yang dipersamakan dengan hal itu</label>
                                        <div class="col-lg-12">
                                            <input id="akta_pendirian_dp" name="akta_pendirian_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>

                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Surat Keterangan/Keputusan Administrasi Hukum Umum (AHU)</label>
                                        <div class="col-lg-12">
                                            <input id="ahu_dp" name="ahu_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan</label>
                                        <div class="col-lg-12">
                                            <input id="npwp_dp" name="npwp_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Direksi</label>
                                        <div class="col-lg-12">
                                            <input id="ktp_direksi_dp" name="ktp_direksi_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Komisaris</label>
                                        <div class="col-lg-12">
                                            <input id="ktp_komisaris_dp" name="ktp_komisaris_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>



                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Dokumen Legalitas Pemegang Saham (kecuali Perseroan Terbuka)</label>
                                        <div class="col-lg-12">
                                            <input id="pemegang_saham_dp" name="pemegang_saham_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy perijinan usaha yang berlaku dan sesuai yang dipersyaratkan oleh pemberi kerja</label>
                                        <div class="col-lg-12">
                                            <input id="perijinan_dp" name="perijinan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>




                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                                        <div class="col-lg-12">
                                            <input id="pengalaman_kerja_dp" name="pengalaman_kerja_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Laporan Keuangan</label>
                                        <div class="col-lg-12">
                                            <input id="laporan_keuangan_dp" name="laporan_keuangan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-left text-success">Dokumen Agunan</h2>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Ideb SLIK</label>
                                        <div class="col-lg-12">
                                            <input id="ideb_slik_dp" name="ideb_slik_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) pemilik agunan</label>
                                        <div class="col-lg-12">
                                            <input id="agunan_diserahkan_dp" name="agunan_diserahkan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>





                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                                        <div class="col-lg-12">
                                            <input id="ktp_agunan_dp" name="ktp_agunan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                                        <div class="col-lg-12">
                                            <input id="kk_agunan_dp" name="kk_agunan_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>




                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                                        <div class="col-lg-12">
                                            <input id="akta_nikah_dp" name="akta_nikah_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-left text-success">Track Record</h2>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                                        <div class="col-lg-12">
                                            <input id="dhn_dp" name="dhn_dp" type="file" placeholder="" class="form-control class-readonly">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Ideb SLIK</label>
                                        <div class="col-lg-12">
                                            <input id="ideb_slik_dp" name="ideb_slik_dp" type="file" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </fieldset>
                        <h1>Scoring</h1>
                        <fieldset>
                            <h2>Scoring</h2>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Nama Pemohon</label>
                                        <div class="col-lg-12">
                                            <input id="nama_pemohon_sc" name="nama_pemohon_sc" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Alamat</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="alamat_sc" name="alamat_sc" rows="3"></textarea>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Plafond</label>
                                        <div class="col-lg-12">
                                            <input id="plafond_sc" name="plafond_sc" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tujuan</label>
                                        <div class="col-lg-12">
                                            <input id="tujuan_sc" name="tujuan_sc" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">No PAK</label>
                                        <div class="col-lg-12">
                                            <input id="no_pak" name="no_pak" type="text" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">1. PENDIRIAN BADAN USAHA</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="pendirian_sc" name="pendirian_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Usaha baru berjalan 0 s/d 6 bulan</option>
                                                <option value="b">(b) Usaha berjalan lebih dari 6 bulan s/d 1 tahun</option>
                                                <option value="c">(c) Usaha berjalan lebih dari 1 tahun s/d 2 tahun</option>
                                                <option value="d">(d) Usaha berjalan lebih dari 2 tahun s/d 5 tahun</option>
                                                <option value="e">(e) Usaha berjalan lebih dari 5 tahun</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">2. LEGALITAS</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="legalitas_sc" name="legalitas_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Dokumen legalitas tidak lengkap dan tidak ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                                                <option value="b">(b) Dokumen legalitas tidak lengkap namun ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                                                <option value="c">(c) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan belum dilakukan perpanjangan.</option>
                                                <option value="d">(d) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan ada surat keterangan masih dalam proses dari instansi berwenang.</option>
                                                <option value="e">(e) Dokumen legalitas lengkap sesuai dengan ketentuan yang berlaku.</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">3. HUBUNGAN DENGAN PERBANKAN (FUNDING)</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="hubungan_sc" name="hubungan_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Belum atau sudah menjadi nasabah Bank Kalsel selama 0 s.d 3 bulan</option>
                                                <option value="b">(b) Sudah menjadi nasabah Bank Kalsel selama 3 bulan s.d 1 tahun</option>
                                                <option value="c">(c) Sudah menjadi nasabah Bank Kalsel selama > 1 s.d 3 tahun</option>
                                                <option value="d">(d) Sudah menjadi nasabah Bank Kalsel selama > 3 s.d 5 tahun</option>
                                                <option value="e">(e) Sudah menjadi nasabah Bank Kalsel selama > 5 tahun</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">4. PENGELOLAAN MANAJEMEN USAHA</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="pengelolaan_sc" name="pengelolaan_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Belum ada struktur organisasi dan tidak ada pembagian tugas secara jelas</option>
                                                <option value="b">(b) Sudah ada terdapat struktur organisasi namun tidak ada pembagian tugas</option>
                                                <option value="c">(c) Terdapat struktur organisasi dan pembagian tugas sesuai dengan bidangnya.</option>
                                            </select>


                                        </div>
                                    </div>



                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">5. JENIS AGUNAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="jenis_agunan_sc" name="jenis_agunan_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Personal / Corporate Guarantee</option>
                                                <option value="b">(b) Bergerak</option>
                                                <option value="c">(c) Kombinasi barang tidak bergerak dan barang bergerak</option>
                                                <option value="d">(d) Tidak Bergerak</option>
                                                <option value="e">(e) Agunan Tunai</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">6. BUKTI KEPEMILIKAN AGUNAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="bukti_sc" name="bukti_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Akta notarial personal / corporate guarantee</option>
                                                <option value="b">(b) BPKB / Gross Akta / Invoice</option>
                                                <option value="c">(c) Kombinasi Bukti Kepemilikan Agunan Bergerak & Agunan Tidak Bergerak</option>
                                                <option value="d">(d) SHM / SHGB / SHGU / SHMRS / SHP</option>
                                                <option value="e">(e) Tabungan / Bilyet Deposito / Giro</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">7. STATUS KEPEMILIKAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="status_sc" name="status_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Atas nama pihak ketiga (diluar keluarga owner atau pengurus perusahaan sampai dengan derajat pertama)</option>
                                                <option value="b">(b) Atas nama keluarga owner atau pengurus perusahaan sampai dengan derajat pertama (termasuk mertua, menantu dan ipar)</option>
                                                <option value="c">(c) Atas nama owner atau pengurus perusahaan</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">8. MARKETABLE AGUNAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="marketable_sc" name="marketable_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Agunan Tidak Bergerak: Kurang Marketable (jarak > 2 km s.d 5 km dari pusat bisnis/pasar utama di daerah tsb ; Agunan Bergerak : Tidak Mudah Dijual (contoh: Kapal, Alat Berat atau yang dipersamakan dengan itu)</option>
                                                <option value="b">(b) Agunan Tidak Bergerak : Marketable (jarak s.d 2 Km dari pusat bisnis/pasar utama di daerah tsb) ; Agunan Bergerak : Mudah Dijual (contoh: Kendaraan bermotor, uang tunai atau yang dipersamakan dengan itu)</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">9. HUBUNGAN DENGAN PERBANKAN (LENDING)</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="lending_sc" name="lending_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Debitur dengan kolektibilitas 2,3, 4, 5, atau hapus buku dan atau pernah NPL namun telah lunas.</option>
                                                <option value="b">(b) Merupakan debitur baru tanpa track record (history)</option>
                                                <option value="c">(c) Pernah / sedang menikmati fasilitas kredit dengan kategori kolektibilitas 1 namun pernah / sedang dalam kategori restrukturisasi</option>
                                                <option value="d">(d) Pernah / sedang menikmati fasilitas kredit dari lembaga keuangan diluar Bank Kalsel kolektibilitas 1</option>
                                                <option value="e">(e) Telah menjadi nasabah Bank Kalsel dan sedang menikmati fasilitas kredit minimal 1 tahun dengan track record kolektibilitas 1</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">10. PENGALAMAN MENGERJAKAN PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="pengalaman_sc" name="pengalaman_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Pemohon belum memiliki pengalaman melaksanakan pekerjaan proyek serupa.</option>
                                                <option value="b">(b) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 1 x.</option>
                                                <option value="c">(c) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 2 s.d 3x.</option>
                                                <option value="d">(d) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 3 - 5x</option>
                                                <option value="e">(e) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak >5 x.</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">11. SUMBER DANA PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="sumber_dana_sc" name="sumber_dana_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Swasta Bonafid dan belum bekerjasama dengan Bank Kalsel</option>
                                                <option value="b">(b) Swasta Bonafid dan telah bekerjasama dengan Bank Kalsel</option>
                                                <option value="c">(c) BUMN / BUMD</option>
                                                <option value="d">(d) APBN</option>
                                                <option value="e">(e) APBD</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">12. LOKASI PROYEK / PEKERJAAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="lokasi_sc" name="lokasi_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Berada di lokasi yang tidak dapat diakses dengan alat transportasi umum / khusus.</option>
                                                <option value="b">(b) Berada di lokasi yang hanya dapat diakses dengan alat transportasi khusus.</option>
                                                <option value="c">(c) Berlokasi jauh dari pusat kota, namun dengan mudah dapat diakses menggunakan alat transportasi umum dan khusus.</option>
                                                <option value="d">(d) Berlokasi tidak jauh dari pusat kota.</option>
                                                <option value="e">(e) Berlokasi di pusat kota.</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">13. JENIS PROYEK / PEKERJAAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="jenis_proyek_sc" name="jenis_proyek_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Jasa Konstruksi (Bangunan, Jalan, Jembatan, Irigasi, Drainase, dsb)</option>
                                                <option value="b">(b) Pengadaan Barang</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">14. BAHAN BAKU PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="bahan_baku_sc" name="bahan_baku_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon belum memiliki surat dukungan dari suplier dimaksud.</option>
                                                <option value="b">(b) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon telah melampirkan surat dukungan dari suplier dimaksud.</option>
                                                <option value="c">(c) Proyek pekerjaan yang membutuhkan bahan baku khusus yang dapat diproduksi sendiri oleh Pemohon.</option>
                                                <option value="d">(d) Proyek pekerjaan yang membutuhkan bahan baku khusus dari suplier tertentu, namun kebutuhan akan bahan baku tersebut telah tersedia di lokasi proyek/workshop Pemohon.</option>
                                                <option value="e">(e) Proyek pekerjaan yang hanya memerlukan bahan baku umum yang dapat diperoleh dengan mudah.</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">15. PERALATAN YANG DIGUNAKAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="peralatan_sc" name="peralatan_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan.</option>
                                                <option value="b">(b) Proyek pekerjaan yang dalam pelaksanaannya memerlukan peralatan kerja khusus dan Pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan. Namun fungsi peralatan kerja tersebut dapat digantikan dengan peralatan kerja sederhana dengan dukungan tenaga kerja dalam jumlah tertentu.</option>
                                                <option value="c">(c) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon telah melampirkan perjanjian sewa peralatan kerja yang dibutuhkan dari pihak ke-3</option>
                                                <option value="d">(d) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus yang telah dimiliki Pemohon.</option>
                                                <option value="e">(e) Proyek pekerjaan yang dalam pelaksanaannya hanya memerlukan peralatan kerja sederhana.</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">16. PEMBAYARAN TERMIJN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="pembayaran_sc" name="pembayaran_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing dan Standing Instruction.</option>
                                                <option value="b">(b) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing, namun sudah dilengkapi dengan Standing Instruction.</option>
                                                <option value="c">(c) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel yang tertuang di dalam kontrak / terdapat Bank Clearing yang telah ditandatangani oleh Pejabat Pembuat Komitmen dan Bendahara Proyek/Pekerjaan yang diberikan pembiayaan.</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">17. DASAR PENUNJUKAN PEKERJAAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="dasar_penunjukan_sc" name="dasar_penunjukan_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Pengumuman LPSE dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                                                <option value="b">(b) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                                                <option value="c">(c) Pengumuman LPSE dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                                                <option value="d">(d) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                                                <option value="e">(e) Surat Perjanjian Kerja (SPK) / Kontrak yang telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">18. PROSENTASE PLAFOND KREDIT TERHADAP NILAI PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="prosentase_sc" name="prosentase_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) > 70%</option>
                                                <option value="b">(b) > 60% s.d 70%</option>
                                                <option value="c">(c) > 40% s.d 60%</option>
                                                <option value="d">(d) > 20% s.d 40%</option>
                                                <option value="e">(e) ≤ 20%</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">19. JANGKA WAKTU PELAKSANAAN PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="jangka_sc" name="jangka_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) > 1 tahun (multi years)</option>
                                                <option value="b">(b) > 6 s.d 12 bulan</option>
                                                <option value="c">(c) ≤ 6 bulan</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">20. PROSENTASE AGUNAN TAMBAHAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="agunan_sc" name="agunan_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) 30% s.d 40%</option>
                                                <option value="b">(b) > 40% s.d 50%</option>
                                                <option value="c">(c) > 50% s.d 75%</option>
                                                <option value="d">(d) > 75% s.d 100%</option>
                                                <option value="e">(e) > 100%</option>
                                            </select>


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">21. PENJAMINAN MASKAPAI ASURANSI</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="penjaminan_sc" name="penjaminan_sc">
                                                <option value="" selected="" disabled="">pilih</option>
                                                <option value="a">(a) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan dan terdapat izin deviasi agunan dibawah ketentuan yang berlaku.</option>
                                                <option value="b">(b) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit hanya sebesar < 75,00% dari plafond kredit/pembiayaan.</option>
                                                <option value="c">(c) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit sesuai dengan ketentuan bank teknis yang berlaku (atau < 100%).</option>
                                                <option value="d">(d) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Case by Case).</option>
                                                <option value="e">(e) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Automatic Cover).</option>

                                            </select>
                                            <table class="table-responsive" border="0">
                                                <tr>
                                                    <td>
                                                        <h3>Hasil Scoring</h3>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <h3 id="hasil_scoring" class="text-danger">0</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Keterangan</h3>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <h3 id="ket_hasil" class="text-danger">Reject</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><small>Note: Passing Grade > 325</small></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>


                                        </div>
                                    </div>




                                </div>


                            </div>






                        </fieldset>
                        <h1>Recap</h1>
                        <fieldset>
                            <h2>Recap</h2>
                            <table class="table table-responsive" border="0" width="100%">
                                <tr>
                                    <td>
                                        No
                                    </td>
                                    <td>
                                        Item
                                    </td>
                                    <td>
                                        Status
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Data Entry
                                    </td>
                                    <td>
                                        Oke / Not Oke
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        Formulir Call Report (FCR)
                                    </td>
                                    <td>
                                        Oke / Not Oke
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        Lampiran FCR - Usaha

                                    </td>
                                    <td>
                                        Oke / Not Oke
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        Lampiran FCR - Agunan


                                    </td>
                                    <td>
                                        Oke / Not Oke
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        Document Pendukung



                                    </td>
                                    <td>
                                        Oke / Not Oke
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        Scoring



                                    </td>
                                    <td>
                                        Oke / Not Oke
                                    </td>
                                </tr>

                            </table>


                            <div class="form-group">
                                <div class="row">


                                    <div class="col-lg-12">
                                        <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Pemasar</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="disposisi_sc" name="disposisi_sc" rows="3"></textarea>
                                        </div>
                                    </div>


                                </div>


                            </div>


                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_dokumen_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="form_dokumen_edit" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Dokumen</h1>
                    </div>
                    <br>

                    <div class="form-group row">
                        <input id="kd_data_edit" name="kd_data_edit" type="hidden" placeholder="" class="form-control class-readonly">

                        <div class="col-lg-12">
                            <label class="col-lg-12 control-label">Upload Dokumen Kontrak Proyek</label>
                            <div class="col-lg-12">
                                <input type="file" class="form-control form-control-file" name="upload_dokumen_edit" id="upload_dokumen_edit" accept=".pdf">
                                <small class="form-text text-muted">File PDF, maksimal 2 MB</small>

                            </div>
                        </div>

                    </div>

                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btns_921" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- Steps -->
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.min.js"></script>
<!-- Steps fix js -->
<script src="<?= base_url(); ?>public/assets/js/plugins/steps/jquery.steps.fix.js"></script>
<!-- debonce js -->
<!-- <script src="<?= base_url(); ?>public/assets/js/plugins/debonce/jquery.ba-throttle-debounce.js"></script> -->

<!-- Jquery Validate -->
<script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>

<script>
    $(document).ready(function() {

        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onInit: function(event, currentIndex) {
                // resizeJquerySteps();
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                // resizeJquerySteps();
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                // if (newIndex === 3 && Number($("#age").val()) < 18) {
                //     return false;
                // }

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
                // resizeJquerySteps();
                if (currentIndex == 0) {
                    tampil_button('save_data_entry')
                } else if (currentIndex == 1) {
                    tampil_button('save_fcr')
                } else if (currentIndex == 2) {
                    tampil_button('save_fcr_usaha')
                } else if (currentIndex == 3) {
                    tampil_button('save_fcr_agunan')
                } else if (currentIndex == 4) {
                    tampil_button('save_dokumen')
                } else if (currentIndex == 5) {
                    tampil_button('save_scoring')
                } else if (currentIndex == 6) {
                    tampil_button('save_recap')
                } else {
                    tampil_button('save_data_entry')
                }

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

        var save_data_entry = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_data_entry" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_data_entry);
        var save_fcr = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr);
        var save_fcr_usaha = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr_usaha" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr_usaha);
        var save_fcr_agunan = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr_agunan" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr_agunan);
        var save_dokumen = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_dokumen" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_dokumen);
        var save_scoring = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_scoring" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_scoring);
        var save_recap = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_recap" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_recap);

        // Format mata uang dengan jquery mask.
        $('.uang').mask('000,000,000,000,000,000,000,000', {
            reverse: true
        });
        $("#jumlah_agunan_tambah").on("change", function() {
            tambahInput()
        });
        $("#lihat_file").on("click", function() {
            lihatFile()
        });
        $("#edit_file").on("click", function() {
            editFile()
        });
        // memberi nilai awal edit Data Entry

        // panggil function
        refresh('save_data_entry')

        // bikin function
        function pemroses() {
            variabelGlobal(function(hasil) {
                // console.log(hasil.message.data_entry.kd_data);
                if (hasil.status == 'success') {
                    var data = hasil.message.data_entry;
                    // alert(data.kd_data)
                    unit_kerja()
                    $('#kd_data_tambah').val(data.kd_data);

                    $('#pemasar_tambah').val(data.pemasar);
                    $('#koordinator_pemasar_tambah').val(data.koordinator_pemasar);
                    $('#kepala_cabang_tambah').val(data.kepala_cabang);
                    $('#kepala_bagian_tambah').val(data.kepala_bagian);
                    $('#kepala_divisi_tambah').val(data.kepala_divisi);

                    $('#nama_debitur_tambah').val(data.nama_debitur);
                    $('#bidang_usaha_tambah').val(data.bidang_usaha);
                    $('#nama_direktur_tambah').val(data.nama_direktur);
                    $('#key_person_tambah').val(data.key_person);
                    $('#alamat_kantor_tambah').val(data.alamat_kantor);
                    $('#alamat_gudang_tambah').val(data.alamat_gudang);
                    $('#group_debitur_tambah').val(data.group_debitur);

                    $('#nama_proyek_tambah').val(data.nama_proyek);
                    $('#nomor_spk_tambah').val(data.nomor_spk);
                    $('#tanggal_spk_tambah').val(data.tanggal_spk);
                    $('#nilai_proyek_tambah').val(data.nilai_proyek);
                    $('#alamat_proyek_tambah').val(data.alamat_proyek);
                    $('#pemberi_kerja_tambah').val(data.pemberi_kerja);
                    $('#penandatangan_kontrak_tambah').val(data.penandatangan_kontrak);
                    $('#alamat_pemberi_tambah').val(data.alamat_pemberi_kerja);
                    $('#status_tambah').val(hasil.message.data_master.status);

                    $('#tanggal_permohonan_tambah').val(data.tanggal_permohonan);
                    $('#plafond_tambah').val(data.plafond);
                    $('#tujuan_pengajuan_tambah').val(data.tujuan_pengajuan);
                    $('#jumlah_agunan_tambah').val(data.jumlah_agunan);

                } else {
                    alert(hasil.message)

                }


            });
        }

        function unit_kerja() {
            variabelGlobal(function(hasil) {
                if (hasil.status == 'success') {
                    var kd_unit = hasil.message.data_entry.kd_unit_kerja;
                    console.log(kd_unit);
                    $.ajax({
                        url: "<?php echo base_url('unit_kerja/get_unit'); ?>",
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            var options = data.unit;
                            var select = $('#unit_kerja_tambah');

                            select.empty();
                            // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                            var defaultOption = new Option('Pilih', '', true, true);
                            $(defaultOption).prop('disabled', true);
                            select.append(defaultOption);

                            $.each(options, function(index, option) {
                                var newOption = new Option(option.kd_unit + ' - ' + option.nama_unit, option.kd_unit, false, false);
                                if (option.kd_unit === kd_unit) {
                                    $(newOption).prop('selected', true);
                                }
                                select.append(newOption);
                            });

                            select.select2({
                                placeholder: 'Pilih',
                                dropdownParent: $('#unit_kerja_tambah').parent()
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("Error get data");
                        }
                    });

                } else {
                    alert(hasil.message)
                }

            });
        }
        // agunan dinamis
        function tambahInput() {
            variabelGlobal(function(hasil) {
                if (hasil.status == 'success') {
                    var jumlah = document.getElementById("jumlah_agunan_tambah").value;
                    if (jumlah == null || jumlah == '' || jumlah == undefined) {
                        var jumlah = hasil.message.data_entry.jumlah_agunan
                    }
                    var inputAgunan = document.getElementById("input_agunan_tambah");
                    // alert(jumlah)
                    inputAgunan.innerHTML = ''; // Reset inputan

                    // Konversi array menjadi JSON
                    // var jsArray = JSON.stringify(hasil.message.jenis_agu);
                    var jsArray = hasil.message.jenis_agu;

                    // Menghitung jumlah elemen dalam array
                    var jumlahElemen = hasil.message.jenis_agu.length;

                    for (var i = 0; i < jumlah; i++) {
                        var inputGroup = document.createElement("div");
                        inputGroup.classList.add("form-group");
                        inputGroup.classList.add("col-lg-12");

                        var label = document.createElement("label");
                        label.className = "col-lg-12 control-label";
                        label.innerHTML = "Jenis Agunan " + (i + 1);

                        var input = document.createElement("input");
                        input.type = "text";
                        input.name = "jenis_agunan_tambah[]";
                        input.id = "jenis_agunan_tambah" + i;
                        input.classList.add("form-control");
                        input.classList.add("text-dark");
                        input.placeholder = "Tanah dan Bangunan/ Tanah Kosong/ Kendaraan/ Alat Berat/ Tunai/ Penjaminan/ Dokumen Lainnya";
                        // Set nilai input dari array PHP

                        if (jsArray[i] != undefined) {
                            input.value = jsArray[i]
                        } else {
                            input.value = '';
                        }

                        inputGroup.appendChild(label);
                        inputGroup.appendChild(input);
                        inputAgunan.appendChild(inputGroup);
                    }
                    // resizeJquerySteps();
                } else {
                    alert(hasil.message)
                }
            })
        }
        // batas agunan dinamis
        function tampil_button(param) {
            if (param == 'save_data_entry') {
                $('#save_data_entry').show();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();

            } else if (param == 'save_fcr') {
                $('#save_data_entry').hide();
                $('#save_fcr').show();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();

            } else if (param == 'save_fcr_usaha') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').show();
                $('#save_fcr_agunan').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
            } else if (param == 'save_fcr_agunan') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan').show();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
            } else if (param == 'save_dokumen') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan').hide();
                $('#save_dokumen').show();
                $('#save_scoring').hide();
                $('#save_recap').hide();
            } else if (param == 'save_scoring') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').show();
                $('#save_recap').hide();
            } else if (param == 'save_recap') {
                $('#save_data_entry').hide();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').show();
            } else {
                $('#save_data_entry').show();
                $('#save_fcr').hide();
                $('#save_fcr_usaha').hide();
                $('#save_fcr_agunan').hide();
                $('#save_dokumen').hide();
                $('#save_scoring').hide();
                $('#save_recap').hide();
            }

        }

        function refresh(param) {
            pemroses()
            tambahInput()
            if (param == 'save_data_entry') {
                tampil_button('save_data_entry')
            } else if (param == 'save_fcr') {
                tampil_button('save_fcr')
            } else if (param == 'save_fcr_usaha') {
                tampil_button('save_fcr_usaha')
            } else if (param == 'save_fcr_agunan') {
                tampil_button('save_fcr_agunan')
            } else if (param == 'save_dokumen') {
                tampil_button('save_dokumen')
            } else if (param == 'save_scoring') {
                tampil_button('save_scoring')
            } else if (param == 'save_recap') {
                tampil_button('save_recap')
            } else {
                tampil_button('save_data_entry')
            }
        }

        function getJenisAgunan() {
            var jumlah = document.getElementById("jumlah_agunan_tambah").value;
            var jenis_agunan = ''; // Inisialisasi string kosong untuk menyimpan hasil

            for (var i = 0; i < jumlah; i++) {
                var currentVal = $('#jenis_agunan_tambah' + i).val();
                if (currentVal == '') {
                    return 'cpa123';
                }

                // Tambahkan nilai saat ini ke dalam string jenis_agunan
                jenis_agunan += currentVal;

                // Tambahkan tanda titik koma jika ini bukan nilai terakhir
                if (i < jumlah - 1) {
                    jenis_agunan += ';';
                }
            }

            return jenis_agunan;
        }

        function lihatFile() {
            // Ambil nilai kd_data dari $data_entry
            var kd_data = "<?php echo sha1($data_entry->kd_data) ?>";

            // Bangun URL dengan base_url dan kd_data
            var url = "<?php echo base_url() ?>dokumen-kontrak-proyek/" + kd_data;

            // Buka tautan dalam tab baru
            window.open(url, '_blank');
        }

        function editFile() {
            document.getElementById("form_dokumen_edit").reset();
            variabelGlobal(function(hasil) {
                // console.log(hasil.message.data_entry.kd_data);
                if (hasil.status == 'success') {
                    var data = hasil.message.data_entry;
                    // alert(data.kd_data)
                    $('#kd_data_edit').val(data.kd_data);
                    $("#modal_dokumen_edit").modal('show')
                } else {
                    alert(hasil.message)

                }
            });
        }

        function variabelGlobal(callback) {
            var kirim = {
                kd_data: '<?php echo sha1($data_entry->kd_data) ?>'
            };

            $.ajax({
                url: "<?php echo base_url() ?>pengajuan/getGlobal",
                type: "POST",
                data: kirim,
                dataType: "JSON",
                success: function(response) {
                    var hasil = {
                        status: 'success',
                        message: response
                    };
                    callback(hasil); // Panggil callback dengan hasil yang diperoleh
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var hasil = {
                        status: 'error',
                        message: 'gagal mendapatkan data'
                    };
                    callback(hasil); // Panggil callback dengan hasil yang diperoleh
                }
            });
        }

        // simpan data entry
        $('#save_data_entry').click(function(e) {
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            var kumpulan_agunan = getJenisAgunan();
            if (kumpulan_agunan != 'cpa123') {
                // Mendefinisikan array untuk menyimpan nilai input
                var data = {
                    kd_data_tambah: $('#kd_data_tambah').val(),

                    unit_kerja_tambah: $('#unit_kerja_tambah').val(),
                    pemasar_tambah: $('#pemasar_tambah').val(),
                    koordinator_pemasar_tambah: $('#koordinator_pemasar_tambah').val(),
                    kepala_cabang_tambah: $('#kepala_cabang_tambah').val(),
                    kepala_bagian_tambah: $('#kepala_bagian_tambah').val(),
                    kepala_divisi_tambah: $('#kepala_divisi_tambah').val(),

                    nama_debitur_tambah: $('#nama_debitur_tambah').val(),
                    bidang_usaha_tambah: $('#bidang_usaha_tambah').val(),
                    nama_direktur_tambah: $('#nama_direktur_tambah').val(),
                    key_person_tambah: $('#key_person_tambah').val(),
                    alamat_kantor_tambah: $('#alamat_kantor_tambah').val(),
                    alamat_gudang_tambah: $('#alamat_gudang_tambah').val(),
                    group_debitur_tambah: $('#group_debitur_tambah').val(),

                    nama_proyek_tambah: $('#nama_proyek_tambah').val(),
                    nomor_spk_tambah: $('#nomor_spk_tambah').val(),
                    tanggal_spk_tambah: $('#tanggal_spk_tambah').val(),
                    nilai_proyek_tambah: $('#nilai_proyek_tambah').val(),
                    alamat_proyek_tambah: $('#alamat_proyek_tambah').val(),
                    pemberi_kerja_tambah: $('#pemberi_kerja_tambah').val(),
                    penandatangan_kontrak_tambah: $('#penandatangan_kontrak_tambah').val(),
                    alamat_pemberi_tambah: $('#alamat_pemberi_tambah').val(),
                    status_tambah: $('#status_tambah').val(),

                    tanggal_permohonan_tambah: $('#tanggal_permohonan_tambah').val(),
                    plafond_tambah: $('#plafond_tambah').val(),
                    tujuan_pengajuan_tambah: $('#tujuan_pengajuan_tambah').val(),
                    jumlah_agunan_tambah: $('#jumlah_agunan_tambah').val(),
                    jenis_agunan_tambah: kumpulan_agunan,

                    // upload dokumen
                };
                // alert(data.jenis_agunan_tambah)

                // Mengirim data menggunakan AJAX
                $.ajax({
                    url: '<?php echo base_url('pengajuan/edit_data_entry'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#mohon').hide()
                            refresh('save_data_entry')
                            toastr.success(response.message, 'Berhasil')
                        } else {
                            $('#mohon').hide()
                            toastr.warning(response.message, 'Gagal')
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#mohon').hide()
                        console.log(xhr.responseText)
                        toastr.error('Edit data entry gagal', 'Error')
                    }
                });
            } else {
                $('#mohon').hide()
                toastr.warning('Jenis agunan harus diisi', 'Gagal')
            }
        });
        // edit file
        $('#form_dokumen_edit').on('submit', function(e) {
            e.preventDefault();
            $('#mohon').show()
            $.ajax({
                url: "<?php echo base_url('pengajuan/edit_file'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data == '1') {
                        $("#modal_dokumen_edit").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Dokumen Berhasil', 'Berhasil')
                        refresh('save_data_entry')
                    } else {
                        $('#mohon').hide()
                        toastr.warning(data, 'Gagal')
                    }
                },
                error: function(data) {
                    console.log(data);
                }

            });
        });

    });
</script>

<?= $this->endSection(); ?>