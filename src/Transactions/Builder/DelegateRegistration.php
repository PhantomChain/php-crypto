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
 * This is the delegate registration transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class DelegateRegistration extends AbstractTransaction
{
    /**
     * Create a new delegate registration transaction instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->transaction->asset = ['delegate' => []];
    }

    /**
     * Set the username to assign.
     *
     * @param string $username
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\DelegateRegistration
     */
    public function username(string $username): self
    {
        $this->transaction->asset['delegate']['username'] = $username;

        return $this;
    }

    /**
     * Sign the transaction using the given passphrase.
     *
     * @param string $passphrase
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\AbstractTransaction
     */
    public function sign(string $passphrase): AbstractTransaction
    {
        $publicKey = PublicKey::fromPassphrase($passphrase);
        $this->transaction->asset['delegate']['publicKey'] = $publicKey->getHex();

        parent::sign($passphrase);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \PhantomChain\Crypto\Enums\Types::DELEGATE_REGISTRATION;
    }
}
