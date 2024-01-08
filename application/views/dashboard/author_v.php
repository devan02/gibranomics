<div class="row">
    <?php if($this->session->flashdata('200')){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil disimpan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <!-- TABLE -->
    <div class="card" id="table_author">
        <div class="card-body">
            <div class="d-flex flex-row">
                <h5 class="card-title">Data Author</h5>
                <div class="d-flex align-items-center ms-auto">
                    <button type="button" class="btn btn-primary" id="btn_add">
                        <i class="bi bi-plus"></i> Tambah Data
                    </button>
                </div>
            </div>

            <!-- Bordered Table -->
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
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
                        <td scope="row">
                            <img src="<?=$photo;?>" alt="" class="img-table" onerror="src='<?=base_url();?>assets/dashboard/img/profile-img.jpg'">
                        </td>
                        <td>
                            <?=$value->author_name;?><br>
                            <small>
                                <?php echo (!empty($value->title) ? $value->title : '') ;?>                                
                            </small>
                        </td>
                        <td><?=$value->email;?></td>
                        <td><?=$value->phone;?></td>
                        <td><?=$value->specialist;?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger btn_hapus" onclick="getdata_au(<?=$value->id;?>);" data-bs-toggle="modal" data-bs-target="#modal_hapus"><i class="bi bi-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-primary btn_ubah" onclick="getdata_au(<?=$value->id;?>);"><i class="bi bi-pencil"></i></button>
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
    <div class="card d-none" id="add_author">
        <div class="card-body">
            <h5 class="card-title">Tambah Data Author</h5>

            <!-- General Form Elements -->
            <form method="post" action="<?=base_url();?>dashboard/author/simpan" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="author_name" id="author_name" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" id="title" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file" name="photo" id="formFile" required>
                      </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" id="phone" class="form-control" value="" maxlength="13" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Spesialis</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="specialist" id="specialist" aria-label="Pilih Spesialis" required>
                        <option selected>--Pilih--</option>
                        <?php
                            if(count($data_sp) > 0){
                            foreach ($data_sp as $key => $value) {
                        ?>
                        <option value="<?=$value->specialist;?>"><?=$value->specialist;?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" rows="5" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <button type="reset" class="btn btn-danger btn_batal"><i class="ri-close-fill"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-fill"></i> Simpan</button>
                    </div>
                </div>
            </form>
            <!-- End General Form Elements -->
        </div>
    </div>

    <!-- FORM EDIT DATA -->
    <div class="card d-none" id="edit_author">
        <div class="card-body">
            <h5 class="card-title">Ubah Data Kelas</h5>
            <!-- General Form Elements -->
            <form method="post" action="<?=base_url();?>dashboard/author/ubah" enctype="multipart/form-data">
                <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                <input type="hidden" name="photo_edit" id="photo_edit" class="form-control">
                
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                      <div class="col-sm-6">
                        <img src="" alt="" class="rounded-circle mb-3" id="img-view" onerror="src='<?=base_url();?>assets/dashboard/img/profile-img.jpg'">
                        <input class="form-control" type="file" name="photo_e" id="formFile">
                      </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="author_name_e" id="author_name_e" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title_e" id="title_e" class="form-control" value="" required>
                    </div>
                </div>                

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone_e" id="phone_e" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email_e" id="email_e" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Spesialis</label>
                  <div class="col-sm-3">
                    <select class="form-select specialist_e" name="specialist_e" id="specialist_e" aria-label="Pilih Tipe" required>
                      <option selected>--Pilih--</option>
                      <?php
                            if(count($data_sp) > 0){
                            foreach ($data_sp as $key => $value) {
                        ?>
                        <option value="<?=$value->specialist;?>"><?=$value->specialist;?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_e" id="description_e" rows="5" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <button type="reset" class="btn btn-danger btn_batal_ubah"><i class="ri-close-fill"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-fill"></i> Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modal_hapus" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>dashboard/author/hapus" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <input type="hidden" name="img_delete" id="img_delete" class="form-control">
                    Anda yakin ingin menghapus <i id="name_del"></i> ?
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
$(document).ready(function(){
    $('#btn_add').click(function(){
        $('#add_author').removeClass('d-none');
        $('#table_author').addClass('d-none');
        $('#edit_author').addClass('d-none');
    });

    $('.btn_batal').click(function(){
        $('#add_author').addClass('d-none');
        $('#table_author').removeClass('d-none');
        $('#edit_author').addClass('d-none');
    });

    $('.btn_ubah').click(function(){
        $('#add_author').addClass('d-none');
        $('#table_author').addClass('d-none');
        $('#edit_author').removeClass('d-none');
    });

    $('.btn_batal_ubah').click(function(){
        $('#add_author').addClass('d-none');
        $('#table_author').removeClass('d-none');
        $('#edit_author').addClass('d-none');
    });

});

function getdata_au(id_author) {

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>dashboard/author/get_data_nya",
        data: {
            id_au : id_author,
        },
        dataType: "json",
        success: function(dt_author){
            //Data Update
            $('#id_edit').val(dt_author.id);
            $('#photo_edit').val(dt_author.photo);
            $('#author_name_e').val(dt_author.author_name);
            $('#title_e').val(dt_author.title);
            $('#phone_e').val(dt_author.phone);
            $('#email_e').val(dt_author.email);
            $('#specialist_e').val(dt_author.specialist);
            $('#description_e').val(dt_author.description);
            
            //Data Delete
            $('#id_delete').val(dt_author.id);
            $('#img_delete').val(dt_author.photo);
            $('#name_del').html('<b>'+dt_author.author_name+'</b>');

            var src = "<?=base_url();?>assets/dashboard/img/author/"+dt_author.photo;
            $('#img-view').attr('src', src);
        }
    });

}
</script>

<style type="text/css">
#img-view{
    height: 120px;
    width: 120px;
}
</style>