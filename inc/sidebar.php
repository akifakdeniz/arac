    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/<?=$_SESSION['Yetki'];?>.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=user($_SESSION['Yetki']);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i><?=$_SESSION['AdSoyad'];?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">KULLANICI MENU</li>
		<li><a href="index.php"><i class="fa fa-home"></i> <span>Ana Sayfa</span></a></li>
		<?php
			if($_SESSION['Yetki']==1 or $_SESSION['Yetki']==5){
		?>
        <li><a href="index.php?pg=7"><i class="fa fa-id-card"></i> <span>Görevler</span></a></li>
		<li><a href="index.php?pg=0"><i class="fa fa-calendar"></i> <span>Görev Talep Formu</span></a></li>
        <?php
			}
			if($_SESSION['Yetki']==1){
		?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i>
            <span>Tanımlamalar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?pg=1"><i class="fa fa-minus"></i> Amir Tanımlamalar</a></li>
            <li><a href="?pg=2"><i class="fa fa-minus"></i> Personel Tanımlamalar</a></li>
            <li><a href="?pg=3"><i class="fa fa-minus"></i> Şöför Tanımlamalar</a></li>
            <li><a href="?pg=4"><i class="fa fa-minus"></i> Araç Tanımlamalar</a></li>
            <li><a href="?pg=6"><i class="fa fa-minus"></i> Şube Tanımlamalar</a></li>
          </ul>
        </li>
       	<?php
		}
		if($_SESSION['Yetki']==4){
		?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i>
            <span>Tanımlamalar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?pg=3"><i class="fa fa-minus"></i> Şöför Tanımlamalar</a></li>
            <li><a href="?pg=4"><i class="fa fa-minus"></i> Araç Tanımlamalar</a></li>
          </ul>
        </li>
       	<?php
		}
		?>
      </ul>
    </section>
    <!-- /.sidebar -->