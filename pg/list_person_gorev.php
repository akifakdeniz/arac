<?php
	include('../class/configvt.php');	
	include('../class/funct.php');
?>  

            <!-- /.box-header -->
            <div class="box">
              	<div class="box-header with-border">
           			<h3 class="box-title">Görevli Personel Liste</h3>
         		</div>
                <!-- /.box-header -->
                <div id="listeler">
                	<div class="box-body">
                <div class="box-header">
                  <a href="#" class="btn btn-sm btn-primary ekle">Yeni Kayıt</a>
                  <?php
                  	$count = Db::count('tbl_gorev_person','WHERE durum = ? AND GorevID = ? ORDER BY ID DESC',array(1,$gorev->ID));
                  ?>
                  <span style="float:right"> Toplam <b><?=$count;?></b> Kayıt</span>	
                  
                </div>
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
                    ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?=$post->GorevID;?></td>
                      <td><?=$post->PersonID;?></td>
                      <td></td>
                      <td><a href="#" class="btn btn-sm btn-primary listele" id="<?=$post->ID;?>">
                      Personel Ekle</a></td>
                      <td><a href="#" class="btn btn-sm btn-danger sil" id="<?=$post->ID;?>">Görev Sil</a></td>
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
            <!-- /.box-body -->

