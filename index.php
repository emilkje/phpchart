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
$layer = $chart->createLayer();
$layer
	->addItem(20, 'First', 'Description 1')
	->addItem(45, 'Second', 'Description 2')
	->addItem(30, 'Third', 'Description 3')
	->addItem(66, 'Fourth', 'Description 4')
	->addItem(90, 'Fifth', 'Description 5');

$chart->addLayer($layer);
$chart->draw();

?>
</body>
</html>
