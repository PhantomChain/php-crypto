<?php

declare(strict_types=1);

/*
 * This file is part of PHANTOM PHP Crypto.
 *
 * (c) PhantomChain <info@phantom.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhantomChain\Tests\Crypto\Utils;

use PhantomChain\Crypto\Utils\Slot;
use PhantomChain\Tests\Crypto\TestCase;

/**
 * This is the slot test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Utils\Slot
 */
class SlotTest extends TestCase
{
    /** @test */
    public function it_should_get_the_time()
    {
        $actual = Slot::time();

        $this->assertInternalType('int', $actual);
    }

    /** @test */
    public function it_should_get_the_epoch()
    {
        $actual = Slot::epoch();

        $this->assertInternalType('int', $actual);
    }
}
