<?php

namespace Innit\Chart\Support;

class Layer implements LayerInterface {
	
	private $items = array();

	public function addItem($label, $value) {
		array_push($this->items, array('label' => $label, 'value' => $value));
	}

	public function items(){
		return $this->items;
	}
}