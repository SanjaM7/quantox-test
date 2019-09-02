<?php
require_once realpath(dirname(__FILE__) . "/session_helper.php");
require_once realpath(dirname(__FILE__) . "/../models/view_context.php");

function displayPage($viewName, $params = array())
{
    $context = new ViewContext(isLoggedIn(), getUserName());
    $viewName = realpath(dirname(__FILE__) . "/../views/$viewName");
    require_once realpath(dirname(__FILE__) . "/../views/shared/layout.php");
}
