<?php

require_once realpath(dirname(__FILE__) . "/../../helpers/request_method.php");
require_once realpath(dirname(__FILE__) . "/../../helpers/session_helper.php");
//require_once realpath(dirname(__FILE__) . "/../../models/account.php");

function displayView($errors = null)
{
    require_once realpath(dirname(__FILE__) . "/../../views/accounts/log_out.php");
}

if (!isPost()) {
    header("Location: realpath(dirname(__FILE__) . /../../index.php");
    return;
}

logout();
header("Location: realpath(dirname(__FILE__) . /../../index.php?logOut=success");
