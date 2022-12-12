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
     *
     * Send a Message
     *
     * @param array $receivers
     * @param string $message
     * @return void
     * @throws Exceptions\AuthenticateException
     * @throws Exceptions\BalanceException
     * @throws Exceptions\HttpException
     * @throws \JsonException
     */
    public static function send(array $receivers, $message)
    {
        $MessageBird = new Client(self::getAccessKey());
        $Message = new Message();
        $Message->originator = self::getOriginator();
        $Message->recipients = array($receivers);
        $Message->body = $message;

        $MessageBird->messages->create($Message);
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