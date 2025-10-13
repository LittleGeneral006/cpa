<?php // if($tampil_faa){ 
?>
<h1>FAA</h1>
<fieldset>
    <h2>Data Formulir Analisa Agunan</h2>
    <div id="faa_tanah">
    </div>
    <div id="faa_bb">
    </div>
    <!-- <div class="luasbangunan">

    </div> -->
    <br>
    <br>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_faa" title="Checkbox ini sebagai paraf" name="cb_faa"
                    <?php echo (!empty($edit_data) && !empty($edit_data_koordinator)) ? '' : 'disabled'; ?>>

            </div>
        </div>
    </div>
</fieldset>
<?php // } 
?>