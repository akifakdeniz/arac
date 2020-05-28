<?php
	session_start();
	ob_start(); //Yönlendirmeleri aktifleştir
	error_reporting(0); //Hataları gösterme
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	date_default_timezone_set('Europe/Istanbul');

	/*if (!isset($_SESSION['Sure']) ){
				$_SESSION['Sure'] = time() + 600;
		}
	
		if (time() > $_SESSION['Sure'] ){
			//unset($_SESSION['Sure']);
			session_destroy();
		}
	*/
	/*
	function redirect($url){ 
    if (!headers_sent()){  
        header('Location: '.$url); exit; 
    }else{ 
        echo '<script type="text/javascript">'; 
        echo 'window.location.href="'.$url.'";'; 
        echo '</script>'; 
        echo '<noscript>'; 
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />'; 
        echo '</noscript>'; exit; 
    } 
	}  
	*/

ob_end_flush(); 