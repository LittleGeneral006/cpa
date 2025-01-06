<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<link href="<?= base_url(); ?>public/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?= base_url(); ?>public/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
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


                        <?php include 'v_data_entry.php'; ?>
                        <?php include 'v_fcr.php'; ?>
                        <?php include 'v_fcr_usaha.php'; ?>
                        <?php include 'v_fcr_agunan.php'; ?>
                        <?php include 'v_dokumen_ceklist.php'; ?>
                        <?php include 'v_scoring.php'; ?>

                        <!-- koordinator -->
                        <?php include 'v_fak_data.php'; ?>
                        <?php include 'v_fak_modal.php'; ?>
                        <?php include 'v_fak_proyeksi_rl.php'; ?>
                        <?php include 'v_lap_rl.php'; ?>
                        <?php include 'v_ceftb.php'; ?>
                        <?php include 'v_faa.php'; ?>
                        <?php include 'v_mauk.php'; ?>
                        <?php include 'v_dcl.php'; ?>
                        <?php include 'v_scoring_koor.php'; ?>

                        <!-- recap -->
                        <?php include 'v_recap.php'; ?>


                        <!-- batas baru -->
                        <!-- baru -->


                        <!-- batas baru -->
                        <!-- baru -->

                        <!-- batas baru -->
                        <!-- baru -->


                        <!-- batas baru -->
                        <!-- baru -->



                        <!-- batas baru -->
                        <!-- batas baru -->
                        <!-- baru -->

                        <!-- batas baru -->



                    </form>
                </div>
            </div>
        </div>
        <input type="text" hidden name="kd_data" id="kd_data">

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
        <input type="text" hidden name="hasiltotalceft" id="hasiltotalceft">
        <input type="text" hidden name="nilaicheckboxcefb" id="nilaicheckboxcefb">
        <input type="text" hidden name="hasilcheckboxcefb" id="hasilcheckboxcefb">
        <input type="text" hidden name="hasiltotalcefb" id="hasiltotalcefb">

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

        <input type="text" hidden name="fasilitaskreditdcl" id="fasilitaskreditdcl">
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

        <input type="text" hidden name="pengujianlainnyadcl" id="pengujianlainnyadcl">
        <input type="text" hidden name="dasarpengujianlainnyadcl" id="dasarpengujianlainnyadcl">
        <input type="text" hidden name="checklistpengujianlainnyadcl" id="checklistpengujianlainnyadcl">

        <input type="text" hidden name="namanasabahfaatb" id="namanasabahfaatb">
        <input type="text" hidden name="nomorshmfaatb" id="nomorshmfaatb">
        <input type="text" hidden name="tanggalshmfaatb" id="tanggalshmfaatb">
        <input type="text" hidden name="namapemilikshmfaatb" id="namapemilikshmfaatb">
        <input type="text" hidden name="alamatagunanfaatb" id="alamatagunanfaatb">
        <input type="text" hidden name="hargapasartanahfaatb" id="hargapasartanahfaatb">
        <input type="text" hidden name="hargabukutanahfaatb" id="hargabukutanahfaatb">
        <input type="text" hidden name="hargamenurutpejabatbanktanahfaatb" id="hargamenurutpejabatbanktanahfaatb">
        <input type="text" hidden name="hargatanahtanahfaatb" id="hargatanahtanahfaatb">
        <input type="text" hidden name="luaspersegitanahtanahfaatb" id="luaspersegitanahtanahfaatb">
        <input type="text" hidden name="hasilperhitunganpenilaiantanahfaatb" id="hasilperhitunganpenilaiantanahfaatb">

        <input type="text" hidden name="namanasabahbb" id="namanasabahbb">
        <input type="text" hidden name="jenisdokumenbb" id="jenisdokumenbb">
        <input type="text" hidden name="alamatbb" id="alamatbb">
        <input type="text" hidden name="jenisbb" id="jenisbb">
        <input type="text" hidden name="modeltipebb" id="modeltipebb">
        <input type="text" hidden name="merekccbb" id="merekccbb">
        <input type="text" hidden name="tahunpembuatanbb" id="tahunpembuatanbb">
        <input type="text" hidden name="serialnumberbb" id="serialnumberbb">
        <input type="text" hidden name="nomormesinbb" id="nomormesinbb">
        <input type="text" hidden name="warnabb" id="warnabb">
        <input type="text" hidden name="bahanbakarbb" id="bahanbakarbb">
        <input type="text" hidden name="kondisikeadaanbb" id="kondisikeadaanbb">
        <input type="text" hidden name="nomorpolisibb" id="nomorpolisibb">
        <input type="text" hidden name="buktikepemilikanagbbb" id="buktikepemilikanagbbb">
        <input type="text" hidden name="invoicenobb" id="invoicenobb">
        <input type="text" hidden name="invoicetanggalbb" id="invoicetanggalbb">
        <input type="text" hidden name="perubahanhakterakhirbb" id="perubahanhakterakhirbb">
        <input type="text" hidden name="tercatatatasnamabb" id="tercatatatasnamabb">
        <input type="text" hidden name="alamatpemiliksaatinibb" id="alamatpemiliksaatinibb">
        <input type="text" hidden name="umurteknisbb" id="umurteknisbb">
        <input type="text" hidden name="perkiraanumurekonomisbb" id="perkiraanumurekonomisbb">
        <input type="text" hidden name="tempatpenyimpananbb" id="tempatpenyimpananbb">
        <input type="text" hidden name="routebb" id="routebb">
        <input type="text" hidden name="nilaibukusebesarbb" id="nilaibukusebesarbb">
        <input type="text" hidden name="nilaitaksasisebesarbb" id="nilaitaksasisebesarbb">
        <input type="text" hidden name="safetymarginbb" id="safetymarginbb">
        <input type="text" hidden name="nilaiagunansetelahsmbb" id="nilaiagunansetelahsmbb">
        <input type="text" hidden name="cefbb" id="cefbb">
        <input type="text" hidden name="nilaiagunansetelahcefbb" id="nilaiagunansetelahcefbb">

        <!-- <div class="faa invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="copy-pp invisible">
            <div class="row new" id="new">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_termijn_fak_data" class="btn btn-danger hapus_termijn_fak_data delete-btn-termijn-fak-data" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                            <button name="hapus" class="btn btn-danger hapus delete-btn-pp-fak-modal" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                            <button name="hapus_mauk" class="btn btn-danger hapus_mauk delete-btn-mauk" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                            <button name="hapus_mauk2" class="btn btn-danger hapus_mauk2 delete-btn-mauk2" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                            <button name="hapus_mauk3" class="btn btn-danger hapus_mauk3 delete-btn-mauk3" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                            <button name="hapus_dcl" class="btn btn-danger hapus_dcl delete-btn-dcl" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_dcl2" class="btn btn-danger hapus_dcl2 delete-btn-dcl2" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_dcl3" class="btn btn-danger hapus_dcl3 delete-btn-dcl3" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_dcl4" class="btn btn-danger hapus_dcl4 delete-btn-dcl4" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_dcl5" class="btn btn-danger hapus_dcl5 delete-btn-dcl5" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_dcl6" class="btn btn-danger hapus_dcl6 delete-btn-dcl6" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_dcl7" class="btn btn-danger hapus_dcl7 delete-btn-dcl7" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                                <button name="hapus_dcl8" class="btn btn-danger hapus_dcl8 delete-btn-dcl8" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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


<script>
    var is_disabled = "<?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>";
</script>
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
    var kd_data_encrypt = "<?php echo sha1($data_entry->kd_data) ?>";
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
                    hitungSemua();
                } else if (currentIndex === 7) {
                    // tampil_button("save_fak_modal");
                    tampil_button('save_fak_modal');
                    hitungSemua();
                    resizeJquerySteps();
                } else if (currentIndex === 8) {
                    // tampil_button("save_fak_rl");
                    tampil_button('save_fak_rl');
                    hitungSemua();
                    resizeJquerySteps();
                } else if (currentIndex === 9) {
                    // tampil_button("save_lap_rl");
                    tampil_button('save_lap_rl');
                    hitungSemua();
                    resizeJquerySteps();
                } else if (currentIndex === 10) {
                    // tampil_button("save_ceftb");
                    tampil_button('save_ceftb');
                    hitungSemua();
                    resizeJquerySteps();
                } else if (currentIndex === 11) {
                    tampil_button('save_faa');
                    hitungSemua();
                    // tampil_button("save_faa");
                    resizeJquerySteps();
                } else if (currentIndex === 12) {
                    // tampil_button("save_mauk");
                    tampil_button('save_mauk');
                    hitungSemua();
                    resizeJquerySteps();
                } else if (currentIndex === 13) {
                    tampil_button('save_dcl');
                    hitungSemua();
                    // tampil_button("save_dcl");
                    resizeJquerySteps();
                } else if (currentIndex === 14) {
                    // tampil_button("save_scoring");
                    tampil_button('save_scoring_koor');

                    resizeJquerySteps();
                } else if (currentIndex === 15) {
                    // tampil_button("recap");
                    checkRecap('tb_data_entry', '<?php echo $data_entry->kd_data ?>', 'data_entry')
                    checkRecap('tb_fcr', '<?php echo $data_entry->kd_data ?>', 'fcr')
                    checkRecap('tb_fcr_agunan', '<?php echo $data_entry->kd_data ?>', 'fcr_agunan')
                    checkRecap('tb_fcr_usaha', '<?php echo $data_entry->kd_data ?>', 'fcr_usaha')
                    checkRecap('tb_scoring', '<?php echo $data_entry->kd_data ?>', 'scoring')
                    checkRecap('tb_fak_data', '<?php echo $data_entry->kd_data ?>', 'fak_data')
                    checkRecap('tb_fak_modal', '<?php echo $data_entry->kd_data ?>', 'fak_modal')
                    // checkRecap('tb_fak_modal', '<?php echo $data_entry->kd_data ?>', 'fak_modal')
                    checkRecap('tb_fak_rl', '<?php echo $data_entry->kd_data ?>', 'fak_rl')
                    checkRecap('tb_lap_rl', '<?php echo $data_entry->kd_data ?>', 'lap_rl')
                    checkRecap('tb_ceftb', '<?php echo $data_entry->kd_data ?>', 'ceftb')
                    checkRecap('tb_faa', '<?php echo $data_entry->kd_data ?>', 'faa')
                    checkRecap('tb_mauk', '<?php echo $data_entry->kd_data ?>', 'mauk')
                    checkRecap('tb_dcl', '<?php echo $data_entry->kd_data ?>', 'dcl')
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
                    // tampil_button('save_data_entry')
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

        var save_scoring_koor = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_scoring_koor" onclick="click_save_data_scoring_koor()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Scoring</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_scoring_koor);

        var save_recap = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_recap" class="blue-bg <?php echo !empty($edit_data) ? '' : ' disabled-link'; ?>"><i class="fa fa-save"></i> Recap</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_recap);

        var save_fak_data = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fak_data" onclick="click_save_data_fak_data()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fak_data);
        var save_fak_modal = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fak_modal" onclick="click_save_data_fak_modal()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fak_modal);
        var save_fak_rl = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_fak_rl" onclick="click_save_data_fak_rl()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_fak_rl);
        var save_lap_rl = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_lap_rl" onclick="click_save_data_lap_rl()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_lap_rl);
        var save_ceftb = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" onclick="click_save_data_ceftb()" id="save_ceftb" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_ceftb);
        var save_faa = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_faa" onclick="click_save_data_faa()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_faa);
        var save_mauk = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_mauk" onclick="click_save_data_mauk()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_mauk);
        var save_dcl = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_dcl" onclick="click_save_data_dcl()" class="blue-bg <?php echo !empty($edit_data_koordinator) ? '' : ' disabled-link'; ?>">Save</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_dcl);
        // var save_scoring = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_scoring" class="blue-bg">Save</a></li>'
        // );
        // $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_scoring);
        // var save_recap = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_recap" class="blue-bg">Save</a></li>'
        // );
        // $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_recap);

        var save_reject = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_reject" class="red-bg"><i class="fa fa-close"></i> Reject</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_reject);
        var save_return = $('<li class="" aria-disabled="false"><a href="#" role="menuitem" id="save_return" class="yellow-bg"><i class="fa fa-undo"></i> Return</a></li>');
        $('ul[aria-label=Pagination] li a[href="#next"]').parent().after(save_return);

        // Format mata uang dengan jquery mask.
        $('.uang').mask('000,000,000,000,000,000,000,000', {
            reverse: true
        });

    });
</script>

<?php include 'v_finish.php'; ?>

<?= $this->endSection(); ?>