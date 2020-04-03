<div class="row">
<?php
	if(isset($_GET['pg'])){
		$pg = $_GET['pg'];
		switch ($pg){
		   case 0: include('pg/ekle_gorevtalep.php'); break;
		   case 1: include('pg/ekle_amir.php'); break;
		   case 2: include('pg/ekle_personel.php'); break;
		   case 3: include('pg/ekle_sofor.php'); break;
		   case 4: include('pg/ekle_arac.php'); break;
		   case 5: include('pg/ekle_persontalep.php'); break;
		   case 6: include('pg/ekle_sube.php'); break;
		   case 7: include('pg/list_gorevler.php'); break;
		   default: include('pg/m_index.php');
		}		   
	}else{
			if($_SESSION['Yetki']==2){ //sevk
				include('pg/m_index_samir.php');
			}elseif($_SESSION['Yetki']==3){ //amir
				include('pg/m_index_amir.php');
			}elseif($_SESSION['Yetki']==4){ //Mod
				include('pg/m_index_mod.php');
			}else{
				include('pg/m_index.php');
			}
	}
?>
</div>