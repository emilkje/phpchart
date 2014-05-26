<?php

namespace Innit\Chart\Support;

class Layer implements LayerInterface {

	private $items = array();

	public function addItem($value, $label='', $desc='') {
		array_push($this->items, array('value' => $value, 'label' => $label,  'desc' => $desc));
		return $this;
	}

	public function items(){
		return $this->items;
	}
}
