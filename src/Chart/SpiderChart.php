<?php

namespace Innit\Chart;

class SpiderChart extends Chart {

	public function draw() {
		
		#echo '<pre>'; die(var_dump($this->layers()));

		$formattedItems = array_map(function($layer) {
			
			return array_map(function($item){
				return array('axis' => $item['label'], 'value' => $item['value']);
			}, $layer->items());

		}, $this->layers());

		echo '<div id="' . $this->uuid() . '"></div>';
		echo '<script>';
		echo 'var d = ' . json_encode($formattedItems) . ';';
		echo '
		SpiderChart.draw("#' . $this->uuid() . '", d);
		</script>';
	}
};