<?php
namespace spec\Monad;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin \Monad\Utils
 */
class UtilsSpec extends ObjectBehavior
{
    public function it_should_reduce_to_base_monad_values()
    {
        $result = $this::reduce([
            \Monad\Identity::create(1),
            \Monad\Identity::create(2),
            \Monad\Identity::create(3),
        ], function ($base, $value) {
            return $base + $value;
        }, 0);

        $result->shouldBeAnInstanceOf('Monad\MonadInterface');
        $result->shouldBeAnInstanceOf('Common\ValueOfInterface');
        $result->valueOf()->shouldReturn(6);
    }
}