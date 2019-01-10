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

namespace PhantomChain\Tests\Crypto\Identities;

use PhantomChain\Tests\Crypto\TestCase;
use PhantomChain\Crypto\Identities\WIF as TestClass;

/**
 * This is the address test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Identities\WIF
 */
class WIFTest extends TestCase
{
    /** @test */
    public function it_should_get_the_wif_from_passphrase()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromPassphrase($fixture['passphrase']);

        $this->assertSame($fixture['data']['wif'], $actual);
    }
}
