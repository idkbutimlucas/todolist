<?php


class Comment
{
    public $id;
    public $id_user;
    public $id_todo;
    public $text;

    public function __construct($id,$id_user,$id_todo,$text) {
        $this->setId($id);
        $this->setIdUser($id_user);
        $this->setIdTodo($id_todo);
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

    public function getIdTodo()
    {
        return $this->id_todo;
    }

    public function setIdTodo($id_todo)
    {
        $this->id_todo = $id_todo;
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