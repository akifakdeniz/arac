<?php 
	include('../class/configvt.php');	
	include('../class/funct.php');
	$person = Db::getId('tbl_personel', $_GET['ID']);
	$subesecili = Db::getOne('tbl_sube', 'WHERE ID = ?', array($person->subeID));
	
?>
  <!-- content goes here -->
    <form id="frmedit" action="pg/post.edit.ajax.php" method="post">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Personel Düzenleme</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-body">
                    <div class="form-group">
                        <label>Adı Soyadı</label>
                        <input type="text" name="ad" class="form-control" id="ad" value="<?=$person->ad_soyad;?>" required>
                        <input type="hidden" name="ky" class="form-control" value="2">
                        <input type="hidden" name="ID" class="form-control" value="<?=$person->ID;?>">
                    </div>
                      <!-- /.form group -->
                
                    <div class="form-group">
                        <label>Unvan</label>
                        <input type="text" name="unvan" class="form-control" id="unv" required="required" value="<?=$person->unvan;?>">
                    </div>
                      <!-- /.form group -->
                    
                    <div class="form-group">
                    <label>Şubesi</label>
                    <select name="sube" class="form-control">
                        <?php
							$secili = "";
							if($subesecili->ID==$person->subeID) {$secili = " selected='selected'";}
							echo "<option value='".$subesecili->ID."' ".$secili.">".subeID($person->subeID)."</option>";
							$subeler = Db::getAll('tbl_sube', 'WHERE ID <> ?', array($subesecili->ID));
							foreach ($subeler as $sube) {
							 echo "<option value='".$sube->ID."'>".$sube->sube."</option>";
							}
						?>
                    </select>
                    </div>
                      <!-- /.form group -->
                      
                    <div class="form-group">
                        <input type="button" class="btn btn-success personduzenle" value="Düzenlemeyi Kaydet"> 
                    </div>
                      <!-- /.form group -->
	          </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    	</div>
    </div>
  </form>
	<script type="text/javascript">
    $(function(){
  		$('#frmedit').on('click', '.personduzenle', function(){ 
			$("#Aktif").modal('show');	
			 $.ajax({
				type: 'POST',
		        url:  'pg/post.edit.php',
				data: $('#frmedit').serialize(),
			 	success: function(html){    
				if(html=='true'){
					setTimeout(function() {
					$('#veriler').load('pg/list_personel.php');	
					$("#Aktif").fadeOut('slow');
					}, 1000);
					}else{
					alert('Form Hatası');
				}},
				error: function(){
					// alert(response)
					alert('Form Hatası');
				}
			});
				$("#Aktif").modal('hide');
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
