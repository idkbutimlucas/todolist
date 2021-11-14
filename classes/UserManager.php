<?php


class UserManager
{
    private $bdd;

    public function __construct()
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

    public function get($idUser = false, $username = false)
    {
        if ($idUser != false) {
            $sql = 'SELECT * FROM users WHERE id = :idUser;';
            $req = $this->bdd->prepare($sql);
            $req->bindValue(':idUser', $idUser);
        } elseif ($username != false) {
            $sql = 'SELECT * FROM users WHERE username = :username;';
            $req = $this->bdd->prepare($sql);
            $req->bindValue(':username', $username);
        } else {
            return false;
        }

        $req->execute();

        if ($req->rowCount() == 1) {
            $user = $req->fetchAll(PDO::FETCH_ASSOC)[0];
            return new User($user['id'], $user['username'], $user['email'], $user['user_type'], $user['password'], $user['status']);
        } else {
            return false;
        }
    }

    public function update(User $user)
    {
        $sql = 'UPDATE users SET username = :username, email = :email, user_type = :user_type, status = :status WHERE id = :idUser';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':username', $user->getUsername());
        $req->bindValue(':email', $user->getEmail());
        $req->bindValue(':user_type', $user->getUserType());
        $req->bindValue(':status', $user->getStatus());
        $req->bindValue(':idUser', $user->getId());
        $req->execute();
    }

    public function register($username, $email, $password, $user_type, $id_team, $status = 1, $redirect = false)
    {
        $sql = 'INSERT INTO users(username, email, user_type, password, status, id_team) VALUES (:username,:email, :user_type, :password, :status, :id_team)';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':username', $username);
        $req->bindValue(':email', $email);
        $req->bindValue(':user_type', $user_type);
        $req->bindValue(':password', $password);
        $req->bindValue(':status', $status);
        $req->bindValue(':id_team', $id_team);
        $req->execute();

        if ($redirect == true) {
            $this->login($username, $password);
        }

        return false;
    }

    public function login($username, $password)
    {
        global $errors;
        $errors = [];
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $user = $this->get(false, $username);

            if ($user != false && $user->getPassword() === $password) {
                if ($user->getStatus() == '0') {
                    array_push($errors, "Your account is deactivated. Please contact an admin");
                } else {
                    $_SESSION['current_user'] = $user;
                    if ($user->getUserType() == 'admin') {
                        header('location: ./admin/home.php');
                    } else {
                        $_SESSION['success'] = "You are now logged in";
                        header('location: ./index.php');
                    }
                }
            }
        }
        array_push($errors, "Wrong username/password ");
        return false;
    }

    public function logout()
    {
        session_destroy();
        header("location: ./login.php");
    }
}
