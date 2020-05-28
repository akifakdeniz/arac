﻿<?php include('../class/configvt.php');?>
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Görevli Şöför Liste</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box-header">
          <a href="#" class="btn btn-sm btn-primary ekle">Yeni Kayıt</a>
          <?php
		  $count = Db::count('tbl_sofor','WHERE durum = ? ORDER BY ID DESC',array(1));
		  ?>
          <span style="float:right"> Toplam <b><?=$count;?></b> Kayıt</span>	
        </div>
        <table class="table table-striped">
            <tbody>
            <tr>
              <th style="width: 5%">#</th>
              <th style="width: 50%">Adı Soyadı</th>
              <th style="width: 30%">Bilgi</th>
              <th style="width: 10%; text-align:center" colspan="2">İşlem</th>
            </tr>
            <?php
            $i=1;
            $posts = Db::getAll('tbl_sofor','WHERE durum = ? ORDER BY ID DESC',array(1));
            foreach ($posts as $post) {
            ?>
            <tr>
              <td><?=$i++;?></td>
              <td><?=$post->ad_soyad;?></td>
              <td><?=$post->unvan;?></td>
              <td><a href="#" class="btn btn-sm btn-warning duzenle" id="<?=$post->ID;?>" pad="<?=$post->ad_soyad;?>" 
              unv="<?=$post->unvan;?>">
              Düzenle</a></td>
              <td><a href="#" class="btn btn-sm btn-danger sil" id="<?=$post->ID;?>">Sil</a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
  </div>