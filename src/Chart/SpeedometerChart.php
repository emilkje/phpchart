<?php

namespace Innit\Chart;

class SpeedometerChart extends Chart {

  public function __construct() {
    $this->defaults();
  }

  private function defaults() {
    $this
      ->option('max', 100)
      ->option('value', 0)
      ->option('value2', 'false')
      ->option('innerRadius', 50)
      ->option('outerRadius', 80)
      ->option('margin', 10)
      ->option('animate', 'true')
      ->option('duration', '1000')
      ->option('ease', 'cubic-in-out')
      ->option('background', 'transparent');
  }

  public function value($val = NULL) {
    if($val === NULL)
      return $this->option('value');

    $this->option('value', $val);
    return $this;
  }

  public function max($max = NULL) {
    if($max === NULL)
      return $this->option('max');

    $this->option('max', $max);
    return $this;
  }

};
