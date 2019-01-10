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
use PhantomChain\Crypto\Transactions\Builder\DelegateRegistration;

/**
 * This is the delegate registration builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Builder\DelegateRegistration
 */
class DelegateRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_sign_it_with_a_passphrase()
    {
        $transaction = DelegateRegistration::new()
            ->username('polopolo')
            ->sign($this->passphrase);

        $this->assertTrue($transaction->verify());
    }

    /** @test */
    public function it_should_sign_it_with_a_second_passphrase()
    {
        $secondPassphrase = 'this is a top secret second passphrase';

        $transaction = DelegateRegistration::new()
            ->username('polopolo')
            ->sign($this->passphrase)
            ->secondSign($secondPassphrase);

        $this->assertTrue($transaction->verify());
        $this->assertTrue($transaction->secondVerify(PublicKey::fromPassphrase($secondPassphrase)->getHex()));
    }
}
