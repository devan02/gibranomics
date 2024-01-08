<div class="row">
    <?php if($this->session->flashdata('200')){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil disimpan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Artikel</h5>
            <?php if($status == 'trash'){ ?>
            <p>
                <a href="<?=base_url();?>dashboard/news"><i class="ri-arrow-left-line"></i> Kembali</a>
            </p>
            <?php }else{ ?>
            <p>Total sampah Anda ada (<?=number_format($trash);?>), klik <a href="<?=base_url();?>dashboard/news/trash">disini</a> untuk melihat</p>
            <?php } ?>
            <!-- Bordered Table -->
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tgl Publish</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($data) > 0){
                            foreach ($data as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            <a href="<?=base_url();?>dashboard/news/detail/<?=$value->uuid;?>">
                                <?=$value->title;?>                                
                            </a>
                        </td>
                        <td><?=$value->fullname;?></td>
                        <td><?=$this->master_m->parseStatus($value->status);?></td>
                        <td><?=$this->master_m->parseLongDateTime($value->published_at);?></td>
                        <td>
                            <?php if($status == 'trash'){ ?>
                            <button type="button" class="btn btn-sm btn-info btn_restore" onclick="click_article('<?=$value->uuid;?>','restore');" data-bs-toggle="modal" data-bs-target="#modal_popup" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Restore">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </button>
                            <?php } ?>

                            <button type="button" class="btn btn-sm btn-danger btn_hapus" onclick="click_article('<?=$value->uuid;?>','<?=$status;?>');" data-bs-toggle="modal" data-bs-target="#modal_popup">
                                <i class="bi bi-trash"></i>
                            </button>
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
<div class="modal fade" id="modal_popup" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_modal" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_modal" id="id_modal" class="form-control">
                    <p id="msg">-</p>
                    <?php if($status == 'trash'){ ?>
                    <div class="form-check d-none" id="msg_permanen">
                        <input class="form-check-input" type="checkbox" id="gridCheck" checked disabled>
                        <label class="form-check-label" for="gridCheck">
                            Artikel ini akan dihapus secara permanen
                        </label>
                    </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_modal" class="btn">-</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i> Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script type="text/javascript">
function click_article(id,status) {
    $.post('<?=base_url();?>dashboard/news/get_data', {id:id}, function(response){
        $('#id_modal').val(id);

        if(status == ''){
            $('#msg').html('Anda yakin ingin menghapus artikel <i>'+response['title']+'</i>?');
            $('#btn_modal').html('<i class="bi bi-trash"></i> Ya');
            $('#btn_modal').addClass('btn-danger');
            $('#btn_modal').removeClass('btn-info');
            $('#msg_permanen').removeClass('d-none');
            $('#form_modal').attr('action', '<?php echo base_url(); ?>dashboard/news/delete_data');
            return;
        }

        if(status == 'trash'){
            $('#msg').html('Anda yakin ingin menghapus artikel <i>'+response['title']+'</i>?');
            $('#btn_modal').html('<i class="bi bi-trash"></i> Ya');
            $('#btn_modal').addClass('btn-danger');
            $('#btn_modal').removeClass('btn-info');
            $('#msg_permanen').removeClass('d-none');
            $('#form_modal').attr('action', '<?php echo base_url(); ?>dashboard/news/delete_data/'+status);
            return;
        }

        if(status == 'restore'){
            $('#msg').html('Anda yakin ingin mengembalikan artikel <i>'+response['title']+'</i>?');
            $('#btn_modal').html('<i class="bi bi-cloud-arrow-up-fill"></i> Ya');
            $('#btn_modal').addClass('btn-info');
            $('#btn_modal').removeClass('btn-danger');
            $('#msg_permanen').addClass('d-none');
            $('#form_modal').attr('action', '<?php echo base_url(); ?>dashboard/news/restore_data');
            return;
        }
    }, "json");
}
</script>