<?php
namespace Nfilin\Libs\Gcm;

use Nfilin\Libs\MobileNotifications\Device\DeviceListInterface;
use Nfilin\Libs\MobileNotifications\Message\Base as BaseMessage;
use Nfilin\Libs\MobileNotifications\Payload\PayloadInterface;

/**
 * Class Message
 * @package Nfilin\Libs\Gcm
 */
class Message extends BaseMessage
{
    /**
     * Gcm constructor.
     * @param DeviceList|DeviceListInterface $receivers
     * @param PayloadInterface|null $payload
     * @throws \Exception
     */
    public function __construct(DeviceListInterface $receivers, PayloadInterface $payload = null)
    {
        if (!$receivers instanceof DeviceList) {
            throw new \Exception('Only GCM devices allowed for GCM message');
        }
        parent::__construct($receivers, $payload);
    }

    /**
     * @return array
     */
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
        $ret['notification'] = Payload::wrap($this->payload);
        return $ret;
    }


}