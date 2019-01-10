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

namespace PhantomChain\Crypto\Transactions\Deserializers;

/**
 * This is the deserializer class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class SecondSignatureRegistration extends AbstractDeserializer
{
    /**
     * Handle the deserialization of "delegate registration" data.
     *
     * @return object
     */
    public function deserialize(): object
    {
        $this->buffer->position($this->assetOffset);

        $this->transaction->asset = [
            'signature' => [
                'publicKey' => $this->buffer->readHexRaw(66),
            ],
        ];

        return $this->parseSignatures($this->assetOffset + 66);
    }
}
