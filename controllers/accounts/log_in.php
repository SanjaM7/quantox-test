<?php

require_once realpath(dirname(__FILE__) . "/../../helpers/request_method.php");
require_once realpath(dirname(__FILE__) . "/../../helpers/session_helper.php");
require_once realpath(dirname(__FILE__) . "/../../helpers/page_helper.php");
require_once realpath(dirname(__FILE__) . "/../../models/account.php");
require_once realpath(dirname(__FILE__) . "/../../repository/account.php");

function displayView($params = array())
{
    displayPage('accounts/log_in.php', $params);
}

if (isLoggedIn()) {
    header("Location: realpath(dirname(__FILE__) . /../../index.php");
} else if (isGet()) {
    displayView();
} else if (isPost()) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $repository = new AccountRepository();
    $account = $repository->getAccount($email);

    if (!$account || !($account->isPasswordMatching($password))) {
        $error = TRUE;
        $params = array("error" => $error);
        displayView($params);
        return;
    }

    login($account->getId(), $account->getName());
    header("Location: realpath(dirname(__FILE__) . /../../index.php");
}
