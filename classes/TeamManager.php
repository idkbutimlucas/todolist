<?php


class TeamManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = DBConnector::getConnection();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM team';
        $req = $this->bdd->prepare($sql);
        $req->execute();

        if ($req->rowCount() == 0) {
            return false;
        }

        $teams = [];
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $team) {
            $teams[] = new Team($team['id'], $team['name']);
        }
        return $teams;
    }

    public function get($idTeam = false, $name = false)
    {
        if ($idTeam != false) {
            $sql = 'SELECT * FROM team WHERE id = :idTeam;';
            $req = $this->bdd->prepare($sql);
            $req->bindValue(':idTeam', $idTeam);
        } elseif ($name != false) {
            $sql = 'SELECT * FROM team WHERE name = :name;';
            $req = $this->bdd->prepare($sql);
            $req->bindValue(':name', $name);
        } else {
            return false;
        }

        $req->execute();

        if ($req->rowCount() == 1) {
            $team = $req->fetchAll(PDO::FETCH_ASSOC)[0];
            return new Team($team['id'], $team['name']);
        } else {
            return false;
        }
    }


    public function update(Team $team)
    {
        $sql = 'UPDATE team SET  name = :name WHERE id = :idTeam';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':name', $team->getName());
        $req->bindValue(':idTeam', $team->getId());
        $req->execute();
    }

    public function createteam($name)
    {
        $sql = 'INSERT INTO team(name) VALUES (:name)';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':name', $name);
        $req->execute();

        return $req;
    }

    public function delet()
    {
        $sql = 'DELETE FROM team WHERE id = :idTeam';
        $req = $this->bdd->prepare($sql);
        $req->execute();
    }
}
