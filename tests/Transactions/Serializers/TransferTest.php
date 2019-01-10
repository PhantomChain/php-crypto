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
use PhantomChain\Crypto\Transactions\Serializers\Transfer;

/**
 * This is the transfer serializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Serializers\Transfer
 */
class TransferTest extends TestCase
{
    /** @test */
    public function it_should_serialize_the_transaction_with_a_passphrase()
    {
        $this->assertSerialized($this->getTransactionFixture('transfer', 'passphrase'));
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_second_passphrase()
    {
        $this->assertSerialized($this->getTransactionFixture('transfer', 'second-passphrase'));
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_passphrase_and_vendor_field()
    {
        $transaction = $this->getTransactionFixture('transfer', 'passphrase-with-vendor-field');

        $actual = Serializer::new($transaction['data'])->serialize();

        $this->assertSame($transaction['serialized'], $actual->getHex());
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_second_passphrase_and_vendor_field()
    {
        $transaction = $this->getTransactionFixture('transfer', 'second-passphrase-with-vendor-field');

        $actual = Serializer::new($transaction['data'])->serialize();

        $this->assertSame($transaction['serialized'], $actual->getHex());
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_passphrase_and_vendor_field_hex()
    {
        $transaction = $this->getTransactionFixture('transfer', 'passphrase-with-vendor-field-hex');

        $actual = Serializer::new($transaction['data'])->serialize();

        $this->assertSame($transaction['serialized'], $actual->getHex());
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_second_passphrase_and_vendor_field_hex()
    {
        $transaction = $this->getTransactionFixture('transfer', 'second-passphrase-with-vendor-field-hex');

        $actual = Serializer::new($transaction['data'])->serialize();

        $this->assertSame($transaction['serialized'], $actual->getHex());
    }
}
