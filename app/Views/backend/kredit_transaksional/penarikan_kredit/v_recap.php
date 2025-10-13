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
                    <td>Data Induk</td>
                    <td>
                        <!-- <span id="data_entry1" style="display: none;">Oke</span><span id="data_entry2" style="display: none;">Not Oke</span> -->
                        <span id="data_entry1">Oke</span><span id="data_entry2">Not Oke</span>
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
                        <span id="fcr1">Oke</span><span id="fcr2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        3
                    </td>
                    <td>
                       Dokumen Checklist 
                    </td>
                    <td>
                        <span id="dokumen_checklist1">Oke</span><span id="dokumen_checklist2">Not Oke</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        4
                    </td>
                    <td>
                        MPDKK
                    </td>
                    <td>
                        <span id="mpdkk1">Oke</span><span id="mpdkk2">Not Oke</span>
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
                    <textarea class="form-control" <?php echo !empty($edit_data) ? '' : 'disabled'; ?> id="disposisi_sc" name="disposisi_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Koordinator Pemasar</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?> id="disposisi_koordinator_pemasar_sc" name="disposisi_koordinator_pemasar_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Cabang</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_kepala_cabang) ? '' : 'disabled'; ?> id="disposisi_kepala_cabang_sc" name="disposisi_kepala_cabang_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Analis Kredit</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_analis_kredit) ? '' : 'disabled'; ?> id="disposisi_analis_kredit_sc" name="disposisi_analis_kredit_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Bagian</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_kepala_bagian) ? '' : 'disabled'; ?> id="disposisi_kepala_bagian_sc" name="disposisi_kepala_bagian_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Divisi</label>
                <div class="col-lg-12">
                    <textarea class="form-control" <?php echo !empty($edit_data_kepala_divisi) ? '' : 'disabled'; ?> id="disposisi_kepala_divisi_sc" name="disposisi_kepala_divisi_sc" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<script>

</script>