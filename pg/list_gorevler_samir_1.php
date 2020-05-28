<?php
	include('../class/configvt.php');
	include('../class/funct.php');
?>
			      
        <div class="box" >
            <div class="box box-solid">
            <div class="box-header with-border">
                <span><i class="fa fa-cog"></i> Onay Bekleyen
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
                      <th style="width: 10%; text-align:center" colspan="2">İşlem</th>
                    </tr>
                    <?php
                    
                    $posts = Db::getAll('tbl_gorev','WHERE durum = ? AND onay = ? AND A_Onay = ? AND S_Onay = ? ORDER BY ID DESC,onay ASC',array(1,1,1,0));
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
                            <td style="text-align:"><a href="#" class="btn btn-sm btn-success onayla" id="<?=$post->ID;?>"><i class="fa fa-send-o"></i> Onay Ver</a></td>
                            <td ><a href="#" class="btn btn-sm btn-danger iptal" id="<?=$post->ID;?>"> <i class="fa fa-eraser"></i> Görev İptal</a></td>
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
            $(".listele").on("click", function(){
                var ID = $(this).attr('id');
                    $("#listeler").hide();
                    $('#icerik').load('pg/ekle_gorevperson.php?ID='+ID);
                   });
                });
            //**//
            $(document).ready(function(){
            $('.iptal').on('click', function(){
                var ID = $(this).attr('id');
                $("#modal-iptal").modal('show');
                $('#grv').val(ID);
                        
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
            $(document).ready(function(){
            $('.onayla').on('click', function(){
                var ID = $(this).attr('id');
                    $.ajax({
                    type: 'POST',
                    data:{"ID":ID,"ky":12},
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
                    <input name="ky" class="form-control" type="hidden" value="11"/>
                    <input id="grv" class="form-control" type="hidden" name="ID"/>
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
    
