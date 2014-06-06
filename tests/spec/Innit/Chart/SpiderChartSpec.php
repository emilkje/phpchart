<?php

namespace spec\Innit\Chart;

use Innit\Chart\Support\Layer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpiderChartSpec extends ObjectBehavior
{
  function it_is_initializable()
  {
    $this->shouldHaveType('Innit\Chart\SpiderChart');
  }

  function it_should_create_layer()
  {
    $layer = $this->createLayer();
    $layer->shouldHaveType('Innit\Chart\Support\Layer');
    $layer->shouldImplement('Innit\Chart\Support\LayerInterface');
  }

  function it_should_implement_chart_interface() {
    $this->shouldImplement('Innit\Chart\Support\ChartInterface');
  }

  function it_adds_a_layer_to_the_layer_stack(Layer $layer, Layer $another_layer)
  {
    $this->addLayer($layer);
    $this->addLayer($another_layer);
    $layers = $this->layers();
    $layers[0]->shouldBe($layer);
    $layers[1]->shouldBe($another_layer);
  }

  function it_adds_a_class_to_the_class_stack()
  {
    $this->addClass("testclass");
    $classes = $this->classes()->shouldReturn(array("testclass"));
  }

  function it_should_have_chainable_class_setters() {
    $this->addClass('foo')->shouldHaveType('Innit\Chart\SpiderChart');
  }

  function it_should_generate_unique_identifier_on_draw()
  {
    ob_start();
    $this->draw();
    ob_end_clean();
    $this->id->shouldNotBeNull();
  }

  function it_should_set_default_options() {
    $this->options()->shouldBe($this->default_options);
  }

  function it_should_add_option_to_list() {
    $option = "bar";
    $default_options = $this->default_options;

    $this->option('foo', $option);
    $this->option('foo')->shouldBe($option);

    $option = "world";
    $this->option('hello', $option);
    $this->option('hello')->shouldBe($option);
  }

  function it_should_have_chainable_option_setters() {
    $this->option('foo', 'bar')->shouldHaveType('Innit\Chart\SpiderChart');
  }

}
