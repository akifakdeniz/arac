<?php
	include('../class/web.class.php');
	include('../class/configvt.php');	
	include('../class/funct.php');
	$gorev = Db::getId('tbl_gorev',$_GET['ID']);
	$gorevlisor = Db::count('tbl_gorev_person', 'WHERE GorevID = ?', array($_GET['ID']));
?>
	<div class="col-md-12">
    <div class="box">
        <form id="frmonay" method="post">
        <input type="hidden" name="ID" value="<?=$gorev->ID;?>">
        <input type="hidden" name="ky" value="8">
            <div class="alert alert-info alert-dismissible">
            <div class="box-header">
              <h4 class="box-title" style="color:#FFF !important"><?=$_GET['ID']?> Numaralı Görevlendirme</h4>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default ekle" style="margin-right: 5px;">
                    <i class="fa fa-plus"></i> <i class="fa fa-user"></i> Personel Ekle
                </button>
                <?php if($gorevlisor>0){?>
                <button type="button" class="btn btn-success onay" style="margin-right: 5px;">
                    <i class="fa fa-check"></i> Onay Ver
                </button>
                <?php
				}
				?>
              </div>
              <!-- /. tools -->
            </div>
            </div>
        <!-- /.box-header -->
            
        </form>
    </div>
    </div> 
    <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Görevler</h3>
              <div class="box-tools">
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-calendar-check-o"></i><b> Görev Tarihi :</b>
                <p class="pull-right"><?=date('d.m.Y' ,strtotime($gorev->gtarih));?></p></a></li>
                
                <li><a href="#"><i class="fa fa-map-marker"></i> <b>Görev Yeri :</b>
               	<p class="pull-right"><?=ilceID($gorev->gyerID);?></p></a></li>
                
                <li><a href="#"><i class="fa fa-car"></i><b> Araç :</b>
                <p class="pull-right"><?=aracID($gorev->aracID);?></p></a></li>
                
                <li><a href="#"><i class="fa fa-black-tie"></i><b> Araç Şöför :</b>
               	<p class="pull-right"><?=soforID($gorev->soforID);?></p></a></li>
               
                <li><a href="#"><i class="fa fa-sticky-note"></i><b> Açıklama :</b>
                <b><?=$gorev->aciklama;?></b></a></li>
                </li>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
	<?php
		$count = Db::count('tbl_gorev_person','WHERE durum = ? AND GorevID = ? ORDER BY ID DESC',array(1,$gorev->ID));
    ?>

    <div class="col-md-8" id="listeler">
    <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Görevli Personel Liste</h3>
				<span class="pull-right"> Toplam <b><?=$count;?></b> Kayıt</span>	

            </div>
            <!-- /.box-header -->
            <div>
            <div class="box-body">
            
            <form id="frmsil" method="get">
            <table class="table table-striped">
                <tbody>
                <tr>
                  <th style="width: 5%">#</th>
                  <th style="width: 20%">Personel</th>
                  <th style="width: 30%">Unvan</th>
                  <th style="width: 30%">Şubesi</th>
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
                  <td><a href="#" class="btn btn-sm btn-danger sildelete" data="<?=$_GET['ID'];?>" IDcard="<?=$personel->ID;?>" id="delete"><i class="fa fa-trash-o"> </i>  Sil</a></td>
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
			$('#formekle').modal('hide');
			 $.ajax({
				type: 'POST',
		        url:  'pg/post.ajax.php?ky=7',
				data: $('#frmkl').serialize(),
			 	success: function(html){    
				if(html=='true'){
					//setTimeout(function(){$('#Aktif').modal('show');},100);
					setTimeout(function(){$('#icerik').load('pg/ekle_gorevperson.php?ID='+<?=$_GET['ID']?>);},100)
					//setTimeout(function(){$('#Aktif').modal('hide');},x);
					}else{
					alert('Hata Kodu : 401 Lütfen Sistem Yöneticiniz İle Görüşürünüz');
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
					 
					//setTimeout(function(){$("#Aktif").modal('show');},100);
					//setTimeout(function(){$("#Aktif").modal('hide');},4000);
					setTimeout(function(){$('#icerik').load('pg/ekle_gorevperson.php?ID='+<?=$_GET['ID']?>);},100)
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
                 