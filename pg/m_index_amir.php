    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Görevlendirme</h3>
             
        </div>
        <div class="box-body">
          <button type="button" class="btn btn-warning main1">
            Görevler <span class="label label-primary"> <?=amirsor('tbl_gorev',1,1,$_SESSION['Sube'],0,0,0)?></span>
          </button>
          <button type="button" class="btn btn-success main2">
          	Onaylananlar <span class="label label-primary"> <?=amironaysor('tbl_gorev',1,1,$_SESSION['Sube'],1)?></span>
          </button>
          <button type="button" class="btn btn-danger main3">
           	İptal Edilenler<span class="label label-primary"> <?=amirsor('tbl_gorev',1,1,$_SESSION['Sube'],2,0,0)?></span>
          </button>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-12" id="icerik">
    </div>
    <!-- /.col -->
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(function(){
		$('#icerik').load('pg/list_gorevler_amir_1.php');
		//**//
		$(document).on('click', '.main1', function(){  
		$('#icerik').load('pg/list_gorevler_amir_1.php');
		});
		//*//
		$(document).on('click', '.main2', function(){  
		$('#icerik').load('pg/list_gorevler_amir_2.php');
		});
		//*//
		$(document).on('click', '.main3', function(){  
		$('#icerik').load('pg/list_gorevler_amir_3.php');
		});
		//*//
		
	});
</script>