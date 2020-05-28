    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Görevlendirme</h3>
        </div>
        <div class="box-body">
          <button type="button" class="btn btn-warning main1">
            Görevler <span class="label label-primary"> <?=samirsor(tbl_gorev,1,1,1,0)?></span>
          </button>
          <button type="button" class="btn btn-success main2">
            Onaylananlar <span class="label label-primary"> <?=samirsor(tbl_gorev,1,1,1,1)?></span>
          </button>
          <button type="button" class="btn btn-danger main3">
            İptal Edilenler <span class="label label-primary"> <?=samirsor(tbl_gorev,1,1,1,2)?></span>
          </button>
          <button type="button" class="btn btn-success main4">
            Dosyaya Kaldırılanlar <span class="label label-primary"> <?=modsor(tbl_gorev,1,1,1,1,1)?></span>
          </button>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-md-12" id="icerik">
    </div>
    <!-- /.col -->
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(function(){
		$('#icerik').load('pg/list_gorevler_samir_1.php');
		//**//
		$(document).on('click', '.main1', function(){  
		$('#icerik').load('pg/list_gorevler_samir_1.php');
		});
		//*//
		$(document).on('click', '.main2', function(){  
		$('#icerik').load('pg/list_gorevler_samir_2.php');
		});
		//*//
		$(document).on('click', '.main3', function(){  
		$('#icerik').load('pg/list_gorevler_samir_3.php');
		});
		//*//
		$(document).on('click', '.main4', function(){  
		$('#icerik').load('pg/list_gorevler_samir_4.php');
		});
		//*//
		
	});
</script>