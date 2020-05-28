<?php
	include('../class/configvt.php');
	include('../class/funct.php');
?>
        <div class="box" >
            <div class="box box-solid">
            <div class="box-header with-border">
                <span> Onay Bekleyen Görevler
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
                      <th style="width: 10%">Görev Yeri</th>
                      <th style="width: 20%">Açıklama</th>
                      <th style="width: 20%">Şubesi</th>
                      <th style="width: 15%">Görevliler</th>
                      <th style="width: 5%">Tarih</th>
                      <th style="width: 5%">Araç</th>
                      <th style="width: 10%">Şöför</th>
                      <th style="width: 10%; text-align:center" colspan="2">İşlem</th>
                    </tr>
                    <?php
					$posts  = Db::getAll('tbl_gorev','WHERE durum = ? AND onay = ? AND A_Onay = ? AND S_Onay = ? AND M_Onay = ? ORDER BY ID DESC,onay ASC',array(1,1,1,1,0));
                    foreach ($posts as $post) {
					$subesor = Db::getId('tbl_amir', $post->amirID);
					$sor = Db::getAll('tbl_gorev_person','WHERE GorevID = ? ORDER BY ID ASC',array($post->ID));
					
				    ?>
                        <tr>
                            <td ><?=$post->ID;?></td>
                            <td ><?=ilceID($post->gyerID);?></td>
                            <td ><b><?=$post->aciklama;?></b></td>
                            <td ><small><?=subeID($subesor->sube);?></small></td>
                            <td ><?php foreach ($sor as $person){?><small><?=personelID($person->PersonID);?></small><br /><?php }?></td>
                            <td ><?=date("d.m.Y",strtotime($post->gtarih));?></td>
                            <td ><?=aracID($post->aracID);?></td>
                            <td ><?=soforID($post->soforID);?></td>
                            <td style="text-align:"><a href="#" class="btn btn-sm btn-warning aciklamagir" id="<?=$post->ID;?>"><i class="fa fa-edit"> </i>  İşlem Yap</a></td>
                            <td ><a href="#" class="btn btn-sm btn-danger iptal" data="<?=$post->ID;?>"> <i class="fa fa-eraser"></i> Görev İptal</a></td>
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
          
		<script type="text/javascript">
        $(function(){
            //**//
            $(document).ready(function(){
            $('.aciklamagir').on('click', function(){
                var ID = $(this).attr('id');
                $("#modal-ok").modal('show');
                $('#grv').val(ID);
                        
                });
            });
            //**//
			$(document).ready(function(){
			$('.iptal').on('click', function(){
				var ID = $(this).attr('data');
				$("#modal-iptal").modal('show');
				$('#verify').val(ID);
						
				});
			});
		//**//
            $(document).ready(function(){
            $('.tamamla').on('click', function(){
					$("#modal-ok").modal('hide');
                    $.ajax({
                    type: 'POST',
                    data: $('#frmok').serialize(),
                    url:  'pg/post.ajax.php',
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
		//**//
		$(document).ready(function(){
		$('.iptalsun').on('click', function(){
		$("#modal-iptal").modal('hide');
				$.ajax({
				type: 'POST',
				data: $('#frmiptal').serialize(),
				url:  'pg/post.edit.php',
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
		//**//
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
        <div class="modal fade" id="modal-ok">
            <div class="modal-dialog">
                <form method="post" id="frmok">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sistem Mesajı</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <label>Araç Plakası : </label>
                            <?php
                                $araclar = Db::getAll('tbl_arac_liste','Where durum = ? ORDER BY plaka ASC',array(1));
                            ?>
                            <select class="form-control" name="Arac" required>
                                <option value="">Araç Plakası</option>
                                <?php
                                     foreach ($araclar as $arac){
                                         echo '<option value='.$arac->ID.'>'.$arac->plaka.'</option>';
        
                                    }
                                ?>
                            
                            </select>
                            <input name="ky" type="hidden" value="8"/>
                            <input name="ID" type="hidden" id="grv" class="form-control"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label>Sürücü Seçimi : </label>
                        	<input type="text" id="search" name="gelen"  class="form-control" required>
                        	<input type="hidden" id="UID" name="Sofor"  class="form-control" required>
                        </div>
                    </div>
                    <div class="row"></br>
                    </div>
                    <div class="row">
                      <div class="col-xs-4">
                        <label>Görev Çıkış Tarih: </label>
                        <input name="CTarih" class="form-control" id="datepicker" type="text" required/>
                      </div>
                      <div class="col-xs-4">
                        <label>Görev Çıkış Saati: </label>
                        <input name="CSaat" class="form-control timepicker" type="text" required/>
                      </div>
                      <div class="col-xs-4">
                        <label>Görev Çıkış KM : </label>
                        <input name="CKm" class="form-control" type="text" required/>
                      </div>
                      </div>
                    <div class="row">
                      <div class="col-xs-4">
                        <label>Görev Dönüş Tarih: </label>
                        <input name="DTarih" class="form-control" id="datepicker2" type="text" required/>
                      </div>
                      <div class="col-xs-4">
                        <label>Görev Dönüş Saat: </label>
                        <input name="DSaat" class="form-control timepicker" type="text" required/>
                      </div>
                      <div class="col-xs-4">
                        <label>Görev Dönüş KM : </label>
                        <input name="DKm" class="form-control" type="text" required/>
                      </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Vazgeç</button>
                    <button type="button" class="btn btn-primary tamamla">Tamamla</button>
                  </div>
                </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-iptal">
        <div class="modal-dialog">
        	<form method="post" id="frmiptal">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sistem Mesajı</h4>
              </div>
              <div class="modal-body">
              	<label>İptal Sebebi : </label>
                <input name="aciklama" class="form-control" type="text"/>
                <input name="ky" class="form-control" type="hidden" value="13"/>
                <input name="ID" id="verify" class="form-control" type="hidden" value=""/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Vazgeç</button>
                <button type="button" class="btn btn-primary iptalsun">Bildir</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
   		<style>
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
        <script>
		var $search = $('#search');
			$search.autocomplete({
				source: 'pg/ajax.php',
				focus: function(event, ui){
				$search.val(ui.item.uye_eposta);
					$("#UID").val(ui.item.uye_ID);  
				},
				select: function(event, ui){
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
        $('#datepicker').datepicker({
			format: 'dd/mm/yyyy',
			language: 'tr',   
			autoclose: true
        });
        $('#datepicker2').datepicker({
			format: 'dd/mm/yyyy',
			language: 'tr',   
			autoclose: true
		});
        //Timepicker
        $('.timepicker').timepicker({
        	showInputs: false,
			showMeridian:false
        });
        
        
        </script>
