<?php

require_once realpath(dirname(__FILE__) . "/../helpers/request_method.php");
require_once realpath(dirname(__FILE__) . "/../helpers/page_helper.php");
require_once realpath(dirname(__FILE__) . "/../helpers/session_helper.php");

function displayView($params = array())
{
    displayPage('shared/index.php', $params);
}

displayView();

