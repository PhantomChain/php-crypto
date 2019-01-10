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

namespace PhantomChain\Crypto\Configuration;

use PhantomChain\Crypto\Enums\Fees;
use PhantomChain\Crypto\Enums\Types;

/**
 * This is the fee configuration class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Fee
{
    /**
     * The default transaction fees.
     *
     * @var array
     */
    private static $fees = [
        Types::TRANSFER                      => Fees::TRANSFER,
        Types::SECOND_SIGNATURE_REGISTRATION => Fees::SECOND_SIGNATURE_REGISTRATION,
        Types::DELEGATE_REGISTRATION         => Fees::DELEGATE_REGISTRATION,
        Types::VOTE                          => Fees::VOTE,
        Types::MULTI_SIGNATURE_REGISTRATION  => Fees::MULTI_SIGNATURE_REGISTRATION,
        Types::IPFS                          => Fees::IPFS,
        Types::TIMELOCK_TRANSFER             => Fees::TIMELOCK_TRANSFER,
        Types::MULTI_PAYMENT                 => Fees::MULTI_PAYMENT,
        Types::DELEGATE_RESIGNATION          => Fees::DELEGATE_RESIGNATION,
    ];

    /**
     * Get the transaction fee for the given type.
     *
     * @return int
     */
    public static function get(int $type): int
    {
        return static::$fees[$type];
    }

    /**
     * Set the transaction fee for the given type.
     *
     * @param int $type
     * @param int $fee
     */
    public static function set(int $type, int $fee): void
    {
        static::$fees[$type] = $fee;
    }
}
