<?php

namespace MessageBird;

use MessageBird\Objects\Message;

class MessageBird
{

    protected static $accessKey;
    protected static $originator;
    protected static $receiver;
    protected static $message;

    /**
     * Initialize the Messenger
     * @param $accessKey
     * @param $originator
     */
    public function __construct($accessKey, $originator)
    {
        self::setAccessKey($accessKey);
        self::setOriginator($originator);
    }

    /**
     * Send SMS
     *
     * @param array $receivers
     * @param string $message
     * @return array|Objects\Balance|Objects\Conversation\Conversation|Objects\Hlr|Objects\Lookup|Message|Objects\MessageResponse|Objects\Verify|Objects\VoiceMessage|null
     * @throws Exceptions\AuthenticateException
     * @throws Exceptions\BalanceException
     * @throws Exceptions\HttpException
     * @throws \JsonException
     */
    public static function send(array $receivers, string $message)
    {
        $MessageBird = new Client(self::getAccessKey());
        $Message = new Message();
        $Message->originator = self::getOriginator();
        $Message->recipients = array($receivers);
        $Message->body = $message;

        return $MessageBird->messages->create($Message);
    }

    /**
     * @return mixed
     */
    public static function getAccessKey()
    {
        return self::$accessKey;
    }

    /**
     * @param mixed $accessKey
     */
    public static function setAccessKey($accessKey)
    {
        self::$accessKey = $accessKey;
    }

    /**
     * @return mixed
     */
    public static function getOriginator()
    {
        return self::$originator;
    }

    /**
     * @param mixed $originator
     */
    public static function setOriginator($originator)
    {
        self::$originator = $originator;
    }

    /**
     * @return mixed
     */
    public static function getReceiver()
    {
        return self::$receiver;
    }

    /**
     * @param mixed $receiver
     */
    public static function setReceiver($receiver)
    {
        self::$receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public static function getMessage()
    {
        return self::$message;
    }

    /**
     * @param mixed $message
     */
    public static function setMessage($message)
    {
        self::$message = $message;
    }


}