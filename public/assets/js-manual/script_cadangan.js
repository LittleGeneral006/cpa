var angka = 2;
var angkatermijn = 0;
var angkatermijninput = 1;

function tambahInput() {
  var jumlah = document.getElementById("jumlah_agunan").value;
  var inputAgunan = document.getElementById("input_agunan");
  inputAgunan.innerHTML = ""; // Reset inputan

  for (var i = 0; i < jumlah; i++) {
    var inputGroup = document.createElement("div");
    inputGroup.classList.add("input-group");
    inputGroup.classList.add("col-lg-12");

    var input = document.createElement("input");
    input.type = "text";
    input.name = "jenis_agunan[]";

    input.classList.add("form-control"); // Tambah class "form_control"
    input.placeholder = "Jenis Agunan " + (i + 1);

    inputGroup.appendChild(input);
    inputAgunan.appendChild(inputGroup);
  }

  resizeJquerySteps();
}

function add_jenis_agunan() {
  var inpJenisAgunanForm = document.getElementsByName("jenis_agunan[]");
  let simpanJenisAgunanForm = "";
  for (var i = 0; i < inpJenisAgunanForm.length; i++) {
    var nama = inpJenisAgunanForm[i];
    simpanJenisAgunanForm += nama.value;
    if (i < inpJenisAgunanForm.length - 1) {
      simpanJenisAgunanForm += ";";
    }
  }
  $('[name="jenisagunan"]').val(simpanJenisAgunanForm);
  console.log("test");
}

function copyvalue(id, target) {
  let TEXTValue = $("#" + id).val();
  // let fieldName = id.slice(0, -9);
  // Salin nilai dari input dengan nama ppn ke input dengan nama ppn_pp
  $("#" + target).val(TEXTValue);
}
function copyvalue2(id, target1, target2) {
  let TEXTValue = $("#" + id).val();
  // let fieldName = id.slice(0, -9);
  // Salin nilai dari input dengan nama ppn ke input dengan nama ppn_pp
  $("#" + target1).val(TEXTValue);
  $("#" + target2).val(TEXTValue);
}

//
//FAK Data
//
function hitungPP(angka) {
  let nilai =
    parseFloat($("#nilai_sebelum_ppn_pp_fak_data" + angka).val()) || 0;
  let ppn = parseFloat($("#ppn_pp_fak_data" + angka).val()) || 0;
  let pembulatan_sebelumPPN =
    parseFloat($("#pembulatan_nilai_sebelum_ppn_total_pp_fak_data").val()) || 0;
  let pembulatan_sesudahPPN =
    parseFloat($("#pembulatan_nilai_sesudah_ppn_total_pp_fak_data").val()) || 0;
  let hasil = nilai * (1 + ppn);
  $("#nilai_sesudah_ppn_pp_fak_data" + angka).val(hasil);

  // Hitung total nilai_sesudah_ppn_pp_fak_data
  const inputs = $("input[name='nilai_sebelum_ppn_pp_fak_data[]']");
  let total = 0;
  inputs.each(function () {
    const nilai = parseFloat($(this).val()) || 0;
    total += nilai;
    totalhasil = total + pembulatan_sebelumPPN;
  });
  // $("#nilai_sebelum_ppn_total_pp_fak_data").val(total);
  $("#jumlah_nilai_sebelum_ppn_total_pp_fak_data").val(totalhasil);

  const inputs2 = $("input[name='nilai_sesudah_ppn_pp_fak_data[]']");
  let total2 = 0;
  inputs2.each(function () {
    const nilai2 = parseFloat($(this).val()) || 0;
    total2 += nilai2;
    totalhasil2 = total2 + pembulatan_sesudahPPN;
  });
  // $("#nilai_sesudah_ppn_total_pp_fak_data").val(total2);
  $("#jumlah_nilai_sesudah_ppn_total_pp_fak_data").val(totalhasil2);
}

// function hitungPrakiraanTanggalTermijn(tgl_pelaksanaan_fak_data, lama_pelaksanaan_fak_data, progress,angka) {
//   let tgl_pelaksanaan_fak_data = $("#tgl_pelaksanaan_fak_data").val() || 0;
//   let lama_pelaksanaan_fak_data = parseFloat($("#lama_pelaksanaan_fak_data").val()) || 0;
//   let progress = parseFloat($("#progress_pp_fak_data"+angka).val()) || 0;

//   // Menghitung jumlah hari yang telah berlalu berdasarkan progress
//   var elapsedDays = (lama_pelaksanaan_fak_data * progress);

//   // Menentukan tanggal berdasarkan jumlah hari yang telah berlalu
//   var progressDate = new Date(tgl_pelaksanaan_fak_data);
//   progressDate.setDate(progressDate.getDate() + Math.floor(elapsedDays));

//   $("#prakiraan_tgl_termijn_fak_data"+angka).val(progressDate);
// }
function hitungPrakiraanTanggalTermijn(angka) {
  // Mendapatkan nilai dari elemen HTML
  var tgl_pelaksanaan_fak_data = $("#tgl_pelaksanaan_fak_data").val() || 0;
  let lama_pelaksanaan_fak_data =
    parseFloat($("#lama_pelaksanaan_fak_data").val()) || 0;
  let progressValue = parseFloat($("#progress_pp_fak_data" + angka).val()) || 0;

  // Menghitung jumlah hari yang telah berlalu berdasarkan progress
  if (progressValue === 0) {
    var formattedDate = tgl_pelaksanaan_fak_data;
  } else {
    // Menghitung jumlah hari yang telah berlalu berdasarkan progress
    var elapsedDays = lama_pelaksanaan_fak_data * progressValue;

    console.log("elapsedDays:", elapsedDays);
    // Menentukan tanggal berdasarkan jumlah hari yang telah berlalu
    var progressDate = new Date(tgl_pelaksanaan_fak_data);
    console.log("progressDate:", progressDate);

    progressDate.setDate(progressDate.getDate() + Math.floor(elapsedDays));

    // Format tanggal sesuai dengan format yang diterima oleh elemen input tanggal HTML5
    var formattedDate = progressDate.toISOString().slice(0, 10);
  }

  // Menetapkan nilai ke elemen input tanggal prakiraan
  $("#prakiraan_tgl_termijn_fak_data" + angka).val(formattedDate);
}

function hitungSemua() {
  getFCR();
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

// Fungsi untuk melakukan perhitungan
//FAK Modal
function hitungNilaiKontrak() {
  let sesudah_ppn =
    parseFloat($("#jumlah_nilai_sesudah_ppn_total_pp_fak_data").val()) || 0;
  let profit_kontraktor =
    parseFloat($("#profit_kontraktor_fak_data").val()) || 0;
  let biaya_pemeliharaan =
    parseFloat($("#biaya_pemeliharaan_fak_data").val()) || 0;
  let hasil =
    sesudah_ppn - sesudah_ppn * (profit_kontraktor + biaya_pemeliharaan);
  $("#nilai_proyek_fak_modal").val(hasil);
}

function hitungPersentase() {
  let proyek = parseFloat($("#proyek_fak_modal").val()) || 0;
  let profit = parseFloat($("#profit_fak_modal").val()) || 0;
  let ppn = parseFloat($("#ppn_fak_modal").val()) || 0;
  let pemeliharaan = parseFloat($("#pemeliharaan_fak_modal").val()) || 0;
  let hasil = proyek - profit - ppn - pemeliharaan;
  $("#persentase_proyek_fak_modal").val(hasil);
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
  $("#total_biaya_umum_fak_modal").val(hasil);
  $("#biaya_umum_adm_fak_rl").val(hasil);
  $("#jumlah_total_biaya_umum_fak_modal").val(hasil2);
}

function hitungJumlahKebutuhanModalKerja() {
  let persiapan_pekerjaan_fak_modal =
    parseFloat($("#persiapan_pekerjaan_fak_modal").val()) || 0;
  let biaya_umum_adm_fak_modal =
    parseFloat($("#biaya_umum_adm_fak_modal").val()) || 0;
  let hasil = persiapan_pekerjaan_fak_modal + biaya_umum_adm_fak_modal;
  $("#jumlah_kebutuhan_modal_kerja_fak_modal").val(hasil);
  $("#sumber_pembiayaan_fak_modal").val(hasil);
  $("#jumlah_bulat_sumber_pembiayaan_fak_modal").val(hasil);

  const pembiayaan = 0.2 * hasil;
  $("#pembiayaan_sendiri_fak_modal").val(pembiayaan);
}

function hitungKreditBank() {
  let sumber_pembiayaan_fak_modal =
    parseFloat($("#sumber_pembiayaan_fak_modal").val()) || 0;
  let penerimaan_uang_muka_fak_modal =
    parseFloat($("#penerimaan_uang_muka_fak_modal").val()) || 0;
  let pembiayaan_sendiri_fak_modal =
    parseFloat($("#pembiayaan_sendiri_fak_modal").val()) || 0;
  //   console.log(penerimaan_uang_muka_fak_modal);
  //   console.log(pembiayaan_sendiri_fak_modal);
  //   console.log(sumber_pembiayaan_fak_modal);
  const hasil =
    sumber_pembiayaan_fak_modal -
    penerimaan_uang_muka_fak_modal -
    pembiayaan_sendiri_fak_modal;
  $("#kredit_bank_fak_modal").val(hasil);
  copyvalue2(
    "penerimaan_uang_muka_fak_modal",
    "jumlah_penerimaan_uang_muka_fak_modal",
    "penerimaan_uang_muka_fak_rl",
  );
}

function hitungKreditBank2() {
  let jumlah_bulat_sumber_pembiayaan_fak_modal =
    parseFloat($("#jumlah_bulat_sumber_pembiayaan_fak_modal").val()) || 0;
  let jumlah_penerimaan_uang_muka_fak_modal =
    parseFloat($("#jumlah_penerimaan_uang_muka_fak_modal").val()) || 0;
  let jumlah_kredit_bank_fak_modal =
    parseFloat($("#jumlah_kredit_bank_fak_modal").val()) || 0;
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

  $("#jumlah_pembiayaan_sendiri_fak_modal").val(hasil);
  $("#persentase_pembiayaan_sendiri_fak_modal").val(hasil3);
  $("#persentase_kredit_bank_fak_modal").val(hasil2);
  $("#persentase_penerimaan_uang_muka_fak_modal").val(hasil4);
  $("#persentase_jumlah_sumber_pembiayaan_fak_modal").val(hasil5);
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
    "prakiraan_tgl_termijn_fak_data1",
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
      (tanggal.getTime() - excelEpochInMilliseconds) / millisecondsPerDay + 2,
    );
    var nilaiTanggaltermijn = Math.ceil(
      (tanggal_termijn.getTime() - excelEpochInMilliseconds) /
        millisecondsPerDay +
        2,
    );
    const fix =
      /* prettier-ignore */
      (((jumlah_kredit_bank_fak_modal * bunga_kredit_fak_data) / 360) *
        (nilaiTanggaltermijn - nilaiTanggal)) +
      (biaya_provisi_fak_data * jumlah_kredit_bank_fak_modal);
    const fix1 = fix + laba_usaha_fak_rl;

    const fix3 = fix / jumlah_pembiayaan_sendiri_fak_modal;
    $("#bunga_provisi_bank_fak_rl").val(fix);
    $("#laba_sebelum_pajak_fak_rl").val(fix1);
    // $("#return_of_equity_fak_rl").val(fix3);
  } else {
    console.error(
      "Elemen HTML tidak ditemukan atau tidak memiliki properti 'value'.",
    );
  }
}

function hitungPajakPPNPPh() {
  const ppn_fak_data = parseFloat($("#ppn_fak_data").val()) || 0;
  const nilai_kontrak_fak_data =
    parseFloat($("#nilai_kontrak_fak_data").val()) || 0;
  const pph_fak_data = parseFloat($("#pph_fak_data").val()) || 0;
  /* prettier-ignore */
  const fix = -(((ppn_fak_data / (1 + ppn_fak_data)) * nilai_kontrak_fak_data) + ((nilai_kontrak_fak_data - ((ppn_fak_data / (1 + ppn_fak_data)) * nilai_kontrak_fak_data)) * pph_fak_data));
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
    termijn_pemeliharaan,
  );
}

function hitungPenerimaanTermijnPemeliharaan() {
  const nilai_kontrak_fak_rl =
    parseFloat($("#nilai_kontrak_fak_rl").val()) || 0;
  const setelah_masa_pemeliharaan_fak_data =
    parseFloat($("#setelah_masa_pemeliharaan_fak_data").val()) || 0;

  const fix = nilai_kontrak_fak_rl * setelah_masa_pemeliharaan_fak_data;
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
    1 -
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
    ((ppn_fak_data / (1 + ppn_fak_data)) * penerimaan_bersih_fak_rl) +((penerimaan_bersih_fak_rl - ((ppn_fak_data / (1 + ppn_fak_data)) * penerimaan_bersih_fak_rl)) * pph_fak_data);
  const fix2 = penerimaan_bersih_fak_rl - fix;
  $("#pajak_ppn_pph_fak_rl").val(fix);
  $("#kosong_bersih_fak_rl").val(fix2);
}

function hitungPersentasePemotonganKreditBank() {
  const kredit_bank_fak_rl = parseFloat($("#kredit_bank_fak_rl").val()) || 0;
  const kosong_bersih_fak_rl =
    parseFloat($("#kosong_bersih_fak_rl").val()) || 0;
  console.log(kredit_bank_fak_rl);
  console.log(kosong_bersih_fak_rl);
  const fix = kredit_bank_fak_rl / kosong_bersih_fak_rl;
  const fix2 = Math.round(fix * 100) / 100;
  $("#persentase_pemotongan_kredit_bank_fak_rl").val(fix.toFixed(4));
  $("#dibulatkan_fak_rl").val(fix2);
}

//
//CEF
//

function showValueCEFT(checkbox, angka, bobot) {
  var display = document.getElementById("hasil" + angka + "ceft");
  if (checkbox.checked) {
    var hitungbobot = checkbox.value * bobot;
    display.innerHTML += hitungbobot + "<br>";
  } else {
    var hitungbobot = checkbox.value * bobot;
    display.innerHTML = display.innerHTML.replace(hitungbobot + "<br>", "");
  }
  var hasil1ceft = parseFloat(
    document.getElementById("hasil1ceft").innerText || 0,
  );
  var hasil2ceft = parseFloat(
    document.getElementById("hasil2ceft").innerText || 0,
  );
  var hasil3ceft = parseFloat(
    document.getElementById("hasil3ceft").innerText || 0,
  );
  var hasil4ceft = parseFloat(
    document.getElementById("hasil4ceft").innerText || 0,
  );
  var hasil5ceft = parseFloat(
    document.getElementById("hasil5ceft").innerText || 0,
  );
  var hasil6ceft = parseFloat(
    document.getElementById("hasil6ceft").innerText || 0,
  );
  var hasil7ceft = parseFloat(
    document.getElementById("hasil7ceft").innerText || 0,
  );
  var hasil8ceft = parseFloat(
    document.getElementById("hasil8ceft").innerText || 0,
  );
  var hasil9ceft = parseFloat(
    document.getElementById("hasil9ceft").innerText || 0,
  );

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
  document.getElementById("hasiltotalCEFT").innerText = total;
}

function showValueCEFB(checkbox, angka, bobot) {
  var display = document.getElementById("hasil" + angka + "cefb");
  if (checkbox.checked) {
    var hitungbobot = checkbox.value * bobot;
    display.innerHTML += hitungbobot + "<br>";
  } else {
    var hitungbobot = checkbox.value * bobot;
    display.innerHTML = display.innerHTML.replace(hitungbobot + "<br>", "");
  }
  var hasil1cefb = parseFloat(
    document.getElementById("hasil1cefb").innerText || 0,
  );
  var hasil2cefb = parseFloat(
    document.getElementById("hasil2cefb").innerText || 0,
  );
  var hasil3cefb = parseFloat(
    document.getElementById("hasil3cefb").innerText || 0,
  );
  var hasil4cefb = parseFloat(
    document.getElementById("hasil4cefb").innerText || 0,
  );
  var hasil5cefb = parseFloat(
    document.getElementById("hasil5cefb").innerText || 0,
  );
  var hasil6cefb = parseFloat(
    document.getElementById("hasil6cefb").innerText || 0,
  );
  var hasil7cefb = parseFloat(
    document.getElementById("hasil7cefb").innerText || 0,
  );

  total =
    hasil1cefb +
    hasil2cefb +
    hasil3cefb +
    hasil4cefb +
    hasil5cefb +
    hasil6cefb +
    hasil7cefb;

  // Menampilkan total ke dalam elemen dengan id "hasiltotal"
  document.getElementById("hasiltotalCEFB").innerText = total;
}

jumlahisipp = 1;
jumlahisitermijn = 1;

function add_setting1() {
  var inpitemppfakdataForm = document.getElementsByName("item_pp_fak_data[]");
  var inpppnmppfakdataForm = document.getElementsByName("ppn_pp_fak_data[]");
  var inpnilaisebelumppnppfakdataForm = document.getElementsByName(
    "nilai_sebelum_ppn_pp_fak_data[]",
  );
  var inpnilaisesudahppnppfakdataForm = document.getElementsByName(
    "nilai_sesudah_ppn_pp_fak_data[]",
  );
  let simpanitemppfakdataForm = "";
  let simpanppnppfakdataForm = "";
  let simpannilaisebelumppnppfakdataForm = "";
  let simpannilaisesudahppnppfakdataForm = "";
  var flagisi = false;
  var flagjalan = true;

  for (var i = 0; i < inpitemppfakdataForm.length; i++) {
    var itemppfakdata = inpitemppfakdataForm[i];
    var ppnppfakdata = inpppnmppfakdataForm[i];
    var nilaisebelumppnppfakdata = inpnilaisebelumppnppfakdataForm[i];
    var nilaisesudahppnppfakdata = inpnilaisesudahppnppfakdataForm[i];

    if (itemppfakdata.value == "") {
      continue; // Skip jika nilai itemppfakdata kosong
    }

    if (itemppfakdata.value.includes("|")) {
      flagisi = true;
      flagjalan = true;
      simpanitemppfakdataForm += "|" + itemppfakdata.value;
      simpanppnppfakdataForm += "|" + ppnppfakdata.value;
      simpannilaisebelumppnppfakdataForm +=
        "|" + nilaisebelumppnppfakdata.value;
      simpannilaisesudahppnppfakdataForm +=
        "|" + nilaisesudahppnppfakdata.value;
    } else {
      if (flagisi == true && flagjalan == false) {
        flagisi = false;
        simpanitemppfakdataForm += ";";
        simpanppnppfakdataForm += ";";
        simpannilaisebelumppnppfakdataForm += ";";
        simpannilaisesudahppnppfakdataForm += ";";
      }
      if (i < inpitemppfakdataForm.length - 1) {
        simpanitemppfakdataForm += itemppfakdata.value + ";";
        simpanppnppfakdataForm += ppnppfakdata.value + ";";
        simpannilaisebelumppnppfakdataForm +=
          nilaisebelumppnppfakdata.value + ";";
        simpannilaisesudahppnppfakdataForm +=
          nilaisesudahppnppfakdata.value + ";";
      } else {
        simpanitemppfakdataForm += itemppfakdata.value;
        simpanppnppfakdataForm += ppnppfakdata.value;
        simpannilaisebelumppnppfakdataForm += nilaisebelumppnppfakdata.value;
        simpannilaisesudahppnppfakdataForm += nilaisesudahppnppfakdata.value;
      }
    }
  }

  $('[name="itemppfakdata"]').val(simpanitemppfakdataForm);
  $('[name="ppnppfakdata"]').val(simpanppnppfakdataForm);
  $('[name="nilaisebelumppnppfakdata"]').val(
    simpannilaisebelumppnppfakdataForm,
  );
  $('[name="nilaisesudahppnppfakdata"]').val(
    simpannilaisesudahppnppfakdataForm,
  );
}

function add_setting2() {
  var inptermijnppfakdataForm =
    document.getElementsByName("item_pp_fak_data[]");
  var inpprogressppfakdataForm =
    document.getElementsByName("ppn_pp_fak_data[]");
  var inppersentasetermijnppfakdataForm = document.getElementsByName(
    "nilai_sebelum_ppn_pp_fak_data[]",
  );
  var inpprakiraantgltermijnfakdataForm = document.getElementsByName(
    "nilai_sesudah_ppn_pp_fak_data[]",
  );
  let simpanitemppfakdataForm = "";
  let simpanprogressppfakdataForm = "";
  let simpanpersentasetermijnppfakdataForm = "";
  let simpanprakiraantgltermijnfakdataForm = "";
  var flagisi = false;
  var flagjalan = true;

  for (var i = 0; i < inptermijnppfakdataForm.length; i++) {
    var termijnppfakdata = inptermijnppfakdataForm[i];
    var progressppfakdata = inpprogressppfakdataForm[i];
    var persentasetermijnppfakdata = inppersentasetermijnppfakdataForm[i];
    var prakiraantgltermijnfakdata = inpprakiraantgltermijnfakdataForm[i];

    if (termijnppfakdata.value == "") {
      continue; // Skip jika nilai termijnppfakdata kosong
    }

    if (termijnppfakdata.value.includes("|")) {
      flagisi = true;
      flagjalan = true;
      simpanitemppfakdataForm += "|" + termijnppfakdata.value;
      simpanprogressppfakdataForm += "|" + progressppfakdata.value;
      simpanpersentasetermijnppfakdataForm +=
        "|" + persentasetermijnppfakdata.value;
      simpanprakiraantgltermijnfakdataForm +=
        "|" + prakiraantgltermijnfakdata.value;
    } else {
      if (flagisi == true && flagjalan == false) {
        flagisi = false;
        simpanitemppfakdataForm += ";";
        simpanprogressppfakdataForm += ";";
        simpanpersentasetermijnppfakdataForm += ";";
        simpanprakiraantgltermijnfakdataForm += ";";
      }
      if (i < inptermijnppfakdataForm.length - 1) {
        simpanitemppfakdataForm += termijnppfakdata.value + ";";
        simpanprogressppfakdataForm += progressppfakdata.value + ";";
        simpanpersentasetermijnppfakdataForm +=
          persentasetermijnppfakdata.value + ";";
        simpanprakiraantgltermijnfakdataForm +=
          prakiraantgltermijnfakdata.value + ";";
      } else {
        simpanitemppfakdataForm += termijnppfakdata.value;
        simpanprogressppfakdataForm += progressppfakdata.value;
        simpanpersentasetermijnppfakdataForm +=
          persentasetermijnppfakdata.value;
        simpanprakiraantgltermijnfakdataForm +=
          prakiraantgltermijnfakdata.value;
      }
    }
  }

  $('[name="termijnppfakdata"]').val(simpanitemppfakdataForm);
  $('[name="ppnppfakdata"]').val(simpanprogressppfakdataForm);
  $('[name="persentasetermijnppfakdata"]').val(
    simpanpersentasetermijnppfakdataForm,
  );
  $('[name="prakiraantgltermijnfakdata"]').val(
    simpanprakiraantgltermijnfakdataForm,
  );
}

function add_setting3() {
  var inpitemppfakmodalForm = document.getElementsByName("item_pp_fak_modal[]");
  var inpnilaippfakmodalForm = document.getElementsByName(
    "nilai_pp_fak_modal[]",
  );
  let simpanitemppfakmodalForm = "";

  let simpannilaippfakmodalForm = "";
  var flagisi = false;
  var flagjalan = true;

  for (var i = 0; i < inpitemppfakmodalForm.length; i++) {
    var itemppfakmodal = inpitemppfakmodalForm[i];
    var nilaippfakmodal = inpnilaippfakmodalForm[i];

    if (itemppfakmodal.value == "") {
      continue; // Skip jika nilai itemppfakmodal kosong
    }

    if (itemppfakmodal.value.includes("|")) {
      flagisi = true;
      flagjalan = true;
      simpanitemppfakmodalForm += "|" + itemppfakmodal.value;
      simpannilaippfakmodalForm += "|" + nilaippfakmodal.value;
    } else {
      if (flagisi == true && flagjalan == false) {
        flagisi = false;
        simpanitemppfakmodalForm += ";";
        simpannilaippfakmodalForm += ";";
      }
      if (i < inpitemppfakmodalForm.length - 1) {
        simpanitemppfakmodalForm += itemppfakmodal.value + ";";
        simpannilaippfakmodalForm += nilaippfakmodal.value + ";";
      } else {
        simpanitemppfakmodalForm += itemppfakmodal.value;
        simpannilaippfakmodalForm += nilaippfakmodal.value;
      }
    }
  }

  $('[name="itemppfakmodal"]').val(simpanitemppfakmodalForm);
  $('[name="nilaippfakmodal"]').val(simpannilaippfakmodalForm);
}

$(document).ready(function () {
  var v = $("#form").validate({
    // exclude it from validation
    ignore: ":hidden:not(#summernote),.note-editable.card-block",
  });

  var myElement = $("#summernote");

  myElement.summernote({
    // See: http://summernote.org/deep-dive/
    callbacks: {
      onChange: function (contents, $editable) {
        // Note that at this point, the value of the `textarea` is not the same as the one
        // you entered into the summernote editor, so you have to set it yourself to make
        // the validation consistent and in sync with the value.
        myElement.val(myElement.summernote("isEmpty") ? "" : contents);

        // You should re-validate your element after change, because the plugin will have
        // no way to know that the value of your `textarea` has been changed if the change
        // was done programmatically.
        v.element(myElement);
      },
    },
  });
  // let htmlString = null;
  // $(".summernote").summernote("destroy");

  // $.extend($.summernote.plugins, {
  //     'brenter': function(context) {
  //         this.events = {
  //             'summernote.enter': function(we, event) {
  //                 document.execCommand('insertHTML', false, '<br><br>');
  //                 event.preventDefault();
  //             }
  //         };
  //     }
  // });

  // $('.summernote').summernote({
  //     toolbar: [],
  //     height: 188,
  // });
  // // TAB
  // delete $.summernote.options.keyMap.pc['TAB'];
  // delete $.summernote.options.keyMap.mac['TAB'];

  // // SHIFT+TAB
  // delete $.summernote.options.keyMap.pc['SHIFT+TAB'];
  // delete $.summernote.options.keyMap.mac['SHIFT+TAB'];
  // $(".summernote").summernote("code", htmlString);
  //   function uploadImage(image) {
  //       var data = new FormData();
  //       data.append("image", image);
  //       $.ajax({
  //           url: "<?php echo site_url('post/upload_image')?>",
  //           cache: false,
  //           contentType: false,
  //           processData: false,
  //           data: data,
  //           type: "POST",
  //           success: function(url) {
  //           $('#summernote').summernote("insertImage", url);
  //           },
  //           error: function(data) {
  //               console.log(data);
  //           }
  //       });
  //   }

  //   function deleteImage(src) {
  //       $.ajax({
  //           data: {src : src},
  //           type: "POST",
  //           url: "<?php echo site_url('post/delete_image')?>",
  //           cache: false,
  //           success: function(response) {
  //               console.log(response);
  //           }
  //       });
  //   }
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
        '\')" type="text" placeholder="" class="form-control">' +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-6 control-label">PPN</label>' +
        '<div class="col-lg-12">' +
        '<input id="ppn_pp_fak_data' +
        angka +
        '" name="ppn_pp_fak_data[]" onkeyup="hitungPP(' +
        angka +
        ')" type="text" placeholder="" class="form-control">' +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-6 control-label">Nilai Sebelum PPN</label>' +
        '<div class="col-lg-12">' +
        '<input id="nilai_sebelum_ppn_pp_fak_data' +
        angka +
        '" name="nilai_sebelum_ppn_pp_fak_data[]" onkeyup="hitungPP(' +
        angka +
        ')" type="text" placeholder="" class="form-control">' +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-6 control-label">Nilai Sesudah PPN</label>' +
        '<div class="col-lg-12">' +
        '<input id="nilai_sesudah_ppn_pp_fak_data' +
        angka +
        '" name="nilai_sesudah_ppn_pp_fak_data[]" type="text" placeholder="" onchange="copyvalue(this.id, \'nilai_pp_fak_modal' +
        angka +
        '\')" class="form-control">' +
        "</div>" +
        "</div>";
      $(".delete-btn-pp-fak-data").first().after(html11);
      var html2 = $(".copy-pp-fak-modal").html();
      $(".add-form-pp-fak-modal").after(html2);
      var html12 =
        '<div class="col-lg-12">' +
        '<label class="col-lg-6 control-label">Item</label>' +
        '<div class="col-lg-6">' +
        '<input id="item_pp_fak_modal' +
        angka +
        '" name="item_pp_fak_modal[]" type="text" placeholder="" class="form-control">' +
        "</div>" +
        "</div>" +
        '<div class="col-lg-12">' +
        '<label class="col-lg-6 control-label">Nilai</label>' +
        '<div class="col-lg-6">' +
        '<input id="nilai_pp_fak_modal' +
        angka +
        '" name="nilai_pp_fak_modal[]" onkeyup="hitungPPFAKM()" type="text" placeholder="" class="form-control">' +
        "</div>" +
        "</div>";
      $(".delete-btn-pp-fak-modal").first().after(html12);
      var ppnFakDataValue = $("#ppn_fak_data").val();
      console.log(ppnFakDataValue);
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
        '<div class="col-lg-12">' +
        '<input id="termijn_pp_fak_data' +
        angkatermijninput +
        '" name="termijn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-6 control-label">Progress</label>' +
        '<div class="col-lg-12">' +
        '<input id="progress_pp_fak_data' +
        angkatermijninput +
        '" name="progress_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
        "</div>" +
        "</div>" +
        '<div class="col-lg-3">' +
        '<label class="col-lg-12 control-label">Persentase Termijn</label>' +
        '<div class="col-lg-12">' +
        '<input id="persentase_termijn_pp_fak_data" name="persentase_termijn_pp_fak_data[]" type="text" placeholder="" class="form-control">' +
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
        '" name="prakiraan_tgl_termijn_fak_data[]" type="date" placeholder="" class="form-control">' +
        "</div>" +
        "</div>";
      $(".delete-btn-termijn-fak-data").first().after(html11);

      $("body").on(
        "input",
        "input[name='persentase_termijn_pp_fak_data[]']",
        function () {
          // const input = parseFloat($("#setelah_masa_pemeliharaan_fak_data").val()) || 0;
          const inputs = $("input[name='persentase_termijn_pp_fak_data[]']");
          let total = 0;
          inputs.each(function () {
            const nilai = parseFloat($(this).val()) || 0;
            total += nilai;
          });
          const total_termijn = 1;
          const fix = (total_termijn - total).toFixed(2);
          $("#total_termijn_fak_data").val(total_termijn);
          $("#setelah_masa_pemeliharaan_fak_data").val(fix);
          $("#pemeliharaan_fak_modal").val(fix);
        },
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

  $("#wizard").steps();
  $("#form").steps({
    bodyTag: "fieldset",
    onInit: function (event, currentIndex) {
      resizeJquerySteps();
    },
    onStepChanging: function (event, currentIndex, newIndex) {
      resizeJquerySteps();
      // Always allow going backward even if the current step contains invalid fields!
      if (currentIndex > newIndex) {
        return true;
      }

      // Forbid suppressing "Warning" step if the user is to young
      if (newIndex === 3 && Number($("#age").val()) < 18) {
        return false;
      }

      var form = $(this);

      // Clean up if user went backward before
      if (currentIndex < newIndex) {
        // To remove error styles
        $(".body:eq(" + newIndex + ") label.error", form).remove();
        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
      }

      // Disable validation on fields that are disabled or hidden.
      form.validate().settings.ignore = ":disabled,:hidden";

      // Start validation; Prevent going forward if false
      return form.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex) {
      resizeJquerySteps();
      // Suppress (skip) "Warning" step if the user is old enough.
      if (currentIndex === 2 && Number($("#age").val()) >= 18) {
        $(this).steps("next");
      }

      // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
      if (currentIndex === 2 && priorIndex === 3) {
        $(this).steps("previous");
      }
      // mengubah CSS ketika tab berpindah
      if (currentIndex === 0) {
        resizeJquerySteps();
      }
      if (currentIndex === 1) {
        resizeJquerySteps();
      }
      if (currentIndex === 2) {
        resizeJquerySteps();
      }
      if (currentIndex === 3) {
        resizeJquerySteps();
      }
      if (currentIndex === 4) {
        resizeJquerySteps();
      }
      if (currentIndex === 5) {
        resizeJquerySteps();
      }
      if (currentIndex === 6) {
        resizeJquerySteps();
      }
      $(window).on("resize", function () {
        if ($(window).width() < 480) {
          // CSS untuk perangkat mobile

          // Tab pertama
          if (currentIndex === 0) {
            resizeJquerySteps();
          }

          // Tab kedua
          if (currentIndex === 1) {
            resizeJquerySteps();
          }

          // Tab ketiga
          if (currentIndex === 2) {
            resizeJquerySteps();
          }

          // Tab keempat
          if (currentIndex === 3) {
            resizeJquerySteps();
          }
          if (currentIndex === 4) {
            resizeJquerySteps();
          }
          if (currentIndex === 5) {
            resizeJquerySteps();
          }
          if (currentIndex === 6) {
            resizeJquerySteps();
          }
        } else if ($(window).width() < 880) {
          // CSS untuk perangkat tablet atau desktop

          // Tab pertama
          if (currentIndex === 0) {
            resizeJquerySteps();
          }

          // Tab kedua
          if (currentIndex === 1) {
            resizeJquerySteps();
          }

          // Tab ketiga
          if (currentIndex === 2) {
            resizeJquerySteps();
          }

          // Tab keempat
          if (currentIndex === 3) {
            resizeJquerySteps();
          }
          if (currentIndex === 4) {
            resizeJquerySteps();
          }
          if (currentIndex === 5) {
            resizeJquerySteps();
          }
          if (currentIndex === 6) {
            resizeJquerySteps();
          }
        } else {
          // Tab pertama
          if (currentIndex === 0) {
            resizeJquerySteps();
          }

          // Tab kedua
          if (currentIndex === 1) {
            resizeJquerySteps();
          }

          // Tab ketiga
          if (currentIndex === 2) {
            resizeJquerySteps();
          }

          // Tab keempat
          if (currentIndex === 3) {
            resizeJquerySteps();
          }
          if (currentIndex === 4) {
            resizeJquerySteps();
          }
          if (currentIndex === 5) {
            resizeJquerySteps();
          }
          if (currentIndex === 6) {
            resizeJquerySteps();
          }
        }
      });

      // Panggil event resize saat halaman dimuat
      $(window).trigger("resize");
    },
    onFinishing: function (event, currentIndex) {
      var form = $(this);

      // Disable validation on fields that are disabled.
      // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
      form.validate().settings.ignore = ":disabled";

      // Start validation; Prevent form submission if false
      return form.valid();
    },
    // onFinished: function(event, currentIndex) {
    //        var form = $(this);

    //        // Submit form input
    //        form.submit();
    // }
    onFinished: function (event, currentIndex) {
      var form = $(this);

      // Validate form input using jQuery Validation Plugin
      if (!form.valid()) {
        return false;
      }

      // Serialize form data
      var formData = form.serialize();
      // console.log(formData)
      $("#mohon").show();
      // Send AJAX request to CodeIgniter 4 controller method
      $.ajax({
        url: "<?php echo base_url() ?>home/simpan_permohonan",
        type: "POST",
        data: formData,
        success: function (data) {
          // Handle successful response
          // console.log(data)
          if (data == 1) {
            $("#mohon").hide();
            alert("Data Berhasil Disimpan");
            // toastr.success('Data Berhasil Disimpan', 'Berhasil');
            window.location.href = "<?php echo base_url() ?>home/e-form";
          } else {
            // alert(data)
            $("#mohon").hide();
            toastr.warning(data, "Data Gagal Disimpan");
          }
        },
        error: function (xhr, status, error) {
          // Handle error response
          // console.log(error)
        },
      });

      return true;
    },
  });
});

$(document).ready(function () {});

// Contoh penggunaan fungsi untuk mencari tanggal progress 50%
// var startDate = new Date('2024-01-23'); // Tanggal pelaksanaan
// var durationDays = 30; // Lama pelaksanaan pekerjaan
// var progressPercentage = 50; // Progress pekerjaan dalam persentase

// var progressDate = calculateDate(startDate, durationDays, progressPercentage);
// console.log(progressDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }));
// var startDate = new Date('2024-01-23'); // Tanggal pelaksanaan
// var durationDays = 30; // Lama pelaksanaan pekerjaan
// var progressPercentage = 50; // Progress pekerjaan dalam persentase

// var progressDate = calculateDate(startDate, durationDays, progressPercentage);
// console.log(progressDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }));
