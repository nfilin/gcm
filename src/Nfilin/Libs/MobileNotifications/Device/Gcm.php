<?php

namespace Nfilin\Libs\MobileNotifications\Device;


class Gcm extends Device
{
    public $type = self::TYPE_GCM;

    /**
     * Apns constructor.
     * @param array|Device|string $token
     * @param string $type
     */
    public function __construct($token, $type = self::TYPE_GCM)
    {
        parent::__construct($token, $type);
    }

}