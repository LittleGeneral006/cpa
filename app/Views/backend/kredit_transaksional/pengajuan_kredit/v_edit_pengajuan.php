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
                        Proses Pengajuan Kredit Transaksional
                    </h2>
                    <p>
                        Silakan isi form di bawah ini untuk memproses Pengajuan Kredit Transaksional
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
                                            <select class="form-control class-disabled select" id="unit_kerja_tambah" name="unit_kerja_tambah" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Pemasar</label>
                                        <div class="col-lg-12">
                                            <input id="pemasar_tambah" name="pemasar_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>
                                            <input id="kd_data_tambah" name="kd_data_tambah" placeholder="" hidden class="form-control class-readonly">


                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Koordinator Pemasar</label>
                                    <div class="col-lg-12">
                                        <input id="koordinator_pemasar_tambah" name="koordinator_pemasar_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Cabang</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_cabang_tambah" name="kepala_cabang_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Bagian</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_bagian_tambah" name="kepala_bagian_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Kepala Divisi</label>
                                    <div class="col-lg-12">
                                        <input id="kepala_divisi_tambah" name="kepala_divisi_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>



                            </div>
                            <h2 class="text-center text-danger">Data Debitur</h2>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_debitur_tambah" name="nama_debitur_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Bidang Usaha</label>
                                    <div class="col-lg-12">
                                        <input id="bidang_usaha_tambah" name="bidang_usaha_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Direktur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_direktur_tambah" name="nama_direktur_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Key Person</label>
                                    <div class="col-lg-12">
                                        <input id="key_person_tambah" name="key_person_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Kantor</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_kantor_tambah" name="alamat_kantor_tambah" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Gudang/ Pabrik/ Workshop</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_gudang_tambah" name="alamat_gudang_tambah" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Group Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="group_debitur_tambah" name="group_debitur_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>




                            </div>
                            <h2 class="text-center text-danger">Data Proyek</h2>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nama_proyek_tambah" name="nama_proyek_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nomor SPK/ SPPBJ/ Gunning/ Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="nomor_spk_tambah" name="nomor_spk_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal SPK/ SPPBJ/ Gunning/ Kontrak</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_spk_tambah" name="tanggal_spk_tambah" type="date" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nilai Proyek</label>
                                    <div class="col-lg-12">
                                        <input id="nilai_proyek_tambah" name="nilai_proyek_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Proyek</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_proyek_tambah" name="alamat_proyek_tambah" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Pemberi Kerja (Bouwheer)</label>
                                    <div class="col-lg-12">
                                        <input id="pemberi_kerja_tambah" name="pemberi_kerja_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Penandatangan Kontrak (Bouwheer)</label>
                                    <div class="col-lg-12">
                                        <input id="penandatangan_kontrak_tambah" name="penandatangan_kontrak_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Pemberi Kerja</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="alamat_pemberi_tambah" name="alamat_pemberi_tambah" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

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
                                            <input id="edit_file" value="Edit Dokumen" name="edit_file" type="button" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <?php
                                $found = false;
                                foreach ($permission as $list_nama) {
                                    if ($list_nama->nama_permission == 'Edit Status Pengajuan Kredit Transaksional') {
                                        $found = true;
                                        break;
                                    }
                                }
                                ?>

                                <?php if ($found) { ?>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Status</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" required id="status_tambah" name="status_tambah">
                                                <option value="" disabled="">pilih</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Status</label>
                                        <div class="col-lg-12">
                                            <input id="status_tambah" name="status_tambah" type="text" placeholder="" class="form-control" readonly required>
                                        </div>
                                    </div>
                                <?php } ?>



                            </div>
                            <h2 class="text-center text-danger">Pengajuan Kredit</h2>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal Permohonan</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_permohonan_tambah" name="tanggal_permohonan_tambah" type="date" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Plafond</label>
                                    <div class="col-lg-12">
                                        <input id="plafond_tambah" name="plafond_tambah" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>
                                    </div>
                                </div>




                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tujuan Pengajuan</label>
                                    <div class="col-lg-12">
                                        <input id="tujuan_pengajuan_tambah" name="tujuan_pengajuan_tambah" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="jumlah_agunan_tambah" class="col-lg-12 control-label">Jumlah Agunan:</label>
                                    <div class="">
                                        <div class="col-lg-12">
                                            <select name="jumlah_agunan_tambah" id="jumlah_agunan_tambah" class="form-control" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
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
                                            <input id="nomor_edit" name="nomor_edit" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tanggal</label>
                                        <div class="col-lg-12">
                                            <input id="tanggal_edit" readonly name="tanggal_edit" type="date" placeholder="" class="form-control class-readonly">

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Nama Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="nama_debitur_edit" readonly name="nama_debitur_edit" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Kantor</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" readonly id="alamat_kantor_edit" name="alamat_kantor_edit" rows="3"></textarea>

                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Alamat Gudang/ Pabrik/ Workshop</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" readonly id="alamat_gudang_edit" name="alamat_gudang_edit" rows="3"></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Group Debitur</label>
                                    <div class="col-lg-12">
                                        <input id="group_debitur_edit" readonly name="group_debitur_edit" type="text" placeholder="" class="form-control class-readonly">

                                    </div>
                                </div>



                            </div>

                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Contact Person</label>

                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="contact_person_edit" name="contact_person_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                                        <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Abdullah;Fitriani;Ahmad Rossy</p>
                                    </div>


                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Yang Melaksanakan Kunjungan</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="kunjungan_edit" name="kunjungan_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                                        <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Abdullah;Fitriani;Ahmad Rossy</p>


                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Unit Kerja</label>
                                    <div class="col-lg-12">
                                        <select class="form-control class-disabled select" id="kd_unit_kerja_edit" name="kd_unit_kerja_edit" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tanggal Kunjungan</label>
                                    <div class="col-lg-12">
                                        <input id="tanggal_kunjungan_edit" name="tanggal_kunjungan_edit" type="date" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">



                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Lokasi Yang Dikunjungi</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="lokasi_edit" name="lokasi_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                                        <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Lokasi;Lokasi B;Lokasi C</p>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tujuan Kunjungan</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="tujuan_kunjungan_edit" name="tujuan_kunjungan_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

                                    </div>
                                </div>



                            </div>
                            <div class="form-group row">



                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Hasil Kunjungan</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="hasil_kunjungan_edit" name="hasil_kunjungan_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Tindak Lanjut</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="tindak_lanjut_edit" name="tindak_lanjut_edit" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

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
                                            <input id="kondisi_fisik_kantor" name="kondisi_fisik_kantor" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Tanah</label>
                                        <div class="col-lg-12">
                                            <input id="luas_tanah_kantor" name="luas_tanah_kantor" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Bangunan</label>
                                        <div class="col-lg-12">
                                            <input id="luas_bangunan_kantor" name="luas_bangunan_kantor" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fasilitas/ Sarana</label>
                                        <div class="col-lg-12">
                                            <input id="fasilitas_kantor" name="fasilitas_kantor" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lokasi</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="lokasi_kantor" name="lokasi_kantor" rows="3" readonly></textarea>

                                        </div>
                                    </div>


                                </div>
                                <h2 class="text-center text-danger">Spesifikasi dan Kondisi Bangunan (Workshop)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi Fisik</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_fisik_workshop" name="kondisi_fisik_workshop" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Tanah</label>
                                        <div class="col-lg-12">
                                            <input id="luas_tanah_workshop" name="luas_tanah_workshop" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Bangunan</label>
                                        <div class="col-lg-12">
                                            <input id="luas_bangunan_workshop" name="luas_bangunan_workshop" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fasilitas/ Sarana</label>
                                        <div class="col-lg-12">
                                            <input id="fasilitas_workshop" name="fasilitas_workshop" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lokasi</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="lokasi_workshop" name="lokasi_workshop" rows="3" readonly></textarea>

                                        </div>
                                    </div>


                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Mesin & Peralatan Pabrik/ Kerja (Mesin-Mesin Kerja)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi Mesin Utama</label>
                                        <div class="col-lg-12">
                                            <input id="mesin_utama_m" name="mesin_utama_m" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi Mesin Penunjang</label>
                                        <div class="col-lg-12">
                                            <input id="mesin_penunjang_m" name="mesin_penunjang_m" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_m" name="kondisi_m" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kapasitas Mesin</label>
                                        <div class="col-lg-12">
                                            <input id="kapasitas_mesin_m" name="kapasitas_mesin_m" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Mesin & Peralatan Pabrik/ Kerja (Peralatan Kerja)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ Jenis Peralatan Utama</label>
                                        <div class="col-lg-12">
                                            <input id="peralatan_utama_p" name="peralatan_utama_p" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ jenis Peralatan Penunjang</label>
                                        <div class="col-lg-12">
                                            <input id="peralatan_penunjang_p" name="peralatan_penunjang_p" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_p" name="kondisi_p" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lainnya</label>
                                        <div class="col-lg-12">
                                            <input id="lainnya_p" name="lainnya_p" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Peralatan Berat/ Kendaraan (Alat Berat)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ Jenis</label>
                                        <div class="col-lg-12">
                                            <input id="fungsi_b" name="fungsi_b" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="merk_b" name="merk_b" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Jumlah</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_b" name="kondisi_b" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lain-lain</label>
                                        <div class="col-lg-12">
                                            <input id="lainnya_b" name="lainnya_b" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Peralatan Berat/ Kendaraan (Kendaraan)</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Fungsi/ Jenis</label>
                                        <div class="col-lg-12">
                                            <input id="fungsi_k" name="fungsi_k" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Merk/ Tahun Pembuatan</label>
                                        <div class="col-lg-12">
                                            <input id="merk_k" name="merk_k" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi/ Jumlah</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_k" name="kondisi_k" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lain-lain</label>
                                        <div class="col-lg-12">
                                            <input id="lainnya_k" name="lainnya_k" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <h2 class="text-center text-danger">Spesifikasi & Kondisi Proyek</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Lokasi</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="lokasi_sk" name="lokasi_sk" rows="3" readonly></textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Luas Lokasi/ Bangunan/ Fisik/ Proyek</label>
                                        <div class="col-lg-12">
                                            <input id="luas_lokasi_sk" name="luas_lokasi_sk" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Kondisi Fisik</label>
                                        <div class="col-lg-12">
                                            <input id="kondisi_fisik_sk" name="kondisi_fisik_sk" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>


                                </div>
                                <h2 class="text-center text-danger">Spesifikasi Jumlah & Kondisi Persediaan/ Stok</h2>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Bahan Baku/ Pembantu</label>
                                        <div class="col-lg-12">
                                            <input id="bahan_baku" name="bahan_baku" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Bahan Setengah Jadi</label>
                                        <div class="col-lg-12">
                                            <input id="bahan_setengah_jadi" name="bahan_setengah_jadi" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Persediaan Material</label>
                                        <div class="col-lg-12">
                                            <input id="persediaan_material" name="persediaan_material" type="number" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>


                                </div>



                            </div>





                        </fieldset>
                        <h1>Lampiran FCR Agunan</h1>
                        <fieldset>
                            <h2>Lampiran FCR Agunan</h2>
                            <div class="row">

                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-primary btn-tambah" id="btn_tambah_tanah" style="display:none" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i> Tanah</button>
                                    <button type="button" class="btn btn-primary btn-tambah" id="btn_tambah_bangunan" style="display:none" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i> Bangunan</button>
                                    <!-- <button type="button" class="btn btn-primary btn-tambah" id="btn_tambah_lingkungan" style="display:none"><i class="fa fa-plus"></i> Lingkungan</button> -->
                                    <button type="button" class="btn btn-primary btn-tambah" id="btn_tambah_barang_bergerak" style="display:none" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i> Barang Bergerak</button>

                                </div>

                            </div>

                            <div class="form-group">
                                <!-- agunan dinamis disini -->
                                <div id="tanah_dinamis">

                                </div>
                                <div id="bangunan_dinamis">

                                </div>
                                <div id="bb_dinamis">

                                </div>
                                <!-- agunan dinamis disini -->

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
                                            <input id="nama_nasabah_dp" name="nama_nasabah_dp" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Alamat</label>
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
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Jenis Badan Usaha</label>
                                    <div class="col-lg-12">
                                        <select class="form-control class-disabled select" required id="jenis_badan_usaha_dp" name="jenis_badan_usaha_dp" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                            <option value="" disabled="">pilih</option>
                                            <option value="Perseroan Perseorangan">Perseroan Perseorangan</option>
                                            <option value="Commanditaire Vennootschap">Commanditaire Vennootschap (CV)</option>
                                            <option value="Perseroan Terbatas">Perseroan Terbatas (PT)</option>
                                        </select>


                                    </div>
                                </div>


                            </div>
                            <div class="reset-dokumen">
                                <!-- perorangan -->
                                <div class="perorangan">
                                    <h2 class="text-left text-success">Persyaratan Dokumen</h2>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                                            <div class="col-lg-12">
                                                <input id="pengajuan_kredit1" name="pengajuan_kredit1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pengajuan_kredit1">Lihat Dokumen</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Pernyataan Pendirian Perseroan Perorangan</label>
                                            <div class="col-lg-12">
                                                <input id="pendirian_perseroan1" name="pendirian_perseroan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pendirian_perseroan1">Lihat Dokumen</button>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Sertifikat Pendaftaran Perseroan Perseorangan</label>
                                            <div class="col-lg-12">
                                                <input id="pendaftaran_perseroan1" name="pendaftaran_perseroan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pendaftaran_perseroan1">Lihat Dokumen</button>
                                                <!-- <input id="pendaftaran_perseroan1" name="pendaftaran_perseroan1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan Perorangan</label>
                                            <div class="col-lg-12">
                                                <input id="npwp1" name="npwp1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp1">Lihat Dokumen</button>
                                                <!-- <input id="npwp1" name="npwp1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_persero1" name="ktp_persero1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_persero1">Lihat Dokumen</button>
                                                <!-- <input id="ktp_persero1" name="ktp_persero1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Persero</label>
                                            <div class="col-lg-12">
                                                <input id="npwp_persero1" name="npwp_persero1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp_persero1">Lihat Dokumen</button>
                                                <!-- <input id="npwp_persero1" name="npwp_persero1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy perijinan usaha yang berlaku dan sesuai yang dipersyaratkan oleh pemberi kerja</label>
                                            <div class="col-lg-12">
                                                <input id="perijinan_usaha1" name="perijinan_usaha1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="perijinan_usaha1">Lihat Dokumen</button>
                                                <!-- <input id="perijinan_usaha1" name="perijinan_usaha1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                                            <div class="col-lg-12">
                                                <input id="pengalaman_kerja1" name="pengalaman_kerja1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pengalaman_kerja1">Lihat Dokumen</button>
                                                <!-- <input id="pengalaman_kerja1" name="pengalaman_kerja1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Laporan Keuangan</label>
                                            <div class="col-lg-12">
                                                <input id="laporan_keuangan1" name="laporan_keuangan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="laporan_keuangan1">Lihat Dokumen</button>
                                                <!-- <input id="laporan_keuangan1" name="laporan_keuangan1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                    <h2 class="text-left text-success">Dokumen Agunan</h2>

                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy dokumen agunan yang akan diserahkan disertai kelengkapannya</label>
                                            <div class="col-lg-12">
                                                <input id="copy_dok_agunan1" name="copy_dok_agunan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="copy_dok_agunan1">Lihat Dokumen</button>
                                                <!-- <input id="copy_dok_agunan1" name="copy_dok_agunan1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Ideb SLIK</label>
                                            <div class="col-lg-12">
                                                <input id="ideb_slik1" name="ideb_slik1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik1">Lihat Dokumen</button>
                                                <!-- <input id="ideb_slik1" name="ideb_slik1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_istri1" name="ktp_istri1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_istri1">Lihat Dokumen</button>
                                                <!-- <input id="ktp_istri1" name="ktp_istri1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                                            <div class="col-lg-12">
                                                <input id="kk_pemilik_agunan1" name="kk_pemilik_agunan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="kk_pemilik_agunan1">Lihat Dokumen</button>
                                                <!-- <input id="kk_pemilik_agunan1" name="kk_pemilik_agunan1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                                            <div class="col-lg-12">
                                                <input id="buku_nikah1" name="buku_nikah1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="buku_nikah1">Lihat Dokumen</button>
                                                <!-- <input id="buku_nikah1" name="buku_nikah1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                    <h2 class="text-left text-success">Track Record</h2>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                                            <div class="col-lg-12">
                                                <input id="dhn1" name="dhn1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="dhn1">Lihat Dokumen</button>
                                                <!-- <input id="dhn1" name="dhn1" type="file" placeholder="" class="form-control class-readonly"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Ideb SLIK</label>
                                            <div class="col-lg-12">
                                                <input id="ideb_slik_tr1" name="ideb_slik_tr1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik_tr1">Lihat Dokumen</button>
                                                <!-- <input id="ideb_slik_tr1" name="ideb_slik_tr1" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- buat cv -->
                                <div class="cv">
                                    <h2 class="text-left text-success">Persyaratan Dokumen</h2>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                                            <div class="col-lg-12">
                                                <input id="pengajuan_kredit2" name="pengajuan_kredit2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pengajuan_kredit2">Lihat Dokumen</button>
                                                <!-- <input id="pengajuan_kredit2" name="pengajuan_kredit2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Akta Pendirian beserta Akta Perubahan (jika ada) atau yang dipersamakan dengan hal itu</label>
                                            <div class="col-lg-12">
                                                <input id="akta_pendirian2" name="akta_pendirian2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="akta_pendirian2">Lihat Dokumen</button>
                                                <!-- <input id="akta_pendirian2" name="akta_pendirian2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>

                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Surat Keterangan/Keputusan Administrasi Hukum Umum (AHU)</label>
                                            <div class="col-lg-12">
                                                <input id="ahu2" name="ahu2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ahu2">Lihat Dokumen</button>
                                                <!-- <input id="ahu2" name="ahu2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan</label>
                                            <div class="col-lg-12">
                                                <input id="npwp_perseroan2" name="npwp_perseroan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp_perseroan2">Lihat Dokumen</button>
                                                <!-- <input id="npwp_perseroan2" name="npwp_perseroan2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero Pengurus</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_pengurus2" name="ktp_pengurus2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_pengurus2">Lihat Dokumen</button>
                                                <!-- <input id="ktp_pengurus2" name="ktp_pengurus2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero Komanditer</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_komanditer2" name="ktp_komanditer2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_komanditer2">Lihat Dokumen</button>
                                                <!-- <input id="ktp_komanditer2" name="ktp_komanditer2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy perijinan usaha</label>
                                            <div class="col-lg-12">
                                                <input id="perijinan_usaha2" name="perijinan_usaha2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="perijinan_usaha2">Lihat Dokumen</button>
                                                <!-- <input id="perijinan_usaha2" name="perijinan_usaha2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                                            <div class="col-lg-12">
                                                <input id="pengalaman_kerja2" name="pengalaman_kerja2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pengalaman_kerja2">Lihat Dokumen</button>
                                                <!-- <input id="pengalaman_kerja2" name="pengalaman_kerja2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Laporan Keuangan</label>
                                            <div class="col-lg-12">
                                                <input id="laporan_keuangan2" name="laporan_keuangan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="laporan_keuangan2">Lihat Dokumen</button>
                                                <!-- <input id="laporan_keuangan2" name="laporan_keuangan2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                    <h2 class="text-left text-success">Dokumen Agunan</h2>

                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy dokumen agunan yang akan diserahkan disertai kelengkapannya</label>
                                            <div class="col-lg-12">
                                                <input id="copy_dok_agunan2" name="copy_dok_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="copy_dok_agunan2">Lihat Dokumen</button>
                                                <!-- <input id="copy_dok_agunan2" name="copy_dok_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Ideb SLIK</label>
                                            <div class="col-lg-12">
                                                <input id="ideb_slik_agunan2" name="ideb_slik_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik_agunan2">Lihat Dokumen</button>
                                                <!-- <input id="ideb_slik_agunan2" name="ideb_slik_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_pemilik_agunan2" name="ktp_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_pemilik_agunan2">Lihat Dokumen</button>
                                                <!-- <input id="ktp_pemilik_agunan2" name="ktp_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                                            <div class="col-lg-12">
                                                <input id="kk_pemilik_agunan2" name="kk_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="kk_pemilik_agunan2">Lihat Dokumen</button>
                                                <!-- <input id="kk_pemilik_agunan2" name="kk_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                                            <div class="col-lg-12">
                                                <input id="buku_nikah2" name="buku_nikah2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="buku_nikah2">Lihat Dokumen</button>
                                                <!-- <input id="buku_nikah2" name="buku_nikah2" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                    <h2 class="text-left text-success">Track Record</h2>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                                            <div class="col-lg-12">
                                                <input id="dhn2" name="dhn2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="dhn2">Lihat Dokumen</button>
                                                <!-- <input id="dhn2" name="dhn2" type="file" placeholder="" class="form-control class-readonly"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Ideb SLIK</label>
                                            <div class="col-lg-12">
                                                <input id="ideb_slik2" name="ideb_slik2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik2">Lihat Dokumen</button>
                                                <!-- <input id="ideb_slik2" name="ideb_slik2" type="file" placeholder="" class="form-control class-readonly"> -->

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
                                                <input id="pengajuan_kredit3" name="pengajuan_kredit3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pengajuan_kredit3">Lihat Dokumen</button>
                                                <!-- <input id="pengajuan_kredit3" name="pengajuan_kredit3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Akta Pendirian beserta Akta Perubahan (jika ada) atau yang dipersamakan dengan hal itu</label>
                                            <div class="col-lg-12">
                                                <input id="akta_pendirian3" name="akta_pendirian3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="akta_pendirian3">Lihat Dokumen</button>
                                                <!-- <input id="akta_pendirian3" name="akta_pendirian3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>

                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Surat Keterangan/Keputusan Administrasi Hukum Umum (AHU)</label>
                                            <div class="col-lg-12">
                                                <input id="ahu3" name="ahu3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ahu3">Lihat Dokumen</button>
                                                <!-- <input id="ahu3" name="ahu3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan</label>
                                            <div class="col-lg-12">
                                                <input id="npwp_perseroan3" name="npwp_perseroan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp_perseroan3">Lihat Dokumen</button>
                                                <!-- <input id="npwp_perseroan3" name="npwp_perseroan3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Direksi</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_direksi3" name="ktp_direksi3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_direksi3">Lihat Dokumen</button>
                                                <!-- <input id="ktp_direksi3" name="ktp_direksi3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Komisaris</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_komisaris3" name="ktp_komisaris3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_komisaris3">Lihat Dokumen</button>
                                                <!-- <input id="ktp_komisaris3" name="ktp_komisaris3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Dokumen Legalitas Pemegang Saham (kecuali Perseroan Terbuka)</label>
                                            <div class="col-lg-12">
                                                <input id="pemegang_saham3" name="pemegang_saham3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pemegang_saham3">Lihat Dokumen</button>
                                                <!-- <input id="pemegang_saham3" name="pemegang_saham3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy perijinan usaha yang berlaku dan sesuai yang dipersyaratkan oleh pemberi kerja</label>
                                            <div class="col-lg-12">
                                                <input id="perijinan_usaha3" name="perijinan_usaha3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="perijinan_usaha3">Lihat Dokumen</button>
                                                <!-- <input id="perijinan_usaha3" name="perijinan_usaha3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                                            <div class="col-lg-12">
                                                <input id="pengalaman_kerja3" name="pengalaman_kerja3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="pengalaman_kerja3">Lihat Dokumen</button>
                                                <!-- <input id="pengalaman_kerja3" name="pengalaman_kerja3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Laporan Keuangan</label>
                                            <div class="col-lg-12">
                                                <input id="laporan_keuangan3" name="laporan_keuangan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="laporan_keuangan3">Lihat Dokumen</button>
                                                <!-- <input id="laporan_keuangan3" name="laporan_keuangan3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                    <h2 class="text-left text-success">Dokumen Agunan</h2>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Ideb SLIK</label>
                                            <div class="col-lg-12">
                                                <input id="ideb_slik_agunan3" name="ideb_slik_agunan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik_agunan3">Lihat Dokumen</button>
                                                <!-- <input id="ideb_slik_agunan3" name="ideb_slik_agunan3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) pemilik agunan</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_pemilik_agunan3" name="ktp_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_pemilik_agunan3">Lihat Dokumen</button>
                                                <!-- <input id="ktp_pemilik_agunan3" name="ktp_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>





                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                                            <div class="col-lg-12">
                                                <input id="ktp_istri3" name="ktp_istri3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_istri3">Lihat Dokumen</button>
                                                <!-- <input id="ktp_istri3" name="ktp_istri3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                                            <div class="col-lg-12">
                                                <input id="kk_pemilik_agunan3" name="kk_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="kk_pemilik_agunan3">Lihat Dokumen</button>
                                                <!-- <input id="kk_pemilik_agunan3" name="kk_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group row">


                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                                            <div class="col-lg-12">
                                                <input id="buku_nikah3" name="buku_nikah3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="buku_nikah3">Lihat Dokumen</button>
                                                <!-- <input id="buku_nikah3" name="buku_nikah3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                    <h2 class="text-left text-success">Track Record</h2>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                                            <div class="col-lg-12">
                                                <input id="dhn3" name="dhn3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="dhn3">Lihat Dokumen</button>
                                                <!-- <input id="dhn3" name="dhn3" type="file" placeholder="" class="form-control class-readonly"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-lg-12 control-label">Ideb SLIK</label>
                                            <div class="col-lg-12">
                                                <input id="ideb_slik3" name="ideb_slik3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik3">Lihat Dokumen</button>
                                                <!-- <input id="ideb_slik3" name="ideb_slik3" type="file" placeholder="" class="form-control class-readonly"> -->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <h1>Scoring Pemasar</h1>
                        <fieldset>
                            <h2>Scoring</h2>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Nama Pemohon</label>
                                        <div class="col-lg-12">
                                            <input id="nama_pemohon_sc" name="nama_pemohon_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Alamat</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="alamat_sc" name="alamat_sc" rows="3" readonly></textarea>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Plafond</label>
                                        <div class="col-lg-12">
                                            <input id="plafond_sc" name="plafond_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tujuan</label>
                                        <div class="col-lg-12">
                                            <input id="tujuan_sc" name="tujuan_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">No PAK</label>
                                        <div class="col-lg-12">
                                            <input id="no_pak_sc" name="no_pak_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">1. PENDIRIAN BADAN USAHA</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pendirian_sc" name="pendirian_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Usaha baru berjalan 0 s/d 6 bulan</option>
                                                <option value="4">(b) Usaha berjalan lebih dari 6 bulan s/d 1 tahun</option>
                                                <option value="6">(c) Usaha berjalan lebih dari 1 tahun s/d 2 tahun</option>
                                                <option value="8">(d) Usaha berjalan lebih dari 2 tahun s/d 5 tahun</option>
                                                <option value="10">(e) Usaha berjalan lebih dari 5 tahun</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">2. LEGALITAS</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="legalitas_sc" name="legalitas_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Dokumen legalitas tidak lengkap dan tidak ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                                                <option value="4">(b) Dokumen legalitas tidak lengkap namun ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                                                <option value="6">(c) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan belum dilakukan perpanjangan.</option>
                                                <option value="8">(d) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan ada surat keterangan masih dalam proses dari instansi berwenang.</option>
                                                <option value="10">(e) Dokumen legalitas lengkap sesuai dengan ketentuan yang berlaku.</option>
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
                                            <select class="form-control class-disabled select" id="hubungan_sc" name="hubungan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Belum atau sudah menjadi nasabah Bank Kalsel selama 0 s.d 3 bulan</option>
                                                <option value="4">(b) Sudah menjadi nasabah Bank Kalsel selama 3 bulan s.d 1 tahun</option>
                                                <option value="6">(c) Sudah menjadi nasabah Bank Kalsel selama > 1 s.d 3 tahun</option>
                                                <option value="8">(d) Sudah menjadi nasabah Bank Kalsel selama > 3 s.d 5 tahun</option>
                                                <option value="10">(e) Sudah menjadi nasabah Bank Kalsel selama > 5 tahun</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">4. PENGELOLAAN MANAJEMEN USAHA</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pengelolaan_sc" name="pengelolaan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Belum ada struktur organisasi dan tidak ada pembagian tugas secara jelas</option>
                                                <option value="6">(b) Sudah ada terdapat struktur organisasi namun tidak ada pembagian tugas</option>
                                                <option value="10">(c) Terdapat struktur organisasi dan pembagian tugas sesuai dengan bidangnya.</option>
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
                                            <select class="form-control class-disabled select" id="jenis_agunan_sc" name="jenis_agunan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="3">(a) Personal / Corporate Guarantee</option>
                                                <option value="6">(b) Bergerak</option>
                                                <option value="9">(c) Kombinasi barang tidak bergerak dan barang bergerak</option>
                                                <option value="12">(d) Tidak Bergerak</option>
                                                <option value="15">(e) Agunan Tunai</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">6. BUKTI KEPEMILIKAN AGUNAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="bukti_sc" name="bukti_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="3">(a) Akta notarial personal / corporate guarantee</option>
                                                <option value="6">(b) BPKB / Gross Akta / Invoice</option>
                                                <option value="9">(c) Kombinasi Bukti Kepemilikan Agunan Bergerak & Agunan Tidak Bergerak</option>
                                                <option value="12">(d) SHM / SHGB / SHGU / SHMRS / SHP</option>
                                                <option value="15">(e) Tabungan / Bilyet Deposito / Giro</option>
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
                                            <select class="form-control class-disabled select" id="status_sc" name="status_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="3">(a) Atas nama pihak ketiga (diluar keluarga owner atau pengurus perusahaan sampai dengan derajat pertama)</option>
                                                <option value="9">(b) Atas nama keluarga owner atau pengurus perusahaan sampai dengan derajat pertama (termasuk mertua, menantu dan ipar)</option>
                                                <option value="15">(c) Atas nama owner atau pengurus perusahaan</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">8. MARKETABLE AGUNAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="marketable_sc" name="marketable_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="9">(a) Agunan Tidak Bergerak: Kurang Marketable (jarak > 2 km s.d 5 km dari pusat bisnis/pasar utama di daerah tsb ; Agunan Bergerak : Tidak Mudah Dijual (contoh: Kapal, Alat Berat atau yang dipersamakan dengan itu)</option>
                                                <option value="15">(b) Agunan Tidak Bergerak : Marketable (jarak s.d 2 Km dari pusat bisnis/pasar utama di daerah tsb) ; Agunan Bergerak : Mudah Dijual (contoh: Kendaraan bermotor, uang tunai atau yang dipersamakan dengan itu)</option>
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
                                            <select class="form-control class-disabled select" id="lending_sc" name="lending_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="7">(a) Debitur dengan kolektibilitas 2,3, 4, 5, atau hapus buku dan atau pernah NPL namun telah lunas.</option>
                                                <option value="14">(b) Merupakan debitur baru tanpa track record (history)</option>
                                                <option value="21">(c) Pernah / sedang menikmati fasilitas kredit dengan kategori kolektibilitas 1 namun pernah / sedang dalam kategori restrukturisasi</option>
                                                <option value="28">(d) Pernah / sedang menikmati fasilitas kredit dari lembaga keuangan diluar Bank Kalsel kolektibilitas 1</option>
                                                <option value="35">(e) Telah menjadi nasabah Bank Kalsel dan sedang menikmati fasilitas kredit minimal 1 tahun dengan track record kolektibilitas 1</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">10. PENGALAMAN MENGERJAKAN PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pengalaman_sc" name="pengalaman_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Pemohon belum memiliki pengalaman melaksanakan pekerjaan proyek serupa.</option>
                                                <option value="12">(b) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 1 x.</option>
                                                <option value="18">(c) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 2 s.d 3x.</option>
                                                <option value="24">(d) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 3 - 5x</option>
                                                <option value="30">(e) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak >5 x.</option>
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
                                            <select class="form-control class-disabled select" id="sumber_dana_sc" name="sumber_dana_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="7">(a) Swasta Bonafid dan belum bekerjasama dengan Bank Kalsel</option>
                                                <option value="14">(b) Swasta Bonafid dan telah bekerjasama dengan Bank Kalsel</option>
                                                <option value="21">(c) BUMN / BUMD</option>
                                                <option value="28">(d) APBN</option>
                                                <option value="35">(e) APBD</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">12. LOKASI PROYEK / PEKERJAAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="lokasi_sc" name="lokasi_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Berada di lokasi yang tidak dapat diakses dengan alat transportasi umum / khusus.</option>
                                                <option value="12">(b) Berada di lokasi yang hanya dapat diakses dengan alat transportasi khusus.</option>
                                                <option value="18">(c) Berlokasi jauh dari pusat kota, namun dengan mudah dapat diakses menggunakan alat transportasi umum dan khusus.</option>
                                                <option value="24">(d) Berlokasi tidak jauh dari pusat kota.</option>
                                                <option value="30">(e) Berlokasi di pusat kota.</option>
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
                                            <select class="form-control class-disabled select" id="jenis_proyek_sc" name="jenis_proyek_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="18">(a) Jasa Konstruksi (Bangunan, Jalan, Jembatan, Irigasi, Drainase, dsb)</option>
                                                <option value="30">(b) Pengadaan Barang</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">14. BAHAN BAKU PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="bahan_baku_sc" name="bahan_baku_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon belum memiliki surat dukungan dari suplier dimaksud.</option>
                                                <option value="12">(b) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon telah melampirkan surat dukungan dari suplier dimaksud.</option>
                                                <option value="18">(c) Proyek pekerjaan yang membutuhkan bahan baku khusus yang dapat diproduksi sendiri oleh Pemohon.</option>
                                                <option value="24">(d) Proyek pekerjaan yang membutuhkan bahan baku khusus dari suplier tertentu, namun kebutuhan akan bahan baku tersebut telah tersedia di lokasi proyek/workshop Pemohon.</option>
                                                <option value="30">(e) Proyek pekerjaan yang hanya memerlukan bahan baku umum yang dapat diperoleh dengan mudah.</option>
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
                                            <select class="form-control class-disabled select" id="peralatan_sc" name="peralatan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan.</option>
                                                <option value="12">(b) Proyek pekerjaan yang dalam pelaksanaannya memerlukan peralatan kerja khusus dan Pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan. Namun fungsi peralatan kerja tersebut dapat digantikan dengan peralatan kerja sederhana dengan dukungan tenaga kerja dalam jumlah tertentu.</option>
                                                <option value="18">(c) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon telah melampirkan perjanjian sewa peralatan kerja yang dibutuhkan dari pihak ke-3</option>
                                                <option value="24">(d) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus yang telah dimiliki Pemohon.</option>
                                                <option value="30">(e) Proyek pekerjaan yang dalam pelaksanaannya hanya memerlukan peralatan kerja sederhana.</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">16. PEMBAYARAN TERMIJN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pembayaran_sc" name="pembayaran_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="7">(a) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing dan Standing Instruction.</option>
                                                <option value="21">(b) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing, namun sudah dilengkapi dengan Standing Instruction.</option>
                                                <option value="35">(c) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel yang tertuang di dalam kontrak / terdapat Bank Clearing yang telah ditandatangani oleh Pejabat Pembuat Komitmen dan Bendahara Proyek/Pekerjaan yang diberikan pembiayaan.</option>
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
                                            <select class="form-control class-disabled select" id="dasar_penunjukan_sc" name="dasar_penunjukan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Pengumuman LPSE dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                                                <option value="12">(b) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                                                <option value="18">(c) Pengumuman LPSE dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                                                <option value="24">(d) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                                                <option value="30">(e) Surat Perjanjian Kerja (SPK) / Kontrak yang telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">18. PROSENTASE PLAFOND KREDIT TERHADAP NILAI PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="prosentase_sc" name="prosentase_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) > 70%</option>
                                                <option value="12">(b) > 60% s.d 70%</option>
                                                <option value="18">(c) > 40% s.d 60%</option>
                                                <option value="24">(d) > 20% s.d 40%</option>
                                                <option value="30">(e) ≤ 20%</option>
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
                                            <select class="form-control class-disabled select" id="jangka_sc" name="jangka_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) > 1 tahun (multi years)</option>
                                                <option value="18">(b) > 6 s.d 12 bulan</option>
                                                <option value="30">(c) ≤ 6 bulan</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">20. PROSENTASE AGUNAN TAMBAHAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="agunan_sc" name="agunan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) 30% s.d 40%</option>
                                                <option value="12">(b) > 40% s.d 50%</option>
                                                <option value="18">(c) > 50% s.d 75%</option>
                                                <option value="24">(d) > 75% s.d 100%</option>
                                                <option value="30">(e) > 100%</option>
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
                                            <select class="form-control class-disabled select" id="penjaminan_sc" name="penjaminan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="5">(a) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan dan terdapat izin deviasi agunan dibawah ketentuan yang berlaku.</option>
                                                <option value="10">(b) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit hanya sebesar < 75,00% dari plafond kredit/pembiayaan.</option>
                                                <option value="15">(c) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit sesuai dengan ketentuan bank teknis yang berlaku (atau < 100%).</option>
                                                <option value="20">(d) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Case by Case).</option>
                                                <option value="25">(e) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Automatic Cover).</option>

                                            </select>
                                            <br>
                                            <table class="table-responsive" border="0">
                                                <tr>
                                                    <td>
                                                        <h3>Hasil Scoring</h3>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <h3 id="hasil_scoring" class="text-danger">-</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Keterangan</h3>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <h3 id="ket_hasil" class="text-danger">-</h3>
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
                        <!-- baru -->
                        <?php //  if($tampil_fak_data){ 
                        ?>
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
                                        <input id="nilai_kontrak_setelah_ppn_fak_data" name="nilai_kontrak_setelah_ppn_fak_data" onkeyup="copyvalue2(this.id,'nilai_kontrak_fak_rl','harga_borongan_fak_rl')" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">PPN</label>
                                    <div class="col-lg-12">
                                        <input id="ppn_fak_data" name="ppn_fak_data" type="text" onkeyup="copyvalue2(this.id,'ppn_pp_fak_data0','ppn_fak_modal')" placeholder="" class="form-control">
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
                                        <input id="bunga_kredit_fak_data" name="bunga_kredit_fak_data" type="text" onkeyup="copyvalue(this.id,'bunga_mauk')" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Asumsi Profit Kontraktor</label>
                                    <div class="col-lg-12">
                                        <input id="profit_kontraktor_fak_data" name="profit_kontraktor_fak_data" onkeyup="copyvalue(this.id,'profit_fak_modal')" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Pemeliharaan</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" onkeyup="copyvalue(this.id,'pemeliharaan_fak_modal')" id="biaya_pemeliharaan_fak_data" name="biaya_pemeliharaan_fak_data">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-12 control-label">Biaya Provisi</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_provisi_fak_data" name="biaya_provisi_fak_data" onkeyup="copyvalue(this.id,'provisi_fee_mauk')" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h2 class="text-center text-danger">Persiapan dan Pekerjaan</h2>
                            <button class="btn btn-success mt-2 tambah-field-pp text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Persiapan dan Pekerjaan</button>
                            <div class="add-form-pp">
                                <div class="form-group row">
                                    <div class="col-md-1">
                                        <div class="col-lg-10">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Item</label>
                                        <div class="col-lg-12">
                                            <input id="item_pp_fak_data0" name="item_pp_fak_data[]" type="text" onkeyup="copyvalue(this.id,'item_pp_fak_modal1')" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <label class="col-lg-6 control-label">PPN</label>
                                        <div class="col-lg-24">
                                            <input id="ppn_pp_fak_data0" name="ppn_pp_fak_data[]" onkeyup="hitungPP()" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-12 control-label">Nilai Sebelum PPN</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_sebelum_ppn_pp_fak_data0" name="nilai_sebelum_ppn_pp_fak_data[]" onkeyup="hitungPP(0)" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-12 control-label">Nilai Sesudah PPN</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_sesudah_ppn_pp_fak_data0" name="nilai_sesudah_ppn_pp_fak_data[]" onchange="copyvalue(this.id,'nilai_pp_fak_modal1')" type="text" placeholder="" class="form-control">
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
                                        <input id="pembulatan_nilai_sebelum_ppn_total_pp_fak_data" name="pembulatan_nilai_sebelum_ppn_total_pp_fak_data" onkeyup="hitungPP()" aria-atomic="" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="pembulatan_nilai_sesudah_ppn_total_pp_fak_data" name="pembulatan_nilai_sesudah_ppn_total_pp_fak_data" onkeyup="hitungPP()" type="text" placeholder="" class="form-control">
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
                            <button class="btn btn-success mt-2 tambah-field-termijn text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Termijn</button>
                            <div class="add-form-termijn-fak-data">
                                <div class="form-group row">
                                    <div class="col-md-1">
                                        <div class="col-lg-10">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-lg-6 control-label">Termijn</label>
                                        <div class="col-lg-12">
                                            <input id="termijn_fak_data0" name="termijn_fak_data[]" type="text" placeholder="" value="Uang Muka" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-lg-6 control-label">Progress</label>
                                        <div class="col-lg-12">
                                            <input id="progress_termijn_fak_data0" name="progress_termijn_fak_data[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-lg-18 center control-label">Persentase Termijn</label>
                                        <div class="col-lg-12">
                                            <input id="persentase_termijn_fak_data" name="persentase_termijn_fak_data[]" onkeyup="copyvalue(this.id,'persentase_penerimaan_uang_muka_fak_rl')" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <!-- <div class="col-lg-1"> -->
                                        <a class="btn btn-success btn-rounded m-t-n-xs" style="margin-top:30px" onclick="hitungPrakiraanTanggalTermijn(0)"><span>Hitung</span></a>
                                        <!-- </div> -->
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>
                                        <div class="col-lg-12">
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
                            <!-- <div class="luasbangunan">

                            </div> -->
                        </fieldset>
                        <?php //} 
                        ?>

                        <!-- batas baru -->
                        <!-- baru -->
                        <?php // if($tampil_fak_modal){ 
                        ?>
                        <h1>Data FAK Modal</h1>
                        <fieldset>
                            <h2>Data FAK Modal</h2>
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
                                    <div class="col-md-1">
                                        <div class="col-lg-10">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-lg-12 control-label">Item</label>
                                        <div class="col-lg-12">
                                            <input id="item_pp_fak_modal0" name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-lg-12 control-label">Nilai</label>
                                        <div class="col-lg-12">
                                            <input id="nilai_pp_fak_modal0" name="nilai_pp_fak_modal[]" type="text" placeholder="" onkeyup="hitungPPFAKM()" class="form-control">
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
                                    <label class="col-lg-12 control-label">Jumlah</label>
                                    <div class="col-lg-12">
                                        <input id="jumlah_total_biaya_umum_fak_modal" name="jumlah_total_biaya_umum_fak_modal" type="text" placeholder="" class="form-control">
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
                            <h2 class="text-center text-danger">Kebutuhan Modal Kerja (s/d pekerjaan <input type="text" id="persentase_pekerjaan_fak_modal" name="persentase_pekerjaan_fak_modal" class="form-control" onkeyup="hitungJumlahKebutuhanModalKerja()" style="display: inline-block; width: 90px; margin-left: 10px;">%)</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Persiapan dan Pekerjaan</label>
                                    <div class="col-lg-12">
                                        <input id="persiapan_pekerjaan_fak_modal" name="persiapan_pekerjaan_fak_modal" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Biaya Umum/ Adm</label>
                                    <div class="col-lg-12">
                                        <input id="biaya_umum_adm_fak_modal" name="biaya_umum_adm_fak_modal" type="text" placeholder="" class="form-control">
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
                                            <input id="penerimaan_uang_muka_fak_modal" name="penerimaan_uang_muka_fak_modal" readonly type="text" placeholder="" onkeyup="hitungSemua()" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_penerimaan_uang_muka_fak_modal" readonly name="jumlah_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_penerimaan_uang_muka_fak_modal" readonly name="persentase_penerimaan_uang_muka_fak_modal" type="text" placeholder="" class="form-control">
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
                                            <input id="pembiayaan_sendiri_fak_modal" readonly name="pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_pembiayaan_sendiri_fak_modal" readonly name="jumlah_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_pembiayaan_sendiri_fak_modal" readonly name="persentase_pembiayaan_sendiri_fak_modal" type="text" placeholder="" class="form-control">
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
                                            <input id="kredit_bank_fak_modal" name="kredit_bank_fak_modal" readonly type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_kredit_bank_fak_modal" name="jumlah_kredit_bank_fak_modal" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_kredit_bank_fak_modal" readonly name="persentase_kredit_bank_fak_modal" type="text" placeholder="" class="form-control">
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
                                            <input id="sumber_pembiayaan_fak_modal" readonly name="sumber_pembiayaan_fak_modal" onchange="copyvalue(this.id)" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="jumlah_bulat_sumber_pembiayaan_fak_modal" readonly name="jumlah_bulat_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="persentase_jumlah_sumber_pembiayaan_fak_modal" readonly name="persentase_jumlah_sumber_pembiayaan_fak_modal" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php // } 
                        ?>

                        <!-- batas baru -->
                        <!-- baru -->
                        <?php // if($tampil_fak_proyeksi_rl){ 
                        ?>
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
                        <?php // } 
                        ?>

                        <!-- batas baru -->
                        <!-- baru -->
                        <?php // if($tampil_upload_laporan_rl){ 
                        ?>
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
                                        <input id="laporan_rugi_laba_upload_lap_rl" name="laporan_rugi_laba_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                                        <button type="button" class="btn btn-link lihat-dokumen" data-id="laporan_rugi_laba_upload_lap_rl">Lihat Dokumen</button>
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
                                        <input id="neraca_upload_lap_rl" name="neraca_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                                        <button type="button" class="btn btn-link lihat-dokumen" data-id="neraca_upload_lap_rl">Lihat Dokumen</button>
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
                                        <input id="depresiasi_upload_lap_rl" name="depresiasi_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                                        <button type="button" class="btn btn-link lihat-dokumen" data-id="depresiasi_upload_lap_rl">Lihat Dokumen</button>
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
                                        <input id="rasio_lap_keuangan_upload_lap_rl" name="rasio_lap_keuangan_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                                        <button type="button" class="btn btn-link lihat-dokumen" data-id="rasio_lap_keuangan_upload_lap_rl">Lihat Dokumen</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </fieldset>
                        <?php // } 
                        ?>

                        <!-- batas baru -->
                        <!-- baru -->
                        <?php // if($tampil_cef){ 
                        ?>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox1ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SHGB, SHGU, STRATA TITLE</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox2ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td>-</td>
                                                <td class="tg-za14">SKPT (SRT KET PENDAFTARAN TANAH), SRT UKUR</td>
                                                <td></td>
                                                <td>50</td>
                                                <td><input type="checkbox" id="checkbox3ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">HAK PAKAI, SEGEL, SKPT (SRT KET PENGUASAAN TANAH) </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox4ceft" name="checkboxceft[]" value="25" onchange="showValueCEFT(this,'1','0.25')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 1</td>
                                                <td class="tg-0pky">25%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil1ceft" style="display: inline-block; width: 45px; margin-left: 10px;" name="hasil_checkbox_ceft[]"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox5ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LINGKUNGAN/KOMPLEK </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox6ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">GANG </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox7ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SETAPAK</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox8ceft" name="checkboxceft[]" value="25" onchange="showValueCEFT(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 2</td>
                                                <td class="tg-0pky">20%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil2ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox9ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">AN. ANAK KANDUNG/TIRI / SAUDARA KANDUNG/TIRI/AYAH KANDUNG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox10ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">AN. KELUARGA LAIN </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox11ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">AN. PIHAK KETIGA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox12ceft" name="checkboxceft[]" value="25" onchange="showValueCEFT(this,'3','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 3</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil3ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox13ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">PERUMAHAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox14ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">PERTANIAN/PERKEBUNAN/PETERNAKAN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox15ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LAINNYA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox16ceft" name="checkboxceft[]" value="25" onchange="showValueCEFT(this,'4','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 4</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil4ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox17ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">DEKAT (> 500 M S/D 1 KM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox18ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">CUKUP DEKAT (> 1 KM S/D 2 KM) </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox19ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">JAUH (> 2 KM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox20ceft" name="checkboxceft[]" value="25" onchange="showValueCEFT(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 5</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil5ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox21ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LENGKAP (5 S/D 6 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox22ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">CUKUP (3 S/D 4 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox23ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">TIDAK LENGKAP (S/D 2 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox24ceft" name="checkboxceft[]" value="25" onchange="showValueCEFT(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 6</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil6ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox25ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'7','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">SEGI BANYAK</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox26ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'7','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">LAINNYA (SEGITIGA, TIDAK BERATURAN,DLL)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox27ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'7','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 7</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil7ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox28ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">BERGELOMBANG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox29ceft" name="checkboxceft[]" value="75" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">BERTINGKAT </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox30ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LAINNYA (KOMBINASI)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox31ceft" name="checkboxceft[]" value="25" onchange="showValueCEFT(this,'8','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 8</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil8ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox32ceft" name="checkboxceft[]" value="100" onchange="showValueCEFT(this,'9','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">RAWA/GAMBUT/BERAIR</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox33ceft" name="checkboxceft[]" value="50" onchange="showValueCEFT(this,'9','0.05')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 9</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil9ceft" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah CEF Tanah</td>
                                                <td class="tg-0pky">100%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasiltotalCEFT" name="hasiltotalceft" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox1cefb" name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,'1','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">MEMILIKI IMB, NAMUN LUAS BANGUNAN TIDAK SESUAI DENGAN KONDISI SEBELUMNYA</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox2cefb" name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,'1','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td>-</td>
                                                <td class="tg-za14">TIDAK MEMILIKI</td>
                                                <td></td>
                                                <td>50</td>
                                                <td><input type="checkbox" id="checkbox3cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'1','0.2')"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 1</td>
                                                <td class="tg-0pky">20%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil1cefb" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox4cefb" name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SEMI PERMANEN(KOMBINASI KAYU+BETON) </td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox5cefb" name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">KAYU</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox6cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">MASIH DALAM PROSES</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox7cefb" name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,'2','0.2')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 2</td>
                                                <td class="tg-0pky">20%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil2cefb" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox8cefb" name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">>5 TAHUN S.D. 10 TAHUN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox9cefb" name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">>10 TAHUN S.D. 15 TAHUN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox10cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">>15 TAHUN</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox11cefb" name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,'3','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 3</td>
                                                <td class="tg-0pky">15%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil3cefb" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox12cefb" name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">BAIK</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox13cefb" name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">CUKUP</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox14cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">KURANG</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox15cefb" name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,'4','0.15')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 4</td>
                                                <td class="tg-0pky">15%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil4cefb" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox16cefb" name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">RUKO/RUKAN/TOKO</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox17cefb" name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">KANTOR</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox18cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">LAINNYA (GUDANG,DLL)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox19cefb" name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,'5','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 5</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil5cefb" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox20cefb" name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SEDANG (51CM S.D. 100CM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox21cefb" name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">RENDAH (0 S.D. 50CM)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox22cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-za14">SANGAT RENDAH (DIBAWAH JALAN)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">25</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox23cefb" name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,'6','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 6</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil6cefb" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
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
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox24cefb" name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">LENGKAP (5 S.D. 6 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">75</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox25cefb" name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">CUKUP (3 S.D. 4 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox26cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky">-</td>
                                                <td class="tg-0pky">TIDAK LENGKAP (S.D. 2 FASILITAS)</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">50</td>
                                                <td class="tg-0pky"><input type="checkbox" id="checkbox27cefb" name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,'7','0.1')"></td>
                                                <td class="tg-0pky"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah Sub Point 7</td>
                                                <td class="tg-0pky">10%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasil7cefb" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky">Jumlah CEF Bangunan</td>
                                                <td class="tg-0pky">100%</td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"></td>
                                                <td class="tg-0pky"><input id="hasiltotalCEFB" name="hasiltotalcefb" style="display: inline-block; width: 45px; margin-left: 10px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>
                        </fieldset>
                        <?php // } 
                        ?>

                        <!-- batas baru -->
                        <!-- baru -->
                        <?php // if($tampil_faa){ 
                        ?>
                        <h1>FAA</h1>
                        <fieldset>
                            <h2>Data Formulir Analisa Agunan</h2>
                            <div class="form-group row">

                                <label class="col-lg-3 control-label">Nama Nasabah</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="nama_nasabah_faa" name="nama_nasabah_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-lg-3 control-label">Nomor SHM</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="nomor_shm_faa" name="nomor_shm_faa" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <label class="col-lg-1 control-label">Tanggal</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="tanggal_shm_faa" name="tanggal_shm_faa" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-lg-3 control-label">Nama Pemilik SHM</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="nama_pemilik_shm_faa" name="nama_pemilik_shm_faa" type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-lg-3 control-label">Alamat Agunan</label>
                                <div class="col-lg-3">
                                    <div class="col-lg-12">
                                        <input id="alamat_agunan_faa" name="alamat_agunan_faa" type="text" placeholder="" class="form-control">
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
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="col-lg-12 control-label">Penilaian tanah</label>
                                            </div>
                                            <div class="col-lg-1 text-right">
                                                Rp
                                            </div>
                                            <div class="col-lg-2">
                                                <input id="harga_tanah_tanah_faa" name="harga_tanah_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                            <div class="col-lg-1 text-center">
                                                x
                                            </div>
                                            <div class="col-lg-2">
                                                <input id="luas_persegi_tanah_tanah_faa" name="luas_persegi_tanah_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                            <div class="col-lg-2">
                                                <input id="hasil_perhitungan_penilaian_tanah_faa" name="hasil_perhitungan_penilaian_tanah_faa" type="text" placeholder="" class="form-control">
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
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-2">
                                                <input id="harga_cef_tanah_faa" name="harga_cef_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label class="col-lg-6 control-label">Safety Margin</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <input id="persentase_safety_margin_tanah_faa" name="persentase_safety_margin_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-2">
                                                <input id="safety_margin_tanah_faa" name="safety_margin_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="col-lg-6 control-label">Nilai Bangun Setelah CEF & Safety Margin</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <input id="nilai_cef_safety_margin_tanah_faa" name="nilai_cef_safety_margin_tanah_faa" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="border border-dark p-1"> -->
                            <div class="luasbangunan">

                            </div>
                            <div class="border border-dark p-1">
                                <h3>3. Nilai Taksasi Seluruhnya (tanah dan bangunan) :</h3>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Tanah setelah CEF & Safety Margin</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="nilai_tanah_setelah_cef_safety_margin_faa" name="nilai_tanah_setelah_cef_safety_margin_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Bangunan setelah CEF & Safety Margin</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="nilai_bangunan_setelah_cef_safety_margin_faa" name="nilai_bangunan_setelah_cef_safety_margin_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Nilai Keseluruhan</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="nilai_keseluruhan_faa" name="nilai_keseluruhan_faa" type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-6 control-label">Rasio Perbandingan Agunan dengan Plafond Kredit</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="rasio_perbandingan_agunan_plafond_faa" name="rasio_perbandingan_agunan_plafond_faa" type="text" placeholder="" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </fieldset>
                        <?php // } 
                        ?>

                        <!-- batas baru -->
                        <!-- baru -->
                        <?php // if($tampil_mauk){ 
                        ?>
                        <h1>Memo Analisa & Usulan Kredit</h1>
                        <fieldset>
                            <h2>Memo Analisa & Usulan Kredit</h2>
                            <h2 class="text-center text-danger">Data Nasabah</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Nama Nasabah</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="nama_nasabah_mauk" name="nama_nasabah_mauk" type="text" placeholder="" class="form-control">

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">NPWP</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="npwp_mauk" name="npwp_mauk" type="text" placeholder="" class="form-control">

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Direktur</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="direktur_mauk" name="direktur_mauk" type="text" placeholder="" class="form-control">

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Key Person</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="key_person_mauk" name="key_person_mauk" type="text" placeholder="" class="form-control">

                                </div>
                            </div>

                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Alamat kantor</label>
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="alamat_kantor_mauk" name="alamat_kantor_mauk" type="text" placeholder="" class="form-control"></textarea>

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Klasifikasi</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="klasifikasi_mauk" name="klasifikasi_mauk" type="text" placeholder="" class="form-control">

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Bidang Usaha</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="bidang_usaha_mauk" name="bidang_usaha_mauk" type="text" placeholder="" class="form-control">

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Jenis Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="jenis_fasilitas_mauk" name="jenis_fasilitas_mauk" type="text" placeholder="" class="form-control">

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Bentuk Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="bentuk_fasilitas_mauk" name="bentuk_fasilitas_mauk" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Maksimum Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="maksimum_fasilitas_mauk" name="maksimum_fasilitas_mauk" type="text" placeholder="" class="form-control">

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Plafond Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="plafond_fasilitas_mauk" name="plafond_fasilitas_mauk" type="text" placeholder="" class="form-control">

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Jangka Waktu</label>
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="jangka_waktu_mauk" name="jangka_waktu_mauk" type="text" onkeyup="copyvalue(this.id,'kesimpulan_jangka_waktu_mauk')" placeholder="" class="form-control"></textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Tujuan Penggunaan</label>
                                </div>
                                <div class="col-lg-8">
                                    <input id="tujuan_penggunaan_mauk" name="tujuan_penggunaan_mauk" onkeyup="copyvalue(this.id,'kesimpulan_tujuan_penggunaan_mauk')" type="text" placeholder="" class="form-control">
                                </div>
                            </div>

                            <h2 class="text-center text-danger">Pemilik dan Pengurus Perusahaan</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Pemilik Perseroan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pemilik_perseroan_mauk" name="pemilik_perseroan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Pemilikan Saham/Permodalan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pemilikan_saham_permodalan_mauk" name="pemilikan_saham_permodalan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Kewenangan Direksi</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kewenangan_direksi_mauk" name="kewenangan_direksi_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Informasi Riwayat Perbankan</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="informasi_riwayat_perbankan_mauk" name="informasi_riwayat_perbankan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Legalitas</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Pendirian Usaha</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_pendirian_usaha_mauk" name="legalitas_pendirian_usaha_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Perizinan Usaha</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_perizinan_usaha_mauk" name="legalitas_perizinan_usaha_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Pelaksanaan Proyek</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_pelaksanaan_proyek_mauk" name="legalitas_pelaksanaan_proyek_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Personal Pemohon dan Pemilik Agunan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_personal_pemohon_pemilik_agunan_mauk" name="legalitas_personal_pemohon_pemilik_agunan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Kesimpulan Analisa Aspek Legalitas</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_analisa_aspek_legalitas_mauk" name="kesimpulan_analisa_aspek_legalitas_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Manajemen</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_manajemen_mauk" name="analisa_aspek_manajemen_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Teknis</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_teknis_mauk" name="analisa_aspek_teknis_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Pemasaran</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_pemasaran_mauk" name="analisa_aspek_pemasaran_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Keuangan</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_keuangan_mauk" name="analisa_aspek_keuangan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Perhitungan Kebutuhan Kredit</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="perhitungan_kebutuhan_kredit_mauk" name="perhitungan_kebutuhan_kredit_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Kesimpulan Jaminan/Agunan yang Dikuasai</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_jaminan_agunan_mauk" name="kesimpulan_jaminan_agunan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Kesimpulan dan Usulan</h2>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-mauk text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-mauk">
                                    <div class="form-group row">
                                        <!-- <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button" style="display: none;"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button> -->
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Jenis Kredit</label>
                                            <div class="col-lg-12">
                                                <input id="jenis_kredit_fasilitas_usul_mauk0" name="jenis_kredit_fasilitas_usul_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Maksimum Kredit Saat Ini</label>
                                            <div class="col-lg-12">
                                                <input id="max_kredit_ini_usul_mauk0" name="max_kredit_ini_usul_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Perubahan</label>
                                            <div class="col-lg-12">
                                                <input id="perubahan_usul_mauk0" name="perubahan_usul_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Maksimum Kredit yang Diusulkan</label>
                                            <div class="col-lg-12">
                                                <input id="max_kredit_usul_mauk0" name="max_kredit_usul_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-mauk2 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-mauk2">
                                    <div class="form-group row">
                                        <!-- <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button" style="display: none;"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button> -->
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="jenis_kredit_fasilitas_pal_mauk0" name="jenis_kredit_fasilitas_pal_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="max_kredit_ini_pal_mauk0" name="max_kredit_ini_pal_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="perubahan_pal_mauk0" name="perubahan_pal_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="max_kredit_pal_mauk0" name="max_kredit_pal_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Fasilitas Kredit yang Diusulkan</h2>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Jenis/Macam Fasilitas
                                </div>
                                <div class="col-lg-6">
                                    <input id="jenis_macam_fasilitas_mauk" name="jenis_macam_fasilitas_mauk" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Maksimum Kredit
                                </div>
                                <div class="col-lg-6">
                                    <input id="maksimum_kredit_mauk" name="maksimum_kredit_mauk" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Plafond Kredit
                                </div>
                                <div class="col-lg-6">
                                    <input id="plafond_kredit_mauk" name="plafond_kredit_mauk" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Kriteria Usaha
                                </div>
                                <div class="col-lg-6">
                                    <input id="kriteria_usaha_mauk" name="kriteria_usaha_mauk" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Pendanaan Sendiri
                                </div>
                                <div class="col-lg-6">
                                    <input id="pendanaan_sendiri_mauk" name="pendanaan_sendiri_mauk" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Tujuan Penggunaan
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_tujuan_penggunaan_mauk" name="kesimpulan_tujuan_penggunaan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Jangka Waktu
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_jangka_waktu_mauk" name="kesimpulan_jangka_waktu_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Cara Penarikan
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="cara_penarikan_mauk" name="cara_penarikan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Pelunasan/Angsuran
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pelunasan_angsuran_mauk" name="pelunasan_angsuran_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Bunga
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="bunga_mauk" name="bunga_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Provisi/Fee
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="provisi_fee_mauk" name="provisi_fee_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="hitung_provisi_fee_mauk" name="hitung_provisi_fee_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Akad Kredit
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="akad_kredit_mauk" name="akad_kredit_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-mauk3 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-mauk3">
                                    <div class="form-group row">
                                        <!-- <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button" style="display: none;"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button> -->
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Agunan</label>
                                            <div class="col-lg-12">
                                                <input id="agunan_mauk0" name="agunan_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Macam/Jenis</label>
                                            <div class="col-lg-12">
                                                <input id="macam_jenis_mauk0" name="macam_jenis_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Nilai Agunan</label>
                                            <div class="col-lg-12">
                                                <input id="nilai_agunan_mauk0" name="nilai_agunan_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Bentuk Pengikatan</label>
                                            <div class="col-lg-12">
                                                <input id="bentuk_pengikatan_mauk0" name="bentuk_pengikatan_mauk[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Dokumentasi Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="dokumentasi_kredit_mauk" name="dokumentasi_kredit_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Pengikatan Agunan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pengikatan_agunan_mauk" name="pengikatan_agunan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Asuransi Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="asuransi_kredit_mauk" name="asuransi_kredit_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Asuransi Agunan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="asuransi_agunan_mauk" name="asuransi_agunan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Syarat Penandatangan Perjanjian Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="syarat_ttd_pk_mauk" name="syarat_ttd_pk_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Syarat Realisasi dan Penarikan Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="syarat_realisasi_penarikan_mauk" name="syarat_realisasi_penarikan_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Affirmatives</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="affirmatives_mauk" name="affirmatives_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Negatives</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="negatives_mauk" name="negatives_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Syarat Lainnya yang Jadi perhatian</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="syarat_lain_mauk" name="syarat_lain_mauk" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                        </fieldset>
                        <?php // } 
                        ?>

                        <!-- batas baru -->
                        <!-- baru -->
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
                                    <input id="tanggal_dcl" name="" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Berkas Diterima Analis</label>
                                </div>
                                <div class="col-lg-3">
                                    <input id="tanggal_berkas_dcl" name="tanggal_berkas_dcl" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Informasi Debitur</h2>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Nama Pemohon (Debitur/Calon Debitur)</label>
                                </div>
                                <div class="col-lg-3">
                                    <input id="nama_pemohon_dcl" name="nama_pemohon_dcl" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Jenis Usaha/Pekerjaan</label>
                                </div>
                                <div class="col-lg-3">
                                    <input id="jenis_usaha_dcl" name="jenis_usaha_dcl" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-6 control-label">Nama Perusahaan Pemohon (Debitur/Calon Debitur)</label>
                                </div>
                                <div class="col-lg-3">
                                    <input id="nama_perusahaan_pemohon_dcl" name="nama_perusahaan_pemohon_dcl" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="form-group row"> -->
                            <button class="btn btn-success mt-2 tambah-field-dcl text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Nama Pemilik Perusahaan</button>
                            <div class="add-form-dcl">
                                <div class="form-group row">
                                    <div class="col-md-1">
                                        <div class="col-lg-10">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-10 control-label">Nama</label>
                                        <div class="col-lg-12">
                                            <input id="nama_pemilik_perusahaan_dcl1" name="nama_pemilik_perusahaan_dcl[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-lg-10 control-label">% Saham</label>
                                        <div class="col-lg-4">
                                            <input id="persentase_saham_dcl1" name="persentase_saham_dcl[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- <div class="form-group row"> -->
                            <button class="btn btn-success mt-2 tambah-field-dcl2 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                            <div class="add-form-dcl2">
                                <div class="form-group row">
                                    <div class="col-md-1">
                                        <div class="col-lg-10">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-lg-12 control-label">Jabatan</label>
                                        <div class="col-lg-12">
                                            <input id="jabatan_pengurus_perusahaan_dcl1" name="jabatan_pengurus_perusahaan_dcl[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-lg-6 control-label">Nama</label>
                                        <div class="col-lg-12">
                                            <input id="nama_pengurus_perusahaan_dcl1" name="nama_pengurus_perusahaan_dcl[]" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-lg-12 control-label">Kartu Pengenal</label>
                                        <div class="col-lg-12">
                                            <input id="ktp_dcl1" name="ktp_dcl[]" type="text" placeholder="" class="form-control">
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
                                    <input id="jenis_usaha_perusahaan_dcl" name="jenis_usaha_perusahaan_dcl" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Informasi Rencana Pemberian Kredit</h2>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-dcl3 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-dcl3">
                                    <div class="form-group row">
                                        <div class="col-md-1">
                                            <div class="col-lg-10">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-24 control-label">Fasilitas Kredit</label>
                                            <div class="col-lg-12">
                                                <textarea id="fasilitas_kredit_dcl1" name="fasilitas_kredit_dcl[]" placeholder="" class="form-control"></textarea>
                                                <!-- <input id="fasilitas_kredit_dcl1" name="fasilitas_kredit_dcl[]" type="text" placeholder="" class="form-control"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-24 control-label">Plafond</label>
                                            <div class="col-lg-10">
                                                <input id="plafond_dcl1" name="plafond_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-24 control-label">Jangka Waktu</label>
                                            <div class="col-lg-12">
                                                <textarea id="jangka_waktu_dcl1" name="jangka_waktu_dcl[]" placeholder="" class="form-control"></textarea>
                                                <!-- <input id="jangka_waktu_dcl1" name="jangka_waktu_dcl[]" type="text" placeholder="" class="form-control"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-24 control-label">Tujuan Penggunaan</label>
                                            <div class="col-lg-12">
                                                <textarea id="tujuan_penggunaan_dcl1" name="tujuan_penggunaan_dcl[]" placeholder="" class="form-control"></textarea>
                                                <!-- <input id="tujuan_penggunaan_dcl1" name="tujuan_penggunaan_dcl[]" type="text" placeholder="" class="form-control"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-24 control-label">Permohonan Diterima Pemasar</label>
                                            <div class="col-lg-12">
                                                <input id="permohonan_diterima_dcl1" name="permohonan_diterima_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-dcl4 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-dcl4">
                                    <div class="form-group row">
                                        <div class="col-md-1">
                                            <div class="col-lg-10">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-12 control-label">Bukti Kepemilikan</label>
                                            <div class="col-lg-10">
                                                <input id="bukti_kepemilikan_dcl1" name="bukti_kepemilikan_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Jenis Agunan</label>
                                            <div class="col-lg-12">
                                                <input id="jenis_agunan_dcl1" name="jenis_agunan_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input id="tanggal_agunan_dcl1" name="tanggal_agunan_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Avalist</label>
                                            <div class="col-lg-12">
                                                <input id="avalist_dcl1" name="avalist_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Nominal</label>
                                            <div class="col-lg-12">
                                                <input id="nominal_dcl1" name="nominal_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-dcl5 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Kredit Existing</button>
                                <div class="add-form-dcl5">
                                    <div class="form-group row">
                                        <div class="col-md-1">
                                            <div class="col-lg-10">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Fasilitas</label>
                                            <div class="col-lg-12">
                                                <input id="fasilitas_dcl1" name="fasilitas_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-12 control-label">Jatuh Tempo</label>
                                            <div class="col-lg-12">
                                                <input id="jatuh_tempo_dcl1" name="jatuh_tempo_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Plafond</label>
                                            <div class="col-lg-12">
                                                <input id="plafond_existing_dcl1" name="plafond_existing_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Outstanding</label>
                                            <div class="col-lg-12">
                                                <input id="outstanding_dcl1" name="outstanding_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Kolektibilitas</label>
                                            <div class="col-lg-12">
                                                <input id="kolektibilitas_dcl1" name="kolektibilitas_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-dcl6 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Kredit Grup</button>
                                <div class="add-form-dcl6">
                                    <div class="form-group row">

                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Fasilitas</label>
                                            <div class="col-lg-12">
                                                <input id="fasilitas_kredit_grup_dcl1" name="fasilitas_kredit_grup_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-12 control-label">Nama Debitur</label>
                                            <div class="col-lg-12">
                                                <input id="nama_debitur_kredit_grup_dcl1" name="nama_debitur_kredit_grup_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-12 control-label">Jatuh Tempo</label>
                                            <div class="col-lg-10">
                                                <input id="jatuh_tempo_kredit_grup_dcl1" name="jatuh_tempo_kredit_grup_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Plafond</label>
                                            <div class="col-lg-12">
                                                <input id="plafond_existing_kredit_grup_dcl1" name="plafond_existing_kredit_grup_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Outstanding</label>
                                            <div class="col-lg-12">
                                                <input id="outstanding_kredit_grup_dcl1" name="outstanding_kredit_grup_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Kolektibilitas</label>
                                            <div class="col-lg-8">
                                                <input id="kolektibilitas_kredit_grup_dcl1" name="kolektibilitas_kredit_grup_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-dcl7 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Kredit an. Debitur di Bank/LJK lain</button>
                                <div class="add-form-dcl7">
                                    <div class="form-group row">

                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Fasilitas</label>
                                            <div class="col-lg-12">
                                                <input id="fasilitas_bank_lain_dcl1" name="fasilitas_bank_lain_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Bank/LJK</label>
                                            <div class="col-lg-12">
                                                <input id="bank_ljk_bank_lain_dcl1" name="bank_ljk_bank_lain_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-12 control-label">Jatuh Tempo</label>
                                            <div class="col-lg-10">
                                                <input id="jatuh_tempo_bank_lain_dcl1" name="jatuh_tempo_bank_lain_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Plafond</label>
                                            <div class="col-lg-12">
                                                <input id="plafond_existing_bank_lain_dcl1" name="plafond_existing_bank_lain_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Outstanding</label>
                                            <div class="col-lg-12">
                                                <input id="outstanding_bank_lain_dcl1" name="outstanding_bank_lain_dcl[]" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-lg-6 control-label">Kolektibilitas</label>
                                            <div class="col-lg-8">
                                                <input id="kolektibilitas_bank_lain_dcl1" name="kolektibilitas_bank_lain_dcl[]" type="text" placeholder="" class="form-control">
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
                                    <input id="pengujian_ojk_dcl1" name="pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_ojk_dcl1" name="dasar_pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_ojk_dcl[]" id="checklist_pengujian_ojk_dcl1" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input id="pengujian_ojk_dcl2" name="pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_ojk_dcl2" name="dasar_pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_ojk_dcl[]" id="checklist_pengujian_ojk_dcl2" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input id="pengujian_ojk_dcl3" name="pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_ojk_dcl3" name="dasar_pengujian_ojk_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_ojk_dcl[]" id="checklist_pengujian_ojk_dcl3" class=" form-control class-disabled select">
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
                                    <input id="pengujian_internal_dcl1" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_internal_dcl1" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl1" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                    <!-- <input id="checklist_pengujian_internal_dcl1" name="checklist_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input id="pengujian_internal_dcl2" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_internal_dcl2" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl2" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input id="pengujian_internal_dcl3" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_internal_dcl3" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl3" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input id="pengujian_internal_dcl4" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_internal_dcl4" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl4" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input id="pengujian_internal_dcl5" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_internal_dcl5" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl5" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input id="pengujian_internal_dcl6" name="pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input id="dasar_pengujian_internal_dcl6" name="dasar_pengujian_internal_dcl[]" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-2">
                                    <select name="checklist_pengujian_internal_dcl[]" id="checklist_pengujian_internal_dcl6" class=" form-control class-disabled select">
                                        <option value=""></option>
                                        <option value="comply">Comply</option>
                                        <option value="not comply">Not Comply</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success mt-2 tambah-field-dcl8 text-center" style="width:100%;" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Uji terhadap Ketentuan Lainnya</button>
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
                                        <input id="pengujian_lainnya_dcl1" name="pengujian_lainnya_dcl[]" type="text" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-lg-6">
                                        <input id="dasar_pengujian_lainnya_dcl1" name="dasar_pengujian_lainnya_dcl[]" type="text" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="checklist_pengujian_lainnya_dcl[]" id="checklist_pengujian_lainnya_dcl1" class=" form-control class-disabled select">
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
                                    <textarea id="kesimpulan_dcl" name="kesimpulan_dcl" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-lg-6 control-label">Komentar</label>
                                </div>
                                <div class="col-lg-6">
                                    <textarea id="komentar_dcl" name="komentar_dcl" type="text" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                        </fieldset>
                        <?php // } 
                        ?>

                        <!-- batas baru -->
                        <h1>Scoring Koordinator</h1>
                        <fieldset>
                            <h2>Scoring</h2>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Nama Pemohon</label>
                                        <div class="col-lg-12">
                                            <input id="nama_pemohon_sc" name="nama_pemohon_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Alamat</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="alamat_sc" name="alamat_sc" rows="3" readonly></textarea>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Plafond</label>
                                        <div class="col-lg-12">
                                            <input id="plafond_sc" name="plafond_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">Tujuan</label>
                                        <div class="col-lg-12">
                                            <input id="tujuan_sc" name="tujuan_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">No PAK</label>
                                        <div class="col-lg-12">
                                            <input id="no_pak_sc" name="no_pak_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">1. PENDIRIAN BADAN USAHA</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pendirian_sc" name="pendirian_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Usaha baru berjalan 0 s/d 6 bulan</option>
                                                <option value="4">(b) Usaha berjalan lebih dari 6 bulan s/d 1 tahun</option>
                                                <option value="6">(c) Usaha berjalan lebih dari 1 tahun s/d 2 tahun</option>
                                                <option value="8">(d) Usaha berjalan lebih dari 2 tahun s/d 5 tahun</option>
                                                <option value="10">(e) Usaha berjalan lebih dari 5 tahun</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">2. LEGALITAS</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="legalitas_sc" name="legalitas_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Dokumen legalitas tidak lengkap dan tidak ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                                                <option value="4">(b) Dokumen legalitas tidak lengkap namun ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                                                <option value="6">(c) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan belum dilakukan perpanjangan.</option>
                                                <option value="8">(d) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan ada surat keterangan masih dalam proses dari instansi berwenang.</option>
                                                <option value="10">(e) Dokumen legalitas lengkap sesuai dengan ketentuan yang berlaku.</option>
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
                                            <select class="form-control class-disabled select" id="hubungan_sc" name="hubungan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Belum atau sudah menjadi nasabah Bank Kalsel selama 0 s.d 3 bulan</option>
                                                <option value="4">(b) Sudah menjadi nasabah Bank Kalsel selama 3 bulan s.d 1 tahun</option>
                                                <option value="6">(c) Sudah menjadi nasabah Bank Kalsel selama > 1 s.d 3 tahun</option>
                                                <option value="8">(d) Sudah menjadi nasabah Bank Kalsel selama > 3 s.d 5 tahun</option>
                                                <option value="10">(e) Sudah menjadi nasabah Bank Kalsel selama > 5 tahun</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">4. PENGELOLAAN MANAJEMEN USAHA</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pengelolaan_sc" name="pengelolaan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="2">(a) Belum ada struktur organisasi dan tidak ada pembagian tugas secara jelas</option>
                                                <option value="6">(b) Sudah ada terdapat struktur organisasi namun tidak ada pembagian tugas</option>
                                                <option value="10">(c) Terdapat struktur organisasi dan pembagian tugas sesuai dengan bidangnya.</option>
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
                                            <select class="form-control class-disabled select" id="jenis_agunan_sc" name="jenis_agunan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="3">(a) Personal / Corporate Guarantee</option>
                                                <option value="6">(b) Bergerak</option>
                                                <option value="9">(c) Kombinasi barang tidak bergerak dan barang bergerak</option>
                                                <option value="12">(d) Tidak Bergerak</option>
                                                <option value="15">(e) Agunan Tunai</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">6. BUKTI KEPEMILIKAN AGUNAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="bukti_sc" name="bukti_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="3">(a) Akta notarial personal / corporate guarantee</option>
                                                <option value="6">(b) BPKB / Gross Akta / Invoice</option>
                                                <option value="9">(c) Kombinasi Bukti Kepemilikan Agunan Bergerak & Agunan Tidak Bergerak</option>
                                                <option value="12">(d) SHM / SHGB / SHGU / SHMRS / SHP</option>
                                                <option value="15">(e) Tabungan / Bilyet Deposito / Giro</option>
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
                                            <select class="form-control class-disabled select" id="status_sc" name="status_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="3">(a) Atas nama pihak ketiga (diluar keluarga owner atau pengurus perusahaan sampai dengan derajat pertama)</option>
                                                <option value="9">(b) Atas nama keluarga owner atau pengurus perusahaan sampai dengan derajat pertama (termasuk mertua, menantu dan ipar)</option>
                                                <option value="15">(c) Atas nama owner atau pengurus perusahaan</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">8. MARKETABLE AGUNAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="marketable_sc" name="marketable_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="9">(a) Agunan Tidak Bergerak: Kurang Marketable (jarak > 2 km s.d 5 km dari pusat bisnis/pasar utama di daerah tsb ; Agunan Bergerak : Tidak Mudah Dijual (contoh: Kapal, Alat Berat atau yang dipersamakan dengan itu)</option>
                                                <option value="15">(b) Agunan Tidak Bergerak : Marketable (jarak s.d 2 Km dari pusat bisnis/pasar utama di daerah tsb) ; Agunan Bergerak : Mudah Dijual (contoh: Kendaraan bermotor, uang tunai atau yang dipersamakan dengan itu)</option>
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
                                            <select class="form-control class-disabled select" id="lending_sc" name="lending_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="7">(a) Debitur dengan kolektibilitas 2,3, 4, 5, atau hapus buku dan atau pernah NPL namun telah lunas.</option>
                                                <option value="14">(b) Merupakan debitur baru tanpa track record (history)</option>
                                                <option value="21">(c) Pernah / sedang menikmati fasilitas kredit dengan kategori kolektibilitas 1 namun pernah / sedang dalam kategori restrukturisasi</option>
                                                <option value="28">(d) Pernah / sedang menikmati fasilitas kredit dari lembaga keuangan diluar Bank Kalsel kolektibilitas 1</option>
                                                <option value="35">(e) Telah menjadi nasabah Bank Kalsel dan sedang menikmati fasilitas kredit minimal 1 tahun dengan track record kolektibilitas 1</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">10. PENGALAMAN MENGERJAKAN PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pengalaman_sc" name="pengalaman_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Pemohon belum memiliki pengalaman melaksanakan pekerjaan proyek serupa.</option>
                                                <option value="12">(b) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 1 x.</option>
                                                <option value="18">(c) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 2 s.d 3x.</option>
                                                <option value="24">(d) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 3 - 5x</option>
                                                <option value="30">(e) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak >5 x.</option>
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
                                            <select class="form-control class-disabled select" id="sumber_dana_sc" name="sumber_dana_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="7">(a) Swasta Bonafid dan belum bekerjasama dengan Bank Kalsel</option>
                                                <option value="14">(b) Swasta Bonafid dan telah bekerjasama dengan Bank Kalsel</option>
                                                <option value="21">(c) BUMN / BUMD</option>
                                                <option value="28">(d) APBN</option>
                                                <option value="35">(e) APBD</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">12. LOKASI PROYEK / PEKERJAAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="lokasi_sc" name="lokasi_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Berada di lokasi yang tidak dapat diakses dengan alat transportasi umum / khusus.</option>
                                                <option value="12">(b) Berada di lokasi yang hanya dapat diakses dengan alat transportasi khusus.</option>
                                                <option value="18">(c) Berlokasi jauh dari pusat kota, namun dengan mudah dapat diakses menggunakan alat transportasi umum dan khusus.</option>
                                                <option value="24">(d) Berlokasi tidak jauh dari pusat kota.</option>
                                                <option value="30">(e) Berlokasi di pusat kota.</option>
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
                                            <select class="form-control class-disabled select" id="jenis_proyek_sc" name="jenis_proyek_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="18">(a) Jasa Konstruksi (Bangunan, Jalan, Jembatan, Irigasi, Drainase, dsb)</option>
                                                <option value="30">(b) Pengadaan Barang</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">14. BAHAN BAKU PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="bahan_baku_sc" name="bahan_baku_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon belum memiliki surat dukungan dari suplier dimaksud.</option>
                                                <option value="12">(b) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon telah melampirkan surat dukungan dari suplier dimaksud.</option>
                                                <option value="18">(c) Proyek pekerjaan yang membutuhkan bahan baku khusus yang dapat diproduksi sendiri oleh Pemohon.</option>
                                                <option value="24">(d) Proyek pekerjaan yang membutuhkan bahan baku khusus dari suplier tertentu, namun kebutuhan akan bahan baku tersebut telah tersedia di lokasi proyek/workshop Pemohon.</option>
                                                <option value="30">(e) Proyek pekerjaan yang hanya memerlukan bahan baku umum yang dapat diperoleh dengan mudah.</option>
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
                                            <select class="form-control class-disabled select" id="peralatan_sc" name="peralatan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan.</option>
                                                <option value="12">(b) Proyek pekerjaan yang dalam pelaksanaannya memerlukan peralatan kerja khusus dan Pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan. Namun fungsi peralatan kerja tersebut dapat digantikan dengan peralatan kerja sederhana dengan dukungan tenaga kerja dalam jumlah tertentu.</option>
                                                <option value="18">(c) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon telah melampirkan perjanjian sewa peralatan kerja yang dibutuhkan dari pihak ke-3</option>
                                                <option value="24">(d) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus yang telah dimiliki Pemohon.</option>
                                                <option value="30">(e) Proyek pekerjaan yang dalam pelaksanaannya hanya memerlukan peralatan kerja sederhana.</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">16. PEMBAYARAN TERMIJN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="pembayaran_sc" name="pembayaran_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="7">(a) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing dan Standing Instruction.</option>
                                                <option value="21">(b) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing, namun sudah dilengkapi dengan Standing Instruction.</option>
                                                <option value="35">(c) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel yang tertuang di dalam kontrak / terdapat Bank Clearing yang telah ditandatangani oleh Pejabat Pembuat Komitmen dan Bendahara Proyek/Pekerjaan yang diberikan pembiayaan.</option>
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
                                            <select class="form-control class-disabled select" id="dasar_penunjukan_sc" name="dasar_penunjukan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) Pengumuman LPSE dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                                                <option value="12">(b) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                                                <option value="18">(c) Pengumuman LPSE dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                                                <option value="24">(d) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                                                <option value="30">(e) Surat Perjanjian Kerja (SPK) / Kontrak yang telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">18. PROSENTASE PLAFOND KREDIT TERHADAP NILAI PROYEK</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="prosentase_sc" name="prosentase_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) > 70%</option>
                                                <option value="12">(b) > 60% s.d 70%</option>
                                                <option value="18">(c) > 40% s.d 60%</option>
                                                <option value="24">(d) > 20% s.d 40%</option>
                                                <option value="30">(e) ≤ 20%</option>
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
                                            <select class="form-control class-disabled select" id="jangka_sc" name="jangka_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) > 1 tahun (multi years)</option>
                                                <option value="18">(b) > 6 s.d 12 bulan</option>
                                                <option value="30">(c) ≤ 6 bulan</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-lg-12 control-label">20. PROSENTASE AGUNAN TAMBAHAN</label>
                                        <div class="col-lg-12">
                                            <select class="form-control class-disabled select" id="agunan_sc" name="agunan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="6">(a) 30% s.d 40%</option>
                                                <option value="12">(b) > 40% s.d 50%</option>
                                                <option value="18">(c) > 50% s.d 75%</option>
                                                <option value="24">(d) > 75% s.d 100%</option>
                                                <option value="30">(e) > 100%</option>
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
                                            <select class="form-control class-disabled select" id="penjaminan_sc" name="penjaminan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                                                <option value="" disabled="">pilih</option>
                                                <option value="5">(a) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan dan terdapat izin deviasi agunan dibawah ketentuan yang berlaku.</option>
                                                <option value="10">(b) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit hanya sebesar < 75,00% dari plafond kredit/pembiayaan.</option>
                                                <option value="15">(c) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit sesuai dengan ketentuan bank teknis yang berlaku (atau < 100%).</option>
                                                <option value="20">(d) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Case by Case).</option>
                                                <option value="25">(e) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Automatic Cover).</option>

                                            </select>
                                            <br>
                                            <table class="table-responsive" border="0">
                                                <tr>
                                                    <td>
                                                        <h3>Hasil Scoring</h3>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <h3 id="hasil_scoring" class="text-danger">-</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Keterangan</h3>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <h3 id="ket_hasil" class="text-danger">-</h3>
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
                            <div class="row">
                                <div class="col-lg-6">
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
                                            <td>1</td>
                                            <td>Data Entry</td>
                                            <td>
                                                <span id="data_entry1" style="display: none;">Oke</span> /
                                                <span id="data_entry2" style="display: none;">Not Oke</span>
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
                                                <span id="fcr1">Oke</span> / <span id="fcr2">Not Oke</span>
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
                                                <span id="fcr_usaha1">Oke</span> / <span id="fcr_usaha2">Not Oke</span>
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
                                                <span id="fcr_agunan1">Oke</span> / <span id="fcr_agunan2">Not Oke</span>
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
                                                <span id="dokumen1">Oke</span> / <span id="dokumen2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                6
                                            </td>
                                            <td>
                                                FAK Data
                                            </td>
                                            <td>
                                                <span id="scoring1">Oke</span> / <span id="scoring2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                7
                                            </td>
                                            <td>
                                                FAK Modal
                                            </td>
                                            <td>
                                                <span id="data_entry1">Oke</span> / <span id="data_entry2">Not Oke</span>
                                            </td>
                                        </tr>

                                    </table>

                                </div>
                                <div class="col-lg-6">
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
                                                8
                                            </td>
                                            <td>
                                                FAK Proyeksi RL
                                            </td>
                                            <td>
                                                <span id="fcr1">Oke</span> / <span id="fcr2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                9
                                            </td>
                                            <td>
                                                Upload Laporan RL
                                            </td>
                                            <td>
                                                <span id="fcr_usaha1">Oke</span> / <span id="fcr_usaha2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                10
                                            </td>
                                            <td>
                                                CEF
                                            </td>
                                            <td>
                                                <span id="fcr_agunan1">Oke</span> / <span id="fcr_agunan2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                11
                                            </td>
                                            <td>
                                                FAA
                                            </td>
                                            <td>
                                                <span id="dokumen1">Oke</span> / <span id="dokumen2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                MAUK
                                            </td>
                                            <td>
                                                <span id="scoring1">Oke</span> / <span id="scoring2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                13
                                            </td>
                                            <td>
                                                DCL Compliance
                                            </td>
                                            <td>
                                                <span id="scoring1">Oke</span> / <span id="scoring2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                14
                                            </td>
                                            <td>
                                                Scoring
                                            </td>
                                            <td>
                                                <span id="scoring1">Oke</span> / <span id="scoring2">Not Oke</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                15
                                            </td>
                                            <td>
                                                Recap
                                            </td>
                                            <td>
                                                <span id="scoring1">Oke</span> / <span id="scoring2">Not Oke</span>
                                            </td>
                                        </tr>

                                    </table>

                                </div>
                            </div>



                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Pemasar</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="disposisi_sc" name="disposisi_sc" rows="3" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Koordinator Pemasar</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="disposisi_koordinator_pemasar_sc" name="disposisi_koordinator_pemasar_sc" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Cabang</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="disposisi_kepala_cabang_sc" name="disposisi_kepala_cabang_sc" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Analis Kredit</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="disposisi_analis_kredit_sc" name="disposisi_analis_kredit_sc" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Bagian</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="disposisi_kepala_bagian_sc" name="disposisi_kepala_bagian_sc" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Divisi</label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="disposisi_kepala_divisi_sc" name="disposisi_kepala_divisi_sc" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <input type="text" hiddenn name="kd_data" id="kd_data">

        <input type="text" hidden name="itemppfakdata" id="itemppfakdata">
        <input type="text" hidden name="ppnppfakdata" id="ppnppfakdata">
        <input type="text" hidden name="nilaisebelumppnppfakdata" id="nilaisebelumppnppfakdata">
        <input type="text" hidden name="nilaisesudahppnppfakdata" id="nilaisesudahppnppfakdata">

        <input type="text" hidden name="termijnfakdata" id="termijnfakdata">
        <input type="text" hidden name="progresstermijnfakdata" id="progresstermijnfakdata">
        <input type="text" hidden name="persentasetermijnfakdata" id="persentasetermijnfakdata">
        <input type="text" hidden name="prakiraantgltermijnfakdata" id="prakiraantgltermijnfakdata">

        <input type="text" hidden name="itemppfakmodal" id="itemppfakmodal">
        <input type="text" hidden name="nilaippfakmodal" id="nilaippfakmodal">

        <input type="text" hidden name="nilaicheckboxceft" id="nilaicheckboxceft">
        <input type="text" hidden name="hasilcheckboxceft" id="hasilcheckboxceft">
        <input type="text" hidden name="nilaicheckboxcefb" id="nilaicheckboxcefb">
        <input type="text" hidden name="hasilcheckboxcefb" id="hasilcheckboxcefb">

        <input type="text" hidden name="jeniskreditfasilitasusulmauk" id="jeniskreditfasilitasusulmauk">
        <input type="text" hidden name="maxkreditiniusulmauk" id="maxkreditiniusulmauk">
        <input type="text" hidden name="perubahanusulmauk" id="perubahanusulmauk">
        <input type="text" hidden name="maxkreditusulmauk" id="maxkreditusulmauk">

        <input type="text" hidden name="jeniskreditfasilitaspalmauk" id="jeniskreditfasilitaspalmauk">
        <input type="text" hidden name="maxkreditinipalmauk" id="maxkreditinipalmauk">
        <input type="text" hidden name="perubahanpalmauk" id="perubahanpalmauk">
        <input type="text" hidden name="maxkreditpalmauk" id="maxkreditpalmauk">

        <input type="text" hidden name="agunanmauk" id="agunanmauk">
        <input type="text" hidden name="macamjenismauk" id="macamjenismauk">
        <input type="text" hidden name="nilaiagunanmauk" id="nilaiagunanmauk">
        <input type="text" hidden name="bentukpengikatanmauk" id="bentukpengikatanmauk">

        <input type="text" hidden name="agunanmauk" id="agunanmauk">
        <input type="text" hidden name="macamjenismauk" id="macamjenismauk">
        <input type="text" hidden name="nilaiagunanmauk" id="nilaiagunanmauk">
        <input type="text" hidden name="bentukpengikatanmauk" id="bentukpengikatanmauk">

        <input type="text" hidden name="namapemilikperusahaandcl" id="namapemilikperusahaandcl">
        <input type="text" hidden name="persentasesahamdcl" id="persentasesahamdcl">

        <input type="text" hidden name="jabatanpengurusperusahaandcl" id="jabatanpengurusperusahaandcl">
        <input type="text" hidden name="namapengurusperusahaandcl" id="namapengurusperusahaandcl">
        <input type="text" hidden name="ktpdcl" id="ktpdcl">

        <input type="text" hidden name="fasilitas_kreditdcl" id="fasilitas_kreditdcl">
        <input type="text" hidden name="plafonddcl" id="plafonddcl">
        <input type="text" hidden name="jangkawaktudcl" id="jangkawaktudcl">
        <input type="text" hidden name="tujuanpenggunaandcl" id="tujuanpenggunaandcl">
        <input type="text" hidden name="permohonanditerimadcl" id="permohonanditerimadcl">

        <input type="text" hidden name="buktikepemilikandcl" id="buktikepemilikandcl">
        <input type="text" hidden name="jenisagunandcl" id="jenisagunandcl">
        <input type="text" hidden name="tanggalagunandcl" id="tanggalagunandcl">
        <input type="text" hidden name="avalistdcl" id="avalistdcl">
        <input type="text" hidden name="nominaldcl" id="nominaldcl">

        <input type="text" hidden name="fasilitasdcl" id="fasilitasdcl">
        <input type="text" hidden name="jatuhtempodcl" id="jatuhtempodcl">
        <input type="text" hidden name="plafondexistingdcl" id="plafondexistingdcl">
        <input type="text" hidden name="outstandingdcl" id="outstandingdcl">
        <input type="text" hidden name="kolektibilitasdcl" id="kolektibilitasdcl">

        <input type="text" hidden name="fasilitaskreditgrupdcl" id="fasilitaskreditgrupdcl">
        <input type="text" hidden name="namadebiturkreditgrupdcl" id="namadebiturkreditgrupdcl">
        <input type="text" hidden name="jatuhtempokreditgrupdcl" id="jatuhtempokreditgrupdcl">
        <input type="text" hidden name="plafondexistingkreditgrupdcl" id="plafondexistingkreditgrupdcl">
        <input type="text" hidden name="outstandingkreditgrupdcl" id="outstandingkreditgrupdcl">
        <input type="text" hidden name="kolektibilitaskreditgrupdcl" id="kolektibilitaskreditgrupdcl">

        <input type="text" hidden name="fasilitasbanklaindcl" id="fasilitasbanklaindcl">
        <input type="text" hidden name="bankljkbanklaindcl" id="bankljkbanklaindcl">
        <input type="text" hidden name="jatuhtempobanklaindcl" id="jatuhtempobanklaindcl">
        <input type="text" hidden name="plafondexistingbanklaindcl" id="plafondexistingbanklaindcl">
        <input type="text" hidden name="outstandingbanklaindcl" id="outstandingbanklaindcl">
        <input type="text" hidden name="kolektibilitasbanklaindcl" id="kolektibilitasbanklaindcl">

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
        <div class="copy-mauk invisible">
            <div class="row new" id="new">
                <!-- <div class="form-group row"> -->
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button name="hapus_mauk" class="btn btn-danger hapus_mauk delete-btn-mauk" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-mauk2 invisible">
            <div class="row new" id="new">
                <!-- <div class="form-group row"> -->
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button name="hapus_mauk2" class="btn btn-danger hapus_mauk2 delete-btn-mauk2" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-mauk3 invisible">
            <div class="row new" id="new">
                <!-- <div class="form-group row"> -->
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button name="hapus_mauk3" class="btn btn-danger hapus_mauk3 delete-btn-mauk3" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl invisible">
            <div class="row new" id="new">
                <!-- <div class="form-group row"> -->
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button name="hapus_dcl" class="btn btn-danger hapus_dcl delete-btn-dcl" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl2 invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_dcl2" class="btn btn-danger hapus_dcl2 delete-btn-dcl2" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl3 invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_dcl3" class="btn btn-danger hapus_dcl3 delete-btn-dcl3" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl4 invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_dcl4" class="btn btn-danger hapus_dcl4 delete-btn-dcl4" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl5 invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_dcl5" class="btn btn-danger hapus_dcl5 delete-btn-dcl5" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl6 invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_dcl6" class="btn btn-danger hapus_dcl6 delete-btn-dcl6" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl7 invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_dcl7" class="btn btn-danger hapus_dcl7 delete-btn-dcl7" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-dcl8 invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_dcl8" class="btn btn-danger hapus_dcl8 delete-btn-dcl8" type="button"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
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

<div id="gambar_situasi_dinamis">

</div>

<div id="modal_return" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_return" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Return Pengajuan Kredit</h1>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Nama Debitur</label>
                        <div class="col-lg-12">
                            <input id="nama_debitur_return" name="nama_debitur_return" type="text" placeholder="" class="form-control" readonly>
                            <input id="kd_data_return" name="kd_data_return" type="hidden" placeholder="" class="form-control" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Alasan</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" id="catatan_return" name="catatan_return" rows="3" required></textarea>
                        </div>

                    </div>


                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tutup</button>
                    <input id="btns_921" class="btn btn-sm btn-danger" type="submit" value="Return">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="modal_reject" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_reject" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Reject Pengajuan Kredit</h1>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Nama Debitur</label>
                        <div class="col-lg-12">
                            <input id="nama_debitur_reject" name="nama_debitur_reject" type="text" placeholder="" class="form-control" readonly>
                            <input id="kd_data_reject" name="kd_data_reject" type="hidden" placeholder="" class="form-control" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Alasan</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" id="catatan_reject" name="catatan_reject" rows="3" required></textarea>
                        </div>

                    </div>


                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tutup</button>
                    <input id="btns_921" class="btn btn-sm btn-danger" type="submit" value="Reject">
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
<script src="<?= base_url(); ?>public/assets/js/plugins/ckeditor/ckeditor.js"></script>

<!-- Jquery Validate -->
<script src="<?= base_url(); ?>public/assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url(); ?>public/assets/js-manual/script_cadangan.js"></script>
<script>
    var base_url = "<?php echo base_url(); ?>";
    $(document).ready(function() {
        tampil_disposisi('<?php echo $data_entry->kd_data ?>')

        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            enableAllSteps: true,
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
                resizeJquerySteps();
                if (currentIndex == 0) {
                    tampil_button('save_data_entry')
                } else if (currentIndex == 1) {
                    tampil_button('save_fcr')
                    // refresh_fcr()
                } else if (currentIndex == 2) {
                    tampil_button('save_fcr_usaha')
                    // refresh_fcr_usaha()
                } else if (currentIndex == 3) {
                    tampil_button('save_fcr_agunan')
                    tampil_button_simpan_agunan('<?php echo $data_entry->kd_data ?>')
                    // refresh_fcr_agunan()
                } else if (currentIndex == 4) {
                    tampil_button('save_dokumen')
                } else if (currentIndex == 5) {
                    tampil_button('save_scoring')
                    // console.log('ini current index: '+ currentIndex)
                } else
                if (currentIndex === 6) {
                    // tampil_button("save_fak_data");
                    tampil_button('save_fak_data');

                    resizeJquerySteps();
                } else if (currentIndex === 7) {
                    // tampil_button("save_fak_modal");
                    tampil_button('save_fak_modal');

                    resizeJquerySteps();
                } else if (currentIndex === 8) {
                    // tampil_button("save_fak_rl");
                    tampil_button('save_fak_rl');

                    resizeJquerySteps();
                } else if (currentIndex === 9) {
                    // tampil_button("save_lap_rl");
                    tampil_button('save_lap_rl');

                    resizeJquerySteps();
                } else if (currentIndex === 10) {
                    // tampil_button("save_ceftb");
                    tampil_button('save_ceftb');

                    resizeJquerySteps();
                } else if (currentIndex === 11) {
                    tampil_button('save_faa');

                    // tampil_button("save_faa");
                    resizeJquerySteps();
                } else if (currentIndex === 12) {
                    // tampil_button("save_mauk");
                    tampil_button('save_mauk');

                    resizeJquerySteps();
                } else if (currentIndex === 13) {
                    tampil_button('save_dcl');

                    // tampil_button("save_dcl");
                    resizeJquerySteps();
                } else if (currentIndex === 14) {
                    // tampil_button("save_scoring");
                    tampil_button('save_scoring');

                    resizeJquerySteps();
                } else if (currentIndex === 15) {
                    // tampil_button("recap");
                    checkRecap('tb_data_entry', kd_data, 'data_entry')
                    checkRecap('tb_fcr', kd_data, 'fcr')
                    checkRecap('tb_fcr_agunan', kd_data, 'fcr_agunan')
                    checkRecap('tb_fcr_usaha', kd_data, 'fcr_usaha')
                    checkRecap('tb_scoring', kd_data, 'scoring')
                    checkRecap('tb_fak_data', kd_data, 'fak_data')
                    checkRecap('tb_fak_modal', kd_data, 'fak_modal')
                    checkRecap('tb_fak_rl', kd_data, 'fak_rl')
                    checkRecap('tb_lap_rl', kd_data, 'lap_rl')
                    checkRecap('tb_mauk', kd_data, 'mauk')
                    checkRecap('tb_dcl', kd_data, 'dcl')
                    tampil_button('save_recap');
                    tampil_btn_finish('<?php echo $data_entry->kd_data ?>')
                    tampil_disposisi('<?php echo $data_entry->kd_data ?>')

                    resizeJquerySteps();
                    // } else if (currentIndex == 6) {
                    //     // console.log('ini current index: '+ currentIndex)

                    //     // isi_recap()
                    // } else if (currentIndex == 7) {} else if (currentIndex == 8) {} else if (currentIndex == 9) {} else if (currentIndex == 10) {} else if (currentIndex == 11) {} else if (currentIndex == 12) {} else if (currentIndex == 13) {
                    //     tampil_button('save_scoring')
                    // refresh_scoring()
                } else {
                    // console.log('ini current index: '+ currentIndex)
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

                // // Serialize form data
                // var formData = form.serialize();
                // // console.log(formData)
                // $('#mohon').show()
                // // Send AJAX request to CodeIgniter 4 controller method
                // $.ajax({
                //     url: "<?php echo base_url() ?>home/simpan_permohonan",
                //     type: "POST",
                //     data: formData,
                //     success: function(data) {
                //         // Handle successful response
                //         // console.log(data)
                //         if (data == 1) {
                //             $('#mohon').hide()
                //             alert('Data Berhasil Disimpan')
                //             // toastr.success('Data Berhasil Disimpan', 'Berhasil');
                //             window.location.href = "<?php echo base_url() ?>home/e-form";
                //         } else {
                //             // alert(data)
                //             $('#mohon').hide()
                //             toastr.warning(data, 'Data Gagal Disimpan');
                //         }
                //     },
                //     error: function(xhr, status, error) {
                //         // Handle error response
                //         // console.log(error)
                //     }
                // });

                return true;
            },

        });

        var save_data_entry = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_data_entry" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Data Entry</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_data_entry);

        var save_fcr = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> FCR</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr);

        var save_fcr_usaha = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr_usaha" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> FCR Usaha</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr_usaha);

        var save_fcr_agunan_bergerak = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr_agunan_bergerak" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Barang Bergerak</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr_agunan_bergerak);

        var save_fcr_agunan_lingkungan = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr_agunan_lingkungan" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Lingkungan</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr_agunan_lingkungan);

        var save_fcr_agunan_bangunan = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr_agunan_bangunan" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Bangunan</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr_agunan_bangunan);

        var save_fcr_agunan_tanah = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fcr_agunan_tanah" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Tanah</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fcr_agunan_tanah);

        var save_dokumen = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_dokumen" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Dokumen</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_dokumen);

        var save_scoring = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_scoring" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Scoring</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_scoring);

        var save_recap = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_recap" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Recap</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_recap);

        var save_reject = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_reject" class="red-bg"><i class="fa fa-close"></i> Reject</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_reject);

        var save_return = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_return" class="yellow-bg"><i class="fa fa-undo"></i> Return</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_return);

        var save_fak_data = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fak_data" onclick="click_save_data_fak_data()" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fak_data);
        var save_fak_modal = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fak_modal" onclick="click_save_data_fak_modal()" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fak_modal);
        var save_fak_rl = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fak_rl" onclick="click_save_data_fak_rl()" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fak_rl);
        var save_lap_rl = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_lap_rl" onclick="click_save_data_lap_rl()" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_lap_rl);
        var save_ceftb = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" onclick="click_save_data_ceftb()" id="save_ceftb" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_ceftb);
        var save_faa = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_faa" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_faa);
        var save_mauk = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_mauk" onclick="click_save_data_mauk()" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_mauk);
        var save_dcl = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_dcl" onclick="click_save_data_dcl()" class="blue-bg">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_dcl);
        // var save_scoring = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_scoring" class="blue-bg">Save</a></li>'
        // );
        // $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_scoring);
        // var save_recap = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_recap" class="blue-bg">Save</a></li>'
        // );
        // $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_recap);

        // Format mata uang dengan jquery mask.
        $('.uang').mask('000,000,000,000,000,000,000,000', {
            reverse: true
        });

    });
</script>

<?php include 'v_data_entry.php'; ?>
<?php include 'v_fcr.php'; ?>
<?php include 'v_fcr_usaha.php'; ?>
<?php include 'v_fcr_agunan.php'; ?>
<?php include 'v_dokumen_ceklist.php'; ?>
<?php include 'v_scoring.php'; ?>
<?php include 'v_recap.php'; ?>
<?php include 'v_finish.php'; ?>

<?= $this->endSection(); ?>