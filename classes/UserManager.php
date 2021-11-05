<?php


class UserManager
{
    private $bdd;

    public function __construct()
    {
        $this->setBdd();
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function setBdd()
    {
        $this->bdd = DBConnector::getConnection();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM users';
        $req = $this->bdd->prepare($sql);
        $req->execute();

        if ($req->rowCount() == 0) {
            return false;
        }

        $users = [];
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $user) {
            $users[] = new User($user['id'], $user['username'], $user['email'], $user['user_type'], $user['password'], $user['status']);
        }

        return $users;
    }

    public function get($idUser)
    {
        $sql = 'SELECT * FROM users WHERE id = :idUser;';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':idUser', $idUser);
        $req->execute();
        if ($req->rowCount() == 1) {
            $user = $req->fetchAll(PDO::FETCH_ASSOC)[0];
            return new User($user['id'], $user['username'], $user['email'], $user['user_type'], $user['password'], $user['status']);
        } else {
            return false;
        }
    }

    public function update(User $user){
        $sql = 'UPDATE users SET username = :username, email = :email, user_type = :user_type, status = :status WHERE id = :idUser';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':username',$user->getUsername());
        $req->bindValue(':email',$user->getEmail());
        $req->bindValue(':user_type',$user->getUserType());
        $req->bindValue(':status',$user->getStatus());
        $req->bindValue(':idUser',$user->getId());
        $req->execute();
    }



}