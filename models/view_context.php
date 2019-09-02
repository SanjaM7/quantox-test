<?php
class ViewContext
{
    public function __construct($isLoggedIn, $name)
    {
        $this->isLoggedIn = $isLoggedIn;
        $this->name = $name;
    }
}
