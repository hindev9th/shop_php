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

    protected function exist()
    {
        
    }
}