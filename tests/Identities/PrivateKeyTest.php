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
use PhantomChain\Crypto\Identities\PrivateKey as TestClass;

/**
 * This is the address test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Identities\PrivateKey
 */
class PrivateKeyTest extends TestCase
{
    /** @test */
    public function it_should_get_the_private_key_from_passphrase()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromPassphrase($fixture['passphrase']);

        $this->assertSame($fixture['data']['privateKey'], $actual->getHex());
    }

    /** @test */
    public function it_should_get_the_private_key_from_hex()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromHex($fixture['data']['privateKey']);

        $this->assertSame($fixture['data']['privateKey'], $actual->getHex());
    }

    /** @test */
    public function it_should_get_the_private_key_from_wif()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromWif($fixture['data']['wif']);

        $this->assertSame($fixture['data']['privateKey'], $actual->getHex());
    }
}
