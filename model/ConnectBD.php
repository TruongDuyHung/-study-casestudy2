<?php

namespace Model;

class ConnectBD
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function getUser($email, $password)
    {
        $sql = "select email,password from users where email = ? and password = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->binParam(1, $email);
        $stmt->binParam(2, $password);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addUser($email, $name, $password)
    {
        $sql = "insert into users(email,name,password) values (?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->binParam(1, $email);
        $stmt->binParam(2, $name);
        $stmt->binParam(3, $password);
        return $stmt->execute();
    }
}