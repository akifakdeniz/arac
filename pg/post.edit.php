<?php
	include('../class/configvt.php');
	if(isset($_POST['ky'])){
		$post = $_POST['ky'];
		if($post==1){
			$tablo = "tbl_amir";
			$update = Db::update($tablo, $_POST['ID'],array(
			  'ad_soyad'=> $_POST['ad'],
			  'unvan'	=> $_POST['unvan'],
			  'durum'=> 1
			  
			));
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Düzeltme",
			  'Log_text' =>$_POST['ID']." / ".$_POST['ad']." / ".$_POST['unvan']
			));
			
			
			$success = true;
			
			}elseif($post==2){
			$tablo = "tbl_personel";
			$update = Db::update($tablo, $_POST['ID'],array(
			  'ad_soyad'=> $_POST['ad'],
			  'unvan'	=> $_POST['unvan'],
			  'subeID'	=> $_POST['sube'],
			  'durum'=> 1
			  
			));	
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Düzeltme",
			  'Log_text'=> $_POST['ID']." / ".$_POST['ad']." / ".$_POST['unvan']
			));

			$success = true;
			}elseif($post==3){
			$tablo = "tbl_sofor";
			$update = Db::update($tablo, $_POST['ID'],array(
			  'ad_soyad'=> $_POST['ad'],
			  'unvan'	=> $_POST['unvan'],
			  'durum'=> 1
			  
			));	
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Düzeltme",
			  'Log_text'=> $_POST['ID']." / ".$_POST['ad']." / ".$_POST['unvan']
			));

			$success = true;

			}elseif($post==4){
			$tablo = "tbl_arac_liste";
			$update = Db::update('tbl_arac_liste', $_POST['ID'],array(
			  'plaka'=> $_POST['plaka'],
			  'marka'=> $_POST['marka'],
			  'model'=> $_POST['model'],
			  'durum'=> 1
			));	
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Düzeltme",
			  'Log_text'=> $_POST['ID']." / ".$_POST['plaka']." / ".$_POST['marka']."/".$_POST['model']
			));
			$success = true;

			}elseif($post==6){
			$tablo = "tbl_sube";
			$update = Db::update($tablo, $_POST['ID'],array(
			  'sube'=> $_POST['ad'],
			  'durum'=> 1
			));	
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Düzeltme",
			  'Log_text'=> $_POST['ID']." / ".$_POST['ad']
			));
			$success = true;
			
			}elseif($post==8){
			$kayitsor = Db::count('tbl_gorev', 'WHERE ID = ? AND onay = ? ', array($_GET['ID'],1));
				if($kayitsor>0){
					$success = false;
					##Görev tablosuna personeller ekleniyor...
					}else{
					$tablo = "tbl_gorev";
					$update = Db::update($tablo, $_POST['ID'],array(
					  'onay'	=> 1
					));	
					$log = Db::insert('tbl_log',array(
					  'Log_islem'=>" Kullanıcı Görev Onay İşlemi",
					  'Log_text' => "Tablo : ".$tablo." ID : ".$update." /Gören Numarası ".$_GET['ID']
					));
					$success = true;
				}
			}elseif($post==9){
					$tablo = "tbl_gorev";
					$update = Db::update($tablo, $_POST['ID'],array(
					  'A_Onay' 		=> 2, //iptal
					  'A_Aciklama'	=> $_POST['aciklama']
					));	
					$log = Db::insert('tbl_log',array(
					  'Log_islem'=>" Amir Onay İptal İşlemi",
					  'Log_text' => "Tablo : ".$tablo." ID : ".$update." /Gören Numarası ".$_GET['ID']
					));
					$success = true;
			}elseif($post==10){
					$tablo = "tbl_gorev";
					$update = Db::update($tablo, $_POST['ID'],array(
					  'A_Onay' 		=> 1, //Onay
					 ));	

					$success = true;
			
			}elseif($post==11){
					$tablo = "tbl_gorev";
					$update = Db::update($tablo, $_POST['ID'],array(
					  'S_Onay' 		=> 2, //iptal
					  'S_Aciklama'	=> $_POST['aciklama']
					));	

					$success = true;
			
			}elseif($post==12){
					$tablo = "tbl_gorev";
					$update = Db::update($tablo, $_POST['ID'],array(
					  'S_Onay' 		=> 1, //Onay
					 ));	

					$success = true;
			}elseif($post==13){
					$tablo = "tbl_gorev";
					$update = Db::update($tablo, $_POST['ID'],array(
					  'M_Onay' 		=> 2, //iptal
					  'M_Aciklama'	=> $_POST['aciklama']
					));	
					$success = true;						
						
			}else{
			$success = false;
		}
		
	}
	echo json_encode($success);		
?>