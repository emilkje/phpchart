<?php

namespace Innit\Chart;

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class Chart implements Support\ChartInterface {

	private $layers = array();
	public $id = null;
	private $options = array();
	private $classes = array();
	public $default_options = array();

	public function __construct() {
		$this->options($this->default_options);
	}

	public function createLayer($id = null) {
		return new Support\Layer($id);
	}

	public function generate() {
		$this->id = $this->uuid();
		$str = '';
		$str .= '<div id="'.$this->id.'" class="chart '.join('', array_slice(explode('\\', get_class($this)), -1)).' '.implode(' ', $this->classes).'"';
		foreach($this->options() as $key => $val) {
			$str .= ' data-'.$key.'="'.$val.'"';
		}
		$str .= '></div>';
		return $str;
	}

	public function draw() {
		echo $this->generate();
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

		return 'chart_'.$id;
	}

	public function addLayer(Support\LayerInterface $layer) {
		$this->layers[$layer->id()] = $layer;
		return $this;
	}

	public function layers() {
		return $this->layers;
	}

	public function getLayer($id) {
		return isset($this->layers[$id]) ? $this->layers[$id] : null;
	}

	public function option($key, $value = null) {
		if($value === null) return $this->options[$key];
		$this->options[$key] = $value;
		return $this;
	}

	public function options($options = null) {
		if($options === null)
			return $this->options;

		$this->options = $options;
		return $this;
	}

	public function addClass($class) {
		array_push($this->classes, $class);
		return $this;
	}

	public function classes() {
		return $this->classes;
	}
}
