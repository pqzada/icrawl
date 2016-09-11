<?php

class PublicacionFacade {

	public function save(Publicacion $publicacion) 
	{
		$publicacionMapper = new PublicacionMapper();
		$tmp = $publicacionMapper->findById($publicacion->getId());

		if(is_null($tmp)) {

			$imageName = '/upload/publicaciones/' . $publicacion->getIdUsuario() . '/' . $publicacion->getId() . '.jpg';
			if(Image::download($publicacion->getImagen(), $imageName))
				$publicacion->setImagen($imageName);
			$publicacionMapper->save($publicacion);

		} else {
			$publicacionMapper->update($publicacion, $tmp->getId());
		}
	}

	public function getUltimas() 
	{
		global $config;

		$publicacionMapper = new PublicacionMapper();
		return $publicacionMapper->findUltimas($config['publicaciones_por_pagina']);

	}

	public function getDestacadas() 
	{	
		global $config;
		$publicacionMapper = new PublicacionMapper();
		return $publicacionMapper->findDestacadas($config['publicaciones_por_pagina']);
	}

	public function eliminar($publicacionId)
	{
		$publicacionMapper = new PublicacionMapper();
		return $publicacionMapper->delete($publicacionId);
	}

	public function getMediaComentarios($userId)
	{
		$publicacionMapper = new PublicacionMapper();
		return $publicacionMapper->avgComentarios($userId);
	}

	public function getMediaLikes($userId)
	{
		$publicacionMapper = new PublicacionMapper();
		return $publicacionMapper->avgLikes($userId);
	}

}

?>