<div class="row">
	<div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Data</h5>

            <!-- General Form Elements -->
            <form method="post" action="<?=base_url();?>dashboard/product/ubah" enctype="multipart/form-data">
            	<input type="hidden" name="id" value="<?=$data['uuid'];?>">
            	<input type="hidden" name="old_banner" value="<?=$data['banner'];?>">

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control" value="<?=$data['name'];?>" required>
                    </div>
                </div>                

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" rows="5" required><?=$data['description'];?></textarea>
                    </div>
                </div>

                <div class="row mb-5">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Banner</label>
                      <div class="col-sm-4">
                      	<img src="<?=base_url();?>assets/dashboard/img/product/<?=$data['banner'];?>" alt="" class="img-fluid mb-3">
                        <input class="form-control" type="file" name="banner" id="formFile">
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