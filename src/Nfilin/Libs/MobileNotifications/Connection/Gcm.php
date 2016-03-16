<?php
namespace Nfilin\Libs\MobileNotifications\Connection;


use Nfilin\Libs\MobileNotifications\Authorization\AuthorizationInterface;
use Nfilin\Libs\MobileNotifications\Authorization\Gcm as aGcm;
use Nfilin\Libs\MobileNotifications\Message\Gcm as mGcm;
use Nfilin\Libs\MobileNotifications\Message\MessageInterface;
use Nfilin\Libs\MobileNotifications\Response\Gcm as rGcm;

class Gcm extends Curl
{
    /**
     * @var aGcm
     */
    private $auth;

    /**
     * Gcm constructor.
     * @param aGcm|AuthorizationInterface $auth
     * @param array $options
     */
    public function __construct(AuthorizationInterface $auth, $options = [])
    {
        parent::__construct($auth, $options);
    }

    public function setAuthorization(AuthorizationInterface $auth)
    {
        if (!$auth instanceof aGcm) {
            throw new \Exception('GCM connection accepts only GCM authorization');
        }
        $this->auth = $auth;
    }

    /**
     * @param mGcm|MessageInterface $message
     * @return rGcm
     * @throws \Exception
     */
    public function send(MessageInterface $message)
    {
        if (!($message instanceof mGcm)) {
            throw new \Exception("Receivers should be list od APNS devices");
        }
        $this->connect();
        $data = $message->json();
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
        $result = rGcm::fromCurl($this->curl);
        return $result;
    }

    public function connect()
    {
        parent::connect();
        $ch = $this->curl;
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Authorization'] = 'key=' . $this->auth->apiKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        return $this;
    }
}