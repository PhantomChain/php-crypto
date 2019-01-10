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

namespace PhantomChain\Crypto\Transactions\Builder;

use PhantomChain\Crypto\Identities\PublicKey;

/**
 * This is the second signature registration transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class SecondSignatureRegistration extends AbstractTransaction
{
    /**
     * Set the signature asset to register the second passphrase.
     *
     * @param string $secondPassphrase
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\SecondSignatureRegistration
     */
    public function signature(string $secondPassphrase): self
    {
        $this->transaction->asset = [
            'signature' => [
                'publicKey' => PublicKey::fromPassphrase($secondPassphrase)->getHex(),
            ],
        ];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \PhantomChain\Crypto\Enums\Types::SECOND_SIGNATURE_REGISTRATION;
    }
}
