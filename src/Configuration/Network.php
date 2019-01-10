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

use BitWasp\Bitcoin\Bitcoin;
use PhantomChain\Crypto\Networks\Devnet;
use PhantomChain\Crypto\Networks\AbstractNetwork;

/**
 * This is the network configuration class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Network
{
    /**
     * The network used for crypto operations.
     *
     * @var \PhantomChain\Crypto\Networks\AbstractNetwork
     */
    private static $network;

    /**
     * Call a method on the network instance.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public static function __callStatic(string $method, array $args)
    {
        return static::get()->{$method}(...$args);
    }

    /**
     * Get the network used for crypto operations.
     *
     * @return \PhantomChain\Crypto\Networks\AbstractNetwork
     */
    public static function get(): AbstractNetwork
    {
        return static::$network ?? Devnet::new();
    }

    /**
     * Set the network used for crypto operations.
     *
     * @param \PhantomChain\Crypto\Networks\AbstractNetwork $network
     */
    public static function set(AbstractNetwork $network): void
    {
        static::$network = $network;

        Bitcoin::setNetwork($network);
    }
}
