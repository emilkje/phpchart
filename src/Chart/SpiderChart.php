<?php

namespace Innit\Chart;

class SpiderChart extends Chart {

	public $default_options = array(
		'h' => '600',
		'w' => '600',
		'factor' => '1',
		'factorLegend' => '.95',
		'levels' => '10',
		'maxValue' => '1',
		'opacityArea' => '.5',
		'color' => 'd3.scale.category10()',
		'padding-x' => '200',
		'padding-y' => '200',
		'translate-x' => '80',
		'translate-y' => '30',
		'legend' => 'false'
	);


	public function draw() {
		parent::draw();
		echo $this->generateJS();
	}

	public function generateJS() {

		$formattedItems = array_map(function($layer) {

			return array_map(function($item){
				return array(
					'axis' => $item['label'],
					'value' => $item['value']/100,
					'desc' => $item['desc']);
			}, $layer->items());

		}, $this->layers());

		$str = '';
		$str .= '<script>';
		$str .= '$(function(){';
		$str .= 'var d = ' . json_encode($formattedItems) . ';';
		$str .= 'var cfg = {
			h: '.$this->option('h').',
			w: '.$this->option('w').',
			color: '.$this->option('color').',
			factor: '.$this->option('factor').',
			factorLegend: '.$this->option('factorLegend').',
			levels: '.$this->option('levels').',
			maxValue: '.$this->option('maxValue').',
			opacityArea: '.$this->option('opacityArea').',
			ExtraWidthX: '.$this->option('padding-x').',
			ExtraWidthY: '.$this->option('padding-y').',
			TranslateX: '.$this->option('translate-x').',
			TranslateY: '.$this->option('translate-y').',
			legend: '.$this->option('legend').',
		};
		SpiderChart.draw("#' . $this->id . '", d, cfg);';
		$str .= '});';
		$str .= '</script>';

		return $str;
	}
};
