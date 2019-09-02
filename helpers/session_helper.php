<?php
session_start();

function login($userId, $name)
{
    $_SESSION["account"] = array(
        "userId" => $userId,
        "name" => $name
    );
}

function logout()
{
    $_SESSION["account"] = null;
}

function isLoggedIn()
{
    return isset($_SESSION["account"]);
}

function getUserId()
{
    return $_SESSION["account"]["userId"];
}

function getUserName()
{
    return $_SESSION["account"]["name"];
}
