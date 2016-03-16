<?php
namespace Nfilin\Libs\Gcm;

use Nfilin\Libs\MobileNotifications\Authorization\AuthorizationInterface;

/**
 * Class Authorization
 * @package Nfilin\Libs\Gcm
 */
class Authorization implements AuthorizationInterface
{
    /**
     * @var string
     */
    public $apiKey;

    /**
     * Gcm constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}