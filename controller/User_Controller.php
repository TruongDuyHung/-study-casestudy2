<?php

namespace Controller;
USE Model\User;
use Model\DBconnection;
use Model\ConnectBD;
session_start();
class User_Controller
{
    public  $user;
    public function __construct()
    {
        $connect = new DBconnection('mysql:host=localhost;dbname=classicmodels','root','123465');
        $this->user= new ConnectBD($connect->connect());
    }
    public function checklogin()
    {
        $email= $_REQUEST['email'];
        $password= $_REQUEST['password'];
        $result= $this->user->getUser($email,$password);
        if (!isset($result)) {
           $_SESSION['login-fail']= "Login khong thanh cong";
           header('location:../index.php');
        } else {
            $_SESSION['successlogin']= $email;
            header('location:../login/indexlogin.php');
        }
    }
}