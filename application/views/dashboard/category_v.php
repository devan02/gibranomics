<div class="row">
    <?php if($this->session->flashdata('200')){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data berhasil disimpan
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <?php if($this->session->flashdata('404')){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Kategori tidak ada dalam sistem
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <?php if($this->session->flashdata('400')){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Kategori sudah terpakai di dalam artikel
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

     <!-- FORM ADD DATA -->
     <div class="card">
        <div class="card-body">
            <h5 class="card-title" id="title_form">Tambah Kategori</h5>

            <!-- General Form Elements -->
            <form method="post" action="<?=base_url();?>dashboard/category/submit">
                <input type="hidden" name="id_edit" id="id_edit" value="">
                <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="category" id="category" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <button type="reset" class="btn btn-danger" onclick="window.location.reload()"><i class="ri-close-fill"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="ri-save-3-fill"></i> Simpan</button>
                    </div>
                </div>
            </form>
            <!-- End General Form Elements -->
        </div>
    </div>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Kategori</h5>
            <!-- Bordered Table -->
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                foreach($datas as $key => $field){
                ?>
                    <tr>
                        <td><?=$key + 1;?></td>
                        <td><?=$field->category;?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" onclick="get_detail('<?=$field->slug;?>','edit');"><i class="bi bi-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="get_detail('<?=$field->slug;?>','delete');" data-bs-toggle="modal" data-bs-target="#modal_hapus"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                <?php
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
            <form action="<?php echo base_url(); ?>dashboard/category/delete" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    Anda yakin ingin menghapus <i id="msg_del"></i> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Ya</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    
});

function get_detail(slug, type) {
    $.getJSON('<?=base_url();?>dashboard/category/get_detail',{slug:slug}, function(response){
        if(type == 'edit'){
            $('#id_edit').val(slug);
            $('#category').val(response['category']);
            $('#title_form').html('Ubah Kategori');
        }else{
            $('#id_delete').val(slug);
            $('#title_form').html('Tambah Kategori');
            $('#category').val("");
            $('#msg_del').html(response['category']);
        }
    });
}
</script>