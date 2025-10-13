<h1>Scoring Pemasar</h1>
<fieldset>
    <h2>Scoring</h2>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Nama Pemohon</label>
                <div class="col-lg-12">
                    <input id="nama_pemohon_sc" name="nama_pemohon_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                </div>
            </div>

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Alamat Kantor</label>
                <div class="col-lg-12">
                    <textarea class="form-control" id="alamat_sc" name="alamat_sc" rows="3" readonly></textarea>

                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Plafond</label>
                <div class="col-lg-12">
                    <input id="plafond_sc" name="plafond_sc" type="number" placeholder="" class="form-control class-readonly" readonly>
                    <p>Plafond: <span id="plafond_sc_separators" class="mask"></span></p>

                </div>
            </div>

            <div class="col-lg-6">
                <label class="col-lg-12 control-label">Tujuan</label>
                <div class="col-lg-12">
                    <input id="tujuan_sc" name="tujuan_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">No PAK</label>
                <div class="col-lg-12">
                    <input id="no_pak_sc" name="no_pak_sc" type="text" placeholder="" class="form-control class-readonly" readonly>

                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">1. PENDIRIAN BADAN USAHA</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="pendirian_sc" name="pendirian_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="2">(a) Usaha baru berjalan 0 s/d 6 bulan</option>
                        <option value="4">(b) Usaha berjalan lebih dari 6 bulan s/d 1 tahun</option>
                        <option value="6">(c) Usaha berjalan lebih dari 1 tahun s/d 2 tahun</option>
                        <option value="8">(d) Usaha berjalan lebih dari 2 tahun s/d 5 tahun</option>
                        <option value="10">(e) Usaha berjalan lebih dari 5 tahun</option>
                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">2. LEGALITAS</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="legalitas_sc" name="legalitas_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="2">(a) Dokumen legalitas tidak lengkap dan tidak ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                        <option value="4">(b) Dokumen legalitas tidak lengkap namun ada surat keterangan dokumen dalam proses dari instansi berwenang</option>
                        <option value="6">(c) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan belum dilakukan perpanjangan.</option>
                        <option value="8">(d) Dokumen legalitas lengkap namun ada yang telah berakhir masa berlakunya dan ada surat keterangan masih dalam proses dari instansi berwenang.</option>
                        <option value="10">(e) Dokumen legalitas lengkap sesuai dengan ketentuan yang berlaku.</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">3. HUBUNGAN DENGAN PERBANKAN (FUNDING)</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="hubungan_sc" name="hubungan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="2">(a) Belum atau sudah menjadi nasabah Bank Kalsel selama 0 s.d 3 bulan</option>
                        <option value="4">(b) Sudah menjadi nasabah Bank Kalsel selama 3 bulan s.d 1 tahun</option>
                        <option value="6">(c) Sudah menjadi nasabah Bank Kalsel selama > 1 s.d 3 tahun</option>
                        <option value="8">(d) Sudah menjadi nasabah Bank Kalsel selama > 3 s.d 5 tahun</option>
                        <option value="10">(e) Sudah menjadi nasabah Bank Kalsel selama > 5 tahun</option>
                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">4. PENGELOLAAN MANAJEMEN USAHA</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="pengelolaan_sc" name="pengelolaan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="2">(a) Belum ada struktur organisasi dan tidak ada pembagian tugas secara jelas</option>
                        <option value="6">(b) Sudah ada terdapat struktur organisasi namun tidak ada pembagian tugas</option>
                        <option value="10">(c) Terdapat struktur organisasi dan pembagian tugas sesuai dengan bidangnya.</option>
                    </select>


                </div>
            </div>



        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">5. JENIS AGUNAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="jenis_agunan_sc" name="jenis_agunan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="3">(a) Personal / Corporate Guarantee</option>
                        <option value="6">(b) Bergerak</option>
                        <option value="9">(c) Kombinasi barang tidak bergerak dan barang bergerak</option>
                        <option value="12">(d) Tidak Bergerak</option>
                        <option value="15">(e) Agunan Tunai</option>
                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">6. BUKTI KEPEMILIKAN AGUNAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="bukti_sc" name="bukti_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="3">(a) Akta notarial personal / corporate guarantee</option>
                        <option value="6">(b) BPKB / Gross Akta / Invoice</option>
                        <option value="9">(c) Kombinasi Bukti Kepemilikan Agunan Bergerak & Agunan Tidak Bergerak</option>
                        <option value="12">(d) SHM / SHGB / SHGU / SHMRS / SHP</option>
                        <option value="15">(e) Tabungan / Bilyet Deposito / Giro</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">7. STATUS KEPEMILIKAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="status_sc" name="status_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="3">(a) Atas nama pihak ketiga (diluar keluarga owner atau pengurus perusahaan sampai dengan derajat pertama)</option>
                        <option value="9">(b) Atas nama keluarga owner atau pengurus perusahaan sampai dengan derajat pertama (termasuk mertua, menantu dan ipar)</option>
                        <option value="15">(c) Atas nama owner atau pengurus perusahaan</option>
                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">8. MARKETABLE AGUNAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="marketable_sc" name="marketable_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="9">(a) Agunan Tidak Bergerak: Kurang Marketable (jarak > 2 km s.d 5 km dari pusat bisnis/pasar utama di daerah tsb ; Agunan Bergerak : Tidak Mudah Dijual (contoh: Kapal, Alat Berat atau yang dipersamakan dengan itu)</option>
                        <option value="15">(b) Agunan Tidak Bergerak : Marketable (jarak s.d 2 Km dari pusat bisnis/pasar utama di daerah tsb) ; Agunan Bergerak : Mudah Dijual (contoh: Kendaraan bermotor, uang tunai atau yang dipersamakan dengan itu)</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">9. HUBUNGAN DENGAN PERBANKAN (LENDING)</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="lending_sc" name="lending_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="7">(a) Debitur dengan kolektibilitas 2,3, 4, 5, atau hapus buku dan atau pernah NPL namun telah lunas.</option>
                        <option value="14">(b) Merupakan debitur baru tanpa track record (history)</option>
                        <option value="21">(c) Pernah / sedang menikmati fasilitas kredit dengan kategori kolektibilitas 1 namun pernah / sedang dalam kategori restrukturisasi</option>
                        <option value="28">(d) Pernah / sedang menikmati fasilitas kredit dari lembaga keuangan diluar Bank Kalsel kolektibilitas 1</option>
                        <option value="35">(e) Telah menjadi nasabah Bank Kalsel dan sedang menikmati fasilitas kredit minimal 1 tahun dengan track record kolektibilitas 1</option>
                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">10. PENGALAMAN MENGERJAKAN PROYEK</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="pengalaman_sc" name="pengalaman_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) Pemohon belum memiliki pengalaman melaksanakan pekerjaan proyek serupa.</option>
                        <option value="12">(b) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 1 x.</option>
                        <option value="18">(c) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 2 s.d 3x.</option>
                        <option value="24">(d) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak 3 - 5x</option>
                        <option value="30">(e) Pemohon memiliki pengalaman melaksanakan pekerjaan proyek serupa sebanyak >5 x.</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">11. SUMBER DANA PROYEK</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="sumber_dana_sc" name="sumber_dana_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="7">(a) Swasta Bonafid dan belum bekerjasama dengan Bank Kalsel</option>
                        <option value="14">(b) Swasta Bonafid dan telah bekerjasama dengan Bank Kalsel</option>
                        <option value="21">(c) BUMN / BUMD</option>
                        <option value="28">(d) APBN</option>
                        <option value="35">(e) APBD</option>
                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">12. LOKASI PROYEK / PEKERJAAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="lokasi_sc" name="lokasi_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) Berada di lokasi yang tidak dapat diakses dengan alat transportasi umum / khusus.</option>
                        <option value="12">(b) Berada di lokasi yang hanya dapat diakses dengan alat transportasi khusus.</option>
                        <option value="18">(c) Berlokasi jauh dari pusat kota, namun dengan mudah dapat diakses menggunakan alat transportasi umum dan khusus.</option>
                        <option value="24">(d) Berlokasi tidak jauh dari pusat kota.</option>
                        <option value="30">(e) Berlokasi di pusat kota.</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">13. JENIS PROYEK / PEKERJAAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="jenis_proyek_sc" name="jenis_proyek_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="18">(a) Jasa Konstruksi (Bangunan, Jalan, Jembatan, Irigasi, Drainase, dsb)</option>
                        <option value="30">(b) Pengadaan Barang</option>

                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">14. BAHAN BAKU PROYEK</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="bahan_baku_sc" name="bahan_baku_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon belum memiliki surat dukungan dari suplier dimaksud.</option>
                        <option value="12">(b) Proyek pekerjaan yang membutuhkan bahan baku khusus yang hanya dapat diperoleh dari suplier tertentu, dan Pemohon telah melampirkan surat dukungan dari suplier dimaksud.</option>
                        <option value="18">(c) Proyek pekerjaan yang membutuhkan bahan baku khusus yang dapat diproduksi sendiri oleh Pemohon.</option>
                        <option value="24">(d) Proyek pekerjaan yang membutuhkan bahan baku khusus dari suplier tertentu, namun kebutuhan akan bahan baku tersebut telah tersedia di lokasi proyek/workshop Pemohon.</option>
                        <option value="30">(e) Proyek pekerjaan yang hanya memerlukan bahan baku umum yang dapat diperoleh dengan mudah.</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">15. PERALATAN YANG DIGUNAKAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="peralatan_sc" name="peralatan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan.</option>
                        <option value="12">(b) Proyek pekerjaan yang dalam pelaksanaannya memerlukan peralatan kerja khusus dan Pemohon belum memiliki/melampirkan perjanjian sewa peralatan kerja yang dibutuhkan. Namun fungsi peralatan kerja tersebut dapat digantikan dengan peralatan kerja sederhana dengan dukungan tenaga kerja dalam jumlah tertentu.</option>
                        <option value="18">(c) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus dan pemohon telah melampirkan perjanjian sewa peralatan kerja yang dibutuhkan dari pihak ke-3</option>
                        <option value="24">(d) Proyek pekerjaan yang dalam pelaksanaannya hanya dapat dikerjakan dengan peralatan kerja khusus yang telah dimiliki Pemohon.</option>
                        <option value="30">(e) Proyek pekerjaan yang dalam pelaksanaannya hanya memerlukan peralatan kerja sederhana.</option>

                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">16. PEMBAYARAN TERMIJN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="pembayaran_sc" name="pembayaran_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="7">(a) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing dan Standing Instruction.</option>
                        <option value="21">(b) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel dan tidak terdapat Bank Clearing, namun sudah dilengkapi dengan Standing Instruction.</option>
                        <option value="35">(c) Termijn disalurkan melalui rekening Pemohon yang ada di Bank Kalsel yang tertuang di dalam kontrak / terdapat Bank Clearing yang telah ditandatangani oleh Pejabat Pembuat Komitmen dan Bendahara Proyek/Pekerjaan yang diberikan pembiayaan.</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">17. DASAR PENUNJUKAN PEKERJAAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="dasar_penunjukan_sc" name="dasar_penunjukan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) Pengumuman LPSE dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                        <option value="12">(b) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan belum dilakukan konfirmasi kepada pihak pemberi kerja</option>
                        <option value="18">(c) Pengumuman LPSE dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                        <option value="24">(d) Surat Penunjukan Pelaksana Pekerjaan (Gunning) dan telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>
                        <option value="30">(e) Surat Perjanjian Kerja (SPK) / Kontrak yang telah dilakukan konfirmasi kepada pihak pemberi kerja yang dibuktikan dengan FCR</option>

                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">18. PROSENTASE PLAFOND KREDIT TERHADAP NILAI PROYEK</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="prosentase_sc" name="prosentase_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) > 70%</option>
                        <option value="12">(b) > 60% s.d 70%</option>
                        <option value="18">(c) > 40% s.d 60%</option>
                        <option value="24">(d) > 20% s.d 40%</option>
                        <option value="30">(e) ≤ 20%</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">19. JANGKA WAKTU PELAKSANAAN PROYEK</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="jangka_sc" name="jangka_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) > 1 tahun (multi years)</option>
                        <option value="18">(b) > 6 s.d 12 bulan</option>
                        <option value="30">(c) ≤ 6 bulan</option>

                    </select>


                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">20. PROSENTASE AGUNAN TAMBAHAN</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="agunan_sc" name="agunan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="6">(a) 30% s.d 40%</option>
                        <option value="12">(b) > 40% s.d 50%</option>
                        <option value="18">(c) > 50% s.d 75%</option>
                        <option value="24">(d) > 75% s.d 100%</option>
                        <option value="30">(e) > 100%</option>
                    </select>


                </div>
            </div>


        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label class="col-lg-12 control-label">21. PENJAMINAN MASKAPAI ASURANSI</label>
                <div class="col-lg-12">
                    <select class="form-control class-disabled select" id="penjaminan_sc" name="penjaminan_sc" <?php echo !empty($edit_data) ? '' : 'disabled'; ?>>
                        <option value="" disabled="">pilih</option>
                        <option value="5">(a) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan dan terdapat izin deviasi agunan dibawah ketentuan yang berlaku.</option>
                        <option value="10">(b) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit hanya sebesar < 75,00% dari plafond kredit/pembiayaan.</option>
                        <option value="15">(c) Fasilitas kredit/pembiayaan tidak dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan, namun back-up agunan kredit sesuai dengan ketentuan bank teknis yang berlaku (atau < 100%).</option>
                        <option value="20">(d) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Case by Case).</option>
                        <option value="25">(e) Fasilitas kredit/pembiayaan dijamin oleh maskapai asuransi penjaminan kredit/pembiayaan (Automatic Cover).</option>

                    </select>
                    <br>
                    <table class="table-responsive" border="0">
                        <!-- <tr>
                            <td>
                                <h3>Hasil Scoring</h3>
                            </td>
                            <td>

                            </td>
                            <td>
                                <h3 id="hasil_scoring" class="text-danger">-</h3>
                            </td>
                        </tr> -->
                        <tr>
                            <td>
                                <h3>Keterangan</h3>
                            </td>
                            <td>

                            </td>
                            <td>
                                <h3 id="ket_hasil" class="text-danger">-</h3>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td><small>Note: Passing Grade > 325</small></td>
                            <td></td>
                            <td></td>
                        </tr> -->
                    </table>

                </div>
            </div>

        </div>


    </div>



    <div class="form-group row">
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cb_scoring" title="Checkbox ini sebagai paraf" name="cb_scoring" <?php echo empty($edit_data) ? '' : 'disabled'; ?>>
            </div>
        </div>
    </div>

</fieldset>
<script>
    $(document).ready(function() {

        // memberi nilai awal edit Data Entry
        refresh_scoring()
        // simpan data entry
        $('#save_scoring').click(function(e) {
            // alert('save fcr di klik')
            $('#mohon').show()
            e.preventDefault(); // Mencegah form untuk submit secara default
            // Mendefinisikan array untuk menyimpan nilai input
            // alert(data.jenis_agunan_tambah)
            // Mengirim data menggunakan AJAX

            if (edit_data_pemasar) {
                // Jika edit_data_koordinator null atau kosong
                
                var hasil_scoring = data_scoring();
                save_scoring('edit_scoring', hasil_scoring, 'edit_scoring');

            } else {
                // Jika edit_data_koordinator memiliki nilai
                var hasil_paraf = paraf_scoring();
                post_paraf('paraf_scoring', hasil_paraf, 'save_scoring');
            }
        });
    });

    function data_scoring() {
        var scoring_data = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            nama_pemohon_sc: $('#nama_pemohon_sc').val(),
            alamat_sc: $('#alamat_sc').val(),
            plafond_sc: $('#plafond_sc').val(),
            tujuan_sc: $('#tujuan_sc').val(),
            no_pak_sc: $('#no_pak_sc').val(),

            pendirian_sc: $('#pendirian_sc').val(),
            legalitas_sc: $('#legalitas_sc').val(),
            hubungan_sc: $('#hubungan_sc').val(),
            pengelolaan_sc: $('#pengelolaan_sc').val(),
            jenis_agunan_sc: $('#jenis_agunan_sc').val(),
            bukti_sc: $('#bukti_sc').val(),
            status_sc: $('#status_sc').val(),
            marketable_sc: $('#marketable_sc').val(),
            lending_sc: $('#lending_sc').val(),
            pengalaman_sc: $('#pengalaman_sc').val(),
            sumber_dana_sc: $('#sumber_dana_sc').val(),
            lokasi_sc: $('#lokasi_sc').val(),
            jenis_proyek_sc: $('#jenis_proyek_sc').val(),
            bahan_baku_sc: $('#bahan_baku_sc').val(),
            peralatan_sc: $('#peralatan_sc').val(),
            pembayaran_sc: $('#pembayaran_sc').val(),
            dasar_penunjukan_sc: $('#dasar_penunjukan_sc').val(),
            prosentase_sc: $('#prosentase_sc').val(),
            jangka_sc: $('#jangka_sc').val(),
            agunan_sc: $('#agunan_sc').val(),
            penjaminan_sc: $('#penjaminan_sc').val(),

            // upload dokumen
        };
        return scoring_data;
    }

    // bikin function
    function isi_scoring() {
        variabelGlobal(function(hasil) {
            // console.log(hasil.message.data_entry.kd_data);
            if (hasil.status == 'success') {
                var data = hasil.message.scoring;
                var data_entry = hasil.message.data_entry;
                var data_paraf = hasil.message.paraf;
                var fcr = hasil.message.fcr;
                // alert(data.kd_data)
                // unit_kerja_fcr()
                $('#kd_data_tambah').val(hasil.message.data_entry.kd_data);

                $('#nama_pemohon_sc').val(data_entry.nama_debitur);
                // $('#nama_pemohon_sc_koor').val(data_entry.nama_pemohon);
                $('#alamat_sc').val(data_entry.alamat_kantor);
                // $('#alamat_sc_koor').val(data_entry.alamat);
                $('#plafond_sc').val(data_entry.plafond);
                // $('#plafond_sc_koor').val(data_entry.plafond);
                separator_edit(data_entry.plafond, 'plafond_sc_separators')
                // separator_edit(data_entry.plafond, 'plafond_sc_koor_separators')
                $('#tujuan_sc').val(data_entry.tujuan_pengajuan);
                // $('#tujuan_sc_koor').val(data_entry.tujuan);
                $('#no_pak_sc').val(fcr.nomor);
                // $('#no_pak_sc_koor').val(data_entry.no_pak);

                $('#pendirian_sc').val(data.pendirian_bu);
                $('#legalitas_sc').val(data.legalitas);
                $('#hubungan_sc').val(data.hubungan_funding);
                $('#pengelolaan_sc').val(data.manajemen_usaha);
                $('#jenis_agunan_sc').val(data.jenis_agunan);
                $('#bukti_sc').val(data.bukti_kepemilikan_agunan);
                $('#status_sc').val(data.status_kepemilikan);
                $('#marketable_sc').val(data.marketable_agunan);
                $('#lending_sc').val(data.hubungan_landing);
                $('#pengalaman_sc').val(data.pengalaman);
                $('#sumber_dana_sc').val(data.sumber_dana);
                $('#lokasi_sc').val(data.lokasi_proyek);
                $('#jenis_proyek_sc').val(data.jenis_proyek);
                $('#bahan_baku_sc').val(data.bahan_baku);
                $('#peralatan_sc').val(data.peralatan);
                $('#pembayaran_sc').val(data.pembayaran_termijn);
                $('#dasar_penunjukan_sc').val(data.dasar_penunjukan);
                $('#prosentase_sc').val(data.persentase_plafond);
                $('#jangka_sc').val(data.jangka_waktu);
                $('#agunan_sc').val(data.persentase_agunan);
                $('#penjaminan_sc').val(data.penjaminan_maskapai);

                $('#hasil_scoring').html(data.hasil_skoring);
                $('#ket_hasil').html(data.keterangan);
                if (Array.isArray(data_paraf) && data_paraf.length > 0) {
                    let paraf = data_paraf.find(p => p.nomor_halaman == '6'); // Cari nomor_halaman = 4

                    if (paraf && paraf.kd_level && typeof kd_level !== "undefined" &&
                        paraf.kd_level === kd_level &&
                        paraf.kd_data === data.kd_data &&
                        paraf.nama_halaman === 'Scoring') {

                        $('#cb_scoring').prop('checked', paraf.ceklis === 'true');
                    } else {
                        $('#cb_scoring').prop('checked', false);
                    }
                } else {
                    $('#cb_scoring').prop('checked', false);
                }
            } else {
                alert(hasil.message)
            }
        });
    }

    function refresh_scoring() {
        isi_scoring()
        // tampil_button('save_scoring')
    }

    // function data_scoring() {
    //     var scoring_data = {
    //         kd_data_tambah: $('#kd_data_tambah').val(),

    //         nama_pemohon_sc: $('#nama_pemohon_sc').val(),
    //         alamat_sc: $('#alamat_sc').val(),
    //         plafond_sc: $('#plafond_sc').val(),
    //         tujuan_sc: $('#tujuan_sc').val(),
    //         no_pak_sc: $('#no_pak_sc').val(),

    //         pendirian_sc: $('#pendirian_sc').val(),
    //         legalitas_sc: $('#legalitas_sc').val(),
    //         hubungan_sc: $('#hubungan_sc').val(),
    //         pengelolaan_sc: $('#pengelolaan_sc').val(),
    //         jenis_agunan_sc: $('#jenis_agunan_sc').val(),
    //         bukti_sc: $('#bukti_sc').val(),
    //         status_sc: $('#status_sc').val(),
    //         marketable_sc: $('#marketable_sc').val(),
    //         lending_sc: $('#lending_sc').val(),
    //         pengalaman_sc: $('#pengalaman_sc').val(),
    //         sumber_dana_sc: $('#sumber_dana_sc').val(),
    //         lokasi_sc: $('#lokasi_sc').val(),
    //         jenis_proyek_sc: $('#jenis_proyek_sc').val(),
    //         bahan_baku_sc: $('#bahan_baku_sc').val(),
    //         peralatan_sc: $('#peralatan_sc').val(),
    //         pembayaran_sc: $('#pembayaran_sc').val(),
    //         dasar_penunjukan_sc: $('#dasar_penunjukan_sc').val(),
    //         prosentase_sc: $('#prosentase_sc').val(),
    //         jangka_sc: $('#jangka_sc').val(),
    //         agunan_sc: $('#agunan_sc').val(),
    //         penjaminan_sc: $('#penjaminan_sc').val(),

    //         // upload dokumen
    //     };
    //     return scoring_data
    // }

    function save_scoring(method, data_input, button) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + 'pengajuan/' + method,
            type: 'POST',
            dataType: 'json',
            data: data_input,
            success: function(response) {
                if (response.status == 'success') {
                    $('#mohon').hide()
                    refresh_scoring()
                    if (button == 'edit_scoring') {
                        toastr.success(response.message, 'Berhasil')

                    }
                    if (button != 'edit_scoring') {
                        var hasil_recap2 = data_recap();
                        post_recap('edit_recap', hasil_recap2, 'finish_recap')

                    }
                } else {
                    $('#mohon').hide()
                    toastr.warning(response.message, 'Gagal')
                }
            },
            error: function(xhr, status, error) {
                $('#mohon').hide()
                console.log(xhr.responseText)
                toastr.error('Edit scoring gagal', 'Error')
            }
        });

    }
    function paraf_scoring() {
        var scoring_data = {
            kd_data_tambah: $('#kd_data_tambah').val(),

            unit_kerja_tambah: $('#unit_kerja_tambah').val(),
            nomor_halaman: '6',
            nama_halaman: 'scoring',

            cb_scoring: $('#cb_scoring').is(':checked')
            // upload dokumen
        };
        return scoring_data;
    }
</script>