<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Daftar Menu</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
    <div class="col-lg-3 text-right">
        <br>

        <button id="tambah_menu" class="btn-primary btn-sm" onclick="tambah_menu()"><i class="fa fa-plus">
            </i>&nbsp;&nbsp;<span class="bold">Tambah Data</span></button>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <!-- <h5>Basic Data Tables example with responsive plugin</h5> -->

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table id="tabel_menu" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->

                                    <th></th>
                                    <th>Id Menu</th>
                                    <th>Kd Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Nama View</th>
                                    <th>Status</th>
                                    <th>Icon Menu</th>
                                    <th>Routes</th>
                                    <!-- <th>Aksi</th> -->
                                    <th>Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div id="modal_menu_tambah" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form id="form_menu_tambah" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Menu</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Kd Menu</label>
                        <div class="col-lg-4">
                            <input id="kd_menu_tambah" name="kd_menu_tambah" type="number" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Nama Menu</label>
                        <div class="col-lg-4">
                            <input id="nama_menu_tambah" name="nama_menu_tambah" type="text" placeholder="" class="form-control" required>

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama View</label>
                        <div class="col-lg-4">
                            <input id="nama_view_tambah" name="nama_view_tambah" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="status_tambah" name="status_tambah">
                                <option value="0" selected="" disabled="">pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>


                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Icon Menu</label>
                        <div class="col-lg-4">
                            <input id="icon_menu_tambah" name="icon_menu_tambah" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Routes</label>
                        <div class="col-lg-4">
                            <input id="routes_tambah" name="routes_tambah" type="text" placeholder="" class="form-control" required>

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Controller</label>
                        <div class="col-lg-4">
                            <input id="controller_tambah" name="controller_tambah" type="text" placeholder="Opsional" class="form-control">

                        </div>
                        <div class="col-lg-6">
                            <p>Controller ditulis dengan huruf kecil semua</p>
                            <p>Jika controller memuat tanda underscore ( _ ), maka tanda tersebut diganti dengan tanda minus ( - )</p>

                        </div>

                    </div>


                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btns_921" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="modal_menu_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form id="form_menu_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Menu</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Kd Menu</label>
                        <div class="col-lg-4">
                            <input id="kd_menu_edit" name="kd_menu_edit" type="number" placeholder="" class="form-control" required readonly>
                        </div>
                        <label class="col-lg-2 control-label">Nama Menu</label>
                        <div class="col-lg-4">
                            <input id="nama_menu_edit" name="nama_menu_edit" type="text" placeholder="" class="form-control" required>

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama View</label>
                        <div class="col-lg-4">
                            <input id="nama_view_edit" name="nama_view_edit" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="status_edit" name="status_edit">
                                <option value="0" disabled="">pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>


                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Icon Menu</label>
                        <div class="col-lg-4">
                            <input id="icon_menu_edit" name="icon_menu_edit" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Routes</label>
                        <div class="col-lg-4">
                            <input id="routes_edit" name="routes_edit" type="text" placeholder="" class="form-control" required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Controller</label>
                        <div class="col-lg-4">
                            <input id="controller_edit" name="controller_edit" type="text" placeholder="Opsional" class="form-control">

                        </div>
                        <div class="col-lg-6">
                            <p>Controller ditulis dengan huruf kecil semua</p>
                            <p>Jika controller memuat tanda underscore ( _ ), maka tanda tersebut diganti dengan tanda minus ( - )</p>

                        </div>

                    </div>
                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btns_921" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="modal_menu_detail" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Detail Menu</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">

                                    <h2 class="text-center">Detail Menu <span id="nama_menu_detail"></span></h2>


                                    <div class="clients-list">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-home"></i> Menu</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>

                                                                <tr>
                                                                    <td class="font-weight-bold">Id Menu</td>
                                                                    <td id="did_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kd menu</td>
                                                                    <td id="dkd_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama menu</td>
                                                                    <td id="dnama_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama View</td>
                                                                    <td id="dnama_view"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Status</td>
                                                                    <td id="dstatus"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Icon Menu</td>
                                                                    <td id="dicon_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Routes</td>
                                                                    <td id="droutes"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Controller</td>
                                                                    <td id="dcontroller"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div id="702_fb" class="modal-footer">
                    <button type="button" class="btn btn-danger cabut-readonly" data-dismiss="modal">Tutup</button>
                    <!-- <input id="btns_702" class="btn btn-sm btn-primary m-t-n-xs" type="submit" value="Hapus"> -->

                </div>
            </div>
            <!-- </form> -->

        </div>
    </div>
</div>
<!-- tambah child menu -->
<div id="modal_menu_tambah2" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form id="form_menu_tambah2" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Tambah Child Menu</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Kd Menu</label>
                        <div class="col-lg-4">
                            <input id="kd_menu_tambah2" name="kd_menu_tambah2" type="number" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Fry Menu</label>
                        <div class="col-lg-4">
                            <input id="fry_menu_tambah2" name="fry_menu_tambah2" type="text" placeholder="" class="form-control" required readonly>

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama Menu</label>
                        <div class="col-lg-4">
                            <input id="nama_menu_tambah2" name="nama_menu_tambah2" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Nama View</label>
                        <div class="col-lg-4">
                            <input id="nama_view_tambah2" name="nama_view_tambah2" type="text" placeholder="" class="form-control" required>

                        </div>


                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="status_tambah2" name="status_tambah2">
                                <option value="0" selected="" disabled="">pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>


                        </div>
                        <label class="col-lg-2 control-label">Icon Menu</label>
                        <div class="col-lg-4">
                            <input id="icon_menu_tambah2" name="icon_menu_tambah2" type="text" placeholder="" class="form-control" required>

                        </div>


                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Routes</label>
                        <div class="col-lg-4">
                            <input id="routes_tambah2" name="routes_tambah2" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Controller</label>
                        <div class="col-lg-4">
                            <input id="controller_tambah2" name="controller_tambah2" type="text" placeholder="Opsional" class="form-control">

                        </div>

                    </div>
                    <div class="form-group row">
                        
                        <div class="col-lg-12">
                            <p>Controller ditulis dengan huruf kecil semua</p>
                            <p>Jika controller memuat tanda underscore ( _ ), maka tanda tersebut diganti dengan tanda minus ( - )</p>

                        </div>

                    </div>


                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btns_921" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- edit child menu -->
<div id="modal_menu_edit2" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form id="form_menu_edit2" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Edit Child Menu</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Kd Menu</label>
                        <div class="col-lg-4">
                            <input id="kd_menu_edit2" name="kd_menu_edit2" type="number" placeholder="" class="form-control" required readonly>

                        </div>
                        <label class="col-lg-2 control-label">Fry Menu</label>
                        <div class="col-lg-4">
                            <select class="form-control select" id="fry_menu_edit2" name="fry_menu_edit2" required>
                                <!-- blm di generate dari controller -->

                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Nama Menu</label>
                        <div class="col-lg-4">
                            <input id="nama_menu_edit2" name="nama_menu_edit2" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Nama View</label>
                        <div class="col-lg-4">
                            <input id="nama_view_edit2" name="nama_view_edit2" type="text" placeholder="" class="form-control" required>

                        </div>


                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-4">
                            <select class="form-control class-disabled select" required id="status_edit2" name="status_edit2">
                                <option value="0" disabled="">pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>


                        </div>
                        <label class="col-lg-2 control-label">Icon Menu</label>
                        <div class="col-lg-4">
                            <input id="icon_menu_edit2" name="icon_menu_edit2" type="text" placeholder="" class="form-control" required>

                        </div>


                    </div>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label">Routes</label>
                        <div class="col-lg-4">
                            <input id="routes_edit2" name="routes_edit2" type="text" placeholder="" class="form-control" required>

                        </div>
                        <label class="col-lg-2 control-label">Controller</label>
                        <div class="col-lg-4">
                            <input id="controller_edit2" name="controller_edit2" type="text" placeholder="Opsional" class="form-control">

                        </div>

                    </div>
                    <div class="form-group row">
                        
                        <div class="col-lg-6">
                            <p>Controller ditulis dengan huruf kecil semua</p>
                            <p>Jika controller memuat tanda underscore ( _ ), maka tanda tersebut diganti dengan tanda minus ( - )</p>

                        </div>

                    </div>


                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <input id="btns_921" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- detail child menu -->
<div id="modal_menu_detail2" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="modal-header" style="padding:10px">
                    <h3 class="modal-title">Detail Child Menu</h3>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">

                                    <h2 class="text-center">Detail Child Menu <span id="nama_menu_detail2"></span></h2>


                                    <div class="clients-list">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-home"></i>Child Menu</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>

                                                                <tr>
                                                                    <td class="font-weight-bold">Id Menu</td>
                                                                    <td id="dchild_id_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Kd menu</td>
                                                                    <td id="dchild_kd_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Fry menu</td>
                                                                    <td id="dchild_fry_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama menu</td>
                                                                    <td id="dchild_nama_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Nama View</td>
                                                                    <td id="dchild_nama_view"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Status</td>
                                                                    <td id="dchild_status"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Icon Menu</td>
                                                                    <td id="dchild_icon_menu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Routes</td>
                                                                    <td id="dchild_routes"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bold">Controller</td>
                                                                    <td id="dchild_controller"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div id="702_fb" class="modal-footer">
                    <button type="button" class="btn btn-danger cabut-readonly" data-dismiss="modal">Tutup</button>
                    <!-- <input id="btns_702" class="btn btn-sm btn-primary m-t-n-xs" type="submit" value="Hapus"> -->

                </div>
            </div>
            <!-- </form> -->

        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script>
    var table = [];
    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';


    $(document).ready(function() {

        var table = $('#tabel_menu').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>/menu/tabel_menu/",
            "columnDefs": [{
                    "targets": 0,
                    "width": "1%",
                    "class": 'details-control-itemmaping',
                    "orderable": false,
                    "data": null,
                    "defaultContent": '<span class="label label-default"><i class="fa fa-chevron-down"></i></span>'
                },
                {
                    "targets": 1,
                    "width": "15%"
                },
                {
                    "targets": 2,
                    "width": "15%"
                },
                {
                    "targets": 3,
                    "width": "15%"
                },
                {
                    "targets": 4,
                    "width": "15%"
                },
                {
                    "targets": 5,
                    "width": "15%"
                },
                {
                    "targets": 6,
                    "width": "15%"
                },
                {
                    "targets": 7,
                    "width": "15%"
                },
                {
                    "targets": 8,
                    "width": "15%"
                },

            ],
            "aoColumns": [{
                    "bSortable": false
                },
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {
                    "bSortable": false
                }
            ],
            "dom": '<"html5buttons"B>lTfgitp',
            "lengthMenu": [
                ['15', '25', '50', '100', '10000000000'],
                ['15', '25', '50', '100', 'All'],
            ],
            "buttons": [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5, 6, 7] // kolom 1, dan 2 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5, 6, 7] // kolom 0, 2, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Daftar Menu',
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5, 6, 7] // kolom 0, 3, 4, 5, 6, 7, dan 6 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Daftar Menu',
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5, 6, 7] // kol1, da akan di-export
                    }
                },
                {
                    "extend": 'print',
                    "customize": function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5, 6, 7] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });
        // detail mapping
        // Add event listener for opening and closing details
        $('#tabel_menu tbody').on('click', 'td.details-control-itemmaping', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data_row = table.row($(this).parents('tr')).data();

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();

                $.ajax({
                    type: "GET",
                    async: false,
                    dataType: "json",
                    url: "<?php echo base_url(); ?>menu/get_maping_detail_menu/" + data_row[2],
                    success: function(data) {
                        if (data.length > 0) {
                            var row = '';
                            for (var i = 0; i < data.length; i++) {

                                row = '<tr>' +

                                    '<td  width="15%">' + data[i][0] + '</td>' + //no add bank
                                    '<td  width="15%">' + data[i][1] + '</td>' + // no add pihak
                                    '<td  width="15%">' + data[i][2] + '</td>' + // tgl ttd
                                    '<td  width="15%">' + data[i][3] + '</td>' + // perhial
                                    '<td  width="15%">' + data[i][4] + '</td>' + // tgl awal
                                    '<td  width="15%">' + data[i][5] + '</td>' + // tgl akhir
                                    '<td  width="15%">' + data[i][6] + '</td>' + // status jt
                                    '<td  width="15%">' + data[i][7] + '</td>' + // status
                                    '<td  width="15%">' + data[i][8] + '</td>' + // status
                                    // '<td  width="15%"><span class="label label-primary" id="edit_maping" onclick="edit_maping(\'' + data[i][0] + '\')"><i class="fa fa-pencil" data-toggle="tooltip" title="Edit Addendum"></i></span> <span class="label label-primary" id="edit_maping" onclick="edit_maping(\'' + data[i][0] + '\')"><i class="fa fa-pencil" data-toggle="tooltip" title="Edit Addendum"></i></span></td>' +
                                    '</tr>';
                                $("#maping_item" + data_row[2]).append(row);
                            }
                        }

                    }
                });

                tr.addClass('shown');
            }
        });
        // batas detail mapping

        // panggil modal edit
        $('#tabel_menu tbody ').on('click', '#edit_menu', function() {

            document.getElementById("form_menu_edit").reset();
            $("#modal_menu_edit").modal('show')
            var data = table.row($(this).parents('tr')).data();

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>menu/get_tabel_menu_by_id/" + data[2],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#kd_menu_edit').val(data.kd_menu);
                    $('#nama_menu_edit').val(data.nama_menu);
                    $('#nama_view_edit').val(data.nama_view);
                    $('#status_edit').val(data.status);
                    $('#icon_menu_edit').val(data.icon_menu);
                    $('#routes_edit').val(data.routes);
                    $('#controller_edit').val(data.controller);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data untuk modal edit menu");
                }
            });
            // batas baru
        });
        // panggil modal detail
        $('#tabel_menu tbody ').on('click', '#detail_menu', function() {

            $("#modal_menu_detail").modal('show')
            var data = table.row($(this).parents('tr')).data();

            // baru
            $.ajax({
                url: "<?php echo base_url() ?>menu/get_tabel_menu_by_id/" + data[2],
                type: "get",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var data = response.data
                    $('#did_menu').html(data.id_menu);
                    $('#dkd_menu').html(data.kd_menu);
                    $('#dnama_menu').html(data.nama_menu);
                    $('#nama_menu_detail').html(data.nama_menu);
                    $('#dnama_view').html(data.nama_view);
                    $('#dstatus').html(data.status_warna);
                    $('#dicon_menu').html(data.icon_menu);
                    $('#droutes').html(data.routes);
                    $('#dcontroller').html(data.controller);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Gagal mendapatkan data untuk modal detail menu");
                }
            });
            // batas baru
        });
        // panggil modal tambah child menu
        // addendum
        $('#tabel_menu tbody ').on('click', '#tambah_menu2', function() {

            document.getElementById("form_menu_tambah2").reset();
            var data = table.row($(this).parents('tr')).data();
            $('#fry_menu_tambah2').val(data[2]);

            $("#modal_menu_tambah2").modal('show')

        });

    });

    //SETUP DETAIL
    function format(d) {

        var table = '<table class="table" id="maping_item' + d[2] + '">' +
            '<thead>' +
            '<tr>' +
            '<th>Id Menu</th>' +
            '<th>Kd Menu</th>' +
            '<th>fry Menu</th>' +
            '<th>Nama Menu</th>' +
            '<th>Nama View</th>' +
            '<th>Status</th>' +
            '<th>Icon Menu</th>' +
            '<th>Routes</th>' +
            '<th>Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>' +
            '</tr>' +

            '</thead>' +
            '<tbody ></tbody>' +
            '</table>';
        return table;
    }
    // muncul modal tambah menu
    function tambah_menu() {
        document.getElementById("form_menu_tambah").reset();
        $("#modal_menu_tambah").modal('show')
    }
    //proses tambah menu
    $("#form_menu_tambah").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>menu/simpan_menu",
                data: $("#form_menu_tambah").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_menu_tambah").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Simpan Data Berhasil', 'Berhasil')
                        $('#tabel_menu').DataTable().ajax.reload();
                    } else {
                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    //proses edit menu
    $("#form_menu_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>menu/edit_menu",
                data: $("#form_menu_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_menu_edit").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Data Berhasil', 'Berhasil')
                        $('#tabel_menu').DataTable().ajax.reload();
                    } else {
                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    //proses tambah child menu
    $("#form_menu_tambah2").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>menu/simpan_child_menu",
                data: $("#form_menu_tambah2").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_menu_tambah2").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Simpan Child Menu Berhasil', 'Berhasil')
                        $('#tabel_menu').DataTable().ajax.reload();
                    } else {
                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    // memanggil modal edit child
    function edit_child(d) {
        var kd_menu = d;
        document.getElementById("form_menu_edit2").reset();
        $("#modal_menu_edit2").modal('show')
        // baru
        $.ajax({
            url: "<?php echo base_url() ?>menu/get_child_menu_by_id/" + kd_menu,
            type: "get",
            dataType: "JSON",
            success: function(response) {
                console.log(response)
                var data = response.data
                $('#kd_menu_edit2').val(data.kd_menu);
                // $('#fry_menu_edit2').val(data.fry_menu);
                $('#nama_menu_edit2').val(data.nama_menu);
                $('#nama_view_edit2').val(data.nama_view);
                $('#status_edit2').val(data.status);
                $('#icon_menu_edit2').val(data.icon_menu);
                $('#routes_edit2').val(data.routes);
                $('#controller_edit2').val(data.controller);

                var fry_menu = data.fry_menu;
                // console.log(kd_menu);

                $.ajax({
                    url: "<?php echo base_url('menu/get_kd_menu'); ?>",
                    type: "get",
                    dataType: "JSON",
                    success: function(data) {
                        var options = data.menu;
                        var select = $('#fry_menu_edit2');

                        select.empty();
                        // Tambahkan opsi "Pilih" yang dipilih dan dinonaktifkan
                        var defaultOption = new Option('Pilih', '', true, true);
                        $(defaultOption).prop('disabled', true);
                        select.append(defaultOption);

                        $.each(options, function(index, option) {
                            var newOption = new Option(option.kd_menu + ' - ' + option.nama_menu, option.kd_menu, false, false);
                            if (option.kd_menu === fry_menu) {
                                $(newOption).prop('selected', true);
                            }
                            select.append(newOption);
                        });

                        select.select2({
                            placeholder: 'Pilih',
                            dropdownParent: $('#fry_menu_edit2').parent()
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Error get data");
                    }
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal mengisi data modal edit child menu");
            }
        });

    }
    //proses edit child menu
    $("#form_menu_edit2").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>menu/edit_child_menu",
                data: $("#form_menu_edit2").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $("#modal_menu_edit2").modal('hide')
                        $('#mohon').hide()
                        toastr.success('Edit Data Child Menu Berhasil', 'Berhasil')
                        $('#tabel_menu').DataTable().ajax.reload();
                    } else {
                        toastr.warning(d, 'Gagal')
                        $('#mohon').hide()
                    }
                }
            })
        }
    });
    // memanggil modal detail child
    function detail_child(d) {
        var kd_menu = d;
        $("#modal_menu_detail2").modal('show')
        // baru
        $.ajax({
            url: "<?php echo base_url() ?>menu/get_child_menu_by_id/" + kd_menu,
            type: "get",
            dataType: "JSON",
            success: function(response) {
                console.log(response)
                var data = response.data
                $('#dchild_id_menu').html(data.id_menu);
                $('#dchild_kd_menu').html(data.kd_menu);
                $('#dchild_fry_menu').html(data.fry_menu);
                $('#dchild_nama_menu').html(data.nama_menu);
                $('#nama_menu_detail2').html(data.nama_menu);
                $('#dchild_nama_view').html(data.nama_view);
                $('#dchild_status').html(data.status_warna);
                $('#dchild_icon_menu').html(data.icon_menu);
                $('#dchild_routes').html(data.routes);
                $('#dchild_controller').html(data.controller);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal mengisi data modal detail child menu");
            }
        });

    }
</script>

<?= $this->endSection(); ?>