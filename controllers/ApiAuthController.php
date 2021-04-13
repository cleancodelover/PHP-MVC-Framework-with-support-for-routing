<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\core\Application;
use app\core\Response;
use app\models\Login;

class ApiAuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $login = new Login();
        if ($request->isPost()) {
            $login->loadData($request->getBody());
            if ($login->validate() && $login->login()) {
                return 'Success';
            }
        }
        return 'Failed';
    }

    public function register(Request $request)
    {

        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                return 'Success';
            }
            return 'Failed';
        }
        return 'Failed';
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        return 'Logged out!';
    }
}
