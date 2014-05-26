<?php
include 'vendor/autoload.php';
use Innit\Chart\SpiderChart;
?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript" src="lib/SpiderChart.js"></script>
<title>SpiderChart</title>
</head>
<body>


<?php
$chart = new SpiderChart();

for($i = 0; $i < 3; $i++) {
	$layer = $chart->createLayer();
	for($j = 0; $j < 7; $j++) {
		$layer->addItem('Random ' . $j, ceil(rand(0,100)));
	}
	$chart->addLayer($layer);
}

$chart->option('h', '600')
	  ->option('w', '600')
	  ->option('factor', '.95')
	  ->option('factorLegend', '1')
	  ->option('levels', '3')
	  ->option('maxValue', '0')
	  ->option('opacityArea', '.5')
	  ->option('color', 'd3.scale.category10()')
	  ->draw();
?>
</body>
</html>