<?php
include 'vendor/autoload.php';
use Innit\Chart\SpiderChart;
use Innit\Chart\SpeedometerChart;
?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript" src="lib/SpiderChart.js"></script>
<script type="text/javascript" src="lib/SpeedometerChart.js"></script>
<title>SpiderChart</title>

<style>
body{background: #f0f0f0;}
.chart{float: left;}
.chart.SpeedometerChart {
	background: rgba(255,255,255,.9);
	margin: 0 10px;
	border-radius: 4px;
	box-shadow: 0 0 20px -10px rgba(0,0,0,.8);
	padding-bottom:5px
}
</style>
</head>
<body>


<?php
$chart = new SpiderChart();
$layer = $chart->createLayer();
$layer
	->addItem(20, 'First', 'Description 1')
	->addItem(45, 'Second', 'Description 2')
	->addItem(30, 'Third', 'Description 3')
	->addItem(66, 'Fourth', 'Description 4')
	->addItem(90, 'Fifth', 'Description 5');

$chart->addLayer($layer);
$chart->option('factor', '1');
$chart->draw();

$chart2 = new SpeedometerChart();
$chart2
	->max(100)
	->value(1)
	->addClass('cutomclass')
	->option('background', '#f0f0f0');

$chart3 = clone($chart2);
$chart3->value(25);

$chart4 = clone($chart2);
$chart4->value(50)->option('animate', false);

$chart5 = clone($chart2);
$chart5->value(75)->option('background', "#f0f0f0");

$chart6 = clone($chart2);
$chart6->value(100);
?>

<div style="clear:both; margin: 30px 0">
	<?php
		$chart2->draw();
		$chart3->draw();
		$chart4->draw();
		$chart5->draw();
		$chart6->draw();
	?>
</div>
</body>
</html>
