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

/**
 * This is the transfer transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Transfer extends AbstractTransaction
{
    /**
     * Set the recipient of the transfer.
     *
     * @param string $recipientId
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\Transfer
     */
    public function recipient(string $recipientId): self
    {
        $this->transaction->recipientId = $recipientId;

        return $this;
    }

    /**
     * Set the amount to transfer.
     *
     * @param int $amount
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\Transfer
     */
    public function amount(int $amount): self
    {
        $this->transaction->amount = $amount;

        return $this;
    }

    /**
     * Set the vendor field / smartbridge.
     *
     * @param string $vendorField
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\Transfer
     */
    public function vendorField(string $vendorField): self
    {
        $this->transaction->vendorField = $vendorField;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \PhantomChain\Crypto\Enums\Types::TRANSFER;
    }
}
