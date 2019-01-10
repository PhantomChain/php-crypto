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

namespace PhantomChain\Crypto\Enums;

/**
 * This is the transaction types class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Types
{
    const TRANSFER = 0;
    const SECOND_SIGNATURE_REGISTRATION = 1;
    const DELEGATE_REGISTRATION = 2;
    const VOTE = 3;
    const MULTI_SIGNATURE_REGISTRATION = 4;
    const IPFS = 5;
    const TIMELOCK_TRANSFER = 6;
    const MULTI_PAYMENT = 7;
    const DELEGATE_RESIGNATION = 8;
}
