<?php

class Actualizacion {

	public $id;
	public $fecha;

	public function __construct($data) {
		$this->id = $data['id'];
		$this->fecha = $data['fecha'];
	}

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}

?>