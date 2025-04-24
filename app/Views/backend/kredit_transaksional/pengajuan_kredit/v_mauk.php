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
                                    <input id="nama_nasabah_mauk" name="nama_nasabah_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">NPWP</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="npwp_mauk" name="npwp_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Direktur</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="direktur_mauk" name="direktur_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Key Person</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="key_person_mauk" name="key_person_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                </div>
                            </div>

                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Alamat kantor</label>
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="alamat_kantor_mauk" name="alamat_kantor_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Klasifikasi</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="klasifikasi_mauk" name="klasifikasi_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Bidang Usaha</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="bidang_usaha_mauk" name="bidang_usaha_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Jenis Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="jenis_fasilitas_mauk" name="jenis_fasilitas_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Bentuk Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="bentuk_fasilitas_mauk" name="bentuk_fasilitas_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Maksimum Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="maksimum_fasilitas_mauk" name="maksimum_fasilitas_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                    <p>Nominal: <span id="maksimum_fasilitas_mauk_separators" class="mask"></span></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Plafond Fasilitas</label>
                                </div>
                                <div class="col-lg-4">
                                    <input id="plafond_fasilitas_mauk" name="plafond_fasilitas_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                    <p>Nominal: <span id="plafond_fasilitas_mauk_separators" class="mask"></span></p>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-lg-6 control-label">Jangka Waktu</label>
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="jangka_waktu_mauk" name="jangka_waktu_mauk" type="text" onkeyup="copyvalue(this.id,'kesimpulan_jangka_waktu_mauk')" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Tujuan Penggunaan</label>
                                </div>
                                <div class="col-lg-8">
                                    <input id="tujuan_penggunaan_mauk" name="tujuan_penggunaan_mauk" onkeyup="copyvalue(this.id,'kesimpulan_tujuan_penggunaan_mauk')" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                </div>
                            </div>

                            <h2 class="text-center text-danger">Pemilik dan Pengurus Perusahaan</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Pemilik Perseroan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pemilik_perseroan_mauk" name="pemilik_perseroan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Pemilikan Saham/Permodalan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pemilikan_saham_permodalan_mauk" name="pemilikan_saham_permodalan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Kewenangan Direksi</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kewenangan_direksi_mauk" name="kewenangan_direksi_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Informasi Riwayat Perbankan</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="informasi_riwayat_perbankan_mauk" name="informasi_riwayat_perbankan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Legalitas</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Pendirian Usaha</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_pendirian_usaha_mauk" name="legalitas_pendirian_usaha_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Perizinan Usaha</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_perizinan_usaha_mauk" name="legalitas_perizinan_usaha_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Pelaksanaan Proyek</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_pelaksanaan_proyek_mauk" name="legalitas_pelaksanaan_proyek_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Legalitas Personal Pemohon dan Pemilik Agunan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="legalitas_personal_pemohon_pemilik_agunan_mauk" name="legalitas_personal_pemohon_pemilik_agunan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Kesimpulan Analisa Aspek Legalitas</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_analisa_aspek_legalitas_mauk" name="kesimpulan_analisa_aspek_legalitas_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Manajemen</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_manajemen_mauk" name="analisa_aspek_manajemen_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Teknis</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_teknis_mauk" name="analisa_aspek_teknis_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Pemasaran</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_pemasaran_mauk" name="analisa_aspek_pemasaran_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Analisa Aspek Keuangan</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="analisa_aspek_keuangan_mauk" name="analisa_aspek_keuangan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Perhitungan Kebutuhan Kredit</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="perhitungan_kebutuhan_kredit_mauk" name="perhitungan_kebutuhan_kredit_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Kesimpulan Jaminan/Agunan yang Dikuasai</h2>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_jaminan_agunan_mauk" name="kesimpulan_jaminan_agunan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <h2 class="text-center text-danger">Kesimpulan dan Usulan</h2>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-mauk text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-mauk">
                                    <div class="form-group row">
                                        <!-- <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button"  <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>  style="display: none;"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button> -->
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Jenis Kredit</label>
                                            <div class="col-lg-12">
                                                <input id="jenis_kredit_fasilitas_usul_mauk0" name="jenis_kredit_fasilitas_usul_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Maksimum Kredit Saat Ini</label>
                                            <div class="col-lg-12">
                                                <input id="max_kredit_ini_usul_mauk0" name="max_kredit_ini_usul_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Perubahan</label>
                                            <div class="col-lg-12">
                                                <input id="perubahan_usul_mauk0" name="perubahan_usul_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-24 control-label">Maksimum Kredit yang Diusulkan</label>
                                            <div class="col-lg-12">
                                                <input id="max_kredit_usul_mauk0" name="max_kredit_usul_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-mauk2 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-mauk2">
                                    <div class="form-group row">
                                        <!-- <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button"  <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>  style="display: none;"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button> -->
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="jenis_kredit_fasilitas_pal_mauk0" name="jenis_kredit_fasilitas_pal_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="max_kredit_ini_pal_mauk0" name="max_kredit_ini_pal_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="perubahan_pal_mauk0" name="perubahan_pal_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="col-lg-12">
                                                <input id="max_kredit_pal_mauk0" name="max_kredit_pal_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
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
                                    <input id="jenis_macam_fasilitas_mauk" name="jenis_macam_fasilitas_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Maksimum Kredit
                                </div>
                                <div class="col-lg-6">
                                    <input id="maksimum_kredit_mauk" name="maksimum_kredit_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                    <p>Nominal: <span id="maksimum_kredit_mauk_separators" class="mask"></span></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Plafond Kredit
                                </div>
                                <div class="col-lg-6">
                                    <input id="plafond_kredit_mauk" name="plafond_kredit_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                    <p>Nominal: <span id="plafond_kredit_mauk_separators" class="mask"></span></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Kriteria Usaha
                                </div>
                                <div class="col-lg-6">
                                    <input id="kriteria_usaha_mauk" name="kriteria_usaha_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Pendanaan Sendiri
                                </div>
                                <div class="col-lg-6">
                                    <input id="pendanaan_sendiri_mauk" name="pendanaan_sendiri_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                    <p>Nominal: <span id="pendanaan_sendiri_mauk_separators" class="mask"></span></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Tujuan Penggunaan
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_tujuan_penggunaan_mauk" name="kesimpulan_tujuan_penggunaan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Jangka Waktu
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="kesimpulan_jangka_waktu_mauk" name="kesimpulan_jangka_waktu_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Cara Penarikan
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="cara_penarikan_mauk" name="cara_penarikan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Pelunasan/Angsuran
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pelunasan_angsuran_mauk" name="pelunasan_angsuran_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Bunga
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="bunga_mauk" name="bunga_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Provisi/Fee
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="provisi_fee_mauk" name="provisi_fee_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                                <div class="col-lg-4">
                                    <textarea id="hitung_provisi_fee_mauk" name="hitung_provisi_fee_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                    <p>Nominal: <span id="hitung_provisi_fee_mauk_separators" class="mask"></span></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    Akad Kredit
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="akad_kredit_mauk" name="akad_kredit_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button class="btn btn-success mt-2 tambah-field-mauk3 text-center" style="width:100%;" type="button" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                                <div class="add-form-mauk3">
                                    <div class="form-group row">
                                        <!-- <button name="hapus_pp_fak_data" class="btn btn-danger hapus_pp_fak_data delete-btn-pp-fak-data" type="button"  <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>  style="display: none;"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button> -->
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Agunan</label>
                                            <div class="col-lg-12">
                                                <input id="agunan_mauk0" name="agunan_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Macam/Jenis</label>
                                            <div class="col-lg-12">
                                                <input id="macam_jenis_mauk0" name="macam_jenis_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Nilai Agunan</label>
                                            <div class="col-lg-12">
                                                <input id="nilai_agunan_mauk0" name="nilai_agunan_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-lg-6 control-label">Bentuk Pengikatan</label>
                                            <div class="col-lg-12">
                                                <input id="bentuk_pengikatan_mauk0" name="bentuk_pengikatan_mauk[]" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>>
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
                                    <textarea id="dokumentasi_kredit_mauk" name="dokumentasi_kredit_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Pengikatan Agunan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="pengikatan_agunan_mauk" name="pengikatan_agunan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Asuransi Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="asuransi_kredit_mauk" name="asuransi_kredit_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Asuransi Agunan</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="asuransi_agunan_mauk" name="asuransi_agunan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label"> Syarat Penandatangan Perjanjian Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="syarat_ttd_pk_mauk" name="syarat_ttd_pk_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Syarat Realisasi dan Penarikan Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="syarat_realisasi_penarikan_mauk" name="syarat_realisasi_penarikan_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Affirmatives</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="affirmatives_mauk" name="affirmatives_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Negatives</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="negatives_mauk" name="negatives_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label class="col-lg-24 control-label">Syarat Lainnya yang Jadi perhatian</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea id="syarat_lain_mauk" name="syarat_lain_mauk" type="text" placeholder="" class="form-control" <?php echo !empty($edit_data_koordinator) ? '' : 'disabled'; ?>></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cb_mauk" title="Checkbox ini sebagai paraf" name="cb_mauk"
                                            <?php echo (!empty($edit_data) && !empty($edit_data_koordinator)) ? '' : 'disabled'; ?>>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php // } 
                        ?>