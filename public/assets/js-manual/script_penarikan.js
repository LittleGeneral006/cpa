$.ajax({
  url: base_url + "ajax-penarikan-kredit-transaksional/get_data",
  type: "GET",
  data: { kd_data: $("#kd_data").val(), termin: $("#termin").val() },
  dataType: "json",
  success: function (res) {
    // if (res.edit_data) {
    //     $("#contact_person").prop("readonly", false);
    // } else {
    //     $("#contact_person").prop("readonly", true);
    // }
    console.log("Data Entry:", res.data_entry);
    console.log("Nomor FCR:", res.nomor_fcr);
    console.log("FAK data:", res.fak_data);
    console.log("FAK Proyeksi RL:", res.fak_rl);
    console.log("Data Induk:", res.data_induk);
    console.log("Dokumen Penarikan:", res.dok_penarikan);
    console.log("FCR Penarikan:", res.fcr_penarikan);
    console.log("MPDKK:", res.mpdkk);

    const de = res.data_entry || {};
    const di = res.data_induk || {};

    // helper: ambil dari data_induk dulu, kalau kosong/null/undefined baru dari data_entry
    function pick(indukKey, entryKey) {
      const vInduk = di[indukKey];
      if (vInduk !== undefined && vInduk !== null && vInduk !== "") {
        return vInduk;
      }
      const vEntry = de[entryKey];
      return vEntry !== undefined && vEntry !== null ? vEntry : "";
    }

    // =======================
    // ISI FORM MENGGUNAKAN pick
    // =======================

    $("#unit_kerja").val(pick("unit_kerja", "kd_unit_kerja"));
    $("#pemasar").val(pick("pemasar", "pemasar"));
    $("#koor_pemasar").val(pick("koor_pemasar", "koordinator_pemasar"));
    $("#kacab").val(pick("kacab", "kepala_cabang"));
    $("#kabag").val(pick("kabag", "kepala_bagian"));
    $("#kadiv").val(pick("kadiv", "kepala_divisi"));

    $("#nama_debitur_induk").val(pick("nama_debitur_induk", "nama_debitur"));
    $("#npwp").val(pick("npwp", "npwp"));
    $("#bidang_usaha").val(pick("bidang_usaha", "bidang_usaha"));
    $("#nama_direktur").val(pick("nama_direktur", "nama_direktur"));
    $("#key_person").val(pick("key_person", "key_person"));

    $("#alamat_kantor_induk").val(pick("alamat_kantor_induk", "alamat_kantor"));
    $("#alamat_gudang_induk").val(pick("alamat_gudang_induk", "alamat_gudang"));
    $("#group_debitur_induk").val(pick("group_debitur_induk", "group_debitur"));

    $("#nama_proyek").val(pick("nama_proyek", "nama_proyek"));
    $("#nomor_spk").val(pick("nomor_spk", "nomor_spk"));
    $("#tanggal_spk").val(pick("tanggal_spk", "tanggal_spk"));
    $("#nilai_proyek").val(pick("nilai_proyek", "nilai_proyek"));
    $("#alamat_proyek").val(pick("alamat_proyek", "alamat_proyek"));

    $("#pemberi_kerja").val(pick("pemberi_kerja", "pemberi_kerja"));

    $("#penandatangan_kontrak").val(
      pick("penandatangan_kontrak", "penandatangan_kontrak")
    );

    $("#alamat_pemberi_kerja").val(
      pick("alamat_pemberi_kerja", "alamat_pemberi_kerja")
    );

    $("#nomor_pk").val(pick("nomor_pk", "nomor_pk"));
    $("#tanggal_pk").val(pick("tanggal_pk", "tanggal_pk"));

    $("#plafond").val(pick("plafond", "plafond"));
    $("#jangka_waktu_kredit").val(
      pick("jangka_waktu_kredit", "jangka_waktu_kredit")
    );

    // FCR
    $("#nomor").val(res.fcr_penarikan.nomor);
    $("#tanggal").val(res.fcr_penarikan.tanggal);
    $("#kd_unit_kerja").val(res.data_entry.unit_kerja);
    $("#tanggal_kunjungan").val(res.fcr_penarikan.tanggal_kunjungan);
    $("#lokasi_yang_dikunjungi").val(res.fcr_penarikan.lokasi_yang_dikunjungi);
    $("#tujuan_kunjungan").val(res.fcr_penarikan.tujuan_kunjungan);
    $("#hasil_kunjungan").val(res.fcr_penarikan.hasil_kunjungan);
    $("#tindak_lanjut").val(res.fcr_penarikan.tindak_lanjut);
    $("#nama_debitur").val(res.data_entry.nama_debitur);
    $("#alamat_kantor").val(res.data_entry.alamat_kantor);
    $("#alamat_gudang").val(res.data_entry.alamat_gudang);
    $("#group_debitur").val(res.data_entry.group_debitur);
    $("#contact_person").val(res.data_entry.contact_person);
    // $("#next_termin").val("Termin " + res.next_termin);

    //dokumen checklist
    $("#nama_nasabah_dp").val(res.data_entry.nama_debitur);
    $("#alamat_dp").val(res.data_entry.alamat_kantor);
    $("#usaha_dp").val(res.data_entry.bidang_usaha);
    setDocStatus(
      "permohonan_penarikan",
      res.dok_penarikan.permohonan_penarikan
    );
    setDocStatus(
      "dokumen_kebutuhan_penarikan",
      res.dok_penarikan.dokumen_kebutuhan_penarikan
    );
    setDocStatus("dokumen_progres", res.dok_penarikan.dokumen_progres);
    setDocStatus("dokumen_lainnya", res.dok_penarikan.dokumen_lainnya);

    //MPDKK
    $("#nama_debitur_mpdkk").val(res.data_entry.nama_debitur);
    $("#nama_direktur_mpdkk").val(res.data_entry.nama_direktur);
    $("#key_person_mpdkk").val(res.data_entry.key_person);
    $("#alamat_kantor_mpdkk").val(res.data_entry.alamat_kantor);
    $("#bidang_usaha_mpdkk").val(res.data_entry.bidang_usaha);
    $("#penarikan_tahap_mpdkk").val(res.dok_penarikan.termin);
    $("#nama_proyek_mpdkk").val(res.data_entry.nama_proyek);
    $("#no_spk_mpdkk").val(res.data_entry.nomor_spk);
    $("#tgl_spk_mpdkk").val(res.data_entry.tanggal_spk);
    $("#nilai_kontrak_mpdkk").val(res.data_entry.nilai_proyek);
    $("#pelaksana_mpdkk").val(res.data_entry.nama_debitur);
    $("#pemberi_kerja_mpdkk").val(res.data_entry.pemberi_kerja);
    $("#plafond_kredit_mpdkk").val(res.fak_rl.kredit_bank_fak_rl);
    $("#jangka_waktu_proyek_mpdkk").val(res.fak_data.lama_pelaksanaan);
    $("#persentase_pemotongan_mpdkk").val(res.fak_rl.dibulatkan_fak_rl);
    initializeCKEditor("rencana_penggunaan_mpdkk", function (editor) {
      editor.setData(res.mpdkk.rencana_penggunaan_mpdkk);
    });
    console.log(res.mpdkk.rencana_penggunaan_mpdkk);
    initializeCKEditor("lain_lain_mpdkk", function (editor) {
      editor.setData(res.mpdkk.lain_lain_mpdkk);
    });

    function hitungSisaTermijn() {
      const plaf = parseFloat($("#plafond_kredit_mpdkk").val()) || 0;
      const jumlah =
        parseFloat($("#jumlah_penarikan_disetujui_mpdkk").val()) || 0;

      let sisa = plaf - jumlah;
      if (sisa < 0) sisa = 0;

      $("#sisa_termijn_mpdkk").val(Math.round(sisa));
      console.log("Sisa Termijn dihitung:", sisa);
    }

    function hitungJumlahDariPersen() {
      const plaf = parseFloat($("#plafond_kredit_mpdkk").val()) || 0;
      const persen = parseFloat($("#persentase_penarikan_mpdkk").val()) || 0;

      if (plaf <= 0 || persen < 0) {
        $("#jumlah_penarikan_disetujui_mpdkk").val("");
        hitungSisaTermijn();
        return;
      }

      const jumlah = plaf * (persen / 100);
      $("#jumlah_penarikan_disetujui_mpdkk").val(Math.round(jumlah));

      console.log("Jumlah dihitung:", jumlah);

      // update sisa termijn setelah hitung jumlah
      hitungSisaTermijn();
    }

    function hitungPersenDariJumlah() {
      const plaf = parseFloat($("#plafond_kredit_mpdkk").val()) || 0;
      const jumlah =
        parseFloat($("#jumlah_penarikan_disetujui_mpdkk").val()) || 0;

      if (plaf <= 0 || jumlah < 0) {
        $("#persentase_penarikan_mpdkk").val("");
        hitungSisaTermijn();
        return;
      }

      const persen = (jumlah / plaf) * 100;
      $("#persentase_penarikan_mpdkk").val(persen.toFixed(2));

      console.log("Persen dihitung:", persen);

      // update sisa termijn setelah hitung persen
      hitungSisaTermijn();
    }

    // EVENT LISTENER
    $("#persentase_penarikan_mpdkk").on("input", function () {
      hitungJumlahDariPersen();
    });

    $("#jumlah_penarikan_disetujui_mpdkk").on("input", function () {
      hitungPersenDariJumlah();
    });

    // Jika plafon kredit berubah → update semuanya
    $("#plafond_kredit_mpdkk").on("input", function () {
      hitungJumlahDariPersen();
      hitungPersenDariJumlah();
    });
  },
  error: function (xhr, status, error) {
    console.log("Response:", xhr.responseText); // lihat isi aslinya
    console.error("Gagal ambil data:", error);
  },
});

function initializeCKEditor(element, callback) {
  $(function () {
    var editor = CKEDITOR.replace(element, {
      toolbar: [
        {
          name: "list",
          items: ["BulletedList", "NumberedList", "Outdent", "Indent"],
        },
        {
          name: "basicstyles",
          items: ["Bold", "Italic", "Underline"],
        },
      ],
    });

    editor.on("instanceReady", function () {
      // console.log("CKEditor instance is ready");
      if (callback && typeof callback === "function") {
        callback(editor);
      }
    });
  });
}

function cek_rekap() {
  const kd_data = $("#kd_data").val();
  const termin = $("#termin").val() || ""; // kalau termin dipakai per penarikan

  $.ajax({
    url: base_url + "ajax-penarikan-kredit-transaksional/cek_rekap",
    type: "POST",
    dataType: "json",
    data: { kd_data: kd_data, termin: termin },
    success: function (res) {
      if (!res || res.status !== "ok") {
        console.error("Gagal cek rekap:", res && res.message);
        return;
      }

      // Data Induk
      if (res.data_induk_ok) {
        $("#data_entry1").show(); // Oke
        $("#data_entry2").hide(); // Not Oke
      } else {
        $("#data_entry1").hide();
        $("#data_entry2").show();
      }

      // FCR
      if (res.fcr_ok) {
        $("#fcr1").show();
        $("#fcr2").hide();
      } else {
        $("#fcr1").hide();
        $("#fcr2").show();
      }

      // Dokumen Checklist
      if (res.dokumen_ok) {
        $("#dokumen_checklist1").show();
        $("#dokumen_checklist2").hide();
      } else {
        $("#dokumen_checklist1").hide();
        $("#dokumen_checklist2").show();
      }

      // MPDKK
      if (res.mpdkk_ok) {
        $("#mpdkk1").show();
        $("#mpdkk2").hide();
      } else {
        $("#mpdkk1").hide();
        $("#mpdkk2").show();
      }

      // Kalau mau status global, bisa pakai ini:
      // if (res.all_ok) { ... }
    },
    error: function (xhr, status, error) {
      console.error("Gagal cek rekap:", error);
    },
  });
}

function base64ToBlobUrl(dataUri) {
  const idx = dataUri.indexOf(",");
  const header = dataUri.substring(0, idx);
  const b64 = dataUri.substring(idx + 1);
  const mime =
    header.replace(/^data:/, "").split(";")[0] || "application/octet-stream";

  const byteStr = atob(b64);
  const len = byteStr.length;
  const bytes = new Uint8Array(len);
  for (let i = 0; i < len; i++) bytes[i] = byteStr.charCodeAt(i);

  const blob = new Blob([bytes], { type: mime });
  return URL.createObjectURL(blob);
}

// function setDocStatus(key, dataUri) {
//   const status = $(`#${key}_status`);
//   const preview = $(`#${key}_preview`);
//   status.empty();
//   preview.empty();

//   if (!dataUri) {
//     status.html(`<span class="badge bg-danger">Belum ada file</span>`);
//     $(`#${key}`).addClass("is-invalid");
//     return;
//   }

//   $(`#${key}`).addClass("is-valid");
//   status.html(`<span class="badge bg-success">Sudah diunggah</span>`);

//   const url = base64ToBlobUrl(dataUri);
//   const mime = (dataUri.split(";")[0] || "").replace("data:", "");

//   if (mime.startsWith("image/")) {
//     preview.html(`<img src="${url}" class="file-thumb img-thumbnail">`);
//   } else if (mime === "application/pdf") {
//     preview.html(
//       `<button type="button" class="btn btn-sm btn-primary" onclick="window.open('${url}', '_blank')">Preview PDF</button>`
//     );
//   } else {
//     preview.html(
//       `<a href="${url}" class="btn btn-sm btn-secondary" download>Unduh File</a>`
//     );
//   }
// }
function base64ToBlobUrl(dataUri) {
  const idx = dataUri.indexOf(",");
  const header = dataUri.substring(0, idx);
  const b64 = dataUri.substring(idx + 1);
  const mime =
    header.replace(/^data:/, "").split(";")[0] || "application/octet-stream";

  const byteStr = atob(b64);
  const len = byteStr.length;
  const bytes = new Uint8Array(len);
  for (let i = 0; i < len; i++) bytes[i] = byteStr.charCodeAt(i);

  const blob = new Blob([bytes], { type: mime });
  return URL.createObjectURL(blob);
}

function setDocStatus(key, dataUri) {
  const status = $("#" + key + "_status");
  const preview = $("#" + key + "_preview");
  status.empty();
  preview.empty();

  if (!dataUri) {
    status.html('<span class="badge bg-danger">Belum ada file</span>');
    $("#" + key)
      .removeClass("is-valid")
      .addClass("is-invalid");
    return;
  }

  $("#" + key)
    .removeClass("is-invalid")
    .addClass("is-valid");
  status.html('<span class="badge bg-success">Sudah diunggah</span>');

  const url = base64ToBlobUrl(dataUri);
  const mime = (dataUri.split(";")[0] || "").replace("data:", "");

  if (mime.startsWith("image/")) {
    preview.html(`<img src="${url}" class="file-thumb img-thumbnail">`);
  } else if (mime === "application/pdf") {
    preview.html(
      `<button type="button" class="btn btn-sm btn-primary" onclick="window.open('${url}', '_blank')">Preview PDF</button>`
    );
  } else {
    preview.html(
      `<a href="${url}" class="btn btn-sm btn-secondary" download>Unduh File</a>`
    );
  }
}

function refreshDokumenPenarikan() {
  $.ajax({
    url: base_url + "ajax-penarikan-kredit-transaksional/get_data",
    type: "GET",
    dataType: "json",
    data: {
      kd_data: $("#kd_data").val(),
      termin: $("#termin").val(),
    },
    success: function (res) {
      const dok = res.dok_penarikan || {};
      setDocStatus("permohonan_penarikan", dok.permohonan_penarikan);
      setDocStatus(
        "dokumen_kebutuhan_penarikan",
        dok.dokumen_kebutuhan_penarikan
      );
      setDocStatus("dokumen_progres", dok.dokumen_progres);
      setDocStatus("dokumen_lainnya", dok.dokumen_lainnya);
    },
  });
}

$(document).on("click", "#btn-refresh-fcr", function () {
  $.ajax({
    url: base_url + "ajax-penarikan-kredit-transaksional/generate_nomor_fcr",
    method: "POST",
    dataType: "json",
    data: {
      kd_data: $("#kd_data").val(),
      kd_fcr: $("#kd_fcr").val() || "", // kalau kamu punya hidden kd_fcr
    },
    beforeSend: function () {
      $("#btn-refresh-fcr").prop("disabled", true).text("Memproses...");
    },
    success: function (res) {
      if (res?.status === "ok") {
        $("#nomor").val(res.nomor || "");
        $("#tanggal").val(res.tanggal || "");
        toastr.success("Nomor FCR diperbarui (preview).");

        // opsional: tandai field
        $("#nomor").addClass("is-valid");
        setTimeout(() => $("#nomor").removeClass("is-valid"), 1500);
      } else {
        toastr.warning(res?.message || "Gagal membuat nomor.");
      }
    },
    error: function () {
      toastr.error("Koneksi gagal.");
    },
    complete: function () {
      $("#btn-refresh-fcr").prop("disabled", false).text("Refresh Nomor FCR");
    },
  });
});
