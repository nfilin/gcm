<?php

namespace Nfilin\Libs\MobileNotifications\Message;

use Nfilin\Libs\MobileNotifications\Device\DeviceListInterface;
use Nfilin\Libs\MobileNotifications\Device\GcmList as dGcmList;
use Nfilin\Libs\MobileNotifications\Payload\Gcm as pGcm;
use Nfilin\Libs\MobileNotifications\Payload\PayloadInterface;

/**
 * Class Gcm
 * @package Nfilin\Libs\MobileNotifications\Message
 */
class Gcm extends Base
{
    /**
     * Gcm constructor.
     * @param dGcmList|DeviceListInterface $receivers
     * @param PayloadInterface|null $payload
     * @throws \Exception
     */
    public function __construct(DeviceListInterface $receivers, PayloadInterface $payload = null)
    {
        if (!$receivers instanceof dGcmList) {
            throw new \Exception('Only GCM devices allowed for GCM message');
        }
        parent::__construct($receivers, $payload);
    }

    function jsonSerialize()
    {
        $receivers = $this->receivers;
        $receivers->rewind();
        $ret = [];
        if (count($receivers) == 1) {
            $ret['to'] = $receivers->current();
        } else {
            $ret['registration_ids'] = $receivers;
        }
        $ret['collapse_key'] = $this->collapse_key;
        $ret['priority'] = $this->priority;
        $ret['content_available'] = $this->content_available;
        $ret['delay_while_idle'] = $this->delay_while_idle;
        $ret['time_to_live'] = $this->time_to_live;
        $ret['restricted_package_name'] = $this->restricted_package_name;
        $ret['dry_run'] = $this->dry_run;
        $ret['data'] = $this->payload->getCustomData();
        $ret['notification'] = pGcm::wrap($this->payload);
        return $ret;
    }


}