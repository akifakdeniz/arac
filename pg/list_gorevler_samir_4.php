<?php
	include('../class/configvt.php');
	include('../class/funct.php');
	$durum 	= Db::count('tbl_gorev','WHERE durum = ? AND onay = ? AND A_Onay = ? AND S_Onay = ? AND M_Onay = ?',array(1,1,1,1,1));
?>
        <div class="box" >
            <div class="box box-solid">
            <div class="box-header with-border">
                <span><i class="fa fa-cog"></i> Onaylanan Görev Sayısı
                <span>: <?=$durum;?></span></span>&nbsp;&nbsp; 
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
		
		
        
        
        
        
        
        
