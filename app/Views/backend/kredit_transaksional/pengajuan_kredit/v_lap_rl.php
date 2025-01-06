<?php // if($tampil_upload_laporan_rl){ 
?>
<h1>Upload Laporan RL</h1>
<fieldset>
    <h2>Upload Laporan RL</h2>
    <h2 class="text-center text-danger">Upload Laporan Keuangan</h2>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Laporan Rugi Laba</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="laporan_rugi_laba_upload_lap_rl" name="laporan_rugi_laba_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                <button type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> class="btn btn-link lihat-dokumen" data-id="laporan_rugi_laba_upload_lap_rl">Lihat Dokumen</button>
            </div>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Neraca</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="neraca_upload_lap_rl" name="neraca_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                <button type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> class="btn btn-link lihat-dokumen" data-id="neraca_upload_lap_rl">Lihat Dokumen</button>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Depresiasi</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="depresiasi_upload_lap_rl" name="depresiasi_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                <button type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> class="btn btn-link lihat-dokumen" data-id="depresiasi_upload_lap_rl">Lihat Dokumen</button>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">

        </div>
        <label class="col-lg-3 control-label">Rasio Laporan Keuangan</label>
        <div class="col-lg-3">
            <div class="col-lg-12">
                <input id="rasio_lap_keuangan_upload_lap_rl" name="rasio_lap_keuangan_upload_lap_rl" type="file" placeholder="" class="form-control class-readonly">
                <button type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> class="btn btn-link lihat-dokumen" data-id="rasio_lap_keuangan_upload_lap_rl">Lihat Dokumen</button>
            </div>
        </div>
    </div>
    <br>
</fieldset>
<?php // } 
?>