<?php

namespace Nfilin\Libs\MobileNotifications\Device;


class GcmList extends DeviceList
{
    /**
     * GcmList constructor.
     * @param array|DeviceList|GcmList $array
     */
    public function __construct($array = [])
    {
        parent::__construct($array, Gcm::className());
    }

}