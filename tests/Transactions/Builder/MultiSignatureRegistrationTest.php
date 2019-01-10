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
use PhantomChain\Crypto\Transactions\Builder\MultiSignatureRegistration;

/**
 * This is the multi signature registration builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \PhantomChain\Crypto\Transactions\Builder\MultiSignatureRegistration
 */
class MultiSignatureRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_sign_it_with_a_passphrase()
    {
        $transaction = MultiSignatureRegistration::new()
            ->min(2)
            ->lifetime(255)
            ->keysgroup([
                '03a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933',
                '13a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933',
                '23a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933',
            ])
            ->sign('secret')
            ->secondSign('second secret');

        $this->assertTrue($transaction->verify());
    }

    /** @test */
    public function it_should_sign_it_with_a_second_passphrase()
    {
        $secondPassphrase = 'this is a top secret second passphrase';

        $transaction = MultiSignatureRegistration::new()
            ->min(2)
            ->lifetime(255)
            ->keysgroup([
                '03a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933',
                '13a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933',
                '23a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933',
            ])
            ->sign('this is a top secret passphrase')
            ->secondSign($secondPassphrase);

        $this->assertTrue($transaction->verify());
        $this->assertTrue($transaction->secondVerify(PublicKey::fromPassphrase($secondPassphrase)->getHex()));
    }
}
