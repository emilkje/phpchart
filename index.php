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

<style>.chart{float: left;}</style>
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
?>

<div style="clear:both; margin: 30px 0">
<?php
$chart2 = new SpeedometerChart();
$chart2->max(100);
$chart2->value(1);
$chart2->draw();

$chart2->value(25);
$chart2->draw();

$chart2->value(50);
$chart2->draw();

$chart2->value(75);
$chart2->draw();

$chart2->value(100);
$chart2->draw();
?>
</div>
</body>
</html>
