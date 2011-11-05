<?php

namespace GitFS\Model;

class Log
{
    protected $message;

    protected $author_email;

    protected $author_name;

    protected $hash;

    protected $relative_date;

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setAuthorEmail($author_email)
    {
        $this->author_email = $author_email;
    }

    public function getAuthorEmail()
    {
        return $this->author_email;
    }

    public function setAuthorName($author_name)
    {
        $this->author_name = $author_name;
    }

    public function getAuthorName()
    {
        return $this->author_name;
    }

    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function setRelativeDate($relative_date)
    {
        $this->relative_date = $relative_date;
    }

    public function getRelativeDate()
    {
        return $this->relative_date;
    }
}