<div class="row">
    <!-- TABLE -->
    <div class="card" id="table_specialist">
        <div class="card-body">
            <div class="d-flex flex-row">
                <h5 class="card-title">Data Spesialis</h5>
                <div class="d-flex align-items-center ms-auto">
                    <button type="button" class="btn btn-primary" id="btn_add" data-bs-toggle="modal" data-bs-target="#modal_add">
                        <i class="bi bi-plus"></i> Tambah Data
                    </button>
                </div>
            </div>

            <!-- Bordered Table -->
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">Spesialis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($data) > 0){
                            foreach ($data as $key => $value) {
                                $photo = (!empty($value->photo)) ? base_url().'assets/dashboard/img/author/'.$value->photo : base_url().'assets/dashboard/img/class/cardpattern1.png';
                    ?>
                    <tr>
                        <td><?=$value->specialist;?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger btn_hapus" onclick="getdata_sp(<?=$value->id;?>);" data-bs-toggle="modal" data-bs-target="#modal_hapus"><i class="bi bi-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-primary btn_ubah" onclick="getdata_sp(<?=$value->id;?>);" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="bi bi-pencil"></i></button>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <!-- End Bordered Table -->

        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modal_add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>dashboard/specialist/simpan" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Spesialist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="specialist" id="specialist" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="ri-save-3-fill"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i> Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>dashboard/specialist/ubah" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Spesialis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_specialist" id="id_specialist" class="form-control">
                    <input type="text" name="specialist_e" id="specialist_e" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="ri-save-3-fill"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i> Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_hapus" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>dashboard/specialist/hapus" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Spesialis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <input type="hidden" name="img_delete" id="img_delete" class="form-control">
                    Anda yakin ingin menghapus <i id="judul_del"></i> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i> Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function getdata_sp(id_specialist) {

        $.ajax({
            type: "POST",
            url: "<?=base_url();?>dashboard/specialist/get_data_nya",
            data: {
                id_sp : id_specialist,
            },
            dataType: "json",
            success: function(dt_specialist){
                //Data Update
                $('#id_specialist').val(dt_specialist.id);
                $('#specialist_e').val(dt_specialist.specialist);
                
                //Data Delete
                $('#id_delete').val(dt_specialist.id);
                $('#judul_del').html('<b>'+dt_specialist.specialist+'</b>');
            }
        });

    }
</script>