<?php 
	include('../class/web.class.php');
	include('../class/configvt.php');
		$KayitSor = Db::execCount('SELECT * FROM tbl_users WHERE User = ? AND Pass = ?', array($_POST['username'],$_POST['password']));
		if($KayitSor>0){
			$post = Db::getOne('tbl_users', 'WHERE User = ? AND Pass = ?', array($_POST['username'],$_POST['password']));
			$_SESSION['UserID']		= $post->ID;
			$_SESSION['Yetki']		= $post->YetkiID;
			$_SESSION['AdSoyad']	= $post->AdSoyad;
			$_SESSION['Sube']		= $post->Sube;
			$success =  true;
		}else{
			$success =  false;
		}
	echo json_encode($success);		

	// Admin 		= 1 (Tam Yetkili)
	// Sevk Amir 	= 2 (Son Onay - İptal - İptal Açıklama )
	// Amir 		= 3 (İlk Onay - İptal - İptal Açıklama)
	// Mod 			= 4 (Ekleme - Değiştirme - Silme)
	// User 		= 5 (Ekleme)
	
?>