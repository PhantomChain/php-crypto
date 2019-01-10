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
use PhantomChain\Crypto\Transactions\Serializers\IPFS;

/**
 * This is the ipfs serializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Serializers\IPFS
 */
class IPFSTest extends TestCase
{
    /** @test */
    public function it_should_serialize_the_transaction_with_a_passphrase()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $this->assertSerialized($this->getTransactionFixture('ipfs', 'passphrase'));
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_second_passphrase()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $this->assertSerialized($this->getTransactionFixture('ipfs', 'second-passphrase'));
    }
}
