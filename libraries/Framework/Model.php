<?php

class Model {

	public function __construct($params=null) {
		if(!is_null($params)) {
			foreach($params as $field => $value) {
				if(property_exists(get_class($this), $field)) {
					$this->{$field} = $value;
				}
			}
		}
	}

	public function set($field, $value) {
		$this->{$field} = $value;
		return $this;
	}

	public function get($field) {
		return $this->{$field};
	}

}

?>