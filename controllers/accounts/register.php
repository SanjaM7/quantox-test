<?php

require_once realpath(dirname(__FILE__) . "/../../helpers/request_method.php");
require_once realpath(dirname(__FILE__) . "/../../helpers/page_helper.php");
require_once realpath(dirname(__FILE__) . "/../../models/account.php");
require_once realpath(dirname(__FILE__) . "/../../repository/account.php");

function displayView($params = array())
{
    displayPage('accounts/register.php', $params);
}

if (isLoggedIn()) {
    header("Location: realpath(dirname(__FILE__) . /../../index.php");
} else if (isGet()) {
    displayView();
} else if (isPost()) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    $repository = new AccountRepository();
    $account = new Account($name, $email, $password, $passwordRepeat);
    $errors = $account->validate();
    if (!count($errors)) {
        if ($repository->isEmailTaken($email)) {
            $errors[] = AccountError::EmailTaken;
        }
    }

    $params = array("errors" => $errors);
    if (count($errors) > 0) {
        displayView($params);
        return;
    }

    $repository->create($account);
    header("Location: realpath(dirname(__FILE__) . /../../index.php?register=success");
}
