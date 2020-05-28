<?php

	$durum 	= Db::count('tbl_gorev','WHERE durum = ?',array(1));
	$onay 	= Db::count('tbl_gorev','WHERE onay = ?',array(1));
?>

<div class="col-md-12" id="listeler">
		<div class="col-md-3">
          <!-- /. box -->
          
        </div>	      
       <div class="col-md-12">
        <div class="box" >
            <div class="box box-solid">
            <div class="box-header with-border">
                <a href="#"><i class="fa fa-cog"></i> Görev Sayısı
                <span> <?=$durum;?></span></a>&nbsp;&nbsp; 
                <a href="#"><i class="fa fa-check"></i> Onay Sayısı
                <span> <?=$onay;?></span></a>             
            </div>
            
            <!-- /.box-body -->
          </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                <div class="table-responsive ">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                      <th style="width: 1%">GNO</th>
                      <th style="width: 14%">Görev Yeri</th>
                      <th style="width: 20%">Açıklama</th>
                      <th style="width: 20%">Şubesi</th>
                      <th style="width: 20%">Görevliler</th>
                      <th style="width: 5%">Tarih</th>
                      <th style="width: 5%">Araç</th>
                      <th style="width: 5%">Şöför</th>
                      <th style="width: 10%; text-align:center">İşlem</th>

                    </tr>
                    <?php
                    
                    $posts = Db::getAll('tbl_gorev','WHERE durum = ? AND AmirID = ? ORDER BY ID DESC,onay ASC',
					array(1,$_SESSION['Sube']));
                    
					foreach ($posts as $post) {
						$onaylanan 	= Db::count('tbl_gorev','WHERE ID=? AND onay = ? AND AmirID = ?',
						array($post->ID,1,$_SESSION['Sube']));
						$persons = Db::getAll('tbl_gorev_person','WHERE GorevID = ?', array($post->ID));

				    ?>
                    <tr>
                                  <td ><?=$post->ID;?></td>
                                  <td ><?=ilceID($post->gyerID);?></td>
                                  <td ><b><?=$post->aciklama;?></b></td>
                                  <td ><small><?=subeID($post->amirID);?></small></td>
                                  <td ><small><?php foreach ($persons as $person){?><small><?=personelID($person->PersonID);?></small><br /><?php ;}?></small><br/></td>
                                  <td ><?=date("d.m.Y",strtotime($post->gtarih));?></td>
                                  <td ><?=aracID($post->aracID);?></td>
                                  <td ><?=soforID($post->soforID);?></td>
                                  
                                  
                                  <?php 
                                  if($onaylanan<>1){?>
                                      <td ><a href="#" class="btn btn-sm btn-primary listele" id="<?=$post->ID;?>">
                                      <i class="fa fa-plus"></i> <i class="fa fa-user"></i>   Personel Ekle</a></td>
                                 <?php
                                  }else{
                                  ?>
                                      <td ><a href="#" class="btn btn-sm btn-warning " >
                                      <i class="fa fa-send-o"></i> Onay Bekliyor</a></td>
                                 <?php
                                  }
                                  ?>
                                  <?php if($_SESSION['Yetki']==1 or $_SESSION['Yetki']==4){?>
                                  <!--Admin ve ya Mod ise Silme Yetkisi ver-->    
                                 	<td ><a href="#" class="btn btn-sm btn-danger sil" id="<?=$post->ID;?>"> <i class="fa fa-eraser"></i> Görev İptal</a></td>
                                 <?php
								  }
								 ?>
                                  
                            </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
	  	</div>
    <!-- /.box-body -->
</div>
<div class="col-md-12" id="icerik">
</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    $(function(){
		//**//
		$(document).ready(function(){
		$(".listele").on("click", function(){
			var ID = $(this).attr('id');
				$("#listeler").hide();
				$('#icerik').load('pg/ekle_gorevperson.php?ID='+ID);
			   });
			///*********///
			});
			///*********///
		
		//**//
		$(document).ready(function(){
		$('.sil').on('click', function(){ 
		var ID = $(this).attr('id');
			 $.ajax({
				type: 'GET',
				url:  'pg/post.delete.php?ky=9&ID='+ID,
				success: function(html){    
				if(html=='true'){
					setTimeout(function(){$("#Aktif").modal('show');},100);
					setTimeout(function(){$("#Aktif").modal('hide');},4000);
					setTimeout(function(){location.reload();},5000);
					}else{
					alert('Form Hatası');
				}},
				error: function(){
					// alert(response)
					alert('Form Hatası');
				}
			});
		});	
 		});
	});
    </script>
    <div class="modal fade" id="Aktif">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistem Mesajı</h4>
          </div>
          <div class="modal-body" align="center">
            <p>İşlem Yapılıyor.<br/>Lütfen Bekleyiniz.</p>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
 	</div>