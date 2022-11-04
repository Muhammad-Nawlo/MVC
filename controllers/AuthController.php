<?php

namespace app\controllers;

use app\core\Application;
use app\core\controller\Controller;
use app\core\request\Request;
use app\core\response\Response;
use app\core\session\Session;
use app\models\User;

class AuthController extends Controller
{
    public function login(Request $request): string
    {
        return $this->view->render('auth.login', withLayout: 'guest');
    }

    public function signIn(Request $request)
    {
        [$errors, $body] = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:20'
        ]);
        if (!empty($errors)) {
            return $this->view->render('auth.login', ['errors' => $errors, 'data' => $body], 'guest');
        }
        $user = (new User)->findOne(['email' => $body['email']]);
        if ($user) {
            if (!password_verify($body['password'], $user->password)) {
                Session::flash('invalid-credential', 'Your credential are not valid', 'error');
                Response::redirect('/login');
            }
        } else {
            Session::flash('invalid-credential', 'Your credential are not valid', 'error');
            Response::redirect('/login');
        }
        Application::login($user);
        Session::flash('success', 'You are logged in successfully', 'success');
        Response::redirect('/');
    }

    public function create(Request $request)
    {
        [$errors, $body] = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:20',
            'firstname' => 'required|min:3|max:255',
            'lastname' => 'required|min:3|max:255',
            'test' => ''
        ]);
        $body['test'] = 'test';
        if (!empty($errors)) {
            return $this->view->render('auth.register', ['errors' => $errors, 'data' => $body], 'guest');
        }
        $user = new User();
        $user->load($body);
        $user->save();
        Session::flash('success', 'You are registered successfully', 'success');
        Response::redirect('/');
    }

    public function register(): string
    {
        return $this->view->render('auth.register', withLayout: 'guest');
    }

    public function logout()
    {
        Application::logout();
        Session::flash('success', 'You are logged out successfully', 'success');
        Response::redirect('/');
    }
}