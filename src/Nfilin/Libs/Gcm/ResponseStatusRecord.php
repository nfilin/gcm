<?php
namespace Nfilin\Libs\Gcm;

use Nfilin\Libs\BaseObject;

/**
 * Class ResponseStatusRecord
 * @package Nfilin\Libs\Gcm
 */
class ResponseStatusRecord extends BaseObject
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