<?php
namespace Nfilin\Libs\Gcm;

use Nfilin\Libs\MobileNotifications\Authorization\AuthorizationInterface;
use Nfilin\Libs\MobileNotifications\Connection\Curl;
use Nfilin\Libs\MobileNotifications\Message\MessageInterface;

/**
 * Class Connection
 * @package Nfilin\Libs\Gcm
 */
class Connection extends Curl
{
    /**
     * @var Authorization
     */
    private $auth;

    /**
     * Gcm constructor.
     * @param Authorization|AuthorizationInterface $auth
     * @param array $options
     */
    public function __construct(AuthorizationInterface $auth, $options = [])
    {
        parent::__construct($auth, $options);
    }

    /**
     * @param Authorization|AuthorizationInterface $auth
     * @return $this
     * @throws \Exception
     */
    public function setAuthorization(AuthorizationInterface $auth)
    {
        if (!$auth instanceof Authorization) {
            throw new \Exception('GCM connection accepts only GCM authorization');
        }
        $this->auth = $auth;
        return $this;
    }

    /**
     * @param Message|MessageInterface $message
     * @return Response
     * @throws \Exception
     */
    public function send(MessageInterface $message)
    {
        if (!($message instanceof Message)) {
            throw new \Exception("Receivers should be list od APNS devices");
        }
        $this->connect();
        $data = $message->json();
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
        $result = Response::fromCurl($this->curl);
        return $result;
    }

    /**
     * @return $this
     */
    public function connect()
    {
        parent::connect();
        $ch = $this->curl;
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Authorization'] = 'key=' . $this->auth->apiKey;
        curl_setopt($ch, CURLOPT_URL, 'https://gcm-http.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        return $this;
    }
}