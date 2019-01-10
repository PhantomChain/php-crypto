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

trait Serialize
{
    protected function assertSerialized(array $fixture): void
    {
        $actual = Serializer::new($fixture['data'])->serialize();

        $this->assertSame($fixture['serialized'], $actual->getHex());
    }
}
