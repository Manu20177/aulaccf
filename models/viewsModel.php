<?php 
	class viewsModel{
		public function get_views_model($views){
			if(
				$views=="home" ||
				$views=="dashboard" ||
				$views=="admin" ||
				$views=="adminlist" ||
				$views=="admininfo" ||
				$views=="account" ||
				$views=="student" ||
				$views=="studentlist" ||
				$views=="studentinfo" ||
				$views=="curso" ||
				$views=="listacursos" ||
				$views=="class" ||
				$views=="classlist" ||
				$views=="classinfo" ||
				$views=="classview" ||
				$views=="videonow" ||
				$views=="videolist" ||
				$views=="cursolist" ||
				$views=="cursoview" ||
				$views=="cursoinfo" ||
				$views=="cursoclave" ||
				$views=="cursoclases" ||				
				$views=="verificarcurso" ||				
				$views=="preguntas" ||				
				$views=="encuesta" ||	
				$views=="certificado" ||	
				$views=="encuestaadd" ||	
				$views=="evaluacionadd" ||	
				$views=="listaevaluacion" ||	
				$views=="listaencuesta" ||	
				$views=="reporteseducacion" ||	
				$views=="pruebareporte" ||	
							
				$views=="search"
			){
				if(is_file("./views/contents/".$views."-view.php")){
					$contents="./views/contents/".$views."-view.php";
				}else{
					$contents="login";
				}
			}elseif($views=="index"){
				$contents="login";
			}elseif($views=="login"){
				$contents="login";
			}else{
				$contents="login";
			}
			return $contents;
		}
	}