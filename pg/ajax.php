<?php
include('../class/configvt.php');	
include('../class/funct.php');



$options = array();
$term    = "%".$_GET['term']."%";
$results = Db::getAll('tbl_personel','WHERE ad_soyad COLLATE UTF8_GENERAL_CI LIKE ?',array($term));


	$data = array();

    foreach ( $results as $row ){
        $data[] = array(
            'value' => $row->ad_soyad,
            'uye_ID' => $row->ID,
            'uye_unvan' => $row->unvan,
            'uye_eposta' => $row->ad_soyad
			);
    }

    echo json_encode($data);