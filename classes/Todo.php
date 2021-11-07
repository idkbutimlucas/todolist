<?php


class Todo
{
    public $id;
    public $id_user;
    protected $id_team;
    public $state;
    public $text;

    public function __construct($id,$id_user,$id_team,$state,$text) {
        $this->setID($id);
        $this->setIdUser($id_user);
        $this->setIdTeam($id_team);
        $this->setState($state);
        $this->setText($text);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdTeam()
    {
        return $this->id_team;
    }

    public function setIdTeam($id_team)
    {
        $this->id_team = $id_team;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
}