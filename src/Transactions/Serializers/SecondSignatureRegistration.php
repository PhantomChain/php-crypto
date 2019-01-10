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

namespace PhantomChain\Crypto\Transactions\Serializers;

/**
 * This is the serializer class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class SecondSignatureRegistration extends AbstractSerializer
{
    /**
     * Handle the serialization of "delegate registration" data.
     *
     * @return string
     */
    public function serialize(): void
    {
        $this->buffer->writeHexBytes($this->transaction['asset']['signature']['publicKey']);
    }
}
