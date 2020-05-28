<?php
	include('../class/web.class.php');
	include('../class/configvt.php');
	include('../class/funct.php');
?>
		<div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title">Onaylanan </h3>
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
                      <th style="width: 30%">Açıklama</th>
                      <th style="width: 10%">Tarih</th>
                      <th style="width: 10%">Araç</th>
                      <th style="width: 10%">Şöför</th>
                    </tr>
                    <?php
                    $posts = Db::getAll('tbl_gorev','WHERE durum = ? AND onay = ? AND amirID = ? AND A_Onay = ? AND S_Onay = ? AND M_Onay =  ? ORDER BY ID DESC,onay ASC',
					array(1,1,$_SESSION['Sube'],1,1,0));
                    foreach ($posts as $post) {
				    ?>
                    <tr>
                    	<td></td>
                        <td ><?=$post->ID;?></td>
                        <td ><?=ilceID($post->gyerID);?></td>
                        <td ><b><?=$post->aciklama;?></b></td>
                        <td ><?=date("d.m.Y",strtotime($post->gtarih));?></td>
                        <td ><?=aracID($post->aracID);?></td>
                        <td ><?=soforID($post->soforID);?></td>
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