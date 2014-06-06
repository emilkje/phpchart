<?php

namespace spec\Innit\Chart\Support;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Innit\Chart\Support\Layer');
    }

    function it_should_add_item_to_list() {

      $this->addItem(1, "Testitem");
      $this->items()->shouldReturn(array(
        array('value' => 1, 'label' => "Testitem", "desc" => "")
      ));

      $this->addItem(10, "Testitem 2", "description of item");

      $this->items()->shouldReturn(array(
        array('value' => 1, 'label' => "Testitem", "desc" => ""),
        array('value' => 10, 'label' => 'Testitem 2', "desc" => "description of item")
      ));
    }

    function it_should_return_items() {
      $this->items()->shouldBeArray();
      $this->items()->shouldBe(array());
    }
}
