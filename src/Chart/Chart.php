<?php

namespace Innit\Chart;

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class Chart implements Support\ChartInterface {

	private $layers = array();
	private $id = null;
	private $options = array();

	public function __construct() {

	}

	public function createLayer() {
		return new Support\Layer;
	}

	public function draw() {

	}

	public function uuid() {
		if($this->id)
			return $this->id;

		try {

			// Generate a version 5 (name-based and hashed with SHA1) UUID
			$this->id = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'php.net');

		} catch (UnsatisfiedDependencyException $e) {

			// Some dependency was not met. Either the method cannot be called on a
			// 32-bit system, or it can, but it relies on Moontoast\Math to be present.
			// fall back on a custom random-string generator
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			$this->id = $randomString;
		}

		return $this->id;
	}

	public function addLayer(Support\LayerInterface $layer) {
		array_push($this->layers, $layer);
		return $this;
	}

	public function layers() {
		return $this->layers;
	}

	public function option($key, $value = null) {
		if($value == null) return $this->option[$key];
		$this->option[$key] = $value;
		return $this;
	}

	public function options() {
		return $this->option;
	}
}