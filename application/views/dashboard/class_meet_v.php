<div class="row">
    <!-- TABLE -->
    <div class="card" id="table_class_meet">
        <div class="card-body">
            <div class="d-flex flex-row">
                <h5 class="card-title">Data Kelas</h5>
                <div class="d-flex align-items-center ms-auto">
                    <a class="btn btn-primary" href="<?=base_url();?>dashboard/classmeet/add">
                        <i class="bi bi-plus"></i> Tambah Data
                    </a>
                </div>
            </div>

            <!-- Bordered Table -->
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">Banner</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Type</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($data) > 0){
                            foreach ($data as $key => $value) {
                                $banner = (!empty($value->banner)) ? base_url().'assets/dashboard/img/class/'.$value->banner : base_url().'assets/dashboard/img/class/cardpattern1.png';
                    ?>
                    <tr>
                        <td scope="row">
                            <img src="<?=$banner;?>" alt="" class="img-table">
                        </td>
                        <td>
                            <a href="<?=base_url();?>dashboard/classmeet/detail/<?=$value->uuid;?>">
                                <?=$value->title;?><br>
                                <small><i><?=$value->materi;?></i></small>                                
                            </a>
                        </td>
                        <td><?=substr($value->duration,0,2)."h ".substr($value->duration,3,2)."m ";?></td>
                        <td><?=$value->type;?></td>
                        <td><?=number_format($value->price);?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger btn_hapus" onclick="getdata_cm(<?=$value->id;?>);" data-bs-toggle="modal" data-bs-target="#modal_hapus">
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
<div class="modal fade" id="modal_hapus" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>dashboard/classmeet/hapus" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kelas</h5>
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

<script type="text/javascript">
function getdata_cm (id) {
    $('#id_delete').val(id);
}
</script>