<?php

namespace SquegTech\Steam\Traits;

use SquegTech\Steam\Enums\AppId;

trait Dota2CommandTrait
{
    /**
     * @var bool
     */
    private bool $isForTestClient = false;

    /**
     * @param bool $value
     */
    public function isForTestClient(bool $value): void
    {
        $this->isForTestClient = $value;
    }

    /**
     * @return AppId
     */
    public function getDota2AppId(): AppId
    {
        return $this->isForTestClient ? AppId::DOTA_2_BETA_TEST : AppId::DOTA_2_ID;
    }
}