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

namespace PhantomChain\Tests\Crypto\Transactions\Serializers;

use PhantomChain\Tests\Crypto\TestCase;
use PhantomChain\Crypto\Transactions\Serializer;

/**
 * This is the delegate registration serializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Serializers\DelegateRegistration
 */
class DelegateRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_serialize_the_transaction_with_a_passphrase()
    {
        $this->assertSerialized($this->getTransactionFixture('delegate_registration', 'passphrase'));
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_second_passphrase()
    {
        $this->assertSerialized($this->getTransactionFixture('delegate_registration', 'second-passphrase'));
    }
}
