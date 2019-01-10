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
use PhantomChain\Crypto\Transactions\Builder\TimelockTransfer;

/**
 * This is the timelock transfer builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Builder\TimelockTransfer
 */
class TimelockTransferTest extends TestCase
{
    /** @test */
    public function it_should_sign_it_with_a_passphrase()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $transaction = TimelockTransfer::new()
            ->timestamp()
            ->timelock(time())
            ->recipient('AXoXnFi4z1Z6aFvjEYkDVCtBGW2PaRiM25')
            ->amount(133380000000)
            ->vendorField('This is a transaction from PHP')
            ->sign($this->passphrase);

        $this->assertTrue($transaction->verify());
    }

    /** @test */
    public function it_should_sign_it_with_a_second_passphrase()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');

        $secondPassphrase = 'this is a top secret second passphrase';

        $transaction = TimelockTransfer::new()
            ->timestamp()
            ->timelock(time())
            ->recipient('AXoXnFi4z1Z6aFvjEYkDVCtBGW2PaRiM25')
            ->amount(133380000000)
            ->vendorField('This is a transaction from PHP')
            ->sign($this->passphrase);

        $this->assertTrue($transaction->verify());
    }
}
