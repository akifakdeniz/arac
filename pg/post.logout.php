<?php 
	include('../class/web.class.php');
	session_destroy();
	$success =  true;
	echo json_encode(true);		
	// Admin 		= 1 (Tam Yetkili)
	// Sevk Amir 	= 2 (Son Onay - İptal - İptal Açıklama )
	// Amir 		= 3 (İlk Onay - İptal - İptal Açıklama)
	// Mod 			= 4 (Ekleme - Değiştirme - Silme)
	// User 		= 5 (Ekleme)

?>