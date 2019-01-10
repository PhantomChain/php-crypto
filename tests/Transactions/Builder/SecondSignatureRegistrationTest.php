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

use PhantomChain\Tests\Crypto\TestCase;
use PhantomChain\Crypto\Identities\PublicKey;
use PhantomChain\Crypto\Transactions\Builder\SecondSignatureRegistration;

/**
 * This is the second signature registration builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Builder\SecondSignatureRegistration
 */
class SecondSignatureRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_transaction()
    {
        $transaction = SecondSignatureRegistration::new()
            ->signature('this is a top secret second passphrase')
            ->sign('this is a top secret passphrase');

        $this->assertTrue($transaction->verify());
        $this->assertFalse(isset($transaction->signSignature));
        $this->assertSame($transaction->transaction->asset['signature']['publicKey'], PublicKey::fromPassphrase('this is a top secret second passphrase')->getHex());
    }
}
