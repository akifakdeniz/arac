<?php
	include('../class/configvt.php');
	if(isset($_POST['ky'])){
		$post = $_POST['ky'];
		if($post==1){
			$tablo = "tbl_amir";
			$insert = Db::insert($tablo, array(
			  'ad_soyad'=> $_POST['ad'],
			  'unvan'	=> $_POST['unvan'],
			  'durum'=> 1
			));	
			$success = true;
			}elseif($post==2){
			$tablo = "tbl_personel";
			$insert = Db::insert($tablo, array(
			  'ad_soyad'=> $_POST['ad'],
			  'unvan'	=> $_POST['unvan'],
			  'subeID'	=> $_POST['sube'],
			  'durum'=> 1
			  
			));	
			
			$success = true;

			}elseif($post==3){
			$tablo = "tbl_sofor";
			$insert = Db::insert($tablo, array(
			  'ad_soyad'=> $_POST['ad'],
			  'unvan'	=> $_POST['unvan'],
			  'durum'=> 1
			  
			));	
			$success = true;

			}elseif($post==4){
			$tablo = "tbl_arac_liste";
			$insert = Db::insert('tbl_arac_liste', array(
			  'plaka'=> $_POST['plaka'],
			  'marka'=> $_POST['marka'],
			  'model'=> $_POST['model'],
			  'durum'=> 1
			));	
			$success = true;
			
			}elseif($post==6){
			$tablo = "tbl_sube";
			$insert = Db::insert($tablo, array(
			  'sube'=> $_POST['ad'],
			  'durum'=> 1
			));	
			$success = true;

			}elseif($post==7){
			if(!empty($_POST['ID']) AND !empty($_POST['UID'])){
			$kayitsor = Db::count('tbl_gorev_person', 'WHERE GorevID = ? AND PersonID = ? AND durum = ? ', array($_POST['ID'],$_POST['UID'],1));
			if($kayitsor>0){
				$success = false;
				##Görev tablosuna personeller ekleniyor...
				}else{
				$tablo = "tbl_gorev_person";
				$insert = Db::insert($tablo, array(
				  'GorevID'	=> $_POST['ID'],
				  'PersonID'=> $_POST['UID'],
				  'durum'	=> 1
				));	
				$success = true;

			}
			}else{
				$success = false;
			}
			}elseif($post==8){
			if(!empty($_POST['Sofor']) AND !empty($_POST['Arac'])){
			$kayitsor = Db::count('tbl_gorev_arac', 'WHERE GorevID = ?', array($_POST['ID']));
			if($kayitsor>0){
				$success = false;
				##Görev tablosuna personeller ekleniyor...
				}else{
				$tablo = "tbl_gorev_arac";
				$insert = Db::insert($tablo, array(
				  'GorevID'	=> $_POST['ID'],
				  'AracID'	=> $_POST['Arac'],
				  'GorevID'	=> $_POST['ID'],
				  'SoforID'	=> $_POST['Sofor'],
				  'CTarih'	=> $_POST['CTarih'],
				  'CSaat'	=> $_POST['CSaat'],
				  'CKm'		=> $_POST['CKm'],
				  'DTarih'	=> $_POST['DTarih'],
				  'DSaat'	=> $_POST['DSaat'],
				  'DKm'		=> $_POST['DKm']
				 ));	

				$tablo = "tbl_gorev";
				$update = Db::update($tablo, $_POST['ID'],array(
				'M_Onay'=> 1
				  
				));	
				$success = true;
				}
			}else{
			$success = false;
			}
		}
		
	}
	echo json_encode($success);		
?>