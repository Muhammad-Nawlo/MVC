<?php

namespace app\core\controller;

use app\core\request\Request;
use app\core\view\View;

class Controller
{
    protected View $view ;
    public function __construct()
    {
        $this->view = View::getInstance();
    }
}