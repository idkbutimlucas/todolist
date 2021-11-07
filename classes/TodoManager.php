<?php


class TodoManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = DBConnector::getConnection();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM todo';
        $req = $this->bdd->prepare($sql);
        $req->execute();

        if ($req->rowCount() == 0) {
            return false;
        }

        $todos = [];
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $todo) {
            $todos[] = new Todo($todo['id'], $todo['id_user'], $todo['id_team'], $todo['state'], $todo['text']);
        }

        return $todos;
    }

    public function get($idTodo)
    {
        $sql = 'SELECT * FROM todo WHERE id = :idTodo;';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':idTodo', $idTodo);
        $req->execute();
        if ($req->rowCount() == 1) {
            $todo = $req->fetchAll(PDO::FETCH_ASSOC)[0];
            return new Todo($todo['id'], $todo['id_user'], $todo['id_team'], $todo['state'], $todo['text']);
        } else {
            return false;
        }
    }

    public function add($id_user, $state, $text, $id_team)
    {
        $sql = 'INSERT INTO todo(id_user, state, text, id_team) VALUES (:id_user,:state, :text, :id_team)';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':id_user', $id_user);
        $req->bindValue(':state', $state);
        $req->bindValue(':text', $text);
        $req->bindValue(':id_team', $id_team);
        $req->execute();

        return $req;
    }

    public function updateStatus($todoID, $status){
        $sql = 'UPDATE todo SET state = :status WHERE id = :todoID';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':status', $status);
        $req->bindValue(':todoID', $todoID);
        return $req->execute();
    }
}
