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

use BitWasp\Buffertools\Buffer;
use PhantomChain\Tests\Crypto\TestCase;
use PhantomChain\Crypto\Identities\PublicKey;
use PhantomChain\Crypto\Identities\PrivateKey;
use PhantomChain\Crypto\Transactions\Transaction;
use PhantomChain\Crypto\Transactions\Deserializer;

/**
 * This is the transaction test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Transaction
 */
class TransactionTest extends TestCase
{
    /** @test */
    public function should_compute_the_id_of_the_transaction()
    {
        $actual = $this->getTransaction()->getId();

        $this->assertSame('da61c6cba363cc39baa0ca3f9ba2c5db81b9805045bd0b9fc58af07ad4206856', $actual);
    }

    /** @test */
    public function should_sign_the_transaction_using_a_passphrase()
    {
        $privateKey = PrivateKey::fromPassphrase('this is a top secret passphrase');

        $transaction = $this->getTransaction();
        $transaction->signature = null;

        $this->assertEmpty($transaction->signature);
        $transaction->sign($privateKey);
        $this->assertNotEmpty($transaction->signature);
    }

    /** @test */
    public function should_sign_the_transaction_using_a_second_passphrase()
    {
        $privateKey = PrivateKey::fromPassphrase('this is a top secret second passphrase');

        $transaction = $this->getTransaction();
        $transaction->signSignature = null;

        $this->assertEmpty($transaction->signSignature);
        $transaction->secondSign($privateKey);
        $this->assertNotEmpty($transaction->signSignature);
    }

    /** @test */
    public function should_verify_the_transaction()
    {
        $actual = $this->getTransaction()->verify();

        $this->assertTrue($actual);
    }

    /** @test */
    public function should_verify_the_transaction_using_a_second_public_key()
    {
        $secondPassphrase = 'this is a top secret second passphrase';

        $secondPublicKey = PublicKey::fromPassphrase($secondPassphrase)->getHex();

        $actual = $this->getTransaction('second-passphrase')->secondVerify($secondPublicKey);

        $this->assertTrue($actual);
    }

    /** @test */
    public function should_parse_a_signature()
    {
        $fixture = $this->getTransactionFixture('transfer', 'passphrase');

        $transaction = $this->getTransaction();
        $transaction->signature = null;

        $this->assertEmpty($transaction->signature);
        $transaction->parseSignatures($fixture['serialized'], 166);
        $this->assertNotEmpty($transaction->signature);
    }

    /** @test */
    public function should_parse_a_second_signature()
    {
        $fixture = $this->getTransactionFixture('transfer', 'second-passphrase');

        $transaction = $this->getTransaction();
        $transaction->signature = null;
        $transaction->secondSignature = null;

        $this->assertEmpty($transaction->signature);
        $this->assertEmpty($transaction->secondSignature);

        $transaction->parseSignatures($fixture['serialized'], 166);

        $this->assertNotEmpty($transaction->signature);
        $this->assertNotEmpty($transaction->secondSignature);
    }

    /** @test */
    public function should_parse_a_multi_signature()
    {
        $fixture = $this->getTransactionFixture('multi_signature_registration', 'passphrase');

        $transaction = $this->getTransaction();
        $transaction->signature = null;
        $transaction->secondSignature = null;
        $transaction->signatures = null;

        $this->assertEmpty($transaction->signature);
        $this->assertEmpty($transaction->secondSignature);
        $this->assertEmpty($transaction->signatures);

        $transaction->parseSignatures($fixture['serialized'], 304);

        $this->assertNotEmpty($transaction->signature);
        $this->assertNotEmpty($transaction->secondSignature);
        $this->assertNotEmpty($transaction->signatures);
    }

    /** @test */
    public function should_turn_the_transaction_to_bytes()
    {
        $actual = $this->getTransaction()->toBytes();

        $this->assertInstanceOf(Buffer::class, $actual);
    }

    /** @test */
    public function should_serialize_the_transaction()
    {
        $fixture = $this->getTransactionFixture('transfer', 'passphrase');

        $actual = $this->getTransaction()->serialize();

        $this->assertSame($fixture['serialized'], $actual->getHex());
    }

    /** @test */
    public function should_deserialize_the_given_hex_value()
    {
        $fixture = $this->getTransactionFixture('transfer', 'passphrase');

        $actual = Transaction::deserialize($fixture['serialized']);

        $this->assertSameTransactions($fixture, $actual, [
            'type',
            'timestamp',
            'senderPublicKey',
            'fee',
            'amount',
            'recipientId',
            'signature',
            'id',
        ]);
    }

    /** @test */
    public function should_turn_the_transaction_to_an_array()
    {
        $actual = $this->getTransaction()->toArray();

        $this->assertInternalType('array', $actual);
    }

    /** @test */
    public function should_turn_the_transaction_to_json()
    {
        $actual = $this->getTransaction()->toJson();

        $this->assertInternalType('string', $actual);
    }

    private function getTransaction($file = 'passphrase'): Transaction
    {
        $fixture = $this->getTransactionFixture('transfer', $file);

        return Deserializer::new($fixture['serialized'])->deserialize();
    }
}
