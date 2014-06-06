<?php

namespace spec\Innit\Chart;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpeedometerChartSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Innit\Chart\SpeedometerChart');
    }

    function it_should_implement_chart_interface() {
      $this->shouldImplement('Innit\Chart\Support\ChartInterface');
    }

    function it_should_set_and_get_max_value() {
      $this->max(100);
      $this->max()->shouldReturn(100);
    }

    function it_should_set_and_get_current_value() {
      $this->value(20);
      $this->value()->shouldReturn(20);
    }
}
