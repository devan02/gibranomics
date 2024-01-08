<div class="row">
    <!-- TABLE -->
    <div class="card" id="table_authorclass">
        <div class="card-body">
            <div class="d-flex flex-row">
                <h5 class="card-title">Data Kelas</h5>
                <div class="d-flex align-items-center ms-auto">
                    <button type="button" class="btn btn-primary" onclick="add_form();">
                        <i class="bi bi-plus"></i> Tambah Data
                    </button>
                </div>
            </div>

            <!-- Bordered Table -->
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">Banner</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($data) > 0){
                            foreach ($data as $key => $value) {
                                $banner = (!empty($value->banner)) ? base_url().'assets/dashboard/img/product/'.$value->banner : base_url().'assets/dashboard/img/class/cardpattern1.png';
                    ?>
                    <tr>
                        <td scope="row">
                            <img src="<?=$banner;?>" alt="" class="img-table">
                        </td>
                        <td><?=$value->name;?></td>
                        <td><?=$value->description;?></td>
                        <td style="white-space: nowrap;">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal_hapus" onclick="klik_hapus(<?=$value->id;?>);"><i class="bi bi-trash"></i></button>
                            <a class="btn btn-sm btn-primary" href="<?=base_url();?>dashboard/product/detail/<?=$value->uuid;?>">
                                <i class="bi bi-pencil"></i>
                            </a>
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

    <!-- FORM ADD DATA -->
    <div class="card d-none" id="add_authorclass">
        <div class="card-body">
            <h5 class="card-title">Tambah Data</h5>

            <!-- General Form Elements -->
            <form method="post" action="<?=base_url();?>dashboard/product/simpan" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control" value="" required>
                    </div>
                </div>                

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" rows="5" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Banner</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file" name="banner" id="formFile" required>
                      </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?=base_url();?>dashboard/product">
                            <i class="ri-close-fill"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-fill"></i> Simpan</button>
                    </div>
                </div>
            </form>
            <!-- End General Form Elements -->
        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modal_hapus" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>dashboard/product/hapus" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    Anda yakin ingin menghapus <i id="judul_del"></i>?
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
function add_form() {
    $('#add_authorclass').removeClass('d-none');
    $('#table_authorclass').hide();
}

function klik_hapus(id) {
    $('#id_delete').val(id);
}

</script>