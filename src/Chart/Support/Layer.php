<?php

namespace Innit\Chart\Support;

use Rhumsaa\Uuid\Uuid;

class Layer implements LayerInterface {

	private $id;
	private $items = array();

	function __construct($id = null) {
		$this->id = $id ? : $this->uuid();
	}

	public function id() {
		return $this->id;
	}

	public function addItem($value, $label='', $desc='') {
		array_push($this->items, array('value' => $value, 'label' => $label,  'desc' => $desc));
		return $this;
	}

	public function items(){
		return $this->items;
	}

	private function uuid() {

		try {

			// Generate a version 4 (random-based) UUID
			$id = Uuid::uuid4();

		} catch (UnsatisfiedDependencyException $e) {

			// Some dependency was not met. Either the method cannot be called on a
			// 32-bit system, or it can, but it relies on Moontoast\Math to be present.
			// fall back on a custom random-string generator
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			$id = $randomString;
		}

		return 'layer_'.$id;
	}
}
