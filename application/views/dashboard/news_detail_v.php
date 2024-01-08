<form method="post" action="<?=base_url();?>dashboard/news/edit_data" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$id;?>">
	<div class="row">
		<div class="col-md-9">		
			<div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Data</h5>
		            <!-- General Form Elements -->
	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
	                    <div class="col-sm-10">
	                        <input type="text" name="title" id="title" class="form-control" value="<?=$data['title'];?>" required>
	                    </div>
	                </div>

	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
	                    <div class="col-sm-10">
	                        <textarea name="abstract" id="abstract" class="form-control" rows="5" required><?=$data['abstract'];?></textarea>
	                    </div>
	                </div>

					<div class="row mb-3">
	                    <label for="inputNumber" class="col-sm-2 col-form-label">Thumbnail</label>
	                    <div class="col-sm-10">
	                        <input class="form-control" type="file" name="thumbnail" id="formFile">
	                	</div>
	                </div>

                    <div class="row mb-3">
	                    <label for="inputNumber" class="col-sm-2 col-form-label">&nbsp;</label>
	                    <div class="col-sm-10">
	                        <img src="<?=$this->master_m->parseImg($data['thumbnail']);?>" class="img-thumbnail" alt="<?=$data['title'];?>">
                            <input type="hidden" name="old_thumbnail" value="<?=$data['thumbnail'];?>">
	                	</div>
	                </div>

	                <div class="row mb-3">
	                  <label class="col-sm-2 col-form-label">Status</label>
	                  <div class="col-sm-3">
	                    <select class="form-select" name="status" onchange="change_status(this)" required>
	                      <option value="">--Pilih--</option>
	                      <option value="draft" <?=($data['status'] == 'draft') ? 'selected' : '';?>>Draft</option>
	                      <option value="publish" <?=($data['status'] == 'publish') ? 'selected' : '';?>>Publikasikan</option>
	                    </select>
	                  </div>
	                </div>

					<div class="row mb-3 d-none" id="date_publish">
	                    <label for="inputDate" class="col-sm-2 col-form-label">Tgl Publish</label>
	                    <div class="col-sm-10">
	                        <input type="datetime-local" name="published_at" id="published_at" class="form-control">
	                	</div>
	                </div>
		        </div>
		    </div>  
		</div>

		<div class="col-md-3">
		    <div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Kategori</h5>
		            
		            <div class="row">

						<?php
						foreach ($categories as $key => $value) {
                            $tempCategory = $this->model->get_categories_article($article_id, $value->id);
                            $checked = "";

                            if(!empty($tempCategory)){
                                $checked = ($value->id == $tempCategory['category_id']) ? 'checked' : '';
                            }
						?>
						
						<div class="col-sm-12 mb-3 d-flex flex-row gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="category[]" id="gridCheck-<?=$value->id;?>" value="<?=$value->id;?>" onclick="make_primary_category(this)" <?=$checked;?>>
                                <label class="form-check-label" for="gridCheck-<?=$value->id;?>" role="button">
                                    <?=$value->category;?>
                                </label>
                            </div>
							<div id="make-primary-<?=$value->id;?>">
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="make_primary" id="gridRadios-<?=$value->id;?>" value="<?=$value->id;?>" <?=$checked;?>>
                                    <label class="form-check-label" for="gridRadios-<?=$value->id;?>" role="button">Jadikan utama</label>
                                </div>
                                <?php
                                if(!empty($tempCategory)){
                                    if($tempCategory['category_primary'] == 'true'){
                                ?>
                                
                                
                                
                                <?php
                                    }
                                }
                                ?>

							</div>
	                    </div>

						<?php
						}
						?>
	                    
	                </div>
		        </div>
		    </div>
		</div>
	</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Konten</h5>
		            
		            <div class="row mb-3">
	                    <div class="col-sm-12">
	                        <textarea class="tinymce-editor" name="content"><?=$data['content'];?></textarea>
	                    </div>
	                </div>
		        </div>
		    </div>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12 text-center">
			<a class="btn btn-danger" href="<?=base_url();?>dashboard/news">Batal</a>
			<button type="submit" class="btn btn-primary"><i class="ri-save-3-fill"></i> Simpan</button>
		</div>
	</div>
</form>

<script>
function make_primary_category(obj){
	$div = '';
	var check = $(obj).is(":checked");
	var id = obj.value;

	if(check){ 
		$div = '<div class="form-check">'+
					'<input class="form-check-input" type="radio" name="make_primary" id="gridRadios-'+id+'" value="'+id+'">'+
					'<label class="form-check-label" for="gridRadios-'+id+'" role="button">Jadikan utama</label>'+
				'</div>';
	}else{
		$div = '';
	}

	$('#make-primary-'+id).html($div);
}

function change_status(obj){
	var status = obj.value;
	if(status == 'draft'){
		$('#date_publish').removeClass('d-none');
		$('#published_at').attr('required','required');
	}else{
		$('#date_publish').addClass('d-none');
		$('#published_at').removeAttr('required');
	}
}
</script>