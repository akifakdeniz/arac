<?php

	function tbdeger($deger)
	{ 
	 $TR=array('ç','Ç','ý','Ý','þ','Þ','ð','Ð','ö','Ö','ü','Ü','ı','İ');
	 $EN=array('c','c','i','i','s','s','g','g','o','o','u','u','i','i');
	 $baslik= str_replace($TR,$EN,$baslik);
	 $baslik=mb_strtolower($baslik,'UTF-8');
	 $baslik=preg_replace('#[^-a-zA-Z0-9_ ]#','',$baslik);
	 $baslik=trim($baslik);
	 $baslik=preg_replace('#[-_ ]+#','-',$baslik);
	 return $baslik;
	}
	function subeID($deger)
	{ 
	 $subebul = Db::getId('tbl_sube',$deger);	 
	 return $subebul->sube;
	}
	function ilceID($deger)
	{ 
	 $ilce = Db::getId('tbl_ilce',$deger);	 
	 return $ilce->ilce;
	}
	function aracID($deger)
	{ 
	 $arac = Db::getId('tbl_arac',$deger);	 
	 return $arac->plaka;
	}
	function soforID($deger)
	{ 
	 echo $deger == "0" ? "Şoförsüz" : "Şoförlü";		 
	 return ;
	}
	function personelID($deger)
	{ 
	 $personelID = Db::getId('tbl_personel',$deger);	 
	 return $personelID->ad_soyad;
	}
	function amirID($deger)
	{ 
	 $amirID = Db::getId('tbl_amir',$deger);	 
	 return $amirID->ad_soyad;
	}
	function sevkID($deger)
	{ 
	 $sevkID = Db::getId('tbl_sevk',$deger);	 
	 return $sevkID->ad_soyad;
	}
	function modID($deger)
	{ 
	 $modID = Db::getId('tbl_users',$deger);	 
	 return $modID->AdSoyad;
	}

	function AracSurucu($deger)
	{ 
	 $personelID = Db::getId('tbl_personel',$deger);	 
	 return $personelID->ad_soyad;
	}

	function user($deger)
	{
		if($deger==1){$kidem = "Admin";
		}elseif($deger==2){$kidem = "Sevk Amir ";
		}elseif($deger==3){$kidem = "Amir ";
		}elseif($deger==4){$kidem = "Kalem";
		}elseif($deger==5){$kidem = "User Kullanıcı";
		}else{$kidem = "Geçersiz Kullanıcı";}
				
	return $kidem;
	}
	//User Kısmına ait Fonksiyonlar 
	function usersor($tablo,$durum,$onay,$Sube,$A_Onay,$S_Onay,$M_Onay)
	{ 
	 	$durum 	= Db::count($tablo,'WHERE durum = ? AND onay = ? AND amirID = ? AND A_Onay = ? AND S_Onay = ?',array($durum,$onay,$Sube,$A_Onay,$S_Onay,$M_Onay));
		return $durum;
	}
	function useriptalsor($tablo,$durum,$onay,$Sube,$A_Onay,$S_Onay)
	{ 
	 	$durum 	= Db::count($tablo,'WHERE durum = ? AND onay = ? AND A_Onay = ? OR S_Onay = ? OR M_Onay = ?',array($durum,$onay,$Sube,$A_Onay,$S_Onay,));
		return $durum;
	}
	
	function amirsor($tablo,$durum,$onay,$Sube,$A_Onay,$S_Onay,$M_Onay)
	{ 
	 	$durum 	= Db::count($tablo,'WHERE durum = ? AND onay = ? AND amirID = ? AND A_Onay = ? AND S_Onay = ? AND M_Onay = ?',array($durum,$onay,$Sube,$A_Onay,$S_Onay,$M_Onay));
		return $durum;
	}
	
	function amironaysor($tablo,$durum,$onay,$Sube,$A_Onay)
	{ 
	 	$durum 	= Db::count($tablo,'WHERE durum = ? AND onay = ? AND amirID = ? AND A_Onay = ?',array($durum,$onay,$Sube,$A_Onay));
		return $durum;
	}
	
	function samirsor($tablo,$durum,$onay,$A_Onay,$S_Onay)
	{ 
	 	$durum 	= Db::count($tablo,'WHERE durum = ? AND onay = ? AND A_Onay = ? AND S_Onay = ?',array($durum,$onay,$A_Onay,$S_Onay));
		return $durum;
	}
	function modsor($tablo,$durum,$onay,$A_Onay,$S_Onay,$M_Onay)
	{ 
		$durum 	= Db::count($tablo,'WHERE durum = ? AND onay = ? AND A_Onay = ? AND S_Onay = ? AND M_Onay = ?',array($durum,$onay,$A_Onay,$S_Onay,$M_Onay));
		return $durum;
	}
	function iptalsor($tablo,$durum,$onay,$A_Onay,$S_Onay)
	{ 
	 	$durum 	= Db::count($tablo,'WHERE durum = ? AND onay = ? AND A_Onay = ? OR S_Onay = ? OR M_Onay = ?',array($durum,$onay,$A_Onay,$S_Onay));
		return $durum;
	}


	
	
