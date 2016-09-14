<?php

class ActualizacionFacade {

	public function update() 
	{
		$actualizacionMapper = new ActualizacionMapper();
		$actualizacionMapper->update();
	}

	public function get() 
	{
		$actualizacionMapper = new ActualizacionMapper();
		return $actualizacionMapper->findById(1);
	}

}

?>