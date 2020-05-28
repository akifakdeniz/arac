<?php
	include('../class/configvt.php');
	include('../class/funct.php');
?>
        <div class="box" >
            <div class="box box-solid">
            <div class="box-header with-border">
                <span>Onaylanan Görevler</span>
                
            </div>
            
            <!-- /.box-body -->
          </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                <div class="table-responsive ">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                      <th style="width: 5%">İşlem</th>
                      <th style="width: 1%">GNO</th>
                      <th style="width: 10%">Görev Yeri</th>
                      <th style="width: 20%">Açıklama</th>
                      <th style="width: 20%">Şubesi</th>
                      <th style="width: 10%">Görevliler</th>
                      <th style="width: 5%">Tarih</th>
                      <th style="width: 5%">Araç</th>
                      <th style="width: 10%">Şöför</th>
                    </tr>
                    <?php
					$posts  = Db::getAll('tbl_gorev','WHERE durum = ? AND onay = ? AND A_Onay = ? AND S_Onay = ? AND M_Onay = ? ORDER BY ID DESC,onay ASC',array(1,1,1,1,1));
                    foreach ($posts as $post) {
                    $subesor = Db::getId('tbl_amir', $post->amirID);
					$sor = Db::getAll('tbl_gorev_person','WHERE GorevID = ? ORDER BY ID ASC',array($post->ID));
					$soforsor = Db::execOne('SELECT * FROM tbl_gorev_arac WHERE GorevID = ?', array($post->ID));	
				    ?>
                        <tr>
                            <td  align="center"><span class="btn btn-xs btn-success"> <i class="fa fa-check"></i> </span></td>
                            <td ><?=$post->ID;?></td>
                            <td ><?=ilceID($post->gyerID);?></td>
                            <td ><b><?=$post->aciklama;?></b></td>
                            <td ><?=subeID($subesor->sube);?></td>
                            <td ><?php foreach ($sor as $person){?><small><?=personelID($person->PersonID);?></small><br /><?php }?></td>
                            <td ><?=date("d.m.Y",strtotime($post->gtarih));?></td>
                            <td ><?=aracID($post->aracID);?></td>
                            <td ><small><?=personelID($soforsor->SoforID);?></small></td>

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
            $('.aciklamagir').on('click', function(){
                var ID = $(this).attr('id');
                $("#modal-ok").modal('show');
                $('#grv').val(ID);
                        
                });
            });
            //**//
            $(document).ready(function(){
            $('.tamamla').on('click', function(){
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
                        alert('Hata : 401 > Lütfen Formu Boş Geçmeyiniz.');
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
                            <input name="aciklama" type="hidden"/>
                            <input name="ky" type="hidden" value="8"/>
                            <input name="ID" type="hidden" id="grv" class="form-control"  />
                        </div>
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
        
        <script>
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
			showInputs: false
        });
        
        
        </script>
