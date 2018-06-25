<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Crypto.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkEcosystem\Crypto;

use ArkEcosystem\Crypto\Networks\Mainnet;
use ArkEcosystem\Crypto\Networks\Network;

/**
 * This is the config class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Config
{
    /**
     * The network used for crypto operations.
     *
     * @var \ArkEcosystem\Crypto\Networks\Network
     */
    private static $network;

    /**
     * Get the network used for crypto operations.
     *
     * @return \ArkEcosystem\Crypto\Networks\Network
     */
    public static function getNetwork(): Network
    {
        return static::$network ?? Mainnet::create();
    }

    /**
     * Set the network used for crypto operations.
     *
     * @param $network \ArkEcosystem\Crypto\Networks\Network
     */
    public static function setNetwork(Network $network): void
    {
        static::$network = $network;
    }
}
