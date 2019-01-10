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

namespace PhantomChain\Tests\Crypto\Concerns;

use PhantomChain\Crypto\Transactions\Serializer;
use PhantomChain\Crypto\Transactions\Transaction;
use PhantomChain\Crypto\Transactions\Deserializer;

trait Deserialize
{
    protected function assertDeserialized(array $expected, array $keys, int $network = 30): object
    {
        $actual = Deserializer::new($expected['serialized'])->deserialize();

        $this->assertSame(1, $actual->version);
        $this->assertSame($network, $actual->network);
        $this->assertSame($expected['serialized'], Serializer::new($actual->toArray())->serialize()->getHex());
        $this->assertSameTransactions($expected, $actual, $keys);
        $this->assertTrue($actual->verify());

        return $actual;
    }

    protected function object_to_array(object $value): array
    {
        return json_decode(json_encode($value), true);
    }

    protected function assertSameTransactions(array $expected, Transaction $actual, array $keys): void
    {
        $expected = array_only($expected['data'], $keys);
        $actual = array_only($this->object_to_array($actual), $keys);

        ksort($expected);
        ksort($actual);

        if (isset($actual['asset']['multisignature'])) {
            ksort($expected['asset']['multisignature']);
            ksort($actual['asset']['multisignature']);
        }

        $this->assertSame($expected, $actual);
    }
}
