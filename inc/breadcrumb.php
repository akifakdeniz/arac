<?php
	function breadcrumb($id){
		if(isset($id)){
		switch ($id){
		   case 0: echo "Görev Talep Formu"; break;
		   case 1: echo "Amir Bilgi Formu"; break;
		   case 2: echo "Personel Bilgi Formu"; break;
		   case 3: echo "Şöför Bilgi Formu"; break;
		   case 4: echo "Araç Bilgi Formu"; break;
		   case 7: echo "Görevlendirme"; break;
		   default: echo "Ana Sayfa";
		}
		}else{
			echo "Ana Sayfa";
		}
	}
?>
<section class="content-header">
  <h1>
	<?php if(isset($_GET['pg'])){breadcrumb($_GET['pg']);};?>
	<small>Kontrol panel</small>
  </h1>
  <ol class="breadcrumb">
	<li  class='active'><a href="index.php"><i class="fa fa-dashboard"></i> Ana Sayfa</a></li>
	<li><?php if(isset($_GET['pg'])){breadcrumb($_GET['pg']);};?></li>
  </ol>
</section>