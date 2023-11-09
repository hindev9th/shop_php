<?php
namespace code\Models;
use config\Config;
use PDO;
class User
{
    public function __construct()
    {
    }

    public function login(string $email,string $password)
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("SELECT * FROM users where email = '$email' LIMIT 1");
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_CLASS, "code\Entities\User");
        $user = $user[0] ?? null;
        if ($user && password_verify($password,$user->getPassword())){
            setAuth($user);
            return 200;
        }
        return 404;
    }

    /**
     * remove user in session
     * @return true
     */
    public function logout()
    {
        unset($_SESSION['user']);
        return true;
    }

    /**
     * handle register new user
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $password
     * @return bool|int
     */
    public function register(string $firstname,string $lastname,string $email,string $password)
    {
        if (!$this->exist($email)){
            $conn = Config::gI()->connect();
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (firstname,lastname,email,password) VALUES ('$firstname','$lastname','$email','$password_hash')";
            $query = $conn->prepare($sql);
            $query->execute();
            $this->login($email,$password);
            return 200;
        }
        return 222;
    }

    /**
     * check user exist by email
     *
     * @param string $email
     * @return bool
     */
    protected function exist(string $email): bool
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("SELECT * FROM users where email = '$email'");
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_CLASS, \code\Entities\User::class);
        return count($user) > 0;
    }
}