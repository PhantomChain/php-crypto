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

namespace PhantomChain\Tests\Crypto;

use PhantomChain\Crypto\Networks\Devnet;
use PhantomChain\Crypto\Configuration\Network;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use Concerns\Fixtures,
        Concerns\Serialize,
        Concerns\Deserialize;

    protected $passphrase = 'This is a top secret passphrase';
    protected $secondPassphrase = 'This is a top secret second passphrase';

    protected function setUp()
    {
        Network::set(Devnet::new());
    }
}
