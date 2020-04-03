<!DOCTYPE html>
<html>
<head>
  <?php include('inc/head.php');?>
 <style>
	body{
	    background: linear-gradient(to bottom, #ffdd96 0%, #ffffff 100%);
	}
</style>
</head>
<body  class="hold-transition ">

<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/logo_tarimlogo.png">
    <a href="#"><b>Araç Görevlendirme</b> Sistemi</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Kullanıcı Giriş Formu</p>
	
    <form method="post" id="frmlogin" action="#">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Kullanıcı Şifresi"  name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
      	<!-- /.col -->
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- 

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>
 	-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- ./wrapper -->

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


	<script type="text/javascript">
    $(function(){
	$('#frmlogin').submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting via the browser
	 	 $.ajax({
			data: $('#frmlogin').serialize(),
			type: 'POST',
			url:  'pg/post.login.php',
			success: function(html){    
			if(html=='true'){
				setTimeout(function(){$("#LoginM").modal('show');},1000);
				setTimeout(function(){$("#LoginM").modal('hide');},3000);
				setTimeout(function(){window.location ='index.php';},4000);
				}else{
				alert('Kullanıcı Adı Şifreniz Yanlıştır.');
			}},
			error: function(){
				// alert(response)
				alert('Form Hatası');
			}
		});
	});	
	});
	</script>
<div class="modal fade" id="LoginM">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistem Mesajı</h4>
          </div>
          <div class="modal-body" align="center">
            <p>Giriş İşlem Yapılıyor.<br/>Lütfen Bekleyiniz.</p>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
 	</div>
<!-- Bootstrap 3.3.7 -->
<!-- daterangepicker -->
</body>
</html>
