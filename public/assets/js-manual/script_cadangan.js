var angka = 1;
var angkatermijn = 0;
var angkatermijninput = 1;
var angkamauk = 1;
var angkamauk2 = 1;
var angkamauk3 = 1;
var angkadcl = 2;
var angkadcl2 = 2;
var angkadcl3 = 2;
var angkadcl4 = 2;
var angkadcl5 = 2;
var angkadcl6 = 2;
var angkadcl7 = 2;
var angkadcl8 = 2;

// function tampil_button(param) {
//   if (param == "save_fak_data") {
//     $("#save_fak_data").show();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_fak_modal") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").show();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_fak_rl") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").show();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_lap_rl") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").show();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_ceftb") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").show();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_faa") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").show();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_mauk") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").show();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_dcl") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").show();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").hide();
//   } else if (param == "save_scoring_koor") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").show();
//     $("#save_recap").hide();
//   } else if (param == "save_recap") {
//     $("#save_fak_data").hide();
//     $("#save_fak_modal").hide();
//     $("#save_fak_rl").hide();
//     $("#save_lap_rl").hide();
//     $("#save_ceftb").hide();
//     $("#save_faa").hide();
//     $("#save_mauk").hide();
//     $("#save_dcl").hide();
//     $("#save_scoring_koor").hide();
//     $("#save_recap").show();
//   } else {
//     // $("#save_fak_data").show();
//     // $("#save_fak_modal").hide();
//     // $("#save_fak_rl").hide();
//     // $("#save_lap_rl").hide();
//     // $("#save_ceftb").hide();
//     // $("#save_faa").hide();
//     // $("#save_mauk").hide();
//     // $("#save_dcl").hide();
//     // $("#save_scoring_koor").hide();
//     // $("#save_recap").hide();
//   }
// }

function variabelGlobal(callback) {
  var kirim = {
    kd_data: kd_data_encrypt,
  };
  $.ajax({
    // url: "<?php echo base_url() ?>pengajuan/getGlobal",
    url: base_url + "pengajuan/getGlobal",
    type: "POST",
    data: kirim,
    dataType: "JSON",
    success: function (response) {
      var hasil = {
        status: "success",
        message: response,
      };
      callback(hasil); // Panggil callback dengan hasil yang diperoleh
    },
    error: function (jqXHR, textStatus, errorThrown) {
      var hasil = {
        status: "error",
        message: "gagal mendapatkan data",
      };
      callback(hasil); // Panggil callback dengan hasil yang diperoleh
    },
  });
}

function isi_fak_data() {
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.fak_data;
      // alert(data.kd_data)
      // unit_kerja_fcr()
      // console.log(hasil.message.kegiatan_fak_data);
      $("#kegiatan_fak_data").val(data.kegiatan);
      $("#pekerjaan_fak_data").val(data.pekerjaan);
      $("#no_kontrak_fak_data").val(data.no_kontrak);
      $("#lokasi_fak_data").val(data.lokasi);
      $("#kontraktor_fak_data").val(data.kontraktor);
      $("#sumber_dana_fak_data").val(data.sumber_dana);
      $("#nilai_kontrak_setelah_ppn_fak_data").val(
        data.nilai_kontrak_setelah_ppn
      );
      separator_edit(
        data.nilai_kontrak_setelah_ppn,
        "nilai_kontrak_setelah_ppn_fak_data_separators"
      );
      $("#ppn_fak_data").val(data.ppn);
      $("#pph_fak_data").val(data.pph);
      $("#no_kontrak2_fak_data").val(data.no_kontrak);
      $("#tgl_kontrak_fak_data").val(data.tgl_kontrak);
      $("#tgl_pelaksanaan_fak_data").val(data.tgl_pelaksanaan);
      $("#lama_pelaksanaan_fak_data").val(data.lama_pelaksanaan);
      $("#lama_pemeliharaan_fak_data").val(data.lama_pemeliharaan);
      $("#tgl_pencairan_fak_data").val(data.tgl_pencairan);
      $("#persen_uang_muka_fak_data").val(data.persen_uang_muka);
      $("#bunga_kredit_fak_data").val(data.bunga_kredit);
      $("#profit_kontraktor_fak_data").val(data.profit_kontraktor);
      $("#biaya_pemeliharaan_fak_data").val(data.biaya_pemeliharaan);
      $("#biaya_provisi_fak_data").val(data.biaya_provisi);
      $("#itemppfakdata").val(data.item_pp);
      $("#ppnppfakdata").val(data.ppn_pp);
      $("#nilaisebelumppnppfakdata").val(data.nilai_sebelum_ppn_pp);
      $("#nilaisesudahppnppfakdata").val(data.nilai_sesudah_ppn_pp);
      $("#pembulatan_nilai_sebelum_ppn_total_pp_fak_data").val(
        data.pembulatan_nilai_sebelum_ppn_total_pp
      );
      $("#pembulatan_nilai_sesudah_ppn_total_pp_fak_data").val(
        data.pembulatan_nilai_sesudah_ppn_total_pp
      );
      $("#jumlah_nilai_sebelum_ppn_total_pp_fak_data").val(
        data.jumlah_nilai_sebelum_ppn_total_pp
      );
      $("#jumlah_nilai_sesudah_ppn_total_pp_fak_data").val(
        data.jumlah_nilai_sesudah_ppn_total_pp
      );
      separator_edit(
        data.jumlah_nilai_sebelum_ppn_total_pp,
        "jumlah_nilai_sebelum_ppn_total_pp_fak_data_separators"
      );
      separator_edit(
        data.jumlah_nilai_sesudah_ppn_total_pp,
        "jumlah_nilai_sesudah_ppn_total_pp_fak_data_separators"
      );

      $("#gaji_direktur_fak_data").val(data.gaji_direktur);
      separator_edit(data.gaji_direktur, "gaji_direktur_fak_data_separators");
      $("#gaji_pengawas_fak_data").val(data.gaji_pengawas);
      separator_edit(data.gaji_pengawas, "gaji_pengawas_fak_data_separators");
      $("#gaji_staf_fak_data").val(data.gaji_staf);
      separator_edit(data.gaji_staf, "gaji_staf_fak_data_separators");
      $("#biaya_umum_fak_data").val(data.biaya_umum);
      separator_edit(data.biaya_umum, "biaya_umum_fak_data_separators");
      $("#termijnfakdata").val(data.termijn);
      $("#progresstermijnfakdata").val(data.progress_termijn);
      $("#persentasetermijnfakdata").val(data.persentase_termijn);
      $("#prakiraantgltermijnfakdata").val(data.prakiraan_tgl_termijn);
      $("#setelah_masa_pemeliharaan_fak_data").val(
        data.setelah_masa_pemeliharaan_termijn
      );
      $("#total_termijn_fak_data").val(data.total_termijn);
      $("#jumlah_termijn_fak_data").val(data.jumlah_termijn);

      let itempp = data.item_pp.split(";");
      let ppnpp = data.ppn_pp.split(";");
      let nilaisebelumppnpp = data.nilai_sebelum_ppn_pp.split(";");
      let nilaisesudahppnpp = data.nilai_sesudah_ppn_pp.split(";");
      let lengthpp = itempp.length + 1;
      for (var i = 0; i < itempp.length; i++) {
        if (i == 0) {
          $("#item_pp_fak_data" + i).val(itempp[0]);
          $("#ppn_pp_fak_data" + i).val(ppnpp[0]);
          $("#nilai_sebelum_ppn_pp_fak_data" + i).val(nilaisebelumppnpp[0]);
          $("#nilai_sesudah_ppn_pp_fak_data" + i).val(nilaisesudahppnpp[0]);
          $("#item_pp_fak_modal" + i).val(itempp[0]);
          separator_edit(
            nilaisebelumppnpp[0],
            "nilai_sebelum_ppn_pp_fak_data" + i + "_separators"
          );
          separator_edit(
            nilaisesudahppnpp[0],
            "nilai_sesudah_ppn_pp_fak_data" + i + "_separators"
          );
        } else {
          var index = lengthpp - 1 - i;
          var html1 = $(".copy-pp").html();
          separator_edit(
            nilaisebelumppnpp[index],
            "nilai_sebelum_ppn_pp_fak_data" + i + "_separators"
          );
          separator_edit(
            nilaisesudahppnpp[index],
            "nilai_sesudah_ppn_pp_fak_data" + i + "_separators"
          );
          $(".add-form-pp").after(html1);
          var html11 =
            '<div class="col-lg-3">' +
            '<label class="col-lg-6 control-label">Item</label>' +
            '<div class="col-lg-12">' +
            '<input id="item_pp_fak_data' +
            i +
            '" name="item_pp_fak_data[]" onkeyup="copyvalue(this.id, \'item_pp_fak_modal' +
            i +
            '\')" type="text" value="' +
            itempp[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<label class="col-lg-6 control-label">PPN</label>' +
            '<div class="col-lg-24">' +
            '<div class="input-group">' +
            '<input id="ppn_pp_fak_data' +
            i +
            '" name="ppn_pp_fak_data[]" value="' +
            ppnpp[index] +
            '" onkeyup="hitungPP(' +
            i +
            ')" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            '<div class="input-group-append">' +
            '<span class="input-group-text">%</span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<label class="col-lg-12 control-label">Nilai Sebelum PPN</label>' +
            '<div class="col-lg-12">' +
            '<input id="nilai_sebelum_ppn_pp_fak_data' +
            i +
            '" name="nilai_sebelum_ppn_pp_fak_data[]" value="' +
            nilaisebelumppnpp[index] +
            '" onkeyup="hitungPP(' +
            i +
            ')" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            '<p>Nominal: <span id="nilai_sebelum_ppn_pp_fak_data' +
            i +
            '_separators" class="mask"></span></p>' +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<label class="col-lg-12 control-label">Nilai Sesudah PPN</label>' +
            '<div class="col-lg-12">' +
            '<input id="nilai_sesudah_ppn_pp_fak_data' +
            i +
            '" name="nilai_sesudah_ppn_pp_fak_data[]" type="text" value="' +
            nilaisesudahppnpp[index] +
            '" placeholder="" onchange="copyvalue(this.id, \'nilai_pp_fak_modal' +
            i +
            '\')" class="form-control" ' +
            is_disabled +
            ">" +
            '<p>Nominal: <span id="nilai_sesudah_ppn_pp_fak_data' +
            i +
            '_separators" class="mask"></span></p>' +
            "</div>" +
            "</div>";
          separator_edit(
            nilaisebelumppnpp[index],
            "nilai_sebelum_ppn_pp_fak_data" + i + "_separators"
          );
          separator_edit(
            nilaisesudahppnpp[index],
            "nilai_sesudah_ppn_pp_fak_data" + i + "_separators"
          );
          $(".delete-btn-pp-fak-data").first().after(html11);
          var html2 = $(".copy-pp-fak-modal").html();
          $(".add-form-pp-fak-modal").after(html2);
          var html12 =
            '<div class="col-lg-6  ">' +
            '<label class="col-lg-24 control-label">Item</label>' +
            '<div class="col-lg-24">' +
            '<input id="item_pp_fak_modal' +
            i +
            '" name="item_pp_fak_modal[]" type="text" value="' +
            itempp[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-6">' +
            '<label class="col-lg-24 control-label">Nilai</label>' +
            '<div class="col-lg-24">' +
            '<input id="nilai_pp_fak_modal' +
            i +
            '" name="nilai_pp_fak_modal[]" onkeyup="hitungPPFAKM()" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
        }
        $(".delete-btn-pp-fak-modal").first().after(html12);
      }

      let termijn = data.termijn.split(";");
      let progresstermijn = data.progress_termijn.split(";");
      let persentasetermijn = data.persentase_termijn.split(";");
      let prakiraantgltermijn = data.prakiraan_tgl_termijn.split(";");
      let lengthtermijn = termijn.length + 1;
      for (var i = 0; i < termijn.length; i++) {
        if (i == 0) {
          $("#termijn_fak_data" + i).val(termijn[0]);
          $("#progress_termijn_fak_data" + i).val(progresstermijn[0]);
          $("#persentase_termijn_fak_data").val(persentasetermijn[0]);
          $("#prakiraan_tgl_termijn_fak_data" + i).val(prakiraantgltermijn[0]);
        } else {
          var index = lengthtermijn - 1 - i;
          var html1 = $(".copy-termijn").html();
          $(".add-form-termijn-fak-data").after(html1);
          var html11 =
            '<div class="col-lg-4">' +
            '<label class="col-lg-6 control-label">Termijn</label>' +
            '<input id="termijn_fak_data' +
            i +
            '" name="termijn_fak_data[]" type="text" value="' +
            termijn[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<label class="col-lg-6 control-label">Progress</label>' +
            '<div class="input-group">' +
            '<input id="progress_termijn_fak_data' +
            i +
            '" name="progress_termijn_fak_data[]" type="text" value="' +
            progresstermijn[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            '<div class="input-group-append">' +
            '<span class="input-group-text">%</span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<label class="col-lg-18 center control-label">Persentase Termijn</label>' +
            '<div class="input-group">' +
            '<input id="persentase_termijn_fak_data" name="persentase_termijn_fak_data[]" type="text" value="' +
            persentasetermijn[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            '<div class="input-group-append">' +
            '<span class="input-group-text">%</span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-1">' +
            ' <a class="btn btn-success btn-rounded m-t-n-xs" style="margin-top:30px" onclick="hitungPrakiraanTanggalTermijn(' +
            i +
            ')"><span>Hitung</span></a>' +
            "</div>" +
            '<div class="col-lg-3">' +
            '<label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>' +
            '<input id="prakiraan_tgl_termijn_fak_data' +
            i +
            '" name="prakiraan_tgl_termijn_fak_data[]" type="date" value="' +
            prakiraantgltermijn[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>";
          $(".delete-btn-termijn-fak-data").first().after(html11);
        }
      }
      resizeJquerySteps();
    } else {
      alert(hasil.message);
    }
  });
}

function isi_fak_modal() {
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.fak_modal;
      $("#proyek_fak_modal").val(data.proyek_fak_modal);
      $("#profit_fak_modal").val(data.profit_fak_modal);
      $("#ppn_fak_modal").val(data.ppn_fak_modal);
      $("#pemeliharaan_fak_modal").val(data.pemeliharaan_fak_modal);
      $("#persentase_proyek_fak_modal").val(data.persentase_proyek_fak_modal);
      $("#nilai_proyek_fak_modal").val(data.nilai_proyek_fak_modal);
      separator_edit(
        data.nilai_proyek_fak_modal,
        "nilai_proyek_fak_modal_separators"
      );
      $("#itemppfakmodal").val(data.item_pp_fak_modal);
      $("#nilaippfakmodal").val(data.nilai_pp_fak_modal);
      // separator_edit(
      //       data.nilai_proyek_fak_modal,
      //       "nilai_proyek_fak_modal_separators"
      //     );
      $("#koreksi_biaya_fak_modal").val(data.koreksi_biaya_fak_modal);
      $("#jumlah_fak_modal").val(data.jumlah_fak_modal);
      $("#gaji_direktur_fak_modal").val(data.gaji_direktur_fak_modal);
      $("#gaji_pengawas_fak_modal").val(data.gaji_pengawas_fak_modal);
      $("#gaji_staf_fak_modal").val(data.gaji_staf_fak_modal);
      $("#biaya_umum_fak_modal").val(data.biaya_umum_fak_modal);
      $("#total_biaya_umum_fak_modal").val(data.total_biaya_umum_fak_modal);
      $("#jumlah_total_biaya_umum_fak_modal").val(
        data.jumlah_total_biaya_umum_fak_modal
      );
      $("#persentase_pekerjaan_fak_modal").val(
        data.persentase_pekerjaan_fak_modal
      );
      $("#persiapan_pekerjaan_fak_modal").val(
        data.persiapan_pekerjaan_fak_modal
      );
      $("#biaya_umum_adm_fak_modal").val(data.biaya_umum_adm_fak_modal);
      $("#jumlah_kebutuhan_modal_kerja_fak_modal").val(
        data.jumlah_kebutuhan_modal_kerja_fak_modal
      );
      $("#penerimaan_uang_muka_fak_modal").val(
        data.penerimaan_uang_muka_fak_modal
      );
      $("#jumlah_penerimaan_uang_muka_fak_modal").val(
        data.jumlah_penerimaan_uang_muka_fak_modal
      );
      $("#persentase_penerimaan_uang_muka_fak_modal").val(
        data.persentase_penerimaan_uang_muka_fak_modal
      );
      $("#pembiayaan_sendiri_fak_modal").val(data.pembiayaan_sendiri_fak_modal);
      $("#jumlah_pembiayaan_sendiri_fak_modal").val(
        data.jumlah_pembiayaan_sendiri_fak_modal
      );
      $("#persentase_pembiayaan_sendiri_fak_modal").val(
        data.persentase_pembiayaan_sendiri_fak_modal
      );
      $("#kredit_bank_fak_modal").val(data.kredit_bank_fak_modal);
      $("#jumlah_kredit_bank_fak_modal").val(data.jumlah_kredit_bank_fak_modal);
      $("#persentase_kredit_bank_fak_modal").val(
        data.persentase_kredit_bank_fak_modal
      );
      $("#sumber_pembiayaan_fak_modal").val(data.sumber_pembiayaan_fak_modal);
      $("#jumlah_bulat_sumber_pembiayaan_fak_modal").val(
        data.jumlah_bulat_sumber_pembiayaan_fak_modal
      );
      $("#persentase_jumlah_sumber_pembiayaan_fak_modal").val(
        data.persentase_jumlah_sumber_pembiayaan_fak_modal
      );
      // upload dokumen

      let nilai_pp_fak_modal = data.nilai_pp_fak_modal.split(";");
      // console.log(nilai_pp_fak_modal);
      let lengthnilai_pp_fak_modal = nilai_pp_fak_modal.length + 1;
      for (var i = 0; i < nilai_pp_fak_modal.length; i++) {
        if (i == 0) {
          $("#nilai_pp_fak_modal" + i).val(nilai_pp_fak_modal[0]);
        } else {
          var index = lengthnilai_pp_fak_modal - 1 - i;
          $("#nilai_pp_fak_modal" + i).val(nilai_pp_fak_modal[index]);
        }
      }
    } else {
      alert(hasil.message);
    }
  });
}
function isi_fak_rl() {
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.fak_rl;
      // console.log(data);
      $("#nilai_kontrak_fak_rl").val(data.nilai_kontrak_fak_rl);
      $("#pekerjaan_persiapan_konstruksi_fak_rl").val(
        data.pekerjaan_persiapan_konstruksi_fak_rl
      );
      $("#laba_kotor_fak_rl").val(data.laba_kotor_fak_rl);
      $("#biaya_umum_adm_fak_rl").val(data.biaya_umum_adm_fak_rl);
      $("#laba_usaha_fak_rl").val(data.laba_usaha_fak_rl);
      $("#bunga_provisi_bank_fak_rl").val(data.bunga_provisi_bank_fak_rl);
      $("#laba_sebelum_pajak_fak_rl").val(data.laba_sebelum_pajak_fak_rl);
      $("#pajak_pph_ppn_fak_rl").val(data.pajak_pph_ppn_fak_rl);
      $("#laba_bersih_fak_rl").val(data.laba_bersih_fak_rl);
      $("#gross_profit_margin_fak_rl").val(data.gross_profit_margin_fak_rl);
      $("#gross_operating_margin_fak_rl").val(
        data.gross_operating_margin_fak_rl
      );
      $("#return_of_sale_fak_rl").val(data.return_of_sale_fak_rl);
      $("#return_of_equity_fak_rl").val(data.return_of_equity_fak_rl);
      $("#harga_borongan_fak_rl").val(data.harga_borongan_fak_rl);
      $("#persentase_penerimaan_uang_muka_fak_rl").val(
        data.persentase_penerimaan_uang_muka_fak_rl
      );
      $("#penerimaan_uang_muka_fak_rl").val(data.penerimaan_uang_muka_fak_rl);
      $("#persentase_penerimaan_termijn_fak_rl").val(
        data.persentase_penerimaan_termijn_fak_rl
      );
      $("#penerimaan_termijn_fak_rl").val(data.penerimaan_termijn_fak_rl);
      $("#persentase_penerimaan_termijn_pemeliharaan_fak_rl").val(
        data.persentase_penerimaan_termijn_pemeliharaan_fak_rl
      );
      $("#penerimaan_termijn_pemeliharaan_fak_rl").val(
        data.penerimaan_termijn_pemeliharaan_fak_rl
      );
      $("#persentase_penerimaan_bersih_fak_rl").val(
        data.persentase_penerimaan_bersih_fak_rl
      );
      $("#penerimaan_bersih_fak_rl").val(data.penerimaan_bersih_fak_rl);
      $("#pajak_ppn_pph_fak_rl").val(data.pajak_ppn_pph_fak_rl);
      $("#kosong_bersih_fak_rl").val(data.kosong_bersih_fak_rl);
      $("#kredit_bank_fak_rl").val(data.kredit_bank_fak_rl);
      $("#persentase_pemotongan_kredit_bank_fak_rl").val(
        data.persentase_pemotongan_kredit_bank_fak_rl
      );
      $("#dibulatkan_fak_rl").val(data.dibulatkan_fak_rl);
    } else {
      alert(hasil.message);
    }
  });
}

function isi_upload_lap_rl() {
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.upload_lap_rl;
      // console.log(data);
      $("#laporan_rugi_laba_upload_lap_rl").val(
        data.laporan_rugi_laba_upload_lap_rl
      );
      $("#neraca_upload_lap_rl").val(data.neraca_upload_lap_rl);
      $("#depresiasi_upload_lap_rl").val(data.depresiasi_upload_lap_rl);
      $("#rasio_lap_keuangan_upload_lap_rl").val(
        data.rasio_lap_keuangan_upload_lap_rl
      );
    } else {
      alert(hasil.message);
    }
  });
}

function isi_ceftb() {
  variabelGlobal(function (hasil) {
    if (hasil.status == "success") {
      var data = hasil.message.ceftb;
      $("#nilaicheckboxceft").val(data.checkboxceft);
      $("#hasilcheckboxceft").val(data.hasilceft);
      $("#hasiltotalCEFT").val(data.totalceft);
      $("#nilaicheckboxcefb").val(data.checkboxcefb);
      $("#hasilcheckboxcefb").val(data.hasilcefb);
      $("#hasiltotalCEFB").val(data.totalcefb);

      let isicheckboxceft = data.checkboxceft.split(";");

      for (var i = 0; i < isicheckboxceft.length; i++) {
        var checkboxId = "#checkbox" + (i + 1) + "ceft";
        if (isicheckboxceft[i] != "0") {
          $(checkboxId).prop("checked", true);
        } else {
          $(checkboxId).prop("checked", false);
        }
      }
      let isicheckboxcefb = data.checkboxcefb.split(";");

      for (var i = 0; i < isicheckboxcefb.length; i++) {
        var checkboxId = "#checkbox" + (i + 1) + "cefb";
        if (isicheckboxcefb[i] != "0") {
          $(checkboxId).prop("checked", true);
        } else {
          $(checkboxId).prop("checked", false);
        }
      }

      let hasilceft = data.hasilceft.split(";");

      let lengthhasilceft = hasilceft.length + 1;
      for (var i = 0; i < hasilceft.length; i++) {
        if (i == 0) {
          $("#hasil" + (i + 1) + "ceft").val(hasilceft[0]);
        } else {
          var index = lengthhasilceft - 1 - i;
          $("#hasil" + (i + 1) + "ceft").val(hasilceft[index]);
        }
      }

      let hasilcefb = data.hasilcefb.split(";");
      let lengthhasilcefb = hasilcefb.length + 1;
      for (var i = 0; i < hasilcefb.length; i++) {
        if (i == 0) {
          $("#hasil" + (i + 1) + "cefb").val(hasilcefb[0]);
        } else {
          var index = lengthhasilcefb - 1 - i;
          $("#hasil" + (i + 1) + "cefb").val(hasilcefb[index]);
        }
      }
    } else {
      alert(hasil.message);
    }
  });
}

function isi_faa() {
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.faa;
      // console.log(data);
      $("namanasabahbb").val(data.nama_nasabah_bb);
      $("jenisdokumenbb").val(data.jenis_dokumen_bb);
      $("alamatbb").val(data.alamat_bb);
      $("jenisbb").val(data.jenis_bb);
      $("modeltipebb").val(data.model_tipe_bb);
      $("merekccbb").val(data.merek_cc_bb);
      $("tahunpembuatanbb").val(data.tahun_pembuatan_bb);
      $("serialnumberbb").val(data.serial_number_bb);
      $("nomormesinbb").val(data.nomor_mesin_bb);
      $("warnabb").val(data.warna_bb);
      $("bahanbakarbb").val(data.bahan_bakar_bb);
      $("kondisikeadaanbb").val(data.kondisi_keadaan_bb);
      $("nomorpolisibb").val(data.nomor_polisi_bb);
      $("buktikepemilikanagbbb").val(data.bukti_kepemilikan_agb_bb);
      $("invoicenobb").val(data.invoice_no_bb);
      $("invoicetanggalbb").val(data.invoice_tanggal_bb);
      $("perubahanhakterakhirbb").val(data.perubahan_hak_terakhir_bb);
      $("tercatatatasnamabb").val(data.tercatat_atas_nama_bb);
      $("alamatpemiliksaatinibb").val(data.alamat_pemilik_saat_ini_bb);
      $("umurteknisbb").val(data.umur_teknis_bb);
      $("perkiraanumurekonomisbb").val(data.perkiraan_umur_ekonomis_bb);
      $("tempatpenyimpananbb").val(data.tempat_penyimpanan_bb);
      $("routebb").val(data.route_bb);
      $("jarakrataratatempuhbb").val(data.jarak_rata_rata_tempuh_bb);
      $("namanasabahfaatb").val(data.nama_nasabah_faa_tb);
      $("nomorshmfaatb").val(data.nomor_shm_faa_tb);
      $("tanggalshmfaatb").val(data.tanggal_shm_faa_tb);
      $("namapemilikshmfaatb").val(data.nama_pemilik_shm_faa_tb);
      $("alamatagunanfaatb").val(data.alamat_agunan_faa_tb);
      $("hargapasartanahfaatb").val(data.harga_pasar_tanah_faa_tb);
      $("hargabukutanahfaatb").val(data.harga_buku_tanah_faa_tb);
      $("hargamenurutpejabatbanktanahfaatb").val(
        data.harga_menurut_pejabat_bank_tanah_faa_tb
      );
      $("hargatanahtanahfaatb").val(data.harga_tanah_tanah_faa_tb);
      $("luaspersegitanahtanahfaatb").val(data.luas_persegi_tanah_tanah_faa_tb);
      $("hasilperhitunganpenilaiantanahfaatb").val(
        data.hasil_perhitungan_penilaian_tanah_faa_tb
      );
    } else {
      alert(hasil.message);
    }
  });
}

function isi_mauk() {
  // editor = ckEditorInstance;
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.mauk;
      $("#nama_nasabah_mauk").val(data.nama_nasabah_mauk);
      $("#npwp_mauk").val(data.npwp_mauk);
      $("#direktur_mauk").val(data.direktur_mauk);
      $("#key_person_mauk").val(data.key_person_mauk);
      $("#alamat_kantor_mauk").val(data.alamat_kantor_mauk);
      $("#klasifikasi_mauk").val(data.klasifikasi_mauk);
      $("#bidang_usaha_mauk").val(data.bidang_usaha_mauk);
      $("#jenis_fasilitas_mauk").val(data.jenis_fasilitas_mauk);
      $("#bentuk_fasilitas_mauk").val(data.bentuk_fasilitas_mauk);
      $("#maksimum_fasilitas_mauk").val(data.maksimum_fasilitas_mauk);
      $("#plafond_fasilitas_mauk").val(data.plafond_fasilitas_mauk);
      $("#jangka_waktu_mauk").val(data.jangka_waktu_mauk);
      $("#tujuan_penggunaan_mauk").val(data.tujuan_penggunaan_mauk);
      // CKEDITOR.instances.editor1.setData(data.tujuan_penggunaan_mauk);
      // console.log("Setting data to CKEditor:", data.tujuan_penggunaan_mauk);
      // initializeCKEditor("tujuan_penggunaan_mauk", function (editor) {
      //   editor.setData(data.tujuan_penggunaan_mauk);
      // });
      initializeCKEditor("pemilik_perseroan_mauk", function (editor) {
        editor.setData(data.pemilik_perseroan_mauk);
      });
      initializeCKEditor("pemilikan_saham_permodalan_mauk", function (editor) {
        editor.setData(data.pemilikan_saham_permodalan_mauk);
      });
      initializeCKEditor("kewenangan_direksi_mauk", function (editor) {
        editor.setData(data.kewenangan_direksi_mauk);
      });
      initializeCKEditor("informasi_riwayat_perbankan_mauk", function (editor) {
        editor.setData(data.informasi_riwayat_perbankan_mauk);
      });
      initializeCKEditor("legalitas_pendirian_usaha_mauk", function (editor) {
        editor.setData(data.legalitas_pendirian_usaha_mauk);
      });
      initializeCKEditor("legalitas_perizinan_usaha_mauk", function (editor) {
        editor.setData(data.legalitas_perizinan_usaha_mauk);
      });
      initializeCKEditor(
        "legalitas_pelaksanaan_proyek_mauk",
        function (editor) {
          editor.setData(data.legalitas_pelaksanaan_proyek_mauk);
        }
      );
      initializeCKEditor(
        "legalitas_personal_pemohon_pemilik_agunan_mauk",
        function (editor) {
          editor.setData(data.legalitas_personal_pemohon_pemilik_agunan_mauk);
        }
      );
      initializeCKEditor(
        "kesimpulan_analisa_aspek_legalitas_mauk",
        function (editor) {
          editor.setData(data.kesimpulan_analisa_aspek_legalitas_mauk);
        }
      );
      initializeCKEditor("analisa_aspek_manajemen_mauk", function (editor) {
        editor.setData(data.analisa_aspek_manajemen_mauk);
      });
      initializeCKEditor("analisa_aspek_teknis_mauk", function (editor) {
        editor.setData(data.analisa_aspek_teknis_mauk);
      });
      initializeCKEditor("analisa_aspek_pemasaran_mauk", function (editor) {
        editor.setData(data.analisa_aspek_pemasaran_mauk);
      });
      initializeCKEditor("analisa_aspek_keuangan_mauk", function (editor) {
        editor.setData(data.analisa_aspek_keuangan_mauk);
      });
      initializeCKEditor(
        "perhitungan_kebutuhan_kredit_mauk",
        function (editor) {
          editor.setData(data.perhitungan_kebutuhan_kredit_mauk);
        }
      );
      initializeCKEditor("kesimpulan_jaminan_agunan_mauk", function (editor) {
        editor.setData(data.kesimpulan_jaminan_agunan_mauk);
      });
      initializeCKEditor("dokumentasi_kredit_mauk", function (editor) {
        editor.setData(data.dokumentasi_kredit_mauk);
      });
      initializeCKEditor("pengikatan_agunan_mauk", function (editor) {
        editor.setData(data.pengikatan_agunan_mauk);
      });
      initializeCKEditor("asuransi_kredit_mauk", function (editor) {
        editor.setData(data.asuransi_kredit_mauk);
      });
      initializeCKEditor("asuransi_agunan_mauk", function (editor) {
        editor.setData(data.asuransi_agunan_mauk);
      });
      initializeCKEditor("syarat_ttd_pk_mauk", function (editor) {
        editor.setData(data.syarat_ttd_pk_mauk);
      });
      initializeCKEditor("syarat_realisasi_penarikan_mauk", function (editor) {
        editor.setData(data.syarat_realisasi_penarikan_mauk);
      });
      initializeCKEditor("affirmatives_mauk", function (editor) {
        editor.setData(data.affirmatives_mauk);
      });
      initializeCKEditor("negatives_mauk", function (editor) {
        editor.setData(data.negatives_mauk);
      });
      initializeCKEditor("syarat_lain_mauk", function (editor) {
        editor.setData(data.syarat_lain_mauk);
      });
      $("#jeniskreditfasilitasusulmauk").val(
        data.jenis_kredit_fasilitas_usul_mauk
      );
      $("#maxkreditiniusulmauk").val(data.max_kredit_ini_usul_mauk);
      $("#perubahanusulmauk").val(data.perubahan_usul_mauk);
      $("#maxkreditusulmauk").val(data.max_kredit_usul_mauk);
      $("#jeniskreditfasilitaspalmauk").val(
        data.jenis_kredit_fasilitas_pal_mauk
      );
      $("#maxkreditinipalmauk").val(data.max_kredit_ini_pal_mauk);
      $("#perubahanpalmauk").val(data.perubahan_pal_mauk);
      $("#maxkreditpalmauk").val(data.max_kredit_pal_mauk);
      $("#jenis_macam_fasilitas_mauk").val(data.jenis_macam_fasilitas_mauk);
      $("#maksimum_kredit_mauk").val(data.maksimum_kredit_mauk);
      $("#plafond_kredit_mauk").val(data.plafond_kredit_mauk);
      $("#kriteria_usaha_mauk").val(data.kriteria_usaha_mauk);
      $("#pendanaan_sendiri_mauk").val(data.pendanaan_sendiri_mauk);

      $("#kesimpulan_tujuan_penggunaan_mauk").val(
        data.kesimpulan_tujuan_penggunaan_mauk
      );
      $("#kesimpulan_jangka_waktu_mauk").val(data.kesimpulan_jangka_waktu_mauk);
      $("#cara_penarikan_mauk").val(data.cara_penarikan_mauk);
      $("#pelunasan_angsuran_mauk").val(data.pelunasan_angsuran_mauk);
      $("#bunga_mauk").val(data.bunga_mauk);
      $("#provisi_fee_mauk").val(data.provisi_fee_mauk);
      $("#hitung_provisi_fee_mauk").val(data.hitung_provisi_fee_mauk);
      $("#akad_kredit_mauk").val(data.akad_kredit_mauk);
      $("#agunanmauk").val(data.agunan_mauk);
      $("#macamjenismauk").val(data.macam_jenis_mauk);
      $("#nilaiagunanmauk").val(data.nilai_agunan_mauk);
      $("#bentukpengikatanmauk").val(data.bentuk_pengikatan_mauk);
      $("#syarat_ttd_pk_mauk").val(data.syarat_ttd_pk_mauk);
      $("#syarat_realisasi_penarikan_mauk").val(
        data.syarat_realisasi_penarikan_mauk
      );

      let jenis_kredit_fasilitas_usul_mauk =
        data.jenis_kredit_fasilitas_usul_mauk.split(";");
      let max_kredit_ini_usul_mauk = data.max_kredit_ini_usul_mauk.split(";");
      let perubahan_usul_mauk = data.perubahan_usul_mauk.split(";");
      let max_kredit_usul_mauk = data.max_kredit_usul_mauk.split(";");
      let lengthjenis_kredit_fasilitas_usul_mauk =
        jenis_kredit_fasilitas_usul_mauk.length + 1;
      for (var i = 0; i < jenis_kredit_fasilitas_usul_mauk.length; i++) {
        if (i == 0) {
          $("#jenis_kredit_fasilitas_usul_mauk" + i).val(
            jenis_kredit_fasilitas_usul_mauk[0]
          );
          $("#max_kredit_ini_usul_mauk" + i).val(max_kredit_ini_usul_mauk[0]);
          $("#perubahan_usul_mauk" + i).val(perubahan_usul_mauk[0]);
          $("#max_kredit_usul_mauk" + i).val(max_kredit_usul_mauk[0]);
        } else {
          var index = lengthjenis_kredit_fasilitas_usul_mauk - 1 - i;
          var html1 = $(".copy-mauk").html();
          $(".add-form-mauk").after(html1);
          var html11 =
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="jenis_kredit_fasilitas_usul_mauk' +
            i +
            '" name="jenis_kredit_fasilitas_usul_mauk[]" value="' +
            jenis_kredit_fasilitas_usul_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="max_kredit_ini_usul_mauk' +
            i +
            '" name="max_kredit_ini_usul_mauk[]" type="text" value="' +
            max_kredit_ini_usul_mauk[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="perubahan_usul_mauk' +
            i +
            '" name="perubahan_usul_mauk[]" value="' +
            perubahan_usul_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="max_kredit_usul_mauk' +
            i +
            '" name="max_kredit_usul_mauk[]" value="' +
            max_kredit_usul_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-mauk").first().after(html11);
        }
      }

      let jenis_kredit_fasilitas_pal_mauk =
        data.jenis_kredit_fasilitas_pal_mauk.split(";");
      let max_kredit_ini_pal_mauk = data.max_kredit_ini_pal_mauk.split(";");
      let perubahan_pal_mauk = data.perubahan_pal_mauk.split(";");
      let max_kredit_pal_mauk = data.max_kredit_pal_mauk.split(";");
      let lengthjenis_kredit_fasilitas_pal_mauk =
        jenis_kredit_fasilitas_pal_mauk.length + 1;
      for (var i = 0; i < jenis_kredit_fasilitas_pal_mauk.length; i++) {
        if (i == 0) {
          $("#jenis_kredit_fasilitas_pal_mauk" + i).val(
            jenis_kredit_fasilitas_pal_mauk[0]
          );
          $("#max_kredit_ini_pal_mauk" + i).val(max_kredit_ini_pal_mauk[0]);
          $("#perubahan_pal_mauk" + i).val(perubahan_pal_mauk[0]);
          $("#max_kredit_pal_mauk" + i).val(max_kredit_pal_mauk[0]);
        } else {
          var index = lengthjenis_kredit_fasilitas_pal_mauk - 1 - i;
          var html1 = $(".copy-mauk2").html();
          $(".add-form-mauk2").after(html1);
          var html11 =
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="jenis_kredit_fasilitas_pal_mauk' +
            i +
            '" name="jenis_kredit_fasilitas_pal_mauk[]" value="' +
            jenis_kredit_fasilitas_pal_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="max_kredit_ini_pal_mauk' +
            i +
            '" name="max_kredit_ini_pal_mauk[]" type="text" value="' +
            max_kredit_ini_pal_mauk[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="perubahan_pal_mauk' +
            i +
            '" name="perubahan_pal_mauk[]" value="' +
            perubahan_pal_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="max_kredit_pal_mauk' +
            i +
            '" name="max_kredit_pal_mauk[]" value="' +
            max_kredit_pal_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-mauk2").first().after(html11);
        }
      }

      let agunan_mauk = data.agunan_mauk.split(";");
      let macam_jenis_mauk = data.macam_jenis_mauk.split(";");
      let nilai_agunan_mauk = data.nilai_agunan_mauk.split(";");
      let bentuk_pengikatan_mauk = data.bentuk_pengikatan_mauk.split(";");
      let lengthagunan_mauk = agunan_mauk.length + 1;
      for (var i = 0; i < agunan_mauk.length; i++) {
        if (i == 0) {
          $("#agunan_mauk" + i).val(agunan_mauk[0]);
          $("#macam_jenis_mauk" + i).val(macam_jenis_mauk[0]);
          $("#nilai_agunan_mauk" + i).val(nilai_agunan_mauk[0]);
          $("#bentuk_pengikatan_mauk" + i).val(bentuk_pengikatan_mauk[0]);
        } else {
          var index = lengthagunan_mauk - 1 - i;
          var html1 = $(".copy-mauk3").html();
          $(".add-form-mauk3").after(html1);
          var html11 =
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="agunan_mauk' +
            i +
            '" name="agunan_mauk[]" value="' +
            agunan_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="macam_jenis_mauk' +
            i +
            '" name="macam_jenis_mauk[]" type="text" value="' +
            macam_jenis_mauk[index] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="nilai_agunan_mauk' +
            i +
            '" name="nilai_agunan_mauk[]" value="' +
            nilai_agunan_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="bentuk_pengikatan_mauk' +
            i +
            '" name="bentuk_pengikatan_mauk[]" value="' +
            bentuk_pengikatan_mauk[index] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-mauk3").first().after(html11);
        }
      }
    } else {
      alert(hasil.message);
    }
  });
}
function isi_dcl() {
  // editor = ckEditorInstance;
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.dcl;
      console.log(data);
      // $("#pengelola_dcl").val(data.pengelola_dcl);
      $("#tanggal_dcl").val(data.tanggal_dcl);
      $("#tanggal_berkas_dcl").val(data.tanggal_berkas_dcl);
      $("#nama_pemohon_dcl").val(data.nama_pemohon_dcl);
      $("#jenis_usaha_dcl").val(data.jenis_usaha_dcl);
      $("#nama_perusahaan_pemohon_dcl").val(data.nama_perusahaan_pemohon_dcl);
      $("#namapemilikperusahaandcl").val(data.nama_pemilik_perusahaan_dcl);
      $("#persentasesahamdcl").val(data.persentase_saham_dcl);

      let nama_pemilik_perusahaan_dcl =
        data.nama_pemilik_perusahaan_dcl.split(";");
      let persentase_saham_dcl = data.persentase_saham_dcl.split(";");

      for (var i = 1; i <= nama_pemilik_perusahaan_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#nama_pemilik_perusahaan_dcl" + i).val(
            nama_pemilik_perusahaan_dcl[i - 1]
          );
          $("#persentase_saham_dcl" + i).val(persentase_saham_dcl[i - 1]);
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl").html();
          $(".add-form-dcl").after(html1);
          var html11 =
            '<div class="col-lg-6">' +
            '<div class="col-lg-12">' +
            '<input id="nama_pemilik_perusahaan_dcl' +
            i +
            '" name="nama_pemilik_perusahaan_dcl[]" value="' +
            nama_pemilik_perusahaan_dcl[i - 1] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4">' +
            '<div class="col-lg-12">' +
            '<input id="persentase_saham_dcl' +
            i +
            '" name="persentase_saham_dcl[]" type="text" value="' +
            persentase_saham_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl").first().after(html11);
        }
      }

      $("#jabatanpengurusperusahaandcl").val(
        data.jabatan_pengurus_perusahaan_dcl
      );
      $("#namapengurusperusahaandcl").val(data.nama_pengurus_perusahaan_dcl);
      $("#ktpdcl").val(data.ktp_dcl);
      let jabatan_pengurus_perusahaan_dcl =
        data.jabatan_pengurus_perusahaan_dcl.split(";");
      let nama_pengurus_perusahaan_dcl =
        data.nama_pengurus_perusahaan_dcl.split(";");
      let ktp_dcl = data.ktp_dcl.split(";");

      for (var i = 1; i <= jabatan_pengurus_perusahaan_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#jabatan_pengurus_perusahaan_dcl" + i).val(
            jabatan_pengurus_perusahaan_dcl[i - 1]
          );
          $("#nama_pengurus_perusahaan_dcl" + i).val(
            nama_pengurus_perusahaan_dcl[i - 1]
          );
          $("#ktp_dcl" + i).val(ktp_dcl[i - 1]);
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl2").html();
          $(".add-form-dcl2").after(html1);
          var html11 =
            '<div class="col-lg-3">' +
            '<div class="col-lg-12">' +
            '<input id="jabatan_pengurus_perusahaan_dcl' +
            i +
            '" name="jabatan_pengurus_perusahaan_dcl[]" value="' +
            jabatan_pengurus_perusahaan_dcl[i - 1] +
            '" type="text" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4">' +
            '<div class="col-lg-12">' +
            '<input id="nama_pengurus_perusahaan_dcl' +
            i +
            '" name="nama_pengurus_perusahaan_dcl[]" type="text" value="' +
            nama_pengurus_perusahaan_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4">' +
            '<div class="col-lg-12">' +
            '<input id="ktp_dcl' +
            i +
            '" name="ktp_dcl[]" type="text" value="' +
            ktp_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl2").first().after(html11);
        }
      }

      $("#jenis_usaha_perusahaan_dcl").val(data.jenis_usaha_perusahaan_dcl);
      $("#fasilitaskreditdcl").val(data.fasilitas_kredit_dcl);
      $("#plafonddcl").val(data.plafond_dcl);
      $("#jangkawaktudcl").val(data.jangka_waktu_dcl);
      $("#tujuanpenggunaandcl").val(data.tujuan_penggunaan_dcl);
      $("#permohonanditerimadcl").val(data.permohonan_diterima_dcl);

      let fasilitas_kredit_dcl = data.fasilitas_kredit_dcl.split(";");
      let plafond_dcl = data.plafond_dcl.split(";");
      let jangka_waktu_dcl = data.jangka_waktu_dcl.split(";");
      let tujuan_penggunaan_dcl = data.tujuan_penggunaan_dcl.split(";");
      let permohonan_diterima_dcl = data.permohonan_diterima_dcl.split(";");

      for (var i = 1; i <= fasilitas_kredit_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#fasilitas_kredit_dcl" + i).val(fasilitas_kredit_dcl[i - 1]);
          $("#plafond_dcl" + i).val(plafond_dcl[i - 1]);
          $("#jangka_waktu_dcl" + i).val(jangka_waktu_dcl[i - 1]);
          $("#tujuan_penggunaan_dcl" + i).val(tujuan_penggunaan_dcl[i - 1]);
          $("#permohonan_diterima_dcl" + i).val(permohonan_diterima_dcl[i - 1]);
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl3").html();
          $(".add-form-dcl3").after(html1);
          var html11 =
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<textarea id="fasilitas_kredit_dcl' +
            i +
            '" name="fasilitas_kredit_dcl[]" type="text"' +
            'placeholder="" rows="3" class="form-control" ' +
            is_disabled +
            ">" +
            fasilitas_kredit_dcl[i - 1] +
            "</textarea>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<textarea rows="3" id="plafond_dcl' +
            i +
            '" name="plafond_dcl[]" type="text"' +
            ' placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            plafond_dcl[i - 1] +
            "</textarea>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<textarea rows="3" id="jangka_waktu_dcl' +
            i +
            '" name="jangka_waktu_dcl[]" type="text"' +
            ' placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            jangka_waktu_dcl[i - 1] +
            "</textarea>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<textarea rows="3" id="tujuan_penggunaan_dcl' +
            i +
            '" name="tujuan_penggunaan_dcl[]" type="text"' +
            ' placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            tujuan_penggunaan_dcl[i - 1] +
            "</textarea>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="permohonan_diterima_dcl' +
            i +
            '" name="permohonan_diterima_dcl[]" type="text" value="' +
            permohonan_diterima_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl3").first().after(html11);
        }
      }

      $("#buktikepemilikandcl").val(data.bukti_kepemilikan_dcl);
      $("#jenisagunandcl").val(data.jenis_agunan_dcl);
      $("#tanggalagunandcl").val(data.tanggal_agunan_dcl);
      $("#avalistdcl").val(data.avalist_dcl);
      $("#nominaldcl").val(data.nominal_dcl);
      let bukti_kepemilikan_dcl = data.bukti_kepemilikan_dcl.split(";");
      let jenis_agunan_dcl = data.jenis_agunan_dcl.split(";");
      let tanggal_agunan_dcl = data.tanggal_agunan_dcl.split(";");
      let avalist_dcl = data.avalist_dcl.split(";");
      let nominal_dcl = data.nominal_dcl.split(";");
      for (var i = 1; i <= bukti_kepemilikan_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#bukti_kepemilikan_dcl" + i).val(bukti_kepemilikan_dcl[i - 1]);
          $("#jenis_agunan_dcl" + i).val(jenis_agunan_dcl[i - 1]);
          $("#tanggal_agunan_dcl" + i).val(tanggal_agunan_dcl[i - 1]);
          $("#avalist_dcl" + i).val(avalist_dcl[i - 1]);
          $("#nominal_dcl" + i).val(nominal_dcl[i - 1]);
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl4").html();
          $(".add-form-dcl4").after(html1);
          var html11 =
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="bukti_kepemilikan_dcl' +
            i +
            '" name="bukti_kepemilikan_dcl[]" type="text" value="' +
            bukti_kepemilikan_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="jenis_agunan_dcl' +
            i +
            '" name="jenis_agunan_dcl[]" type="text" value="' +
            jenis_agunan_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="tanggal_agunan_dcl' +
            i +
            '" name="tanggal_agunan_dcl[]" type="text" value="' +
            tanggal_agunan_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="avalist_dcl' +
            i +
            '" name="avalist_dcl[]" type="text" value="' +
            avalist_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="nominal_dcl' +
            i +
            '" name="nominal_dcl[]" type="text" value="' +
            nominal_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl4").first().after(html11);
        }
      }

      $("#fasilitasdcl").val(data.fasilitas_dcl);
      $("#jatuhtempodcl").val(data.jatuh_tempo_dcl);
      $("#plafondexistingdcl").val(data.plafond_existing_dcl);
      $("#outstandingdcl").val(data.outstanding_dcl);
      $("#kolektibilitasdcl").val(data.kolektibilitas_dcl);
      let fasilitas_dcl = data.fasilitas_dcl.split(";");
      let jatuh_tempo_dcl = data.jatuh_tempo_dcl.split(";");
      let plafond_existing_dcl = data.plafond_existing_dcl.split(";");
      let outstanding_dcl = data.outstanding_dcl.split(";");
      let kolektibilitas_dcl = data.kolektibilitas_dcl.split(";");
      for (var i = 1; i <= fasilitas_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#fasilitas_dcl" + i).val(fasilitas_dcl[i - 1]);
          $("#jatuh_tempo_dcl" + i).val(jatuh_tempo_dcl[i - 1]);
          $("#plafond_existing_dcl" + i).val(plafond_existing_dcl[i - 1]);
          $("#outstanding_dcl" + i).val(outstanding_dcl[i - 1]);
          $("#kolektibilitas_dcl" + i).val(kolektibilitas_dcl[i - 1]);
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl5").html();
          $(".add-form-dcl5").after(html1);
          var html11 =
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="fasilitas_dcl' +
            i +
            '" name="fasilitas_dcl[]" type="text" value="' +
            fasilitas_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="jatuh_tempo_dcl' +
            i +
            '" name="jatuh_tempo_dcl[]" type="text" value="' +
            jatuh_tempo_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="plafond_existing_dcl' +
            i +
            '" name="plafond_existing_dcl[]" type="text" value="' +
            plafond_existing_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="outstanding_dcl' +
            i +
            '" name="outstanding_dcl[]" type="text" value="' +
            outstanding_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="kolektibilitas_dcl' +
            i +
            '" name="kolektibilitas_dcl[]" type="text" value="' +
            kolektibilitas_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl5").first().after(html11);
        }
      }
      $("#fasilitaskreditgrupdcl").val(data.fasilitas_kredit_grup_dcl);
      $("#namadebiturkreditgrupdcl").val(data.nama_debitur_kredit_grup_dcl);
      $("#jatuhtempokreditgrupdcl").val(data.jatuh_tempo_kredit_grup_dcl);
      $("#plafondexistingkreditgrupdcl").val(
        data.plafond_existing_kredit_grup_dcl
      );
      $("#outstandingkreditgrupdcl").val(data.outstanding_kredit_grup_dcl);
      $("#kolektibilitaskreditgrupdcl").val(
        data.kolektibilitas_kredit_grup_dcl
      );
      let fasilitas_kredit_grup_dcl = data.fasilitas_kredit_grup_dcl.split(";");
      let nama_debitur_kredit_grup_dcl =
        data.nama_debitur_kredit_grup_dcl.split(";");
      let jatuh_tempo_kredit_grup_dcl =
        data.jatuh_tempo_kredit_grup_dcl.split(";");
      let plafond_existing_kredit_grup_dcl =
        data.plafond_existing_kredit_grup_dcl.split(";");
      let outstanding_kredit_grup_dcl =
        data.outstanding_kredit_grup_dcl.split(";");
      let kolektibilitas_kredit_grup_dcl =
        data.kolektibilitas_kredit_grup_dcl.split(";");
      for (var i = 1; i <= fasilitas_kredit_grup_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#fasilitas_kredit_grup_dcl" + i).val(
            fasilitas_kredit_grup_dcl[i - 1]
          );
          $("#nama_debitur_kredit_grup_dcl" + i).val(
            nama_debitur_kredit_grup_dcl[i - 1]
          );
          $("#jatuh_tempo_kredit_grup_dcl" + i).val(
            jatuh_tempo_kredit_grup_dcl[i - 1]
          );
          $("#plafond_existing_kredit_grup_dcl" + i).val(
            plafond_existing_kredit_grup_dcl[i - 1]
          );
          $("#outstanding_kredit_grup_dcl" + i).val(
            outstanding_kredit_grup_dcl[i - 1]
          );
          $("#kolektibilitas_kredit_grup_dcl" + i).val(
            kolektibilitas_kredit_grup_dcl[i - 1]
          );
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl6").html();
          $(".add-form-dcl6").after(html1);
          var html11 =
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="fasilitas_kredit_grup_dcl' +
            i +
            '" name="fasilitas_kredit_grup_dcl[]" type="text" value="' +
            fasilitas_kredit_grup_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="nama_debitur_kredit_grup_dcl' +
            i +
            '" name="nama_debitur_kredit_grup_dcl[]" type="text" value="' +
            nama_debitur_kredit_grup_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="jatuh_tempo_kredit_grup_dcl' +
            i +
            '" name="jatuh_tempo_kredit_grup_dcl[]" type="text" value="' +
            jatuh_tempo_kredit_grup_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="plafond_existing_kredit_grup_dcl' +
            i +
            '" name="plafond_existing_kredit_grup_dcl[]" type="text" value="' +
            plafond_existing_kredit_grup_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="outstanding_kredit_grup_dcl' +
            i +
            '" name="outstanding_kredit_grup_dcl[]" type="text" value="' +
            outstanding_kredit_grup_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="kolektibilitas_kredit_grup_dcl' +
            i +
            '" name="kolektibilitas_kredit_grup_dcl[]" type="text" value="' +
            kolektibilitas_kredit_grup_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl6").first().after(html11);
        }
      }
      $("#fasilitasbanklaindcl").val(data.fasilitas_bank_lain_dcl);
      $("#bankljkbanklaindcl").val(data.bank_ljk_bank_lain_dcl);
      $("#jatuhtempobanklaindcl").val(data.jatuh_tempo_bank_lain_dcl);
      $("#plafondexistingbanklaindcl").val(data.plafond_existing_bank_lain_dcl);
      $("#outstandingbanklaindcl").val(data.outstanding_bank_lain_dcl);
      $("#kolektibilitasbanklaindcl").val(data.kolektibilitas_bank_lain_dcl);

      let fasilitas_bank_lain_dcl = data.fasilitas_bank_lain_dcl.split(";");
      let bank_ljk_bank_lain_dcl = data.bank_ljk_bank_lain_dcl.split(";");
      let jatuh_tempo_bank_lain_dcl = data.jatuh_tempo_bank_lain_dcl.split(";");
      let plafond_existing_bank_lain_dcl =
        data.plafond_existing_bank_lain_dcl.split(";");
      let outstanding_bank_lain_dcl = data.outstanding_bank_lain_dcl.split(";");
      let kolektibilitas_bank_lain_dcl =
        data.kolektibilitas_bank_lain_dcl.split(";");
      for (var i = 1; i <= fasilitas_bank_lain_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#fasilitas_bank_lain_dcl" + i).val(fasilitas_bank_lain_dcl[i - 1]);
          $("#bank_ljk_bank_lain_dcl" + i).val(bank_ljk_bank_lain_dcl[i - 1]);
          $("#jatuh_tempo_bank_lain_dcl" + i).val(
            jatuh_tempo_bank_lain_dcl[i - 1]
          );
          $("#plafond_existing_bank_lain_dcl" + i).val(
            plafond_existing_bank_lain_dcl[i - 1]
          );
          $("#outstanding_bank_lain_dcl" + i).val(
            outstanding_bank_lain_dcl[i - 1]
          );
          $("#kolektibilitas_bank_lain_dcl" + i).val(
            kolektibilitas_bank_lain_dcl[i - 1]
          );
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl7").html();
          $(".add-form-dcl7").after(html1);
          var html11 =
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="fasilitas_bank_lain_dcl' +
            i +
            '" name="fasilitas_bank_lain_dcl[]" type="text" value="' +
            fasilitas_bank_lain_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="bank_ljk_bank_lain_dcl' +
            i +
            '" name="bank_ljk_bank_lain_dcl[]" type="text" value="' +
            bank_ljk_bank_lain_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="jatuh_tempo_bank_lain_dcl' +
            i +
            '" name="jatuh_tempo_bank_lain_dcl[]" type="text" value="' +
            jatuh_tempo_bank_lain_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="plafond_existing_bank_lain_dcl' +
            i +
            '" name="plafond_existing_bank_lain_dcl[]" type="text" value="' +
            plafond_existing_bank_lain_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="outstanding_bank_lain_dcl' +
            i +
            '" name="outstanding_bank_lain_dcl[]" type="text" value="' +
            outstanding_bank_lain_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="kolektibilitas_bank_lain_dcl' +
            i +
            '" name="kolektibilitas_bank_lain_dcl[]" type="text" value="' +
            kolektibilitas_bank_lain_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl7").first().after(html11);
        }
      }
      $("#pengujian_ojk_dcl1").val(data.pengujian_ojk_dcl1);
      $("#dasar_pengujian_ojk_dcl1").val(data.dasar_pengujian_ojk_dcl1);
      $("#checklist_pengujian_ojk_dcl1").val(data.checklist_pengujian_ojk_dcl1);
      $("#pengujian_ojk_dcl2").val(data.pengujian_ojk_dcl2);
      $("#dasar_pengujian_ojk_dcl2").val(data.dasar_pengujian_ojk_dcl2);
      $("#checklist_pengujian_ojk_dcl2").val(data.checklist_pengujian_ojk_dcl2);
      $("#pengujian_ojk_dcl3").val(data.pengujian_ojk_dcl3);
      $("#dasar_pengujian_ojk_dcl3").val(data.dasar_pengujian_ojk_dcl3);
      $("#checklist_pengujian_ojk_dcl3").val(data.checklist_pengujian_ojk_dcl3);
      $("#pengujian_internal_dcl1").val(data.pengujian_internal_dcl1);
      $("#dasar_pengujian_internal_dcl1").val(
        data.dasar_pengujian_internal_dcl1
      );
      $("#checklist_pengujian_internal_dcl1").val(
        data.checklist_pengujian_internal_dcl1
      );
      $("#checklist_pengujian_internal_dcl1").val(
        data.checklist_pengujian_internal_dcl1
      );
      $("#pengujian_internal_dcl2").val(data.pengujian_internal_dcl2);
      $("#dasar_pengujian_internal_dcl2").val(
        data.dasar_pengujian_internal_dcl2
      );
      $("#checklist_pengujian_internal_dcl2").val(
        data.checklist_pengujian_internal_dcl2
      );
      $("#pengujian_internal_dcl3").val(data.pengujian_internal_dcl3);
      $("#dasar_pengujian_internal_dcl3").val(
        data.dasar_pengujian_internal_dcl3
      );
      $("#checklist_pengujian_internal_dcl3").val(
        data.checklist_pengujian_internal_dcl3
      );
      $("#pengujian_internal_dcl4").val(data.pengujian_internal_dcl4);
      $("#dasar_pengujian_internal_dcl4").val(
        data.dasar_pengujian_internal_dcl4
      );
      $("#checklist_pengujian_internal_dcl4").val(
        data.checklist_pengujian_internal_dcl4
      );
      $("#pengujian_internal_dcl5").val(data.pengujian_internal_dcl5);
      $("#dasar_pengujian_internal_dcl5").val(
        data.dasar_pengujian_internal_dcl5
      );
      $("#checklist_pengujian_internal_dcl5").val(
        data.checklist_pengujian_internal_dcl5
      );
      $("#pengujian_internal_dcl6").val(data.pengujian_internal_dcl6);
      $("#dasar_pengujian_internal_dcl6").val(
        data.dasar_pengujian_internal_dcl6
      );
      $("#checklist_pengujian_internal_dcl6").val(
        data.checklist_pengujian_internal_dcl6
      );
      $("#pengujianlainnyadcl").val(data.pengujian_lainnya_dcl);
      $("#dasarpengujianlainnyadcl").val(data.dasar_pengujian_lainnya_dcl);
      $("#checklistpengujianlainnyadcl").val(
        data.checklist_pengujian_lainnya_dcl
      );
      let pengujian_lainnya_dcl = data.pengujian_lainnya_dcl.split(";");
      let dasar_pengujian_lainnya_dcl =
        data.dasar_pengujian_lainnya_dcl.split(";");
      let checklist_pengujian_lainnya_dcl =
        data.checklist_pengujian_lainnya_dcl.split(";");
      for (var i = 1; i <= pengujian_lainnya_dcl.length; i++) {
        if (i == 1) {
          // Untuk baris pertama
          $("#pengujian_lainnya_dcl" + i).val(pengujian_lainnya_dcl[i - 1]);
          $("#dasar_pengujian_lainnya_dcl" + i).val(
            dasar_pengujian_lainnya_dcl[i - 1]
          );
          $("#checklist_pengujian_lainnya_dcl" + i).val(
            checklist_pengujian_lainnya_dcl[i - 1]
          );
        } else {
          // Untuk baris kedua dan seterusnya
          var html1 = $(".copy-dcl8").html();
          $(".add-form-dcl8").after(html1);
          var html11 =
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="pengujian_lainnya_dcl' +
            i +
            '" name="pengujian_lainnya_dcl[]" type="text" value="' +
            pengujian_lainnya_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="dasar_pengujian_lainnya_dcl' +
            i +
            '" name="dasar_pengujian_lainnya_dcl[]" type="text" value="' +
            dasar_pengujian_lainnya_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-2">' +
            '<div class="col-lg-12">' +
            '<input id="checklist_pengujian_lainnya_dcl' +
            i +
            '" name="checklist_pengujian_lainnya_dcl[]" type="text" value="' +
            checklist_pengujian_lainnya_dcl[i - 1] +
            '" placeholder="" class="form-control" ' +
            is_disabled +
            ">" +
            '<select name="checklist_pengujian_lainnya_dcl[]" id="checklist_pengujian_lainnya_dcl' +
            angkadcl8 +
            '" class=" form-control class-disabled select">' +
            '<option value=""></option>' +
            '<option value="comply">Comply</option>' +
            '<option value="not comply">Not Comply</option>' +
            "</select>" +
            "</div>" +
            "</div>";
          $(".delete-btn-dcl8").first().after(html11);
        }
      }
      $("#kesimpulan_dcl").val(data.kesimpulan_dcl);
      $("#komentar_dcl").val(data.komentar_dcl);
    } else {
      alert(hasil.message);
    }
  });
}

function isi_scoring_koor() {
  variabelGlobal(function (hasil) {
    // console.log(hasil.message.data_entry.kd_data);
    if (hasil.status == "success") {
      var data = hasil.message.scoring;
      // alert(data.kd_data)
      // unit_kerja_fcr()
      $("#kd_data_tambah").val(hasil.message.data_entry.kd_data);

      $("#nama_pemohon_sc").val(data.nama_pemohon);
      $("#nama_pemohon_sc_koor").val(data.nama_pemohon);
      $("#alamat_sc").val(data.alamat);
      $("#alamat_sc_koor").val(data.alamat);
      $("#plafond_sc").val(data.plafond);
      $("#plafond_sc_koor").val(data.plafond);
      separator_edit(data.plafond, "plafond_sc_separators");
      separator_edit(data.plafond, "plafond_sc_koor_separators");
      $("#tujuan_sc").val(data.tujuan);
      $("#tujuan_sc_koor").val(data.tujuan);
      $("#no_pak_sc").val(data.no_pak);
      $("#no_pak_sc_koor").val(data.no_pak);

      $("#pendirian_sc_koor").val(data.pendirian_bu);
      $("#legalitas_sc_koor").val(data.legalitas);
      $("#hubungan_sc_koor").val(data.hubungan_funding);
      $("#pengelolaan_sc_koor").val(data.manajemen_usaha);
      $("#jenis_agunan_sc_koor").val(data.jenis_agunan);
      $("#bukti_sc_koor").val(data.bukti_kepemilikan_agunan);
      $("#status_sc_koor").val(data.status_kepemilikan);
      $("#marketable_sc_koor").val(data.marketable_agunan);
      $("#lending_sc_koor").val(data.hubungan_landing);
      $("#pengalaman_sc_koor").val(data.pengalaman);
      $("#sumber_dana_sc_koor").val(data.sumber_dana);
      $("#lokasi_sc_koor").val(data.lokasi_proyek);
      $("#jenis_proyek_sc_koor").val(data.jenis_proyek);
      $("#bahan_baku_sc_koor").val(data.bahan_baku);
      $("#peralatan_sc_koor").val(data.peralatan);
      $("#pembayaran_sc_koor").val(data.pembayaran_termijn);
      $("#dasar_penunjukan_sc_koor").val(data.dasar_penunjukan);
      $("#prosentase_sc_koor").val(data.persentase_plafond);
      $("#jangka_sc_koor").val(data.jangka_waktu);
      $("#agunan_sc_koor").val(data.persentase_agunan);
      $("#penjaminan_sc_koor").val(data.penjaminan_maskapai);

      $("#hasil_scoring_koor").html(data.hasil_skoring);
      $("#ket_hasil_koor").html(data.keterangan);
    } else {
      alert(hasil.message);
    }
  });
}

function refresh_scoring_koor() {
  isi_scoring_koor();
  // tampil_button('save_scoring')
}

function ceftb() {
  variabelGlobal(function (hasil) {
    if (hasil.status == "success") {
      var jenis_agunan = hasil.message.data_entry.jenis_agunan;
      var data = hasil.message.ceftb;

      var jenisAgunanArray = jenis_agunan.split(";");

      var tanahAtauTanahBangunanCount = jenisAgunanArray.filter(
        (item) => item === "Tanah/ Tanah dan Bangunan"
      ).length;

      for (
        let counter_tanah_loop = 0;
        counter_tanah_loop < tanahAtauTanahBangunanCount;
        counter_tanah_loop++
      ) {
        const CheckBoxCEFT = (data.checkboxceft ? data.checkboxceft : "").split(
          "|"
        );
        const HasilCEFT = (data.hasilceft ? data.hasilceft : "").split("|");
        const TotalCEFT = (data.totalceft ? data.totalceft : "").split("|");
        const CheckBoxCEFB = (data.checkboxcefb ? data.checkboxcefb : "").split(
          "|"
        );
        const HasilCEFB = (data.hasilcefb ? data.hasilcefb : "").split("|");
        const TotalCEFB = (data.totalcefb ? data.totalcefb : "").split("|");

        const pecahCheckBoxCEFT = CheckBoxCEFT[counter_tanah_loop]
          ? CheckBoxCEFT[counter_tanah_loop].split(";")
          : [];
        const pecahHasilCEFT = HasilCEFT[counter_tanah_loop]
          ? HasilCEFT[counter_tanah_loop].split(";")
          : [];
        const pecahTotalCEFT = TotalCEFT[counter_tanah_loop]
          ? TotalCEFT[counter_tanah_loop].split(";")
          : [];
        const pecahCheckBoxCEFB = CheckBoxCEFB[counter_tanah_loop]
          ? CheckBoxCEFB[counter_tanah_loop].split(";")
          : [];
        const pecahHasilCEFB = HasilCEFB[counter_tanah_loop]
          ? HasilCEFB[counter_tanah_loop].split(";")
          : [];
        const pecahTotalCEFB = TotalCEFB[counter_tanah_loop]
          ? TotalCEFB[counter_tanah_loop].split(";")
          : [];

        console.log(pecahCheckBoxCEFT);

        // Proses data untuk 'Tanah/ Tanah dan Bangunan' sesuai kebutuhan
        var inputan_tanah =
          '<div class="form-group row">' +
          '<div class="col-lg-6 table-responsive">' +
          '<h3 class="text-center text-danger">Penetapan CEF TANAH</h3>' +
          '<table class="tg">' +
          "<thead>" +
          "<tr>" +
          '<th class="tg-0pky">No</th>' +
          '<th class="tg-uzvj" colspan="2">Kriteria</th>' +
          '<th class="tg-0pky">Bobot</th>' +
          '<th class="tg-0pky">Parameter</th>' +
          '<th class="tg-0pky">Nilai</th>' +
          '<th class="tg-0pky">CEF</th>' +
          "</tr>" +
          "</thead>" +
          "<tbody>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">1</td>' +
          '<td class="tg-0pky" colspan="2">Bukti Kepemilikan</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">SHM</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[0] && pecahCheckBoxCEFT[0] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'1\',\'0.25\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SHGB, SHGU, STRATA TITLE</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[1] && pecahCheckBoxCEFT[1] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'1\',\'0.25\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          "<td>-</td>" +
          '<td class="tg-za14">SKPT (SRT KET PENDAFTARAN TANAH), SRT UKUR</td>' +
          "<td></td>" +
          "<td>50</td>" +
          '<td><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[2] && pecahCheckBoxCEFT[2] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'1\',\'0.25\')"></td>' +
          "<td></td>" +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">HAK PAKAI, SEGEL, SKPT (SRT KET PENGUASAAN TANAH) </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[3] && pecahCheckBoxCEFT[3] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="25" onchange="showValueCEFT(this,\'1\',\'0.25\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 1</td>' +
          '<td class="tg-0pky">25%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[0] +
          '" id="hasilceft1" style="display: inline-block; width: 45px; margin-left: 10px;" name="hasil_checkbox_ceft[]"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">2</td>' +
          '<td class="tg-za14" colspan="2">KELAS JALAN </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">JALAN RAYA UTAMA</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[4] && pecahCheckBoxCEFT[4] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">LINGKUNGAN/KOMPLEK </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[5] && pecahCheckBoxCEFT[5] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">GANG </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[6] && pecahCheckBoxCEFT[6] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SETAPAK</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[7] && pecahCheckBoxCEFT[7] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="25" onchange="showValueCEFT(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 2</td>' +
          '<td class="tg-0pky">20%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[1] +
          '" id="hasilceft2" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">3</td>' +
          '<td class="tg-za14" colspan="2">PEMILIK AGUNAN </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">AN. SENDIRI / ISTERI & SUAMI / PENGURUS PERUSAHAAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[8] && pecahCheckBoxCEFT[8] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'3\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">AN. ANAK KANDUNG/TIRI / SAUDARA KANDUNG/TIRI/AYAH KANDUNG</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[9] && pecahCheckBoxCEFT[9] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'3\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">AN. KELUARGA LAIN </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[10] && pecahCheckBoxCEFT[10] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'3\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">AN. PIHAK KETIGA</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[11] && pecahCheckBoxCEFT[11] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="25" onchange="showValueCEFT(this,\'3\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 3</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[2] +
          '" id="hasilceft3" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">4</td>' +
          '<td class="tg-za14" colspan="2">LINGKUNGAN </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">PERKANTORAN & PERDAGANGAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[12] && pecahCheckBoxCEFT[12] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'4\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">PERUMAHAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[13] && pecahCheckBoxCEFT[13] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'4\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">PERTANIAN/PERKEBUNAN/PETERNAKAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[14] && pecahCheckBoxCEFT[14] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'4\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">LAINNYA</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[15] && pecahCheckBoxCEFT[15] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="25" onchange="showValueCEFT(this,\'4\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 4</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[3] +
          '" id="hasilceft4" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">5</td>' +
          '<td class="tg-za14" colspan="2">LETAK / LOKASI BERKAITAN DGN PUSAT BISNIS </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SANGAT DEKAT ( 0 M S/D 500 M)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[16] && pecahCheckBoxCEFT[16] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">DEKAT (> 500 M S/D 1 KM)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[17] && pecahCheckBoxCEFT[17] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">CUKUP DEKAT (> 1 KM S/D 2 KM) </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[18] && pecahCheckBoxCEFT[18] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">JAUH (> 2 KM)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[19] && pecahCheckBoxCEFT[19] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="25" onchange="showValueCEFT(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 5</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[4] +
          '" id="hasilceft5" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">6</td>' +
          '<td class="tg-za14" colspan="2">KELENGKAPAN FASUM / FASOS (DENGAN JARAK < 2 KM ) </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SANGAT LENGKAP (> 6 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[20] && pecahCheckBoxCEFT[20] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">LENGKAP (5 S/D 6 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[21] && pecahCheckBoxCEFT[21] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">CUKUP (3 S/D 4 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[22] && pecahCheckBoxCEFT[22] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">TIDAK LENGKAP (S/D 2 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[23] && pecahCheckBoxCEFT[23] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="25" onchange="showValueCEFT(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 6</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[5] +
          '" id="hasilceft6" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="4">7</td>' +
          '<td class="tg-0pky" colspan="2">BENTUK TANAH</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">SEGI EMPAT / PERSEGI PANJANG</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[24] && pecahCheckBoxCEFT[24] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'7\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">SEGI BANYAK</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[25] && pecahCheckBoxCEFT[25] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'7\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">LAINNYA (SEGITIGA, TIDAK BERATURAN,DLL)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[26] && pecahCheckBoxCEFT[26] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'7\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 7</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[6] +
          '" id="hasilceft7" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">8</td>' +
          '<td class="tg-za14" colspan="2">KONTUR TANAH</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">RATA</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[27] && pecahCheckBoxCEFT[27] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'8\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">BERGELOMBANG</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[28] && pecahCheckBoxCEFT[28] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="75" onchange="showValueCEFT(this,\'8\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">BERTINGKAT </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[29] && pecahCheckBoxCEFT[29] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'8\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">LAINNYA (KOMBINASI)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[30] && pecahCheckBoxCEFT[30] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="25" onchange="showValueCEFT(this,\'8\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 8</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[7] +
          '" id="hasilceft8" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="3">9</td>' +
          '<td class="tg-0pky" colspan="2">JENIS TANAH</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">KERAS/DARAT/MATANG</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[31] && pecahCheckBoxCEFT[31] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="100" onchange="showValueCEFT(this,\'9\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">RAWA/GAMBUT/BERAIR</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxceft' +
          counter_tanah_loop +
          '" ' +
          (pecahCheckBoxCEFT[32] && pecahCheckBoxCEFT[32] !== "0" ? "checked" : "") +
          ' name="checkboxceft[]" value="50" onchange="showValueCEFT(this,\'9\',\'0.05\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 9</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input  value="' +
          pecahHasilCEFT[8] +
          '" id="hasilceft9" name="hasil_checkbox_ceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah CEF Tanah</td>' +
          '<td class="tg-0pky">100%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasiltotalCEFT' +
          counter_tanah_loop +
          '" value="' +
          TotalCEFT[counter_tanah_loop] +
          '" name="hasiltotalceft[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "</tbody>" +
          "</table>" +
          "</div>" +
          '<div class="col-lg-6 table-responsive">' +
          //CEF BANGUNAN
          '<h3 class="text-center text-danger">Penetapan CEF BANGUNAN</h3>' +
          '<table class="tg">' +
          "<thead>" +
          "<tr>" +
          '<th class="tg-0pky">No</th>' +
          '<th class="tg-uzvj" colspan="2">Kriteria</th>' +
          '<th class="tg-0pky">Bobot</th>' +
          '<th class="tg-0pky">Parameter</th>' +
          '<th class="tg-0pky">Nilai</th>' +
          '<th class="tg-0pky">CEF</th>' +
          "</tr>" +
          "</thead>" +
          "<tbody>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="4">1</td>' +
          '<td class="tg-0pky" colspan="2">PERIJINAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">MEMILIKI IMB</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[0] && pecahCheckBoxCEFB[0] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,\'1\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">MEMILIKI IMB, NAMUN LUAS BANGUNAN TIDAK SESUAI DENGAN KONDISI SEBELUMNYA</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[1] && pecahCheckBoxCEFB[1] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,\'1\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          "<td>-</td>" +
          '<td class="tg-za14">TIDAK MEMILIKI</td>' +
          "<td></td>" +
          "<td>50</td>" +
          '<td><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[2] && pecahCheckBoxCEFB[2] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'1\',\'0.2\')"></td>' +
          "<td></td>" +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 1</td>' +
          '<td class="tg-0pky">20%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasilcefb1" value="' +
          pecahHasilCEFB[0] +
          '" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">2</td>' +
          '<td class="tg-za14" colspan="2">JENIS BANGUNAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">BETON</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[3] && pecahCheckBoxCEFB[3] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SEMI PERMANEN(KOMBINASI KAYU+BETON) </td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[4] && pecahCheckBoxCEFB[4] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">KAYU</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[5] && pecahCheckBoxCEFB[5] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">MASIH DALAM PROSES</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[6] && pecahCheckBoxCEFB[6] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,\'2\',\'0.2\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 2</td>' +
          '<td class="tg-0pky">20%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasilcefb2" value="' +
          pecahHasilCEFB[1] +
          '" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">3</td>' +
          '<td class="tg-za14" colspan="2">USIA BANGUNAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">S.D. 5 TAHUN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[7] && pecahCheckBoxCEFB[7] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,\'3\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">>5 TAHUN S.D. 10 TAHUN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[8] && pecahCheckBoxCEFB[8] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,\'3\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">>10 TAHUN S.D. 15 TAHUN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[9] && pecahCheckBoxCEFB[9] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'3\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">>15 TAHUN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[10] && pecahCheckBoxCEFB[10] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,\'3\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 3</td>' +
          '<td class="tg-0pky">15%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasilcefb3" value="' +
          pecahHasilCEFB[2] +
          '" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">4</td>' +
          '<td class="tg-za14" colspan="2">KONDISI BANGUNAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SANGAT BAIK</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[11] && pecahCheckBoxCEFB[11] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,\'4\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">BAIK</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[12] && pecahCheckBoxCEFB[12] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,\'4\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">CUKUP</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[13] && pecahCheckBoxCEFB[13] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'4\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">KURANG</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[14] && pecahCheckBoxCEFB[14] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,\'4\',\'0.15\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 4</td>' +
          '<td class="tg-0pky">15%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasilcefb4" value="' +
          pecahHasilCEFB[3] +
          '" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">5</td>' +
          '<td class="tg-za14" colspan="2">PENGGUNAAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">RUMAH TEMPAT TINGGAL</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[15] && pecahCheckBoxCEFB[15] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">RUKO/RUKAN/TOKO</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[16] && pecahCheckBoxCEFB[16] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">KANTOR</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[17] && pecahCheckBoxCEFB[17] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">LAINNYA (GUDANG,DLL)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[18] && pecahCheckBoxCEFB[18] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,\'5\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 5</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasilcefb5" value="' +
          pecahHasilCEFB[4] +
          '" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">6</td>' +
          '<td class="tg-za14" colspan="2">TINGGI LANTAI BANGUNAN TERHADAP JALAN</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">TINGGI (>100CM)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[19] && pecahCheckBoxCEFB[19] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SEDANG (51CM S.D. 100CM)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[20] && pecahCheckBoxCEFB[20] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">RENDAH (0 S.D. 50CM)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[21] && pecahCheckBoxCEFB[21] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-za14">SANGAT RENDAH (DIBAWAH JALAN)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">25</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[22] && pecahCheckBoxCEFB[22] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="25" onchange="showValueCEFB(this,\'6\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 6</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasilcefb6" value="' +
          pecahHasilCEFB[5] +
          '" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky" rowspan="5">7</td>' +
          '<td class="tg-0pky" colspan="2">KELANGKAPAN FASILITAS</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">SANGAT LENGKAP (>6 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">100</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[22] && pecahCheckBoxCEFB[22] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="100" onchange="showValueCEFB(this,\'7\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">LENGKAP (5 S.D. 6 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">75</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[23] && pecahCheckBoxCEFB[23] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="75" onchange="showValueCEFB(this,\'7\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">CUKUP (3 S.D. 4 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[24] && pecahCheckBoxCEFB[24] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'7\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky">-</td>' +
          '<td class="tg-0pky">TIDAK LENGKAP (S.D. 2 FASILITAS)</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">50</td>' +
          '<td class="tg-0pky"><input type="checkbox" id="checkboxcefb' +
          counter_tanah_loop +
          '"' +
          (pecahCheckBoxCEFB[23] && pecahCheckBoxCEFB[23] !== "0" ? "checked" : "") +
          ' name="checkboxcefb[]" value="50" onchange="showValueCEFB(this,\'7\',\'0.1\')"></td>' +
          '<td class="tg-0pky"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah Sub Point 7</td>' +
          '<td class="tg-0pky">10%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasilcefb7" value="' +
          pecahHasilCEFB[6] +
          '" name="hasil_checkbox_cefb[]" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "<tr>" +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky">Jumlah CEF Bangunan</td>' +
          '<td class="tg-0pky">100%</td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"></td>' +
          '<td class="tg-0pky"><input id="hasiltotalCEFB' +
          counter_tanah_loop +
          '" name="hasiltotalcefb[]" value="' +
          TotalCEFB[counter_tanah_loop] +
          '" style="display: inline-block; width: 45px; margin-left: 10px;"></td>' +
          "</tr>" +
          "</tbody>" +
          "</table>" +
          "</div>" +
          "</div>";

        // Menambahkan deskripsi ke dalam DOM
        $("#ceftb").append(inputan_tanah);
      }

      // }
      //   }
      // }
    }
  });
}

function faa_bb() {
  variabelGlobal(function (hasil) {
    if (hasil.status == "success") {
      var jenis_agunan = hasil.message.data_entry.jenis_agunan;
      var data = hasil.message.faa;

      var jenisAgunanArray = jenis_agunan.split(";");

      var barangBergerakCount = jenisAgunanArray.filter(
        (item) => item === "Barang Bergerak"
      ).length;
      var tanahAtauTanahBangunanCount = jenisAgunanArray.filter(
        (item) => item === "Tanah/ Tanah dan Bangunan"
      ).length;

      // Loop untuk Barang Bergerak, hanya sejumlah barangBergerakCount
      for (
        let counter_bb_loop = 0;
        counter_bb_loop < barangBergerakCount;
        counter_bb_loop++
      ) {
        // if (adaBarangBergerak) {
        //     if (jenisAgunanArray[counter_bb_loop] === "Barang Bergerak") {
        const jenisBBArray = (data.jenis_bb ? data.jenis_bb : "").split(";");
        const nama_nasabahArray = (
          data.nama_nasabah_bb ? data.nama_nasabah_bb : ""
        ).split(";");
        const jenis_dokumen_bbArray = (
          data.jenis_dokumen_bb ? data.jenis_dokumen_bb : ""
        ).split(";");
        const alamat_bbArray = (data.alamat_bb ? data.alamat_bb : "").split(
          ";"
        );
        const model_tipe_bbArray = (
          data.model_tipe_bb ? data.model_tipe_bb : ""
        ).split(";");
        const merek_cc_bbArray = (
          data.merek_cc_bb ? data.merek_cc_bb : ""
        ).split(";");
        const tahun_pembuatan_bbArray = (
          data.tahun_pembuatan_bb ? data.tahun_pembuatan_bb : ""
        ).split(";");
        const serial_number_bbArray = (
          data.serial_number_bb ? data.serial_number_bb : ""
        ).split(";");
        const nomor_mesin_bbArray = (
          data.nomor_mesin_bb ? data.nomor_mesin_bb : ""
        ).split(";");
        const warna_bbArray = (data.warna_bb ? data.warna_bb : "").split(";");
        const bahan_bakar_bbArray = (
          data.bahan_bakar_bb ? data.bahan_bakar_bb : ""
        ).split(";");
        const kondisi_keadaan_bbArray = (
          data.kondisi_keadaan_bb ? data.kondisi_keadaan_bb : ""
        ).split(";");
        const nomor_polisi_bbArray = (
          data.nomor_polisi_bb ? data.nomor_polisi_bb : ""
        ).split(";");
        const invoice_no_bbArray = (
          data.invoice_no_bb ? data.invoice_no_bb : ""
        ).split(";");
        const invoice_tanggal_bbArray = (
          data.invoice_tanggal_bb ? data.invoice_tanggal_bb : ""
        ).split(";");
        const perubahan_hak_terakhir_bbArray = (
          data.perubahan_hak_terakhir_bb ? data.perubahan_hak_terakhir_bb : ""
        ).split(";");
        const alamat_pemilik_saat_ini_bbArray = (
          data.alamat_pemilik_saat_ini_bb ? data.alamat_pemilik_saat_ini_bb : ""
        ).split(";");
        const tercatat_atas_namaArray = (
          data.tercatat_atas_nama_bb ? data.tercatat_atas_nama_bb : ""
        ).split(";");
        const umur_teknis_bbArray = (
          data.umur_teknis_bb ? data.umur_teknis_bb : ""
        ).split(";");
        const bukti_kepemilikan_agb_bbArray = (
          data.bukti_kepemilikan_agb_bb ? data.bukti_kepemilikan_agb_bb : ""
        ).split(";");
        const perkiraan_umur_ekonomis_bbArray = (
          data.perkiraan_umur_ekonomis_bb ? data.perkiraan_umur_ekonomis_bb : ""
        ).split(";");
        const tempat_penyimpanan_bbArray = (
          data.tempat_penyimpanan_bb ? data.tempat_penyimpanan_bb : ""
        ).split(";");
        const route_bbArray = (data.route_bb ? data.route_bb : "").split(";");
        const jarak_rata_rata_tempuh_bbArray = (
          data.jarak_rata_rata_tempuh_bb ? data.jarak_rata_rata_tempuh_bb : ""
        ).split(";");
        const nilai_buku_sebesar_bbArray = (
          data.nilai_buku_sebesar_bb ? data.nilai_buku_sebesar_bb : ""
        ).split(";");
        const nilai_taksasi_sebesar_bbArray = (
          data.nilai_taksasi_sebesar_bb ? data.nilai_taksasi_sebesar_bb : ""
        ).split(";");
        const safety_margin_bbArray = (
          data.safety_margin_bb ? data.safety_margin_bb : ""
        ).split(";");
        const nilai_agunan_setelah_sm_bbArray = (
          data.nilai_agunan_setelah_sm_bb ? data.nilai_agunan_setelah_sm_bb : ""
        ).split(";");
        const cef_bbArray = (data.cef_bb ? data.cef_bb : "").split(";");
        const nilai_agunan_setelah_cef_bbArray = (
          data.nilai_agunan_setelah_cef_bb
            ? data.nilai_agunan_setelah_cef_bb
            : ""
        ).split(";");
        // for (let isi = 0; isi < jenisAgunanArray.length; isi++) {
        console.log(alamat_bbArray[1]);
        var inputan_bb =
          '<div id="bagian_bb' +
          counter_bb_loop +
          '">' +
          '<h2 class="text-center text-danger">Barang Bergerak</h2>' +
          '<h3 class="text-left text-success"></h3>' +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Nama Nasabah</label>' +
          '<div class="col-lg-12">' +
          '<input id="nama_nasabah_bb' +
          counter_bb_loop +
          '" name="nama_nasabah_bb[]" type="text" ' +
          'value="' +
          (nama_nasabahArray[counter_bb_loop] || "") +
          '"' +
          '" placeholder="" class="form-control nama_nasabah_bb">' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Jenis Dokumen Kepemilikan</label>' +
          '<div class="col-lg-12">' +
          '<input id="jenis_dokumen_bb' +
          counter_bb_loop +
          '" name="jenis_dokumen_bb[]" ' +
          'value="' +
          (jenis_dokumen_bbArray[counter_bb_loop] || "") +
          '"' +
          '" type="text" placeholder="" class="form-control jenis_dokumen_bb">' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Alamat</label>' +
          '<div class="col-lg-12">' +
          '<textarea class="form-control alamat_bb" id="alamat_bb' +
          counter_bb_loop +
          '" name="alamat_bb[]" rows="3">' +
          (alamat_bbArray[counter_bb_loop] || "") +
          "</textarea>" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<h3 class="text-left text-success">Data Umum</h3>' +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Jenis</label>' +
          '<div class="col-lg-12">' +
          '<input id="jenis_bb' +
          counter_bb_loop +
          '" name="jenis_bb[]" ' +
          'value="' +
          (jenisBBArray[counter_bb_loop] || "") +
          '"' +
          '" type="text" placeholder="" class="form-control class-readonly jenis_bb">' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Model/ Tipe</label>' +
          '<div class="col-lg-12">' +
          '<input id="model_tipe_bb' +
          counter_bb_loop +
          '" name="model_tipe_bb[]" ' +
          'value="' +
          (model_tipe_bbArray[counter_bb_loop] || "") +
          '"' +
          '" type="text" placeholder="" class="form-control class-readonly model_tipe_bb">' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Merk/ CC</label>' +
          '<div class="col-lg-12">' +
          '<input id="merek_cc_bb' +
          counter_bb_loop +
          '" name="merek_cc_bb[]" ' +
          'value="' +
          (merek_cc_bbArray[counter_bb_loop] || "") +
          '"' +
          '" type="text" placeholder="" class="form-control class-readonly merek_cc_bb">' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Tahun Pembuatan</label>' +
          '<div class="col-lg-12">' +
          '<input id="tahun_pembuatan_bb' +
          counter_bb_loop +
          '" name="tahun_pembuatan_bb[]" ' +
          'value="' +
          (tahun_pembuatan_bbArray[counter_bb_loop] || "") +
          '"' +
          '" type="number" placeholder="" class="form-control class-readonly tahun_pembuatan_bb">' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Serial Number</label>' +
          '<div class="col-lg-12">' +
          '<input id="serial_number_bb' +
          counter_bb_loop +
          '" name="serial_number_bb[]" ' +
          'value="' +
          (serial_number_bbArray[counter_bb_loop] || "") +
          '"' +
          '" type="text" placeholder="" class="form-control class-readonly serial_number_bb">' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Nomor Mesin</label>' +
          '<div class="col-lg-12">' +
          '<input id="nomor_mesin_bb' +
          counter_bb_loop +
          '" name="nomor_mesin_bb[]" ' +
          'value="' +
          (nomor_mesin_bbArray[counter_bb_loop] || "") +
          '"' +
          '" type="text" placeholder="" class="form-control class-readonly nomor_mesin_bb">' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Warna</label>' +
          '<div class="col-lg-12">' +
          '<input id="warna_bb' +
          counter_bb_loop +
          '" name="warna_bb[]"' +
          'value="' +
          (warna_bbArray[counter_bb_loop] || "") +
          '"' +
          'type="text" placeholder="" class="form-control class-readonly warna_bb" ' +
          is_disabled +
          ">" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Bahan Bakar</label>' +
          '<div class="col-lg-12">' +
          '<input id="bahan_bakar_bb' +
          counter_bb_loop +
          '" name="bahan_bakar_bb[]"' +
          'value="' +
          (bahan_bakar_bbArray[counter_bb_loop] || "") +
          '"' +
          'type="text" placeholder="" class="form-control class-readonly bahan_bakar_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Kondisi/ Keadaan</label>' +
          '<div class="col-lg-12">' +
          '<input id="kondisi_keadaan_bb' +
          counter_bb_loop +
          '" name="kondisi_keadaan_bb[]"' +
          'value="' +
          (kondisi_keadaan_bbArray[counter_bb_loop] || "") +
          '"' +
          '  type="text" placeholder="" class="form-control class-readonly kondisi_keadaan_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Nomor Polisi</label>' +
          '<div class="col-lg-12">' +
          '<input id="nomor_polisi_bb' +
          counter_bb_loop +
          '" name="nomor_polisi_bb[]"' +
          'value="' +
          (nomor_polisi_bbArray[counter_bb_loop] || "") +
          '"' +
          ' type="text" placeholder="" class="form-control class-readonly nomor_polisi_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Bukti Kepemilikan</label>' +
          '<div class="col-lg-12">' +
          '<input id="bukti_kepemilikan_agb_bb' +
          counter_bb_loop +
          '" name="bukti_kepemilikan_agb_bb[]" ' +
          'value="' +
          (bukti_kepemilikan_agb_bbArray[counter_bb_loop] || "") +
          '"' +
          'type="text" placeholder="" class="form-control class-readonly bukti_kepemilikan_agb_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Invoice No</label>' +
          '<div class="col-lg-12">' +
          '<input id="invoice_no_bb' +
          counter_bb_loop +
          '" name="invoice_no_bb[]" ' +
          'value="' +
          (invoice_no_bbArray[counter_bb_loop] || "") +
          '"' +
          ' type="text" placeholder="" class="form-control class-readonly invoice_no_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Invoice Tanggal</label>' +
          '<div class="col-lg-12">' +
          '<input id="invoice_tanggal_bb' +
          counter_bb_loop +
          '" name="invoice_tanggal_bb[]"' +
          'value="' +
          (invoice_tanggal_bbArray[counter_bb_loop] || "") +
          '"' +
          '  type="date" placeholder="" class="form-control class-readonly invoice_tanggal_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Perubahan Hak Terakhir</label>' +
          '<div class="col-lg-12">' +
          '<input id="perubahan_hak_terakhir_bb' +
          counter_bb_loop +
          '" name="perubahan_hak_terakhir_bb[]" ' +
          'value="' +
          (perubahan_hak_terakhir_bbArray[counter_bb_loop] || "") +
          '"' +
          ' type="text" placeholder="" class="form-control class-readonly perubahan_hak_terakhir_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Tercatat Atas Nama</label>' +
          '<div class="col-lg-12">' +
          '<input id="tercatat_atas_nama_bb' +
          counter_bb_loop +
          '" name="tercatat_atas_nama_bb[]" ' +
          'value="' +
          (tercatat_atas_namaArray[counter_bb_loop] || "") +
          '"' +
          '  type="text" placeholder="" class="form-control class-readonly tercatat_atas_nama_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Alamat Pemilik Saat Ini</label>' +
          '<div class="col-lg-12">' +
          '<textarea class="form-control class-readonly alamat_pemilik_saat_ini_bb" id="alamat_pemilik_saat_ini_bb' +
          counter_bb_loop +
          '" name="alamat_pemilik_saat_ini_bb[]" rows="3" is_disabled>' +
          (alamat_pemilik_saat_ini_bbArray[counter_bb_loop] || "") +
          "</textarea>" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Umur Teknis</label>' +
          '<div class="col-lg-12">' +
          '<input id="umur_teknis_bb' +
          counter_bb_loop +
          '" name="umur_teknis_bb[]" ' +
          'value="' +
          (umur_teknis_bbArray[counter_bb_loop] || "") +
          '"' +
          'type="text" placeholder="" class="form-control class-readonly umur_teknis_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Perkiraan Umur Ekonomis</label>' +
          '<div class="col-lg-12">' +
          '<input id="perkiraan_umur_ekonomis_bb' +
          counter_bb_loop +
          '" name="perkiraan_umur_ekonomis_bb[]" ' +
          'value="' +
          (perkiraan_umur_ekonomis_bbArray[counter_bb_loop] || "") +
          '"' +
          'type="text" placeholder="" class="form-control class-readonly perkiraan_umur_ekonomis_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Tempat Penyimpanan</label>' +
          '<div class="col-lg-12">' +
          '<input id="tempat_penyimpanan_bb' +
          counter_bb_loop +
          '" name="tempat_penyimpanan_bb[]" ' +
          'value="' +
          (tempat_penyimpanan_bbArray[counter_bb_loop] || "") +
          '"' +
          ' type="text" placeholder="" class="form-control class-readonly tempat_penyimpanan_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Route</label>' +
          '<div class="col-lg-12">' +
          '<input id="route_bb' +
          counter_bb_loop +
          '" name="route_bb[]" ' +
          'value="' +
          (route_bbArray[counter_bb_loop] || "") +
          '"' +
          'type="text" placeholder="" class="form-control class-readonly route_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Jarak Rata-rata Ditempuh</label>' +
          '<div class="col-lg-12">' +
          '<input id="jarak_rata_rata_tempuh_bb' +
          counter_bb_loop +
          '" name="jarak_rata_rata_tempuh_bb[]" ' +
          'value="' +
          (jarak_rata_rata_tempuh_bbArray[counter_bb_loop] || "") +
          '"' +
          ' type="text" placeholder="" class="form-control class-readonly jarak_rata_rata_tempuh_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          "<div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Nilai Buku Sebesar</label>' +
          '<div class="col-lg-12">' +
          '<input id="nilai_buku_sebesar_bb" name="nilai_buku_sebesar_bb[]" type="text" ' +
          'value="' +
          (nilai_buku_sebesar_bbArray[counter_bb_loop] || "") +
          '"' +
          ' placeholder="" class="form-control class-readonly nilai_buku_sebesar_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Nilai Taksasi Sebesar</label>' +
          '<div class="col-lg-12">' +
          '<input id="nilai_taksasi_sebesar_bb" name="nilai_taksasi_sebesar_bb[]" type="text" ' +
          'value="' +
          (nilai_taksasi_sebesar_bbArray[counter_bb_loop] || "") +
          '"' +
          ' placeholder="" class="form-control class-readonly nilai_taksasi_sebesar_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Safety Margin</label>' +
          '<div class="col-lg-12">' +
          '<input id="safety_margin_bb" name="safety_margin_bb[]" type="text" ' +
          'value="' +
          (safety_margin_bbArray[counter_bb_loop] || "") +
          '"' +
          ' placeholder="" class="form-control class-readonly safety_margin_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Nilai Agunan Setelah SM</label>' +
          '<div class="col-lg-12">' +
          '<input id="nilai_agunan_setelah_sm_bb" name="nilai_agunan_setelah_sm_bb[]" type="text" ' +
          'value="' +
          (nilai_agunan_setelah_sm_bbArray[counter_bb_loop] || "") +
          '"' +
          ' placeholder="" class="form-control class-readonly nilai_agunan_setelah_sm_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">CEF</label>' +
          '<div class="col-lg-12">' +
          '<input id="cef_bb" name="cef_bb[]" type="text" ' +
          'value="' +
          (cef_bbArray[counter_bb_loop] || "") +
          '"' +
          ' placeholder="" class="form-control class-readonly cef_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-12 control-label">Nilai Agunan Setelah CEF</label>' +
          '<div class="col-lg-12">' +
          '<input id="nilai_agunan_setelah_cef_bb" name="nilai_agunan_setelah_cef_bb[]" type="text" ' +
          'value="' +
          (nilai_agunan_setelah_cef_bbArray[counter_bb_loop] || "") +
          '"' +
          ' placeholder="" class="form-control class-readonly nilai_agunan_setelah_cef_bb" is_disabled>' +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>";

        // Menambahkan deskripsi ke dalam DOM
        $("#faa_bb").append(inputan_bb);
        // }
      }
      //   }
      // }

      // Jika ada 'Tanah' atau 'Tanah dan Bangunan', tampilkan deskripsi
      // if (adaTanahOrTanahBangunan) {
      //   for (
      //     let counter_tanah_loop = 0;
      //     counter_tanah_loop < jenisAgunanArray.length;
      //     counter_tanah_loop++
      //   ) {
      //     if (
      //       jenisAgunanArray[counter_tanah_loop] === "Tanah/ Tanah dan Bangunan"
      //     ) {
      for (
        let counter_tanah_loop = 0;
        counter_tanah_loop < tanahAtauTanahBangunanCount;
        counter_tanah_loop++
      ) {
        // Proses data untuk 'Tanah/ Tanah dan Bangunan' sesuai kebutuhan
        const bagian_tanahArray = (
          data.bagian_tanah ? data.bagian_tanah : ""
        ).split(";");
        const nama_nasabah_faa_tbArray = (
          data.nama_nasabah_faa_tb ? data.nama_nasabah_faa_tb : ""
        ).split(";");
        const nomor_shm_faa_tbArray = (
          data.nomor_shm_faa_tb ? data.nomor_shm_faa_tb : ""
        ).split(";");
        const tanggal_shm_faa_tbArray = (
          data.tanggal_shm_faa_tb ? data.tanggal_shm_faa_tb : ""
        ).split(";");
        const nama_pemilik_shm_faa_tbArray = (
          data.nama_pemilik_shm_faa_tb ? data.nama_pemilik_shm_faa_tb : ""
        ).split(";");
        const alamat_agunan_faa_tbArray = (
          data.alamat_agunan_faa_tb ? data.alamat_agunan_faa_tb : ""
        ).split(";");
        const harga_pasar_tanah_faa_tbArray = (
          data.harga_pasar_tanah_faa_tb ? data.harga_pasar_tanah_faa_tb : ""
        ).split(";");
        const harga_buku_tanah_faa_tbArray = (
          data.harga_buku_tanah_faa_tb ? data.harga_buku_tanah_faa_tb : ""
        ).split(";");
        const harga_menurut_pejabat_bank_tanah_faa_tbArray = (
          data.harga_menurut_pejabat_bank_tanah_faa_tb
            ? data.harga_menurut_pejabat_bank_tanah_faa_tb
            : ""
        ).split(";");
        const harga_tanah_tanah_faa_tbArray = (
          data.harga_tanah_tanah_faa_tb ? data.harga_tanah_tanah_faa_tb : ""
        ).split(";");
        const luas_persegi_tanah_tanah_faa_tbArray = (
          data.luas_persegi_tanah_tanah_faa_tb
            ? data.luas_persegi_tanah_tanah_faa_tb
            : ""
        ).split(";");
        const hasil_perhitungan_penilaian_tanah_faa_tbArray = (
          data.hasil_perhitungan_penilaian_tanah_faa_tb
            ? data.hasil_perhitungan_penilaian_tanah_faa_tb
            : ""
        ).split(";");
        const cef_tanah_faa_tbArray = (
          data.cef_tanah_faa_tb ? data.cef_tanah_faa_tb : ""
        ).split(";");
        const persentase_safety_margin_tanah_faa_tbArray = (
          data.persentase_safety_margin_tanah_faa_tb
            ? data.persentase_safety_margin_tanah_faa_tb
            : ""
        ).split(";");
        var inputan_tanah =
          '<div id="bagian_tanah' +
          counter_tanah_loop +
          '">' +
          '<h2 class="text-center text-danger">Tanah/ Tanah dan Bangunan</h2>' +
          '              <div class="form-group row">' +
          '<label class="col-lg-3 control-label">Nama Nasabah</label>' +
          '<div class="col-lg-3">' +
          '<div class="col-lg-12">' +
          '<input id="nama_nasabah_faa_tb' +
          counter_tanah_loop +
          '" name="nama_nasabah_faa_tb[]" value="' +
          (nama_nasabah_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" onkeyup="hitungSemua()" placeholder="" class="form-control" ' +
          is_disabled +
          ">" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<label class="col-lg-3 control-label">Nomor SHM</label>' +
          '<div class="col-lg-3">' +
          '<div class="col-lg-12">' +
          '<input id="nomor_shm_faa_tb' +
          counter_tanah_loop +
          '" name="nomor_shm_faa_tb[]" value="' +
          (nomor_shm_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" placeholder="" class="form-control" ' +
          is_disabled +
          ">" +
          "</div>" +
          "</div>" +
          '<label class="col-lg-1 control-label">Tanggal</label>' +
          '<div class="col-lg-3">' +
          '<div class="col-lg-12">' +
          '<input id="tanggal_shm_faa_tb' +
          counter_tanah_loop +
          '" name="tanggal_shm_faa_tb[]" value="' +
          (tanggal_shm_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" placeholder="" class="form-control" ' +
          is_disabled +
          ">" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<label class="col-lg-3 control-label">Nama Pemilik SHM</label>' +
          '<div class="col-lg-3">' +
          '<div class="col-lg-12">' +
          '<input id="nama_pemilik_shm_faa_tb' +
          counter_tanah_loop +
          '" name="nama_pemilik_shm_faa_tb[]" value="' +
          (nama_pemilik_shm_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" placeholder="" class="form-control" ' +
          is_disabled +
          ">" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<label class="col-lg-3 control-label">Alamat Agunan</label>' +
          '<div class="col-lg-3">' +
          '<div class="col-lg-12">' +
          '<input id="alamat_agunan_faa_tb' +
          counter_tanah_loop +
          '" name="alamat_agunan_faa_tb[]" value="' +
          (alamat_agunan_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" placeholder="" class="form-control" ' +
          is_disabled +
          ">" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="border border-dark p-1">' +
          "<h3>1. Harga Tanah :</h3>" +
          '<div class="form-group row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-6 control-label">Harga menurut pasar</label>' +
          '<div class="col-lg-12">' +
          '<input id="harga_pasar_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="harga_pasar_tanah_faa_tb[]" value="' +
          (harga_pasar_tanah_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-6 control-label">Harga Buku</label>' +
          '<div class="col-lg-12">' +
          '<input id="harga_buku_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="harga_buku_tanah_faa_tb[]" value="' +
          (harga_buku_tanah_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<div class="col-lg-6">' +
          '<label class="col-lg-6 control-label">Harga menurut pejabat bank</label>' +
          '<div class="col-lg-12">' +
          '<input id="harga_menurut_pejabat_bank_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="harga_menurut_pejabat_bank_tanah_faa_tb[]" value="' +
          (harga_menurut_pejabat_bank_tanah_faa_tbArray[counter_tanah_loop] ||
            "") +
          '"type="text" onkeyup="hitungSemua()" placeholder="" class="form-control">' +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<div class="col-lg-12">' +
          '<div class="row">' +
          '<div class="col-lg-3">' +
          '<label class="col-lg-12 control-label">Penilaian tanah</label>' +
          "</div>" +
          '<div class="col-lg-1 text-right">Rp</div>' +
          '<div class="col-lg-2">' +
          '<input id="harga_tanah_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="harga_tanah_tanah_faa_tb[]" value="' +
          (harga_tanah_tanah_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" placeholder="" class="form-control">' +
          "</div>" +
          '<div class="col-lg-1 text-center">x</div>' +
          '<div class="col-lg-2">' +
          '<input id="luas_persegi_tanah_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="luas_persegi_tanah_tanah_faa_tb[]" value="' +
          (luas_persegi_tanah_tanah_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" placeholder="" class="form-control">' +
          "</div>" +
          '<div class="col-lg-2">' +
          '<input id="hasil_perhitungan_penilaian_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="hasil_perhitungan_penilaian_tanah_faa_tb[]" value="' +
          (hasil_perhitungan_penilaian_tanah_faa_tbArray[counter_tanah_loop] ||
            "") +
          '"type="text" placeholder="" class="form-control">' +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<div class="col-lg-12">' +
          '<div class="row">' +
          '<div class="col-lg-4">' +
          '<label class="col-lg-12 control-label">Cash Equivalency Factor (CEF)</label>' +
          "</div>" +
          '<div class="col-lg-2">' +
          '<input id="cef_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="cef_tanah_faa_tb[]" value="' +
          (cef_tanah_faa_tbArray[counter_tanah_loop] || "") +
          '"type="text" placeholder="" class="form-control">' +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>" +
          '<div class="form-group row">' +
          '<div class="col-lg-12">' +
          '<div class="row">' +
          '<div class="col-lg-4">' +
          '<label class="col-lg-6 control-label">Safety Margin</label>' +
          "</div>" +
          '<div class="col-lg-2">' +
          '<input id="persentase_safety_margin_tanah_faa_tb' +
          counter_tanah_loop +
          '" name="persentase_safety_margin_tanah_faa_tb[]" value="' +
          (persentase_safety_margin_tanah_faa_tbArray[counter_tanah_loop] ||
            "") +
          '"type="text" placeholder="" class="form-control">' +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>";

        // Menambahkan deskripsi ke dalam DOM
        $("#faa_tanah").append(inputan_tanah);
      }

      // }
      //   }
      // }
    }
  });
}

function getCurrentDate() {
  var today = new Date();
  var day = ("0" + today.getDate()).slice(-2);
  var month = ("0" + (today.getMonth() + 1)).slice(-2);
  var year = today.getFullYear();
  return year + "-" + month + "-" + day;
}

function copyvalue(id, target) {
  let TEXTValue = document.getElementById(id).value;
  document.getElementById(target).value = TEXTValue;
}

function copyvalue2(id, target1, target2) {
  let TEXTValue = $("#" + id).val();
  $("#" + target1).val(TEXTValue);
  $("#" + target2).val(TEXTValue);
}

function unit_kerja_dcl() {
  variabelGlobal(function (hasil) {
    if (hasil.status == "success") {
      var kd_unit = hasil.message.data_entry.kd_unit_kerja;
      // console.log('kode unit'+kd_unit);
      $.ajax({
        url: base_url + "unit_kerja/get_unit_by_id/" + kd_unit,
        // url: "<?php echo base_url('unit_kerja/get_unit_by_id'); ?>" + "/" + kd_unit,
        type: "get",
        dataType: "JSON",
        success: function (data) {
          var options = data.unit;
          var select = $("#pengelola_dcl");

          select.empty();
          // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
          var defaultOption = new Option("Pilih", "", true, true);
          $(defaultOption).prop("disabled", true);
          select.append(defaultOption);

          $.each(options, function (index, option) {
            var newOption = new Option(
              option.kd_unit + " - " + option.nama_unit,
              option.kd_unit,
              false,
              false
            );
            if (option.kd_unit === kd_unit) {
              $(newOption).prop("selected", true);
            }
            select.append(newOption);
          });

          select.select2({
            placeholder: "Pilih",
            dropdownParent: $("#pengelola_dcl").parent(),
          });
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error get data");
        },
      });
    } else {
      alert(hasil.message);
    }
  });
}

//
//FAK Data
//
function hitungPP(angka = null) {
  let persentase_uang_muka =
    parseFloat($("#persen_uang_muka_fak_data").val()) || 0;
  let nilai =
    parseFloat($("#nilai_sebelum_ppn_pp_fak_data" + angka).val()) || 0;
  let ppn = parseFloat($("#ppn_pp_fak_data" + angka).val()) || 0;
  let hasil = nilai * (1 + ppn / 100);
  $("#nilai_sesudah_ppn_pp_fak_data" + angka).val(hasil);

  let profit_kontraktor_fak_data =
    parseFloat($("#profit_kontraktor_fak_data").val()) || 0;
  let biaya_pemeliharaan_fak_data =
    parseFloat($("#biaya_pemeliharaan_fak_data").val()) || 0;
  // prettier-ignore
  let hassil = hasil - (hasil * ((profit_kontraktor_fak_data/100) + (biaya_pemeliharaan_fak_data/100)));
  $("#nilai_pp_fak_modal" + angka).val(hassil);

  let pembulatan_sebelumPPN =
    parseFloat($("#pembulatan_nilai_sebelum_ppn_total_pp_fak_data").val()) || 0;
  const inputs = $("input[name='nilai_sebelum_ppn_pp_fak_data[]']");
  let total = 0;
  inputs.each(function () {
    const nilai = parseFloat($(this).val()) || 0;
    total += nilai;
    totalhasil = total + pembulatan_sebelumPPN;
  });
  $("#jumlah_nilai_sebelum_ppn_total_pp_fak_data").val(totalhasil);

  penerimaan_uang_muka_fak_modal = totalhasil * (persentase_uang_muka / 100);
  $("#penerimaan_uang_muka_fak_modal").val(penerimaan_uang_muka_fak_modal);

  let pembulatan_sesudahPPN = pembulatan_sebelumPPN * (1 + 0);

  const inputs2 = $("input[name='nilai_sesudah_ppn_pp_fak_data[]']");
  let total2 = 0;
  inputs2.each(function () {
    const nilai2 = parseFloat($(this).val()) || 0;
    total2 += nilai2;
    totalhasil2 = total2 + pembulatan_sesudahPPN;
  });
  //prettier-ignore
  let koreksi = totalhasil2 - (totalhasil2 * ((profit_kontraktor_fak_data/100) + (biaya_pemeliharaan_fak_data/100)));
  let jumlah =
    totalhasil2 -
    totalhasil2 *
      (profit_kontraktor_fak_data / 100 + biaya_pemeliharaan_fak_data / 100);

  $("#jumlah_nilai_sesudah_ppn_total_pp_fak_data").val(totalhasil2);
  $("#koreksi_biaya_fak_modal").val(koreksi);
  $("#jumlah_fak_modal").val(jumlah);
}

function hitungPrakiraanTanggalTermijn(angka) {
  var tgl_pelaksanaan_fak_data = $("#tgl_pelaksanaan_fak_data").val() || 0;
  let lama_pelaksanaan_fak_data =
    parseFloat($("#lama_pelaksanaan_fak_data").val()) || 0;
  let progressValue =
    parseFloat($("#progress_termijn_fak_data" + angka).val()) || 0;
  if (progressValue === 0) {
    var formattedDate = tgl_pelaksanaan_fak_data;
  } else {
    var elapsedDays = lama_pelaksanaan_fak_data * (progressValue / 100);
    // console.log("elapsedDays:", elapsedDays);
    var progressDate = new Date(tgl_pelaksanaan_fak_data);
    // console.log("progressDate:", progressDate);
    progressDate.setDate(progressDate.getDate() + Math.floor(elapsedDays));
    var formattedDate = progressDate.toISOString().slice(0, 10);
  }

  // Menetapkan nilai ke elemen input tanggal prakiraan
  $("#prakiraan_tgl_termijn_fak_data" + angka).val(formattedDate);
}

// Fungsi untuk melakukan perhitungan
//FAK Modal
function hitungPersentase() {
  let proyek = parseFloat($("#proyek_fak_modal").val()) || 0;
  let profit = parseFloat($("#profit_fak_modal").val()) || 0;
  let ppn = parseFloat($("#ppn_fak_modal").val()) || 0;
  let pemeliharaan = parseFloat($("#pemeliharaan_fak_modal").val()) || 0;
  let hasil = proyek - profit - ppn - pemeliharaan;
  $("#persentase_proyek_fak_modal").val(hasil);
}

function hitungNilaiProyek() {
  let sesudah_ppn =
    parseFloat($("#jumlah_nilai_sesudah_ppn_total_pp_fak_data").val()) || 0;
  let profit_kontraktor =
    parseFloat($("#profit_kontraktor_fak_data").val()) || 0;
  let biaya_pemeliharaan =
    parseFloat($("#biaya_pemeliharaan_fak_data").val()) || 0;
  //prettier-ignore
  let hasil = sesudah_ppn - (sesudah_ppn * ((profit_kontraktor/100) + (biaya_pemeliharaan/100)));
  $("#nilai_proyek_fak_modal").val(hasil);
}

function hitungPPFAKM() {
  let nilaiproyek = parseFloat($("#nilai_proyek_fak_modal").val()) || 0;
  const inputs = $("input[name='nilai_pp_fak_modal[]']");
  let total = 0;
  inputs.each(function () {
    const nilai = parseFloat($(this).val()) || 0;
    total += nilai;
  });
  const jumlah = total - nilaiproyek;
  //
  tottal = total - jumlah;
  $("#koreksi_biaya_fak_modal").val(jumlah);
  $("#jumlah_fak_modal").val(tottal);
  $("#biaya_umum_adm_fak_rl").val(tottal);
  // $("#pembiayaan_sendiri_fak_modal").val(pembiayaan);
}

function hitungTotal() {
  let nilaiproyek = parseFloat($("#nilai_proyek_fak_modal").val()) || 0;
  let direktur = parseFloat($("#gaji_direktur_fak_modal").val()) || 0;
  let pengawas = parseFloat($("#gaji_pengawas_fak_modal").val()) || 0;
  let staf = parseFloat($("#gaji_staf_fak_modal").val()) || 0;
  let umum = parseFloat($("#biaya_umum_fak_modal").val()) || 0;
  let hasil = direktur + pengawas + staf + umum;
  let hasil2 = nilaiproyek + hasil;

  $("#jumlah_total_biaya_umum_fak_modal").val(hasil);
  $("#biaya_umum_adm_fak_rl").val(hasil);
  $("#total_biaya_umum_fak_modal").val(hasil2);
}

function hitungJumlahKebutuhanModalKerja() {
  let persentase = parseFloat($("#persentase_pekerjaan_fak_modal").val()) || 0;
  let persiapan_pekerjaan_fak_modal =
    parseFloat($("#jumlah_fak_modal").val()) || 0;
  let biaya_umum_adm_fak_modal =
    parseFloat($("#jumlah_total_biaya_umum_fak_modal").val()) || 0;
  let hasil1 = (persentase / 100) * persiapan_pekerjaan_fak_modal;
  let hasil2 = (persentase / 100) * biaya_umum_adm_fak_modal;
  let total = hasil1 + hasil2;
  $("#persiapan_pekerjaan_fak_modal").val(hasil1);
  $("#biaya_umum_adm_fak_modal").val(hasil2);
  $("#jumlah_kebutuhan_modal_kerja_fak_modal").val(total);
  $("#sumber_pembiayaan_fak_modal").val(total);
  $("#jumlah_bulat_sumber_pembiayaan_fak_modal").val(total);

  const pembiayaan = 0.1 * total;
  $("#pembiayaan_sendiri_fak_modal").val(pembiayaan);
}

function hitungKreditBank() {
  let sumber_pembiayaan_fak_modal =
    parseFloat($("#sumber_pembiayaan_fak_modal").val()) || 0;
  let penerimaan_uang_muka_fak_modal =
    parseFloat($("#penerimaan_uang_muka_fak_modal").val()) || 0;
  let pembiayaan_sendiri_fak_modal =
    parseFloat($("#pembiayaan_sendiri_fak_modal").val()) || 0;
  const hasil =
    sumber_pembiayaan_fak_modal -
    penerimaan_uang_muka_fak_modal -
    pembiayaan_sendiri_fak_modal;
  $("#kredit_bank_fak_modal").val(hasil);
  $("#maksimum_fasilitas_mauk").val(hasil);
  $("#maksimum_kredit_mauk").val(hasil);
  copyvalue2(
    "penerimaan_uang_muka_fak_modal",
    "jumlah_penerimaan_uang_muka_fak_modal",
    "penerimaan_uang_muka_fak_rl"
  );
}

function hitungKreditBank2() {
  let jumlah_bulat_sumber_pembiayaan_fak_modal =
    parseFloat($("#jumlah_bulat_sumber_pembiayaan_fak_modal").val()) || 0;
  let jumlah_penerimaan_uang_muka_fak_modal =
    parseFloat($("#jumlah_penerimaan_uang_muka_fak_modal").val()) || 0;
  let jumlah_kredit_bank_fak_modal =
    parseFloat($("#jumlah_kredit_bank_fak_modal").val()) || 0;
  let provisi = parseFloat($("#biaya_provisi_fak_data").val()) || 0;
  $("#plafond_fasilitas_mauk").val(jumlah_kredit_bank_fak_modal);
  $("#plafond_kredit_mauk").val(jumlah_kredit_bank_fak_modal);
  const hasil =
    jumlah_bulat_sumber_pembiayaan_fak_modal -
    jumlah_penerimaan_uang_muka_fak_modal -
    jumlah_kredit_bank_fak_modal;
  const hasil2 = (
    (jumlah_kredit_bank_fak_modal / jumlah_bulat_sumber_pembiayaan_fak_modal) *
    100
  ).toFixed(2);
  const hasil3 = (
    (hasil / jumlah_bulat_sumber_pembiayaan_fak_modal) *
    100
  ).toFixed(2);
  const hasil4 = (100 - parseFloat(hasil2) - parseFloat(hasil3)).toFixed(2);
  const hasil5 = (
    parseFloat(hasil4) +
    parseFloat(hasil3) +
    parseFloat(hasil2)
  ).toFixed(2);
  const hasil6 = jumlah_kredit_bank_fak_modal * (provisi / 100);
  $("#jumlah_pembiayaan_sendiri_fak_modal").val(hasil);
  $("#pendanaan_sendiri_mauk").val(hasil);
  $("#persentase_pembiayaan_sendiri_fak_modal").val(hasil3);
  $("#persentase_kredit_bank_fak_modal").val(hasil2);
  $("#persentase_penerimaan_uang_muka_fak_modal").val(hasil4);
  $("#persentase_jumlah_sumber_pembiayaan_fak_modal").val(hasil5);
  $("#hitung_provisi_fee_mauk").val(hasil6);
  $("#kredit_bank_fak_rl").val(jumlah_kredit_bank_fak_modal);
}

//FAK Proyeksi RL
function hitungLabaKotor() {
  const nilaiKontrak = parseFloat($("#nilai_kontrak_fak_rl").val()) || 0;
  const pekerjaanPersiapan =
    parseFloat($("#pekerjaan_persiapan_konstruksi_fak_rl").val()) || 0;
  const fix = nilaiKontrak - pekerjaanPersiapan;
  const fix2 = fix / nilaiKontrak;
  $("#laba_kotor_fak_rl").val(fix);
  $("#gross_profit_margin_fak_rl").val(fix2);
}

function hitungLabaUsaha() {
  const nilaiKontrak = parseFloat($("#nilai_kontrak_fak_rl").val()) || 0;
  const BiayaUmum = parseFloat($("#biaya_umum_adm_fak_rl").val()) || 0;
  const LabaKotor = parseFloat($("#laba_kotor_fak_rl").val()) || 0;
  const fix = BiayaUmum + LabaKotor;
  const fix2 = fix / nilaiKontrak;
  $("#laba_usaha_fak_rl").val(fix);
  $("#gross_operating_margin_fak_rl").val(fix2);
}

function hitungLabaSebelumPajak() {
  const laba_usaha_fak_rl = parseFloat($("#laba_usaha_fak_rl").val()) || 0;
  // var angka = document.getElementById("jumlah_termijn_fak_data").value;
  var tanggalElement = document.getElementById("tgl_pencairan_fak_data");
  var tanggal_termijnElement = document.getElementById(
    "prakiraan_tgl_termijn_fak_data1"
  );
  let jumlah_pembiayaan_sendiri_fak_modal =
    parseFloat($("#jumlah_pembiayaan_sendiri_fak_modal").val()) || 0;

  if (tanggalElement && tanggal_termijnElement) {
    var tanggal = new Date(tanggalElement.value);
    var tanggal_termijn = new Date(tanggal_termijnElement.value);
    const jumlah_kredit_bank_fak_modal =
      parseFloat($("#jumlah_kredit_bank_fak_modal").val()) || 0;
    const bunga_kredit_fak_data =
      parseFloat($("#bunga_kredit_fak_data").val()) || 0;
    const biaya_provisi_fak_data =
      parseFloat($("#biaya_provisi_fak_data").val()) || 0;

    // Mengonversi objek tanggal menjadi nilai numerik
    var excelEpochInMilliseconds = new Date("1900-01-01").getTime();
    var millisecondsPerDay = 24 * 60 * 60 * 1000; // milidetik per hari

    var nilaiTanggal = Math.ceil(
      (tanggal.getTime() - excelEpochInMilliseconds) / millisecondsPerDay + 2
    );
    var nilaiTanggaltermijn = Math.ceil(
      (tanggal_termijn.getTime() - excelEpochInMilliseconds) /
        millisecondsPerDay +
        2
    );
    /* prettier-ignore */
    const fix =(jumlah_kredit_bank_fak_modal * (bunga_kredit_fak_data/100) / 360 * (nilaiTanggaltermijn - nilaiTanggal)) + ((biaya_provisi_fak_data/100) * jumlah_kredit_bank_fak_modal);
    const fix1 = fix + laba_usaha_fak_rl;

    const fix3 = fix / jumlah_pembiayaan_sendiri_fak_modal;
    $("#bunga_provisi_bank_fak_rl").val(fix);
    $("#laba_sebelum_pajak_fak_rl").val(fix1);
    // $("#return_of_equity_fak_rl").val(fix3);
  } else {
    console.error(
      "Elemen HTML tidak ditemukan atau tidak memiliki properti 'value'."
    );
  }
}

function hitungPajakPPNPPh() {
  const ppn_fak_data = parseFloat($("#ppn_fak_data").val()) || 0;
  const nilai_kontrak_fak_data =
    parseFloat($("#nilai_kontrak_setelah_ppn_fak_data").val()) || 0;
  const pph_fak_data = parseFloat($("#pph_fak_data").val()) || 0;
  // console.log(pph_fak_data);
  // console.log(nilai_kontrak_fak_data);
  // console.log(ppn_fak_data);
  /* prettier-ignore */
  const fix = -((((ppn_fak_data/100) / (1 + (ppn_fak_data/100))) * nilai_kontrak_fak_data) + ((nilai_kontrak_fak_data - (((ppn_fak_data/100) / (1 + (ppn_fak_data/100))) * nilai_kontrak_fak_data)) * (pph_fak_data/100)));
  $("#pajak_pph_ppn_fak_rl").val(Math.round(fix));
}

function hitungLabaBersih() {
  const nilaiKontrak = parseFloat($("#nilai_kontrak_fak_rl").val()) || 0;
  const pajak_pph_ppn_fak_rl =
    parseFloat($("#pajak_pph_ppn_fak_rl").val()) || 0;
  const laba_sebelum_pajak_fak_rl =
    parseFloat($("#laba_sebelum_pajak_fak_rl").val()) || 0;
  const jumlah_pembiayaan_sendiri_fak_modal =
    parseFloat($("#jumlah_pembiayaan_sendiri_fak_modal").val()) || 0;
  const fix = pajak_pph_ppn_fak_rl + laba_sebelum_pajak_fak_rl;
  const fix2 = fix / nilaiKontrak;
  const fix3 = 100 * (fix / jumlah_pembiayaan_sendiri_fak_modal);
  $("#laba_bersih_fak_rl").val(Math.round(fix));
  $("#return_of_sale_fak_rl").val(fix2.toFixed(4));
  $("#return_of_equity_fak_rl").val(fix3);
}

function hitungPenerimaanTermijn() {
  const termijn_pemeliharaan =
    parseFloat($("#setelah_masa_pemeliharaan_fak_data").val()) || 0;
  const persentase_penerimaan_termijn_fak_rl =
    parseFloat($("#persentase_penerimaan_termijn_fak_rl").val()) || 0;
  const harga_borongan_fak_rl =
    parseFloat($("#harga_borongan_fak_rl").val()) || 0;
  const fix = persentase_penerimaan_termijn_fak_rl * harga_borongan_fak_rl;
  $("#penerimaan_termijn_fak_rl").val(Math.round(fix));
  $("#persentase_penerimaan_termijn_pemeliharaan_fak_rl").val(
    termijn_pemeliharaan
  );
}

function hitungPenerimaanTermijnPemeliharaan() {
  const nilai_kontrak_fak_rl =
    parseFloat($("#nilai_kontrak_fak_rl").val()) || 0;
  const setelah_masa_pemeliharaan_fak_data =
    parseFloat($("#setelah_masa_pemeliharaan_fak_data").val()) || 0;

  const fix = (nilai_kontrak_fak_rl * setelah_masa_pemeliharaan_fak_data) / 100;
  $("#penerimaan_termijn_pemeliharaan_fak_rl").val(Math.round(fix));
}

function hitungPenerimaanBersih() {
  const harga_borongan_fak_rl =
    parseFloat($("#harga_borongan_fak_rl").val()) || 0;
  const persentase_penerimaan_uang_muka_fak_rl =
    parseFloat($("#persentase_penerimaan_uang_muka_fak_rl").val()) || 0;
  const persentase_penerimaan_termijn_fak_rl =
    parseFloat($("#persentase_penerimaan_termijn_fak_rl").val()) || 0;
  const persentase_penerimaan_termijn_pemeliharaan_fak_rl =
    parseFloat($("#persentase_penerimaan_termijn_pemeliharaan_fak_rl").val()) ||
    0;
  const penerimaan_uang_muka_fak_rl =
    parseFloat($("#penerimaan_uang_muka_fak_rl").val()) || 0;
  const penerimaan_termijn_fak_rl =
    parseFloat($("#penerimaan_termijn_fak_rl").val()) || 0;
  const penerimaan_termijn_pemeliharaan_fak_rl =
    parseFloat($("#penerimaan_termijn_pemeliharaan_fak_rl").val()) || 0;
  const fix =
    100 -
    persentase_penerimaan_uang_muka_fak_rl -
    persentase_penerimaan_termijn_fak_rl -
    persentase_penerimaan_termijn_pemeliharaan_fak_rl;
  const fix2 =
    harga_borongan_fak_rl -
    penerimaan_uang_muka_fak_rl -
    penerimaan_termijn_fak_rl -
    penerimaan_termijn_pemeliharaan_fak_rl;
  $("#persentase_penerimaan_bersih_fak_rl").val(fix);
  $("#penerimaan_bersih_fak_rl").val(Math.round(fix2));
}

function hitungPajakRL() {
  const ppn_fak_data = parseFloat($("#ppn_fak_data").val()) || 0;
  const penerimaan_bersih_fak_rl =
    parseFloat($("#penerimaan_bersih_fak_rl").val()) || 0;
  const pph_fak_data = parseFloat($("#pph_fak_data").val()) || 0;
  const fix =
    /* prettier-ignore */
    (((ppn_fak_data/100) / (1 + (ppn_fak_data/100))) * penerimaan_bersih_fak_rl) +((penerimaan_bersih_fak_rl - (((ppn_fak_data/100) / (1 + (ppn_fak_data/100))) * penerimaan_bersih_fak_rl)) * (pph_fak_data/100));
  const fix2 = penerimaan_bersih_fak_rl - fix;
  $("#pajak_ppn_pph_fak_rl").val(fix);
  $("#kosong_bersih_fak_rl").val(fix2);
}

function hitungPersentasePemotonganKreditBank() {
  const kredit_bank_fak_rl = parseFloat($("#kredit_bank_fak_rl").val()) || 0;
  const kosong_bersih_fak_rl =
    parseFloat($("#kosong_bersih_fak_rl").val()) || 0;
  const fix = (kredit_bank_fak_rl / kosong_bersih_fak_rl) * 100;
  // const fix2 = Math.round(fix * 100) / 100;
  const fix2 = Math.ceil(fix);
  $("#persentase_pemotongan_kredit_bank_fak_rl").val(fix.toFixed(4));
  $("#dibulatkan_fak_rl").val(fix2);
}

//
//CEF
//

function showValueCEFT(checkbox, angka, bobot) {
  if (checkbox.checked) {
    var hitungbobot = checkbox.value * bobot;
    $("#hasilceft" + angka).val(hitungbobot);
  } else {
    var hitungbobot = 0;
    $("#hasilceft" + angka).val(hitungbobot);
  }
  var hasil1ceft = parseFloat(document.getElementById("hasilceft1").value || 0);
  var hasil2ceft = parseFloat(document.getElementById("hasilceft2").value || 0);
  var hasil3ceft = parseFloat(document.getElementById("hasilceft3").value || 0);
  var hasil4ceft = parseFloat(document.getElementById("hasilceft4").value || 0);
  var hasil5ceft = parseFloat(document.getElementById("hasilceft5").value || 0);
  var hasil6ceft = parseFloat(document.getElementById("hasilceft6").value || 0);
  var hasil7ceft = parseFloat(document.getElementById("hasilceft7").value || 0);
  var hasil8ceft = parseFloat(document.getElementById("hasilceft8").value || 0);
  var hasil9ceft = parseFloat(document.getElementById("hasilceft9").value || 0);

  total =
    hasil1ceft +
    hasil2ceft +
    hasil3ceft +
    hasil4ceft +
    hasil5ceft +
    hasil6ceft +
    hasil7ceft +
    hasil8ceft +
    hasil9ceft;

  // Menampilkan total ke dalam elemen dengan id "hasiltotal"
  document.getElementById("hasiltotalCEFT").value = total;
}

function showValueCEFB(checkbox, angka, bobot) {
  if (checkbox.checked) {
    var hitungbobot = checkbox.value * bobot;
    $("#hasilcefb" + angka).val(hitungbobot);
  } else {
    var hitungbobot = 0;
    $("#hasilcefb" + angka).val(hitungbobot);
  }
  var hasil1cefb = parseFloat(document.getElementById("hasilcefb1").value || 0);
  var hasil2cefb = parseFloat(document.getElementById("hasilcefb2").value || 0);
  var hasil3cefb = parseFloat(document.getElementById("hasilcefb3").value || 0);
  var hasil4cefb = parseFloat(document.getElementById("hasilcefb4").value || 0);
  var hasil5cefb = parseFloat(document.getElementById("hasilcefb5").value || 0);
  var hasil6cefb = parseFloat(document.getElementById("hasilcefb6").value || 0);
  var hasil7cefb = parseFloat(document.getElementById("hasilcefb7").value || 0);

  total =
    hasil1cefb +
    hasil2cefb +
    hasil3cefb +
    hasil4cefb +
    hasil5cefb +
    hasil6cefb +
    hasil7cefb;

  // Menampilkan total ke dalam elemen dengan id "hasiltotal"
  document.getElementById("hasiltotalCEFB").value = total;
}

jumlahisipp = 1;
jumlahisitermijn = 1;
jumlahisimauk = 1;
jumlahisimauk2 = 1;
jumlahisimauk3 = 1;
jumlahisidcl = 1;
jumlahisidcl2 = 1;
jumlahisidcl3 = 1;
jumlahisidcl4 = 1;
jumlahisidcl5 = 1;
jumlahisidcl6 = 1;
jumlahisidcl7 = 1;
jumlahisidcl8 = 1;

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

function combineValues(inputs) {
  let combinedValues = "";
  inputs.forEach((input, index) => {
    if (input.value.trim() !== "") {
      if (combinedValues) {
        combinedValues += ";";
      }
      combinedValues += input.value.trim();
    }
  });
  return combinedValues;
}

function combineCheckboxValues(inputs) {
  let combinedValues = "";
  inputs.forEach((input, index) => {
    if (input.checked) {
      if (combinedValues) {
        combinedValues += ";";
      }
      combinedValues += input.value;
    } else {
      if (combinedValues) {
        combinedValues += ";";
      }
      combinedValues += "0";
    }
  });
  return combinedValues;
}

function combineSelectValues(selects) {
  let combinedValues = "";
  selects.forEach((select, index) => {
    // Ambil nilai dari opsi yang dipilih
    const selectedValue = select.options[select.selectedIndex].value.trim();

    if (selectedValue !== "") {
      if (combinedValues) {
        combinedValues += ";";
      }
      combinedValues += selectedValue;
    }
  });
  return combinedValues;
}

function combineTextareaValues(textareas) {
  let combinedValues = "";
  textareas.forEach((textarea, index) => {
    const textareaValue = textarea.value.trim();

    if (textareaValue !== "") {
      if (combinedValues) {
        combinedValues += ";";
      }
      combinedValues += textareaValue;
    }
  });
  return combinedValues;
}

function add_pp() {
  var inpItemForm = document.querySelectorAll(
    "input[name='item_pp_fak_data[]']"
  );
  var inpPPNForm = document.querySelectorAll("input[name='ppn_pp_fak_data[]']");
  var inpSebelumPPNForm = document.querySelectorAll(
    "input[name='nilai_sebelum_ppn_pp_fak_data[]']"
  );
  var inpSesudahPPNForm = document.querySelectorAll(
    "input[name='nilai_sesudah_ppn_pp_fak_data[]']"
  );

  document.querySelector('[name="itemppfakdata"]').value =
    combineValues(inpItemForm);
  document.querySelector('[name="ppnppfakdata"]').value =
    combineValues(inpPPNForm);
  document.querySelector('[name="nilaisebelumppnppfakdata"]').value =
    combineValues(inpSebelumPPNForm);
  document.querySelector('[name="nilaisesudahppnppfakdata"]').value =
    combineValues(inpSesudahPPNForm);
}

function add_termijn() {
  var inpTermijnForm = document.querySelectorAll(
    "input[name='termijn_fak_data[]']"
  );
  var inpProgressForm = document.querySelectorAll(
    "input[name='progress_termijn_fak_data[]']"
  );
  var inpPersentaseForm = document.querySelectorAll(
    "input[name='persentase_termijn_fak_data[]']"
  );
  var inpPrakiraanTanggalForm = document.querySelectorAll(
    "input[name='prakiraan_tgl_termijn_fak_data[]']"
  );

  document.querySelector('[name="termijnfakdata"]').value =
    combineValues(inpTermijnForm);
  document.querySelector('[name="progresstermijnfakdata"]').value =
    combineValues(inpProgressForm);
  document.querySelector('[name="persentasetermijnfakdata"]').value =
    combineValues(inpPersentaseForm);
  document.querySelector('[name="prakiraantgltermijnfakdata"]').value =
    combineValues(inpPrakiraanTanggalForm);
}

function add_pp_fak_modal() {
  var inpItemForm = document.querySelectorAll(
    "input[name='item_pp_fak_modal[]']"
  );
  var inpNilaiPPForm = document.querySelectorAll(
    "input[name='nilai_pp_fak_modal[]']"
  );

  document.querySelector('[name="itemppfakmodal"]').value =
    combineValues(inpItemForm);
  document.querySelector('[name="nilaippfakmodal"]').value =
    combineValues(inpNilaiPPForm);
}

function nilaicheckboxceft() {
  var nilaicheckboxceft = document.querySelectorAll(
    "input[name='checkboxceft[]']"
  );

  document.querySelector('[name="nilaicheckboxceft"]').value =
    combineCheckboxValues(nilaicheckboxceft);
}

function hasilcheckboxceft() {
  var hasilcheckboxceft = document.querySelectorAll(
    "input[name='hasil_checkbox_ceft[]']"
  );
  document.querySelector('[name="hasilcheckboxceft"]').value =
    combineValues(hasilcheckboxceft);
}

function hasilcheckboxcefb() {
  var hasilcheckboxcefb = document.querySelectorAll(
    "input[name='hasil_checkbox_cefb[]']"
  );

  document.querySelector('[name="hasilcheckboxcefb"]').value =
    combineValues(hasilcheckboxcefb);
}

function nilaicheckboxcefb() {
  var nilaicheckboxcefb = document.querySelectorAll(
    "input[name='checkboxcefb[]']"
  );

  document.querySelector('[name="nilaicheckboxcefb"]').value =
    combineCheckboxValues(nilaicheckboxcefb);
}

function add_kesimpulan_mauk() {
  var jenis_kredit_fasilitas_usul_mauk = document.querySelectorAll(
    "input[name='jenis_kredit_fasilitas_usul_mauk[]']"
  );
  var max_kredit_ini_usul_mauk = document.querySelectorAll(
    "input[name='max_kredit_ini_usul_mauk[]']"
  );
  var perubahan_usul_mauk = document.querySelectorAll(
    "input[name='perubahan_usul_mauk[]']"
  );
  var max_kredit_usul_mauk = document.querySelectorAll(
    "input[name='max_kredit_usul_mauk[]']"
  );

  document.querySelector('[name="jeniskreditfasilitasusulmauk"]').value =
    combineValues(jenis_kredit_fasilitas_usul_mauk);
  document.querySelector('[name="maxkreditiniusulmauk"]').value = combineValues(
    max_kredit_ini_usul_mauk
  );
  document.querySelector('[name="perubahanusulmauk"]').value =
    combineValues(perubahan_usul_mauk);
  document.querySelector('[name="maxkreditusulmauk"]').value =
    combineValues(max_kredit_usul_mauk);
}

function add_kesimpulan_pal_mauk() {
  var jenis_kredit_fasilitas_pal_mauk = document.querySelectorAll(
    "input[name='jenis_kredit_fasilitas_pal_mauk[]']"
  );
  var max_kredit_ini_pal_mauk = document.querySelectorAll(
    "input[name='max_kredit_ini_pal_mauk[]']"
  );
  var perubahan_pal_mauk = document.querySelectorAll(
    "input[name='perubahan_pal_mauk[]']"
  );
  var max_kredit_pal_mauk = document.querySelectorAll(
    "input[name='max_kredit_pal_mauk[]']"
  );

  document.querySelector('[name="jeniskreditfasilitaspalmauk"]').value =
    combineValues(jenis_kredit_fasilitas_pal_mauk);
  document.querySelector('[name="maxkreditinipalmauk"]').value = combineValues(
    max_kredit_ini_pal_mauk
  );
  document.querySelector('[name="perubahanpalmauk"]').value =
    combineValues(perubahan_pal_mauk);
  document.querySelector('[name="maxkreditpalmauk"]').value =
    combineValues(max_kredit_pal_mauk);
}

function add_agunan_mauk() {
  var agunan_mauk = document.querySelectorAll("input[name='agunan_mauk[]']");
  var macam_jenis_mauk = document.querySelectorAll(
    "input[name='macam_jenis_mauk[]']"
  );
  var nilai_agunan_mauk = document.querySelectorAll(
    "input[name='nilai_agunan_mauk[]']"
  );
  var bentuk_pengikatan_mauk = document.querySelectorAll(
    "input[name='bentuk_pengikatan_mauk[]']"
  );

  document.querySelector('[name="agunanmauk"]').value =
    combineValues(agunan_mauk);
  document.querySelector('[name="macamjenismauk"]').value =
    combineValues(macam_jenis_mauk);
  document.querySelector('[name="nilaiagunanmauk"]').value =
    combineValues(nilai_agunan_mauk);
  document.querySelector('[name="bentukpengikatanmauk"]').value = combineValues(
    bentuk_pengikatan_mauk
  );
}

function add_faa_tb() {
  var nama_nasabah_faa_tb = document.querySelectorAll(
    "input[name='nama_nasabah_faa_tb[]']"
  );
  var nomor_shm_faa_tb = document.querySelectorAll(
    "input[name='nomor_shm_faa_tb[]']"
  );
  var tanggal_shm_faa_tb = document.querySelectorAll(
    "input[name='tanggal_shm_faa_tb[]']"
  );
  var nama_pemilik_shm_faa_tb = document.querySelectorAll(
    "input[name='nama_pemilik_shm_faa_tb[]']"
  );
  var alamat_agunan_faa_tb = document.querySelectorAll(
    "input[name='alamat_agunan_faa_tb[]']"
  );
  var harga_pasar_tanah_faa_tb = document.querySelectorAll(
    "input[name='harga_pasar_tanah_faa_tb[]']"
  );
  var harga_buku_tanah_faa_tb = document.querySelectorAll(
    "input[name='harga_buku_tanah_faa_tb[]']"
  );
  var harga_menurut_pejabat_bank_tanah_faa_tb = document.querySelectorAll(
    "input[name='harga_menurut_pejabat_bank_tanah_faa_tb[]']"
  );
  var harga_tanah_tanah_faa_tb = document.querySelectorAll(
    "input[name='harga_tanah_tanah_faa_tb[]']"
  );
  var luas_persegi_tanah_tanah_faa_tb = document.querySelectorAll(
    "input[name='luas_persegi_tanah_tanah_faa_tb[]']"
  );
  var hasil_perhitungan_penilaian_tanah_faa_tb = document.querySelectorAll(
    "input[name='hasil_perhitungan_penilaian_tanah_faa_tb[]']"
  );

  document.querySelector('[name="namanasabahfaatb"]').value =
    combineValues(nama_nasabah_faa_tb);
  document.querySelector('[name="nomorshmfaatb"]').value =
    combineValues(nomor_shm_faa_tb);
  document.querySelector('[name="tanggalshmfaatb"]').value =
    combineValues(tanggal_shm_faa_tb);
  document.querySelector('[name="namapemilikshmfaatb"]').value = combineValues(
    nama_pemilik_shm_faa_tb
  );
  document.querySelector('[name="alamatagunanfaatb"]').value =
    combineValues(alamat_agunan_faa_tb);
  document.querySelector('[name="hargapasartanahfaatb"]').value = combineValues(
    harga_pasar_tanah_faa_tb
  );
  document.querySelector('[name="hargabukutanahfaatb"]').value = combineValues(
    harga_buku_tanah_faa_tb
  );
  document.querySelector('[name="hargamenurutpejabatbanktanahfaatb"]').value =
    combineValues(harga_menurut_pejabat_bank_tanah_faa_tb);
  document.querySelector('[name="hargatanahtanahfaatb"]').value = combineValues(
    harga_tanah_tanah_faa_tb
  );
  document.querySelector('[name="luaspersegitanahtanahfaatb"]').value =
    combineValues(luas_persegi_tanah_tanah_faa_tb);
  document.querySelector('[name="hasilperhitunganpenilaiantanahfaatb"]').value =
    combineValues(hasil_perhitungan_penilaian_tanah_faa_tb);
}

function add_faa_bb() {
  var nama_nasabah_bb = document.querySelectorAll(
    "input[name='nama_nasabah_bb[]']"
  );
  var jenis_dokumen_bb = document.querySelectorAll(
    "input[name='jenis_dokumen_bb[]']"
  );
  var alamat_bb = document.querySelectorAll("textarea[name='alamat_bb[]']");
  var jenis_bb = document.querySelectorAll("input[name='jenis_bb[]']");
  var model_tipe_bb = document.querySelectorAll(
    "input[name='model_tipe_bb[]']"
  );
  var merek_cc_bb = document.querySelectorAll("input[name='merek_cc_bb[]']");
  var tahun_pembuatan_bb = document.querySelectorAll(
    "input[name='tahun_pembuatan_bb[]']"
  );
  var serial_number_bb = document.querySelectorAll(
    "input[name='serial_number_bb[]']"
  );
  var nomor_mesin_bb = document.querySelectorAll(
    "input[name='nomor_mesin_bb[]']"
  );
  var warna_bb = document.querySelectorAll("input[name='warna_bb[]']");
  var bahan_bakar_bb = document.querySelectorAll(
    "input[name='bahan_bakar_bb[]']"
  );
  var kondisi_keadaan_bb = document.querySelectorAll(
    "input[name='kondisi_keadaan_bb[]']"
  );
  var nomor_polisi_bb = document.querySelectorAll(
    "input[name='nomor_polisi_bb[]']"
  );
  var bukti_kepemilikan_agb_bb = document.querySelectorAll(
    "input[name='bukti_kepemilikan_agb_bb[]']"
  );
  var invoice_no_bb = document.querySelectorAll(
    "input[name='invoice_no_bb[]']"
  );
  var invoice_tanggal_bb = document.querySelectorAll(
    "input[name='invoice_tanggal_bb[]']"
  );
  var perubahan_hak_terakhir_bb = document.querySelectorAll(
    "input[name='perubahan_hak_terakhir_bb[]']"
  );
  var tercatat_atas_nama_bb = document.querySelectorAll(
    "input[name='tercatat_atas_nama_bb[]']"
  );
  var alamat_pemilik_saat_ini_bb = document.querySelectorAll(
    "textarea[name='alamat_pemilik_saat_ini_bb[]']"
  );
  var umur_teknis_bb = document.querySelectorAll(
    "input[name='umur_teknis_bb[]']"
  );
  var perkiraan_umur_ekonomis_bb = document.querySelectorAll(
    "input[name='perkiraan_umur_ekonomis_bb[]']"
  );
  var tempat_penyimpanan_bb = document.querySelectorAll(
    "input[name='tempat_penyimpanan_bb[]']"
  );
  var route_bb = document.querySelectorAll("input[name='route_bb[]']");
  var jarak_rata_rata_tempuh_bb = document.querySelectorAll(
    "input[name='jarak_rata_rata_tempuh_bb[]']"
  );

  document.querySelector('[name="namanasabahbb"]').value =
    combineValues(nama_nasabah_bb);
  document.querySelector('[name="jenisdokumenbb"]').value =
    combineValues(jenis_dokumen_bb);
  // document.querySelector('[name="alamatbb"]').value = combineValues(alamat_bb);
  document.querySelector('[name="alamatbb"]').value =
    combineTextareaValues(alamat_bb);
  document.querySelector('[name="jenisbb"]').value = combineValues(jenis_bb);
  document.querySelector('[name="modeltipebb"]').value =
    combineValues(model_tipe_bb);
  document.querySelector('[name="merekccbb"]').value =
    combineValues(merek_cc_bb);
  document.querySelector('[name="tahunpembuatanbb"]').value =
    combineValues(tahun_pembuatan_bb);
  document.querySelector('[name="serialnumberbb"]').value =
    combineValues(serial_number_bb);
  document.querySelector('[name="nomormesinbb"]').value =
    combineValues(nomor_mesin_bb);
  document.querySelector('[name="warnabb"]').value = combineValues(warna_bb);
  document.querySelector('[name="bahanbakarbb"]').value =
    combineValues(bahan_bakar_bb);
  document.querySelector('[name="kondisikeadaanbb"]').value =
    combineValues(kondisi_keadaan_bb);
  document.querySelector('[name="nomorpolisibb"]').value =
    combineValues(nomor_polisi_bb);
  document.querySelector('[name="buktikepemilikanagbbb"]').value =
    combineValues(bukti_kepemilikan_agb_bb);
  document.querySelector('[name="invoicenobb"]').value =
    combineValues(invoice_no_bb);
  document.querySelector('[name="invoicetanggalbb"]').value =
    combineValues(invoice_tanggal_bb);
  document.querySelector('[name="perubahanhakterakhirbb"]').value =
    combineValues(perubahan_hak_terakhir_bb);
  document.querySelector('[name="tercatatatasnamabb"]').value = combineValues(
    tercatat_atas_nama_bb
  );
  document.querySelector('[name="alamatpemiliksaatinibb"]').value =
    combineTextareaValues(alamat_pemilik_saat_ini_bb);
  document.querySelector('[name="umurteknisbb"]').value =
    combineValues(umur_teknis_bb);
  document.querySelector('[name="perkiraanumurekonomisbb"]').value =
    combineValues(perkiraan_umur_ekonomis_bb);
  document.querySelector('[name="tempatpenyimpananbb"]').value = combineValues(
    tempat_penyimpanan_bb
  );
  document.querySelector('[name="routebb"]').value = combineValues(route_bb);
  document.querySelector('[name="jarakrataratatempuhbb"]').value =
    combineValues(jarak_rata_rata_tempuh_bb);
}

function add_dcl1() {
  var nama_pemilik_perusahaan_dcl = document.querySelectorAll(
    "input[name='nama_pemilik_perusahaan_dcl[]']"
  );
  var persentase_saham_dcl = document.querySelectorAll(
    "input[name='persentase_saham_dcl[]']"
  );

  document.querySelector('[name="namapemilikperusahaandcl"]').value =
    combineValues(nama_pemilik_perusahaan_dcl);
  document.querySelector('[name="persentasesahamdcl"]').value =
    combineValues(persentase_saham_dcl);
}

function add_dcl2() {
  var jabatan_pengurus_perusahaan_dcl = document.querySelectorAll(
    "input[name='jabatan_pengurus_perusahaan_dcl[]']"
  );
  var nama_pengurus_perusahaan_dcl = document.querySelectorAll(
    "input[name='nama_pengurus_perusahaan_dcl[]']"
  );
  var ktp_dcl = document.querySelectorAll("input[name='ktp_dcl[]']");

  document.querySelector('[name="jabatanpengurusperusahaandcl"]').value =
    combineValues(jabatan_pengurus_perusahaan_dcl);
  document.querySelector('[name="namapengurusperusahaandcl"]').value =
    combineValues(nama_pengurus_perusahaan_dcl);
  document.querySelector('[name="ktpdcl"]').value = combineValues(ktp_dcl);
}

function add_dcl3() {
  var fasilitas_kredit_dcl = document.querySelectorAll(
    "textarea[name='fasilitas_kredit_dcl[]']"
  );
  // console.log(fasilitas_kredit_dcl);
  var plafond_dcl = document.querySelectorAll("input[name='plafond_dcl[]']");
  var jangka_waktu_dcl = document.querySelectorAll(
    "textarea[name='jangka_waktu_dcl[]']"
  );
  var tujuan_penggunaan_dcl = document.querySelectorAll(
    "textarea[name='tujuan_penggunaan_dcl[]']"
  );
  var permohonan_diterima_dcl = document.querySelectorAll(
    "input[name='permohonan_diterima_dcl[]']"
  );
  // let combinedValues = combineTextareaValues(fasilitas_kredit_dcl);
  // console.log(combinedValues);
  document.querySelector('[name="fasilitaskreditdcl"]').value =
    combineTextareaValues(fasilitas_kredit_dcl);
  document.querySelector('[name="plafonddcl"]').value =
    combineValues(plafond_dcl);
  document.querySelector('[name="jangkawaktudcl"]').value =
    combineTextareaValues(jangka_waktu_dcl);
  document.querySelector('[name="tujuanpenggunaandcl"]').value =
    combineTextareaValues(tujuan_penggunaan_dcl);
  document.querySelector('[name="permohonanditerimadcl"]').value =
    combineValues(permohonan_diterima_dcl);
}
function add_dcl4() {
  var bukti_kepemilikan_dcl = document.querySelectorAll(
    "input[name='bukti_kepemilikan_dcl[]']"
  );
  var jenis_agunan_dcl = document.querySelectorAll(
    "input[name='jenis_agunan_dcl[]']"
  );
  var tanggal_agunan_dcl = document.querySelectorAll(
    "input[name='tanggal_agunan_dcl[]']"
  );
  var avalist_dcl = document.querySelectorAll("input[name='avalist_dcl[]']");
  var nominal_dcl = document.querySelectorAll("input[name='nominal_dcl[]']");

  document.querySelector('[name="buktikepemilikandcl"]').value = combineValues(
    bukti_kepemilikan_dcl
  );
  document.querySelector('[name="jenisagunandcl"]').value =
    combineValues(jenis_agunan_dcl);
  document.querySelector('[name="tanggalagunandcl"]').value =
    combineValues(tanggal_agunan_dcl);
  document.querySelector('[name="avalistdcl"]').value =
    combineValues(avalist_dcl);
  document.querySelector('[name="nominaldcl"]').value =
    combineValues(nominal_dcl);
}
function add_dcl5() {
  var fasilitas_dcl = document.querySelectorAll(
    "input[name='fasilitas_dcl[]']"
  );
  var jatuh_tempo_dcl = document.querySelectorAll(
    "input[name='jatuh_tempo_dcl[]']"
  );
  var plafond_existing_dcl = document.querySelectorAll(
    "input[name='plafond_existing_dcl[]']"
  );
  var outstanding_dcl = document.querySelectorAll(
    "input[name='outstanding_dcl[]']"
  );
  var kolektibilitas_dcl = document.querySelectorAll(
    "input[name='kolektibilitas_dcl[]']"
  );
  document.querySelector('[name="fasilitasdcl"]').value =
    combineValues(fasilitas_dcl);
  document.querySelector('[name="jatuhtempodcl"]').value =
    combineValues(jatuh_tempo_dcl);
  document.querySelector('[name="plafondexistingdcl"]').value =
    combineValues(plafond_existing_dcl);
  document.querySelector('[name="outstandingdcl"]').value =
    combineValues(outstanding_dcl);
  document.querySelector('[name="kolektibilitasdcl"]').value =
    combineValues(kolektibilitas_dcl);
}

function add_dcl6() {
  var fasilitas_kredit_grup_dcl = document.querySelectorAll(
    "input[name='fasilitas_kredit_grup_dcl[]']"
  );
  var nama_debitur_kredit_grup_dcl = document.querySelectorAll(
    "input[name='nama_debitur_kredit_grup_dcl[]']"
  );
  var jatuh_tempo_kredit_grup_dcl = document.querySelectorAll(
    "input[name='jatuh_tempo_kredit_grup_dcl[]']"
  );
  var plafond_existing_kredit_grup_dcl = document.querySelectorAll(
    "input[name='plafond_existing_kredit_grup_dcl[]']"
  );
  var outstanding_kredit_grup_dcl = document.querySelectorAll(
    "input[name='outstanding_kredit_grup_dcl[]']"
  );
  var kolektibilitas_kredit_grup_dcl = document.querySelectorAll(
    "input[name='kolektibilitas_kredit_grup_dcl[]']"
  );

  document.querySelector('[name="fasilitaskreditgrupdcl"]').value =
    combineValues(fasilitas_kredit_grup_dcl);
  document.querySelector('[name="namadebiturkreditgrupdcl"]').value =
    combineValues(nama_debitur_kredit_grup_dcl);
  document.querySelector('[name="jatuhtempokreditgrupdcl"]').value =
    combineValues(jatuh_tempo_kredit_grup_dcl);
  document.querySelector('[name="plafondexistingkreditgrupdcl"]').value =
    combineValues(plafond_existing_kredit_grup_dcl);
  document.querySelector('[name="outstandingkreditgrupdcl"]').value =
    combineValues(outstanding_kredit_grup_dcl);
  document.querySelector('[name="kolektibilitaskreditgrupdcl"]').value =
    combineValues(kolektibilitas_kredit_grup_dcl);
}
function add_dcl7() {
  var fasilitas_bank_lain_dcl = document.querySelectorAll(
    "input[name='fasilitas_bank_lain_dcl[]']"
  );
  var bank_ljk_bank_lain_dcl = document.querySelectorAll(
    "input[name='bank_ljk_bank_lain_dcl[]']"
  );
  var jatuh_tempo_bank_lain_dcl = document.querySelectorAll(
    "input[name='jatuh_tempo_bank_lain_dcl[]']"
  );
  var plafond_existing_bank_lain_dcl = document.querySelectorAll(
    "input[name='plafond_existing_bank_lain_dcl[]']"
  );
  var outstanding_bank_lain_dcl = document.querySelectorAll(
    "input[name='outstanding_bank_lain_dcl[]']"
  );
  var kolektibilitas_bank_lain_dcl = document.querySelectorAll(
    "input[name='kolektibilitas_bank_lain_dcl[]']"
  );

  document.querySelector('[name="fasilitasbanklaindcl"]').value = combineValues(
    fasilitas_bank_lain_dcl
  );
  document.querySelector('[name="bankljkbanklaindcl"]').value = combineValues(
    bank_ljk_bank_lain_dcl
  );
  document.querySelector('[name="jatuhtempobanklaindcl"]').value =
    combineValues(jatuh_tempo_bank_lain_dcl);
  document.querySelector('[name="plafondexistingbanklaindcl"]').value =
    combineValues(plafond_existing_bank_lain_dcl);
  document.querySelector('[name="outstandingbanklaindcl"]').value =
    combineValues(outstanding_bank_lain_dcl);
  document.querySelector('[name="kolektibilitasbanklaindcl"]').value =
    combineValues(kolektibilitas_bank_lain_dcl);
}

function add_dcl8() {
  var pengujian_lainnya_dcl = document.querySelectorAll(
    "input[name='pengujian_lainnya_dcl[]']"
  );
  var dasar_pengujian_lainnya_dcl = document.querySelectorAll(
    "input[name='dasar_pengujian_lainnya_dcl[]']"
  );
  var checklist_pengujian_lainnya_dcl = document.querySelectorAll(
    "select[name='checklist_pengujian_lainnya_dcl[]']"
  );
  // let selectElements = document.querySelectorAll(
  //   "select[name='checklist_pengujian_lainnya_dcl[]']"
  // );
  // let combinedSelectValues = combineSelectValues(selectElements);

  // console.log(combinedSelectValues);

  document.querySelector('[name="pengujianlainnyadcl"]').value = combineValues(
    pengujian_lainnya_dcl
  );
  document.querySelector('[name="dasarpengujianlainnyadcl"]').value =
    combineValues(dasar_pengujian_lainnya_dcl);
  document.querySelector('[name="checklistpengujianlainnyadcl"]').value =
    combineSelectValues(checklist_pengujian_lainnya_dcl);
}

function data_data_fak_data() {
  add_pp();
  add_termijn();
  var data_fak_data1 = {
    kd_data: $("#kd_data").val(),
    kegiatan_fak_data: $("#kegiatan_fak_data").val(),
    pekerjaan_fak_data: $("#pekerjaan_fak_data").val(),
    no_kontrak_fak_data: $("#no_kontrak_fak_data").val(),
    lokasi_fak_data: $("#lokasi_fak_data").val(),
    kontraktor_fak_data: $("#kontraktor_fak_data").val(),
    sumber_dana_fak_data: $("#sumber_dana_fak_data").val(),
    nilai_kontrak_setelah_ppn_fak_data: $(
      "#nilai_kontrak_setelah_ppn_fak_data"
    ).val(),
    ppn_fak_data: $("#ppn_fak_data").val(),
    pph_fak_data: $("#pph_fak_data").val(),
    no_kontrak2_fak_data: $("#no_kontrak2_fak_data").val(),
    tgl_kontrak_fak_data: $("#tgl_kontrak_fak_data").val(),
    tgl_pelaksanaan_fak_data: $("#tgl_pelaksanaan_fak_data").val(),
    lama_pelaksanaan_fak_data: $("#lama_pelaksanaan_fak_data").val(),
    lama_pemeliharaan_fak_data: $("#lama_pemeliharaan_fak_data").val(),
    tgl_pencairan_fak_data: $("#tgl_pencairan_fak_data").val(),
    persen_uang_muka_fak_data: $("#persen_uang_muka_fak_data").val(),
    bunga_kredit_fak_data: $("#bunga_kredit_fak_data").val(),
    profit_kontraktor_fak_data: $("#profit_kontraktor_fak_data").val(),
    biaya_pemeliharaan_fak_data: $("#biaya_pemeliharaan_fak_data").val(),
    biaya_provisi_fak_data: $("#biaya_provisi_fak_data").val(),
    item_pp_fak_data: $("#itemppfakdata").val(),
    ppn_pp_fak_data: $("#ppnppfakdata").val(),
    nilai_sebelum_ppn_pp_fak_data: $("#nilaisebelumppnppfakdata").val(),
    nilai_sesudah_ppn_pp_fak_data: $("#nilaisesudahppnppfakdata").val(),
    pembulatan_nilai_sebelum_ppn_total_pp_fak_data: $(
      "#pembulatan_nilai_sebelum_ppn_total_pp_fak_data"
    ).val(),
    pembulatan_nilai_sesudah_ppn_total_pp_fak_data: $(
      "#pembulatan_nilai_sesudah_ppn_total_pp_fak_data"
    ).val(),
    jumlah_nilai_sebelum_ppn_total_pp_fak_data: $(
      "#jumlah_nilai_sebelum_ppn_total_pp_fak_data"
    ).val(),
    jumlah_nilai_sesudah_ppn_total_pp_fak_data: $(
      "#jumlah_nilai_sesudah_ppn_total_pp_fak_data"
    ).val(),
    gaji_direktur_fak_data: $("#gaji_direktur_fak_data").val(),
    gaji_pengawas_fak_data: $("#gaji_pengawas_fak_data").val(),
    gaji_staf_fak_data: $("#gaji_staf_fak_data").val(),
    biaya_umum_fak_data: $("#biaya_umum_fak_data").val(),
    termijn_fak_data: $("#termijnfakdata").val(),
    progress_termijn_fak_data: $("#progresstermijnfakdata").val(),
    persentase_termijn_fak_data: $("#persentasetermijnfakdata").val(),
    prakiraan_tgl_termijn_fak_data: $("#prakiraantgltermijnfakdata").val(),
    setelah_masa_pemeliharaan_fak_data: $(
      "#setelah_masa_pemeliharaan_fak_data"
    ).val(),
    total_termijn_fak_data: $("#total_termijn_fak_data").val(),
    jumlah_termijn_fak_data: $("#jumlah_termijn_fak_data").val(),

    // upload dokumen
  };
  return data_fak_data1;
}

function post_fak_data(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_fak_data") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit FAK Data gagal", "Error");
    },
  });
}
function data_data_fak_modal() {
  add_pp_fak_modal();
  var data_fak_modal1 = {
    kd_data: $("#kd_data").val(),
    proyek_fak_modal: $("#proyek_fak_modal").val(),
    profit_fak_modal: $("#profit_fak_modal").val(),
    ppn_fak_modal: $("#ppn_fak_modal").val(),
    pemeliharaan_fak_modal: $("#pemeliharaan_fak_modal").val(),
    persentase_proyek_fak_modal: $("#persentase_proyek_fak_modal").val(),
    nilai_proyek_fak_modal: $("#nilai_proyek_fak_modal").val(),
    item_pp_fak_modal: $("#itemppfakmodal").val(),
    nilai_pp_fak_modal: $("#nilaippfakmodal").val(),
    koreksi_biaya_fak_modal: $("#koreksi_biaya_fak_modal").val(),
    jumlah_fak_modal: $("#jumlah_fak_modal").val(),
    gaji_direktur_fak_modal: $("#gaji_direktur_fak_modal").val(),
    gaji_pengawas_fak_modal: $("#gaji_pengawas_fak_modal").val(),
    gaji_staf_fak_modal: $("#gaji_staf_fak_modal").val(),
    biaya_umum_fak_modal: $("#biaya_umum_fak_modal").val(),
    total_biaya_umum_fak_modal: $("#total_biaya_umum_fak_modal").val(),
    jumlah_total_biaya_umum_fak_modal: $(
      "#jumlah_total_biaya_umum_fak_modal"
    ).val(),
    persentase_pekerjaan_fak_modal: $("#persentase_pekerjaan_fak_modal").val(),
    persiapan_pekerjaan_fak_modal: $("#persiapan_pekerjaan_fak_modal").val(),
    biaya_umum_adm_fak_modal: $("#biaya_umum_adm_fak_modal").val(),
    jumlah_kebutuhan_modal_kerja_fak_modal: $(
      "#jumlah_kebutuhan_modal_kerja_fak_modal"
    ).val(),
    penerimaan_uang_muka_fak_modal: $("#penerimaan_uang_muka_fak_modal").val(),
    jumlah_penerimaan_uang_muka_fak_modal: $(
      "#jumlah_penerimaan_uang_muka_fak_modal"
    ).val(),
    persentase_penerimaan_uang_muka_fak_modal: $(
      "#persentase_penerimaan_uang_muka_fak_modal"
    ).val(),
    pembiayaan_sendiri_fak_modal: $("#pembiayaan_sendiri_fak_modal").val(),
    jumlah_pembiayaan_sendiri_fak_modal: $(
      "#jumlah_pembiayaan_sendiri_fak_modal"
    ).val(),
    persentase_pembiayaan_sendiri_fak_modal: $(
      "#persentase_pembiayaan_sendiri_fak_modal"
    ).val(),
    kredit_bank_fak_modal: $("#kredit_bank_fak_modal").val(),
    jumlah_kredit_bank_fak_modal: $("#jumlah_kredit_bank_fak_modal").val(),
    persentase_kredit_bank_fak_modal: $(
      "#persentase_kredit_bank_fak_modal"
    ).val(),
    sumber_pembiayaan_fak_modal: $("#sumber_pembiayaan_fak_modal").val(),
    jumlah_bulat_sumber_pembiayaan_fak_modal: $(
      "#jumlah_bulat_sumber_pembiayaan_fak_modal"
    ).val(),
    persentase_jumlah_sumber_pembiayaan_fak_modal: $(
      "#persentase_jumlah_sumber_pembiayaan_fak_modal"
    ).val(),
    // upload dokumen
  };
  return data_fak_modal1;
}

function post_fak_modal(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_fak_modal") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit FAK Modal gagal", "Error");
    },
  });
}

function data_data_fak_rl() {
  var data_fak_rl1 = {
    kd_data: $("#kd_data").val(),
    nilai_kontrak_fak_rl: $("#nilai_kontrak_fak_rl").val(),
    pekerjaan_persiapan_konstruksi_fak_rl: $(
      "#pekerjaan_persiapan_konstruksi_fak_rl"
    ).val(),
    laba_kotor_fak_rl: $("#laba_kotor_fak_rl").val(),
    biaya_umum_adm_fak_rl: $("#biaya_umum_adm_fak_rl").val(),
    laba_usaha_fak_rl: $("#laba_usaha_fak_rl").val(),
    bunga_provisi_bank_fak_rl: $("#bunga_provisi_bank_fak_rl").val(),
    laba_sebelum_pajak_fak_rl: $("#laba_sebelum_pajak_fak_rl").val(),
    pajak_pph_ppn_fak_rl: $("#pajak_pph_ppn_fak_rl").val(),
    laba_bersih_fak_rl: $("#laba_bersih_fak_rl").val(),
    gross_profit_margin_fak_rl: $("#gross_profit_margin_fak_rl").val(),
    gross_operating_margin_fak_rl: $("#gross_operating_margin_fak_rl").val(),
    return_of_sale_fak_rl: $("#return_of_sale_fak_rl").val(),
    return_of_equity_fak_rl: $("#return_of_equity_fak_rl").val(),
    harga_borongan_fak_rl: $("#harga_borongan_fak_rl").val(),
    persentase_penerimaan_uang_muka_fak_rl: $(
      "#persentase_penerimaan_uang_muka_fak_rl"
    ).val(),
    penerimaan_uang_muka_fak_rl: $("#penerimaan_uang_muka_fak_rl").val(),
    persentase_penerimaan_termijn_fak_rl: $(
      "#persentase_penerimaan_termijn_fak_rl"
    ).val(),
    penerimaan_termijn_fak_rl: $("#penerimaan_termijn_fak_rl").val(),
    persentase_penerimaan_termijn_pemeliharaan_fak_rl: $(
      "#persentase_penerimaan_termijn_pemeliharaan_fak_rl"
    ).val(),
    penerimaan_termijn_pemeliharaan_fak_rl: $(
      "#penerimaan_termijn_pemeliharaan_fak_rl"
    ).val(),
    persentase_penerimaan_bersih_fak_rl: $(
      "#persentase_penerimaan_bersih_fak_rl"
    ).val(),
    penerimaan_bersih_fak_rl: $("#penerimaan_bersih_fak_rl").val(),
    pajak_ppn_pph_fak_rl: $("#pajak_ppn_pph_fak_rl").val(),
    kosong_bersih_fak_rl: $("#kosong_bersih_fak_rl").val(),
    kredit_bank_fak_rl: $("#kredit_bank_fak_rl").val(),
    persentase_pemotongan_kredit_bank_fak_rl: $(
      "#persentase_pemotongan_kredit_bank_fak_rl"
    ).val(),
    dibulatkan_fak_rl: $("#dibulatkan_fak_rl").val(),
    // upload dokumen
  };
  return data_fak_rl1;
}

function post_fak_rl(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_fak_rl") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit FAK RL gagal", "Error");
    },
  });
}

function data_data_lap_rl() {
  var formData = new FormData();
  formData.append("kd_data", $("#kd_data").val());
  formData.append(
    "laporan_rugi_laba_upload_lap_rl",
    $("#laporan_rugi_laba_upload_lap_rl")[0].files[0]
  );
  formData.append(
    "neraca_upload_lap_rl",
    $("#neraca_upload_lap_rl")[0].files[0]
  );
  formData.append(
    "depresiasi_upload_lap_rl",
    $("#depresiasi_upload_lap_rl")[0].files[0]
  );
  formData.append(
    "rasio_lap_keuangan_upload_lap_rl",
    $("#rasio_lap_keuangan_upload_lap_rl")[0].files[0]
  );
  return formData;
}

function post_lap_rl(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_lap_rl") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit FAK RL gagal", "Error");
    },
  });
}

function data_data_ceftb() {
  nilaicheckboxceft();
  hasilcheckboxceft();
  nilaicheckboxcefb();
  hasilcheckboxcefb();
  var data_ceftb1 = {
    kd_data: $("#kd_data").val(),
    nilaicheckboxceft: $("#nilaicheckboxceft").val(),
    hasilcheckboxceft: $("#hasilcheckboxceft").val(),
    hasiltotalCEFT: $("#hasiltotalCEFT").val(),
    nilaicheckboxcefb: $("#nilaicheckboxcefb").val(),
    hasilcheckboxcefb: $("#hasilcheckboxcefb").val(),
    hasiltotalCEFB: $("#hasiltotalCEFB").val(),

    // upload dokumen
  };
  return data_ceftb1;
}

function post_ceftb(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_ceftb") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit CEF Tanah Bangunan gagal", "Error");
    },
  });
}

// function data_data_faa() {
//   // var data_faa = {};
//   variabelGlobal(function (hasil) {
//     if (hasil.status === "success") {
//       var jenis_agunan = hasil.message.data_entry.jenis_agunan;

//       var jenisAgunanArray = jenis_agunan.split(";");

//       var adaBarangBergerak = jenisAgunanArray.includes("Barang Bergerak");
//       var adaTanahOrTanahBangunan = jenisAgunanArray.includes(
//         "Tanah/ Tanah dan Bangunan"
//       );

//       if (adaBarangBergerak) {
//         add_faa_bb();
//       }

//       if (adaTanahOrTanahBangunan) {
//         add_faa_tb();
//       }
//       data_faa = {
//         nama_nasabah_bb: $("#namanasabahbb").val(),
//         jenis_dokumen_bb: $("#jenisdokumenbb").val(),
//         alamat_bb: $("#alamatbb").val(),
//         jenis_bb: $("#jenisbb").val(),
//         model_tipe_bb: $("#modeltipebb").val(),
//         merek_cc_bb: $("#merekccbb").val(),
//         tahun_pembuatan_bb: $("#tahunpembuatanbb").val(),
//         serial_number_bb: $("#serialnumberbb").val(),
//         nomor_mesin_bb: $("#nomormesinbb").val(),
//         warna_bb: $("#warnabb").val(),
//         bahan_bakar_bb: $("#bahanbakarbb").val(),
//         kondisi_keadaan_bb: $("#kondisikeadaanbb").val(),
//         nomor_polisi_bb: $("#nomorpolisibb").val(),
//         bukti_kepemilikan_agb_bb: $("#buktikepemilikanagbbb").val(),
//         invoice_no_bb: $("#invoicenobb").val(),
//         invoice_tanggal_bb: $("#invoicetanggalbb").val(),
//         perubahan_hak_terakhir_bb: $("#perubahanhakterakhirbb").val(),
//         tercatat_atas_nama_bb: $("#tercatatatasnamabb").val(),
//         alamat_pemilik_saat_ini_bb: $("#alamatpemiliksaatinibb").val(),
//         umur_teknis_bb: $("#umurteknisbb").val(),
//         perkiraan_umur_ekonomis_bb: $("#perkiraanumurekonomisbb").val(),
//         tempat_penyimpanan_bb: $("#tempatpenyimpananbb").val(),
//         route_bb: $("#routebb").val(),
//         jarak_rata_rata_tempuh_bb: $("#jarakrataratatempuhbb").val(),
//         // Menyimpan data yang ada sebelumnya
//         nama_nasabah_faa_tb: $("#namanasabahfaatb").val(),
//         nomor_shm_faa_tb: $("#nomorshmfaatb").val(),
//         tanggal_shm_faa_tb: $("#tanggalshmfaatb").val(),
//         nama_pemilik_shm_faa_tb: $("#namapemilikshmfaatb").val(),
//         alamat_agunan_faa_tb: $("#alamatagunanfaatb").val(),
//         harga_pasar_tanah_faa_tb: $("#hargapasartanahfaatb").val(),
//         harga_buku_tanah_faa_tb: $("#hargabukutanahfaatb").val(),
//         harga_menurut_pejabat_bank_tanah_faa_tb: $(
//           "#hargamenurutpejabatbanktanahfaatb"
//         ).val(),
//         harga_tanah_tanah_faa_tb: $("#hargatanahtanahfaatb").val(),
//         luas_persegi_tanah_tanah_faa_tb: $("#luaspersegitanahtanahfaatb").val(),
//         hasil_perhitungan_penilaian_tanah_faa_tb: $(
//           "#hasilperhitunganpenilaiantanahfaatb"
//         ).val(),
//       };
//       console.log(data_faa);
//       return data_faa;
//     }
//   });
// }
function data_data_faa() {
  return new Promise((resolve, reject) => {
    variabelGlobal(function (hasil) {
      if (hasil.status === "success") {
        var jenis_agunan = hasil.message.data_entry.jenis_agunan;

        var jenisAgunanArray = jenis_agunan.split(";");

        var adaBarangBergerak = jenisAgunanArray.includes("Barang Bergerak");
        var adaTanahOrTanahBangunan = jenisAgunanArray.includes(
          "Tanah/ Tanah dan Bangunan"
        );

        if (adaBarangBergerak) {
          add_faa_bb();
        }

        if (adaTanahOrTanahBangunan) {
          add_faa_tb();
        }

        // Mengisi `data_faa` setelah data tersedia
        const data_faa = {
          kd_data_tambah: $("#kd_data_tambah").val(),
          nama_nasabah_bb: $("#namanasabahbb").val(),
          jenis_dokumen_bb: $("#jenisdokumenbb").val(),
          alamat_bb: $("#alamatbb").val(),
          jenis_bb: $("#jenisbb").val(),
          model_tipe_bb: $("#modeltipebb").val(),
          merek_cc_bb: $("#merekccbb").val(),
          tahun_pembuatan_bb: $("#tahunpembuatanbb").val(),
          serial_number_bb: $("#serialnumberbb").val(),
          nomor_mesin_bb: $("#nomormesinbb").val(),
          warna_bb: $("#warnabb").val(),
          bahan_bakar_bb: $("#bahanbakarbb").val(),
          kondisi_keadaan_bb: $("#kondisikeadaanbb").val(),
          nomor_polisi_bb: $("#nomorpolisibb").val(),
          bukti_kepemilikan_agb_bb: $("#buktikepemilikanagbbb").val(),
          invoice_no_bb: $("#invoicenobb").val(),
          invoice_tanggal_bb: $("#invoicetanggalbb").val(),
          perubahan_hak_terakhir_bb: $("#perubahanhakterakhirbb").val(),
          tercatat_atas_nama_bb: $("#tercatatatasnamabb").val(),
          alamat_pemilik_saat_ini_bb: $("#alamatpemiliksaatinibb").val(),
          umur_teknis_bb: $("#umurteknisbb").val(),
          perkiraan_umur_ekonomis_bb: $("#perkiraanumurekonomisbb").val(),
          tempat_penyimpanan_bb: $("#tempatpenyimpananbb").val(),
          route_bb: $("#routebb").val(),
          jarak_rata_rata_tempuh_bb: $("#jarakrataratatempuhbb").val(),
          nama_nasabah_faa_tb: $("#namanasabahfaatb").val(),
          nomor_shm_faa_tb: $("#nomorshmfaatb").val(),
          tanggal_shm_faa_tb: $("#tanggalshmfaatb").val(),
          nama_pemilik_shm_faa_tb: $("#namapemilikshmfaatb").val(),
          alamat_agunan_faa_tb: $("#alamatagunanfaatb").val(),
          harga_pasar_tanah_faa_tb: $("#hargapasartanahfaatb").val(),
          harga_buku_tanah_faa_tb: $("#hargabukutanahfaatb").val(),
          harga_menurut_pejabat_bank_tanah_faa_tb: $(
            "#hargamenurutpejabatbanktanahfaatb"
          ).val(),
          harga_tanah_tanah_faa_tb: $("#hargatanahtanahfaatb").val(),
          luas_persegi_tanah_tanah_faa_tb: $(
            "#luaspersegitanahtanahfaatb"
          ).val(),
          hasil_perhitungan_penilaian_tanah_faa_tb: $(
            "#hasilperhitunganpenilaiantanahfaatb"
          ).val(),
        };

        console.log(data_faa); // Log untuk verifikasi data

        resolve(data_faa); // Kirim `data_faa` sebagai hasil
      } else {
        reject("Gagal mendapatkan data FAA");
      }
    });
  });
}

function post_faa(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_faa") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit FAA gagal", "Error");
    },
  });
}

function data_data_mauk() {
  add_kesimpulan_mauk();
  add_kesimpulan_pal_mauk();
  add_agunan_mauk();
  var data_mauk1 = {
    kd_data: $("#kd_data").val(),
    nama_nasabah_mauk: $("#nama_nasabah_mauk").val(),
    npwp_mauk: $("#npwp_mauk").val(),
    direktur_mauk: $("#direktur_mauk").val(),
    key_person_mauk: $("#key_person_mauk").val(),
    alamat_kantor_mauk: $("#alamat_kantor_mauk").val(),
    klasifikasi_mauk: $("#klasifikasi_mauk").val(),
    bidang_usaha_mauk: $("#bidang_usaha_mauk").val(),
    jenis_fasilitas_mauk: $("#jenis_fasilitas_mauk").val(),
    bentuk_fasilitas_mauk: $("#bentuk_fasilitas_mauk").val(),
    maksimum_fasilitas_mauk: $("#maksimum_fasilitas_mauk").val(),
    plafond_fasilitas_mauk: $("#plafond_fasilitas_mauk").val(),
    jangka_waktu_mauk: $("#jangka_waktu_mauk").val(),
    tujuan_penggunaan_mauk: $("#tujuan_penggunaan_mauk").val(),
    pemilik_perseroan_mauk: CKEDITOR.instances.pemilik_perseroan_mauk.getData(),
    pemilikan_saham_permodalan_mauk:
      CKEDITOR.instances.pemilikan_saham_permodalan_mauk.getData(),
    kewenangan_direksi_mauk:
      CKEDITOR.instances.kewenangan_direksi_mauk.getData(),
    informasi_riwayat_perbankan_mauk:
      CKEDITOR.instances.informasi_riwayat_perbankan_mauk.getData(),
    legalitas_pendirian_usaha_mauk:
      CKEDITOR.instances.legalitas_pendirian_usaha_mauk.getData(),
    legalitas_perizinan_usaha_mauk:
      CKEDITOR.instances.legalitas_perizinan_usaha_mauk.getData(),
    legalitas_pelaksanaan_proyek_mauk:
      CKEDITOR.instances.legalitas_pelaksanaan_proyek_mauk.getData(),
    legalitas_personal_pemohon_pemilik_agunan_mauk:
      CKEDITOR.instances.legalitas_personal_pemohon_pemilik_agunan_mauk.getData(),
    kesimpulan_analisa_aspek_legalitas_mauk:
      CKEDITOR.instances.kesimpulan_analisa_aspek_legalitas_mauk.getData(),
    analisa_aspek_manajemen_mauk:
      CKEDITOR.instances.analisa_aspek_manajemen_mauk.getData(),
    analisa_aspek_teknis_mauk:
      CKEDITOR.instances.analisa_aspek_teknis_mauk.getData(),
    analisa_aspek_pemasaran_mauk:
      CKEDITOR.instances.analisa_aspek_pemasaran_mauk.getData(),
    analisa_aspek_keuangan_mauk:
      CKEDITOR.instances.analisa_aspek_keuangan_mauk.getData(),
    perhitungan_kebutuhan_kredit_mauk:
      CKEDITOR.instances.perhitungan_kebutuhan_kredit_mauk.getData(),
    kesimpulan_jaminan_agunan_mauk:
      CKEDITOR.instances.kesimpulan_jaminan_agunan_mauk.getData(),
    jenis_kredit_fasilitas_usul_mauk: $("#jeniskreditfasilitasusulmauk").val(),
    max_kredit_ini_usul_mauk: $("#maxkreditiniusulmauk").val(),
    perubahan_usul_mauk: $("#perubahanusulmauk").val(),
    max_kredit_usul_mauk: $("#maxkreditusulmauk").val(),
    jenis_kredit_fasilitas_pal_mauk: $("#jeniskreditfasilitaspalmauk").val(),
    max_kredit_ini_pal_mauk: $("#maxkreditinipalmauk").val(),
    perubahan_pal_mauk: $("#perubahanpalmauk").val(),
    max_kredit_pal_mauk: $("#maxkreditpalmauk").val(),
    jenis_macam_fasilitas_mauk: $("#jenis_macam_fasilitas_mauk").val(),
    maksimum_kredit_mauk: $("#maksimum_kredit_mauk").val(),
    plafond_kredit_mauk: $("#plafond_kredit_mauk").val(),
    kriteria_usaha_mauk: $("#kriteria_usaha_mauk").val(),
    pendanaan_sendiri_mauk: $("#pendanaan_sendiri_mauk").val(),
    kesimpulan_tujuan_penggunaan_mauk: $(
      "#kesimpulan_tujuan_penggunaan_mauk"
    ).val(),
    kesimpulan_jangka_waktu_mauk: $("#kesimpulan_jangka_waktu_mauk").val(),
    cara_penarikan_mauk: $("#cara_penarikan_mauk").val(),
    pelunasan_angsuran_mauk: $("#pelunasan_angsuran_mauk").val(),
    bunga_mauk: $("#bunga_mauk").val(),
    provisi_fee_mauk: $("#provisi_fee_mauk").val(),
    hitung_provisi_fee_mauk: $("#hitung_provisi_fee_mauk").val(),
    akad_kredit_mauk: $("#akad_kredit_mauk").val(),
    agunan_mauk: $("#agunanmauk").val(),
    macam_jenis_mauk: $("#macamjenismauk").val(),
    nilai_agunan_mauk: $("#nilaiagunanmauk").val(),
    bentuk_pengikatan_mauk: $("#bentukpengikatanmauk").val(),
    dokumentasi_kredit_mauk:
      CKEDITOR.instances.dokumentasi_kredit_mauk.getData(),
    pengikatan_agunan_mauk: CKEDITOR.instances.pengikatan_agunan_mauk.getData(),
    asuransi_kredit_mauk: CKEDITOR.instances.asuransi_kredit_mauk.getData(),
    asuransi_agunan_mauk: CKEDITOR.instances.asuransi_agunan_mauk.getData(),
    syarat_ttd_pk_mauk: CKEDITOR.instances.syarat_ttd_pk_mauk.getData(),
    syarat_realisasi_penarikan_mauk:
      CKEDITOR.instances.syarat_realisasi_penarikan_mauk.getData(),
    affirmatives_mauk: CKEDITOR.instances.affirmatives_mauk.getData(),
    negatives_mauk: CKEDITOR.instances.negatives_mauk.getData(),
    syarat_lain_mauk: CKEDITOR.instances.syarat_lain_mauk.getData(),

    // upload dokumen
  };
  return data_mauk1;
}

function post_mauk(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_mauk") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit MAUK gagal", "Error");
    },
  });
}
function data_data_dcl() {
  add_dcl1();
  add_dcl2();
  add_dcl3();
  add_dcl4();
  add_dcl5();
  add_dcl6();
  add_dcl7();
  add_dcl8();
  var data_dcl1 = {
    kd_data: $("#kd_data").val(),

    pengelola_dcl: $("#pengelola_dcl").val(),
    tanggal_dcl: $("#tanggal_dcl").val(),
    tanggal_berkas_dcl: $("#tanggal_berkas_dcl").val(),
    nama_pemohon_dcl: $("#nama_pemohon_dcl").val(),
    jenis_usaha_dcl: $("#jenis_usaha_dcl").val(),
    nama_perusahaan_pemohon_dcl: $("#nama_perusahaan_pemohon_dcl").val(),
    nama_pemilik_perusahaan_dcl: $("#namapemilikperusahaandcl").val(),
    persentase_saham_dcl: $("#persentasesahamdcl").val(),
    jabatan_pengurus_perusahaan_dcl: $("#jabatanpengurusperusahaandcl").val(),
    nama_pengurus_perusahaan_dcl: $("#namapengurusperusahaandcl").val(),
    ktp_dcl: $("#ktpdcl").val(),
    jenis_usaha_perusahaan_dcl: $("#jenis_usaha_perusahaan_dcl").val(),

    fasilitas_kredit_dcl: $("#fasilitaskreditdcl").val(),
    plafond_dcl: $("#plafonddcl").val(),
    jangka_waktu_dcl: $("#jangkawaktudcl").val(),
    tujuan_penggunaan_dcl: $("#tujuanpenggunaandcl").val(),
    permohonan_diterima_dcl: $("#permohonanditerimadcl").val(),
    bukti_kepemilikan_dcl: $("#buktikepemilikandcl").val(),
    jenis_agunan_dcl: $("#jenisagunandcl").val(),
    tanggal_agunan_dcl: $("#tanggalagunandcl").val(),
    max_kredit_pal_mauk: $("#maxkreditpalmauk").val(),
    avalist_dcl: $("#avalistdcl").val(),
    nominal_dcl: $("#nominaldcl").val(),
    fasilitas_dcl: $("#fasilitasdcl").val(),
    jatuh_tempo_dcl: $("#jatuhtempodcl").val(),
    plafond_existing_dcl: $("#plafondexistingdcl").val(),
    outstanding_dcl: $("#outstandingdcl").val(),
    kolektibilitas_dcl: $("#kolektibilitasdcl").val(),
    fasilitas_kredit_grup_dcl: $("#fasilitaskreditgrupdcl").val(),
    nama_debitur_kredit_grup_dcl: $("#namadebiturkreditgrupdcl").val(),
    jatuh_tempo_kredit_grup_dcl: $("#jatuhtempokreditgrupdcl").val(),
    plafond_existing_kredit_grup_dcl: $("#plafondexistingkreditgrupdcl").val(),
    outstanding_kredit_grup_dcl: $("#outstandingkreditgrupdcl").val(),
    kolektibilitas_kredit_grup_dcl: $("#kolektibilitaskreditgrupdcl").val(),
    fasilitas_bank_lain_dcl: $("#fasilitasbanklaindcl").val(),
    bank_ljk_bank_lain_dcl: $("#bankljkbanklaindcl").val(),
    jatuh_tempo_bank_lain_dcl: $("#jatuhtempobanklaindcl").val(),
    plafond_existing_bank_lain_dcl: $("#plafondexistingbanklaindcl").val(),
    outstanding_bank_lain_dcl: $("#outstandingbanklaindcl").val(),
    kolektibilitas_bank_lain_dcl: $("#kolektibilitasbanklaindcl").val(),
    pengujian_ojk_dcl1: $("#pengujian_ojk_dcl1").val(),
    dasar_pengujian_ojk_dcl1: $("#dasar_pengujian_ojk_dcl1").val(),
    checklist_pengujian_ojk_dcl1: $("#checklist_pengujian_ojk_dcl1").val(),
    pengujian_ojk_dcl2: $("#pengujian_ojk_dcl2").val(),
    dasar_pengujian_ojk_dcl2: $("#dasar_pengujian_ojk_dcl2").val(),
    checklist_pengujian_ojk_dcl2: $("#checklist_pengujian_ojk_dcl2").val(),
    pengujian_ojk_dcl3: $("#pengujian_ojk_dcl3").val(),
    dasar_pengujian_ojk_dcl3: $("#dasar_pengujian_ojk_dcl3").val(),
    checklist_pengujian_ojk_dcl3: $("#checklist_pengujian_ojk_dcl3").val(),
    pengujian_internal_dcl1: $("#pengujian_internal_dcl1").val(),
    dasar_pengujian_internal_dcl1: $("#dasar_pengujian_internal_dcl1").val(),
    checklist_pengujian_internal_dcl1: $(
      "#checklist_pengujian_internal_dcl1"
    ).val(),
    pengujian_internal_dcl2: $("#pengujian_internal_dcl2").val(),
    dasar_pengujian_internal_dcl2: $("#dasar_pengujian_internal_dcl2").val(),
    checklist_pengujian_internal_dcl2: $(
      "#checklist_pengujian_internal_dcl2"
    ).val(),
    pengujian_internal_dcl3: $("#pengujian_internal_dcl3").val(),
    dasar_pengujian_internal_dcl3: $("#dasar_pengujian_internal_dcl3").val(),
    checklist_pengujian_internal_dcl3: $(
      "#checklist_pengujian_internal_dcl3"
    ).val(),
    pengujian_internal_dcl4: $("#pengujian_internal_dcl4").val(),
    dasar_pengujian_internal_dcl4: $("#dasar_pengujian_internal_dcl4").val(),
    checklist_pengujian_internal_dcl4: $(
      "#checklist_pengujian_internal_dcl4"
    ).val(),
    pengujian_internal_dcl5: $("#pengujian_internal_dcl5").val(),
    dasar_pengujian_internal_dcl5: $("#dasar_pengujian_internal_dcl5").val(),
    checklist_pengujian_internal_dcl5: $(
      "#checklist_pengujian_internal_dcl5"
    ).val(),
    pengujian_internal_dcl6: $("#pengujian_internal_dcl6").val(),
    dasar_pengujian_internal_dcl6: $("#dasar_pengujian_internal_dcl6").val(),
    checklist_pengujian_internal_dcl6: $(
      "#checklist_pengujian_internal_dcl6"
    ).val(),
    pengujian_lainnya_dcl: $("#pengujianlainnyadcl").val(),
    dasar_pengujian_lainnya_dcl: $("#dasarpengujianlainnyadcl").val(),
    checklist_pengujian_lainnya_dcl: $("#checklistpengujianlainnyadcl").val(),
    kesimpulan_dcl: $("#kesimpulan_dcl").val(),
    komentar_dcl: $("#komentar_dcl").val(),

    // upload dokumen
  };
  return data_dcl1;
}

function post_dcl(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        // $("#mohon").hide();
        // refresh_fak_data();
        if (button == "save_dcl") {
          toastr.success(response.message, "Berhasil");
        }
      } else {
        // $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      // $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit DCL Compliance gagal", "Error");
    },
  });
}

function post_scoring_koor(method, data_input, button) {
  $.ajax({
    url: base_url + "pengajuan/" + method,
    type: "POST",
    dataType: "json",
    data: data_input,
    success: function (response) {
      if (response.status == "success") {
        $("#mohon").hide();
        refresh_scoring();
        if (button == "edit_scoring_koor") {
          toastr.success(response.message, "Berhasil");
        }
        if (button != "edit_scoring_koor") {
          var hasil_recap2 = data_recap();
          post_recap("edit_recap", hasil_recap2, "finish_recap");
        }
      } else {
        $("#mohon").hide();
        toastr.warning(response.message, "Gagal");
      }
    },
    error: function (xhr, status, error) {
      $("#mohon").hide();
      console.log(xhr.responseText);
      toastr.error("Edit scoring gagal", "Error");
    },
  });
}

function data_data_scoring_koor() {
  var data_scoring_koor = {
    kd_data_tambah: $("#kd_data_tambah").val(),

    nama_pemohon_sc: $("#nama_pemohon_sc_koor").val(),
    alamat_sc: $("#alamat_sc_koor").val(),
    plafond_sc: $("#plafond_sc_koor").val(),
    tujuan_sc: $("#tujuan_sc_koor").val(),
    no_pak_sc: $("#no_pak_sc_koor").val(),

    pendirian_sc_koor: $("#pendirian_sc_koor").val(),
    legalitas_sc_koor: $("#legalitas_sc_koor").val(),
    hubungan_sc_koor: $("#hubungan_sc_koor").val(),
    pengelolaan_sc_koor: $("#pengelolaan_sc_koor").val(),
    jenis_agunan_sc_koor: $("#jenis_agunan_sc_koor").val(),
    bukti_sc_koor: $("#bukti_sc_koor").val(),
    status_sc_koor: $("#status_sc_koor").val(),
    marketable_sc_koor: $("#marketable_sc_koor").val(),
    lending_sc_koor: $("#lending_sc_koor").val(),
    pengalaman_sc_koor: $("#pengalaman_sc_koor").val(),
    sumber_dana_sc_koor: $("#sumber_dana_sc_koor").val(),
    lokasi_sc_koor: $("#lokasi_sc_koor").val(),
    jenis_proyek_sc_koor: $("#jenis_proyek_sc_koor").val(),
    bahan_baku_sc_koor: $("#bahan_baku_sc_koor").val(),
    peralatan_sc_koor: $("#peralatan_sc_koor").val(),
    pembayaran_sc_koor: $("#pembayaran_sc_koor").val(),
    dasar_penunjukan_sc_koor: $("#dasar_penunjukan_sc_koor").val(),
    prosentase_sc_koor: $("#prosentase_sc_koor").val(),
    jangka_sc_koor: $("#jangka_sc_koor").val(),
    agunan_sc_koor: $("#agunan_sc_koor").val(),
    penjaminan_sc_koor: $("#penjaminan_sc_koor").val(),

    // upload dokumen
  };
  return data_scoring_koor;
}

function click_save_data_fak_data() {
  var data_fak_data2 = data_data_fak_data();
  // Mengirim data menggunakan AJAX
  post_fak_data("edit_fak_data", data_fak_data2, "save_fak_data");
}
function click_save_data_fak_modal() {
  var data_fak_modal2 = data_data_fak_modal();
  // Mengirim data menggunakan AJAX
  post_fak_modal("edit_fak_modal", data_fak_modal2, "save_fak_modal");
}
function click_save_data_fak_rl() {
  var data_fak_rl2 = data_data_fak_rl();
  // Mengirim data menggunakan AJAX
  post_fak_rl("edit_fak_rl", data_fak_rl2, "save_fak_rl");
}

function click_save_data_lap_rl() {
  var data_lap_rl2 = data_data_lap_rl();
  // Mengirim data menggunakan AJAX
  post_lap_rl("edit_lap_rl", data_lap_rl2, "save_lap_rl");
}
function click_save_data_ceftb() {
  // data_data_ceftb();
  var data_ceftb2 = data_data_ceftb();
  // Mengirim data menggunakan AJAX
  post_ceftb("edit_ceftb", data_ceftb2, "save_ceftb");
}
// function click_save_data_faa() {
//   // data_data_faa();
//   var data_faa2 = data_data_faa();
//   // Mengirim data menggunakan AJAX
//   post_faa("edit_faa", data_faa2, "save_faa");
// }
function click_save_data_faa() {
  data_data_faa()
    .then((data_faa2) => {
      // Mengirim data menggunakan AJAX setelah data tersedia
      post_faa("edit_faa", data_faa2, "save_faa");
    })
    .catch((error) => {
      console.error(error); // Log jika ada kesalahan
      toastr.error("Gagal mendapatkan data FAA", "Error");
    });
}

function click_save_data_mauk() {
  // data_data_mauk();
  var data_mauk2 = data_data_mauk();
  // Mengirim data menggunakan AJAX
  post_mauk("edit_mauk", data_mauk2, "save_mauk");
}
function click_save_data_dcl() {
  // data_data_dcl();
  var data_dcl2 = data_data_dcl();
  // Mengirim data menggunakan AJAX
  post_dcl("edit_dcl", data_dcl2, "save_dcl");
}
function click_save_data_scoring_koor() {
  // data_data_scoring_koor();
  var data_scoring_koor2 = data_data_scoring_koor();
  // Mengirim data menggunakan AJAX
  post_scoring_koor(
    "edit_scoring_koor",
    data_scoring_koor2,
    "save_scoring_koor"
  );
}

function seeDokumen(param) {
  // Ambil nilai kd_data dari $data_entry
  var id_input = CryptoJS.SHA1(param);
  // alert(id_input)
  var kd_data = "<?php echo sha1($data_entry->kd_data) ?>";

  // Bangun URL dengan base_url dan kd_data
  var url =
    "<?php echo base_url() ?>dokumen-pendukung/" + kd_data + "/" + id_input;

  // Buka tautan dalam tab baru
  window.open(url, "_blank");
}

function checkRecap(tabel, kd_data, id_kolom) {
  $.ajax({
    url: base_url + "recap/" + tabel,
    type: "POST",
    data: {
      kd_data: kd_data,
    },
    success: function (response) {
      if (response.status === "Oke") {
        $("#" + id_kolom + "1").show(); // Tampilkan Oke
        $("#" + id_kolom + "2").hide(); // Sembunyikan Not Oke
      } else {
        $("#" + id_kolom + "1").hide(); // Sembunyikan Oke
        $("#" + id_kolom + "2").show(); // Tampilkan Not Oke
      }
    },
    error: function () {
      alert("Terjadi kesalahan saat mengambil data.");
    },
  });
}

function hitungSemua() {
  // getFCR();
  hitungPP();
  hitungPersentase();
  hitungPPFAKM();
  hitungTotal();
  hitungJumlahKebutuhanModalKerja();
  hitungKreditBank();
  hitungKreditBank2();
  hitungLabaKotor();
  hitungLabaUsaha();
  hitungLabaSebelumPajak();
  hitungPajakPPNPPh();
  hitungLabaBersih();
  hitungPenerimaanTermijn();
  hitungPenerimaanTermijnPemeliharaan();
  hitungPenerimaanBersih();
  hitungPajakRL();
  hitungPersentasePemotonganKreditBank();
}

function separatorNominal(id) {
  $("#" + id).on("input", function () {
    var hargaVal = parseInt($(this).val());
    if (isNaN(hargaVal)) {
      hargaVal = 0;
    }
    var formattedHarga = hargaVal.toLocaleString("id-ID", {
      style: "currency",
      currency: "IDR",
    });
    $("#harga_besaran" + id).text("Besaran " + formattedHarga);
  });
}

$(document).ready(function () {
  isi_fak_data();
  isi_fak_modal();
  isi_fak_rl();
  isi_upload_lap_rl();
  ceftb();
  isi_ceftb();
  isi_mauk();
  isi_dcl();
  isi_scoring_koor();
  faa_bb();
  unit_kerja_dcl();
  // hitungSemua();

  $(".lihat-dokumen").on("click", function () {
    var data_id = $(this).data("id");
    seeDokumen(data_id);
    // Lakukan sesuatu dengan nilai data-id yang telah diambil
    // console.log('Nilai data-id:', data_id);
  });

  $("body").on("click", ".tambah-field-pp", function () {
    if (jumlahisipp == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      $(".add-form-pp").after("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-pp").html();
      $(".add-form-pp").after(html1);
      var html11 =
        '<div class="col-lg-3">' +
        '<label class="col-lg-6 control-label">Item</label>' +
        '<div class="col-lg-12">' +
        '<input id="item_pp_fak_data' +
        angka +
        '" name="item_pp_fak_data[]" onkeyup="copyvalue(this.id, \'item_pp_fak_modal' +
        angka +
        '\')" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-1">' +
        '<label class="col-lg-6 control-label">PPN</label>' +
        '<div class="col-lg-24">' +
        '<div class="input-group">' +
        '<input id="ppn_pp_fak_data' +
        angka +
        '" name="ppn_pp_fak_data[]" onkeyup="hitungPP(' +
        angka +
        ')" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        '<div class="input-group-append">' +
        '<span class="input-group-text">%</span>' +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-12 control-label">Nilai Sebelum PPN</label>' +
        '<div class="col-lg-12">' +
        '<input id="nilai_sebelum_ppn_pp_fak_data' +
        angka +
        '" name="nilai_sebelum_ppn_pp_fak_data[]" onkeyup="hitungPP(' +
        angka +
        ')" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-12 control-label">Nilai Sesudah PPN</label>' +
        '<div class="col-lg-12">' +
        '<input id="nilai_sesudah_ppn_pp_fak_data' +
        angka +
        '" name="nilai_sesudah_ppn_pp_fak_data[]" type="text" placeholder="" onchange="copyvalue(this.id, \'nilai_pp_fak_modal' +
        angka +
        '\')" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-pp-fak-data").first().after(html11);
      var html2 = $(".copy-pp-fak-modal").html();
      $(".add-form-pp-fak-modal").after(html2);
      var html12 =
        '<div class="col-lg-6">' +
        '<label class="col-lg-24 control-label">Item</label>' +
        '<div class="col-lg-24">' +
        '<input id="item_pp_fak_modal' +
        angka +
        '" name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-6">' +
        '<label class="col-lg-24 control-label">Nilai</label>' +
        '<div class="col-lg-24">' +
        '<input id="nilai_pp_fak_modal' +
        angka +
        '" name="nilai_pp_fak_modal[]" onkeyup="hitungPPFAKM()" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-pp-fak-modal").first().after(html12);
      var ppnFakDataValue = $("#ppn_fak_data").val();
      // console.log(ppnFakDataValue);
      $("#ppn_pp_fak_data" + angka).val(ppnFakDataValue);
      hitungPP(angka);
      angka++;
      jumlahisipp++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_pp_fak_data", function () {
    $(this).parents("#new").remove();
    jumlahisipp--;
    resizeJquerySteps();
  });

  $("body").on("click", ".tambah-field-termijn", function () {
    if (jumlahisitermijn == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-termijn").html();
      $(".add-form-termijn-fak-data").after(html1);
      var html11 =
        '<div class="col-lg-3">' +
        '<label class="col-lg-6 control-label">Termijn</label>' +
        // '<div class="col-lg-12">' +
        '<input id="termijn_fak_data' +
        angkatermijninput +
        '" name="termijn_fak_data[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        // "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<label class="col-lg-6 control-label">Progress</label>' +
        '<div class="col-lg-12">' +
        '<input id="progress_termijn_fak_data' +
        angkatermijninput +
        '" name="progress_termijn_fak_data[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<label class="col-lg-18 center control-label">Persentase Termijn</label>' +
        '<div class="col-lg-12">' +
        '<input id="persentase_termijn_fak_data" name="persentase_termijn_fak_data[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-1">' +
        ' <a class="btn btn-success btn-rounded m-t-n-xs" style="margin-top:30px" onclick="hitungPrakiraanTanggalTermijn(' +
        angkatermijninput +
        ')"><span>Hitung</span></a>' +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-12 control-label">Prakiraan Tanggal Termijn</label>' +
        '<div class="col-lg-12">' +
        '<input id="prakiraan_tgl_termijn_fak_data' +
        angkatermijninput +
        '" name="prakiraan_tgl_termijn_fak_data[]" type="date" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-termijn-fak-data").first().after(html11);

      $("body").on(
        "input",
        "input[name='persentase_termijn_fak_data[]']",
        function () {
          // const input = parseFloat($("#setelah_masa_pemeliharaan_fak_data").val()) || 0;
          const inputs = $("input[name='persentase_termijn_fak_data[]']");
          let total = 0;
          inputs.each(function () {
            const nilai = parseFloat($(this).val()) || 0;
            total += nilai;
          });
          const total_termijn = 100;
          const fix = (total_termijn - total).toFixed(2);
          $("#total_termijn_fak_data").val(total_termijn);
          $("#setelah_masa_pemeliharaan_fak_data").val(fix);
          $("#pemeliharaan_fak_modal").val(fix);
        }
      );

      angkatermijn++;
      angkatermijninput++;

      $("#jumlah_termijn_fak_data").val(angkatermijn);
      jumlahisitermijn++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_termijn_fak_data", function () {
    $(this).parents("#new").remove();
    jumlahisitermijn--;
    angkatermijn--;
    angkatermijninput--;
    $("#jumlah_termijn_fak_data").val(angkatermijn);
    resizeJquerySteps();
  });

  //MAUK
  $("body").on("click", ".tambah-field-mauk", function () {
    if (jumlahisimauk == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-mauk").html();
      $(".add-form-mauk").after(html1);
      var html11 =
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="jenis_kredit_fasilitas_usul_mauk' +
        angkamauk +
        '" name="jenis_kredit_fasilitas_usul_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="max_kredit_ini_usul_mauk' +
        angkamauk +
        '" name="max_kredit_ini_usul_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="perubahan_usul_mauk' +
        angkamauk +
        '" name="perubahan_usul_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="max_kredit_usul_mauk' +
        angkamauk +
        '" name="max_kredit_usul_mauk[]"  type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-mauk").first().after(html11);
      angkamauk++;
      jumlahisimauk++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_mauk", function () {
    $(this).parents("#new").remove();
    angkamauk--;
    jumlahisimauk--;
    resizeJquerySteps();
  });

  $("body").on("click", ".tambah-field-mauk2", function () {
    if (jumlahisimauk2 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-mauk2").html();
      $(".add-form-mauk2").after(html1);
      var html11 =
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="jenis_kredit_fasilitas_pal_mauk' +
        angkamauk2 +
        '" name="jenis_kredit_fasilitas_pal_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="max_kredit_ini_pal_mauk' +
        angkamauk2 +
        '" name="max_kredit_ini_pal_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="perubahan_pal_mauk' +
        angkamauk2 +
        '" name="perubahan_pal_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="max_kredit_pal_mauk' +
        angkamauk2 +
        '" name="max_kredit_pal_mauk[]"  type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-mauk2").first().after(html11);
      angkamauk2++;
      jumlahisimauk2++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_mauk2", function () {
    $(this).parents("#new").remove();
    angkamauk2--;
    jumlahisimauk2--;
    resizeJquerySteps();
  });

  $("body").on("click", ".tambah-field-mauk3", function () {
    if (jumlahisimauk3 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-mauk3").html();
      $(".add-form-mauk3").after(html1);
      var html11 =
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="agunan_mauk' +
        angkamauk3 +
        '" name="agunan_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="macam_jenis_mauk' +
        angkamauk3 +
        '" name="macam_jenis_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="nilai_agunan_mauk' +
        angkamauk3 +
        '" name="nilai_agunan_mauk[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="bentuk_pengikatan_mauk' +
        angkamauk3 +
        '" name="bentuk_pengikatan_mauk[]"  type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-mauk3").first().after(html11);
      angkamauk3++;
      jumlahisimauk3++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_mauk3", function () {
    $(this).parents("#new").remove();
    angkamauk3--;
    jumlahisimauk3--;
    resizeJquerySteps();
  });

  $("body").on("click", ".tambah-field-dcl", function () {
    if (jumlahisidcl == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl").html();
      $(".add-form-dcl").after(html1);
      var html11 =
        '<div class="col-lg-12">' +
        '<div class="col-lg-12">' +
        '<input id="nama_pemilik_perusahaan_dcl' +
        angkadcl +
        '" name="nama_pemilik_perusahaan_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-8">' +
        '<div class="col-lg-4">' +
        '<input id="persentase_saham_dcl' +
        angkadcl +
        '" name="persentase_saham_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-dcl").first().after(html11);
      angkadcl++;
      jumlahisidcl++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl", function () {
    $(this).parents("#new").remove();
    angkadcl--;
    jumlahisidcl--;
    resizeJquerySteps();
  });

  $("body").on("click", ".tambah-field-dcl2", function () {
    if (jumlahisidcl2 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl2").html();
      $(".add-form-dcl2").after(html1);
      var html11 =
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="jabatan_pengurus_perusahaan_dcl' +
        angkadcl2 +
        '" name="jabatan_pengurus_perusahaan_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-6">' +
        '<div class="col-lg-12">' +
        '<input id="nama_pengurus_perusahaan_dcl' +
        angkadcl2 +
        '" name="nama_pengurus_perusahaan_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-6">' +
        '<div class="col-lg-12">' +
        '<input id="ktp_dcl' +
        angkadcl2 +
        '" name="ktp_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-dcl2").first().after(html11);
      angkadcl2++;
      jumlahisidcl2++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl2", function () {
    $(this).parents("#new").remove();
    angkadcl2--;
    jumlahisidcl2--;
    resizeJquerySteps();
  });

  $("body").on("click", ".tambah-field-dcl3", function () {
    if (jumlahisidcl3 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl3").html();
      $(".add-form-dcl3").after(html1);
      var html11 =
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<textarea id="fasilitas_kredit_dcl' +
        angkadcl3 +
        '" name="fasilitas_kredit_dcl[]"  placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</textarea>" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="plafond_dcl' +
        angkadcl3 +
        '" name="plafond_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<textarea id="jangka_waktu_dcl' +
        angkadcl3 +
        '" name="jangka_waktu_dcl[]" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</textarea>" +
        // '<input id="jangka_waktu_dcl' +
        // angkadcl3 +
        // '" name="jangka_waktu_dcl[]" type="text" placeholder="" class="form-control" ' + is_disabled + '>' +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<textarea id="tujuan_penggunaan_dcl' +
        angkadcl3 +
        '" name="tujuan_penggunaan_dcl[]" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</textarea>" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="permohonan_diterima_dcl' +
        angkadcl3 +
        '" name="permohonan_diterima_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-dcl3").first().after(html11);
      angkadcl3++;
      jumlahisidcl3++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl3", function () {
    $(this).parents("#new").remove();
    angkadcl3--;
    jumlahisidcl3--;
    resizeJquerySteps();
  });

  $("body").on("click", ".tambah-field-dcl4", function () {
    if (jumlahisidcl4 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl4").html();
      $(".add-form-dcl4").after(html1);
      var html11 =
        '<div class="col-lg-2">' +
        '<div class="col-lg-10">' +
        '<input id="bukti_kepemilikan_dcl' +
        angkadcl4 +
        '" name="bukti_kepemilikan_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="jenis_agunan_dcl' +
        angkadcl4 +
        '" name="jenis_agunan_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-10">' +
        '<input id="tanggal_agunan_dcl' +
        angkadcl4 +
        '" name="tanggal_agunan_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-10">' +
        '<input id="avalist_dcl' +
        angkadcl4 +
        '" name="avalist_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-10">' +
        '<input id="nominal_dcl' +
        angkadcl4 +
        '" name="nominal_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-dcl4").first().after(html11);
      angkadcl4++;
      jumlahisidcl4++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl4", function () {
    $(this).parents("#new").remove();
    angkadcl4--;
    jumlahisidcl4--;
    resizeJquerySteps();
  });
  $("body").on("click", ".tambah-field-dcl5", function () {
    if (jumlahisidcl5 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl5").html();
      $(".add-form-dcl5").after(html1);
      var html11 =
        '<div class="col-lg-3">' +
        '<div class="col-lg-12">' +
        '<input id="fasilitas_dcl' +
        angkadcl5 +
        '" name="fasilitas_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="jatuh_tempo_dcl' +
        angkadcl5 +
        '" name="jatuh_tempo_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="plafond_existing_dcl' +
        angkadcl5 +
        '" name="plafond_existing_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="outstanding_dcl' +
        angkadcl5 +
        '" name="outstanding_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="kolektibilitas_dcl' +
        angkadcl5 +
        '" name="kolektibilitas_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-dcl5").first().after(html11);
      angkadcl5++;
      jumlahisidcl5++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl5", function () {
    $(this).parents("#new").remove();
    angkadcl5--;
    jumlahisidcl5--;
    resizeJquerySteps();
  });
  $("body").on("click", ".tambah-field-dcl6", function () {
    if (jumlahisidcl6 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl6").html();
      $(".add-form-dcl6").after(html1);
      var html11 =
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="fasilitas_kredit_grup_dcl' +
        angkadcl6 +
        '" name="fasilitas_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="nama_debitur_kredit_grup_dcl' +
        angkadcl6 +
        '" name="nama_debitur_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="jatuh_tempo_kredit_grup_dcl' +
        angkadcl6 +
        '" name="jatuh_tempo_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="plafond_existing_kredit_grup_dcl' +
        angkadcl6 +
        '" name="plafond_existing_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="outstanding_kredit_grup_dcl' +
        angkadcl6 +
        '" name="outstanding_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-8">' +
        '<input id="kolektibilitas_kredit_grup_dcl' +
        angkadcl6 +
        '" name="kolektibilitas_kredit_grup_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-dcl6").first().after(html11);
      angkadcl6++;
      jumlahisidcl6++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl6", function () {
    $(this).parents("#new").remove();
    angkadcl6--;
    jumlahisidcl6--;
    resizeJquerySteps();
  });
  $("body").on("click", ".tambah-field-dcl7", function () {
    if (jumlahisidcl7 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl7").html();
      $(".add-form-dcl7").after(html1);
      var html11 =
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="fasilitas_bank_lain_dcl' +
        angkadcl7 +
        '" name="fasilitas_bank_lain_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="bank_ljk_bank_lain_dcl' +
        angkadcl7 +
        '" name="bank_ljk_bank_lain_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="jatuh_tempo_bank_lain_dcl' +
        angkadcl7 +
        '" name="jatuh_tempo_bank_lain_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="plafond_existing_bank_lain_dcl' +
        angkadcl7 +
        '" name="plafond_existing_bank_lain_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-12">' +
        '<input id="outstanding_bank_lain_dcl' +
        angkadcl7 +
        '" name="outstanding_bank_lain_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<div class="col-lg-8">' +
        '<input id="kolektibilitas_bank_lain_dcl' +
        angkadcl7 +
        '" name="kolektibilitas_bank_lain_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>";
      $(".delete-btn-dcl7").first().after(html11);
      angkadcl7++;
      jumlahisidcl7++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl7", function () {
    $(this).parents("#new").remove();
    angkadcl7--;
    jumlahisidcl7--;
    resizeJquerySteps();
  });
  $("body").on("click", ".tambah-field-dcl8", function () {
    if (jumlahisidcl8 == 13) {
      swal({
        title: "Peringatan!",
        text: "Isi form jumlah maksimal!",
        type: "warning",
        showConfirmButton: false,
        timer: 1000,
      });
    } else {
      // $(".add-form-termijn-fak-data").append("<hr class='new mt-0 pt-0'>");
      var html1 = $(".copy-dcl8").html();
      $(".add-form-dcl8").after(html1);
      var html11 =
        '<div class="col-lg-8">' +
        '<div class="col-lg-12">' +
        '<input id="pengujian_lainnya_dcl' +
        angkadcl8 +
        '" name="pengujian_lainnya_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-9">' +
        '<div class="col-lg-12">' +
        '<input id="dasar_pengujian_lainnya_dcl' +
        angkadcl8 +
        '" name="dasar_pengujian_lainnya_dcl[]" type="text" placeholder="" class="form-control" ' +
        is_disabled +
        ">" +
        "</div>" +
        "</div>" +
        '<div class="col-lg-2">' +
        '<select name="checklist_pengujian_lainnya_dcl[]" ' +
        is_disabled +
        'id="checklist_pengujian_lainnya_dcl' +
        angkadcl8 +
        '" class=" form-control class-disabled select">' +
        '<option value=""></option>' +
        '<option value="comply">Comply</option>' +
        '<option value="not comply">Not Comply</option>' +
        "</select>" +
        "</div>";
      $(".delete-btn-dcl8").first().after(html11);
      angkadcl8++;
      jumlahisidcl8++;
      resizeJquerySteps();
    }
  });
  // saat tombol remove dklik control group akan dihapus
  $("body").on("click", ".hapus_dcl8", function () {
    $(this).parents("#new").remove();
    angkadcl8--;
    jumlahisidcl8--;
    resizeJquerySteps();
  });
});
