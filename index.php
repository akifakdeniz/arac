<?php include('class/web.class.php');?>
<?php include('class/configvt.php');?>
<?php include('class/funct.php');?>
<?php 
  if(isset($_SESSION['Yetki'])>=1){
	  
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('inc/head.php');?>
  
</head>
<body class="hold-transition skin-blue skin-blue-light">

<div class="wrapper">

  <header class="main-header">
	<?php include('inc/header.php');?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
	<?php include('inc/sidebar.php');?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('inc/breadcrumb.php');?>
   <!-- Main content -->
    <section class="content">
      <!-- Main row -->
        <?php include('page.php');?>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php include('inc/footer.php');?>
  </footer>
</div>
<!-- ./wrapper -->
<div class="modal modal-primary fade" id="Aktif">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistem Mesajı</h4>
          </div>
          <div class="modal-body" align="center">
            <p>Çıkış İşlem Yapılıyor.<br/>Lütfen Bekleyiniz.</p>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
 	</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css"/>

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-datepicker/bootstrap-datepicker.tr.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

	<script type="text/javascript">
        $(function(){
            //**//
            $('.logout').on('click', function(){ 
                 $.ajax({
                    type: 'POST',
                    url:  'pg/post.logout.php',
                    success: function(html){    
                    if(html=='true'){
                        setTimeout(function(){$("#Aktif").modal('show');},1000);
						setTimeout(function(){$("#Aktif").modal('hide');},3000);
						setTimeout(function(){window.location ='index.php';},4000)
                    }else{
                        alert('Form Hatası');
                    }},
                    error: function(){
                        // alert(response)
                        alert('Form Hatası');
                    }
                });
            });	
            });
        </script>
<script>
$('#datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'tr',   
      autoclose: true
    });
</script>

<!-- Bootstrap WYSIHTML5 -->
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php
  }else{
	echo "<script type='text/javascript'>window.location = 'login.php'</script>";
  }
?>