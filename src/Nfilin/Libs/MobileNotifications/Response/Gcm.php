<?php

namespace Nfilin\Libs\MobileNotifications\Response;

/**
 * Class Gcm
 * @package Nfilin\Libs\MobileNotifications\Response
 */
class Gcm extends Curl
{
    /**
     * @var int
     */
    public $multicast_id;
    /**
     * @var int
     */
    public $success;
    /**
     * @var int
     */
    public $failure;
    /**
     * @var int
     */
    public $canonical_ids;
    /**
     * @var GcmStatusRecord[]
     */
    public $result = [];
}