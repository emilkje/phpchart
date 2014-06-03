#PHPChart
PHPChart is a php helper for generating charts with d3.js

##Dependencies

* jQuery.js
* d3.js
* all the files in `lib/` directory

##Usage

###SpiderChart

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

    // Available options
    $chart
      ->option('h', '600')
      ->option('w', '600')
      ->option('factor', '1') // [0-1] distance from outer bounds to outer circle
      ->option('factorLegend', '.95') // [0-1] distance from outer circle to label
      ->option('levels', 10) // total spider web circles
      ->option('maxValue', '1') // max value (change if not percent)
      ->option('opacityArea', '.5') // Layer opacity
      ->option('color', 'd3.scale.category10()') // Color scheme
      ->option('padding-x', '200')
      ->option('padding-y', '200')
      ->option('translate-x', '80')
      ->option('translate-y', '30')
      ->draw();

    ?>

###SpeedometerChart
    <?php
    $chart = new SpeedometerChart();
    $chart
        ->max(100)
        ->value(33)
        ->draw();

    // Available options
    $chart->max(100)->value(33)
        ->option('value2') //optional second bar
        ->option('innerRadius', 50)
        ->option('outerRadius', 80)
        ->option('margin', 10)
        ->option('animate', true)
        ->option('duration', 1000) // in ms
        ->option('ease', 'cubic-in-out') // https://github.com/mbostock/d3/wiki/Transitions#d3_ease
        ->option('background', '#f0f0f0') // background bar-color
        ->draw();
    ?>
