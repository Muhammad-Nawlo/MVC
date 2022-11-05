<?php

namespace app\controllers;

use app\core\Application;
use app\core\controller\Controller;
use app\core\exception\MissingParam;
use app\core\exception\ModelNotFound;
use app\core\request\Request;
use app\core\response\Response;
use app\core\session\Session;
use app\models\Product;

class AdminProductController extends Controller
{
    public function index(Request $request): string
    {
        return $this->view->render('admin/index', ['prods' => Product::findAll()], withLayout: 'admin');
    }

    public function create(Request $request)
    {
        return $this->view->render('admin/create', withLayout: 'admin');
    }

    public function store(Request $request)
    {
        [$errors, $body] = $request->validate([
            "price" => 'required',
            "brand" => 'required|min:3|max:255',
            "name" => 'required|min:3|max:255',
            "ram" => 'required|min:3|max:255',
            "color" => 'required|min:3|max:255',
            "storage" => 'required|min:3|max:255',
        ]);
        $res = $message = '';
        if ($_FILES['img']['name'] !== false) {
            [$res, $message] = $this->uploadFile($_FILES['img']);
            if (!$res) {
                $errors['img'] = $message;
            }
        }
        if (!empty($errors)) {
            return $this->view->render('admin/create', ['errors' => $errors, 'data' => $body], 'admin');
        }
        $newProduct = new Product();
        $newProduct->load($body);
        $newProduct->img = './assets/' . $message;
        $newProduct->save();
        Response::redirect('/admin/products');
    }

    public function show_update(Request $request)
    {
        $id = $request->body()['id'] ?? null;
        if ($id === null) {
            throw new MissingParam();
        }
        $product = Product::findOne(['id' => $id]);
        if ($product === false) {
            throw new ModelNotFound();
        }
        return $this->view->render('admin/update', ['data' => (array)$product], withLayout: 'admin');
    }

    public function update(Request $request)
    {
        [$errors, $body] = $request->validate([
            "id" => 'required',
            "price" => 'required',
            "brand" => 'required|min:3|max:255',
            "name" => 'required|min:3|max:255',
            "ram" => 'required|min:3|max:255',
            "color" => 'required|min:3|max:255',
            "storage" => 'required|min:3|max:255',
        ]);
        $res = $message = '';
        if ($_FILES['img']['name'] !== '') {
            [$res, $message] = $this->uploadFile($_FILES['img']);
            if (!$res) {
                $errors['img'] = $message;
            }
        }
        if (!empty($errors)) {
            return $this->view->render('admin/update', ['errors' => $errors, 'data' => $body], 'admin');
        }
        $product = Product::findOne(['id' => (int)$body['id']]);
        $product->price = $body['price'];
        $product->brand = $body['brand'];
        $product->name = $body['name'];
        $product->ram = $body['ram'];
        $product->color = $body['color'];
        $product->storage = $body['storage'];
        if ($_FILES['img']['name'] !== '') {
            $product->img = './assets/' . $message;
        }
        $product->update((int)$body['id']);
        Response::redirect('/admin/products');

    }

    public function destroy(Request $request)
    {
        $id = $request->body()['id'] ?? null;
        if ($id === null) {
            throw new MissingParam();
        }
        $product = Product::findOne(['id' => $id]);
        if ($product === false) {
            throw new ModelNotFound();
        }
        Product::delete(['id' => $id]);
        Session::flash('success', 'The product was deleted successfully');
        return $this->view->render('products/index', withLayout: 'admin');

    }


    private function uploadFile($file): array
    {
        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowedExt = array("jpg", "jpeg", "png", "pdf");
        if (in_array($fileActualExt, $allowedExt)) {
            if ($fileError == 0) {
                if ($fileSize < 10000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = Application::config('asset_url') . 'assets/' . $fileNameNew;
                    move_uploaded_file($fileTempName, $fileDestination);
                    return [true, $fileNameNew];
                } else {
                    return [false, "File Size Limit beyond acceptance"];
                }
            } else {
                return [false, "Something Went Wrong Please try again!"];
            }
        } else {
            return [false, "You can't upload this extention of file"];
        }
    }
}