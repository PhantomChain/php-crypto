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

namespace PhantomChain\Tests\Crypto\Networks;

use BitWasp\Bitcoin\Network\Network;
use PhantomChain\Crypto\Networks\Mainnet;

/**
 * This is the mainnet network test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Networks\Mainnet
 */
class MainnetTest extends NetworkTestCase
{
    protected $epoch = '2017-03-21T13:00:00.000Z';

    public function getTestSubject()
    {
        return Mainnet::new();
    }
}
