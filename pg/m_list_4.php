<?php
	include('../class/web.class.php');
	include('../class/configvt.php');
	include('../class/funct.php');
?>
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">İptal Edilen</h3>
	          <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <tr>
	                  <th style="width: 1%">#</th>
                      <th style="width: 2%">GNO</th>
                      <th style="width: 10%">Görev Yeri</th>
                      <th style="width: 20%">Görev Açıklama</th>
                      <th style="width: 10%">Tarih</th>
                      <th style="width: 10%">Araç</th>
                      <th style="width: 10%">Şöför</th>
                      <th style="width: 20%">Açıklama</th>
                    </tr>
                    <?php
                    $posts = Db::getAll('tbl_gorev','WHERE durum = ? AND onay = ?  AND amirID = ? AND (A_Onay = ? OR S_Onay = ? OR M_Onay = ?) ORDER BY ID DESC,onay ASC',
					array(1,1,$_SESSION['Sube'],2,2,2));
                    foreach ($posts as $post) {
						if($post->A_Onay==2){
							$iptal = amirID($post->amirID). " tarafından iptal edilmiştir";
						}elseif($post->S_Onay==2){
							$iptal = sevkID($post->sevkID)." tarafından iptal edilmiştir";							
						}else{
							$iptal = modID(5)." tarafından iptal edilmiştir";							
						}
				    ?>
                    <tr>
                    	<td></td>
                        <td ><?=$post->ID;?></td>
                        <td ><?=ilceID($post->gyerID);?></td>
                        <td ><b><?=$post->aciklama;?></b></td>
                        <td ><?=date("d.m.Y",strtotime($post->gtarih));?></td>
                        <td ><?=aracID($post->aracID);?></td>
                        <td ><?=soforID($post->soforID);?></td>
                        <td ><span class="text-red"><dt><?=$post->A_Aciklama;?> <?=$post->S_Aciklama;?> <?=$post->M_Aciklama;?></dt> </span>
                        <small><span style="color:red"><?=$iptal;?></span></small></td>

                    </tr>
					<?php
					}
				    ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
          </div>