<!-- disini coding viewnya -->
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
                <textarea class="form-control" id="lokasi_edit" name="lokasi_edit" rows="3" ></textarea>
                <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Lokasi;Lokasi B;Lokasi C</p>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tujuan Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="tujuan_kunjungan_edit" name="tujuan_kunjungan_edit" rows="3" ></textarea>

            </div>
        </div>



    </div>
    <div class="form-group row">



        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Hasil Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="hasil_kunjungan_edit" name="hasil_kunjungan_edit" rows="3" ></textarea>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tindak Lanjut</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="tindak_lanjut_edit" name="tindak_lanjut_edit" rows="3" ></textarea>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_fcr" title="Checkbox ini sebagai paraf" name="cb_fcr" <?php echo empty($edit_data) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

</fieldset>
