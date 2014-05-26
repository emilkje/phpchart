<?php

namespace Innit\Chart;

class SpiderChart extends Chart {

	public function __construct() {
		$this->defaults();
	}

	private function defaults() {
		$this
			->option('h', '600')
			->option('w', '600')
			->option('factor', '1')
			->option('factorLegend', '.95')
			->option('levels', '10')
			->option('maxValue', '1')
			->option('opacityArea', '.5')
			->option('color', 'd3.scale.category10()')
			->option('padding-x', '200')
			->option('padding-y', '200');
	}

	public function draw() {

		#echo '<pre>'; die(var_dump($this->layers()));

		$formattedItems = array_map(function($layer) {

			return array_map(function($item){
				return array(
					'axis' => $item['label'],
					'value' => $item['value']/100,
					'desc' => $item['desc']);
			}, $layer->items());

		}, $this->layers());

		echo '<div id="' . $this->uuid() . '"></div>';
		echo '<script>';
		echo 'var d = ' . json_encode($formattedItems) . ';';
		echo 'var cfg = {
			h: '.$this->option('h').',
			w: '.$this->option('w').',
			color: '.$this->option('color').',
			factor: '.$this->option('factor').',
			factorLegend: '.$this->option('factorLegend').',
			levels: '.$this->option('levels').',
			maxValue: '.$this->option('maxValue').',
			opacityArea: '.$this->option('opacityArea').',
			ExtraWidthX: '.$this->option('padding-x').',
			ExtraWidthY: '.$this->option('padding-y').'
		};
		SpiderChart.draw("#' . $this->uuid() . '", d, cfg);
		</script>';
	}
};
