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

namespace PhantomChain\Tests\Crypto\Transactions\Builder;

use PhantomChain\Crypto\Utils\Crypto;
use PhantomChain\Tests\Crypto\TestCase;
use PhantomChain\Crypto\Identities\PublicKey;
use PhantomChain\Crypto\Transactions\Builder\MultiPayment;

/**
 * This is the multi payment builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Builder\MultiPayment
 */
class MultiPaymentTest extends TestCase
{
    /** @test */
    public function it_should_sign_it_with_a_passphrase()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $transaction = MultiPayment::new()
            ->add('AXoXnFi4z1Z6aFvjEYkDVCtBGW2PaRiM25', 100000000)
            ->sign($this->passphrase);

        $this->assertTrue($transaction->verify());
    }

    /** @test */
    public function it_should_sign_it_with_a_second_passphrase()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $secondPassphrase = 'this is a top secret second passphrase';

        $transaction = MultiPayment::new()
            ->add('AXoXnFi4z1Z6aFvjEYkDVCtBGW2PaRiM25', 100000000)
            ->sign($this->passphrase)
            ->secondSign($secondPassphrase);

        $this->assertTrue($transaction->verify());
        $this->assertTrue($transaction->secondVerify(PublicKey::fromPassphrase($secondPassphrase)->getHex()));
    }
}
