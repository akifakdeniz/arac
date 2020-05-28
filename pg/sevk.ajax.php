<?php
	include('../class/configvt.php');
	$tablo = "tbl_gorev";
	$my_date = str_replace("/", ".", $_POST['gtarih']);
	$my_date = strtotime($my_date);
	$tarih = date("Y-m-d", $my_date);

	if($_POST['gtarih']<>"" AND  $_POST['gyer']<>"" AND  $_POST['arac']<>"" AND $_POST['sofor']<>"" AND  $_POST['amir']<>"" AND $_POST['sevk']<>""){
		$insert = Db::insert($tablo, array(
		  'gtarih'	=> $tarih,
		  'gyerID'	=> $_POST['gyer'],
		  'aracID'	=> $_POST['arac'],
		  'soforID'	=> $_POST['sofor'],
		  'aciklama'=> $_POST['aciklama'],
		  'amirID'	=> $_POST['amir'],
		  'sevkID'	=> $_POST['sevk'],
		  'durum'	=> 1,
		  'onay'	=> 0,
		  'A_Onay'	=> 0,
		  'S_Onay'	=> 0,
		  'M_Onay'	=> 0
		
		));	
		$data = array("true",$insert);
	}else{
		$data = array("false",0);
	}
	echo json_encode($data);

?>