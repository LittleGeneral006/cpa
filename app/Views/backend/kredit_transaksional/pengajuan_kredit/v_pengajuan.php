<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

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
        <?php if ($tambah_pengajuan_kredit_transaksional) { ?>
            <button id="tambah_pengajuan" class="btn-primary btn" onclick="tambah_pengajuan()"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Tambah Data</span></button>
        <?php } ?>
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

                    <div class="table-responsive">
                        <table id="tabel_pengajuan" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->
                                    <th>Nomor Aplikasi Kredit</th>
                                    <th>Tanggal Isi Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Posisi Progress</th>
                                    <th>Progress</th>
                                    <th>Scoring</th>
                                    <th>SLA</th>
                                    <th>Unit Kerja</th>
                                    <th>Status</th>
                                    <!-- <th>Aksi</th> -->
                                    <th>Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_pengajuan_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_pengajuan_tambah" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Data Entry</h1>
                    </div>
                    <br>
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
                                <input id="nilai_proyek_tambah" name="nilai_proyek_tambah" type="number" placeholder="" class="form-control class-readonly">
                                <p>Nilai Proyek: <span id="nilai_proyek_tambah_separator" class="mask"></span></p>
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
                            <label class="col-lg-12 control-label">Upload Dokumen Kontrak Proyek</label>
                            <div class="col-lg-12">
                                <input type="file" class="form-control form-control-file" name="upload_dokumen_tambah" id="upload_dokumen_tambah" accept=".pdf">
                                <small class="form-text text-muted">File PDF, maksimal 2 MB</small>

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
                                <input id="plafond_tambah" name="plafond_tambah" type="number" placeholder="" class="form-control class-readonly">
                                <p>Plafond: <span id="plafond_separator" class="mask"></span></p>
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
                                    <select name="jumlah_agunan_tambah" id="jumlah_agunan_tambah" class="form-control" onchange="tambahInput()">
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
                            <div id="input_agunan" class=""></div>
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
<div id="modal_pengajuan_detail" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Unit Kerja</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <!-- <div class="ibox-content" style="height: 400px"> -->
                                    <h2 class="text-center">Detail Unit kerja <span id="nama_pengajuan_detail"></span></h2>
                                    <!-- <p>
                                        Berikut adalah detail permohonan e-form dari <div id="nama_nasabah_detail"></div>
                                    </p> -->

                                    <div class="clients-list">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-university"></i> Unit Kerja</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>

                                                                <tr>
                                                                    <td class="font-weight-bold">Kode Unit</td>
                                                                    <td id="dkd_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kode Induk Unit</td>
                                                                    <td id="dkd_induk_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama Unit</td>
                                                                    <td id="dnama_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Alamat Unit</td>
                                                                    <td id="dalamat_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Telepon Unit</td>
                                                                    <td id="dtelpon_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Status</td>
                                                                    <td id="daktif_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Pembuat</td>
                                                                    <td id="dmaker_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Waktu Dibuat</td>
                                                                    <td id="dwaktu_maker_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pembuat</td>
                                                                    <td id="dkd_pengajuan_maker_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Pengubah</td>
                                                                    <td id="dupdater_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Terakhir Diubah</td>
                                                                    <td id="dwaktu_updater_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Unit Pengubah</td>
                                                                    <td id="dkd_pengajuan_updater_pengajuan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Didaftarkan oleh Unit Kerja/ Induk</td>
                                                                    <td id="dkd_cab_pengajuan"></td>
                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div id="702_fb" class="modal-footer">
                    <button type="button" class="btn btn-danger cabut-readonly" data-dismiss="modal">Tutup</button>
                    <!-- <input id="btns_702" class="btn btn-sm btn-primary m-t-n-xs" type="submit" value="Hapus"> -->

                </div>
            </div>
            <!-- </form> -->

        </div>
    </div>
</div>
<div id="modal_pengajuan_generate" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h1 class="modal-title">Generate Dokumen</h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="text-center text-danger">Cetak Dokumen Pengajuan</h2>
                        <input type="hidden" id="id_generate">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Proses</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Formulir Call Report (FCR)</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="fcr_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Lampiran FCR - Usaha</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="fcr_usaha_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Lampiran FCR - Agunan</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="fcr_agunan_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Document Checklist</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="fcr_dok_ceklist_gen">Generate</button></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="text-center text-danger">Cetak Dokumen Analisa</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Proses</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Formulir Analisa Keuangan (FAK)</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="fak_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Formulir Analisa Agunan (FAA)</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="faa_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Memo Analisa dan Usulan Kredit (MAUK)</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="mauk_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Document Checklist Compliance</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="dcc_gen">Generate</button></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="text-center text-danger">Cetak Dokumen Persetujuan</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Proses</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Scoring</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="scoring_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Formulir Keputusan Kredit</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="fkk_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Memo Keputusan Kredit (MKK)</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="mkk_gen">Generate</button></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="text-center text-danger">Cetak Dokumen Lanjutan</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Proses</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>SP2K</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="sp2k_gen">Generate</button></td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Perjanjian Kredit (PK)</td>
                                    <td><button type="button" class="btn btn-link generate-dokumen" data-id="pk_gen">Generate</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div id="921_fb" class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                <br>
                <br>
                <br>
                <br>
            </div>


        </div>
    </div>
</div>
<!-- history return -->
<div id="modal_return" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h1 class="modal-title">History Return</h1>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h2 class="text-center text-danger">History Return</h2> -->
                        <table id="tabel_return" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Direturn Oleh</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Posisi Progress</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Waktu</th>

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div id="921_fb" class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                <br>
                <br>
                <br>
                <br>
            </div>


        </div>
    </div>
</div>


<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script>
    var table = [];
    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';


    $(document).ready(function() {

        var table = $('#tabel_pengajuan').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>pengajuan/tabel_pengajuan",
            "columnDefs": [{
                    "targets": 0,
                    "width": "15%"
                },
                {
                    "targets": 1,
                    "width": "15%"
                },
                {
                    "targets": 2,
                    "width": "15%"
                },
                {
                    "targets": 3,
                    "width": "15%"
                },
                {
                    "targets": 4,
                    "width": "15%"
                },
                {
                    "targets": 5,
                    "width": "15%"
                },
                {
                    "targets": 6,
                    "width": "15%"
                },
                {
                    "targets": 7,
                    "width": "15%"
                },
                {
                    "targets": 8,
                    "width": "15%"
                },
                {
                    "targets": 9,
                    "width": "15%"
                },


            ],
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {
                    "bSortable": false
                }
            ],
            "dom": '<"html5buttons"B>lTfgitp',
            "lengthMenu": [
                ['15', '25', '50', '100', '-1'],
                ['15', '25', '50', '100', 'All'],
            ],
            "buttons": [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 1, dan 2 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 2, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Pengajuan Kredit Transaksional',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 3, 4, 5, 6, 7, 8, dan 6, 7, 8 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Pengajuan Kredit Transaksional',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 1, da akan di-export
                    }
                },
                {
                    "extend": 'print',
                    "customize": function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });

        $('#tabel_pengajuan tbody ').on('click', '#detail_pengajuan', function() {
            // newx_702 = 1;
            // document.getElementById("form_pengajuan_hapus").reset();
            var data = table.row($(this).parents('tr')).data();
            $("#modal_pengajuan_detail").modal('show')

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>unit_kerja/get_tabel_pengajuan_by_id/" + data[5],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#nama_pengajuan_detail').html(data[7]);
                    $('#dkd_pengajuan').html(data[5]);
                    $('#dkd_induk_pengajuan').html(data[6]);
                    $('#dnama_pengajuan').html(data[7]);
                    $('#dalamat_pengajuan').html(data[8]);
                    $('#dtelpon_pengajuan').html(data[9]);
                    $('#daktif_pengajuan').html(data[18]);

                    $('#dmaker_pengajuan').html(data[11]);
                    $('#dwaktu_maker_pengajuan').html(data[12]);
                    $('#dkd_pengajuan_maker_pengajuan').html(data[13]);

                    $('#dupdater_pengajuan').html(data[14]);
                    $('#dwaktu_updater_pengajuan').html(data[15]);
                    $('#dkd_pengajuan_updater_pengajuan').html(data[16]);

                    $('#dkd_cab_pengajuan').html(data[17]);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data");
                }
            });
            // batas baru

        });
        $(".generate-dokumen").on("click", function() {
            var id_dok = $(this).data('id');
            generateDok(id_dok)
            // Lakukan sesuatu dengan nilai data-id yang telah diambil
            // console.log('Nilai data-id:', data_id);
        });
        // panggil separator
        separator_input('nilai_proyek_tambah', 'nilai_proyek_tambah_separator')
        separator_input('plafond_tambah', 'plafond_separator')

    });

    function tambah_pengajuan() {
        document.getElementById("form_pengajuan_tambah").reset();
        isi_data_entry();
        $("#modal_pengajuan_tambah").modal('show')
    }

    function isi_data_entry() {
        // isi pemroses
        $.ajax({
            url: "<?php echo base_url() ?>pemroses/get_tabel_pemroses_by_unit",
            type: "get",
            dataType: "JSON",
            success: function(response) {
                // console.log(response)
                if (response.status == 'success') {
                    var data = response.data
                    $('#pemasar_tambah').val('<?php echo session()->get('nama_user') ?>');
                    $('#koordinator_pemasar_tambah').val(data.koordinator_pemasar);
                    $('#kepala_cabang_tambah').val(data.kepala_cabang);
                    $('#kepala_bagian_tambah').val(data.kepala_bagian);
                    $('#kepala_divisi_tambah').val(data.kepala_divisi);

                    var kd_unit = data.unit_kerja;
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
                    alert(response.data);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal mendapatkan data");
            }
        });
        // batas isi pemroses
    }
    // agunan dinamis
    // function tambahInput() {
    //     var jumlah = document.getElementById("jumlah_agunan_tambah").value;
    //     var inputAgunan = document.getElementById("input_agunan");
    //     inputAgunan.innerHTML = ''; // Reset inputan

    //     for (var i = 0; i < jumlah; i++) {
    //         var inputGroup = document.createElement("div");
    //         inputGroup.classList.add("form-group");
    //         inputGroup.classList.add("col-lg-12");

    //         var label = document.createElement("label");
    //         label.className = "col-lg-12 control-label";
    //         label.innerHTML = "Jenis Agunan " + (i + 1);

    //         var input = document.createElement("input");
    //         input.type = "text";
    //         input.name = "jenis_agunan_tambah[]";
    //         input.classList.add("form-control");
    //         input.placeholder = "Tanah/ Tanah dan Bangunan | Barang Bergerak | Tunai | Penjaminan Lembaga Penjamin";
    //         // Tambahkan atribut required ke input
    //         input.required = true;

    //         inputGroup.appendChild(label);
    //         inputGroup.appendChild(input);
    //         inputAgunan.appendChild(inputGroup);
    //     }
    // }

    function tambahInput() {
        var jumlah = $("#jumlah_agunan_tambah").val(); // Mengambil nilai dengan jQuery
        var inputAgunan = $("#input_agunan"); // Mengambil elemen dengan jQuery
        inputAgunan.html(''); // Reset inputan

        // Opsi dropdown sesuai dengan placeholder
        var options = [
            "Tanah/ Tanah dan Bangunan",
            "Barang Bergerak",
            "Tunai",
            "Penjaminan Lembaga Penjamin"
        ];

        for (var i = 0; i < jumlah; i++) {
            // Buat elemen div
            var inputGroup = $('<div class="form-group col-lg-12"></div>');

            // Buat elemen label
            var label = $('<label class="col-lg-12 control-label">Jenis Agunan ' + (i + 1) + '</label>');

            // Buat elemen select
            var select = $('<select name="jenis_agunan_tambah[]" class="form-control" required></select>');

            // Tambahkan opsi ke select
            $.each(options, function(index, value) {
                select.append('<option value="' + value + '">' + value + '</option>');
            });

            // Tambahkan label dan select ke dalam inputGroup
            inputGroup.append(label);
            inputGroup.append(select);

            // Masukkan inputGroup ke dalam inputAgunan
            inputAgunan.append(inputGroup);
        }
    }

    function generate_dok(kd_data) {
        $('#modal_pengajuan_generate').modal('show');
        $('#id_generate').val(CryptoJS.SHA1(kd_data));
        // alert(kd_data)

    }

    function modal_return(kd_data) {
        $('#modal_return').modal('show');
        $('#tabel_return tbody').empty();
        // baru
        $.ajax({
            url: "<?php echo base_url() ?>pengajuan/get_tabel_return/" + kd_data,
            type: "get",
            dataType: "JSON",
            success: function(response) {
                // console.log(response)
                if (response.status == 'success') {
                    var angka = 0;
                    // Generate table rows using $.each
                    $.each(response.message, function(index, value) {
                        // Append each row to the table body
                        angka++
                        $('#tabel_return tbody').append(
                            '<tr>' +
                            '<td>' + angka + '</td>' +
                            '<td>' + value.nama + '</td>' +
                            '<td>' + value.nama_level + '</td>' +
                            '<td>' + value.posisi_progress + '</td>' +
                            '<td>' + value.progress + '</td>' +
                            '<td>' + value.catatan + '</td>' +
                            '<td>' + value.nama_unit + '</td>' +
                            '<td>' + value.waktu_return + '</td>' +
                            '</tr>'
                        );
                    });

                } else {
                    $('#tabel_return tbody').append(
                        '<tr class="text-center">' +
                        '<td colspan="8">Tidak ada data</td>' +
                        '</tr>'
                    );
                }


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal get data return pengajuan kredit(2)");
            }
        });

    }
    // batas agunan dinamis
    // tambah data
    $('#form_pengajuan_tambah').on('submit', function(e) {
        e.preventDefault();
        $('#mohon').show()
        $.ajax({
            url: "<?php echo base_url('pengajuan/simpan_pengajuan'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == '1') {
                    $("#modal_pengajuan_tambah").modal('hide')
                    $('#mohon').hide()
                    toastr.success('Simpan Data Berhasil', 'Berhasil')
                    $('#tabel_pengajuan').DataTable().ajax.reload();
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

    function generateDok(param) {
        // Ambil nilai kd_data dari $data_entry
        var id_dok = CryptoJS.SHA1(param);
        // alert(id_dok)
        var kd_data = $('#id_generate').val()

        // Bangun URL dengan base_url dan kd_data
        var url = "<?php echo base_url() ?>generate-dokumen/" + kd_data + "/" + id_dok;

        // Buka tautan dalam tab baru
        window.open(url, '_blank');
    }

    // fungsi separator input
    function formatNumber(num) {
        // Ubah angka menjadi string dan pisahkan bagian integer dan desimal
        var parts = num.toString().split(".");

        // Ganti ribuan separator dengan titik
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        // Jika ada bagian desimal, gabungkan kembali dengan koma sebagai pemisah desimal
        return parts.join(",");
    }

    function separator_edit(angka, id_letak) {
        // var hasil = '';
        if (angka != '' && angka != null) {
            var angka_olah = formatNumber(angka);
            // console.log(angka)
            // console.log(id_letak)

            $('#' + id_letak).text(angka_olah);
        } else {
            $('#' + id_letak).text('');
        }
    }

    function separator_input(pokok_field, pokok_separator) {
        $('#' + pokok_field).on('input', function() {
            var inputValue = $(this).val();
            var formattedValue = formatNumber(inputValue);
            $('#' + pokok_separator).text(formattedValue);
        });
    }
</script>

<?= $this->endSection(); ?>