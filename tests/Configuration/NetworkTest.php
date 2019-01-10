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

namespace PhantomChain\Tests\Crypto\Managers;

use PhantomChain\Tests\Crypto\TestCase;
use PhantomChain\Crypto\Networks\Devnet;
use PhantomChain\Crypto\Networks\Mainnet;
use PhantomChain\Crypto\Configuration\Network;
use PhantomChain\Crypto\Networks\AbstractNetwork;

/**
 * This is the network configuration test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Configuration\Network
 */
class NetworkTest extends TestCase
{
    /** @test */
    public function it_should_get_the_network()
    {
        $actual = Network::get();

        $this->assertInstanceOf(AbstractNetwork::class, $actual);
    }

    /** @test */
    public function it_should_set_the_network()
    {
        Network::set(Mainnet::new());

        $actual = Network::get();
        $this->assertInstanceOf(Mainnet::class, $actual);

        Network::set(Devnet::new());

        $actual = Network::get();
        $this->assertInstanceOf(Devnet::class, $actual);
    }
}
