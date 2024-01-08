<form method="post" action="<?=base_url();?>dashboard/classmeet/simpan" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6">		
			<div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Tambah Data Kelas</h5>
		            <!-- General Form Elements -->
	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Nama Kelas</label>
	                    <div class="col-sm-10">
	                        <input type="text" name="title" id="title" class="form-control" value="" required>
	                    </div>
	                </div>

	                <div class="row mb-3">
	                    <label for="inputNumber" class="col-sm-2 col-form-label">Banner</label>
	                      <div class="col-sm-10">
	                        <input class="form-control" type="file" name="banner" id="formFile">
	                      </div>
	                </div>

	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Materi</label>
	                    <div class="col-sm-10">
	                        <input type="text" name="materi" id="materi" class="form-control" value="" required>
	                    </div>
	                </div>

	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
	                    <div class="col-sm-10">
	                        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
	                    </div>
	                </div>

	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Durasi</label>
	                    <div class="col-sm-4">
	                        <div class="input-group mb-3">
	                          <input type="text" name="hours" class="form-control num_only hours" value="" placeholder="Jam" aria-label="Jam" maxlength="2" required>
	                          <span class="input-group-text">:</span>
	                          <input type="text" name="minutes" class="form-control num_only minutes" value="" placeholder="Menit" aria-label="Menit" maxlength="2" required>
	                        </div>
	                    </div>
	                </div>

	                <div class="row mb-3">
	                  <label class="col-sm-2 col-form-label">Tipe</label>
	                  <div class="col-sm-3">
	                    <select class="form-select" name="type" aria-label="Pilih Tipe" required>
	                      <option selected>--Pilih--</option>
	                      <option value="individual">Individual</option>
	                      <option value="intermediate">Intermediate</option>
	                      <option value="corporate">Corporate</option>
	                    </select>
	                  </div>
	                </div>

	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
	                    <div class="col-sm-3">
	                        <div class="input-group mb-3">
	                            <span class="input-group-text">Rp</span>
	                            <input type="text" name="price" class="form-control" value="" aria-label="Harga Kelas" maxlength="10" required onkeyup="FormatCurrency(this)">
	                        </div>
	                    </div>
	                </div>

	                <div class="row mb-3">
	                    <label for="inputText" class="col-sm-2 col-form-label">Periode</label>
	                    <div class="col-sm-6">
	                       	<div class="input-group d-flex flex-row gap-2">
							    <input type="date" name="start_date" class="start-date form-control" value="">
							    <span class="input-group-addon py-1">s/d</span>
							    <input type="date" name="end_date" class="end-date form-control" value="">
							</div>
	                    </div>
	                </div>
		        </div>
		    </div>

		    <div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Overview</h5>
		            
		            <div class="row mb-3">
	                    <div class="col-sm-12">
	                        <textarea class="tinymce-editor" name="overview"></textarea>
	                    </div>
	                </div>
		        </div>
		    </div>

			<div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Myth and Fact</h5>
		            
		            <div class="row mb-3">	                   
	                    <div class="col-sm-12 d-flex flex-column gap-3">
	                        <input type="text" id="myth" class="form-control" value="" placeholder="Myth">
	                        <input type="text" id="fact" class="form-control" value="" placeholder="Fact">
	                    </div>
	                </div>

	                <div class="row mb-3">
	                    <div class="col-sm-12 d-flex justify-content-end">
	                        <button type="button" class="btn btn-primary" onclick="add_myth_fact();">Tambah</button>
	                    </div>
	                </div>

	                <div class="row mb-3">
	                	<div class="col-sm-12">
	                        <table class="table" id="tabel_myth_fact">
	                        	<thead>
	                        		<tr>
	                        			<th>Myth</th>
	                        			<th>Fact</th>
	                        			<th>#</th>
	                        		</tr>
	                        	</thead>
	                        	<tbody>
	                        	
	                        	</tbody>
	                        </table>
	                    </div>
	                </div>
		        </div>
		    </div>		    
		</div>

		<div class="col-md-6">
			<div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Program</h5>
		            
		            <div class="row mb-3">
	                    <div class="col-sm-12">
	                        <textarea class="tinymce-editor-2" name="program" rows="3"></textarea>
	                    </div>
	                </div>
		        </div>
		    </div>

		    <div class="card">
		        <div class="card-body">
		            <h5 class="card-title">Skill</h5>
		            
		            <div class="row">
	                    <div class="col-sm-12 mb-3">	                        
	                      	<input type="text" class="form-control" id="skill" value="">	                       
	                    </div>
	                    <div class="d-flex flex-row flex-wrap gap-2" id="temp_skill">
	                    
	                    </div>
	                </div>
		        </div>
		    </div>

		    <div class="card">
		        <div class="card-body">
		            <h5 class="card-title">FAQ</h5>
		            
		            <div class="row mb-3">
	                    <div class="col-sm-12 d-flex flex-column gap-3">
	                        <input type="text" class="form-control" id="question" value="" placeholder="Pertanyaan">
	                        <input type="text" class="form-control" id="answer" value="" placeholder="Jawaban">
	                    </div>
	                </div>

	                <div class="row mb-3">
	                	<div class="col-sm-12 d-flex justify-content-end">
	                		<button type="button" class="btn btn-primary" onclick="add_faq();">Tambah</button>
	                	</div>
	                </div>

	                <div class="row mb-3">
	                	<table class="table" id="tabel_faq">
	                		<thead>
	                			<tr>
	                				<th>Question</th>
	                				<th>Answer</th>
	                				<th>#</th>
	                			</tr>
	                		</thead>
	                        <tbody>
                        	
                        	</tbody>
                        </table>
	                </div>
		        </div>
		    </div>	

		    <div class="card">
		    	<div class="card-body">
		    		<h5 class="card-title">Mentor</h5>
					<div class="row pb-4">
			            <label for="inputText" class="col-sm-2 col-form-label">List</label>
			            <div class="col-sm-10">
			                <select class="form-select" name="author" id="author" aria-label="Pilih Tipe" onchange="click_author(this);">
			                  <option selected>--Pilih--</option>
			                  <?php
			                        if(count($dt_author) > 0){
			                        foreach ($dt_author as $key => $value) {
			                    ?>
			                    <option value="<?=$value->id;?>"><?=$value->author_name;?> - <?=$value->specialist;?></option>
			                    <?php
			                            }
			                        }
			                    ?>
			                </select>
			            </div>
			        </div>
			        <div class="row" id="temp_author">
			        
				    </div>
		    	</div>
		    </div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<a class="btn btn-danger" href="<?=base_url();?>dashboard/classmeet">Batal</a>
			<button type="submit" class="btn btn-primary"><i class="ri-save-3-fill"></i> Simpan</button>
		</div>
	</div>
</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#skill").on('keydown', function (e) {
	    if (e.keyCode === 13) {
	        var skill_val = $('#skill').val();

			$elm = '<div class="d-flex">'+
					'<button type="button" class="btn btn-light mb-2">'+skill_val+
					'&nbsp;<span class="badge bg-secondary text-light" role="button" onclick="deleteRow(this)"><i class="bi bi-x"></i></span>'+
					'<input type="hidden" name="skill[]" value="'+skill_val+'">'+
				'</button>'+
			'</div>';

			$('#temp_skill').append($elm);
			$('#skill').val("");

	    	e.preventDefault();
	    }
	});	
});

function add_myth_fact() {
	var myth = $('#myth').val();
	var fact = $('#fact').val();

	$elm = '<tr>'+
    		'	<td>'+myth+'</td>'+
    		'	<td>'+fact+'</td>'+
    		'	<td>'+
    		'		<input type="hidden" name="myth[]" value="'+myth+'">'+
    		'		<input type="hidden" name="fact[]" value="'+fact+'">'+
    		'		<button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>'+
    		'	</td>'+
    		'</tr>';

	$('#tabel_myth_fact tbody').append($elm);

	$('#myth').val("");
	$('#fact').val("");
}

function add_faq() {
	var question = $('#question').val();
	var answer = $('#answer').val();

	$elm = '<tr>'+
    		'	<td>'+question+'</td>'+
    		'	<td>'+answer+'</td>'+
    		'	<td>'+
    		'		<input type="hidden" name="question[]" value="'+question+'">'+
    		'		<input type="hidden" name="answer[]" value="'+answer+'">'+
    		'		<button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>'+
    		'	</td>'+
    		'</tr>';

	$('#tabel_faq tbody').append($elm);
	$('#question').val("");
	$('#answer').val("");
}

function deleteRow(btn) {
	var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function click_author(obj) {	
	var id = obj.value;

	$.getJSON('<?=base_url();?>dashboard/classmeet/author_row', {id:id}, function(row){

		var elm_author = $('#author_'+id).length;

		if(elm_author > 0){
			alert('Author sudah ada');
			return;
		}else{

			var url_img = '<?=base_url();?>assets/dashboard/img/';
			var img = (row['photo']) ? url_img+'author/'+row['photo'] : url_img+'no-image.png';
			var url_error = url_img+'no-image.png';

			$elm = '<div class="col-xl-4" id="author_'+row['id']+'">'+
			        '  <div class="card">'+
			        '    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">'+
			        '		<input type="hidden" name="author[]" value="'+row['id']+'">'+
			        '      <img src="'+img+'" alt="Profile" class="rounded-circle w-50 mb-2" onerror="src='+url_error+'">'+
			        '      <h5>'+row['author_name']+'</h5>'+
			        '      <h6>'+row['title']+'</h6>'+
			        '      <button type="button" class="btn btn-danger btn-sm" onclick="deleteAuthor('+row['id']+')"><i class="bi bi-trash"></i> Hapus</button>'+
			        '    </div>'+
			        '  </div>'+
			        '</div>';

			$('#temp_author').append($elm);

		}
		
	});
}

function deleteAuthor(id) {
	$('#author_'+id).remove();
}
</script>