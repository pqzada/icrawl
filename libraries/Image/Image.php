<?php

class Image {

	public static function download($imageUrl, $imageName) 
	{
		$path = dirname(__FILE__) . '/../..' . $imageName;
		return copy($imageUrl, $path);
	}

}

?>