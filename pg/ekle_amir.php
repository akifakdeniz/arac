   <div class="col-md-12">
        <div class="col-md-8" id="veriler">
        </div>
    </div>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
    $(function(){
	$('#veriler').load('pg/list_amir.php');
	$(document).on('click', '.amir_ekle', function(){ 
	$("#formekle").modal('hide');
		$.ajax({
			type: 'POST',
			data: $('#frmkl').serialize(),
			url:  'pg/post.ajax.php?ky=1',
			success: function(html){    
			if(html=='true'){
 			 	$("#frmkl")[0].reset();
				$('#veriler').load('pg/list_amir.php').fadeIn("slow");
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
			var ad = $(this).attr('pad');
			var unv = $(this).attr('unv');
			$('#frmdznl').modal('show');
			$('#result').val(ID);
			$('#ad').val(ad);
			$('#unv').val(unv);
    	});
		//*
		$(document).on('click', '.sil', function(){  
			var ID = $(this).attr('id');
			$.ajax({
				type: 'POST',
		        url:  'pg/post.delete.php?ky=1&ID='+ID,
				success: function(html){    
				if(html=='true'){
					$('#Aktif').modal('show');
					setTimeout(function() {
					$('#veriler').load('pg/list_amir.php').fadeIn("slow");
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
		        url:  'pg/post.edit.php?ky=1',
				data: $('#frmedit').serialize(),
			 	success: function(html){    
				if(html=='true'){
					setTimeout(function() {
					$("#Aktif").modal('show');
					}, 1000);
					setTimeout(function() {
					$("#Aktif").modal('hide');
					$('#veriler').load('pg/list_amir.php').fadeIn("slow");
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
                    <form id="frmedit" action="pg/post.edit.ajax.php" method="post">
                     <div class="box box-info">
                        <div class="box-header">
                          <h3 class="box-title">Amir Personel Bilgileri Düzenleme Formu</h3>
                        </div>
                        <div class="box-body">
                        
                        <div class="form-group">
                            <label>Adı Soyadı</label>
                            <input type="text" name="ad" class="form-control" id="ad" required>
                            <input type="hidden" name="ky" class="form-control" value="1">
                            <input type="hidden" name="ID" class="form-control" id="result" value="">
                        </div>
                          <!-- /.form group -->
                    
                        <div class="form-group">
                            <label>Unvan</label>
                            <input type="text" name="unvan" class="form-control" id="unv" required="required">
                        </div>
                          <!-- /.form group -->
                          
                        <div class="form-group">
                            <input type="button" class="btn btn-success kaydet" value="Düzenlemeyi Kaydet"> 
                        </div>
                          <!-- /.form group -->
                    
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
                    <form id="frmkl" action="pg/post.ajax.php" method="post">
                     <div class="box box-info">
                        <div class="box-header">
                          <h3 class="box-title">Amir Personel Bilgiler</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Adı Soyadı</label>
                                <input type="text" name="ad" class="form-control" id="veriad">
                                <input type="hidden" name="ky" class="form-control" id="veriad" value="1" required="required">
                            </div>
                              <!-- /.form group -->
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Unvan</label>
                                <input type="text" name="unvan" class="form-control" id="veriunvan" required="required">
                            </div>
                              <!-- /.form group -->
                            </div>
                            <div class="col-md-6">  
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