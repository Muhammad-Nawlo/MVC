<?php

namespace app\controllers;

use app\core\controller\Controller;
use app\core\request\Request;
use app\models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return $this->view->render('products/index', ['prods' => Product::findAll()]);
    }

    public function create(Request $request)
    {

    }

}