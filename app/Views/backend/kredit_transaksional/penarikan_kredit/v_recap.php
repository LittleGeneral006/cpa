<h1>Recap</h1>
<fieldset>
    <?php
    function dispo_attr($field, $can_edit, $current_field, $active_field)
    {
        if ($can_edit && $field === $current_field && $field === $active_field) {
            return ''; // boleh edit
        }
        return 'readonly';
    }
    ?>
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
                    <textarea class="form-control" id="disposisi_pemasar" name="disposisi_pemasar" rows="3"
                         <?= dispo_attr('disposisi_pemasar', $can_edit, $current_field, $active_field); ?>></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Koordinator Pemasar</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="disposisi_koor_pemasar" name="disposisi_koor_pemasar" rows="3"
                         <?= dispo_attr('disposisi_koor_pemasar', $can_edit, $current_field, $active_field); ?>></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Cabang</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="disposisi_kacab" name="disposisi_kacab" rows="3"
                         <?= dispo_attr('disposisi_kacab', $can_edit, $current_field, $active_field); ?>></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Analis Kredit</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="disposisi_analis" name="disposisi_analis" rows="3"
                         <?= dispo_attr('disposisi_analis', $can_edit, $current_field, $active_field); ?>></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Bagian</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="disposisi_kabag" name="disposisi_kabag" rows="3"
                         <?= dispo_attr('disposisi_kabag', $can_edit, $current_field, $active_field); ?>></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label class="col-lg-12 control-label">Disposisi/ Rekomendasi Kepala Divisi</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="disposisi_kadiv" name="disposisi_kadiv"
                         <?= dispo_attr('disposisi_kadiv', $can_edit, $current_field, $active_field); ?>rows="3" ></textarea>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<script>

</script>