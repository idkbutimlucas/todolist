<?php


class CommentManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = DBConnector::getConnection();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM comment';
        $req = $this->bdd->prepare($sql);
        $req->execute();

        if ($req->rowCount() == 0) {
            return false;
        }

        $comments = [];
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $comment) {
            $comments[] = new Todo($comment['id'], $comment['id_user'], $comment['id_team'], $comment['state'], $comment['text']);
        }

        return $comments;
    }

    public function getAllByTodoID($todoID)
    {
        $sql = 'SELECT * FROM comment WHERE id_todo = :todo_id';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':todo_id', $todoID);
        $req->execute();

        if ($req->rowCount() == 0) {
            return false;
        }

        $comments = [];
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $comment) {
            $comments[] = new Comment($comment['id'],$comment['id_user'],$comment['id_todo'],$comment['text']);
        }

        return $comments;
    }

    public function get($idComment)
    {
        $sql = 'SELECT * FROM comment WHERE id = :idComment;';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':idComment', $idComment);
        $req->execute();
        if ($req->rowCount() == 1) {
            $comment = $req->fetchAll(PDO::FETCH_ASSOC)[0];
            return new Todo($comment['id'], $comment['id_user'], $comment['id_team'], $comment['state'], $comment['text']);
        } else {
            return false;
        }
    }

    public function add($id_user, $todoID, $text)
    {
        $sql = 'INSERT INTO comment(id_user, id_todo, text) VALUES (:id_user,:id_todo, :text)';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':id_user', $id_user);
        $req->bindValue(':id_todo', $todoID);
        $req->bindValue(':text', $text);
        return $req->execute();
    }
}
