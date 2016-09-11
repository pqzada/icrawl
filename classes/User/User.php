<?php

class User extends Model {

	public $id;
	public $cuenta;
	public $nombre;
	public $url;
	public $publicaciones;
    public $media_comentarios;
    public $media_likes;

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = $id;
        return $this;
    }

    public function getCuenta() 
    {
        return $this->cuenta;
    }

    public function setCuenta($cuenta) 
    {
        $this->cuenta = $cuenta;
        return $this;
    }

    public function getNombre() 
    {
        return $this->nombre;
    }

    public function setNombre($nombre) 
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getUrl() 
    {
        return $this->url;
    }

    public function setUrl($url) 
    {
        $this->url = $url;
        return $this;
    }

    public function getPublicaciones() 
    {
        return $this->publicaciones;
    }

    public function setPublicaciones($publicaciones) 
    {
        $this->publicaciones = $publicaciones;
        return $this;
    }

    public function getMediaComentarios() 
    {
        return $this->media_comentarios;
    }

    public function setMediaComentarios($media_comentarios) 
    {
        $this->media_comentarios = $media_comentarios;
        return $this;
    }

    public function getMediaLikes() 
    {
        return $this->media_likes;
    }

    public function setMediaLikes($media_likes) 
    {
        $this->media_likes = $media_likes;
        return $this;
    }
}

?>