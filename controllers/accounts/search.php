<?php

require_once realpath(dirname(__FILE__) . "/../../helpers/request_method.php");
require_once realpath(dirname(__FILE__) . "/../../helpers/session_helper.php");
require_once realpath(dirname(__FILE__) . "/../../helpers/page_helper.php");
require_once realpath(dirname(__FILE__) . "/../../repository/account.php");

function displayView($params = array())
{
    displayPage('accounts/search.php', $params);
}

if(!isLoggedIn()){
    header("Location: realpath(dirname(__FILE__) . /../log_in.php");
} else if(isGet()){
    header("Location: realpath(dirname(__FILE__) . /../../index.php");
} else if (isPost()) {
    $search = $_POST["search"];

    $repository = new AccountRepository();
    $accounts = $repository->search($search);
    $params = array("accounts" => $accounts, "search" => $search);
    displayView($params);
}
