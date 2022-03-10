<?php

namespace SquegTech\Steam\Traits;

use SquegTech\Steam\Enums\AppId;

trait Portal2CommandTrait
{
    /**
     * @var bool
     */
    private bool $isForBeta = false;

    /**
     * @param bool $value
     */
    public function isForBeta(bool $value): void
    {
        $this->isForBeta = $value;
    }

    /**
     * @return AppId
     */
    public function getPortal2AppId(): AppId
    {
        return $this->isForBeta ? AppId::PORTAL_2_BETA_ID : AppId::PORTAL_2_ID;
    }
}