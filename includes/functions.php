<?php

function includeFiles($ruta) {

	if (is_dir($ruta)) {

		if ($dh = opendir($ruta)) {
			while (($file = readdir($dh)) !== false) {
				if ($file!="." && $file!="..") {
					if(!is_dir($ruta . '/' . $file)) require_once $ruta . '/' . $file;
					includeFiles($ruta . '/' . $file);
				}	
			}
		}

		closedir($dh);

	}

}

?>