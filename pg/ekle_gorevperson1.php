<?php
	include('../class/configvt.php');	
	include('../class/funct.php');
	$gorev = Db::getId('tbl_gorev',$_GET['ID']);
?>
	<div class="col-md-12">
    <div class="box">
        <form id="frmonay" method="post">
        <input type="hidden" name="ID" value="<?=$gorev->ID;?>">
        <input type="hidden" name="ky" value="8">
            <div class="callout callout-warning" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-info-circle"></i> <?=$_GET['ID']?> Numaralı Görevlendirme </h4>
                <button type="button" class="btn btn-primary onay" style="margin-right: 5px;">
                    <i class="fa fa-check"></i> Onay Ver
                </button>
            </div>
        <!-- /.box-header -->
            
        </form>
    </div>
    </div> 
    <div class="col-md-6">
    <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Görevli Personel Liste</h3>
            </div>
                <!-- /.box-header -->
                <form id="formveri" method="post">
                    <div class="box-body">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Görev Tarihi</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control" id="gorevID" name="gorevID" value="<?=$gorev->gtarih;?>" readonly="readonly">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <!-- /.form group -->
                              <div class="form-group">
                                <label>Görevlendirilecek Yer</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-suitcase"></i>
                                  </div>
                                <input type="text" class="form-control" id="gorevID" name="gorevID" value="<?=ilceID($gorev->gyerID);?>" readonly="readonly">
                                </div>
                              </div>
                              <!-- /.form group -->
                              
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Araç Bilgisi</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-car"></i>
                                  </div>
                                  <input type="text" class="form-control" id="gorevID" name="gorevID" value="<?=aracID($gorev->aracID);?>" readonly="readonly">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <!-- /.form group -->
                              <div class="form-group">
                                <label>Görevlendirilecek Yer</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                  </div>                    
                                <input type="text" class="form-control" id="gorevID" name="gorevID" value="<?=soforID($gorev->soforID);?>" readonly="readonly">
                                </div>
                              </div>
                              <!-- /.form group -->
                              
                            </div>
                        </div>   
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Görev Bilgisi</label>
                                <div class="input-group"><p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"><?=$gorev->aciklama;?></p> 
                                </div>
                              </div>
                            </div>
                            
                        </div> 
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                </div>
                            </div>    
                            <div class="col-sm-6">
                                <div class="form-group" style="float:right">
                                <button type="button" class="btn btn-success ekle" id="formveri"><i class="fa fa-user-circle"></i> Personel Ekle</button>
                                </div>                        
                            </div>
                        </div>    
                    
                    </div>
                    <!-- /.box-body -->
                  <!-- /.box -->
                </form>
        </div>
    </div>      
    <div class="col-md-6" id="listeler">
    <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Görevli Personel Liste</h3>
            </div>
            <!-- /.box-header -->
            <div>
                <div class="box-body">
            <div class="box-header">
              <?php
                $count = Db::count('tbl_gorev_person','WHERE durum = ? AND GorevID = ? ORDER BY ID DESC',array(1,$gorev->ID));
              ?>
              <span style="float:right"> Toplam <b><?=$count;?></b> Kayıt</span>	
              
            </div>
            <form id="frmsil" method="get">
            <table class="table table-striped">
                <tbody>
                <tr>
                  <th style="width: 5%">#</th>
                  <th style="width: 40%">Personel</th>
                  <th style="width: 20%">Unvan</th>
                  <th style="width: 20%">Şubesi</th>
                  <th style="width: 10%; text-align:center" colspan="2">İşlem</th>
                </tr>
                <?php
                $i=1;
                $posts = Db::getAll('tbl_gorev_person','WHERE durum = ? AND GorevID = ? ORDER BY ID DESC',array(1,$gorev->ID));
                foreach ($posts as $post) {
                $personel = Db::getId('tbl_personel',$post->PersonID);	
                ?>
                <tr>
                  <td><?=$i++;?></td>
                  <td><?=$personel->ad_soyad;?></td>
                  <td><?=$personel->unvan;?></td>
                  <td><?=subeID($personel->subeID);?></td>
                  <td><a href="#" class="btn btn-sm btn-danger sildelete" data="<?=$_GET['ID'];?>" IDcard="<?=$personel->ID;?>" id="delete">Görev Sil</a></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            </form>
        </div>
            </div>
            <!-- /.box-body -->
    </div> 
    </div>
    
        <!-- /.box-body -->
	<script type="text/javascript">
    $(function(){
		//####
		$(document).on('click', '.ekle', function(){  
			$('#formekle').modal('show');
            var $search = $('#search');
            $search.autocomplete({
                source: 'pg/ajax.php',
                focus: function(event, ui){
                    $search.val(ui.item.uye_eposta);
					
					$("#UID").val(ui.item.uye_ID);  

                },
                select: function(event, ui){
//                    window.location.href = 'https://www.google.com/#q=' + ui.item.uye_adi;
                    $search.val(ui.item.uye_eposta);
					$("#UID").val(ui.item.uye_ID);  
                }
            });

            $search.data('ui-autocomplete')._renderItem = function( ul, item ){

                var $li = $('<li>');

                $li.html('<a href="#">' +
                        //'<img src="' + item.uye_avatar + '" />' +
                        '<span class="fa fa-user-circle"></span>'+
						'<span class="email">' + item.uye_eposta + '</span>' +
                        '<span class="username">' + item.uye_unvan + '</span>' +
                        '</a>');

                return $li.appendTo(ul);

            };
    	});
		//*
		$('#frmkl').on('click', '.gonder', function(){ 
			 $.ajax({
				type: 'POST',
		        url:  'pg/post.ajax.php?ky=7',
				data: $('#frmkl').serialize(),
			 	success: function(html){    
				if(html=='true'){
					$('#formekle').modal('hide'); 
					setTimeout(function(){$("#Aktif").modal('show');},100);
					setTimeout(function(){$("#Aktif").modal('hide');},4000);
					setTimeout(function(){$('#icerik').load('pg/ekle_gorevperson.php?ID='+<?=$_GET['ID']?>);},5000)
					}else{
					alert('Hata : Bu Personel Önce Eklenmiştir.');
				}},
				error: function(){
					// alert(response)
					alert('Form Hatası');
				}
			});
		});		
		//*
					
		$('#frmsil').on('click', '.sildelete', function(){ 
		var ID = $(this).attr('IDcard');
		var data = $(this).attr('data');
			 $.ajax({
				type: 'GET',
				url:  'pg/post.delete.php?ky=7&ID='+ID+'&data='+data,
				success: function(html){    
				if(html=='true'){
					$('#formekle').modal('hide'); 
					setTimeout(function(){$("#Aktif").modal('show');},100);
					setTimeout(function(){$("#Aktif").modal('hide');},4000);
					setTimeout(function(){$('#icerik').load('pg/ekle_gorevperson.php?ID='+<?=$_GET['ID']?>);},5000)
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
		
		$('#frmonay').on('click', '.onay', function(){
				if (confirm( '<?=$_GET['ID']?> numaralı görev onaya verilecektir. Onay veriyor musunuz?')) {
					$.ajax({
						data: $('#frmonay').serialize(),
						url: 'pg/post.edit.php?ky=8&ID='+<?=$_GET['ID']?>,
						type: "POST",
						success: function(html){    
						if(html=='true'){
							setTimeout(function(){$("#Aktif").modal('show');},100);
							setTimeout(function(){$("#Aktif").modal('hide');},4000);
							setTimeout(function(){window.location ='?pg=7';},5000)
							}else{
							alert('Form Hatası');
						}},
						error: function(){
							// alert(response)
							alert('Form Hatası');
						}
					});
				}
		});
			
		
	//####
    });
    </script>
	<div class="modal fade" id="formekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<style>
            #search {
            width: 500px;
			
            }
            .ui-autocomplete li a {
            overflow: hidden;
            display: block;
           }
            .ui-autocomplete li a img {
            float: left;
            margin-right: 10px;
            height: 40px;
           
			}
            .ui-autocomplete li a .username {
            display: block;
            font-size: 12px;
            line-height: 17px;
           	color: #999;
           
			}
            .ui-autocomplete li a .email {
            display: block;
            font-size: 16px;
            color: #111;
           
			}
			.ui-front{
				z-index:2000 !important;
			}
        </style>  

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
                          <h3 class="box-title">Personel Bilgiler Ekle</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Adı Soyadı</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-user-circle"></i>
                                  </div>
                                <input type="text" id="search" name="PID"  class="form-control" required>
                                <input type="hidden" name="ID" class="form-control" value="<?=$gorev->ID;?>">
                                <input type="hidden" name="UID" class="form-control" id="UID">
                                <input type="hidden" name="ky" class="form-control" id="veriad" value="7" required="required">
                                </div>
                                
                            </div>
                              <!-- /.form group -->
                            </div>
                            <div class="col-md-6">  
                            <div class="form-group">
                                <input type="button" class="btn btn-success gonder" value="Bilgileri Kaydet">
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
                 