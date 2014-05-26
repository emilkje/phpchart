<?php

namespace Innit\Chart\Support;

interface LayerInterface {
	public function addItem($label, $value);
	public function items();
}