<?php
	include('../class/configvt.php');
	if(isset($_GET['ky'])){
		$post = $_GET['ky'];
		if($post==1){
			$tablo = "tbl_amir";
			$update = Db::update($tablo, $_GET['ID'],array(
			  'durum'=> 0
			  
			));	
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Silme",
			  'Log_text'=> "ID : ".$_GET['ID']
			));
			
			$success = true;
			
			}elseif($post==2){
			$tablo = "tbl_personel";
			$update = Db::update($tablo, $_GET['ID'],array(
			  'durum'=> 0
			  
			));	
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Silme",
			  'Log_text'=> "ID : ".$_GET['ID']
			));
			
			$success = true;
			}elseif($post==3){
			$tablo = "tbl_sofor";
			$update = Db::update($tablo, $_GET['ID'],array(
			  'durum'=> 0
			  
			));	
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Silme",
			  'Log_text'=> "ID : ".$_GET['ID']
			));
			
			$success = true;

			}elseif($post==4){
			$tablo = "tbl_arac_liste";
			$update = Db::update('tbl_arac_liste', $_GET['ID'],array(
			  'durum'=> 0
			));	
			
			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Silme",
			  'Log_text'=> "ID : ".$_GET['ID']
			));
			
			$success = true;

			}elseif($post==7){
			$tablo = "tbl_gorev_person";
			$update = Db::update($tablo, 0, array(
			  'durum' => 0
			), 'WHERE GorevID = ? AND PersonID = ? ', array($_GET['data'],$_GET['ID']));

			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Silme",
			  'Log_text'=> "Tablo :".$tablo. " ID : ".$_GET['ID']
			));
			
			$success = true;

			}elseif($post==8){
			$tablo = "tbl_gorev";
			$update = Db::update($tablo, 0, array(
			  'durum' => 0
			), 'WHERE GorevID = ? AND PersonID = ? ', array($_GET['data'],$_GET['ID']));

			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Silme",
			  'Log_text'=> "Tablo :".$tablo. " ID : ".$_GET['ID']
			));
			
			$success = true;
			}elseif($post==9){
			$tablo = "tbl_gorev";
			$update = Db::update($tablo, 0, array(
			  'durum' => 0
			), 'WHERE ID = ? ', array($_GET['ID']));

			$log = Db::insert('tbl_log',array(
			  'Log_islem'=>"Silme",
			  'Log_text'=> "Tablo :".$tablo. " ID : ".$_GET['ID']
			));
			
			$success = true;


			}else{
				
			$success = false;
		}
		
	}
	echo json_encode($success);		
?>