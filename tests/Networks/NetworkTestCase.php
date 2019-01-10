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
use PhantomChain\Tests\Crypto\TestCase;

/**
 * This is the devnet network test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class NetworkTestCase extends TestCase
{
    /** @test */
    public function it_should_get_epoch()
    {
        $actual = $this->getTestSubject()->epoch();

        $this->assertSame($actual, $this->epoch);
    }
}
