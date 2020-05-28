   <div class="col-md-12">
        <div class="col-md-8" id="veriler">
        </div>
    </div>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
    $(function(){
	$('#veriler').load('pg/list_sube.php');
	$(document).on('click', '.amir_ekle', function(){ 
	$("#formekle").modal('hide');
		$.ajax({
			type: 'POST',
			data: $('#frmkl').serialize(),
			url:  'pg/post.ajax.php?ky=6',
			success: function(html){    
			if(html=='true'){
 			 	$("#frmkl")[0].reset();
				$('#veriler').load('pg/list_sube.php').fadeIn("slow");
				}else{
				alert('Form Hatası');
				}},
				error: function(){
				alert('Form Hatası');
				}
			});
		
		});
		//*
		
		$(document).on('click', '.ekle', function(){  
			$('#formekle').modal('show');
    	});
		//*

		$(document).on('click', '.duzenle', function(){  
			var ID = $(this).attr('id');
			var sube = $(this).attr('psube');
			$('#frmdznl').modal('show');
			$('#result').val(ID);
			$('#sube').val(sube);
		});
		//*
		$(document).on('click', '.sil', function(){  
			var ID = $(this).attr('id');
			$.ajax({
				type: 'POST',
		        url:  'pg/post.delete.php?ky=6&ID='+ID,
				success: function(html){    
				if(html=='true'){
					$('#Aktif').modal('show');
					setTimeout(function() {
					$('#veriler').load('pg/list_sube.php').fadeIn("slow");
					$("#Aktif").modal('hide');
					}, 3000);
					}else{
						alert('Form Hatası');
				}},
				error: function(){
					// alert(response)
					alert('Form Hatası');
				}
			});
			
			
			});
		//*
		
		$('#frmedit').on('click', '.kaydet', function(){ 
		$('#frmdznl').modal('hide'); 
			 $.ajax({
				type: 'POST',
		        url:  'pg/post.edit.php?ky=6',
				data: $('#frmedit').serialize(),
			 	success: function(html){    
				if(html=='true'){
					setTimeout(function() {
					$("#Aktif").modal('show');
					}, 1000);
					setTimeout(function() {
					$("#Aktif").modal('hide');
					$('#veriler').load('pg/list_sube.php').fadeIn("slow");
					}, 3000);
					}else{
						alert('Form Hatası');
				}},
				error: function(){
					// alert(response)
					alert('Form Hatası');
				}
			});
		});		
		//*

    });
    </script>
	<div class="modal fade" id="Aktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">Sistem Mesajı</h4>
               </div>
               <div class="modal-body">
                  <!-- content goes here -->
                  <form id="PersonEkle" method="post">
                     <input type="hidden" name="txtId" id="txtId" value="">
                     <div class="skin-minimal">
                        <div class="col-md-12 col-sm-12 text-center">
                           <h5><b></b> <br/><br/>İşlem kayıt ediliyor.<br/>Lütfen Bekleyiniz.</h5>
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12" align="center">
                    	
                     </div>
                     <div class="clearfix"></div>
                  </form>
               </div>
            </div>
         </div>
    </div>
    <div class="modal fade" id="frmdznl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">Sistem Mesajı</h4>
               </div>
               <div class="modal-body">
                  <!-- content goes here -->
                    <form id="frmedit" action="#" method="post">
                     <div class="box box-info">
                        <div class="box-header">
                          <h3 class="box-title">Şube Formu</h3>
                        </div>
                        <div class="box-body">
                        <div class="col-sm-8">
                        <div class="form-group">
                            <label>Şube Adı</label>
                            <input type="text" name="ad" class="form-control" id="sube" required>
                            <input type="hidden" name="ky" class="form-control" value="6">
                            <input type="hidden" name="ID" class="form-control" id="result">
                        </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="button" class="btn btn-success kaydet" value="Düzenlemeyi Kaydet"> 
                        </div>
                          <!-- /.form group -->
                        </div>  
                    
                          </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </form>
               </div>
            </div>
         </div>
    </div>
    <div class="modal fade" id="formekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">Sistem Mesajı</h4>
               </div>
               <div class="modal-body">
                  <!-- content goes here -->
                    <form id="frmkl" action="#" method="post">
                     <div class="box box-info">
                        <div class="box-header">
                          <h3 class="box-title">Şube Bilgiler</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-8">
                            <div class="form-group">
                                <label>Şube Adı</label>
                                <input type="text" name="ad" class="form-control" id="veriad">
                                <input type="hidden" name="ky" class="form-control" id="veriad" value="6" required="required">
                            </div>
                              <!-- /.form group -->
                            </div>
                            <div class="col-md-8">  
                            <div class="form-group">
                                <input type="button" class="btn btn-success amir_ekle" value="Bilgileri Kaydet">
                            </div>
                              <!-- /.form group -->
                            </div>
                          </div>
                        <!-- /.box-body -->
                     </div>
                  <!-- /.box -->
            		</form>
               </div>
            </div>
         </div>
    </div>
