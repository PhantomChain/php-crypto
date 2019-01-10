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

namespace PhantomChain\Crypto\Transactions\Builder;

/**
 * This is the delegate resignation transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class DelegateResignation extends AbstractTransaction
{
    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \PhantomChain\Crypto\Enums\Types::DELEGATE_RESIGNATION;
    }
}
