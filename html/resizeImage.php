<?php 
	class resizeImage{
		public function resize($arquivo, $tipo, $newwidth, $newheight) {
			list($width,$height)=getimagesize($arquivo);
			if(empty($newwidth)) {
				$newwidth=400;	
			}
			if (empty($newheight)) {
				$newheight=($height/$width)*$newwidth;
			}
			
			$tmp=imagecreatetruecolor($newwidth,$newheight);

			if ( $tipo == 'image/png' ) {
				$source = imagecreatefrompng($arquivo);
			} else if ( $tipo == 'image/jpeg' ) {
				$source = imagecreatefromjpeg($arquivo);
			} else if ( $tipo == 'image/gif' ) {
				$source = imagecreatefromgif($arquivo);
			}

			imagecopyresized($tmp,$source,0,0,0,0,$newwidth,$newheight,$width,$height);

			ob_start();

			if ( $tipo == 'image/png' ) {
				imagepng($tmp);
			} else if ( $tipo == 'image/jpeg' ) {
				imagejpeg($tmp);
			} else if ( $tipo == 'image/gif' ) {
				imagegif($tmp);
			}
			$conteudo = ob_get_contents();
			ob_end_clean();

			return array('img'=>$conteudo,'height'=>$newheight);
		}
	}

 ?>