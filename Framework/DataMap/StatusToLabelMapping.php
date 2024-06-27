<?php
/**
 * Copyright © Soft Commerce Ltd. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types=1);

namespace NextCommerce\Core\Framework\DataMap;

use NextCommerce\Core\Model\Source\Status\IsActive;
use NextCommerce\Core\Model\Source\StatusInterface;

/**
 * @inheritDoc
 */
class StatusToLabelMapping implements StatusToLabelMappingInterface
{
    /**
     * @var StatusInterface
     */
    private StatusInterface $status;

    /**
     * @var IsActive
     */
    private IsActive $isActiveStatus;

    /**
     * @param StatusInterface $status
     * @param IsActive $isActiveStatus
     */
    public function __construct(
        StatusInterface $status,
        IsActive $isActiveStatus
    ) {
        $this->status = $status;
        $this->isActiveStatus = $isActiveStatus;
    }

    /**
     * @inheritDoc
     */
    public function execute($status)
    {
        if ($result = $this->status->getOptions()[$status] ?? null) {
            return $result;
        }

        if (is_numeric($status)
            && $result = $this->isActiveStatus->getOptions()[(int) $status] ?? null
        ) {
            return $result;
        }

        return __('Unknown Status Map');
    }
}
