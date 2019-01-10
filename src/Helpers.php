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

namespace PhantomChain\Crypto;

use PhantomChain\Crypto\Configuration\Network;

/**
 * This is the helpers class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Helpers
{
    /**
     * Get the network version.
     *
     * @param \PhantomChain\Crypto\Networks\AbstractNetwork|int $network
     *
     * @return int
     */
    public static function version($network): int
    {
        return is_int($network) ? $network : $network->version();
    }
}
