<?php


class User
{
    public $id;
    public $username;
    public $email;
    public $user_type;
    protected $password;
    public $status;

    public function __construct($id,$username,$email,$user_type,$password,$status) {
        $this->setID($id);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setUserType($user_type);
        $this->setPassword($password);
        $this->setStatus($status);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getUserType()
    {
        return $this->user_type;
    }

    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}