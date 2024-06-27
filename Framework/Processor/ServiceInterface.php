<?php
/**
 * Copyright © Soft Commerce Ltd. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types=1);

namespace NextCommerce\Core\Framework\Processor;

use Magento\Framework\Exception\LocalizedException;
use NextCommerce\Core\Framework\DataStorageInterface;
use NextCommerce\Core\Framework\MessageStorageInterface;

/**
 * Interface ServiceInterface
 * used to manage process services.
 */
interface ServiceInterface
{
    /**
     * @return DataStorageInterface
     */
    public function getDataStorage(): DataStorageInterface;

    /**
     * @return MessageStorageInterface
     */
    public function getMessageStorage(): MessageStorageInterface;

    /**
     * @return DataStorageInterface
     */
    public function getRequestStorage(): DataStorageInterface;

    /**
     * @return DataStorageInterface
     */
    public function getResponseStorage(): DataStorageInterface;

    /**
     * @param ProcessorInterface $context
     * @return $this
     */
    public function init(ProcessorInterface $context): static;
}