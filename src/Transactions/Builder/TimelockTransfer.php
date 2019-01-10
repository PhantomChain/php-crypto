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
 * This is the timelock transfer transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class TimelockTransfer extends Transfer
{
    /**
     * Set the timelock of the transfer.
     *
     * @param int $timelock
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\TimelockTransfer
     */
    public function timelock(int $timelock): self
    {
        $this->transaction->timelock = $timelock;

        return $this;
    }

    /**
     * Set the timelock type of the transfer to timestamp.
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\TimelockTransfer
     */
    public function timestamp(): self
    {
        $this->transaction->timelockType = 0x00;

        return $this;
    }

    /**
     * Set the timelock type of the transfer to block height.
     *
     * @return \PhantomChain\Crypto\Transactions\Builder\TimelockTransfer
     */
    public function height(): self
    {
        $this->transaction->timelockType = 0x01;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \PhantomChain\Crypto\Enums\Types::TIMELOCK_TRANSFER;
    }
}
