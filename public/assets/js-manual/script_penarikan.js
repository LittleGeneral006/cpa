$.ajax({
  url: base_url + "ajax-penarikan-kredit-transaksional/get_data",
  type: "GET",
  data: { kd_data: $("#kd_data").val() },
  dataType: "json",
  success: function (res) {
    console.log("Data Entry:", res.data_entry);
    console.log("Data Penarikan:", res.penarikan);
    console.log("Next Termin:", res.next_termin);
    console.log("Nomor FCR:", res.nomor_fcr);
    console.log("FAK data:", res.fak_data);
    console.log("FAK Proyeksi RL:", res.fak_rl);
    
    $("#pilih_termin").val(res.next_termin);
    //data entry
    $("#unit_kerja").val(res.data_entry.unit_kerja);
    $("#pemasar").val(res.data_entry.pemasar);
    $("#koor_pemasar").val(res.data_entry.koordinator_pemasar);
    $("#kacab").val(res.data_entry.kepala_cabang);
    $("#kabag").val(res.data_entry.kepala_bagian);
    $("#kadiv").val(res.data_entry.kepala_divisi);
    $("#nama_debitur").val(res.data_entry.nama_debitur);
    $("#npwp").val(res.data_entry.npwp);
    $("#bidang_usaha").val(res.data_entry.bidang_usaha);
    $("#nama_direktur").val(res.data_entry.nama_direktur);
    $("#key_person").val(res.data_entry.key_person);
    $("#alamat_kantor").val(res.data_entry.alamat_kantor);
    $("#alamat_gudang").val(res.data_entry.alamat_gudang);
    $("#group_debitur").val(res.data_entry.group_debitur);
    $("#nama_proyek").val(res.data_entry.nama_proyek);
    $("#nomor_spk").val(res.data_entry.nomor_spk);
    $("#tanggal_spk").val(res.data_entry.tanggal_spk);
    $("#nilai_proyek").val(res.data_entry.nilai_proyek);
    $("#alamat_proyek").val(res.data_entry.alamat_proyek);
    $("#pemberi_kerja").val(res.data_entry.pemberi_kerja);
    $("#penandatangan_kontrak").val(res.data_entry.penandatangan_kontrak);
    $("#alamat_pemberi_kerja").val(res.data_entry.alamat_pemberi_kerja);
    $("#nomor_pk").val(res.data_entry.nomor_pk);
    $("#tanggal_pk").val(res.data_entry.tanggal_pk);
    $("#plafond").val(res.data_entry.plafond);
    $("#jangka_waktu_kredit").val(res.data_entry.jangka_waktu_kredit);
    
    // FCR
    $("#nama_debitur_edit").val(res.data_entry.nama_debitur);
    $("#alamat_kantor_edit").val(res.data_entry.alamat_kantor);
    $("#alamat_gudang_edit").val(res.data_entry.alamat_gudang);
    $("#group_debitur_edit").val(res.data_entry.group_debitur);
    $("#contact_person_edit").val(res.fcr.contact_person);
    // $("#next_termin").val("Termin " + res.next_termin);
    
    //dokumen checklist
    $("#nama_nasabah_dp").val(res.data_entry.nama_debitur);
    $("#alamat_dp").val(res.data_entry.alamat_kantor);
    $("#usaha_dp").val(res.data_entry.bidang_usaha);
    
    //MPDKK
    $("#nama_debitur_mpdkk").val(res.data_entry.nama_debitur);
    $("#nama_direktur_mpdkk").val(res.data_entry.nama_direktur);
    $("#key_person_mpdkk").val(res.data_entry.key_person);
    $("#alamat_kantor_mpdkk").val(res.data_entry.alamat_kantor);
    $("#bidang_usaha_mpdkk").val(res.data_entry.bidang_usaha);
    $("#penarikan_tahap_mpdkk").val(res.next_termin);
    $("#nama_proyek_mpdkk").val(res.data_entry.nama_proyek);
    $("#no_spk_mpdkk").val(res.data_entry.nomor_spk);
    $("#tgl_spk_mpdkk").val(res.data_entry.tanggal_spk);
    $("#nilai_kontrak_mpdkk").val(res.data_entry.nilai_proyek);
    $("#pelaksana_mpdkk").val(res.data_entry.nama_debitur);
    $("#pemberi_kerja_mpdkk").val(res.data_entry.pemberi_kerja);
    $("#plafond_kredit_mpdkk").val(res.fak_rl.kredit_bank_fak_rl);
    $("#jangka_waktu_proyek_mpdkk").val(res.fak_data.lama_pelaksanaan);
    $("#persentase_pemotongan_mpdkk").val(res.fak_rl.dibulatkan_fak_rl);
    

    // Contoh: tampilkan daftar penarikan
    let html = "";
    res.penarikan.forEach(function (row, i) {
      html += "<li>Termin " + (i + 1) + " : " + row.jumlah + "</li>";
      $("#list_penarikan").html(html);

    });
    $("#list_penarikan").html(html);

    let totalPenarikanSebelumnya = res.mpdkk.total_penarikan || 0;

    $("#jumlah_penarikan_disetujui_mpdkk").on("input", function () {
      let plafond = parseFloat(res.fak_rl.kredit_bank_fak_rl) || 0;
      let uangMuka = parseFloat(res.fak_rl.penerimaan_uang_muka_fak_rl) || 0;
      let jumlahSekarang = parseFloat($(this).val()) || 0;

      let sisa = plafond - uangMuka - totalPenarikanSebelumnya - jumlahSekarang;
      $("#sisa_termijn_mpdkk").val(sisa);
    });

  },
  error: function (xhr, status, error) {
    console.log("Response:", xhr.responseText); // lihat isi aslinya
    console.error("Gagal ambil data:", error);
  },
});

function cek_rekap() {
  $.ajax({
    url: base_url + "ajax-penarikan-kredit-transaksional/cek_rekap",
    type: "POST",
    data: { kd_data: $("#kd_data").val() },
    dataType: "json",
    success: function (res) {
      if (res.status === 1) {
        $("#status_rekap").text("Oke");
      } else {
        $("#status_rekap").text("Not Oke");
      }
    },
    error: function (xhr, status, error) {
      console.error("Gagal cek rekap:", error);
    },
  });
}

// Panggil fungsi cek_rekap
cek_rekap();






