<?= $this->extend('template/v_template'); ?>
<?= $this->section('plugin'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Rejected</h2>
        <!-- <strong>Data Tables</strong> -->
    </div>
    <div class="col-lg-2 text-right">
        <br>
        
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
                        <table id="tabel_rejected" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!-- yang di tampilkan-->
                                    <th>Nama Debitur</th>
                                    <th>NPWP Debitur</th>
                                    <th>Jenis Kredit</th>
                                    <th>Waktu Reject</th>
                                    <th>Catatan</th>
                                    <th>Direject Oleh</th>
                                    <th>Level</th>
                                    <th>Progress</th>
                                    <th>Posisi Progress</th>
                                    <th>Unit Kerja</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
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

        var table = $('#tabel_rejected').DataTable({
            "responsive": true,
            "processing": true,
            // "searching": false,
            "serverSide": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url() ?>rejected/tabel_rejected",
            "columnDefs": [{
                    "targets": 0,
                    "width": "15%"
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
                {
                    "targets": 9,
                    "width": "15%"
                },


            ],
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            ],
            "dom": '<"html5buttons"B>lTfgitp',
            "lengthMenu": [
                ['15', '25', '50', '100', '-1'],
                ['15', '25', '50', '100', 'All'],
            ],
            "buttons": [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] // kolom 0, 1, dan 2 akan di-export
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] // kolom 0, 2, da akan di-export
                    }
                },
                {
                    "extend": 'excel',
                    "title": 'Data Rejected',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] // kolom 0, 3, 4, 5, 6, 7, 8, 9, dan 6, 7, 8, 9 akan di-export
                    }
                },
                {
                    "extend": 'pdf',
                    "title": 'Data Rejected',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] // kolom 1, da akan di-export
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
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] // kolom 0, 2, dan 6 akan di-export
                    }
                }
            ]

        });

    });

</script>

<?= $this->endSection(); ?>