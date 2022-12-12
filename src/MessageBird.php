<?php

namespace MessageBird;

use MessageBird\Objects\Message;

class MessageBird
{

    protected $accessKey;
    protected $originator;
    protected $receiver;
    protected $message;

    /**
     * @param $accessKey
     * @param $originator
     */
    public function __construct($accessKey, $originator)
    {
        //Set the accesskey with which we'll send our messages
        $this->setAccessKey($accessKey);

        //Set the Originator : Who the message come from
        $this->setOriginator($originator);
    }

    /**
     * @param array $receivers
     * @param $message
     * @return void
     * @throws Exceptions\AuthenticateException
     * @throws Exceptions\BalanceException
     * @throws Exceptions\HttpException
     * @throws \JsonException
     */
    public function send(array $receivers, $message)
    {
        $MessageBird = new Client($this->getAccessKey());
        $Message = new Message();
        $Message->originator = $this->getOriginator();
        $Message->recipients = array($receivers);
        $Message->body = $message;

        $MessageBird->messages->create($Message);
    }

    /**
     * @return mixed
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * @param mixed $accessKey
     */
    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;
    }

    /**
     * @return mixed
     */
    public function getOriginator()
    {
        return $this->originator;
    }

    /**
     * @param mixed $originator
     */
    public function setOriginator($originator)
    {
        $this->originator = $originator;
    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }


}