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

namespace PhantomChain\Tests\Crypto\Transactions\Deserializers;

use PhantomChain\Tests\Crypto\TestCase;
use PhantomChain\Crypto\Identities\Address;
use PhantomChain\Crypto\Transactions\Transaction;
use PhantomChain\Crypto\Transactions\Deserializer;

/**
 * This is the second signature registration deserializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Deserializers\SecondSignatureRegistration
 */
class SecondSignatureRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_second_passphrase()
    {
        $transaction = $this->getTransactionFixture('second_signature_registration', 'second-passphrase');

        $actual = $this->assertTransaction($transaction);

        // special case as the type 1 transaction itself has no recipientId
        $this->assertSame($actual->recipientId, Address::fromPublicKey($actual->senderPublicKey, $actual->network));
    }

    private function assertTransaction(array $fixture): Transaction
    {
        return $this->assertDeserialized($fixture, [
            'type',
            'timestamp',
            'senderPublicKey',
            'fee',
            'asset',
            'signature',
            'amount',
            'id',
        ]);
    }
}
