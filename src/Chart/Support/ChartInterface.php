<?php

namespace Innit\Chart\Support;

interface ChartInterface {
	public function draw();
	public function createLayer();
	public function addLayer(LayerInterface $layer);
	public function layers();
}