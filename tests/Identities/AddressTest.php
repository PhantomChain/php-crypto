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
use PhantomChain\Crypto\Identities\PrivateKey;
use PhantomChain\Crypto\Identities\Address as TestClass;

/**
 * This is the address test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Identities\Address
 */
class AddressTest extends TestCase
{
    /** @test */
    public function it_should_get_the_address_from_passphrase()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromPassphrase($fixture['passphrase']);

        $this->assertSame($fixture['data']['address'], $actual);
    }

    /** @test */
    public function it_should_get_the_address_from_public_key()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromPublicKey($fixture['data']['publicKey']);

        $this->assertSame($fixture['data']['address'], $actual);
    }

    /** @test */
    public function it_should_get_the_address_from_private_key()
    {
        $fixture = $this->getFixture('identity');

        $privateKey = PrivateKey::fromPassphrase($fixture['passphrase']);

        $actual = TestClass::fromPrivateKey($privateKey);

        $this->assertSame($fixture['data']['address'], $actual);
    }

    /** @test */
    public function it_should_validate_the_address()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::validate($fixture['data']['address']);

        $this->assertTrue($actual);
    }

    /** @test */
    public function it_should_fail_to_validate_the_address()
    {
        $actual = TestClass::validate('invalid');

        $this->assertFalse($actual);
    }
}
