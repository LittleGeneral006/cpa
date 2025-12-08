<h1>Dokumen Pendukung</h1>
<fieldset>
    <h2>Dokumen Pendukung</h2>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Nama Nasabah</label>
                <div class="col-lg-12">
                    <input id="nama_nasabah_dp" name="nama_nasabah_dp" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Alamat Kantor</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="alamat_dp" name="alamat_dp" rows="3" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>></textarea>

                </div>
            </div>

        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Usaha</label>
            <div class="col-lg-12">
                <input id="usaha_dp" name="usaha_dp" type="text" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'readonly'; ?>>

            </div>
        </div>
        <div class="col-lg-6">
            <label class="col-lg-12 control-label">Jenis Badan Usaha</label>
            <div class="col-lg-12">
                <select class="form-control class-disabled select" required id="jenis_badan_usaha_dp" name="jenis_badan_usaha_dp" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                    <option value="" disabled="">pilih</option>
                    <option value="Perseroan Perseorangan">Perseroan Perseorangan</option>
                    <option value="Commanditaire Vennootschap">Commanditaire Vennootschap (CV)</option>
                    <option value="Perseroan Terbatas">Perseroan Terbatas (PT)</option>
                </select>


            </div>
        </div>


    </div>
    <div class="reset-dokumen">
        <!-- perorangan -->
        <div class="perorangan">
            <h2 class="text-left text-success">Persyaratan Dokumen</h2>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                    <div class="col-lg-12">
                        <input id="pengajuan_kredit1" name="pengajuan_kredit1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pengajuan_kredit1">Lihat Dokumen</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Pernyataan Pendirian Perseroan Perorangan</label>
                    <div class="col-lg-12">
                        <input id="pendirian_perseroan1" name="pendirian_perseroan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pendirian_perseroan1">Lihat Dokumen</button>
                    </div>
                </div>



            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Sertifikat Pendaftaran Perseroan Perseorangan</label>
                    <div class="col-lg-12">
                        <input id="pendaftaran_perseroan1" name="pendaftaran_perseroan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pendaftaran_perseroan1">Lihat Dokumen</button>
                        <!-- <input id="pendaftaran_perseroan1" name="pendaftaran_perseroan1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan Perorangan</label>
                    <div class="col-lg-12">
                        <input id="npwp1" name="npwp1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp1">Lihat Dokumen</button>
                        <!-- <input id="npwp1" name="npwp1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero</label>
                    <div class="col-lg-12">
                        <input id="ktp_persero1" name="ktp_persero1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_persero1">Lihat Dokumen</button>
                        <!-- <input id="ktp_persero1" name="ktp_persero1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Persero</label>
                    <div class="col-lg-12">
                        <input id="npwp_persero1" name="npwp_persero1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp_persero1">Lihat Dokumen</button>
                        <!-- <input id="npwp_persero1" name="npwp_persero1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy perijinan usaha yang berlaku dan sesuai yang dipersyaratkan oleh pemberi kerja</label>
                    <div class="col-lg-12">
                        <input id="perijinan_usaha1" name="perijinan_usaha1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="perijinan_usaha1">Lihat Dokumen</button>
                        <!-- <input id="perijinan_usaha1" name="perijinan_usaha1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                    <div class="col-lg-12">
                        <input id="pengalaman_kerja1" name="pengalaman_kerja1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pengalaman_kerja1">Lihat Dokumen</button>
                        <!-- <input id="pengalaman_kerja1" name="pengalaman_kerja1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Laporan Keuangan</label>
                    <div class="col-lg-12">
                        <input id="laporan_keuangan1" name="laporan_keuangan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="laporan_keuangan1">Lihat Dokumen</button>
                        <!-- <input id="laporan_keuangan1" name="laporan_keuangan1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
            <h2 class="text-left text-success">Dokumen Agunan</h2>

            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy dokumen agunan yang akan diserahkan disertai kelengkapannya</label>
                    <div class="col-lg-12">
                        <input id="copy_dok_agunan1" name="copy_dok_agunan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="copy_dok_agunan1">Lihat Dokumen</button>
                        <!-- <input id="copy_dok_agunan1" name="copy_dok_agunan1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                    <div class="col-lg-12">
                        <input id="ideb_slik1" name="ideb_slik1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik1">Lihat Dokumen</button>
                        <!-- <input id="ideb_slik1" name="ideb_slik1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>




            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                    <div class="col-lg-12">
                        <input id="ktp_istri1" name="ktp_istri1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_istri1">Lihat Dokumen</button>
                        <!-- <input id="ktp_istri1" name="ktp_istri1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                    <div class="col-lg-12">
                        <input id="kk_pemilik_agunan1" name="kk_pemilik_agunan1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="kk_pemilik_agunan1">Lihat Dokumen</button>
                        <!-- <input id="kk_pemilik_agunan1" name="kk_pemilik_agunan1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>




            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                    <div class="col-lg-12">
                        <input id="buku_nikah1" name="buku_nikah1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="buku_nikah1">Lihat Dokumen</button>
                        <!-- <input id="buku_nikah1" name="buku_nikah1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
            <h2 class="text-left text-success">Track Record</h2>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                    <div class="col-lg-12">
                        <input id="dhn1" name="dhn1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="dhn1">Lihat Dokumen</button>
                        <!-- <input id="dhn1" name="dhn1" type="file" placeholder="" class="form-control class-readonly"> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                    <div class="col-lg-12">
                        <input id="ideb_slik_tr1" name="ideb_slik_tr1" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik_tr1">Lihat Dokumen</button>
                        <!-- <input id="ideb_slik_tr1" name="ideb_slik_tr1" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
        </div>
        <!-- buat cv -->
        <div class="cv">
            <h2 class="text-left text-success">Persyaratan Dokumen</h2>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                    <div class="col-lg-12">
                        <input id="pengajuan_kredit2" name="pengajuan_kredit2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pengajuan_kredit2">Lihat Dokumen</button>
                        <!-- <input id="pengajuan_kredit2" name="pengajuan_kredit2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Akta Pendirian beserta Akta Perubahan (jika ada) atau yang dipersamakan dengan hal itu</label>
                    <div class="col-lg-12">
                        <input id="akta_pendirian2" name="akta_pendirian2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="akta_pendirian2">Lihat Dokumen</button>
                        <!-- <input id="akta_pendirian2" name="akta_pendirian2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>

            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Surat Keterangan/Keputusan Administrasi Hukum Umum (AHU)</label>
                    <div class="col-lg-12">
                        <input id="ahu2" name="ahu2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ahu2">Lihat Dokumen</button>
                        <!-- <input id="ahu2" name="ahu2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan</label>
                    <div class="col-lg-12">
                        <input id="npwp_perseroan2" name="npwp_perseroan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp_perseroan2">Lihat Dokumen</button>
                        <!-- <input id="npwp_perseroan2" name="npwp_perseroan2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero Pengurus</label>
                    <div class="col-lg-12">
                        <input id="ktp_pengurus2" name="ktp_pengurus2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_pengurus2">Lihat Dokumen</button>
                        <!-- <input id="ktp_pengurus2" name="ktp_pengurus2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Persero Komanditer</label>
                    <div class="col-lg-12">
                        <input id="ktp_komanditer2" name="ktp_komanditer2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_komanditer2">Lihat Dokumen</button>
                        <!-- <input id="ktp_komanditer2" name="ktp_komanditer2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy perijinan usaha</label>
                    <div class="col-lg-12">
                        <input id="perijinan_usaha2" name="perijinan_usaha2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="perijinan_usaha2">Lihat Dokumen</button>
                        <!-- <input id="perijinan_usaha2" name="perijinan_usaha2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                    <div class="col-lg-12">
                        <input id="pengalaman_kerja2" name="pengalaman_kerja2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pengalaman_kerja2">Lihat Dokumen</button>
                        <!-- <input id="pengalaman_kerja2" name="pengalaman_kerja2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Laporan Keuangan</label>
                    <div class="col-lg-12">
                        <input id="laporan_keuangan2" name="laporan_keuangan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="laporan_keuangan2">Lihat Dokumen</button>
                        <!-- <input id="laporan_keuangan2" name="laporan_keuangan2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
            <h2 class="text-left text-success">Dokumen Agunan</h2>

            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy dokumen agunan yang akan diserahkan disertai kelengkapannya</label>
                    <div class="col-lg-12">
                        <input id="copy_dok_agunan2" name="copy_dok_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="copy_dok_agunan2">Lihat Dokumen</button>
                        <!-- <input id="copy_dok_agunan2" name="copy_dok_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                    <div class="col-lg-12">
                        <input id="ideb_slik_agunan2" name="ideb_slik_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik_agunan2">Lihat Dokumen</button>
                        <!-- <input id="ideb_slik_agunan2" name="ideb_slik_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>




            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                    <div class="col-lg-12">
                        <input id="ktp_pemilik_agunan2" name="ktp_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_pemilik_agunan2">Lihat Dokumen</button>
                        <!-- <input id="ktp_pemilik_agunan2" name="ktp_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                    <div class="col-lg-12">
                        <input id="kk_pemilik_agunan2" name="kk_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="kk_pemilik_agunan2">Lihat Dokumen</button>
                        <!-- <input id="kk_pemilik_agunan2" name="kk_pemilik_agunan2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>




            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                    <div class="col-lg-12">
                        <input id="buku_nikah2" name="buku_nikah2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="buku_nikah2">Lihat Dokumen</button>
                        <!-- <input id="buku_nikah2" name="buku_nikah2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
            <h2 class="text-left text-success">Track Record</h2>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                    <div class="col-lg-12">
                        <input id="dhn2" name="dhn2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="dhn2">Lihat Dokumen</button>
                        <!-- <input id="dhn2" name="dhn2" type="file" placeholder="" class="form-control class-readonly"> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                    <div class="col-lg-12">
                        <input id="ideb_slik2" name="ideb_slik2" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik2">Lihat Dokumen</button>
                        <!-- <input id="ideb_slik2" name="ideb_slik2" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
        </div>
        <div class="pt">
            <h2 class="text-left text-success">Persyaratan Dokumen</h2>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Permohonan Pengajuan Kredit</label>
                    <div class="col-lg-12">
                        <input id="pengajuan_kredit3" name="pengajuan_kredit3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pengajuan_kredit3">Lihat Dokumen</button>
                        <!-- <input id="pengajuan_kredit3" name="pengajuan_kredit3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Akta Pendirian beserta Akta Perubahan (jika ada) atau yang dipersamakan dengan hal itu</label>
                    <div class="col-lg-12">
                        <input id="akta_pendirian3" name="akta_pendirian3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="akta_pendirian3">Lihat Dokumen</button>
                        <!-- <input id="akta_pendirian3" name="akta_pendirian3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>

            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Surat Keterangan/Keputusan Administrasi Hukum Umum (AHU)</label>
                    <div class="col-lg-12">
                        <input id="ahu3" name="ahu3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ahu3">Lihat Dokumen</button>
                        <!-- <input id="ahu3" name="ahu3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Nomor Pokok Wajib Pajak (NPWP) Perseroan</label>
                    <div class="col-lg-12">
                        <input id="npwp_perseroan3" name="npwp_perseroan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="npwp_perseroan3">Lihat Dokumen</button>
                        <!-- <input id="npwp_perseroan3" name="npwp_perseroan3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Direksi</label>
                    <div class="col-lg-12">
                        <input id="ktp_direksi3" name="ktp_direksi3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_direksi3">Lihat Dokumen</button>
                        <!-- <input id="ktp_direksi3" name="ktp_direksi3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) Komisaris</label>
                    <div class="col-lg-12">
                        <input id="ktp_komisaris3" name="ktp_komisaris3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_komisaris3">Lihat Dokumen</button>
                        <!-- <input id="ktp_komisaris3" name="ktp_komisaris3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>



            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Dokumen Legalitas Pemegang Saham (kecuali Perseroan Terbuka)</label>
                    <div class="col-lg-12">
                        <input id="pemegang_saham3" name="pemegang_saham3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pemegang_saham3">Lihat Dokumen</button>
                        <!-- <input id="pemegang_saham3" name="pemegang_saham3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy perijinan usaha yang berlaku dan sesuai yang dipersyaratkan oleh pemberi kerja</label>
                    <div class="col-lg-12">
                        <input id="perijinan_usaha3" name="perijinan_usaha3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="perijinan_usaha3">Lihat Dokumen</button>
                        <!-- <input id="perijinan_usaha3" name="perijinan_usaha3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>




            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Daftar pengalaman pekerjaan</label>
                    <div class="col-lg-12">
                        <input id="pengalaman_kerja3" name="pengalaman_kerja3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="pengalaman_kerja3">Lihat Dokumen</button>
                        <!-- <input id="pengalaman_kerja3" name="pengalaman_kerja3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Laporan Keuangan</label>
                    <div class="col-lg-12">
                        <input id="laporan_keuangan3" name="laporan_keuangan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="laporan_keuangan3">Lihat Dokumen</button>
                        <!-- <input id="laporan_keuangan3" name="laporan_keuangan3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
            <h2 class="text-left text-success">Dokumen Agunan</h2>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                    <div class="col-lg-12">
                        <input id="ideb_slik_agunan3" name="ideb_slik_agunan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik_agunan3">Lihat Dokumen</button>
                        <!-- <input id="ideb_slik_agunan3" name="ideb_slik_agunan3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) pemilik agunan</label>
                    <div class="col-lg-12">
                        <input id="ktp_pemilik_agunan3" name="ktp_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_pemilik_agunan3">Lihat Dokumen</button>
                        <!-- <input id="ktp_pemilik_agunan3" name="ktp_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>





            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Tanda Penduduk (KTP) suami/istri pemilik agunan</label>
                    <div class="col-lg-12">
                        <input id="ktp_istri3" name="ktp_istri3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ktp_istri3">Lihat Dokumen</button>
                        <!-- <input id="ktp_istri3" name="ktp_istri3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Kartu Keluarga (KK) pemilik agunan</label>
                    <div class="col-lg-12">
                        <input id="kk_pemilik_agunan3" name="kk_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="kk_pemilik_agunan3">Lihat Dokumen</button>
                        <!-- <input id="kk_pemilik_agunan3" name="kk_pemilik_agunan3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>




            </div>
            <div class="form-group row">


                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Copy Akta/Buku/Surat/Kartu Nikah (jika sudah menikah)</label>
                    <div class="col-lg-12">
                        <input id="buku_nikah3" name="buku_nikah3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="buku_nikah3">Lihat Dokumen</button>
                        <!-- <input id="buku_nikah3" name="buku_nikah3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
            <h2 class="text-left text-success">Track Record</h2>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Daftar Hitam Nasional (DHN)</label>
                    <div class="col-lg-12">
                        <input id="dhn3" name="dhn3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="dhn3">Lihat Dokumen</button>
                        <!-- <input id="dhn3" name="dhn3" type="file" placeholder="" class="form-control class-readonly"> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-lg-12 control-label">Ideb SLIK</label>
                    <div class="col-lg-12">
                        <input id="ideb_slik3" name="ideb_slik3" type="file" placeholder="" class="form-control class-readonly" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <button type="button" class="btn btn-link lihat-dokumen" data-id="ideb_slik3">Lihat Dokumen</button>
                        <!-- <input id="ideb_slik3" name="ideb_slik3" type="file" placeholder="" class="form-control class-readonly"> -->

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_dokumen_ceklis" title="Checkbox ini sebagai paraf" name="cb_dokumen_ceklis" <?php echo empty($edit_data) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>
</fieldset>
<script>
    $(document).ready(function() {
        // perorangan()
        isi_dokumen()
        $("#jenis_badan_usaha_dp").on("change", function() {
            var jenis_usaha = $(this).val();
            if (jenis_usaha == 'Perseroan Perseorangan') {
                $(".perorangan").show()
                $(".cv").hide()
                $(".pt").hide()

            } else if (jenis_usaha == 'Commanditaire Vennootschap') {
                $(".perorangan").hide()
                $(".cv").show()
                $(".pt").hide()
            } else if (jenis_usaha == 'Perseroan Terbatas') {
                $(".perorangan").hide()
                $(".cv").hide()
                $(".pt").show()
            } else {
                $(".perorangan").show()
                $(".cv").hide()
                $(".pt").hide()
            }
            changeDokumen(jenis_usaha);
        });
        $(".lihat-dokumen").on("click", function() {
            var data_id = $(this).data('id');
            seeDokumen(data_id)
            console.log('vdokumenceklist');
            // Lakukan sesuatu dengan nilai data-id yang telah diambil
            // console.log('Nilai data-id:', data_id);
        });

        // // update fcr agunan
        $('#save_dokumen').click(function(e) {
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // batas baru
            if (edit_data_pemasar) {
                // Jika edit_data_koordinator null atau kosong
                var hasil_dok = data_dokumen();
                edit_dok('edit_dokumen', hasil_dok, 'edit_dok')
            } else {
                // Jika edit_data_koordinator memiliki nilai
                var hasil_dok = paraf_dokumen_ceklis();
                post_paraf('paraf_dokumen_ceklis', hasil_dok, 'edit_dok');
            }
        });

    });
    // BATAS COBA

    // bikin function
    function isi_dokumen() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            var result = 'nihil';
            var data_entry = hasil.message.data_entry;
            var data_paraf = hasil.message.paraf;
            if (hasil.status == 'success') {
                console.log(data_entry);
                var orang = hasil.message.dok;
                var cv = hasil.message.dok_cv;
                var pt = hasil.message.dok_pt;
                var data = hasil.message.dok;

                if (orang.nama_nasabah == null && cv.nama_nasabah == null && pt.nama_nasabah == null) {
                    perorangan();

                    $('#nama_nasabah_dp').val(data_entry.nama_debitur);
                    $('#alamat_dp').val(data_entry.alamat_kantor);
                    $('#usaha_dp').val(data_entry.bidang_usaha);

                } else {
                    if (orang.nama_nasabah != null) {
                        var result = 'orang';
                        var data = hasil.message.dok;
                        ada_dokumen(result, data);
                    }
                    if (cv.nama_nasabah != null) {
                        var result = 'cv';
                        var data = hasil.message.dok_cv;
                        ada_dokumen(result, data);
                    }
                    if (pt.nama_nasabah != null) {
                        var result = 'pt';
                        var data = hasil.message.dok_pt;
                        ada_dokumen(result, data);
                    }

                    tampil_edit_dok(result);

                    $('#nama_nasabah_dp').val(data_entry.nama_debitur);
                    $('#alamat_dp').val(data_entry.alamat_kantor);
                    $('#usaha_dp').val(data_entry.bidang_usaha);
                    $('#jenis_badan_usaha_dp').val(data.jenis_badan_usaha);
                    
                    resizeJquerySteps();
                }

                if (Array.isArray(data_paraf) && data_paraf.length > 0) {
                    let paraf = data_paraf.find(p => p.nomor_halaman == '5'); // Cari nomor_halaman = 4

                    if (paraf && paraf.kd_level && typeof kd_level !== "undefined" &&
                        paraf.kd_level === kd_level &&
                        paraf.kd_data === data.kd_data &&
                        paraf.nama_halaman === 'Document Checklist') {

                        $('#cb_dokumen_ceklis').prop('checked', paraf.ceklis === 'true');
                    } else {
                        $('#cb_dokumen_ceklis').prop('checked', false);
                    }
                } else {
                    $('#cb_dokumen_ceklis').prop('checked', false);
                }

            } else {
                alert(hasil.message)
            }
        });

        resizeJquerySteps();
    }

    function refresh_dokumen(param) {
        isi_dokumen()
        tampil_button('save_dokumen')
        // reset_dokumen()
    }

    function reset_dokumen() {
        // Reset semua input file di dalam elemen dengan kelas "asiyap"
        $('.reset-dokumen input[type=file]').val(null);
    }

    function seeDokumen(param) {
        // Ambil nilai kd_data dari $data_entry
        var id_input = CryptoJS.SHA1(param);
        // alert(id_input)
        var kd_data = "<?php echo sha1($data_entry->kd_data) ?>";

        // Bangun URL dengan base_url dan kd_data
        var url = "<?php echo base_url() ?>dokumen-pendukung/" + kd_data + "/" + id_input;

        // Buka tautan dalam tab baru
        window.open(url, '_blank');
    }

    function perorangan() {
        $(".perorangan").show()
        $(".cv").hide()
        $(".pt").hide()
    }

    function tampil_edit_dok(jenis_usaha) {
        if (jenis_usaha == 'orang') {
            $(".perorangan").show()
            $(".cv").hide()
            $(".pt").hide()

        } else if (jenis_usaha == 'cv') {
            $(".perorangan").hide()
            $(".cv").show()
            $(".pt").hide()
        } else if (jenis_usaha == 'pt') {
            $(".perorangan").hide()
            $(".cv").hide()
            $(".pt").show()
        } else {
            $(".perorangan").hide()
            $(".cv").hide()
            $(".pt").hide()
        }
    }

    // bikin function
    function changeDokumen(param) {
        variabelGlobal(function(hasil) {
            // alert(param)
            // console.log(hasil.message.data_entry.kd_data);
            var data_entry = hasil.message.data_entry;
            if (hasil.status == 'success') {
                if (param == 'Perseroan Perseorangan') {
                    var segment = 'orang';
                    var data = hasil.message.dok;
                    ada_dokumen(segment, data);

                } else if (param == 'Commanditaire Vennootschap') {
                    var segment = 'cv';
                    var data = hasil.message.dok_cv;
                    ada_dokumen(segment, data);

                } else if (param == 'Perseroan Terbatas') {
                    var segment = 'pt';
                    var data = hasil.message.dok_pt;
                    ada_dokumen(segment, data);

                } else {
                    var segment = 'orang';
                    var data = hasil.message.dok;
                    ada_dokumen(segment, data);

                }

                $('#nama_nasabah_dp').val(data_entry.nama_debitur);
                $('#alamat_dp').val(data_entry.alamat_kantor);
                $('#usaha_dp').val(data_entry.bidang_usaha);
                // $('#jenis_badan_usaha_dp').val(data.jenis_badan_usaha);

            } else {
                alert(hasil.message)
            }
        });

        resizeJquerySteps();
    }

    function data_dokumen() {
        // Buat objek FormData
        var formData = new FormData();
        formData.append('kd_data_tambah', $('#kd_data_tambah').val());

        formData.append('nama_nasabah_dp', $('#nama_nasabah_dp').val());
        formData.append('alamat_dp', $('#alamat_dp').val());
        formData.append('usaha_dp', $('#usaha_dp').val());
        formData.append('jenis_badan_usaha_dp', $('#jenis_badan_usaha_dp').val());

        formData.append('pengajuan_kredit1', $('#pengajuan_kredit1')[0].files[0]);
        formData.append('pendirian_perseroan1', $('#pendirian_perseroan1')[0].files[0]);
        formData.append('pendaftaran_perseroan1', $('#pendaftaran_perseroan1')[0].files[0]);
        formData.append('npwp1', $('#npwp1')[0].files[0]);
        formData.append('ktp_persero1', $('#ktp_persero1')[0].files[0]);
        formData.append('npwp_persero1', $('#npwp_persero1')[0].files[0]);
        formData.append('perijinan_usaha1', $('#perijinan_usaha1')[0].files[0]);
        formData.append('pengalaman_kerja1', $('#pengalaman_kerja1')[0].files[0]);
        formData.append('laporan_keuangan1', $('#laporan_keuangan1')[0].files[0]);
        formData.append('copy_dok_agunan1', $('#copy_dok_agunan1')[0].files[0]);
        formData.append('ideb_slik1', $('#ideb_slik1')[0].files[0]);
        formData.append('ktp_istri1', $('#ktp_istri1')[0].files[0]);
        formData.append('kk_pemilik_agunan1', $('#kk_pemilik_agunan1')[0].files[0]);
        formData.append('buku_nikah1', $('#buku_nikah1')[0].files[0]);
        formData.append('dhn1', $('#dhn1')[0].files[0]);
        formData.append('ideb_slik_tr1', $('#ideb_slik_tr1')[0].files[0]);

        formData.append('pengajuan_kredit2', $('#pengajuan_kredit2')[0].files[0]);
        formData.append('akta_pendirian2', $('#akta_pendirian2')[0].files[0]);
        formData.append('ahu2', $('#ahu2')[0].files[0]);
        formData.append('npwp_perseroan2', $('#npwp_perseroan2')[0].files[0]);
        formData.append('ktp_pengurus2', $('#ktp_pengurus2')[0].files[0]);
        formData.append('ktp_komanditer2', $('#ktp_komanditer2')[0].files[0]);
        formData.append('perijinan_usaha2', $('#perijinan_usaha2')[0].files[0]);
        formData.append('pengalaman_kerja2', $('#pengalaman_kerja2')[0].files[0]);
        formData.append('laporan_keuangan2', $('#laporan_keuangan2')[0].files[0]);
        formData.append('copy_dok_agunan2', $('#copy_dok_agunan2')[0].files[0]);
        formData.append('ideb_slik_agunan2', $('#ideb_slik_agunan2')[0].files[0]);
        formData.append('ktp_pemilik_agunan2', $('#ktp_pemilik_agunan2')[0].files[0]);
        formData.append('kk_pemilik_agunan2', $('#kk_pemilik_agunan2')[0].files[0]);
        formData.append('buku_nikah2', $('#buku_nikah2')[0].files[0]);
        formData.append('dhn2', $('#dhn2')[0].files[0]);
        formData.append('ideb_slik2', $('#ideb_slik2')[0].files[0]);

        formData.append('pengajuan_kredit3', $('#pengajuan_kredit3')[0].files[0]);
        formData.append('akta_pendirian3', $('#akta_pendirian3')[0].files[0]);
        formData.append('ahu3', $('#ahu3')[0].files[0]);
        formData.append('npwp_perseroan3', $('#npwp_perseroan3')[0].files[0]);
        formData.append('ktp_direksi3', $('#ktp_direksi3')[0].files[0]);
        formData.append('ktp_komisaris3', $('#ktp_komisaris3')[0].files[0]);
        formData.append('pemegang_saham3', $('#pemegang_saham3')[0].files[0]);
        formData.append('perijinan_usaha3', $('#perijinan_usaha3')[0].files[0]);
        formData.append('pengalaman_kerja3', $('#pengalaman_kerja3')[0].files[0]);
        formData.append('laporan_keuangan3', $('#laporan_keuangan3')[0].files[0]);
        formData.append('ideb_slik_agunan3', $('#ideb_slik_agunan3')[0].files[0]);
        formData.append('ktp_pemilik_agunan3', $('#ktp_pemilik_agunan3')[0].files[0]);
        formData.append('ktp_istri3', $('#ktp_istri3')[0].files[0]);
        formData.append('kk_pemilik_agunan3', $('#kk_pemilik_agunan3')[0].files[0]);
        formData.append('buku_nikah3', $('#buku_nikah3')[0].files[0]);
        formData.append('dhn3', $('#dhn3')[0].files[0]);
        formData.append('ideb_slik3', $('#ideb_slik3')[0].files[0]);
        return formData;
    }

    function edit_dok(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_dokumen()
                    reset_dokumen()
                    if (button == 'edit_dok') {
                        toastr.success(response.message, 'Berhasil')

                    }
                    if (button != 'edit_dok') {
                        var hasil_scoring2 = data_scoring()
                        save_scoring('finish_scoring', hasil_scoring2, 'finish_scoring');

                    }
                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                }
                // $('#mohon').hide()
                // toastr.success(response.message, 'Berhasil')
            },
            error: function(xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit data gagal', 'Error')
            }
        });


    }

    function ada_dokumen(result, data) {
        // console.log(result)
        // console.log(data)
        // alert(data)
        // alert(result)

        if (result == 'cv') {
            status_ada(data.pengajuan_kredit, 'pengajuan_kredit2');
            status_ada(data.akta_pendirian, 'akta_pendirian2');
            status_ada(data.ahu, 'ahu2');
            status_ada(data.npwp_perseroan, 'npwp_perseroan2');
            status_ada(data.ktp_pengurus, 'ktp_pengurus2');
            status_ada(data.ktp_komanditer, 'ktp_komanditer2');
            status_ada(data.perijinan_usaha, 'perijinan_usaha2');
            status_ada(data.pengalaman_kerja, 'pengalaman_kerja2');
            status_ada(data.laporan_keuangan, 'laporan_keuangan2');
            status_ada(data.copy_dok_agunan, 'copy_dok_agunan2');
            status_ada(data.ideb_slik_agunan, 'ideb_slik_agunan2');
            status_ada(data.ktp_pemilik_agunan, 'ktp_pemilik_agunan2');
            status_ada(data.kk_pemilik_agunan, 'kk_pemilik_agunan2');
            status_ada(data.buku_nikah, 'buku_nikah2');
            status_ada(data.dhn, 'dhn2');
            status_ada(data.ideb_slik, 'ideb_slik2');

        } else if (result == 'pt') {
            status_ada(data.pengajuan_kredit, 'pengajuan_kredit3');
            status_ada(data.akta_pendirian, 'akta_pendirian3');
            status_ada(data.ahu, 'ahu3');
            status_ada(data.npwp_perseroan, 'npwp_perseroan3');
            status_ada(data.ktp_direksi, 'ktp_direksi3');
            status_ada(data.ktp_komisaris, 'ktp_komisaris3');
            status_ada(data.pemegang_saham, 'pemegang_saham3');
            status_ada(data.perijinan_usaha, 'perijinan_usaha3');
            status_ada(data.pengalaman_kerja, 'pengalaman_kerja3');
            status_ada(data.laporan_keuangan, 'laporan_keuangan3');
            status_ada(data.ideb_slik_agunan, 'ideb_slik_agunan3');
            status_ada(data.ktp_pemilik_agunan, 'ktp_pemilik_agunan3');
            status_ada(data.ktp_istri, 'ktp_istri3');
            status_ada(data.kk_pemilik_agunan, 'kk_pemilik_agunan3');
            status_ada(data.buku_nikah, 'buku_nikah3');
            status_ada(data.dhn, 'dhn3');
            status_ada(data.ideb_slik, 'ideb_slik3');

            // orang
        } else {
            status_ada(data.pengajuan_kredit, 'pengajuan_kredit1');
            status_ada(data.pendirian_perseroan, 'pendirian_perseroan1');
            status_ada(data.pendaftaran_perseroan, 'pendaftaran_perseroan1');
            status_ada(data.npwp_perorangan, 'npwp1');
            status_ada(data.ktp_persero, 'ktp_persero1');
            status_ada(data.npwp_persero, 'npwp_persero1');
            status_ada(data.perijinan_usaha, 'perijinan_usaha1');
            status_ada(data.pengalaman_kerja, 'pengalaman_kerja1');
            status_ada(data.laporan_keuangan, 'laporan_keuangan1');
            status_ada(data.copy_dok_agunan, 'copy_dok_agunan1');
            status_ada(data.ideb_slik_agunan, 'ideb_slik1');
            status_ada(data.ktp_istri, 'ktp_istri1');
            status_ada(data.kk_pemilik_agunan, 'kk_pemilik_agunan1');
            status_ada(data.buku_nikah, 'buku_nikah1');
            status_ada(data.dhn, 'dhn1');
            status_ada(data.ideb_slik, 'ideb_slik_tr1');
        }
    }

    function status_ada(kolom_db, data_id) {
        // alert(data.pengajuan_kredit)
        // console.log(data.pengajuan_kredit)
        // alert(kolom_db)
        // alert(data_id)

        // Mengecek apakah ada elemen dengan data-id yang sama sebelumnya
        var id_baru = data_id + 'span';
        // var existingElement = $('[data-id="' + data_id + '"]');
        var existingElement = $('#' + id_baru);

        // Jika ada elemen dengan data-id yang sama, hapus kontennya
        if (existingElement.length > 0) {
            existingElement.remove();
        }

        // Kemudian tambahkan elemen baru sesuai kondisi
        if (kolom_db == null || kolom_db == '') {
            $('[data-id="' + data_id + '"]').append('<span id="' + id_baru + '" class="text-danger"> <i class="fa fa-circle text-danger" aria-hidden="true"></i></span>');
        } else {
            $('[data-id="' + data_id + '"]').append('<span id="' + id_baru + '" class="text-success"> <i class="fa fa-circle text-success" aria-hidden="true"></i></span>');
        }
    }

    function paraf_dokumen_ceklis() {
        var data_dokumen = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            unit_kerja_tambah: $('#unit_kerja_tambah').val(),
            nomor_halaman: '5',
            nama_halaman: 'Document Checklist',

            cb_dokumen_ceklis: $('#cb_dokumen_ceklis').is(':checked')
            // upload dokumen
        };
        return data_dokumen;
    }
</script>