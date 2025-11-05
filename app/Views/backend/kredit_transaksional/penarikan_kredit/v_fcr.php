<!-- disini coding viewnya -->
<h1>Formulir Call Report</h1>
<fieldset>
    <h2>Formulir Call Report</h2>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Nomor</label>
                <div class="col-lg-12">
                    <input id="nomor" name="nomor" type="text" placeholder="" class="form-control class-readonly" readonly>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Tanggal</label>
                <div class="col-lg-12">
                    <input id="tanggal" readonly name="tanggal" type="date" placeholder="" class="form-control class-readonly">

                </div>
            </div>

        </div>


    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Nama Debitur</label>
            <div class="col-lg-12">
                <input id="nama_debitur" readonly name="nama_debitur" type="text" placeholder="" class="form-control class-readonly">

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Alamat Kantor</label>
            <div class="col-lg-12">
                <textarea class="form-control" readonly id="alamat_kantor" name="alamat_kantor" rows="3"></textarea>

            </div>
        </div>


    </div>
    <div class="form-group row">


        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Alamat Gudang/ Pabrik/ Workshop</label>
            <div class="col-lg-12">
                <textarea class="form-control" readonly id="alamat_gudang" name="alamat_gudang" rows="3"></textarea>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Group Debitur</label>
            <div class="col-lg-12">
                <input id="group_debitur" readonly name="group_debitur" type="text" placeholder="" class="form-control class-readonly">

            </div>
        </div>



    </div>

    <div class="form-group row">


        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Contact Person</label>

            <div class="col-lg-12">
                <textarea class="form-control" id="contact_person" name="contact_person" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Abdullah;Fitriani;Ahmad Rossy</p>
            </div>


        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Yang Melaksanakan Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="kunjungan" name="kunjungan" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>
                <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Abdullah;Fitriani;Ahmad Rossy</p>


            </div>
        </div>



    </div>
    <div class="form-group row">

        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Unit Kerja</label>
            <div class="col-lg-12">
                <select class="form-control class-disabled select" id="kd_unit_kerja" name="kd_unit_kerja" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>

                </select>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tanggal Kunjungan</label>
            <div class="col-lg-12">
                <input id="tanggal_kunjungan" name="tanggal_kunjungan" type="date" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

            </div>
        </div>


    </div>
    <div class="form-group row">



        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Lokasi Yang Dikunjungi</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="lokasi" name="lokasi" rows="3" ></textarea>
                <p class="text-danger">Pisahkan dengan tanda titik koma (;) jika data lebih dari satu<br>Contoh: Lokasi;Lokasi B;Lokasi C</p>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tujuan Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="tujuan_kunjungan" name="tujuan_kunjungan" rows="3" ></textarea>

            </div>
        </div>



    </div>
    <div class="form-group row">



        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Hasil Kunjungan</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="hasil_kunjungan" name="hasil_kunjungan" rows="3" ></textarea>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Tindak Lanjut</label>
            <div class="col-lg-12">
                <textarea class="form-control" id="tindak_lanjut" name="tindak_lanjut" rows="3" ></textarea>
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
