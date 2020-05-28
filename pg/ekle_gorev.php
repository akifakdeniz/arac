<?php
	include('../class/configvt.php');	
?>
	<div class="col-md-8">
 		<div class="box box-body">
		<form id="gorevkaydet" method="post">
             <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Görevlendirme Tanımı</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Görev Tarihi</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="gtarih" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- /.form group -->
                          <div class="form-group">
                            <label>Görevlendirilecek Yer</label>
                            <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"  name="gyer">
                            <?php
                                echo "<option selected='selected' value=''>Belirtiniz</option>";
                                $posts = Db::getAll('tbl_ilce ORDER BY ID ASC');
                                foreach ($posts as $post) {
                                echo "<option value='".$post->ID."'>".$post->ilce."</option>";
                                }
                            ?>
                              </select>
                          </div>
                          <!-- /.form group -->
                          
                        </div>
                    </div>    
                    
                    <div class="col-sm-12">
                        <div class="box-header">
                          <h3 class="box-title">Görevlendirilen Araç</h3>
                        </div>             
                        <div class="col-sm-6">
                        <!-- /.form group -->
                            <div class="form-group">
                                <label>Araç Bilgi</label>
                                <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="arac">
                                <?php
                                    echo "<option selected='selected' value=''>Belirtiniz</option>";
                                    $posts = Db::getAll('tbl_arac','WHERE durum = ? ORDER BY ID ASC',array(1));
                                    foreach ($posts as $post) {
                                     echo "<option value='".$post->ID."'>".$post->plaka."</option>";
                                    }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <!-- /.form group -->
                            <div class="form-group">
                                <label>Görevli Araç Personel</label>
                                <select class="form-control" name="sofor" required>
                                	<option value="">Belirtiniz</option>
                                    <option value="0">Şöförsüz</option>
                                    <option value="1">Şöförlü</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Görev Açıklaması</label>
                              <input class="form-control" name="aciklama" required>
                            </div>                        
                        </div>

                    </div>
                    
                    <div class="col-sm-12">
                    <div class="box-header">
                      <h3 class="box-title">Görevlendiren Amirler</h3>
                    </div>
                                   
                        <div class=" col-sm-6">
                              <div class="form-group">
                                <label>Görevlendiren Amir</label>
                                <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="amir" required>
                                <?php
                                    echo "<option selected='selected' value=''>Belirtiniz</option>";
                                    $posts = Db::getAll('tbl_amir','WHERE durum = ? ORDER BY ID ASC',array(1));
                                    foreach ($posts as $post) {
                                    echo "<option value='".$post->ID."'>".$post->ad_soyad." / ".$post->unvan."</option>";
                                    }
                                ?>
                                  </select>
                              </div>
                              <!-- /.form group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sevk Eden Amir</label>
                                <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sevk" required>
                                <?php
                                    echo "<option selected='selected' value=''>Belirtiniz</option>";
                                    $posts = Db::getAll('tbl_sevk','WHERE durum = ? ORDER BY ID ASC',array(1));
                                    foreach ($posts as $post) {
                                    echo "<option value='".$post->ID."'>".$post->ad_soyad." / ".$post->unvan."</option>";
                                    }
                                ?>
                                  </select>
                              </div>
                              <!-- /.form group -->
                        </div>
                      </div>
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                            </div>
                        </div>    
                        <div class="col-sm-6">
                            <div class="form-group" style="float:right">
                            <button type="submit" class="btn btn-success kaydet" id="gorevkaydet">Bilgileri Kaydet</button>
                            </div>                        
                        </div>
                    </div>    
                
                </div>
                
                
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
       </form>
    </div>
    </div>
<script>
$('#datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'tr',   
      autoclose: true
    });
</script>

	<script type="text/javascript">
    $(function(){
	$('#gorevkaydet').submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting via the browser
	$.ajax({
        type: 'POST',
		data: $('#gorevkaydet').serialize(),
        url:  'pg/sevk.ajax.php',
		dataType: 'json',
		cache: false,
		success: function(data){
        console.log(data);
		if(data[0]=="true"){
			setTimeout(function(){$("#Aktif").modal('show');},100);
			setTimeout(function(){$("#Aktif").modal('hide');},4000);
			setTimeout(function(){$('#icerik').load('pg/ekle_gorevperson.php?ID='+data[1]);},5000)
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
    