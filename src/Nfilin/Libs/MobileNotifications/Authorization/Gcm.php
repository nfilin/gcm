<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 15.03.16
 * Time: 13:17
 */

namespace Nfilin\Libs\MobileNotifications\Authorization;


class Gcm implements AuthorizationInterface
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