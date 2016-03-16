<?php

namespace Nfilin\Libs\MobileNotifications\Payload;

/**
 * Class Gcm
 * @package Nfilin\Libs\MobileNotifications\Payload
 */
class Gcm extends Base
{
    /**
     * @var string;
     */
    public $icon;
    /**
     * @var string
     */
    public $tag;
    /**
     * @var string
     */
    public $color;

    function jsonSerialize()
    {
        $ret = [];
        $ret['title'] = $this->title;
        $ret['body'] = $this->body;
        $ret['icon'] = $this->icon;
        $ret['sound'] = $this->sound;
        $ret['badge'] = $this->badge;
        $ret['tag'] = $this->tag;
        $ret['color'] = $this->color;
        $ret['click_action'] = $this->click_action;
        $ret['body_loc_key'] = $this->body_loc_key;
        $ret['body_loc_args'] = $this->body_loc_args;
        $ret['title_loc_key'] = $this->title_loc_key;
        $ret['title_loc_args'] = $this->title_loc_args;
        return $ret;
    }
}