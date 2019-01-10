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
use PhantomChain\Crypto\Transactions\Deserializer;
use PhantomChain\Crypto\Transactions\Deserializers\IPFS;

/**
 * This is the ipfs deserializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Deserializers\IPFS
 */
class IPFSTest extends TestCase
{
    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_passphrase()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $transaction = $this->getTransactionFixture('ipfs', 'passphrase');

        $this->assertTransaction($transaction);
    }
}
