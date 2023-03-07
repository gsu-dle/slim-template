<?php

declare(strict_types=1);

namespace GAState\MySlimApp;

use GAState\Web\Slim\Env as BaseEnv;

class Env extends BaseEnv
{
    /**
     * @return void
     */
    protected static function setDefaults(): void
    {
        parent::setDefaults();
    }
}
