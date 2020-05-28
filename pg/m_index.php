    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Görevlendirme</h3>
             
        </div>
        <div class="box-body">
          <button type="button" class="btn btn-warning menu1">
            Onaylanan <span class="label label-default"> <?=usersor('tbl_gorev',1,1,$_SESSION['Sube'],1,1,0);?></span>
          </button>
          <button type="button" class="btn btn-success menu2">
            Amir Onay Bekleyen <span class="label label-default"> <?=usersor('tbl_gorev',1,1,$_SESSION['Sube'],0,0,0);?></span>
          </button>
          <button type="button" class="btn btn-danger menu3">
            Sevk Amir Onay Bekleyen <span class="label label-default"> <?=usersor('tbl_gorev',1,1,$_SESSION['Sube'],1,0,0);?></span>
          </button>
          <button type="button" class="btn btn-danger menu4">
            İptal Edilen  <span class="label label-default"> <?=iptalsor('tbl_gorev',1,1,2,2,2);?></span>
          </button>
          <button type="button" class="btn btn-info menu5">
            Geçmiş Görevler <span class="label label-default"> <?=modsor('tbl_gorev',1,1,$_SESSION['Sube'],1,1,1);?></span>
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
		$('#icerik').load('pg/m_list_1.php');
		//**//
		$(document).on('click', '.menu1', function(){  
		$('#icerik').load('pg/m_list_1.php');
		});
		//*//
		$(document).on('click', '.menu2', function(){  
		$('#icerik').load('pg/m_list_2.php');
		});
		//*//
		$(document).on('click', '.menu3', function(){  
		$('#icerik').load('pg/m_list_3.php');
		});
		//*//
		$(document).on('click', '.menu4', function(){  
		$('#icerik').load('pg/m_list_4.php');
		});
		//*//
		$(document).on('click', '.menu5', function(){  
		$('#icerik').load('pg/m_list_5.php');
		});
		//*//
		
	});
</script>