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

$routes->get('/pengajuan-kredit-transaksional', 'Transaksional::v_pengajuan');
$routes->get('/pengajuan/tabel_pengajuan', 'Transaksional::tabel_pengajuan');
$routes->get('/tambah-pengajuan-kredit-transaksional', 'Transaksional::tambah_pengajuan');

$routes->get('/penarikan-kredit-transaksional', 'Transaksional::v_penarikan');
$routes->get('/penarikan/tabel_penarikan', 'Transaksional::tabel_penarikan');
$routes->get('/tambah-penarikan-kredit-transaksional', 'Transaksional::tambah_penarikan');
