<?= $this->extend('template/v_template'); ?>

<?= $this->section('plugin'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2>Setup Website</h2>

    </div>
    <div class="col-lg-2">
    </div>
</div>


<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Setup Website</h5>

                </div>
                <div class="ibox-content float-e-margins">
                    <p>
                        Menu ini digunakan untuk melakukan setup website
                    </p>

                    <h3 class="font-bold">Klik button dibawah untuk melakukan setup website</h3>
                    <p>

                        <button id="edit_pengaturan" class="btn btn-primary btn-rounded btn-block"><i class="fa fa-cogs"></i> Setup Web</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>
<div id="modal_pengaturan_edit" class="modal inmodal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: -1;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <form id="form_pengaturan_edit" class="form-horizontal">
                <div class="modal-body">
                    <div class="modal-header" style="padding:10px">
                        <h1 class="modal-title">Setup Web</h1>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Singkatan Web :</label>
                        <div class="col-lg-12">
                            <input id="singkatan_web_edit" name="singkatan_web_edit" type="text" placeholder="" class="form-control" required>
                            <input id="id_edit" name="id_edit" type="hidden" placeholder="" class="form-control">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Judul Web :</label>
                        <div class="col-lg-12">
                            <input id="judul_web_edit" name="judul_web_edit" type="text" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Copyright :</label>
                        <div class="col-lg-12">
                            <input id="copyright_edit" name="copyright_edit" type="text" placeholder="" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row" style="display: none;">
                        <label class="col-lg-12 control-label">Warna Tema :</label>
                        <div class="col-lg-12">
                            <select class="form-control select" required id="warna_tema_edit" name="warna_tema_edit">
                                <option value="" disabled="">pilih</option>
                                <option value="red-bg">Merah</option>
                                <option value="yellow-bg">Kuning</option>
                                <option value="navy-bg">Hijau</option>
                                <option value="blue-bg">Biru</option>
                                <option value="black-bg">Hitam</option>
                                <option value="white-bg">Putih</option>
                                <option value="lazur-bg">Biru Laut</option>
                                <option value="gray-bg">Abu-abu</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div id="921_fb" class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
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
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        //memanggil modal edit pengaturan
        $("#edit_pengaturan").click(function() {
            document.getElementById("form_pengaturan_edit").reset();
            get_pengaturan_edit()
            $("#modal_pengaturan_edit").modal('show')


        });

    });

    function get_pengaturan_edit() {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('template/get_pengaturan'); ?>",
            dataType: "json",
            success: function(response) {
                // console.log(response)
                if (response.status == 'success') {
                    $('#id_edit').val(response.message.id);
                    $('#singkatan_web_edit').val(response.message.singkatan_web);
                    $('#judul_web_edit').val(response.message.judul_web);
                    $('#copyright_edit').val(response.message.copyright);
                    $('#warna_tema_edit').val(response.message.warna_tema);

                } else {
                    alert(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal mendapatkan data pengaturan website");
            }
        });
    }
    //proses edit
    $("#form_pengaturan_edit").validate({
        submitHandler: function(form) {
            $('#mohon').show()
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>pengaturan/edit_pengaturan",
                data: $("#form_pengaturan_edit").serialize(),
                success: function(d) {
                    if (d == '1') {
                        $('#mohon').hide()
                        $("#modal_pengaturan_edit").modal('hide')
                        toastr.success('Edit Setup Berhasil', 'Berhasil')
                        get_pengaturan();
                    } else if (d == '0') {
                        $('#mohon').hide()
                        toastr.warning('Tidak ada data yang dirubah', 'Gagal')
                    } else {
                        $('#mohon').hide()
                        toastr.warning(d, 'Gagal')
                    }
                }
            })
        }
    });
</script>


<?= $this->endSection(); ?>