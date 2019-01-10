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

use PhantomChain\Crypto\Utils\Slot;
use PhantomChain\Crypto\Configuration\Fee;
use PhantomChain\Crypto\Identities\PrivateKey;
use PhantomChain\Crypto\Transactions\Transaction;

/**
 * This is the abstract transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
abstract class AbstractTransaction
{
    /**
     * Create a new transaction instance.
     */
    public function __construct()
    {
        $this->transaction = new Transaction();
        $this->transaction->type = $this->getType();
        $this->transaction->amount = 0;
        $this->transaction->fee = $this->getFee();
        $this->transaction->timestamp = Slot::time();
    }

    /**
     * Convert the message to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Create a new transaction instance.
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\AbstractTransaction
     */
    public static function new(): self
    {
        return new static();
    }

    /**
     * Set the transaction fee.
     *
     * @param int $fee
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\AbstractTransaction
     */
    public function withFee(int $fee): self
    {
        $this->transaction->fee = $fee;

        return $this;
    }

    /**
     * Sign the transaction using the given passphrase.
     *
     * @param string $passphrase
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\AbstractTransaction
     */
    public function sign(string $passphrase): self
    {
        $keys = PrivateKey::fromPassphrase($passphrase);
        $this->transaction->senderPublicKey = $keys->getPublicKey()->getHex();

        $this->transaction = $this->transaction->sign($keys);
        $this->transaction->id = $this->transaction->getId();

        return $this;
    }

    /**
     * Sign the transaction using the given second passphrase.
     *
     * @param string $secondPassphrase
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\AbstractTransaction
     */
    public function secondSign(string $secondPassphrase): self
    {
        $this->transaction = $this->transaction->secondSign(PrivateKey::fromPassphrase($secondPassphrase));
        $this->transaction->id = $this->transaction->getId();

        return $this;
    }

    /**
     * Verify the transaction validity.
     *
     * @return bool
     */
    public function verify(): bool
    {
        return $this->transaction->verify();
    }

    /**
     * Verify the transaction validity with a second signature.
     *
     * @return bool
     */
    public function secondVerify(string $secondPublicKey): bool
    {
        return $this->transaction->secondVerify($secondPublicKey);
    }

    /**
     * Convert the transaction to its array representation.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->transaction->toArray();
    }

    /**
     * Convert the transaction to its JSON representation.
     *
     * @return string
     */
    public function toJson(): string
    {
        return $this->transaction->toJson();
    }

    /**
     * Get the transaction type.
     *
     * @return int
     */
    abstract protected function getType(): int;

    /**
     * Get the transaction fee.
     *
     * @return int
     */
    private function getFee(): int
    {
        return Fee::get($this->transaction->type);
    }
}
