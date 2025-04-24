<?php // if($tampil_cef){ 
?>
<h1>CEF (T or T&B only)</h1>
<fieldset>
    <h2 class="text-center text-danger">CEF (T or T&B only)</h2>
    <div id="ceftb">
    </div>
    <br>

    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_ceftb" title="Checkbox ini sebagai paraf" name="cb_ceftb"
                    <?php echo (!empty($edit_data) && !empty($edit_data_koordinator)) ? '' : 'disabled'; ?>>

            </div>
        </div>
    </div>
</fieldset>
<?php // } 
?>