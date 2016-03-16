<?php
namespace Nfilin\Libs\Gcm;

use Nfilin\Libs\MobileNotifications\Device\BaseList as BaseDeviceList;
use Nfilin\Libs\MobileNotifications\Device\DeviceListInterface;

/**
 * Class DeviceList
 * @package Nfilin\Libs\Gcm
 */
class DeviceList extends BaseDeviceList
{
    /**
     * GcmList constructor.
     * @param array|DeviceListInterface|BaseDeviceList $array
     */
    public function __construct($array = [])
    {
        parent::__construct($array, Device::className());
    }

}