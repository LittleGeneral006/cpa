<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// template
$routes->get('/template', 'Template::index');
$routes->get('/template/get_pengaturan', 'Template::get_pengaturan');
// dashboard
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
// setup web/ pengaturan
$routes->get('/setup-web', 'Pengaturan::index');
$routes->post('/pengaturan/edit_pengaturan', 'Pengaturan::edit_pengaturan');
// unit kerja
$routes->get('/unit-kerja', 'unit_kerja::v_unit_kerja');
$routes->get('/unit_kerja/tabel_unit', 'unit_kerja::tabel_unit');
$routes->get('/unit_kerja/get_unit_tanpa_konsolidasi', 'unit_kerja::get_unit_tanpa_konsolidasi');
$routes->post('/unit_kerja/simpan_unit', 'unit_kerja::simpan_unit');
$routes->get('/unit_kerja/get_tabel_unit_by_id/(:any)', 'unit_kerja::get_tabel_unit_by_id/$1');
$routes->post('/unit_kerja/edit_unit', 'unit_kerja::edit_unit');
$routes->get('/unit_kerja/get_unit', 'unit_kerja::get_unit');
$routes->get('/unit_kerja/get_unit_by_id/(:any)', 'unit_kerja::get_unit_by_id/$1');

// login/ user
$routes->get('/login', 'User::index');
$routes->get('/logout', 'User::logout');
$routes->get('/user/gambar_login', 'User::gambar_login');
$routes->post('/user/proses_login', 'User::proses_login');
$routes->get('/user/cek_pw_default', 'User::cek_pw_default');
$routes->post('/user/proses_ganti_pw_default', 'User::proses_ganti_pw_default');

$routes->get('/setup-user', 'User::v_user');
$routes->get('/user/tabel_user', 'User::tabel_user');
$routes->get('/user/get_level', 'User::get_level');
$routes->get('/user/get_unit', 'User::get_unit');
$routes->post('/user/simpan_user', 'User::simpan_user');
$routes->get('/user/get_tabel_user_by_id/(:any)', 'User::get_tabel_user_by_id/$1');
$routes->post('/user/edit_user', 'User::edit_user');

// profil
$routes->get('/edit-profil', 'Profil::index');
$routes->get('/profil/get_tabel_user_by_id', 'Profil::get_tabel_user_by_id');
$routes->post('/profil/ganti_password', 'Profil::ganti_password');

// level
$routes->get('/setup-level', 'Level::index');
$routes->get('/level/tabel_level', 'Level::tabel_level');
$routes->post('/level/simpan_level', 'Level::simpan_level');
$routes->get('/level/get_tabel_level_by_id/(:any)', 'level::get_tabel_level_by_id/$1');
$routes->post('/level/edit_level', 'Level::edit_level');
$routes->get('/level/permission', 'Level::permission');

// menu
$routes->get('/setup-menu', 'Menu::index');
$routes->get('/menu/tabel_menu', 'Menu::tabel_menu');
$routes->get('/menu/get_maping_detail_menu/(:any)', 'Menu::get_maping_detail_menu/$1');
$routes->post('/menu/simpan_menu', 'Menu::simpan_menu');
$routes->get('/menu/get_tabel_menu_by_id/(:any)', 'Menu::get_tabel_menu_by_id/$1');
$routes->post('/menu/edit_menu', 'Menu::edit_menu');

$routes->post('/menu/simpan_child_menu', 'Menu::simpan_child_menu');
$routes->get('/menu/get_child_menu_by_id/(:any)', 'Menu::get_child_menu_by_id/$1');
$routes->get('/menu/get_kd_menu', 'Menu::get_kd_menu');
$routes->post('/menu/edit_child_menu', 'Menu::edit_child_menu');

// otoritas
$routes->get('/setup-otoritas', 'Otoritas::v_otoritas');
$routes->get('/otoritas/tabel_otoritas', 'Otoritas::tabel_otoritas');
$routes->get('/otoritas/get_level', 'Otoritas::get_level');
$routes->get('/otoritas/get_menu', 'Otoritas::get_menu');
$routes->get('/otoritas/get_child', 'Otoritas::get_child');
$routes->get('/otoritas/get_menu_edit', 'Otoritas::get_menu_edit');
$routes->post('/otoritas/simpan_otoritas', 'Otoritas::simpan_otoritas');
$routes->post('/otoritas/simpan_child', 'Otoritas::simpan_child');
$routes->get('/otoritas/get_tabel_otoritas_by_id/(:any)', 'Otoritas::get_tabel_otoritas_by_id/$1');
$routes->post('/otoritas/edit_otoritas', 'Otoritas::edit_otoritas');

// permission
$routes->get('/permission', 'Permission::index');
$routes->get('/permission/tabel_permission', 'Permission::tabel_permission');
$routes->post('/permission/simpan_permission', 'Permission::simpan_permission');
$routes->get('/permission/get_tabel_permission_by_id/(:any)', 'Permission::get_tabel_permission_by_id/$1');
$routes->post('/permission/edit_permission', 'Permission::edit_permission');

//pajak
$routes->get('/pajak', 'Pajak::v_pajak');
$routes->get('/pajak/tabel_pajak', 'Pajak::tabel_pajak');
$routes->post('/pajak/simpan', 'Pajak::simpan');
$routes->get('/pajak/get_data_by_id/(:any)', 'Pajak::get_data_by_id/$1');
$routes->post('/pajak/edit', 'Pajak::edit');

// assign
$routes->get('/assign', 'Assign::index');
$routes->get('/assign/tabel_assign', 'Assign::tabel_assign');
$routes->get('/assign/get_permission', 'Assign::get_permission');
$routes->post('/assign/simpan_assign', 'Assign::simpan_assign');
$routes->get('/assign/get_tabel_assign_by_id/(:any)', 'Assign::get_tabel_assign_by_id/$1');
$routes->post('/assign/edit_assign', 'Assign::edit_assign');

// pengajuan kredit transaksional
$routes->get('/pengajuan-kredit-transaksional', 'Pengajuan::v_pengajuan');
$routes->get('/pengajuan/tabel_pengajuan', 'Pengajuan::tabel_pengajuan');
// simpan pengajuan
$routes->post('/pengajuan/simpan_pengajuan', 'Pengajuan::simpan_pengajuan');
$routes->get('/pengajuan/dokumen', 'Pengajuan::dokumen');
// edit data entry
$routes->get('/edit-pengajuan-kredit-transaksional/(:any)', 'Pengajuan::edit_pengajuan/$1');
$routes->get('/dokumen-kontrak-proyek/(:any)', 'Pengajuan::lihat_dokumen/$1');
$routes->post('/pengajuan/edit_data_entry', 'Pengajuan::edit_data_entry');
$routes->post('/pengajuan/paraf_data_entry', 'Pengajuan::paraf_data_entry');
$routes->post('/pengajuan/paraf_fcr', 'Pengajuan::paraf_fcr');
$routes->post('/pengajuan/paraf_fcr_usaha', 'Pengajuan::paraf_fcr_usaha');
$routes->post('/pengajuan/paraf_fcr_agunan', 'Pengajuan::paraf_fcr_agunan');
$routes->post('/pengajuan/paraf_dokumen_ceklis', 'Pengajuan::paraf_dokumen_ceklis');
$routes->post('/pengajuan/paraf_scoring', 'Pengajuan::paraf_scoring');
$routes->get('/pengajuan/cek_agunan/(:any)', 'Pengajuan::cek_agunan/$1');

$routes->get('/pengajuan/tampil_btn_finish/(:any)', 'Pengajuan::tampil_btn_finish/$1');
$routes->get('/pengajuan/tampil_disposisi/(:any)', 'Pengajuan::tampil_disposisi/$1');

// $routes->get('/pengajuan/getGlobal/(:any)', 'Pengajuan::getGlobal/$1');
$routes->post('/pengajuan/getGlobal', 'Pengajuan::getGlobal');
$routes->post('/pengajuan/edit_file', 'Pengajuan::edit_file');
// edit fcr
$routes->post('/pengajuan/edit_fcr', 'Pengajuan::edit_fcr');
// edit fcr usaha
$routes->post('/pengajuan/edit_fcr_usaha', 'Pengajuan::edit_fcr_usaha');
$routes->post('/pengajuan/get_perulangan', 'Pengajuan::get_perulangan');
// edit fcr agunan
$routes->post('/pengajuan/edit_fcr_agunan', 'Pengajuan::edit_fcr_agunan');
$routes->get('/lihat-gambar-situasi/(:any)/(:any)', 'Pengajuan::lihat_gambar/$1/$2');
$routes->get('/edit_status_gambar/(:any)/(:any)', 'Pengajuan::edit_status_gambar/$1/$2');
// $routes->post('/pengajuan/edit_gambar', 'Pengajuan::edit_gambar');
$routes->post('/pengajuan/edit_gambar/(:any)', 'Pengajuan::edit_gambar/$1');

$routes->get('/pengajuan/get_data_entry/(:any)', 'Pengajuan::get_data_entry/$1');
$routes->post('/pengajuan/edit_return', 'Pengajuan::edit_return');

$routes->get('/pengajuan/get_tabel_return/(:any)', 'Pengajuan::get_tabel_return/$1');
$routes->post('/pengajuan/edit_reject', 'Pengajuan::edit_reject');

$routes->post('/pengajuan/edit_fcr_agunan_bangunan', 'Pengajuan::edit_fcr_agunan_bangunan');
$routes->post('/pengajuan/convert_base64/', 'Pengajuan::convert_base64');

$routes->post('/pengajuan/edit_fcr_agunan_bb', 'Pengajuan::edit_fcr_agunan_bb');
// edit dokumen ceklist
$routes->get('/dokumen-pendukung/(:any)/(:any)', 'Pengajuan::dokumen_pendukung/$1/$2');

$routes->post('/pengajuan/edit_dokumen', 'Pengajuan::edit_dokumen');
// edit scoring
// $routes->get('/dokumen-pendukung/(:any)/(:any)', 'Pengajuan::dokumen_pendukung/$1/$2');
$routes->post('/pengajuan/edit_scoring', 'Pengajuan::edit_scoring');
$routes->post('/pengajuan/edit_scoring_koor', 'Pengajuan::edit_scoring_koor');
// recap
// $routes->get('/pengajuan/coba_recap', 'Pengfajuan::coba_recap');
$routes->post('/pengajuan/edit_recap', 'Pengajuan::edit_recap');
$routes->post('/pengajuan/edit_faa', 'Pengajuan::edit_faa');
// finish
$routes->post('/pengajuan/edit_finish', 'Pengajuan::edit_finish');
$routes->post('/pengajuan/finish_fcr', 'Pengajuan::finish_fcr');
$routes->post('/pengajuan/finish_fcr_usaha', 'Pengajuan::finish_fcr_usaha');
// $routes->post('/pengajuan/finish_fcr_agunan', 'Pengajuan::finish_fcr_agunan');
$routes->post('/pengajuan/finish_fcr_agunan_tanah', 'Pengajuan::finish_fcr_agunan_tanah');
$routes->post('/pengajuan/finish_fcr_agunan_bangunan', 'Pengajuan::finish_fcr_agunan_bangunan');
$routes->post('/pengajuan/finish_fcr_agunan_bb', 'Pengajuan::finish_fcr_agunan_bb');

$routes->post('/pengajuan/finish_scoring', 'Pengajuan::finish_scoring');
// nomor aplikasi kredit
$routes->get('/pengajuan/generate_nomor', 'Pengajuan::generate_nomor');
$routes->get('/pengajuan/hitung_sla/(:any)', 'Pengajuan::hitung_sla/$1');
// nomor fcr
$routes->get('/pengajuan/generate_nomor_fcr', 'Pengajuan::generate_nomor_fcr');
// no pak
$routes->get('/pengajuan/generate_no_pak', 'Pengajuan::generate_no_pak');
// generate dokumen
$routes->get('/generate-dokumen/(:any)/(:any)', 'Pengajuan::cetak_dokumen/$1/$2');
$routes->get('/pengajuan/generate_fcr/(:any)/(:any)', 'Pengajuan::generate_fcr/$1/$2');
$routes->post('/recap/(:any)', 'Pengajuan::checkDataRecap/$1');

// pemroses
$routes->get('/pemroses', 'Pemroses::v_pemroses');
$routes->get('/pemroses/tabel_pemroses', 'Pemroses::tabel_pemroses');
$routes->post('/pemroses/simpan_pemroses', 'Pemroses::simpan_pemroses');
$routes->get('/pemroses/get_tabel_pemroses_by_id/(:any)', 'Pemroses::get_tabel_pemroses_by_id/$1');
$routes->post('/pemroses/edit_pemroses', 'Pemroses::edit_pemroses');
$routes->get('/pemroses/get_tabel_pemroses_by_unit', 'Pemroses::get_tabel_pemroses_by_unit');

//koordinator
$routes->post('pengajuan/edit_fak_data', 'Pengajuan::edit_fak_data');
$routes->post('pengajuan/edit_fak_modal', 'Pengajuan::edit_fak_modal');
$routes->post('pengajuan/edit_fak_rl', 'Pengajuan::edit_fak_rl');
$routes->post('pengajuan/edit_lap_rl', 'Pengajuan::edit_lap_rl');
$routes->post('pengajuan/edit_ceftb', 'Pengajuan::edit_ceftb');
$routes->post('pengajuan/edit_mauk', 'Pengajuan::edit_mauk');
$routes->post('pengajuan/edit_dcl', 'Pengajuan::edit_dcl');

$routes->get('/laporan-rl/(:any)/(:any)', 'Pengajuan::lihat_file_proyeksi_rl/$1/$2');


// penarikan kredit transaksional
$routes->get('/penarikan-kredit-transaksional', 'Penarikan::v_penarikan');
$routes->get('/penarikan/tabel_penarikan', 'Penarikan::tabel_penarikan');
// simpan penarikan
$routes->post('/penarikan/simpan_penarikan', 'Penarikan::simpan_penarikan');
$routes->get('/penarikan/dokumen', 'Penarikan::dokumen');
// edit data entry
$routes->get('/edit-penarikan-kredit-transaksional/(:any)', 'Penarikan::edit_penarikan/$1');
$routes->get('/ajax-penarikan-kredit-transaksional/get_jumlah_termin_dropdown', 'Penarikan::get_jumlah_termin_dropdown');
$routes->get('/dokumen-kontrak-proyek/(:any)', 'Penarikan::lihat_dokumen/$1');
$routes->post('/penarikan/edit_data_entry', 'Penarikan::edit_data_entry');
$routes->post('/penarikan/paraf_data_entry', 'Penarikan::paraf_data_entry');
$routes->post('/penarikan/paraf_fcr', 'Penarikan::paraf_fcr');
$routes->post('/penarikan/paraf_fcr_usaha', 'Penarikan::paraf_fcr_usaha');
$routes->post('/penarikan/paraf_fcr_agunan', 'Penarikan::paraf_fcr_agunan');
$routes->post('/penarikan/paraf_dokumen_ceklis', 'Penarikan::paraf_dokumen_ceklis');
$routes->post('/penarikan/paraf_scoring', 'Penarikan::paraf_scoring');
$routes->get('/penarikan/cek_agunan/(:any)', 'Penarikan::cek_agunan/$1');

$routes->get('/penarikan/tampil_btn_finish/(:any)', 'Penarikan::tampil_btn_finish/$1');
$routes->get('/penarikan/tampil_disposisi/(:any)', 'Penarikan::tampil_disposisi/$1');

// $routes->get('/penarikan/getGlobal/(:any)', 'Penarikan::getGlobal/$1');
$routes->post('/penarikan/getGlobal', 'Penarikan::getGlobal');
$routes->post('/penarikan/edit_file', 'Penarikan::edit_file');
// edit fcr
$routes->post('/penarikan/edit_fcr', 'Penarikan::edit_fcr');
// edit fcr usaha
$routes->post('/penarikan/edit_fcr_usaha', 'Penarikan::edit_fcr_usaha');
$routes->post('/penarikan/get_perulangan', 'Penarikan::get_perulangan');
// edit fcr agunan
$routes->post('/penarikan/edit_fcr_agunan', 'Penarikan::edit_fcr_agunan');
$routes->get('/lihat-gambar-situasi/(:any)/(:any)', 'Penarikan::lihat_gambar/$1/$2');
$routes->get('/edit_status_gambar/(:any)/(:any)', 'Penarikan::edit_status_gambar/$1/$2');
// $routes->post('/penarikan/edit_gambar', 'Penarikan::edit_gambar');
$routes->post('/penarikan/edit_gambar/(:any)', 'Penarikan::edit_gambar/$1');

$routes->get('/penarikan/get_data_entry/(:any)', 'Penarikan::get_data_entry/$1');
$routes->post('/penarikan/edit_return', 'Penarikan::edit_return');

$routes->get('/penarikan/get_tabel_return/(:any)', 'Penarikan::get_tabel_return/$1');
$routes->post('/penarikan/edit_reject', 'Penarikan::edit_reject');

$routes->post('/penarikan/edit_fcr_agunan_bangunan', 'Penarikan::edit_fcr_agunan_bangunan');
$routes->post('/penarikan/convert_base64/', 'Penarikan::convert_base64');

$routes->post('/penarikan/edit_fcr_agunan_bb', 'Penarikan::edit_fcr_agunan_bb');
// edit dokumen ceklist
$routes->get('/dokumen-pendukung/(:any)/(:any)', 'Penarikan::dokumen_pendukung/$1/$2');
$routes->post('/penarikan/edit_dokumen', 'Penarikan::edit_dokumen');
// edit scoring
// $routes->get('/dokumen-pendukung/(:any)/(:any)', 'Penarikan::dokumen_pendukung/$1/$2');
$routes->post('/penarikan/edit_scoring', 'Penarikan::edit_scoring');
$routes->post('/penarikan/edit_scoring_koor', 'Penarikan::edit_scoring_koor');
// recap
// $routes->get('/penarikan/coba_recap', 'Pengfajuan::coba_recap');
$routes->post('/penarikan/edit_recap', 'Penarikan::edit_recap');
$routes->post('/penarikan/edit_faa', 'Penarikan::edit_faa');
// finish
$routes->post('/penarikan/edit_finish', 'Penarikan::edit_finish');
$routes->post('/penarikan/finish_fcr', 'Penarikan::finish_fcr');
$routes->post('/penarikan/finish_fcr_usaha', 'Penarikan::finish_fcr_usaha');
// $routes->post('/penarikan/finish_fcr_agunan', 'Penarikan::finish_fcr_agunan');
$routes->post('/penarikan/finish_fcr_agunan_tanah', 'Penarikan::finish_fcr_agunan_tanah');
$routes->post('/penarikan/finish_fcr_agunan_bangunan', 'Penarikan::finish_fcr_agunan_bangunan');
$routes->post('/penarikan/finish_fcr_agunan_bb', 'Penarikan::finish_fcr_agunan_bb');

$routes->post('/penarikan/finish_scoring', 'Penarikan::finish_scoring');
// nomor aplikasi kredit
$routes->get('/penarikan/generate_nomor', 'Penarikan::generate_nomor');
$routes->get('/penarikan/hitung_sla/(:any)', 'Penarikan::hitung_sla/$1');
// nomor fcr
$routes->get('/penarikan/generate_nomor_fcr', 'Penarikan::generate_nomor_fcr');
// no pak
$routes->get('/penarikan/generate_no_pak', 'Penarikan::generate_no_pak');
// generate dokumen
$routes->get('/generate-dokumen/(:any)/(:any)', 'Penarikan::cetak_dokumen/$1/$2');
$routes->get('/penarikan/generate_fcr/(:any)/(:any)', 'Penarikan::generate_fcr/$1/$2');
$routes->post('/recap/(:any)', 'Penarikan::checkDataRecap/$1');

// pemroses
$routes->get('/pemroses', 'Pemroses::v_pemroses');
$routes->get('/pemroses/tabel_pemroses', 'Pemroses::tabel_pemroses');
$routes->post('/pemroses/simpan_pemroses', 'Pemroses::simpan_pemroses');
$routes->get('/pemroses/get_tabel_pemroses_by_id/(:any)', 'Pemroses::get_tabel_pemroses_by_id/$1');
$routes->post('/pemroses/edit_pemroses', 'Pemroses::edit_pemroses');
$routes->get('/pemroses/get_tabel_pemroses_by_unit', 'Pemroses::get_tabel_pemroses_by_unit');

//koordinator
$routes->post('penarikan/edit_fak_data', 'Penarikan::edit_fak_data');
$routes->post('penarikan/edit_fak_modal', 'Penarikan::edit_fak_modal');
$routes->post('penarikan/edit_fak_rl', 'Penarikan::edit_fak_rl');
$routes->post('penarikan/edit_lap_rl', 'Penarikan::edit_lap_rl');
$routes->post('penarikan/edit_ceftb', 'Penarikan::edit_ceftb');
$routes->post('penarikan/edit_mauk', 'Penarikan::edit_mauk');
$routes->post('penarikan/edit_dcl', 'Penarikan::edit_dcl');

// data rejected
$routes->get('/data-rejected', 'Rejected::v_data_rejected');
$routes->get('/rejected/tabel_rejected', 'Rejected::tabel_rejected');
