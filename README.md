#PHPChart
PHPChart is a php helper for generating charts with d3.js

##Dependencies

* jQuery.js
* d3.js
* all the files in `lib/` directory

##Usage

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
