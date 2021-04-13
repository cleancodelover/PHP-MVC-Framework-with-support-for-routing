<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\core\Application;
use app\core\Response;
use app\models\Login;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $login = new Login();
        if ($request->isPost()) {
            $login->loadData($request->getBody());
            if ($login->validate() && $login->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $login
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Success';
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        $this->setLayout('auth');

        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}
