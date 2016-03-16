<?php

namespace Nfilin\Libs\Gcm;

use Nfilin\Libs\MobileNotifications\Device\Base as BaseDevice;
use Nfilin\Libs\MobileNotifications\Device\DeviceInterface;

/**
 * Class Device
 * @package Nfilin\Libs\Gcm
 */
class Device extends BaseDevice
{
    /**
     * @var string
     */
    public $type = self::TYPE_GCM;

    /**
     * Device constructor.
     * @param array|DeviceInterface|string $token
     * @param string $type
     */
    public function __construct($token, $type = self::TYPE_GCM)
    {
        parent::__construct($token, $type);
    }

}