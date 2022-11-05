<?php

namespace app\controllers;

use app\core\controller\Controller;
use app\core\exception\MissingParam;
use app\core\exception\ModelNotFound;
use app\core\request\Request;
use app\models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return $this->view->render('products/index', ['prods' => Product::findAll()]);
    }

    public function show(Request $request)
    {
        $id = $request->body()['id'] ?? null;
        if ($id === null) {
            throw new MissingParam();
        }
        $product = Product::findOne(['id' => $id]);
        if ($product === false) {
            throw new ModelNotFound();
        }
        return $this->view->render('products/show',['product'=>(array)$product]);
    }

}