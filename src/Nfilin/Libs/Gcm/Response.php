<?php
namespace Nfilin\Libs\Gcm;

use Nfilin\Libs\MobileNotifications\Response\Curl;

/**
 * Class Response
 * @package Nfilin\Libs\Gcm
 */
class Response extends Curl
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
     * @var ResponseStatusRecord[]
     */
    public $result = [];
}