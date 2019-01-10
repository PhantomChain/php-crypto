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

namespace PhantomChain\Crypto\Identities;

use BitWasp\Bitcoin\Key\Factory\PublicKeyFactory;
use BitWasp\Bitcoin\Crypto\EcAdapter\Impl\PhpEcc\Key\PublicKey as EcPublicKey;

/**
 * This is the public key class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class PublicKey
{
    /**
     * Derive the public from the given passphrase.
     *
     * @param string $passphrase
     *
     * @return \BitWasp\Bitcoin\Crypto\EcAdapter\Impl\PhpEcc\Key\PublicKey
     */
    public static function fromPassphrase(string $passphrase): EcPublicKey
    {
        return PrivateKey::fromPassphrase($passphrase)->getPublicKey();
    }

    /**
     * Create a public key instance from a hex string.
     *
     * @param \BitWasp\Buffertools\BufferInterface|string $publicKey
     *
     * @return \BitWasp\Bitcoin\Crypto\EcAdapter\Impl\PhpEcc\Key\PublicKey
     */
    public static function fromHex($publicKey): EcPublicKey
    {
        return (new PublicKeyFactory)->fromHex($publicKey);
    }
}
