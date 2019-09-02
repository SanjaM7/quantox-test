<?php

function isGet()
{
    return $_SERVER["REQUEST_METHOD"] === "GET";
}

function isPost()
{
    return $_SERVER["REQUEST_METHOD"] === "POST";
}