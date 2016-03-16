<?php

namespace Nfilin\Libs\MobileNotifications\Response;

use Nfilin\Libs\BaseObject;

class GcmStatusRecord extends BaseObject
{
    /**
     * @var int
     */
    public $message_id;
    /**
     * @var int
     */
    public $registration_id;
    /**
     * @var string
     */
    public $error;
}